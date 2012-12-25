<!------------ title ------------>
<div class="title">
	<h2><?php echo htmlspecialchars($row_special['title']); ?>
	</h2>
</div>

<!------------ grapic (널일수있음) ------------>
<div class="graphic">
	<?php
	if ($row_special['image_url']) {
		include ('./post_special_graphic.php');
	}
	?>
</div>

<!------------ text ------------>
<div class="text">
	<p>
		<?php echo $row_special['text'];
		// 링크를 걸어야 하니까 스페설챠는 뺄게
		?>
	</p>
</div>
 
<?php
	if ($_GET['special']==='guest'){
		include './post_disqus.php';
	}
?>