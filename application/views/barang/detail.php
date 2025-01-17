<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
            &nbsp;
            <h1 class="h2 mb-0 text-gray-800">Detail Barang</h1>
        </div>
        <a href="<?= base_url() ?>barang" class="btn btn-danger btn-sm btn-icon-split">
            <span class="text text-white">Kembali</span>
            <span class="icon text-white-50">
                <i class="fas fa-times"></i>
            </span>
        </a>
    </div>

    <?php foreach ($data as $d): ?>

    <div class="d-sm-flex justify-content-between mb-0">
        <div class="col-lg-12 mb-4">
            <!-- Barang -->
            <div class="card shadow border-bottom-primary mb-4">
                <div class="card-body d-sm-flex">
                    <div class="col-lg-3">
                        <img width="100%" style="border-radius: 10px;"
                            src="<?= base_url() ?>assets/upload/barang/<?= $d->foto ?>" alt="">
                    </div>

                    <br>

                    <div class="col-lg-9">
                        <!-- ID Barang -->
                        <div class="form-group"><label>ID Barang</label>
                            <h5 class="h5 text-gray-800"><b><?= $d->id_barang ?></b></h5>
                        </div>

                        <!-- Nama Barang -->
                        <div class="form-group"><label>Nama Barang</label>
                            <h5 class="h5 text-gray-800"><?= $d->nama_barang ?></h5>
                        </div>

                        <!-- Stok -->
                        <div class="form-group"><label>Stok</label>
                            <?php  
                                $data = $this->db->select_sum('jumlah_masuk')->from('barang_masuk')->where('id_barang', $d->id_barang)->get();
                                $data2 = $this->db->select_sum('jumlah_keluar')->from('barang_keluar')->where('id_barang', $d->id_barang)->get();
                                
                                $bm = $data->row();
                                $bk = $data2->row();
                                $hasil = intval($d->stok) + (intval($bm->jumlah_masuk) - intval($bk->jumlah_keluar));

                                $warna = '';
                                if ($hasil < 0) {
                                    $warna = 'text-danger'; // Merah
                                } elseif ($hasil < 5) {
                                    $warna = 'text-warning'; // Kuning
                                } else {
                                    $warna = 'text-success'; // Hijau
                                }
                            ?>
                            
                            <h5 class="h5 text-gray-800"><?= $hasil ?></h5>
                        </div>

                        <!-- Jenis Barang -->
                        <div class="form-group"><label>Jenis Barang</label>
                            <h5 class="h5 text-gray-800"><?= $d->nama_jenis ?></h5>
                        </div>

                        <!-- Satuan Barang -->
                        <div class="form-group"><label>Satuan Barang</label>
                            <h5 class="h5 text-gray-800"><?= $d->nama_satuan ?></h5>
                        </div>

                        <!-- Harga Beli -->
                        <div class="form-group"><label>Harga Beli</label>
                            <h5 class="h5 text-gray-800"><?= $d->harga_beli ?></h5>
                        </div>

                        <!-- Harga Jual -->
                        <div class="form-group"><label>Harga Jual</label>
                            <h5 class="h5 text-gray-800"><?= $d->harga_jual ?></h5>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <?php endforeach; ?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
<script>
$(document).ready(function() {

    $('#pdf').hide();

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