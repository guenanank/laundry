<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('pelanggan') ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="Kembali">
        <i class="fa fa-arrow-left"></i>
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-pencil">&nbsp;</i>Ubah <?php echo $title ?>
  </div>
  <div class="card-body">
    <?php echo form_open('pelanggan/update/' . $pelanggan->id, ['class' => 'ajaxform', 'data-module' => 'pelanggan']) ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Nama', 'pelanggan-nama') ?>
        <?php echo form_input(['name' => 'nama', 'id' => 'pelanggan-nama', 'class' => 'form-control', 'placeholder' => 'Nama Master Pelanggan', 'value' => $pelanggan->nama]) ?>
        <div id="feedback-nama"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Alamat', 'pelanggan-catatan') ?>
        <?php echo form_textarea(['name' => 'catatan', 'id' => 'pelanggan-catatan', 'class' => 'form-control', 'value' => $pelanggan->alamat]) ?>
        <div id="feedback-catatan"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Telepon', 'pelanggan-telepon') ?>
        <?php echo form_input(['name' => 'telepon', 'id' => 'pelanggan-telepon', 'class' => 'form-control', 'value' => $pelanggan->telepon]) ?>
        <div id="feedback-telepon"></div>
      </div>
    </div>
    <?php include APPPATH . 'views/backend/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
