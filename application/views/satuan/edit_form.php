<main>
    <div class="container-fluid">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('satuan') ?>">Satuan</a></li>
            <li class="breadcrumb-item active">Edit Satuan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo site_url('satuan/update') ?>" method="post">
                    <div class="mb-4">
                        <label for="id">ID</label>
                        <input class="form-control" type="text" name="id" value="<?php echo $satuan->id; ?>" readonly />
                    </div>
                    <div class="mb-4">
                        <label for="name">Name <code>*</code></label>
                        <input class="form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>" type="text" name="name" value="<?php echo $satuan->name; ?>" placeholder="Name" required />
                        <div class="invalid-feedback">
                            <?php echo form_error('name'); ?>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="deskripsi">Deskripsi</label>
                        <input class="form-control <?php echo form_error('deskripsi') ? 'is-invalid' : '' ?>" type="text" name="deskripsi" value="<?php echo $satuan->deskripsi; ?>" placeholder="Deskripsi" required />
                        <div class="invalid-feedback">
                            <?php echo form_error('deskripsi'); ?>
                        </div>
                    </div>
                    <button class="btn btn-warning" type="submit"><i class="fas fa-save"></i> Update</button>
                </form>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>
