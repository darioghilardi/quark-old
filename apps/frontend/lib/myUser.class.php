<?php

class myUser extends sfGuardSecurityUser
{
  /**
   * Check if a user can vote up
   */
  public function canVoteUp($user_id)
  {
    if ($user_id != 'anonymous')
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  /**
   * Check if a user can vote up
   */
  public function canVoteDown($user_id)
  {
    if ($user_id != 'anonymous')
    {
      return true;
    }
    else
    {
      return false;
    }
  }
}
