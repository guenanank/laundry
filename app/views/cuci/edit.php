<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('cuci') ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="Kembali">
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
    <?php echo form_open('cuci/update/' . $cuci->id, ['class' => 'ajaxform', 'data-module' => 'cuci']) ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Nama', 'cuci-nama') ?>
        <?php echo form_input(['name' => 'nama', 'id' => 'cuci-nama', 'class' => 'form-control', 'placeholder' => 'Nama Master Cuci', 'value' => $cuci->nama]) ?>
        <div id="feedback-nama"></div>
      </div>
    </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
