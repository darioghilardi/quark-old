<?php

class answerComponents extends sfComponents
{
  /**
   * Create the widget for answers but check for already existing votes and for permissions based on reputation.
   */
  public function executeAnswerVoteWidget()
  {
    // Take user_id and question_id
    $user_id = (!$this->getUser()->isAuthenticated()) ? "anonymous": $this->getUser()->getGuardUser()->getId();
    $aid = $this->answer->getId();

    // Check if a vote already exists
    $av = Doctrine_Core::getTable('Rating')->getRatingValue($user_id, $aid);
    
    // Istantiate the voting class
    $v = new voting($aid, $user_id);

    // Check for user permissions and existing votes.
    // Return the values for up and down that needs to ba passed to the template.
    $this->up = ($this->getUser()->canVoteUpAnswer($user_id)) ? $v->preprocessAnswerVoteUp($av) : false;
    $this->down = ($this->getUser()->canVoteDownAnswer($user_id)) ? $v->preprocessAnswerVoteDown($av) : false;
  }
}

?>