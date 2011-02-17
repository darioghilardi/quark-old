<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new QuarkTestFunctional(new sfBrowser());
$browser->loadData();

$max_h1 = 1;
$max_questions = 20;
$browser->info('1 - The homepage')->
  get('/')->
  info(sprintf('  1.1 - There are max %s title h1 into the homepage', $max_h1))->
  with('response')->checkElement('h1', $max_h1)->

  info(sprintf('  1.2 - Only %s questions are listed into the homepage', $max_questions))->
  with('response')->
    checkElement('#question-list-content > div.item .title', $max_questions);

$browser->info('2 - Question page')->
  get('/')->
  info('  2.1 - Check that not loggedin users can\'t see links into the voting widget')->
  with('response')->
    click('#question-list-content > div.item a', array(), array('position' => 1))
	    ->with('response')->checkElement('div#question-precontents > div.vote a', 0);

$browser->
  get('/login')->
  info('  2.2 - Check that loggedin users can see links into the voting widget')->
	  with('response')->
      setField('signin[username]', 'kiuz')->
	  with('response')->
      setField('signin[password]', 'kiuz')->
	  with('response')->
      click('Signin')->
        get('/')->
        with('response')->
          click('#question-list-content > div.item a', array(), array('position' => 1))->
            with('response')->checkElement('div#question-precontents > div.vote a.button-up', 1)->
            with('response')->checkElement('div#question-precontents > div.vote a.button-down', 1)->
            with('response')->checkElement('div#question-precontents > div.vote count', 0)->
            with('response')->
              click('div#question-precontents > div.vote div.up-vote a.button-up')->
              info('  2.3 - Check that counter increase after a vote by one.')->
                with('response')->
                  checkElement('div#question-precontents > div.vote div.up-vote count', 1);