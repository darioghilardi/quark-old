<?php

include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');

$t = new lime_test(9);


$t->comment('->getInterestValue()');
// Create a new interest object and save it
$i = createInterest(array('value' => '1'));
$i->save();
// Extract the value for the submitted interest and check if the value is equal to the one submitted
$interest = Doctrine_Core::getTable('Interest')->getInterestValue($i->user_id, $i->question_id);
$t->is($interest[0]["value"], 1, '->getInterestValue() check if the interest positive value is correct.');
// Clean the table to avoid problems with following tests
Doctrine::getTable('Interest')->findBy('id', $i->id)->delete();


// Create a new interest object and save it
$i = createInterest(array('value' => '-1'));
$i->save();
// Extract the value for the submitted interest and check if the value is equal to the one submitted
$interest = Doctrine_Core::getTable('Interest')->getInterestValue($i->user_id, $i->question_id);
$t->is($interest[0]["value"], -1, '->getInterestValue() check if the interest negative value is correct.');
// Clean the table to avoid problems with following tests
Doctrine::getTable('Interest')->findBy('id', $i->id)->delete();


// Create a new interest object and save it
$i = createInterest(array('value' => '0'));
$i->save();
// Extract the value for the submitted interest and check if the value is equal to the one submitted
$interest = Doctrine_Core::getTable('Interest')->getInterestValue($i->user_id, $i->question_id);
$t->is($interest[0]["value"], 0, '->getInterestValue() check if the interest equal to zero value is correct.');
// Clean the table to avoid problems with following tests
Doctrine::getTable('Interest')->findBy('id', $i->id)->delete();


$t->comment('->updateInterest()');
// Create a new interest object and save it
$i = createInterest(array('value' => '1'));
$i->save();
// Update the interest on the previously added row and extract it
Doctrine_Core::getTable('Interest')->updateInterest($i->user_id, $i->question_id, -1);
$interest = Doctrine_Core::getTable('Interest')->find($i->id);
$t->is($interest->value, -1, '->updateInterest() negative update for interest.');
// Clean the table to avoid problems with following tests
Doctrine::getTable('Interest')->findBy('id', $i->id)->delete();


// Create a new interest object and save it
$i = createInterest(array('value' => '0'));
$i->save();
// Update the interest on the previously added row and extract it
Doctrine_Core::getTable('Interest')->updateInterest($i->user_id, $i->question_id, -1);
$interest = Doctrine_Core::getTable('Interest')->find($i->id);
$t->is($interest->value, -1, '->updateInterest() negative update from zero for interest.');
// Clean the table to avoid problems with following tests
Doctrine::getTable('Interest')->findBy('id', $i->id)->delete();


// Create a new interest object and save it
$i = createInterest(array('value' => '-1'));
$i->save();
// Update the interest on the previously added row and extract it
Doctrine_Core::getTable('Interest')->updateInterest($i->user_id, $i->question_id, 1);
$interest = Doctrine_Core::getTable('Interest')->find($i->id);
$t->is($interest->value, 1, '->updateInterest() positive update for interest.');
// Clean the table to avoid problems with following tests
Doctrine::getTable('Interest')->findBy('id', $i->id)->delete();


$t->comment('->addInterest()');
// Call addInterest with required parameters
$user = getUser();
$question = getQuestion();
$id = Doctrine_Core::getTable('Interest')->addInterest($user->id, $question->id, 1);
// Get submitted value
$interest = Doctrine_Core::getTable('Interest')->find($id);
$t->is($interest->value, 1, '->addInterest() positive insert for interest.');
// Clean the table to avoid problems with following tests
Doctrine::getTable('Interest')->find($id)->delete();


// Call addInterest with required parameters
$user = getUser();
$question = getQuestion();
$id = Doctrine_Core::getTable('Interest')->addInterest($user->id, $question->id, -1);
// Get submitted value
$interest = Doctrine_Core::getTable('Interest')->find($id);
$t->is($interest->value, -1, '->addInterest() negative insert for interest.');
// Clean the table to avoid problems with following tests
Doctrine::getTable('Interest')->find($id)->delete();


// Call addInterest with required parameters
$user = getUser();
$question = getQuestion();
$id = Doctrine_Core::getTable('Interest')->addInterest($user->id, $question->id, 0);
// Get submitted value
$interest = Doctrine_Core::getTable('Interest')->find($id);
$t->is($interest->value, 0, '->addInterest() zero insert for interest.');
// Clean the table to avoid problems with following tests
Doctrine::getTable('Interest')->find($id)->delete();

function createInterest ($defaults = array())
{
  static $user = null;
  static $question = null;

  if (is_null($user))
    $user = getUser();

  if (is_null($question))
    $question = getQuestion();

  $i = new Interest();
  $i->fromArray(array_merge(array(
    'user_id'           => $user->getId(),
    'question_id'       => $question->getId(),
    'created_at'        => '2005-04-06 15:43:34',
  ), $defaults));

  return $i;
}

function getUser()
{
  $user = Doctrine_Core::getTable('sfGuardUser')
    ->createQuery()
    ->limit(1)
    ->fetchOne();
  return $user;
}

function getQuestion()
{
  $question = Doctrine_Core::getTable('Question')
    ->createQuery()
    ->limit(1)
    ->fetchOne();
  return $question;
}

?>
