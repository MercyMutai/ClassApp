<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ClassApp</title>
    <base href="http://localhost/ClassApp/">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/master.css" />
    <script type="text/javascript" src="assets/js/ckeditor/ckeditor.js"></script>
</head>
<body>

<header>
    <div class="navbar navbar-dark navbar-expand-sm bg-success">
        <a href="index.php" class="navbar-brand">ClassApp</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="index.php/about" class="nav-link">About</a></li>
            <?php if(!$this->session->userdata('logged_in')): ?>
                <li class="nav-item"><a href="index.php/user" class="nav-link">Accounts</a></li>
            <?php else: ?>
                <li class="nav-item"><a href="index.php/post/create" class="nav-link">Create Post</a></li>
            <?php endif; ?>
            <li class="nav-item"><a href="index.php/posts" class="nav-link">Posts</a></li>
        </ul>

        <ul class="navbar-nav ml-auto mr-3">
            <?php if($this->session->userdata('logged_in')): ?>
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" id="profile-dropdown">
                        <?php echo $this->session->userdata('name'); ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profile-dropdown">
                        <a class="dropdown-item" href="index.php/user/logout">Logout</a>
                        <a class="dropdown-item" href="#">
                            <img class="avatar" src="assets/images/avatars/<?php echo $this->session->userdata('image'); ?>" />
                        </a>
                        <a class="dropdown-item" href="index.php/user/edit">
                            <?php if($this->session->userdata('logged_in')): ?>Edit Profile<?php endif; ?>
                        </a>
                    </div>
                </li>
            <?php endif; ?>
        </ul>

    </div>
</header>
<?php if($this->session->flashdata('success_msg')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success_msg'); ?></div>
<?php endif; ?> 
<?php if($this->session->flashdata('error_msg')): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error_msg'); ?></div>
<?php endif; ?> 
<section>
<div class="container">

