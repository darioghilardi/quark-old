<div class="block populartags">
  <h4 class="block-title">Recent Tags</h4>
  <div>
  <ul class="nonelist nonespace">
    <?php foreach ($tags as $tag): ?>
      <li><a class="withadd" title="Search for this tags" href="<?php echo url_for('@question_list_tags?tags='.$tag['name']); ?>"><?php echo $tag['name']; ?></a><a class="addtags" title="Add tags into search" href="<?php echo Tagged::addTagsToUrl($sf_params, $tag['name']);?>">+</a>
        X <?php echo $tag['COUNT']; ?></li>
    <?php endforeach; ?>
  </ul>
  </div>
</div>

<div class="block populartags">
  <h4 class="block-title">Recent Tags</h4>
  <div>
  <ul class="nonelist nonespace">
    <?php foreach ($tags as $tag): ?>
      <li>
      <span class="etichetta"><a class="withadd" title="Search for this" href="<?php echo url_for('@question_list_tags?tags='.$tag['name']); ?>"><?php echo $tag['name']; ?></a><a class="addtags" title="Add tags into search" href="<?php echo Tagged::addTagsToUrl($sf_params, $tag['name']);?>">+</a>
        </span>X <?php echo $tag['COUNT']; ?></li>
    <?php endforeach; ?>
  </ul>
  </div>
</div>