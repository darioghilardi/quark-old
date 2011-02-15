<?php

class questionComponents extends sfComponents
{
  /**
   * Create the widget but check for already existing votes.
   */
  public function executeQuestionVoteWidget()
  {
    // Take user_id and question_id
    $user_id = $this->getUser()->getGuardUser()->getId();
    $qid = $this->question->getId();

    // Check if a vote already exists
    $av = Doctrine_Core::getTable('Interest')->getInterestValue($user_id, $qid);

    // Enable/disable vote buttons
    if (empty($av) || $av[0]["value"] == '0')
    {
      $this->up = true;
      $this->down = true;
    }
    elseif ($av[0]["value"] == '1')
    {
      $this->up = false;
      $this->down = true;
    }
    elseif ($av[0]["value"] == '-1')
    {
      $this->up = true;
      $this->down = false;
    }    
  }
}

?>
