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

    // if the user is not who make the question or is anonymous add the img tag
    $userid = ($this->getUser()->isAuthenticated() ? $this->getUser()->getGuardUser()->getId() : "anonymous");
    if($userid != $this->question->getUser()->id)
    {
      // Set up the token, pass into the template and put into the session
      $this->token = md5(rand(0, 99999), sfConfig::get("csrf_secret"));
      $this->getUser()->setAttribute('token', $this->token);
      $this->getUser()->setAttribute('time', time());
    }

    // Reset the token array
    $this->getUser()->setAttribute('tokenarray', array());

    // Pre-populate answer form with the correct question
    $this->form = new AnswerForm();
    $this->form->setDefault('question_id', $this->question->getId());

    // Get the accepted answer
    //$accepted = $this->question->getAccept();
    $this->accepted = NULL;
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

  /**
   * Increase view count writing a log file.
   *
   * @param sfWebRequest $request
   */
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

  /**
   * Execute voting operations.
   *
   * @param sfWebRequest $request
   */
  public function executeVote(sfWebRequest $request)
  {
    // Check if the token is valid
    if (in_array($request->getParameter('token'), $this->getUser()->getAttribute('tokenarray', array())))
    {
      $user_id = $this->getUser()->getGuardUser()->getId();
      $qid = $request->getParameter('id');
      $sign = ($request->getParameter('type') == 'up') ? '1' : '-1';

      // Istantiate the voting class and call the vote method
      $v = new voting($qid, $user_id);
      $v->questionVote($sign);
    }

    // Load question to get slug and redirect avoiding template rendering
    $question = Doctrine::getTable('Question')->find($request->getParameter('id'));
    $this->redirect('question/show?id='.$request->getParameter('id').'&title_slug='.$question->getTitleSlug());
  }

  /**
   * Undo vote on a question.
   *
   * @param sfWebRequest $request
   */
  public function executeUndovote(sfWebRequest $request)
  {
    if (in_array($request->getParameter('token'), $this->getUser()->getAttribute('tokenarray', array())))
    {
      $user_id = $this->getUser()->getGuardUser()->getId();
      $qid = $request->getParameter('id');
      $sign = ($request->getParameter('type') == 'up') ? -1 : 1;

      $v = new voting($qid, $user_id);
      $v->questionUndoVote($sign);

      // Load question to get slug and redirect avoiding template rendering
      $question = Doctrine::getTable('Question')->find($request->getParameter('id'));
      $this->redirect('question/show?id='.$request->getParameter('id').'&title_slug='.$question->getTitleSlug());
    }
  }

  /**
   * Return the autocomplete values.
   * 
   * @param sfWebRequest $request
   * @return json $tags
   */
  public function executeAutocomplete($request)
	{
	    $this->getResponse()->setContentType('application/json');

      $tags = Doctrine::getTable('Tag')->getForAutocomplete(
        $request->getParameter('term'),
	      $request->getParameter('limit')
	    );

	    return $this->renderText(json_encode($tags));
	}

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
  	// Include external Library for Purifier HTML Tag and convert Markdwon into HTML Tag
  	require_once sfConfig::get('sf_lib_dir').'/vendor/htmlpurifier/HTMLPurifier.standalone.php';
    require_once sfConfig::get('sf_lib_dir').'/vendor/markdown/Markdown.php';

    // Retrieve value from "Form"
  	$values = $request->getParameter($form->getName());  	
  	
    // Init and config Purifier HTML
    $config_purifier = HTMLPurifier_Config::createDefault();    
    $config_purifier->set('HTML.Allowed', 'p,ul,li,ol,blockquote,quote,href,b,i,em,a[href],strong,code,img[src]');
    $config_purifier->set('AutoFormat.AutoParagraph', false);
    $config_purifier->set('HTML.Doctype', 'XHTML 1.0 Strict');
    $purifier = new HTMLPurifier($config_purifier);
    
    // Html Purifier on Markdown output
    $values["body_html"] = $purifier->purify(Markdown($values["body"]));

    // Take off the tags from the form
    

    // Put id of logged user that have asked question
    $values["user_id"] = $this->getUser()->getGuardUser()->getId();
    $form->bind($values);

    if ($form->isValid())
    {
      $tags = $values['tags'];

      // Store tags
      $tags = Tagged::addTags($tags);

      // Store question
      $question = $form->save();

      // Store question relation with tags
      Tagged::addQuestionTagsRelation($question, $tags);
      
      $this->redirect('question/show?id='.$question->getId().'&title_slug='.$question->getTitleSlug());
    }
  }
}
