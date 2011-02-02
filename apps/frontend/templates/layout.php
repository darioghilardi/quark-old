<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title><?php include_slot('title', 'Quark - Open Source Question and Answer software.') ?></title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div class="container">
    
      <div id="header" class="col-24">
        <div id="sub_header_one">
          <h1>
            <a href="<?php echo url_for('@homepage') ?>">
              <img src="/images/logo.jpg" alt="Quark Project" />
            </a>
          </h1>
        </div>
        <div id="sub_header_two">
        <?php if ($sf_user->isAuthenticated()): ?>
          <div class="loggedin-menu">
            Utente <?php echo $sf_user ?> loggato nel sito. <?php echo link_to('Logout', 'sf_guard_signout') ?>
          </div>
        <?php endif; ?>
          
        <span class="boxright txtright"><a href="<?php echo url_for('@question_new') ?>">Ask a question</a></span>
        </div>
      </div>
      
      <div id="middle">
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

      <div id="footer" class="col-24">
      
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