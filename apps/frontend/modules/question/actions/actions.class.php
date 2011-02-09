<?php

/**
 * question actions.
 *
 * @package    quark
 * @subpackage question
 * @author     Dario Ghilardi
 */
class questionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('Question', sfConfig::get('app_default_question_for_page'));
    $this->order = $request->getParameter('order', 'oldest');
    if ($this->order == 'oldest')
    {
      $this->pager->setQuery(Doctrine_Core::getTable('Question')->createQuery('a')->orderBy('created_at ASC'));
    } 
    elseif($this->order == 'newest')
    {
      $this->pager->setQuery(Doctrine_Core::getTable('Question')->createQuery('a')->orderBy('created_at DESC'));
    }
    elseif($this->order == 'rated')
    {
      $this->pager->setQuery(Doctrine_Core::getTable('Question')->createQuery('a')->orderBy('interested_users DESC'));
    }

    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->question = $this->getRoute()->getObject();

    // if the user is not who makes the question add the img tag
    if ($this->getUser()->getGuardUser()->getId() != $this->question->getUser()->id)
    {
      // Set up the token, pass into the template and put into the session
      $this->token = md5(rand(0, 99999), sfConfig::get("csrf_secret"));
      $this->getUser()->setAttribute('token', $this->token);
      $this->getUser()->setAttribute('time', time());
    }

    // Pre-populate form with the correct question
    $this->form = new AnswerForm();
    $this->form->setDefault('question_id', $this->question->getId());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new QuestionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new QuestionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($question = Doctrine_Core::getTable('Question')->find(array($request->getParameter('id'))), sprintf('Object question does not exist (%s).', $request->getParameter('id')));
    $this->form = new QuestionForm($question);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($question = Doctrine_Core::getTable('Question')->find(array($request->getParameter('id'))), sprintf('Object question does not exist (%s).', $request->getParameter('id')));
    $this->form = new QuestionForm($question);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($question = Doctrine_Core::getTable('Question')->find(array($request->getParameter('id'))), sprintf('Object question does not exist (%s).', $request->getParameter('id')));
    $question->delete();

    $this->redirect('question/index');
  }

  public function executeIncreaseviewcount(sfWebRequest $request)
  {
    // Check if the token is valid
    if ( ($request->getParameter('token') == $this->getUser()->getAttribute('token', null)) &&
        (time() - $this->getUser()->getAttribute('time', null) < 60) )
    {
      // Execute the logging to count question views
      Quark::question_log($request->getParameter('id'));

      // Clear session attributes
      $this->getUser()->setAttribute('token', null);
      $this->getUser()->setAttribute('time', null);
    }
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $question = $form->save();

      $this->redirect('question/edit?id='.$question->getId());
    }
  }
}
