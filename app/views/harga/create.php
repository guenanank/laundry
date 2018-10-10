<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('harga/index/' . $pelanggan->id) ?>"
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
    <i class="fa fa-plus"></i>&nbsp;Tambah&nbsp;
    <?php echo $title . '&nbsp;' . $pelanggan->nama ?>
  </div>
  <div class="card-body">
    <?php echo form_open('harga/insert', [
      'class' => 'ajaxform',
      'data-module' => 'harga'
    ], ['id_pelanggan' => $pelanggan->id])
      ?>
    <div class="form-group">
      <?php echo form_label('Barang', 'harga-barang', ['class' => 'col-form-label']) ?>
      <select name="id_barang"
          class="form-control selectpicker"
          id="harga-id_barang"
          data-live-search="true"
          title="Pilih Barang <?php echo $title ?>">
      <?php
        foreach ($barang as $key => $value) {
          ?>
            <option value="<?php echo $key ?>" <?php echo set_select('id_barang', $key) ?>>
              <?php echo $value ?>
            </option>
          <?php
        }
      ?>
      </select>
      <div id="feedback-id_barang"></div>
    </div>
    <div class="form-group">
      <?php echo form_label('Cuci', 'harga-cuci', ['class' => 'col-form-label']) ?>
      <select name="id_cuci"
          class="form-control selectpicker"
          id="harga-id_cuci"
          data-live-search="true"
          title="Pilih Cuci <?php echo $title ?>">
      <?php
        foreach ($cuci as $key => $value) {
          ?>
            <option value="<?php echo $key ?>" <?php echo set_select('id_cuci', $key) ?>>
              <?php echo $value ?>
            </option>
          <?php
        }
      ?>
      </select>
      <div id="feedback-id_cuci"></div>
    </div>
    <div class="form-group">
      <?php echo form_label('Tunai', 'harga-tunai', ['class' => 'col-form-label']) ?>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="addon-tunai">Rp. </span>
        </div>
        <?php echo form_input([
          'name' => 'tunai',
          'data-mask' => '000,000,000,000,000',
          'data-mask-reverse' => 'true',
          'id' => 'harga-tunai',
          'class' => 'form-control rounded-right',
          'placeholder' => sprintf('Tunai %s', $title),
          'value' => set_value('tunai'),
          'aria-describedby' => 'addon-tunai'
          ])
          ?>
        <div id="feedback-tunai"></div>
      </div>
    </div>
    <div class="form-group">
      <?php echo form_label('Cicil', 'harga-cicil', ['class' => 'col-form-label']) ?>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="addon-cicil">Rp. </span>
        </div>
        <?php echo form_input([
          'name' => 'cicil',
          'data-mask' => '000,000,000,000,000',
          'data-mask-reverse' => 'true',
          'id' => 'harga-cicil',
          'class' => 'form-control rounded-right',
          'placeholder' => sprintf('Cicil %s', $title),
          'value' => set_value('cicil'),
          'aria-describedby' => 'addon-cicil'
          ])
          ?>
        <div id="feedback-cicil"></div>
      </div>
    </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
