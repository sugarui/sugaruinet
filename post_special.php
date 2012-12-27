<!------------ title ------------>
<div class="title">
	<h2><?php echo htmlspecialchars($row_special['title']); ?>
	</h2>
</div>

<!------------ grapic (널일수있음) ------------>
<?php
if ($row_special['image']) {
	echo "
		<div class=\"graphic_left\">
			<img src=\"../sugaruinet_portfolio/{$row_special['image']}\">
		</div>
		";
}
?>

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