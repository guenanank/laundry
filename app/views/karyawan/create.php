<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('karyawan') ?>"
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
    <i class="fa fa-plus"></i>&nbsp;Tambah&nbsp;<?php echo $title ?>
  </div>
  <div class="card-body">
    <?php echo form_open('karyawan/insert', [
          'class' => 'ajaxform', 
          'data-module' => 'karyawan'
        ])
      ?>
      <div class="form-group">
        <?php echo form_label('Nama', 'karyawan-nama', ['class' => 'col-form-label']) ?>
        <?php echo form_input([
              'name' => 'nama',
              'id' => 'karyawan-nama',
              'class' => 'form-control',
              'placeholder' => sprintf('Nama %s', $title),
              'value' => set_value('nama')
            ])
          ?>
        <div id="feedback-nama"></div>
      </div>
      <div class="form-group">
        <?php echo form_label('Kontak', 'karyawan-kontak', ['class' => 'col-form-label']) ?>
        <?php echo form_input([
              'name' => 'kontak',
              'id' => 'karyawan-kontak',
              'class' => 'form-control',
              'placeholder' => sprintf('Kontak %s', $title),
              'value' => set_value('kontak')
            ])
          ?>
        <div id="feedback-kontak"></div>
      </div>
      <div class="form-group">
        <?php echo form_label('Bagian', 'karyawan-bagian', ['class' => 'col-form-label']) ?>
        <select name="bagian"
            class="form-control selectpicker"
            id="karyawan-bagian"
            title="Pilih Bagian <?php echo $title ?>">
        <?php
          foreach ($bagian as $key => $value) {
            ?>
              <option value="<?php echo $key ?>" <?php echo set_select('bagian', $key) ?>>
                <?php echo $value ?>
              </option>
            <?php
          }
        ?>
        </select>
        <div id="feedback-bagian"></div>
      </div>
      <div class="form-group">
        <?php echo form_label('Mulai Bekerja', 'karyawan-mulai_kerja', ['class' => 'col-form-label']) ?>
        <?php echo form_input([
              'name' => 'mulai_kerja',
              'id' => 'karyawan-mulai_kerja',
              'class' => 'form-control datepicker',
              'placeholder' => sprintf('Mulai Bekerja %s', $title),
              'value' => set_value('mulai_kerja')
            ])
          ?>
        <div id="feedback-mulai_kerja"></div>
      </div>
      <div class="form-group">
        <?php echo form_label('Gaji Harian', 'karyawan-gaji_harian', ['class' => 'col-form-label']) ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-gaji_harian">Rp. </span>
          </div>
          <?php echo form_input([
                'name' => 'gaji_harian',
                'data-mask' => '000,000,000,000,000',
                'data-mask-reverse' => 'true',
                'id' => 'karyawan-gaji_harian',
                'class' => 'form-control rounded-right',
                'placeholder' => sprintf('Gaji Harian %s', $title),
                'value' => set_value('gaji_harian'),
                'aria-describedby' => 'addon-gaji_harian'
              ])
            ?>
          <div id="feedback-gaji_harian"></div>
        </div>
      </div>
      <div class="form-group">
        <?php echo form_label('Gaji Bulanan', 'karyawan-gaji_bulanan', ['class' => 'col-form-label']) ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-gaji_bulanan">Rp. </span>
          </div>
          <?php echo form_input([
                'name' => 'gaji_bulanan',
                'data-mask' => '000,000,000,000,000',
                'data-mask-reverse' => 'true',
                'id' => 'karyawan-gaji_bulanan',
                'class' => 'form-control rounded-right',
                'placeholder' => sprintf('Gaji Bulanan %s', $title),
                'value' => set_value('gaji_bulanan'),
                'aria-describedby' => 'addon-gaji_bulanan'
              ])
            ?>
          <div id="feedback-gaji_bulanan"></div>
        </div>
      </div>
      <div class="form-group">
        <?php echo form_label('Gaji Lemburan', 'karyawan-gaji_lemburan', ['class' => 'col-form-label']) ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-gaji_lemburan">Rp. </span>
          </div>
          <?php echo form_input([
                'name' => 'gaji_lemburan',
                'data-mask' => '000,000,000,000,000',
                'data-mask-reverse' => 'true',
                'id' => 'karyawan-gaji_lemburan',
                'class' => 'form-control rounded-right',
                'placeholder' => sprintf('Gaji Lemburan %s', $title),
                'value' => set_value('gaji_lemburan'),
                'aria-describedby' => 'addon-gaji_lemburan'
              ])
            ?>
          <div id="feedback-gaji_lemburan"></div>
        </div>
      </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
