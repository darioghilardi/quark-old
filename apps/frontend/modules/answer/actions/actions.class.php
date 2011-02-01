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

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $answer = $form->save();

      $this->redirect('answer/edit?id='.$answer->getId());
    }
  }
}
