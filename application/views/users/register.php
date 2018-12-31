<h2 class="mt-2 text-center"><?= $title ?></h2>

<div class="row">
    <div class="col-md-6 offset-3">
            <hr>
            <?php if(validation_errors()) : ?>
                <div class="alert alert-danger"> <?php echo validation_errors(); ?> </div>
            <?php endif; ?>
            <?php echo form_open('index.php/user/register'); ?>
            <div class="for-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" />
            </div>

            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" />
            </div>

            <div class="form-group">
                <label for="regno">Regestration number</label>
                <input type="text" class="form-control" id="regno" name="regno" />
            </div>

            <div class="form-group">
                <label for="uid">Username</label>
                <input type="text" class="form-control" id="uid" name="uid" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" />
            </div>

            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" id="pwd" name="pwd" />
            </div>

            <div class="form-group">
                <label for="cpwd">Confirm Password</label>
                <input type="password" class="form-control" id="cpwd" name="cpwd" />
            </div>

            <button type="submit" name="register" class="btn btn-primary float-right">Register</button>
            <p>Already have an account? <a href="index.php/user">Login</a></p>
        </form>
    </div>
</div>
