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

  /**
   * Define a login function.
   */
  public function login($username = 'ingo', $password = 'ingo')
  {
    return $this->click('Signin', array('signin' => array('username' => $username, 'password' => $password)))->with('response')->isRedirected()->followRedirect();
  }

}

?>
