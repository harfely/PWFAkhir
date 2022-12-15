<?= $this->extend('main/layout'); ?>

<?= $this->section('judul') ?>
Manajemen Data Barang
<?= $this->endSection('judul') ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-sm btn-primary" onclick="location.href=('/barang/tambah')">
    <i class="fa fa-plus-circle"></i>Tambah Barang
</button>
<?= $this->endSection('subjudul') ?>

<?= $this->section('isi') ?>

<?= session()->getFlashdata('error'); ?>
<?= session()->getFlashdata('sukses'); ?>
<?= form_open('barang/index') ?>
<div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Cari data berdasarkan kode,nama,kategori" name="cari"
        autofocus>
    <div class="input-group-append">
        <button class="btn btn-outline-success" type="submit" name="tombolcari">
            <i class="fa fa-search"></i>
        </button>
    </div>
</div>
<?= form_close(); ?>
<table class=" table table-striped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 15%;">No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Stok</th>
            <th style="width: 15%;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $nomor=1;
        foreach($tampildata as $row):
        ?>
        <tr>
            <td><?= $nomor++; ?></td>
            <td><?= $row['brgkode']; ?></td>
            <td><?= $row['brgnama']; ?></td>
            <td><?= $row['katnama']; ?></td>
            <td><?= $row['satnama']; ?></td>
            <td><?= number_format($row['brgharga'], 0); ?></td>
            <td><?= number_format($row['brgstok'], 0); ?></td>
            <td>
                <button type="button" class="btn btn-sml btn-info" onclick="edit('<?= $row['brgkode'] ?>')">
                    <i class="fa fa-edit"></i>
                </button>


                <form method="POST" action="/barang/hapus/<?= $row['brgkode']?>" style="display:inline;"
                    onsubmit="return hapus();">
                    <input type="hidden" value="DELETE" name="_method">

                    <button type=" submit" class="btn btn-danger" title="Hapus data">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>

        <?php endforeach;   ?>
    </tbody>
</table>
<script>
function edit(kode) {
    window.location.href = ('/barang/edit/' + kode);
}

function hapus(kode) {
    pesan = confirm('Apakah akan dihapus?');
    if (pesan) {
        return true;
    } else {
        return false;
    }
}
</script>




<?= $this->endSection('isi') ?>