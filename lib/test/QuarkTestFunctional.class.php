<?php

/**
 * Preload database before executing functional tests.
 */
class QuarkTestFunctional extends sfTestFunctional
{
  public function loadData()
  {
    Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures');

    return $this;
  }

  public function getMostRecentQuestion()
  {
    $q = Doctrine_Query::create()
      ->select('q.*')
      ->from('Question q')
      ->orderBy('q.created_at DESC');

    return $question = $q->fetchOne();
  }
}

?>
