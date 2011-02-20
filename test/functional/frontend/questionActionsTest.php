<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new QuarkTestFunctional(new sfBrowser());
$browser->loadData();

// Setup basic data
$max_h1 = 1;
$max_questions = 20;
$question = Doctrine_Query::create()
  ->from('Question q')->fetchOne();
$interested = $question->interested_users;

// Start testing
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

      get('/question/'.$question->id.'/'.Quark::slugify($question->title))->
        with('response')->begin()->
          isStatusCode(200)->
          checkElement('div#question-precontents > div.vote a', 0)->
    end()->

    info('  2.2 - Check that loggedin users can see links into the voting widget')->

      restart()->
      get('/login')->
      login('ingo','ingo')->

      get('/question/'.$question->id.'/'.Quark::slugify($question->title))->
        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('div#question-precontents > div.vote a.button-up', 1)->
          checkElement('div#question-precontents > div.vote a.button-down', 1)->

    info('  2.3 - Check that vote counter exists and reports the correct result')->
          checkElement('div#question-precontents > div.vote .count', true)->
          checkElement('div#question-precontents > div.vote .count', (string) $interested)->

    info('  2.4 - Click on +1 and check the new value')->
          click('div#question-precontents > div.vote div.up-vote a.button-up')->
        end()->

        followRedirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('div#question-precontents > div.vote .count', (string) ($interested + 1)) ->

    info('  2.5 - Click on +1 to undo the previous vote up')->
          click('div#question-precontents > div.vote div.up-vote a.button-up')->
        end()->

        followRedirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('div#question-precontents > div.vote .count', (string) ($interested)) ->

    info('  2.6 - Click on -1 and check the new value')->
          click('div#question-precontents > div.vote div.down-vote a.button-down')->
        end()->

        followredirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('div#question-precontents > div.vote .count', (string) ($interested - 1)) ->

    info('  2.7 - Click on -1 to undo the previous vote down')->
          click('div#question-precontents > div.vote div.down-vote a.button-down')->
        end()->

        followredirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('div#question-precontents > div.vote .count', (string) ($interested)) ->

    info('  2.8 - Click on +1 then on -1 and then on +1 again to check the double vote increment e decrement')->
          click('div#question-precontents > div.vote div.up-vote a.button-up')->
        end()->

        followredirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('div#question-precontents > div.vote .count', (string) ($interested + 1)) ->
          click('div#question-precontents > div.vote div.down-vote a.button-down')->
        end()->

        followredirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('div#question-precontents > div.vote .count', (string) ($interested - 1)) ->
          click('div#question-precontents > div.vote div.up-vote a.button-up')->
        end()->

        followredirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('div#question-precontents > div.vote .count', (string) ($interested + 1)) ->
        end();