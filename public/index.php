<?php
include_once('../includes/config.php');
include_once('../includes/blog.php');
$blog = new Blog($db);
$posts = $blog->get_posts();
?>

	<div id="posts">
	<?php
	if(!empty($posts)) { ?>
		<ul>
		<?php
		foreach($posts as $post) {
		?>
			<li>
				<h2><?php echo $post->title; ?></h2>
				<p><?php echo $post->content; ?></p>
				<p>Posted by <?php echo $post->author; ?> - <?php echo date('F d, Y h:mA', strtotime($post->created_at)); ?></p>
			</li>
		<?php
		} ?>
		</ul>
	<?php
	}
	else { ?>
		<p>Sorry, no posts here just yet.</p>
	<?php
	}
	?>

	<a href="form.php">Add New Post</a>
	</div>

<?php
include_once('layout/footer.php');
?>