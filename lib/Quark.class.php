<?php
/**
 * Quark utility methods.
 *
 * slugify: convert a text into a slug.
 * question_log: add a new entry into the question_log file to count question views.
 */

class Quark {

  /**
   * Slugify: convert a text into a slug.
   *
   * @param string $text The text that has to converted.
   * @return $text The slugified text.
   */
	static public function slugify($text) {
		// sostituisce tutto tranne lettere e punti con -
		$text = preg_replace('/\W+/', '-', $text);

		// cancella gli spazi e converte in minuscolo
		$text = strtolower(trim($text, '-'));

		return $text;
	}

  /**
   * question_log: add a new entry into the question_log file to count question views.
   *
   * @param string $question The question object.
   */
  static public function question_log($question_id) {

    // Check the remote user, to avoid search engines bots to be counted.


    // Execute the logging
    $logPath = sfConfig::get('sf_log_dir').'/question_views.log';
    $custom_logger = new sfFileLogger(new sfEventDispatcher(), array('file' => $logPath, 'format' => '%message%%EOL%'));
    $message = $question_id . " " . $_SERVER['REMOTE_ADDR'];
    $custom_logger->log($message);
  }
}
?>
