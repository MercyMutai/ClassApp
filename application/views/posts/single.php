<h2 class="text-center mt-2"><?= $post->title; ?></h2>
<div class="post-date mb-2">Posted on: <strong><?php echo($post->create_date); ?></strong></div>

<div class="media">
  <img class="img-icon rounded img-thumbnail mr-3" src="assets/images/avatars/user.png" alt="User Avatar">
  <div class="media-body">
    <?php echo $post->body; ?>
    <div class="clearfix"></div>
    <form role="from" action="index.php/post/delete/<?php echo($post->slug);?>" method="POST">
    	<button class="btn btn-warning float-right" name="delete-post">Delete</button>
    </form>
    <a class="btn btn-primary" href="index.php/post/edit/<?php echo($post->slug);?>">Edit</a>
  </div>
