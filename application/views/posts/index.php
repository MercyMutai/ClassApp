<h2 class="text-center"><?= $title; ?></h2>

<?php if($posts == NULL): ?>
	No posts yet
<?php else : ?>
	<ul class="list-unstyled">
		<?php foreach($posts as $post) : ?>
			<li class="media p-2">
				<img class="img-icon rounded img-thumbnail mr-3" src="assets/images/avatars/user.png" alt="User Avatar">
                <div class="media-body p-2">
                    <strong><h4 class="mt-0 mb-1 ml-2"><?php echo $post->title; ?></h4></strong>
                    <div class="post-date">Posted on: <strong><?php echo($post->create_date); ?></strong></div>
                    <?php echo($post->body); ?> <br /> <hr>
                    <a class="float-right btn btn-outline-secondary" href="index.php/post/<?php echo $post->slug; ?>">Read More</a>
                </div>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>