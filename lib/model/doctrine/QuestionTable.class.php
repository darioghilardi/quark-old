<?php

/**
 * QuestionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class QuestionTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object QuestionTable
   */
  public static function getInstance()
  {
      return Doctrine_Core::getTable('Question');
  }

  /**
   * Build the query necessary to make the search by tags
   */
  public function getQuestionByTagsQuery($tags, $order)
  {
    // Define ordering
    if ($order == 'latest')
      $order = 'q.created_at DESC';
    elseif($order == 'views')
      $order = 'q.views DESC';
    elseif($order == 'rated')
      $order = 'q.interested_users DESC';

    $values = $this->getQuestionIdByTagsArray($tags, $order);    

    // Return false if there're no results
    if(empty($values))
      return false;

    // Build the full query
    foreach ($values as $id)
      $ids[] = $id['id'];

    $q = Doctrine_Query::create()
      ->from('Question q')
      ->leftJoin('q.QuestionTag qt')
      ->leftJoin('qt.Tag t')
      ->whereIn('q.id', $ids)
      ->orderBy($order);
    
    return $q;
  }

  /**
   * Get the question ids by tags, called by the previous function
   */
  public function getQuestionIdByTagsArray($tags, $order)
  {
    $sub = Doctrine_Query::create()
      ->select('q.id')
      ->from('Question q')
      ->leftJoin('q.QuestionTag qt')
      ->leftJoin('qt.Tag t');

    if (!empty($tags))
      $tags = Tagged::prepareTags($tags);
    else
      $tags = null;

    if (count($tags) > 1)
    {
      $num_tags = count($tags);
      $sub->whereIn('t.name', $tags);
      $sub->groupBy('t.name');
      $sub->having('COUNT(*) = ?', $num_tags);
    }
    elseif(count($tags) == 1)
    {
      $sub->where('t.name = ?', $tags);
    }

    $sub->orderBy($order);
    return $sub->fetchArray();
  }

  /**
   * Execute an update for the interested users counter.
   */
  public function updateQuestionInterest($qid, $amount)
  {
    $q = Doctrine_Query::create()
      ->update('Question q')
      ->set('q.interested_users','q.interested_users + ?', $amount)
      ->where('q.id = ?',$qid);
    return $q->execute();
  }

  /**
   * Get number of questions with at least an answer.
   */
  public function getQuestionWithAnswer()
  {
    $q = Doctrine_Query::create()
      ->select('DISTINCT a.question_id as qid')
      ->from('Answer a');
    $values = $q->fetchArray();
    return count($values);
  }

  /**
   * Get the last 10 questions for a given user id.
   */
  public function getLastTenByUserId($user_id)
  {
    $q = Doctrine_Query::create()
      ->from('Question q')
      ->where('q.user_id = ?', $user_id)
      ->limit(10);
    return $q->execute();
  }
  
  /**
   * Get the tags assigned to a question.
   */
  public function getTagsForQuestion($question)
  {
    // Get tag id for the question
    $q = Doctrine_Query::create()
      ->from('QuestionTag qt')
      ->where('qt.question_id = ?', $question);
    $tagsArray = $q->fetchArray();
    
    // Get tag name from the id
    $tags = '';
    foreach ($tagsArray as $tag) {
      $tags .= Tag::getTagNameByid($tag['tag_id'])." ";
    }
    
    return $tags;
  }
}