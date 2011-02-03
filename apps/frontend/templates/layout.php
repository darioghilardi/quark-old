<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title><?php include_slot('title', 'Quark - Open Source Question and Answer software.') ?></title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
  </head>
  <body>

    
    
    <div id="top-page">
      <div class="container">
      <ul id="primary-menu" class="nonelist nonespace boxright txtright">
        <li class="boxright login-item">
            <?php if ($sf_user->isAuthenticated()): ?> Welcome <?php echo $sf_user ?>. <?php echo link_to('Logout', 'sf_guard_signout') ?>
            <?php else: ?>
              <a href="/guard/login">Login</a>
            <?php endif;?>
        </li>

        <li class="boxright menu-item"><a href="">Home</a></li>
        <li class="boxright menu-item"><a href="">About</a></li>
        <li class="boxright menu-item"><a href="">Blabla</a></li>
      </ul>
      </div>
    </div>
    
    <div id="page" >
      <div id="header" class="container">
        <div id="sub_header_one" class="col-8">
          <span id="logo">
            <a href="<?php echo url_for('@homepage') ?>">
              <img src="/images/logo.jpg" alt="Quark Project" />
            </a>
          </span>
        </div>
        
        <div id="sub_header_two" class="col-16">
          <ul id="secondary-menu" class="nonelist nonespace">
            <li class="boxright txtright">
              <a class="ask-question" href="<?php echo url_for('@question_new') ?>">Ask a question</a>
            </li>
            <li class="boxright txtright">
              <a href="">Tags</a>
            </li>
            <li class="boxright txtright">
              <a href="">Unanswered</a>
            </li>
          </ul>
        </div>
      </div>
      
      <div id="middle" class="container">
        <?php if ($sf_user->hasFlash('notice')): ?>
          <div class="flash_notice">
            <?php echo $sf_user->getFlash('notice') ?>
          </div>
        <?php endif ?>

        <?php if ($sf_user->hasFlash('error')): ?>
          <div class="flash_error">
            <?php echo $sf_user->getFlash('error') ?>
          </div>
        <?php endif ?>

        <div id="content">
          <?php echo $sf_content ?>
        </div>
      </div>

      <div id="footer" class="container">
      
          <span class="symfony">
            <img src="/images/quark-mini.png" alt="Quark" />
            powered by <a href="http://www.symfony-project.org/">
            <img src="/images/symfony.gif" alt="symfony framework" />
            </a>
          </span>
          <ul class="nonelist nonespace">
            <li class="boxleft"><a href="">About Quark</a></li>
          </ul>

      </div>
    </div>
    <?php include_javascripts() ?>
  </body>
</html>