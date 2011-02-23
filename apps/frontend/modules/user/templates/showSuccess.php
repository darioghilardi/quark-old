<?php slot('title', sprintf('%s', $user->getUsername())); ?>
<?php use_helper('Text') ?>
<?php use_helper('Gravatar') ?>

<div id="showSuccess">
	<div id="user-single-content" class="col-18">
	  <h1 id="page-title"><?php echo $user->getUsername(); ?></h1>
	  
	  <div id="user-info">
      <ul>
	      <li><?php echo $user->getFirst_name();?></li>
	      <li><?php echo $user->getLast_name();?></li>
	      <li><?php echo $user->getEmail_address();?></li>
	      <li><?php echo gravatar($user->getEmail_address(), 128);

	      echo gravatar_profile($user->getEmail_address(), 'Edit Gravatar')?></li>
	    </ul>
	  </div>
	  
	  <div id="user-questions">
	   <h3><span><?php echo rand(1,99); ?></span> Questions</h3>
    </div>
    
    <div id="user-answers">
      <h3><span><?php echo rand(1,99); ?></span> Answers</h3>
    </div>

    <div id="user-tags">
      <h3><span><?php echo rand(1,99); ?></span> Tags</h3>
    </div>
    
    <div id="user-basges">
      <h3><span><?php echo rand(1,99); ?></span> Badges</h3>
    </div>

	</div>
	    
	<div id="sidebar" class="col-6">
    <?php include_partial('question/question_block', array('title' => 'Introduzione a Quark', 'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for  will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like')) ?>
    <?php include_partial('question/question_block', array('title' => 'Come partecipare', 'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using  making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for  will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)')) ?>
    <?php include_partial('question/question_block', array('title' => 'Collabora', 'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).')) ?>
	</div>
	
</div>