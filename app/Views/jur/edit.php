<h1>Ubah Data</h1>
    <form action="/jurusan/update/<?= $jurusan['id']; ?>" method="post" class="col-sm-14" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $jurusan['id']; ?>">
    <?= csrf_field(); ?>
    
    <div class="form-group">
        <label for="name">name</label>
        <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid':''; ?>" name="name" id="name" autofocus value="<?= (old('name')) ? old('name') : $jurusan['name']; ?>">
        <div class="invalid-feedback">
          <?= $validation->getError('name'); ?>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
