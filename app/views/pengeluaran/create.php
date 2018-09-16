<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('pengeluaran') ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="Kembali">
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
    <?php echo form_open('pengeluaran/insert', ['class' => 'ajaxform', 'data-module' => 'pengeluaran']) ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Jenis', 'pengeluaran-jenis') ?>
        <?php echo form_dropdown('jenis', $jenis, null, ['class' => 'form-control selectpicker', 'id' => 'pengeluaran-jenis', 'title' => sprintf('Pilih Jenis %s', $title)]) ?>
        <div id="feedback-jenis"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Tanggal', 'pengeluaran-tanggal') ?>
        <?php echo form_input(['name' => 'tanggal', 'id' => 'pengeluaran-tanggal', 'class' => 'form-control', 'placeholder' => sprintf('Tanggal %s', $title)]) ?>
        <div id="feedback-tanggal"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Jumlah', 'pengeluaran-jumlah') ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-jumlah">Rp. </span>
          </div>
          <?php echo form_input(['name' => 'jumlah', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'id' => 'pengeluaran-jumlah', 'class' => 'form-control rounded-right', 'placeholder' => sprintf('Jumlah %s', $title)]) ?>
          <div id="feedback-jumlah"></div>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Catatan', 'pengeluaran-keterangan') ?>
        <?php echo form_textarea(['name' => 'keterangan', 'id' => 'pengeluaran-keterangan', 'class' => 'form-control', 'placeholder' => sprintf('Catatan %s', $title)]) ?>
        <div id="feedback-keterangan"></div>
      </div>
    </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
