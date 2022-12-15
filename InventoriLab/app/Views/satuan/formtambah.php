<?= $this->extend('main/layout'); ?>

<?= $this->section('judul') ?>
Form Tambah Satuan
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>
<?= form_button('', '<i class="fa fa-backward"></i>Kembali', [
    'class' => 'btn btn-warning',
    'onclick ' => "location.href=('" . site_url('satuan/index'). "')"
    ]) ?>
<?= $this->endSection('subjudul') ?>


<?= $this->section('isi') ?>
<div class="form-group">
    <?= form_open('satuan/simpandata') ?>
    <label for="namakategori">Nama Satuan</label>
    <?= form_input('namasatuan','',[
        'class' => 'form-control',
        'id' => 'namasatuan',
        'autofocus' => true,
        'placeholder' => 'isikan Nama Satuan'
    ]) ?>

    <?= session()->getFlashdata('errorNamaSatuan'); ?>
</div>

<div class="form-group">
    <?= form_submit('','Simpan',[
    'class' => 'btn btn-success',
]); ?>
</div>
<?= form_close();?>
<?= $this->endSection('isi') ?>