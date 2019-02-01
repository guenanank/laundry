<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('jasa') ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="Kembali">
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
    <?php echo form_open('jasa/insert', ['class' => 'ajaxform', 'data-module' => 'jasa']) ?>
    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <?php echo form_label('Nama', 'jasa-nama') ?>
        <?php echo form_input(['name' => 'nama', 'id' => 'jasa-nama', 'class' => 'form-control', 'placeholder' => sprintf('Nama %s', $title)]) ?>
        <div id="feedback-nama"></div>
      </div>
    </div>

    <div class="form-row mb-2">
      <div class="form-group col-md-12">
        <div class="checkbox">
					<label>
            <?php echo form_checkbox('tergantung_barang', true) ?>
            <i class="input-helper"></i> Ongkos jasa tergantung dari jenis barang
          </label>
				</div>
        <div id="feedback-tergantung_barang"></div>
      </div>
    </div>

    <div class="form-row mb-2 ongkos" id="ongkos">
      <div class="form-group col-md-12">
        <?php echo form_label('Ongkos', 'jasa-ongkos') ?>
        <?php echo form_input(['name' => 'ongkos', 'id' => 'jasa-ongkos', 'class' => 'form-control', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'placeholder' => sprintf('Ongkos %s', $title)]) ?>
        <div id="feedback-ongkos"></div>
      </div>
    </div>

    <div class="form-row mb-2 klaim" id="klaim">
      <div class="form-group col-md-12">
        <?php echo form_label('Klaim', 'jasa-klaim') ?>
        <?php echo form_input(['name' => 'klaim', 'id' => 'jasa-klaim', 'class' => 'form-control', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'placeholder' => sprintf('Klaim %s', $title)]) ?>
        <div id="feedback-klaim"></div>
      </div>
    </div>

    <div class="form-row mb-2 open" id="open">
      <div class="form-group col-md-12">
        <?php echo form_label('Open', 'jasa-open') ?>
        <?php echo form_input(['name' => 'open', 'id' => 'jasa-open', 'class' => 'form-control', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'placeholder' => sprintf('Open %s', $title)]) ?>
        <div id="feedback-open"></div>
      </div>
    </div>

    <hr />

    <div class="form-row mb-2 barang" id="barang">
      <div class="form-group col-md-4">
        <?php echo form_label('Barang', 'jasa-id_barang') ?>
        <?php echo form_dropdown('id_barang', $barang, null, ['class' => 'form-control selectpicker', 'id' => 'jasa-id_barang', 'title' => sprintf('Pilih Barang %s', $title), 'data-live-search' => 'true']) ?>
        <div id="feedback-id_barang"></div>
      </div>

      <div class="form-group col-md-2">
        <?php echo form_label('Ongkos', 'jasa-ongkos') ?>
        <?php echo form_input(['name' => 'ongkos', 'id' => 'jasa-ongkos', 'class' => 'form-control', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'placeholder' => sprintf('Ongkos %s', $title)]) ?>
        <div id="feedback-ongkos"></div>
      </div>

      <div class="form-group col-md-2">
        <?php echo form_label('Klaim', 'jasa-klaim') ?>
        <?php echo form_input(['name' => 'klaim', 'id' => 'jasa-klaim', 'class' => 'form-control', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'placeholder' => sprintf('Klaim %s', $title)]) ?>
        <div id="feedback-klaim"></div>
      </div>

      <div class="form-group col-md-2">
        <?php echo form_label('Open', 'jasa-open') ?>
        <?php echo form_input(['name' => 'open', 'id' => 'jasa-open', 'class' => 'form-control', 'data-mask' => '000,000,000,000,000', 'data-mask-reverse' => 'true', 'placeholder' => sprintf('Open %s', $title)]) ?>
        <div id="feedback-open"></div>
      </div>

      <div class="clearfix"></div>
      <div class="clearfix"></div>
      <div class="clearfix"></div>
      <div class="form-group col-md-2">
        <?php echo form_label('&nbsp;') ?>
        <button class="btn btn-warning" type="button" id="tambah">
            <i class="fa fa-cart-arrow-down"></i> Tambah
        </button>
      </div>

    </div>

    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
