<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('pemasukan') ?>"
        class="btn btn-secondary"
        data-toggle="tooltip"
        data-placement="left" title="Kembali">
        <i class="fa fa-arrow-left"></i>
      </a>
    </div>
  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <i class="fa fa-plus">&nbsp;</i>Tambah
    <?php echo $title ?>
  </div>
  <div class="card-body">
    <?php echo form_open('pemasukan/insert', [
      'class' => 'ajaxform',
      'data-module' => 'pemasukan'
      ]) ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Nomer', 'pemasukan-nomer') ?>
        <?php echo form_input([
          'name' => 'nomer',
          'id' => 'pemasukan-nomer',
          'class' => 'form-control',
          'value' => $nomer,
          'readonly' => 'true'
          ]) ?>
        <div id="feedback-nomer"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Jenis', 'pemasukan-jenis') ?>
        <select name="jenis"
          class="form-control selectpicker"
          id="pemasukan-jenis"
          title="<?php echo sprintf('Pilih Jenis %s', $title) ?>">
          <?php
          foreach ($jenis as $key => $value) {
            ?>
            <option value="<?php echo $key ?>" <?php echo set_select('jenis', $key) ?>>
              <?php echo $value ?>
            </option>
            <?php
          }
          ?>
        </select>
        <div id="feedback-jenis"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Tanggal', 'pemasukan-tanggal') ?>
        <?php echo form_input([
          'name' => 'tanggal',
          'id' => 'pemasukan-tanggal',
          'class' => 'form-control datepicker',
          'placeholder' => sprintf('Tanggal %s', $title)
          ]) ?>
        <div id="feedback-tanggal"></div>
      </div>
    </div>
    <div class="form-row mb-2 pelanggan">
      <div class="form-group col-md-12">
        <?php echo form_label('Pelanggan', 'pemasukan-id_pelanggan') ?>
        <select name="id_pelanggan"
          class="form-control selectpicker"
          id="pemasukan-id_pelanggan"
          data-live-search="true"
          title="<?php echo sprintf('Pilih Pelanggan %s', $title) ?>">
          <?php
            foreach ($pelanggan as $id => $nama) {
              ?>
              <option value="<?php echo $id ?>" <?php echo set_select('id_pelanggan', $id) ?>>
                <?php echo $nama ?>
              </option>
              <?php
            }
          ?>
        </select>
        <div id="feedback-id_pelanggan"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Jumlah', 'pemasukan-jumlah') ?>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-jumlah">Rp. </span>
          </div>
          <?php echo form_input([
            'name' => 'jumlah',
            'data-mask' => '000,000,000,000,000',
            'data-mask-reverse' => 'true',
            'id' => 'pemasukan-jumlah',
            'class' => 'form-control rounded-right',
            'placeholder' => sprintf('Jumlah %s', $title)]) ?>
          <div id="feedback-jumlah"></div>
        </div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Cara Pembayaran', 'pemasukan-cara_bayar') ?>
        <select name="cara_bayar"
          class="form-control selectpicker"
          id="pemasukan-cara_bayar"
          title="<?php echo sprintf('Pilih Cara Pembayaran %s', $title) ?>">
          <?php
          foreach ($cara_bayar as $cara_bayar_key => $cara_bayar_value) {
            ?>
            <option value="<?php echo $cara_bayar_key ?>" <?php echo set_select('cara_bayar', $cara_bayar_key) ?>>
              <?php echo $cara_bayar_value ?>
            </option>
            <?php
          }
          ?>
        </select>
        <div id="feedback-cara_bayar"></div>
      </div>
    </div>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Catatan', 'pemasukan-catatan') ?>
        <?php echo form_textarea([
          'name' => 'catatan',
          'id' => 'pemasukan-catatan',
          'class' => 'form-control',
          'placeholder' => sprintf('Catatan %s', $title)
          ]) ?>
        <div id="feedback-catatan"></div>
      </div>
    </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
