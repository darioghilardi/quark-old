<?php

class myUser extends sfGuardSecurityUser
{
  /**
   * checkPermission: check permissions against a user
   */
  public function checkPermission($perm_name)
  {
    if ($this->isAuthenticated())
    {
      $reputation = $this->getGuardUser()->getProfile()->getReputation();
      $requirement = sfConfig::get('app_'.$perm_name);
      if ($reputation >= $requirement)
        return true;
      else
        return false;
    }
    else
    {
      return false;
    }
  }
}
