<form action="/jurusan/save" method="post">
<?= csrf_field(); ?>
    <div class="form-group">
        <label for="name">name</label>
        <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid':''; ?>" name="name" id="name" autofocus value="<?= old('name'); ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('name'); ?>
        </div>
    </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>