<?php

/**
 * Accept form base class.
 *
 * @method Accept getObject() Returns the current form's model object
 *
 * @package    quark
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAcceptForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'question_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Question'), 'add_empty' => false)),
      'answer_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Answer'), 'add_empty' => false)),
      'created_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'question_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Question'))),
      'answer_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Answer'))),
      'created_at'  => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Accept', 'column' => array('question_id'))),
        new sfValidatorDoctrineUnique(array('model' => 'Accept', 'column' => array('answer_id'))),
      ))
    );

    $this->widgetSchema->setNameFormat('accept[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Accept';
  }

}
