<?php use_helper('TimeAgo') ?>

<span class="time"><?php print timesince(strtotime($created_at)) ?> ago</span>
by <?php include_component('user', 'WidgetUserInfo', array('id' => $user_id,'size_avatar'=>13)) ?>