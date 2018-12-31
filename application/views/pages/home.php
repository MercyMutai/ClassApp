<h2 class="mt-2"><?= $title ?></h2>
This is the home page <br />
<?php if($this->session->userdata('logged_in')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <a href="index.php/user/edit">Update account</a> Finishing setting account
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
     
<?php endif; ?>