<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('barang') ?>"
        class="btn btn-secondary"
        data-toggle="tooltip"
        data-placement="left"
        title="Kembali">
        <i class="fa fa-arrow-left"></i>
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-pencil">&nbsp;</i>Ubah
    <?php echo $title ?>
  </div>
  <div class="card-body">
    <?php echo form_open('barang/update/' . $barang->id, [
      'class' => 'ajaxform',
      'data-module' => 'barang'
      ])
      ?>
    <div class="form-group">
      <?php echo form_label('Nama', 'barang-nama', ['class' => 'col-form-label']) ?>
      <?php echo form_input([
          'name' => 'nama',
          'id' => 'barang-nama',
          'class' => 'form-control',
          'placeholder' => sprintf('Nama %s', $title),
          'value' => $barang->nama
          ])
           ?>
      <div id="feedback-nama"></div>
    </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
