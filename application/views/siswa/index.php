<div class="container mb-5">
<div class="row mt-3">
        <div class="col-md-6">
            <a href="<?=base_url();?>siswa/tambah" class="btn btn-primary">Tambah Data Siswa</a>
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
                        <a href="siswa/hapus/<?= $sw['id']; ?>" class="badge badge-danger float-right mx-1" onclick="return confirm('yakin?');">hapus</a>
                        <a href="siswa/ubah/<?= $sw['id']; ?>" class="badge badge-success float-right mx-1" >ubah</a>
                        <a href="siswa/detail/<?= $sw['id']; ?>" class="badge badge-primary float-right mx-1" >detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>