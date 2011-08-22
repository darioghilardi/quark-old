<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';

$t = new lime_test(9);

$t->comment('::slugify()');
$t->is(Quark::slugify('Sensio'), 'sensio', '::slugify() converts all characters to lower case');
$t->is(Quark::slugify('sensio labs'), 'sensio-labs', '::slugify() replaces a white space by a -');
$t->is(Quark::slugify('sensio   labs'), 'sensio-labs', '::slugify() replaces several white spaces by a single -');
$t->is(Quark::slugify('  sensio'), 'sensio', '::slugify() removes - at the beginning of a string');
$t->is(Quark::slugify('sensio  '), 'sensio', '::slugify() removes - at the end of a string');
$t->is(Quark::slugify('paris,france'), 'paris-france', '::slugify() replaces non-ASCII characters by a -');
$t->is(Quark::slugify(''), 'n-a', '::slugify() replace an empty line with "n-a"');
$t->is(Quark::slugify(' - '), 'n-a', '::slugify() converts a string that only contains non-ASCII characters to n-a');

if (function_exists('iconv'))
{
  $t->is(Quark::slugify('Développeur Web'), 'developpeur-web', '::slugify() removes accents');
}
else
{
  $t->skip('::slugify() removes accents - iconv not installed');
}

?>