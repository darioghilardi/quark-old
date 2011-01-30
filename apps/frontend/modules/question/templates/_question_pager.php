<div id="pagination">
	<ul id="pager" class="nonelist">
		<?php if(($pager->haveToPaginate()) && ($pager->getPage() > 1)): ?>
			<li class="boxleft">
			  <?php echo link_to('<<', 'question/index?page='.$pager->getFirstPage().'&order='.$order) ?>
			</li>
			<li class="boxleft">
			  <?php echo link_to('<', 'question/index?page='.$pager->getPreviousPage().'&order='.$order) ?>
			</li>
		<?php endif ?>
	
		<?php $links = $pager->getLinks(); foreach ($links as $page): ?>
			<li class="boxleft">
				<?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'question/index?page='.$page.'&order='.$order) ?>
			</li>
		<?php endforeach ?>	
		<?php if(($pager->haveToPaginate()) && ($pager->getPage() < $pager->getNextPage())): ?>
		  <li class="boxleft">
		    <?php echo link_to('>', 'question/index?page='.$pager->getNextPage().'&order='.$order) ?>
		  </li>
		  <li class="boxleft">
		    <?php echo link_to('>>', 'question/index?page='.$pager->getLastPage().'&order='.$order) ?>
		  </li>
		<?php endif ?>
	</ul>
	
	<p id="pager_desc">
	  <strong><?php echo count($pager) ?></strong> questions - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
	</p>
</div>