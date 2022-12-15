<?= $this->extend('main/layout'); ?>

<?= $this->section('judul') ?>
Form Edit Satuan
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>
<?= form_button('', '<i class="fa fa-backward"></i>Kembali', [
    'class' => 'btn btn-warning',
    'onclick ' => "location.href=('" . site_url('satuan/index'). "')"
    ]) ?>
<?= $this->endSection('subjudul') ?>


<?= $this->section('isi') ?>
<div class="form-group">
    <?= form_open('satuan/updatedata','',[
        'idsatuan' => $id
        ]) ?>
    <label for="namasatuan">Nama Satuan</label>
    <?= form_input('namasatuan', $nama,[
        'class' => 'form-control',
        'id' => 'namasatuan',
        'autofocus' => true,
    ]) ?>

    <?= session()->getFlashdata('errorNamaSatuan'); ?>
</div>

<div class="form-group">
    <?= form_submit('', 'Update', [
    'class' => 'btn btn-success',
]); ?>
</div>
<?= form_close();?>
<?= $this->endSection('isi') ?>