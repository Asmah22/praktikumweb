<main>
    <div class="container-fluid">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('satuan') ?>">Satuan</a></li>
            <li class="breadcrumb-item active">Add New Satuan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo site_url('satuan/save') ?>" method="post">
                    <div class="mb-4">
                        <label for="id">ID <code>*</code></label>
                        <input class="form-control" type="text" name="id" placeholder="ID" required />
                    </div>
                    <div class="mb-4">
                        <label for="name">Name <code>*</code></label>
                        <input class="form-control" type="text" name="name" placeholder="Name" required />
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <input class="form-control" type="text" name="deskripsi" placeholder="Deskripsi" required />
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i> Save</button>
                </form>
            </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>
