<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-6">

            <div class="card ">
                <div class="card-header">
                    Detail Data People
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $people['name']; ?></h5>
                    <p class="card-text"><?= $people['alamat']; ?></p>
                    <p class="card-text"><?= $people['email']; ?></p>
                    <a href="<?= base_url(); ?>peoples" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>