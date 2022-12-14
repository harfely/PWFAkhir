<?= $this->extend('main/layout'); ?>

<?= $this->section('judul') ?>
Form Edit Kategori
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>
<?= form_button('', '<i class="fa fa-backward"></i>Kembali', [
    'class' => 'btn btn-warning',
    'onclick ' => "location.href=('" . site_url('kategori/index'). "')"
    ]) ?>
<?= $this->endSection('subjudul') ?>


<?= $this->section('isi') ?>
<div class="form-group">
    <?= form_open('kategori/updatedata','',[
        'idkategori' => $id
        ]) ?>
    <label for="namakategori">Nama Kategori</label>
    <?= form_input('namakategori', $nama,[
        'class' => 'form-control',
        'id' => 'namakategori',
        'autofocus' => true,
    ]) ?>

    <?= session()->getFlashdata('errorNamaKategori'); ?>
</div>

<div class="form-group">
    <?= form_submit('', 'Update', [
    'class' => 'btn btn-success',
]); ?>
</div>
<?= form_close();?>
<?= $this->endSection('isi') ?>