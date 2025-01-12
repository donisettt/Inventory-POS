<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="d-sm-flex">
            &nbsp;
            <h1 class="h2 mb-0 text-gray-800">Detail User</h1>
        </div>
            <a href="<?= base_url() ?>user" class="btn btn-danger btn-sm btn-icon-split">
                <span class="text text-white">Kembali</span>
                <span class="icon text-white-50">
                    <i class="fas fa-times"></i>
                </span>
            </a>   
    </div>

    <?php foreach ($data as $d): ?>

    <div class="d-sm-flex  justify-content-between mb-0">
        <div class="col-lg-12">
            <!-- buku -->
            <div class="card shadow border-bottom-primary mb-4">
                <div class="card-body d-sm-flex">
                    <div class="col-lg-3 mr-3">
                        <img width="100%" style="border-radius: 10px;"
                            src="<?= base_url() ?>assets/upload/pengguna/<?= $d->foto ?>" alt="">
                    </div>

                    <br>

                    <div class="col-lg-12">
                        <!-- ID Anggota -->
                        <div class="form-group"><label>ID Pengguna</label>
                            <h5 class="h5 text-gray-800"><b><?= $d->id_user ?></b></h5>
                        </div>

                         <!-- Nama Lengkap -->
                         <div class="form-group"><label>Nama Lengkap</label>
                            <h5 class="h5 text-gray-800"><?= $d->nama ?></h5>
                        </div>

                        <!-- Username -->
                        <div class="form-group"><label>Username</label>
                            <h5 class="h5 text-gray-800"><?= $d->username ?></h5>
                        </div>

                        <!-- NoTelepon -->
                        <div class="form-group"><label>Nomor Telepon</label>
                            <h5 class="h5 text-gray-800"><?= $d->notelp ?></h5>
                        </div>

                        <!-- Email -->
                        <div class="form-group"><label>Email</label>
                            <h5 class="h5 text-gray-800"><?= $d->email ?></h5>
                        </div>

                        <!-- Level -->
                        <div class="form-group"><label>Level</label>
                            <h5 class="h5 text-gray-800"><?= $d->level ?></h5>
                        </div>

                        <!-- Status -->
                        <div class="form-group"><label>Status</label>
                            <?php if($d->status == "Aktif"): ?>
                            <h5 class="h5 text-success">
                            <?php else: ?>
                            <h5 class="h5 text-gray-800">
                            <?php endif; ?>
                                <?= $d->status ?>
                            </h5>
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
<script src="<?= base_url(); ?>assets/js/pengguna.js"></script>

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