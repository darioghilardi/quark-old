<?php

class answerComponents extends sfComponents
{
  /**
   * Create the widget for answers but check for already existing votes and for permissions based on reputation.
   */
  public function executeAnswerVoteWidget()
  {
    // Take user_id and answer_id
    $user_id = (!$this->getUser()->isAuthenticated()) ? "anonymous": $this->getUser()->getGuardUser()->getId();
    $aid = $this->answer->getId();

    // Check if a vote already exists
    $av = Doctrine_Core::getTable('Rating')->getRatingValue($user_id, $aid);
    
    // Istantiate the voting class
    $v = new voting($aid, $user_id);

    // Check for user permissions and existing votes if the user is logged in.
    // Return the values for up and down that needs to ba passed to the template.
    if ($user_id == 'anonymous')
    {
      $this->up = 'anonymous';
      $this->down = 'anonymous';
    }
    else
    {
      $this->up = ($this->getUser()->checkPermission('vote_up')) ? $v->preprocessAnswerVoteUp($av) : false;
      $this->down = ($this->getUser()->checkPermission('vote_down')) ? $v->preprocessAnswerVoteDown($av) : false;
    }
  }

  /**
   * Create the widget for accepting an answer.
   */
  public function executeAnswerAcceptWidget()
  {
    // Take user_id and answer_id
    $user_id = (!$this->getUser()->isAuthenticated()) ? "anonymous": $this->getUser()->getGuardUser()->getId();
    $aid = $this->answer->getId();
    $qid = $this->answer->getQuestion()->id;

    // Check if this answer has been already marked as accepted
    $av = Doctrine_Core::getTable('Accept')->checkAccepted($aid);

    // Istantiate the accept class
    $a = new accepting($aid, $qid);

    // The user that makes the question is the only that can accept a question.
    // If the user in the session is him, show links, otherwise show static accepted marker.
    if ($this->answer->getQuestion()->user_id == $user_id)
      $this->accepted = $a->preprocessAccepting($av);
    else
      $this->accepted = ($a->preprocessAccepting($av) == 'link') ? 'NULL' : $a->preprocessAccepting($av);
  }
}

?>