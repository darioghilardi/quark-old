<?php

/**
 * answer actions.
 *
 * @package    quark
 * @subpackage answer
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class answerActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->answers = Doctrine_Core::getTable('Answer')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->answer = Doctrine_Core::getTable('Answer')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->answer);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AnswerForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AnswerForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($answer = Doctrine_Core::getTable('Answer')->find(array($request->getParameter('id'))), sprintf('Object answer does not exist (%s).', $request->getParameter('id')));
    $this->form = new AnswerForm($answer);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($answer = Doctrine_Core::getTable('Answer')->find(array($request->getParameter('id'))), sprintf('Object answer does not exist (%s).', $request->getParameter('id')));
    $this->form = new AnswerForm($answer);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($answer = Doctrine_Core::getTable('Answer')->find(array($request->getParameter('id'))), sprintf('Object answer does not exist (%s).', $request->getParameter('id')));
    $answer->delete();

    $this->redirect('answer/index');
  }

  /**
   * Execute voting operations on an answer.
   *
   * @param sfWebRequest $request
   */
  public function executeVote(sfWebRequest $request)
  {
    // Check if the token is valid
    if (in_array($request->getParameter('token'), $this->getUser()->getAttribute('tokenarray', array())))
    {
      $user_id = $this->getUser()->getGuardUser()->getId();
      $aid = $request->getParameter('id');
      $sign = ($request->getParameter('type') == 'up') ? 1 : -1;

      // Istantiate the voting class and call the vote method
      $v = new voting($aid, $user_id);
      $v->answerVote($sign);
    }

    // Load the question associated to this answer to get slug and redirect avoiding template rendering
    $answer = Doctrine::getTable('Answer')->find($aid);
    $question = Doctrine::getTable('Question')->find($answer->getQuestion()->id);
    $this->redirect('question/show?id='.$question->id.'&title_slug='.$question->getTitleSlug());
  }

  /**
   * Undo vote on an answer.
   *
   * @param sfWebRequest $request
   */
  public function executeUndovote(sfWebRequest $request)
  {
    if (in_array($request->getParameter('token'), $this->getUser()->getAttribute('tokenarray', array())))
    {
      $user_id = $this->getUser()->getGuardUser()->getId();
      $aid = $request->getParameter('id');
      $sign = ($request->getParameter('type') == 'up') ? -1 : 1;

      $v = new voting($aid, $user_id);
      $v->answerUndoVote($sign);

      // Load the question associated to this answer to get slug and redirect avoiding template rendering
      $answer = Doctrine::getTable('Answer')->find($aid);
      $question = Doctrine::getTable('Question')->find($answer->getQuestion()->id);
      $this->redirect('question/show?id='.$question->id.'&title_slug='.$question->getTitleSlug());
    }
  }

  /**
   * Accept an answer.
   *
   * @param sfWebRequest $request
   */
  public function executeAccept(sfWebRequest $request)
  {
    if (in_array($request->getParameter('token'), $this->getUser()->getAttribute('tokenarray', array())))
    {
      $user_id = $this->getUser()->getGuardUser()->getId();
      $aid = $request->getParameter('id');

      // Load the question associated to this answer
      $answer = Doctrine::getTable('Answer')->find($aid);
      $question = Doctrine::getTable('Question')->find($answer->getQuestion()->id);

      // Make an additional check for the user, there's a case where someone can use an alternative token to accept answer
      if ($user_id == $question->user_id)
      {
        // Check if there's already an accepted answer
        $av = Doctrine_Core::getTable('Accept')->getAccepted($question->id);

        $a = new accepting($aid, $question->id);
        $a->markAccepted($av);
      }

      // Execute the redirect
      $this->redirect('question/show?id='.$question->id.'&title_slug='.$question->getTitleSlug());
    }
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $values = $request->getParameter($form->getName());
    $question_id = $values["question_id"];
    $values["user_id"] = $this->getUser()->getGuardUser()->getId();
    $form->bind($values);

    if ($form->isValid())
    {
      // Start a transaction
      $conn = Doctrine_Manager::getInstance()->getCurrentConnection();
      $conn->beginTransaction();
      try
      {
        $answer = $form->save();
        $question = Doctrine_Core::getTable('Question')->find(array($values["question_id"]));
        $question->updateAnswerCount(1);
      }
      catch (Exception $e)
      {
        // Rollback and exception
        $conn->rollBack();
        throw $e;
      }
      $this->redirect('question/show?id='.$question->getId().'&title_slug='.$question->getTitleSlug());
    }
  }
}
