<?php foreach($data as $d): ?>
<?php
function format($tanggal){
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[1] . '/' . $pecahkan[2] . '/' . $pecahkan[0];
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>barangKeluar/proses_ubah" name="myFormUpdate" method="POST" enctype="multipart/form-data"
        onsubmit="return validateFormUpdate()">


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Ubah Barang Keluar</h1>
            </div>

            <div>
                <a href="<?= base_url() ?>barang_keluar" class="btn btn-danger btn-sm btn-icon-split mr-2">
                    <span class="text text-white">Batal</span>
                    <span class="icon text-white-50">
                        <i class="fas fa-times"></i>
                    </span>
                </a>
                <button type="submit" class="btn btn-primary btn-sm btn-icon-split">
                    <span class="text text-white">Simpan</span>
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                    </span>
                </button>
            </div>

        </div>

        <div class="d-sm-flex  justify-content-between mb-0">
            <div class="col-lg-8 mb-4">
                <!-- form -->
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Ubah Barang Keluar</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">

                            <!-- ID Transaksi -->
                            <div class="form-group"><label>ID Barang Keluar</label>
                                <input class="form-control" name="idbk" value="<?= $d->id_barang_keluar ?>" type="text"
                                    placeholder="" autocomplete="off" readonly>
                            </div>

                            <!-- Barang -->
                            <div class="form-group"><label>Nama Barang</label>
                                <input name="barang" type="hidden" value="<?= $d->id_barang ?>">
                                <input class="form-control" name="preview" type="text" value="<?= $d->nama_barang ?>"
                                    autocomplete="off" readonly>
                            </div>

                            <!-- Tgl Keluar -->
                            <div class="form-group"><label>Tanggal Keluar</label>
                                <input class="form-control" name="tgl" id="datepicker" value="<?= format($d->tgl_keluar) ?>"
                                    type="text" placeholder="" autocomplete="off">
                            </div>

                            <!-- Customer -->
                            <?php if($jmlcustomer > 0): ?>
                            <div class="form-group"><label>Customer</label>
                                <select name="customer" class="form-control chosen">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($customer as $c): ?>
                                    <option value="<?= $c->id_customer ?>" 
                                        <?= $c->id_customer == $d->id_customer ? 'selected' : '' ?>>
                                        <?= $c->nama_customer ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>Customer</label>
                                <input type="hidden" name="customer">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data Customer, Silahkan Hubungi Admin!)</i></span>
                                    <a href="<?= base_url() ?>customer" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Jumlah Barang -->
                            <div class="form-group"><label>Jumlah Keluar</label>
                                <input name="jmlkeluarlama" type="hidden" value="<?= $d->jumlah_keluar ?>">
                                <input class="form-control" name="jmlkeluar" type="number"
                                    value="<?= $d->jumlah_keluar ?>">
                            </div>

                        </div>


                        <br>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 mb-4">
                <!-- file -->
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Deskripsi</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">

                            <center>
                                <img id="preview" width="200px"
                                    src="<?= base_url() ?>assets/upload/barang/<?= $d->foto ?>" alt="">
                            </center>

                            <br>

                            <label><b>Nama Barang</b></label>
                            <br>
                            <h6 class="h6 text-gray-800" id="judul"><?= $d->nama_barang ?></h6>

                            <label><b>Stok Barang</b></label>
                            <br>
                            <h6 class="h6 text-gray-800" id="stok"><?= $d->stok ?></h6>

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/barangKeluar.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formbarangkeluar.js"></script>
<script src="<?= base_url(); ?>assets/plugin/datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>


<script>
$('.chosen').chosen({
    width: '100%',

});

$('#datepicker').datepicker({
    autoclose: true
});
</script>

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
<script>
$(document).ready(function() {

    let timerInterval
    Swal.fire({
        title: 'Loading...',
        timer: 1000,
        onBeforeOpen: () => {
            Swal.showLoading()
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {

    })
});
</script>
<?php endif; ?>

<?php endforeach; ?>