<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('karyawan') ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="Kembali">
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
    <?php echo form_open('karyawan/update/' . $karyawan->id, ['class' => 'ajaxform', 'data-module' => 'karyawan']) ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Nama', 'karyawan-nama') ?>
        <?php echo form_input(['name' => 'nama', 'id' => 'karyawan-nama', 'class' => 'form-control', 'placeholder' => 'Nama Master Karyawan', 'value' => $karyawan->nama]) ?>
        <div id="feedback-nama"></div>
      </div>
    </div>

    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Kontak', 'karyawan-kontak') ?>
        <?php echo form_input(['name' => 'kontak', 'id' => 'karyawan-kontak', 'class' => 'form-control', 'value' => $karyawan->kontak]) ?>
        <div id="feedback-kontak"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Bagian', 'karyawan-bagian') ?>
        <?php echo form_dropdown('bagian', $bagian, [camelize($karyawan->bagian)], ['class' => 'form-control selectpicker', 'id' => 'karyawan-bagian']) ?>
        <div id="feedback-bagian"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Mulai Bekerja', 'karyawan-mulai_kerja') ?>
        <?php echo form_input(['name' => 'mulai_kerja', 'id' => 'karyawan-mulai_kerja', 'class' => 'form-control datepicker', 'value' => $karyawan->mulai_kerja]) ?>
        <div id="feedback-mulai_kerja"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Gaji Harian', 'karyawan-gaji_harian') ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-gaji_harian">Rp. </span>
          </div>
          <?php echo form_input(['name' => 'gaji_harian', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'id' => 'karyawan-gaji_harian', 'class' => 'form-control rounded-right', 'value' => $karyawan->gaji_harian]) ?>
          <div id="feedback-gaji_harian"></div>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Gaji Bulanan', 'karyawan-gaji_bulanan') ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-gaji_bulanan">Rp. </span>
          </div>
          <?php echo form_input(['name' => 'gaji_bulanan', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'id' => 'karyawan-gaji_bulanan', 'class' => 'form-control rounded-right', 'value' => $karyawan->gaji_bulanan]) ?>
          <div id="feedback-gaji_bulanan"></div>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Gaji Lemburan', 'karyawan-gaji_lemburan') ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-gaji_lemburan">Rp. </span>
          </div>
          <?php echo form_input(['name' => 'gaji_lemburan', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'id' => 'karyawan-gaji_lemburan', 'class' => 'form-control rounded-right', 'value' => $karyawan->gaji_lemburan]) ?>
          <div id="feedback-gaji_lemburan"></div>
        </div>
      </div>
    </div>
    <?php include APPPATH . 'views/backend/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
