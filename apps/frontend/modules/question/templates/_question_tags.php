<?php foreach($tags as $tag): ?>
  <a href="<?php echo url_for('@question_list_tags?tags='.$tag->getTag()); ?>"><?php print $tag->getTag(); ?></a>
<?php endforeach; ?>
      