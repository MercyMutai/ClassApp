<h2 class="mt-2 text-center"><?= $title ?></h2>

<div class="row">
    <div class="col-md-6 offset-3">
        <?php echo form_open('index.php/user'); ?>
            <hr>
            <?php if(validation_errors()) : ?>
                <div class="alert alert-danger"> <?php echo validation_errors(); ?> </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="uid">Username</label>
                <input type="text" class="form-control" id="uid" name="uid" required autofocus/>
            </div>

            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" id="pwd" name="pwd" />
            </div>

            <button type="submit" class="btn btn-primary float-right">Login</button>
            <input type="checkbox" name="rememberme" id="rememberme" />
            <label for="rememberme">Remember Me</label>
            <p>Don't have an account yet? <a href="index.php/user/register">Signup</a></p>
            <p><a href="index.php/user/forgotpwd">Forgot password?</a></p>
        </form>
    </div>
</div>
