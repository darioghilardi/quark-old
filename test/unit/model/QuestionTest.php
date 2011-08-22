<?php

include(dirname(__FILE__).'/../../bootstrap/Doctrine.php');

$t = new lime_test(4);

$t->comment('->getTitleSlug()');
$question = Doctrine_Core::getTable('Question')->createQuery()->fetchOne();
$t->is($question->getTitleSlug(), Quark::slugify($question->getTitle()), '->getTitleSlug() return the slug for the title');


$t->comment('->updateQuestionInterest()');
// Create a new question object and save it
$q = createQuestion();
$q->save();
// Add an amount value that increases the interested_users counter and evaluate the expected counter
$expectedinterest = $q->interested_users + 4;
// Execute the updateQuestionInterest() method
Doctrine_Core::getTable('Question')->updateQuestionInterest($q->getId(), 4);
// Get the value from the db to check that is correctly increased
$question = Doctrine_Core::getTable('Question')->find($q->getId());
$t->is($question->interested_users, $expectedinterest, '->updateQuestionInterest() check if the interested users counter increase by amount.');


// Create a new question object and save it
$q = createQuestion();
$q->save();
// Add an amount value that increases the interested_users counter and evaluate the expected counter
$expectedinterest = $q->interested_users + (-2);
// Execute the updateQuestionInterest() method
Doctrine_Core::getTable('Question')->updateQuestionInterest($q->getId(), -2);
// Get the value from the db to check that is correctly increased
$question = Doctrine_Core::getTable('Question')->find($q->getId());
$t->is($question->interested_users, $expectedinterest, '->updateQuestionInterest() check if the interested users counter decrease by amount.');


// Create a new question object and save it
$q = createQuestion();
$q->save();
// Add an amount value that increases the interested_users counter and evaluate the expected counter
$expectedinterest = $q->interested_users + (-6);
// Execute the updateQuestionInterest() method
Doctrine_Core::getTable('Question')->updateQuestionInterest($q->getId(), -6);
// Get the value from the db to check that is correctly increased
$question = Doctrine_Core::getTable('Question')->find($q->getId());
$t->is($question->interested_users, $expectedinterest, '->updateQuestionInterest() check if the interested users counter decrease to negative values correctly.');


function createQuestion ($defaults = array())
{
  static $user = null;

  if (is_null($user))
  {
    $user = Doctrine_Core::getTable('sfGuardUser')
      ->createQuery()
      ->limit(1)
      ->fetchOne();
  }

  $question = new Question();
  $question->fromArray(array_merge(array(
    'user_id'           => $user->getId(),
    'title'             => 'What is this question?',
    'body'              => 'This is just a test question to be used into tests.',
    'views'             => '4',
    'created_at'        => '2005-04-06 15:43:34',
    'updated_at'        => '2005-04-06 15:43:34',
    'interested_users'  => '3',
  ), $defaults));

  return $question;
}
?>
