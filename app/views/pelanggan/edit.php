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
    <i class="fa fa-pencil"></i>&nbsp;Ubah&nbsp;
    <?php echo $title ?>
  </div>
  <div class="card-body">
    <?php echo form_open('pelanggan/update/' . $pelanggan->id, [
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
                'value' => $pelanggan->nama
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
                'value' => $pelanggan->alamat
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
                'value' => $pelanggan->telepon
              ])
            ?>
      <div id="feedback-telepon"></div>
    </div>
    <?php include APPPATH . 'views/button_form.php' ?>
    <?php echo form_close() ?>
  </div>
</div>
