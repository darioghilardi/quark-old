<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title><?php include_slot('title', 'Quark - Open Source Question and Answer software.') ?></title>
    <link rel="shortcut icon" href="/favicon.ico" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php include_stylesheets() ?>
  </head>
  <body>

    
    <div id="page" >
    
    <div id="top-header">
      <div class="container">
        <?php include_partial('question/question_primary_menu', array()) ?>
      </div>
    </div> 
    
    
      <div id="header" class="container">
        <div id="sub_header_one" class="col-6">
          <span id="logo">
            <a href="<?php echo url_for('@homepage') ?>">
              <img src="/images/logo.jpg" alt="Quark Project" />
            </a>
          </span>
        </div>
        
        <div id="sub_header_two" class="col-18">
          <?php include_partial('question/question_secondary_menu', array()) ?>
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
         
         
      <div id="footer">
        <div class="container">
        
            <span class="symfony">
              <img src="/images/quark-mini.png" alt="Quark" />
              powered by <a href="http://www.symfony-project.org/">
              <img src="/images/symfony.gif" alt="symfony framework" />
              </a>
          </span>
          
          <?php include_partial('question/question_primary_menu', array('notloginlink'=>1)) ?>
        </div>
      </div>
    
    </div><!--  end page -->
    
    <?php include_javascripts() ?>
  </body>
</html>