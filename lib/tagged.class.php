<?php

class Tagged
{
  public static function normalize($tag)
  {
    $n_tag = strtolower($tag);

    // remove all unwanted chars
    $n_tag = preg_replace('/[^a-zA-Z0-9]/', '', $n_tag);

    return trim($n_tag);
  }

  public static function smartExplode($exploder, $string, $sort = '')
  {
    if (trim ($string) != '')
    {
      $string = explode ($exploder, $string);
      foreach ($string as $i => $k)
      {
        $string[$i] = trim ($k);
        if ($k == '') unset ($string[$i]);
      }
      $u = array_unique ($string);
      if ('sort' == $sort)
        sort ($u);
      return $u;
    }
    else
    {
      return array ();
    }
  }

  /**
   * Add missing tags to the tag table.
   */

  public static function addTags($tag_string)
  {
    $tag_string = str_replace (array ('?', '$', '%', ',', ';', '.'), '-', $tag_string);
    $tags = Tagged::smartExplode(' ', $tag_string);
    foreach ($tags as $tag)
    {
      if (Doctrine::getTable('Tag')->findOneByName($tag) == NULL)
      {
        $t = new Tag();
        $t->name = Tagged::normalize($tag);
        $t->save();
      }
    }
    return $tags;
  }

  /**
   * Add the QuestionTag relation between provided tags and question.
   */
  public static function addQuestionTagsRelation($question, $tags)
  {
    foreach ($tags as $tag)
    {
      $qt = new QuestionTag();
      $qt->question_id = $question->id;
      $qt->tag_id = Tag::getTagIdByName($tag);
      $qt->save();
    }
  }
}

?>