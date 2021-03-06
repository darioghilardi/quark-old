<?php

/**
 * Question form.
 *
 * @package    quark
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuestionForm extends BaseQuestionForm
{
  public function configure()
  {
		unset(
      $this['created_at'],
      $this['updated_at'],
      $this['interested_users']
    );

    // Add tag field
    $this->widgetSchema['tags'] = new sfWidgetFormInputText();
    $this->validatorSchema['tags'] = new sfValidatorTags(array('required' => true));
  }
}
