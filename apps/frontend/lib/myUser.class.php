<?php

class myUser extends sfGuardSecurityUser
{
  /**
   * Check if a user can vote up on questions
   */
  public function canVoteUpQuestion($user_id)
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
   * Check if a user can vote down on questions
   */
  public function canVoteDownQuestion($user_id)
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
   * Check if a user can vote up on answers
   */
  public function canVoteUpAnswer($user_id)
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
   * Check if a user can vote down on answer
   */
  public function canVoteDownAnswer($user_id)
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
