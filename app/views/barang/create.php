<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('barang') ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="Kembali">
        <i class="fa fa-arrow-left"></i>
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-plus">&nbsp;</i>Tambah <?php echo $title ?>
  </div>
  <div class="card-body">
    <?php echo form_open('barang/insert', ['class' => 'ajaxform', 'data-module' => 'barang']) ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Nama', 'barang-nama') ?>
        <?php echo form_input(['name' => 'nama', 'id' => 'barang-nama', 'class' => 'form-control', 'placeholder' => sprintf('Nama %s', $title)]) ?>
        <div id="feedback-nama"></div>
      </div>
    </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
