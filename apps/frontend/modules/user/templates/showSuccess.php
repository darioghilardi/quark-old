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
	  
	  <div id="user-questions">
	   <h3 class="subtitle"><span><?php echo rand(1,99); ?></span> Questions</h3>
    </div>
    
    <div id="user-answers">
      <h3 class="subtitle"><span><?php echo rand(1,99); ?></span> Answers</h3>
    </div>

    <div id="user-tags">
      <h3 class="subtitle"><span><?php echo rand(1,99); ?></span> Tags</h3>
    </div>
    
	</div>
	    

	
</div>