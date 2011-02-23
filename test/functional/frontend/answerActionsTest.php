<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new QuarkTestFunctional(new sfBrowser());
$browser->loadData();

// Bootstrap the test
$question = Doctrine_Query::create()
  ->from('Question q')->fetchOne();

$user = Doctrine_Query::create()
        ->from("sfGuardUser u")->fetchOne();

// Create a new answer
$answer = createAnswer($question, $user);
$votes = $answer->votes;

// Start testing
$browser->
  info('1 - Question page')->

    info('  2.1 - Check that not loggedin users can\'t see links into the voting widget for answers')->

    get('/question/'.$question->id.'/'.Quark::slugify($question->title))->
      with('response')->begin()->
        isStatusCode(200)->
        checkElement('#answers-list > div.answer .answer-'.$answer->id.' a', 0)->
      end()->

    info('  2.2 - Check that loggedin users can see links into the voting widget for answers')->

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
          checkElement('#answers-list > div.answer .answer-'.$answer->id.' a.button-up', 1)->
          checkElement('#answers-list > div.answer .answer-'.$answer->id.' a.button-down', 1)->

    info('  2.3 - Check that vote counter exists and reports the correct result for answer')->
          checkElement('#answers-list > div.answer .answer-'.$answer->id.' .count', true)->
          checkElement('#answers-list > div.answer .answer-'.$answer->id.' .count', (string) $votes)->

    info('  2.4 - Click on +1 and check the new value')->
          click('#answers-list > div.answer .answer-'.$answer->id.' a.button-up')->
        end()->

        followRedirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('#answers-list > div.answer .answer-'.$answer->id.' .count', (string) ($votes + 1)) ->

    info('  2.5 - Click on +1 to undo the previous vote up')->
          click('#answers-list > div.answer .answer-'.$answer->id.' a.button-up')->
        end()->

        followRedirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('#answers-list > div.answer .answer-'.$answer->id.' .count', (string) ($votes)) ->

    info('  2.6 - Click on -1 and check the new value')->
          click('#answers-list > div.answer .answer-'.$answer->id.' div.down-vote a.button-down')->
        end()->

        followredirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('#answers-list > div.answer .answer-'.$answer->id.' .count', (string) ($votes - 1)) ->

    info('  2.7 - Click on -1 to undo the previous vote down')->
          click('#answers-list > div.answer .answer-'.$answer->id.' div.down-vote a.button-down')->
        end()->

        followredirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('#answers-list > div.answer .answer-'.$answer->id.' .count', (string) ($votes)) ->

    info('  2.8 - Click on +1 then on -1 and then on +1 again to check the double vote increment e decrement')->
          click('#answers-list > div.answer .answer-'.$answer->id.' div.up-vote a.button-up')->
        end()->

        followredirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('#answers-list > div.answer .answer-'.$answer->id.' .count', (string) ($votes + 1)) ->
          click('#answers-list > div.answer .answer-'.$answer->id.' div.down-vote a.button-down')->
        end()->

        followredirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('#answers-list > div.answer .answer-'.$answer->id.' .count', (string) ($votes - 1)) ->
          click('#answers-list > div.answer .answer-'.$answer->id.' div.up-vote a.button-up')->
        end()->

        followredirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('#answers-list > div.answer .answer-'.$answer->id.' .count', (string) ($votes + 1)) ->
        end();


function createAnswer($question, $user)
{
  $answer = new Answer();
  $answer->question_id = $question->id;
  $answer->user_id = $user->id;
  
  $answer->save();
  return $answer;
}