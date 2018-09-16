<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('harga/index/' . $pelanggan->id) ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="Kembali">
        <i class="fa fa-arrow-left"></i>
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-plus">&nbsp;</i>Tambah <?php echo $title . '&nbsp;' . $pelanggan->nama ?>
  </div>
  <div class="card-body">
    <?php echo form_open('harga/insert', ['class' => 'ajaxform', 'data-module' => 'harga']) ?>
    <?php echo form_hidden('id_pelanggan', $pelanggan->id) ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Barang', 'harga-barang') ?>
        <?php echo form_dropdown('id_barang', $barang, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'id' => 'harga-barang', 'title' => sprintf('Pilih Barang %s', $title)]) ?>
        <div id="feedback-barang"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Cuci', 'harga-cuci') ?>
        <?php echo form_dropdown('id_cuci', $cuci, null, ['class' => 'form-control selectpicker', 'data-live-search' => 'true', 'id' => 'harga-cuci', 'title' => sprintf('Pilih Cuci %s', $title)]) ?>
        <div id="feedback-cuci"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Tunai', 'harga-tunai') ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-tunai">Rp. </span>
          </div>
          <?php echo form_input(['name' => 'tunai', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'id' => 'harga-tunai', 'class' => 'form-control rounded-right', 'placeholder' => sprintf('Tunai %s', $title)]) ?>
          <div id="feedback-tunai"></div>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Cicil', 'harga-cicil') ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-cicil">Rp. </span>
          </div>
          <?php echo form_input(['name' => 'cicil', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'id' => 'harga-cicil', 'class' => 'form-control rounded-right', 'placeholder' => sprintf('Cicil %s', $title)]) ?>
          <div id="feedback-cicil"></div>
        </div>
      </div>
    </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
