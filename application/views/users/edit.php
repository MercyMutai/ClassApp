<h2 class="mt-2 text-center"><?= $title ?></h2>

<div class="row">
    <div class="col-md-6 offset-3">
            <hr>
            <?php if(validation_errors()) : ?>
                <div class="alert alert-danger"> <?php echo validation_errors(); ?> </div>
            <?php endif; ?>
            <?php echo form_open_multipart('index.php/user/edit'); ?>
            <div class="for-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" />
            </div>

            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" />
            </div>

            <div class="form-group">
                <label for="residence">Residence</label>
                <input type="text" class="form-control" id="residence" name="residence" />
            </div>

            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" />
            </div>

            <div class="form-group">
                <label for="uid">Username</label>
                <input type="text" class="form-control" id="uid" name="uid" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" />
            </div>

            <div>
                <label>Profile Picture</label>
                <input type="file" name="pic" size="20" />
            </div>

            <button type="submit" name="edit" class="btn btn-primary float-right">Update</button>
        </form>
    </div>
</div>
