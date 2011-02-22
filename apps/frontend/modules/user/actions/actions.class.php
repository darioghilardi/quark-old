<?php

/**
 * user actions.
 *
 * @package    quark
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

 /**
  * Executes show action
  *
  * @param sfRequest $request A request object
  * $request username
  * 
  */  
  public function executeShow(sfWebRequest $request)
  {
    //retrive user objects, if exist
    $this->forward404Unless($this->user = Doctrine::getTable('sfGuardUser')->findOneByUsername($request->getParameter('username')));
  }
  
 /**
  * Executes list action
  *
  * @param sfRequest $request A request object
  * 
  */  
  public function executeList(sfWebRequest $request)
  {
  	$this->pager = new sfDoctrinePager('sfGuardUser', sfConfig::get('app_default_user_for_page'));
    $this->pager->setQuery(Doctrine_Core::getTable('sfGuardUser')->createQuery('u')->orderBy('username ASC'));
  
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
    
  }
  
}
