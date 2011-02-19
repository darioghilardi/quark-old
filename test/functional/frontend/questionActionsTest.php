<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new QuarkTestFunctional(new sfBrowser());
$browser->loadData();

$max_h1 = 1;
$max_questions = 20;
$question = Doctrine_Query::create()
  ->from('Question q')->fetchOne();

print "interested=".$question->interested_users;


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
          checkElement('div#question-precontents > div.vote .count', (string) $question->interested_users)->

    info('  2.3 - Click on +1 and check the new value')->
          click('div#question-precontents > div.vote div.up-vote a.button-up')->
        end()->

        followRedirect()->

        with('request')->begin()->
          isParameter('module', 'question')->
          isParameter('action', 'show')->
        end()->

        with('response')->begin()->
          isStatusCode(200)->
          checkElement('div#question-precontents > div.vote .count', (string) (((int) $question->interested_users) + 1))->
        end();

// Get the counter value for the next test
//$browser->with('response')->aa();
/*$c = $browser->getResponseDomCssSelector();
$title = $c->getValues('title');
print $title;

//$counter = $c->getValues('div');

//print "pippo";
//print_r($counter);

/*$browser->
    info('  2.4 - Check that counter increase after a vote on +1')->
        with('response')->begin()->
          checkElement('div#question-precontents > div.vote .count', $counter);
        end();

            /*with('response')->
              click('div#question-precontents > div.vote div.up-vote a.button-up')->
              info('  2.3 - Check that counter increase after a vote by one.')->
                with('response')->
                  checkElement('div#question-precontents > div.vote .count', $val + 1);*/