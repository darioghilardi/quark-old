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
     
    // Retrieve the total number of questions and the last 10 questions
    $this->nquestions = Doctrine::getTable('question')->findByUser_id($this->user->getId())->count();
    $this->questions = Doctrine::getTable('question')->getLastTenByUserId($this->user->getId());

    // Retrieve the total number of answers and the last 10 answers
    $this->nanswers = Doctrine::getTable('answer')->findByUser_id($this->user->getId())->count();
    $this->answers = Doctrine::getTable('answer')->getLastFiftyByUserId($this->user->getId());

    // Retrieve the total number of votes up and the total number of votes down on questions
    $this->nupquestion = Doctrine::getTable('interest')->findByUser_idAndValue($this->user->getId(), 1)->count();
    $this->ndownquestion = Doctrine::getTable('interest')->findByUser_idAndValue($this->user->getId(), -1)->count();

    // Retrieve the total number of votes up and the total number of votes down on answers
    $this->nupanswer = Doctrine::getTable('rating')->findByUser_idAndValue($this->user->getId(), 1)->count();
    $this->ndownanswer = Doctrine::getTable('rating')->findByUser_idAndValue($this->user->getId(), -1)->count();

    // Retrieve number of tags and user tags
    $this->ntags = Doctrine::getTable('tag')->getNumberTagsByUserId($this->user->getId());
    $this->tags = Doctrine::getTable('tag')->getTagsByUserId($this->user->getId());
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
