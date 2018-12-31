<h2 class="mt-2 text-center"><?= $title ?></h2>

<div class="row">
    <div class="col-md-10 offset-1">
            <hr>
            <?php if(validation_errors()) : ?>
                <div class="alert alert-danger"> <?php echo validation_errors(); ?> </div>
            <?php endif; ?>
            <?php echo form_open('index.php/post/create'); ?>
            <div class="for-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" />
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" name="body" rows="8" cols="70"></textarea>
                <script type="text/javascript"> CKEDITOR.replace('body'); </script>
            </div>
            <button type="submit" name="post" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>
</div>
