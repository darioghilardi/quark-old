<?php

/**
 * Builds a gravatar url.
 *
 * @param string $email The user email.
 * @param integer $size The gravatar size.
 * @param string $rating The gravatar rating.
 * @param string $default The default image to use if the email does not have a gravatar image.
 * # 404: do not load any image if none is associated with the email hash, instead return an HTTP 404 (File Not Found) response
 * # mm: (mystery-man) a simple, cartoon-style silhouetted outline of a person (does not vary by email hash)
 * # identicon: a geometric pattern based on an email hash
 * # monsterid: a generated 'monster' with different colors, faces, etc
 * # wavatar: generated faces with differing features and backgrounds
 * # retro: aweso
 *
 * @return string The gravatar image url.
 */
function _build_url($email, $size, $rating, $default)
{
  $url = 'http://www.gravatar.com/avatar/';

  $email_hash = md5(trim(strtolower($email)));

  $url .= $email_hash;

  $params_added = false;
  if ($size >= 1 && $size <= 512)
  {
    $url .= "?s=$size";
    $params_added = true;
  }

  if ($rating == 'g' || $rating == 'pg' || $rating == 'r' || $rating == 'x')
  {
    $url .= ($params_added?'&':'?')."r=$rating";
  }

  if (!is_null(($default)))
  {
    $url .= ($params_added?'&':'?')."d=$default";
  }

  return $url;
}

/**
 * Builds a gravatar url.
 *
 * @param string $email The user email.
 * @param integer $size The gravatar size.
 * @param string $rating The gravatar rating.
 * @param string $default The default image to use if the email does not have
 *                        a gravatar image.
 *
 * @return string The gravatar image url.
 */
function gravatar_url($email, $size = 80, $rating = 'g', $default = null)
{
  return _build_url($email, $size, $rating, $default);
}

/**
 * Builds an <img> tag using a gravatar image.
 *
 * @param string $email The user email.
 * @param integer $size The gravatar size.
 * @param string $rating The gravatar rating.
 * @param string $default The default image to use if the email does not have
 *                        a gravatar image.
 *
 * @return string The gravatar image url.
 */
function gravatar($email, $size = 80, $rating = 'g', $default = null)
{
  return image_tag(gravatar_url($email, $size, $rating, $default));
}

/**
 * Builds an <a //..> </a> tag to gravatar user profile
 *
 * @param string $email The user email.
 * @param strin $text The text for link
 * 
 * @return string The gravatar profile related at $email
 */
function gravatar_profile($email, $text = 'User profile')
{
	if(isset($email)){
		$url = 'http://www.gravatar.com/';
	  $email_hash = md5(trim(strtolower($email)));
	  
	  $url .= $email_hash;
	}else{
	  $url='';
	}
  
  return link_to($text,$url);
}