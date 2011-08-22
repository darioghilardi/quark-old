<?php
/**
 * sfApplyActions extends BasesfApplyActions
 */
require_once(sfConfig::get('sf_plugins_dir').'/sfForkedDoctrineApplyPlugin/modules/sfApply/lib/BasesfApplyActions.class.php');
class sfApplyActions extends BasesfApplyActions
{
  public function executeSettings(sfRequest $request)
  {
    // sfApplySettingsForm inherits from sfApplyApplyForm, which
    // inherits from sfGuardUserProfile. That minimizes the amount
    // of duplication of effort. If you want, you can use a different
    // form class. I suggest inheriting from sfApplySettingsForm and
    // making further changes after calling parent::configure() from
    // your own configure() method.

    $profile = $this->getUser()->getProfile();
    // we're getting default or customized settingsForm for the task
    if( !( ($this->form = $this->newForm( 'settingsForm', $profile) ) instanceof sfGuardUserProfileForm) )
    {
      // if the form isn't instance of sfApplySettingsForm, we don't accept it
      throw new InvalidArgumentException( sfContext::getInstance()->
          getI18N()->
          __( 'The custom %action% form should be instance of %form%',
                  array( '%action%' => 'settings',
                      '%form%' => 'sfApplySettingsForm' ), 'sfForkedApply' )
          );
    }
    if ($request->isMethod('post'))
    {
      $this->form->bind( $request->getParameter( $this->form->getName() ), $request->getFiles($this->form->getName()) );
      if ($this->form->isValid())
      {
        $this->form->save();
        return $this->redirect('user/show?username='.$this->getUser()->getUsername());
      }
    }
  }
}
?>
