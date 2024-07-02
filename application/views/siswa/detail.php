<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-6">

            <div class="card ">
                <div class="card-header">
                    Detail Data Mahasiswa
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $siswa['nama']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $siswa['email']; ?></h6>
                    <p class="card-text"><?= $siswa['nis']; ?></p>
                    <p class="card-text"><?= $siswa['jurusan']; ?></p>
                    <a href="<?= base_url(); ?>siswa" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>