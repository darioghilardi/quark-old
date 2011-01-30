<?php if(($pager->haveToPaginate()) && ($pager->getPage() > 1)): ?>
	<div>
		<?php echo link_to('<<', 'question/index?page='.$pager->getFirstPage().'&order='.$order) ?>
	</div>

	<div>
		<?php echo link_to('<', 'question/index?page='.$pager->getPreviousPage().'&order='.$order) ?>
	</div>
<?php endif ?>

<div>
	<?php $links = $pager->getLinks(); foreach ($links as $page): ?>
		<div>
			<?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'question/index?page='.$page.'&order='.$order) ?>
		</div>
	<?php endforeach ?>
</div>

<?php if(($pager->haveToPaginate()) && ($pager->getPage() < $pager->getNextPage())): ?>
	<div>
		<?php echo link_to('>', 'question/index?page='.$pager->getNextPage().'&order='.$order) ?>
	</div>

	<div>
		<?php echo link_to('>>', 'question/index?page='.$pager->getLastPage().'&order='.$order) ?>
	</div>
<?php endif ?>

<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> questions
  - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
</div>