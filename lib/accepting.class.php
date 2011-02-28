<?php

/**
 * Class voting
 *
 * Handle accepting for answers.
 */
class accepting
{
  function __construct($aid, $qid)
  {
    $this->id = $aid;
    $this->question_id = $qid;
  }

  /**
   * Show the links to accept an answer.
   *
   * @return string $up
   */
  public function preprocessAccepting($av)
  {
    if (!empty($av[0]['id']))
      return 'static';
    else
      return 'link';
  }

  /**
   * Mark an answer as accepted.
   */
  public function markAccepted($av)
  {
    // Start a transaction
    $conn = Doctrine_Manager::getInstance()->getCurrentConnection();
		$conn->beginTransaction();
    try
    {
      // Check if this entry is already into the table
      if(empty($av[0]['id']))
      {
        // Add a new entry into the accept table
        Doctrine_Core::getTable('Accept')->addAccept($this->id, $this->question_id);
      }
      else
      {
        // Update the existing accept table entry
        Doctrine_Core::getTable('Accept')->updateAccept($this->id, $this->question_id);
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
