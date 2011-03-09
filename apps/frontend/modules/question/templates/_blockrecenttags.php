<div class="block populartags">
  <h4 class="block-title">Recent Tags</h4>
  <div>
  <ul class="nonelist nonespace">
    <?php foreach ($tags as $tag): ?>
      <li><a href="<?php echo url_for('@question_list_tags?tags='.$tag['name']); ?>"><?php echo $tag['name']; ?></a>
        <a href="<?php echo Tagged::addTagsToUrl($sf_params, $tag['name']);?>">+</a>
        X <?php echo $tag['COUNT']; ?></li>
    <?php endforeach; ?>
  </ul>
  </div>
</div>