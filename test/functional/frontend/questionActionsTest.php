<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new QuarkTestFunctional(new sfBrowser());
$browser->loadData();


$max = 1;
$browser->info('0 - The homepage')->
  get('/')->
  info(sprintf('There are max %s title h1 into page', $max))->
  with('response')->checkElement('h1', $max);
  

$max = 20;
$browser->info('1 - The homepage')->
  get('/')->
  info(sprintf('  1.1 - Only %s questions are listed into the homepage', $max))->
  with('response')->
    checkElement('#question-list-content > div.item', $max)
;

$max = 20;
$browser->info('2 - The homepage')->
  get('/')->
  info(sprintf('Only %s questions are listed into the homepage with titles', $max))->
  with('response')->
    checkElement('#question-list-content > div.item .title', $max);

$browser->info('3 - The homepage')->
  get('/')->
  info(sprintf('Click links %s questions are listed into the homepage with', $max))->
  with('response')->
    click('#question-list-content > div.item a', array(), array('position' => 1))
    ->with('response')->checkElement('#showSuccess', true)
    ->with('response')->checkElement('#indexSuccess', false)
    ->with('response')->checkElement('h1', 1)
    ->back()
    ->with('response')->checkElement('#showSuccess', false)
    ->with('response')->checkElement('#indexSuccess', true)
    ;
    