<?php

/**
 * sfGuardUserProfile form.
 *
 * @package    quark
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserProfileForm extends PluginsfGuardUserProfileForm
{
  public function configure()
  {
    unset(
      $this['reputation'],
      $this['biography'],
      $this['location'],
      $this['website'],
      $this['age']
    );
  }
}
