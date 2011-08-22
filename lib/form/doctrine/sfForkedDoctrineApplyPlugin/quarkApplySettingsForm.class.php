<?php

/**
 * quarkApplySettingsForm form.
 *
 * @package    quark
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class quarkApplySettingsForm extends sfApplySettingsForm
{
  public function configure()
  {
    parent::configure();
    
    unset($this['reputation']);

    $this->widgetSchema['age'] = new sfWidgetFormInput(array('label' => 'Age'));
    $this->widgetSchema['location'] = new sfWidgetFormInput(array('label' => 'Location'));
    $this->widgetSchema['website'] = new sfWidgetFormInput(array('label' => 'Website'));
    $this->widgetSchema['biography'] = new sfWidgetFormTextarea(array('label' => 'Biography'));

    $this->setValidators(array(
      'firstname'         => new sfValidatorApplyFirstname(array('required' => false)),
      'lastname'          => new sfValidatorApplyLastname(array('required' => false)),
      'age'               => new sfValidatorNumber(array('required' => false)),
      'location'          => new sfValidatorString(array('required' => false)),
      'website'           => new sfValidatorUrl(array('required' => false)),
      'biography'         => new sfValidatorString(array('required' => false)),
    ));
  }
}
