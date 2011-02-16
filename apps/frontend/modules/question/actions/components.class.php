<?php

class questionComponents extends sfComponents
{
  /**
   * Create the widget but check for already existing votes.
   */
  public function executeQuestionVoteWidget()
  {
    // Take user_id and question_id
    $user_id = (!$this->getUser()->isAuthenticated()) ? "anonymous": $this->getUser()->getGuardUser()->getId();
    $qid = $this->question->getId();

    // Check for user permissions
    $voteup = $this->getUser()->canVoteUp($user_id);
    $votedown = $this->getUser()->canVoteUp($user_id);

    // Check if a vote already exists
    $av = Doctrine_Core::getTable('Interest')->getInterestValue($user_id, $qid);

    // Enable/disable vote buttons using permissions and old votes
    if (empty($av) || $av[0]["value"] == '0')
    {
      $this->up = ($voteup) ? true : false;
      $this->down = ($votedown) ? true : false;
    }
    elseif ($av[0]["value"] == '1')
    {
      $this->up = ($voteup) ? "clear" : false;
      $this->down = ($votedown) ? true : false;
    }
    elseif ($av[0]["value"] == '-1')
    {
      $this->up = ($voteup) ? true : false;
      $this->down = ($votedown) ? "clear" : false;
    }    
  }
}

?>