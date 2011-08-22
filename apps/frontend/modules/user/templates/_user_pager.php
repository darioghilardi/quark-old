	<ul id="pager" class="nonelist clearfix nonespace txtcenter">
		<?php if(($pager->haveToPaginate()) && ($pager->getPage() > 1)): ?>
			<li class="fast-backward item">
			  <?php echo link_to('<<', 'users/list?page='.$pager->getFirstPage()) ?>
			</li>
			<li class="backwuard item">
			  <?php echo link_to('<', 'users/list?page='.$pager->getPreviousPage()) ?>
			</li>
		<?php endif ?>
	
		<?php $links = $pager->getLinks(); foreach ($links as $page): ?>
			<li class="position item">
				<?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'users/list?page='.$page) ?>
			</li>
		<?php endforeach ?>	
		<?php if(($pager->haveToPaginate()) && ($pager->getPage() < $pager->getNextPage())): ?>
		  <li class="forward item">
		    <?php echo link_to('>', 'users/list?page='.$pager->getNextPage()) ?>
		  </li>
		  <li class="fast-forward item">
		    <?php echo link_to('>>', 'users/list?page='.$pager->getLastPage()) ?>
		  </li>
		<?php endif ?>
	</ul>
	
	<p id="pager_desc" class="txtcenter">
	  <strong><?php echo count($pager) ?></strong> user - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
	</p>
