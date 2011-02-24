<?php

/**
 * static actions.
 *
 * @package    quark
 * @subpackage static
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class staticActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->static_contents = Doctrine_Core::getTable('StaticContent')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->static_content = Doctrine_Core::getTable('StaticContent')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->static_content);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new StaticContentForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new StaticContentForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($static_content = Doctrine_Core::getTable('StaticContent')->find(array($request->getParameter('id'))), sprintf('Object static_content does not exist (%s).', $request->getParameter('id')));
    $this->form = new StaticContentForm($static_content);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($static_content = Doctrine_Core::getTable('StaticContent')->find(array($request->getParameter('id'))), sprintf('Object static_content does not exist (%s).', $request->getParameter('id')));
    $this->form = new StaticContentForm($static_content);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($static_content = Doctrine_Core::getTable('StaticContent')->find(array($request->getParameter('id'))), sprintf('Object static_content does not exist (%s).', $request->getParameter('id')));
    $static_content->delete();

    $this->redirect('static/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $static_content = $form->save();

      $this->redirect('static/edit?id='.$static_content->getId());
    }
  }
}
