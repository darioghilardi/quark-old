<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new QuarkTestFunctional(new sfBrowser());
$browser->loadData();

$max_h1 = 1;
$max_questions = 20;
$browser->
  info('1 - The homepage')->
  
    info(sprintf('  1.1 - There are max %s title h1 into the homepage', $max_h1))->
      get('/')->
      with('response')->begin()->
        checkElement('h1', $max_h1)->

    info(sprintf('  1.2 - Only %s questions are listed into the homepage', $max_questions))->
        checkElement('#question-list-content > div.item .title', $max_questions)->
    end()->

  info('2 - Question page')->

    info('  2.1 - Check that not loggedin users can\'t see links into the voting widget')->

      click('#question-list-content > div.item a', array(), array('position' => 1))->
        with('response')->begin()->
          isStatusCode(200)->
          checkElement('div#question-precontents > div.vote a', 0)->
    end()->

    info('  2.2 - Check that loggedin users can see links into the voting widget')->

      restart()->
      get('/login')->
      login('admin','admin')->

      get('/')->
        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'index')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          click('#question-list-content > div.item a', array(), array('position' => 1))->
        end()->
        
        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('div#question-precontents > div.vote a.button-up', 1)->
          checkElement('div#question-precontents > div.vote a.button-down', 1)->

    info('  2.3 - Check that vote counter exists')->
          checkElement('div#question-precontents > div.vote .count', true)->
        end();

// Get the counter value for the next test
$c = new sfDomCssSelector($browser->getResponseDom());
$counter = $c->getValues('div.vote .count');
/*print "pippo";
print_r($counter);

$browser->
    info('  2.4 - Check that counter increase after a vote on +1')->
        with('response')->begin()->
          checkElement('div#question-precontents > div.vote .count', $counter);
        end();

            /*with('response')->
              click('div#question-precontents > div.vote div.up-vote a.button-up')->
              info('  2.3 - Check that counter increase after a vote by one.')->
                with('response')->
                  checkElement('div#question-precontents > div.vote .count', $val + 1);*/