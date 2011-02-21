<div class="block clearfix <?php (isset($type))? print $type : print 'standard';?>">
  <?php if(!empty($title)):?>
  <h4 class="block-title"><?php print $title; ?></h4>
  <?php endif; ?>
  <?php if(!empty($content)):?>
    <div><?php echo $content ?></div>
  <?php endif; ?>
</div>