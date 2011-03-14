<?php

class questionComponents extends sfComponents
{
  /**
   * Create the widget for questions but check for already existing votes and for permissions based on reputation.
   */
  public function executeQuestionVoteWidget()
  {
    // Take user_id and question_id
    $user_id = (!$this->getUser()->isAuthenticated()) ? 'anonymous': $this->getUser()->getGuardUser()->getId();
    $qid = $this->question->getId();

    // Check if a vote already exists
    $av = Doctrine_Core::getTable('Interest')->getInterestValue($user_id, $qid);

    // Istantiate the voting class
    $v = new voting($qid, $user_id);

    // Check for user permissions and existing votes if the user is logged in.
    // Return the values for up and down that needs to ba passed to the template.
    if ($user_id == 'anonymous')
    {
      $this->up = 'anonymous';
      $this->down = 'anonymous';
    }
    else
    {
      $this->up = ($this->getUser()->checkPermission('vote_up')) ? $v->preprocessQuestionVoteUp($av) : false;
      $this->down = ($this->getUser()->checkPermission('vote_down')) ? $v->preprocessQuestionVoteDown($av) : false;
    }
  }

  /**
   * Create the block for questions stats.
   */
  public function executeBlockQuestionStats()
  {
    // Populate variables
    $this->nquestion = Doctrine_Core::getTable('Question')->count();
    $this->percentwithanswer = number_format(Doctrine_Core::getTable('Question')->getQuestionWithAnswer() / $this->nquestion, 2);
    $this->percentwithaccepted = number_format(Doctrine_Core::getTable('Accept')->count() / $this->nquestion, 2);
  }

  /**
   * Create the block for recent tags.
   */
  public function executeBlockRecentTags()
  {
    $this->tags = Doctrine_Core::getTable('Tag')->getRecentTags();
  }

}

?>