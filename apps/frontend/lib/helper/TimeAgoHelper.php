<?php

/**
 * Given a time, return the "time ago" result.
 */
function timesince($original) // $original should be the original date and time in Unix format
{
    // Common time periods as an array of arrays
    $periods = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
    );

    $today = time();
    $since = $today - $original; // Find the difference of time between now and the past

    // Loop around the periods, starting with the biggest
    for ($i = 0, $j = count($periods); $i < $j; $i++)
        {
        $seconds = $periods[$i][0];
        $name = $periods[$i][1];

        // Find the biggest whole period
        if (($count = floor($since / $seconds)) != 0)
                {
            break;
        }
    }

    $output = ($count == 1) ? '1 '.$name : "$count {$name}s";

    if ($i + 1 < $j)
        {
        // Retrieving the second relevant period
        $seconds2 = $periods[$i + 1][0];
        $name2 = $periods[$i + 1][1];

        // Only show it if it's greater than 0
        if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0)
                {
            $output .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";
        }
    }
    return $output;
}