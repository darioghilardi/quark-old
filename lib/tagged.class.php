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
  public static function addRemoveQuestionTagsRelation($question, $tags)
  {  
    // Convert all tags in tags ids
    foreach ($tags as $tag) {
      $tagids[] = Tag::getTagIdByName($tag);
    }   
    
    // Remove old tags
    // Get existing tags from db
    $existings = QuestionTag::getQuestionTagIds($question->id);
    foreach ($existings as $existing)
    {
        if (!in_array($existing['tag_id'], $tagids)) {
          QuestionTag::removeRemovedTags($existing['question_id'], $existing['tag_id']);
        }
    }
      
    // Add new tags  
    foreach ($tagids as $tag)
    {
      if (Doctrine::getTable('QuestionTag')->avoidDuplicated($question->id, $tag)) {
        $qt = new QuestionTag();
        $qt->question_id = $question->id;
        $qt->tag_id = $tag;
        $qt->save();
      }
    }
  }

  /**
   * Prepare tags for the filtering query
   */
  public static function prepareTags($tag_string)
  {
    $tag_string = str_replace('+', ' ', $tag_string);
    $tags = Tagged::smartExplode(' ', $tag_string);
    if ($tags)
      return $tags;
    else
      return null;
  }

  /**
   * Adds the current tag to the url (if not already existent) to enable tags filtering
   */
  public static function addTagsToUrl($request, $tag_name)
  {
    $tags_string = $request->get('tags');
    if ($tags_string)
    {
      $tags = str_replace('+', ' ', $tags_string);
      $tags = Tagged::smartExplode(' ', $tags);
      if (in_array($tag_name, $tags))
        return url_for('@question_list_tags?tags='.$tags_string);
      else
        return url_for('@question_list_tags?tags='.$tags_string.'+'.$tag_name);
    }
    else
    {
      return url_for('@question_list_tags?tags='.$tag_name);
    }
  }
}

?>