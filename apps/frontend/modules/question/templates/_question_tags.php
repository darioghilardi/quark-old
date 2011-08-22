<?php foreach($tags as $tag): ?>
  <a class="withadd" title="Search for this tags" href="<?php echo url_for('@question_list_tags?tags='.$tag->getTag()); ?>"><?php echo $tag->getTag(); ?></a><a class="addtags" title="Add tags into search" href="<?php echo Tagged::addTagsToUrl($sf_params, $tag->getTag());?>">+</a>
<?php endforeach; ?>