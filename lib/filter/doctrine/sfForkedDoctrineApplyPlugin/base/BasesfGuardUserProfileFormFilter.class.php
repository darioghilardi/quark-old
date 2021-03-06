<?php

/**
 * sfGuardUserProfile filter form base class.
 *
 * @package    quark
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'email_new'   => new sfWidgetFormFilterInput(),
      'firstname'   => new sfWidgetFormFilterInput(),
      'lastname'    => new sfWidgetFormFilterInput(),
      'validate_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'validate'    => new sfWidgetFormFilterInput(),
      'type'        => new sfWidgetFormFilterInput(),
      'reputation'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'biography'   => new sfWidgetFormFilterInput(),
      'location'    => new sfWidgetFormFilterInput(),
      'website'     => new sfWidgetFormFilterInput(),
      'age'         => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'email_new'   => new sfValidatorPass(array('required' => false)),
      'firstname'   => new sfValidatorPass(array('required' => false)),
      'lastname'    => new sfValidatorPass(array('required' => false)),
      'validate_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'validate'    => new sfValidatorPass(array('required' => false)),
      'type'        => new sfValidatorPass(array('required' => false)),
      'reputation'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'biography'   => new sfValidatorPass(array('required' => false)),
      'location'    => new sfValidatorPass(array('required' => false)),
      'website'     => new sfValidatorPass(array('required' => false)),
      'age'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'user_id'     => 'ForeignKey',
      'email_new'   => 'Text',
      'firstname'   => 'Text',
      'lastname'    => 'Text',
      'validate_at' => 'Date',
      'validate'    => 'Text',
      'type'        => 'Text',
      'reputation'  => 'Number',
      'biography'   => 'Text',
      'location'    => 'Text',
      'website'     => 'Text',
      'age'         => 'Number',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
