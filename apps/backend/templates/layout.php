<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
      <h1 style="font-size: 24px;">Quark</h1>
      <div id="menu">
        <ul class ="backendmenu">
          <li>
            <?php echo link_to('Question', 'question') ?>
          </li>
          <li>
            <?php echo link_to('Tags', 'tag') ?>
          </li>
        </ul>
      </div>
      
    <?php echo $sf_content ?>
  </body>
</html>
