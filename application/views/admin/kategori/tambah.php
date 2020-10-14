<?php
// error upload
if (isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}

// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open_multipart(base_url('admin/kategori/tambah'),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Nama kategori</label>
  <div class="col-md-5">
    <input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" value="<?php echo set_value('nama_kategori') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Urutan</label>
  <div class="col-md-5">
    <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?php echo set_value('urutan') ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Upload gambar kategori</label>
  <div class="col-md-5">
    <input type="file" name="gambar" class="form-control" required="required">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
    <button class="btn btn-success" name="submit" type="submit">
    	<i class="fa fa-save"></i> Simpan
    </button>
    <button class="btn btn-info" name="reset" type="reset">
    	<i class="fa fa-times"></i> Reset
    </button>
  </div>
</div>

<?php echo form_close(); ?>