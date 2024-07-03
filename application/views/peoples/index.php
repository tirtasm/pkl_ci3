
<div class="container">
    <h3 class="mt-3">List of People</h3>

    <div class="row">
        <div class="col-md-5">
            <form action="<?= base_url('peoples') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search keyword..." name="keyword"
                        autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <!-- <h5>Hasil : <?= $total_rows ?></h5> -->
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($peoples)): ?>
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger" role="alert">
                                    Data Tidak Ditemukan!
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($peoples as $people): ?>
                        <tr>
                            <th><?= ++$start; ?></th>
                            <td><?= $people['name']; ?></td>
                            <td><?= $people['email']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>peoples/detail/<?= $people['id'] ?>"
                                    class="badge badge-warning">detail</a>
                                <a href="<?= base_url(); ?>peoples/edit/<?=$people['id']?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url(); ?>peoples/hapus/<?=$people['id']?>" class="badge badge-danger" onclick="return confirm('yakin?');">delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>