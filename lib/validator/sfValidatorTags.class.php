<?php
/**
 * sfValidatorTags validates whether a list of tags added to the form is correct and can be submitted.
 */
class sfValidatorTags extends sfValidatorString
{
  /**
   * Configures the current validator.
   *
   * @see sfValidatorBase
   */
  protected function configure($options = array(), $messages = array())
  {
    $this->addMessage('too_much', 'You can add at most 5 tags for a single question.');
    $this->addMessage('not_empty', 'You should add at least one tag.');
    parent::configure($options, $messages);
  }

  /**
   * Validates and cleans the date.
   *
   * @see sfValidatorBase
   */
  protected function doClean($value)
  {
    $value = parent::doClean($value);
    $value = str_replace (array ('?', '$', '%', ',', ';', '.'), ' ', $value);
    $tags = Tagged::smartExplode(' ', $value);
    if (count($tags) > 5)
    {
      throw new sfValidatorError($this, 'too_much');
    }
    elseif (count($tags) < 1)
    {
      throw new sfValidatorError($this, 'not_empty');
    }
    return $value;
  }
}