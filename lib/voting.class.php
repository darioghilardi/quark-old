<?php

/**
 * Class voting
 *
 * Handle voting for questions and answers.
 */
class voting
{
  function __construct($id, $user_id)
  {
    $this->id = $id;
    $this->user_id = $user_id;
  }

  /**
   * Generate the correct buttons to vote up on questions looking into the database for existing votes.
   *
   * @return string $up
   */
  public function preprocessQuestionVoteUp($av)
  {
    if (empty($av) || $av[0]["value"] == '0' || $av[0]["value"] == '-1')
    {
      $up = "up";
    }
    elseif ($av[0]["value"] == '1')
    {
      $up = "undo";
    }
    return $up;
  }

  /**
   * Generate the correct buttons to vote down on questions looking into the database for existing votes.
   *
   * @return string
   */
  public function preprocessQuestionVoteDown($av)
  {
    if (empty($av) || $av[0]["value"] == '0' || $av[0]["value"] == '1')
    {
      $down = "down";
    }
    elseif ($av[0]["value"] == '-1')
    {
      $down = "undo";
    }
    return $down;
  }

  /**
   * Execute the vote on a question.
   * 
   * @param int $sign
   */
  public function questionVote($sign)
  {
    // Start a transaction
    $conn = Doctrine_Manager::getInstance()->getCurrentConnection();
		$conn->beginTransaction();
    try
    {
      // Check if this user already voted this question
      $av = Doctrine_Core::getTable('Interest')->getInterestValue($this->user_id, $this->id);

      // Check if this entry is already into the table
      if(empty($av))
      {
        // Update the question interest entries count and update the interest table
        Doctrine_Core::getTable('Question')->updateQuestionInterest($this->id, $sign);
        // Update the interest table
        Doctrine_Core::getTable('Interest')->addInterest($this->user_id, $this->id, $sign);
      }
      elseif (($av[0]["value"] == '1') || ($av[0]["value"] == '0') || ($av[0]["value"] == '-1'))
      {
        $amount = (($av[0]["value"] == 0) ? 1 : 2) * $sign;
        // Update the question interest entries count
        Doctrine_Core::getTable('Question')->updateQuestionInterest($this->id, $amount);

        // Update the interest table
        Doctrine_Core::getTable('Interest')->updateInterest($this->user_id, $this->id, $sign);
      }

      // Commit the transaction
      $conn->commit();
    }
    catch (Exception $e)
    {
      // Rollback and exception
			$conn->rollBack();
			throw $e;
    }
  }

  /**
   * Undo the vote on a question.
   *
   * @param int $sign
   */
  public function questionUndoVote($sign)
  {
    // Start a transaction
    $conn = Doctrine_Manager::getInstance()->getCurrentConnection();
		$conn->beginTransaction();
    try
    {
      // Check if this user already voted this question
      $av = Doctrine_Core::getTable('Interest')->getInterestValue($this->user_id, $this->id);

      if (($av[0]["value"] == '1') || ($av[0]["value"] == '0') || ($av[0]["value"] == '-1'))
      {
        // Update the question interest entries count
        Doctrine_Core::getTable('Question')->updateQuestionInterest($this->id, $sign);

        // Update the interest table
        Doctrine_Core::getTable('Interest')->updateInterest($this->user_id, $this->id, 0);
      }

      // Commit the transaction
      $conn->commit();
    }
    catch (Exception $e)
    {
      // Rollback and exception
			$conn->rollBack();
			throw $e;
    }
  }

  /**
   * Generate the correct buttons to vote up on answers looking into the database for existing votes.
   *
   * @return string $up
   */
  public function preprocessAnswerVoteUp($av)
  {
    if (empty($av) || $av[0]["value"] == '0' || $av[0]["value"] == '-1')
    {
      $up = "up";
    }
    elseif ($av[0]["value"] == '1')
    {
      $up = "undo";
    }
    return $up;
  }

  /**
   * Generate the correct buttons to vote down on answers looking into the database for existing votes.
   *
   * @return string
   */
  public function preprocessAnswerVoteDown($av)
  {
    if (empty($av) || $av[0]["value"] == '0' || $av[0]["value"] == '1')
    {
      $down = "down";
    }
    elseif ($av[0]["value"] == '-1')
    {
      $down = "undo";
    }
    return $down;
  }

  /**
   * Execute the vote on an answer.
   *
   * @param int $sign
   */
  public function answerVote($sign)
  {
    // Start a transaction
    $conn = Doctrine_Manager::getInstance()->getCurrentConnection();
		$conn->beginTransaction();
    try
    {
      // Check if this user already voted this question
      $av = Doctrine_Core::getTable('Rating')->getRatingValue($this->user_id, $this->id);

      // Check if this entry is already into the table
      if(empty($av))
      {
        // Update the question interest entries count
        Doctrine_Core::getTable('Answer')->updateAnswerRating($this->id, $sign);

        // Update the rating table
        Doctrine_Core::getTable('Rating')->addRating($this->user_id, $this->id, $sign);
      }
      elseif (($av[0]["value"] == '1') || ($av[0]["value"] == '0') || ($av[0]["value"] == '-1'))
      {
        $amount = (($av[0]["value"] == 0) ? 1 : 2) * $sign;

        // Update the question interest entries count
        Doctrine_Core::getTable('Answer')->updateAnswerRating($this->id, $amount);

        // Update the rating table
        Doctrine_Core::getTable('Rating')->updateRating($this->user_id, $this->id, $sign);
      }

      // Commit the transaction
      $conn->commit();
    }
    catch (Exception $e)
    {
      // Rollback and exception
			$conn->rollBack();
			throw $e;
    }
  }

  /**
   * Undo the vote on an answer.
   *
   * @param int $sign
   */
  public function answerUndoVote($sign)
  {
    // Start a transaction
    $conn = Doctrine_Manager::getInstance()->getCurrentConnection();
		$conn->beginTransaction();
    try
    {
      // Check if this user already voted this question
      $av = Doctrine_Core::getTable('Rating')->getRatingValue($this->user_id, $this->id);

      if (($av[0]["value"] == '1') || ($av[0]["value"] == '0') || ($av[0]["value"] == '-1'))
      {
        // Update the answer votes count
        Doctrine_Core::getTable('Answer')->updateAnswerRating($this->id, $sign);

        // Update the rating table
        Doctrine_Core::getTable('Rating')->updateRating($this->user_id, $this->id, 0);
      }

      // Commit the transaction
      $conn->commit();
    }
    catch (Exception $e)
    {
      // Rollback and exception
			$conn->rollBack();
			throw $e;
    }
  }
}

?>
