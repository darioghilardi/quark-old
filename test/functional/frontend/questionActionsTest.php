<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new QuarkTestFunctional(new sfBrowser());
$browser->loadData();

$max = 20;

$browser->info('1 - The homepage')->
  get('/')->
  info(sprintf('  1.1 - Only %s questions are listed into the homepage', $max))->
  with('response')->
    checkElement('#question-list-content > div.item', $max)
;