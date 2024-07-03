<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if( $this->session->flashdata('flash') ) : ?>
    <!--<div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">Data Siswa<strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>siswa/tambah" class="btn btn-primary">Tambah Data Siswa</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data siswa..." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
        <h3>Daftar Siswa</h3>
        <?php if ( empty($siswa) ) : ?>
            <div class="alert alert-danger" role="alert">
            Data Siswa tidak ditemukan.
            </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach( $siswa as $sw ) : ?>
                    <li class="list-group-item">
                        <?= $sw['nama']; ?>
                        <a href="<?= base_url(); ?>siswa/hapus/<?= $sw['id']; ?>" class="badge badge-danger float-right mx-1" onclick="return confirm('yakin?');">hapus</a>
                        <a href="<?= base_url(); ?>siswa/ubah/<?= $sw['id']; ?>" class="badge badge-success float-right mx-1" >ubah</a>
                        <a href="<?= base_url(); ?>siswa/detail/<?= $sw['id']; ?>" class="badge badge-primary float-right mx-1" >detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>