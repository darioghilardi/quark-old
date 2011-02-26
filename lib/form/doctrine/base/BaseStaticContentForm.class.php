<?php

/**
 * StaticContent form base class.
 *
 * @method StaticContent getObject() Returns the current form's model object
 *
 * @package    quark
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStaticContentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'title' => new sfWidgetFormInputText(),
      'path'  => new sfWidgetFormInputText(),
      'body'  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title' => new sfValidatorString(array('max_length' => 255)),
      'path'  => new sfValidatorPass(),
      'body'  => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'StaticContent', 'column' => array('path')))
    );

    $this->widgetSchema->setNameFormat('static_content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StaticContent';
  }

}
