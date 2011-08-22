<?php
/**
 * Quark utility methods.
 *
 * slugify: convert a text into a slug.
 * question_log: add a new entry into the question_log file to count question views.
 */

class Quark
{
  /**
   * Slugify: convert a text into a slug.
   *
   * @param string $text The text that has to converted.
   * @return $text The slugified text.
   */
	static public function slugify($text)
  {
		// Substitute everything except letters and points with -
		$text = preg_replace('#[^\\pL\d]+#u', '-', $text);

		// Delete spaces
		$text = trim($text, '-');

    // Transliteration (accents)
    if (function_exists('iconv'))
    {
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }

    // Make lowercase
    $text = strtolower($text);

    // Take off unwanted characters
    $text = preg_replace('#[^-\w]+#', '', $text);

    // Substitute an empty line with "n-a"
    if (empty($text))
    {
      return 'n-a';
    }

		return $text;
	}

  /**
   * question_log: add a new entry into the question_log file to count question views.
   *
   * @param string $question The question object.
   */
  static public function question_log($question_id)
  {
    // Execute the logging
    $logPath = sfConfig::get('sf_log_dir').'/question_views.log';
    $custom_logger = new sfFileLogger(new sfEventDispatcher(), array('file' => $logPath, 'format' => '%message%%EOL%'));
    $message = $question_id . " " . $_SERVER['REMOTE_ADDR'];
    $custom_logger->log($message);
  }
}

?>
