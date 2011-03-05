<?php slot('title', sprintf('%s', $user->getUsername())); ?>
<?php use_helper('Text') ?>
<?php use_helper('Gravatar') ?>

<div id="showSuccess">
	<div id="user-single-content" class="col-24">
	  <h1 id="page-title"><?php echo $user->getUsername(); ?></h1>
	  
	  <div id="user-info" class="clearfix">

	    <?php if ($sf_user->isAuthenticated()): ?>
        <?php if ($sf_user->getGuardUser()->getId() === $user->getId()): ?>
			    <ul id="options-user-info" class="nonespace nonelist clearfix fullwidth boxleft">
				    <li class="boxleft first"><?php echo link_to('Edit own profile', '@settings');?></li>
			      <li class="boxleft"><?php echo link_to('Change password', '@reset');?></li>
			      <li class="boxleft last"><?php echo gravatar_profile($user->getEmail_address(), 'Edit Gravatar')?></li>
			    </ul>
        <?php endif;?>
      <?php endif;?>
	    
      <ul id="avatar-user-sinfo" class="nonespace nonelist boxleft">
        <li class="boxleft"><?php echo gravatar($user->getEmail_address(), 128);?></li>
      </ul>
      
      <ul id="info-user-info" class="nonespace nonelist col-4 boxleft">
        <li class="reputation"><span class="label">Reputation</span><?php echo rand(200,200000)?></li>
        <?php if($user->getProfile()->getFirstname() != ''): ?>
          <li class="firstname"><span class="label">First name</span><?php print $user->getProfile()->getFirstname(); ?></li><?php endif; ?>
        
        <?php if($user->getProfile()->getLastname() != ''): ?>
          <li class="lastname"><span class="label">Last name</span><?php print $user->getProfile()->getLastname(); ?></li><?php endif; ?>

        <?php if($user->getProfile()->getAge() != ''): ?>
          <li class="age"><span class="label">Age</span><?php print $user->getProfile()->getAge(); ?></li><?php endif; ?>
        
        <?php if($user->getProfile()->getLocation() != ''): ?>
          <li class="location"><span class="label">Location</span><?php print $user->getProfile()->getLocation(); ?></li><?php endif; ?>
        
        <?php if($user->getProfile()->getWebsite() != ''): ?>
          <li class="website"><span class="label">Web Site</span><?php print link_to($user->getProfile()->getWebsite(),$user->getProfile()->getWebsite()); ?></li><?php endif; ?>
        
      </ul>
      <ul id="other-user-info" class="nonespace nonelist col-10 boxleft">
        <?php if($user->getProfile()->getBiography() != ''): ?>
          <li class="biography"><?php echo $user->getProfile()->getBiography(); ?></li><?php endif; ?>
      </ul>
	  </div>
	  
	  <div id="user-questions" class="clearfix">
	   <h3 class="subtitle">Last Questions</h3>
	     <div id="question-list-content" class="col-18">
	     <div class="innerspace-right">
	     
	     <?php foreach($questions as $question): ?>
	     <div class="item clearfix question-listed">
        <div class="first-group-fields boxleft">
        
		      <span class="field votes boxleft">
		        <span class="count"><?php echo $question->getInterestedUsers() ?></span>
		        <span class="desc">Votes</span>
		      </span>
		      <span class="field answers boxleft <?php echo $question->getAnswerCountClass() ?>">
		        <span class="count"><?php echo $question->getAnswerCount(); ?></span>
		        <span class="desc">Answers</span>
		      </span>
		      <span class="field views boxleft">
		        <span class="count"><?php print $question->views; ?></span>
		        <span class="desc">Views</span>
		      </span>
        
        </div>
        <div class="second-group-fields boxleft">
          <span class="field title">
            <h2><a href="<?php echo url_for('question_show', $question)?>"><?php echo $question->getTitle()?></a></h2>
          </span>
    
			    <span class="tags boxleft txtleft">
			      <?php include_partial('question/question_tags', array('tags' => $question->getQuestionTag())) ?>
			    </span>
        </div>
      </div>
      
      <?php endforeach; ?>
      </div>
      </div>
      
      <div id="question-user-votes" class="col-6">
      <div class="innerspace-left">
            <div class="statistics">
              <div class="item"><?php echo $nquestions ?><span>Questions</span></div>
              <div class="item"><?php echo $nupquestion ?><span>Votes up</span></div>
              <div class="item"><?php echo $ndownquestion ?><span>Votes down</span></div>
            </div>
      </div>
      </div>
    
    </div>
    
    <div id="user-answers" class="clearfix">
      <h3 class="subtitle"><span><?php echo $nanswers ?></span> Answers</h3>
       
      <div id="answer-list-content" class="col-18">
      <div class="innerspace-right">
       
      <?php foreach($answers as $answer): ?>
        <?php print $answer->getVotes() ?>
        <?php print $answer->getQuestion()->getTitle() ?>
      <?php endforeach; ?>
      </div>
      </div>
      
      <div id="answer-user-votes" class="col-6">
      <div class="innerspace-left">
      
        <h3>Votes on answers</h3>
            <div class="statistics">
              <div class="item"><?php echo $nupanswer ?><span>Votes up</span></div>
              <div class="item"><?php echo $ndownanswer ?><span>Votes down</span></div>
            </div>
      </div>
      </div>
      
    </div>

    <div id="user-tags">
      <h3 class="subtitle"><span><?php echo $ntags ?></span> Tags</h3>
       <?php foreach($tags as $tag): ?>
        <?php print $tag->getName() ?>
      <?php endforeach; ?>
    </div>
    
	</div>
	    

	
</div>