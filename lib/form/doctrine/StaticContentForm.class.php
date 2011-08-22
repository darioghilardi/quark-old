<?php

/**
 * StaticContent form.
 *
 * @package    quark
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StaticContentForm extends BaseStaticContentForm
{
  public function configure()
  {
    $this->widgetSchema['created_at'] = new sfWidgetFormInputHidden();
    $this->setDefault('created_at', time());
    
    $this->widgetSchema['updated_at'] = new sfWidgetFormInputHidden();
    $this->setDefault('updated_at', time());
  }
}
