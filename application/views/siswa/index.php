<div class="container">
<div class="row mt-3">
        <div class="col-md-6">
            <a href="siswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data mahasiswa..." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
        <h3>Daftar Mahasiswa</h3>
        <?php if ( empty($siswa) ) : ?>
            <div class="alert alert-danger" role="alert">
            Data Mahasiswa tidak ditemukan.
            </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach( $siswa as $sw ) : ?>
                    <li class="list-group-item">
                        <?= $sw['nama']; ?>
                        <a href="siswa/hapus/<?= $sw['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                        <a href="siswa/ubah/<?= $sw['id']; ?>" class="badge badge-success float-right" >ubah</a>
                        <a href="siswa/detail/<?= $sw['id']; ?>" class="badge badge-primary float-right" >detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>