<div class="row">
  <div class="col-sm-12">
    <div class="pull-right">
      <a href="<?php echo base_url('pelanggan') ?>"
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
    <?php echo $title ?>
  </div>
  <div class="card-body">
    <?php echo form_open('pelanggan/insert', [
          'class' => 'ajaxform',
          'data-module' => 'pelanggan'
        ])
      ?>
    <div class="form-group">
      <?php echo form_label('Nama', 'pelanggan-nama', ['class' => 'col-form-label']) ?>
      <?php echo form_input([
              'name' => 'nama',
              'id' => 'pelanggan-nama',
              'class' => 'form-control',
              'placeholder' => sprintf('Nama %s', $title),
              'value' => set_value('nama')
            ])
          ?>
      <div id="feedback-nama"></div>
    </div>
    <div class="form-group">
      <?php echo form_label('Alamat', 'pelanggan-alamat', ['class' => 'col-form-label']) ?>
      <?php echo form_textarea([
              'name' => 'alamat',
              'id' => 'pelanggan-alamat',
              'class' => 'form-control',
              'placeholder' => sprintf('Alamat %s', $title),
              'value' => set_value('alamat')
            ])
          ?>
      <div id="feedback-alamat"></div>
    </div>
    <div class="form-group">
      <?php echo form_label('Telepon', 'pelanggan-telepon', ['class' => 'col-form-label']) ?>
      <?php echo form_input([
              'name' => 'telepon',
              'id' => 'pelanggan-telepon',
              'class' => 'form-control',
              'placeholder' => sprintf('Telepon %s', $title),
              'value' => set_value('telepon')
            ])
          ?>
      <div id="feedback-telepon"></div>
    </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
