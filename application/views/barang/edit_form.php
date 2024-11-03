<main>
    <div class="container-fluid">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('barang') ?>">Barang</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo site_url('barang/save') ?>" method="post">
                    <div class="mb-3">
                        <label>Barcode <code>*</code></label>
                        <input class="form-control" type="hidden" name="id" value="<?= isset($barang->id) ? $barang->id : ''; ?>" required />
                        <input class="form-control" name="barkode" value="<?= isset($barang->barkode) ? $barang->barkode : ''; ?>" type="text" placeholder="Barkode">
                    </div>
                    <div class="mb-3">
                        <label>Nama Barang <code>*</code></label>
                        <input class="form-control" name="name" value="<?= isset($barang->name) ? $barang->name : ''; ?>" type="text" placeholder="Nama Barang">
                    </div>
                    <div class="mb-3">
                        <label>Harga Beli <code>*</code></label>
                        <input class="form-control" name="harga_beli" value="<?= isset($barang->harga_beli) ? $barang->harga_beli : ''; ?>" type="text" placeholder="Harga Beli">
                    </div>
                    <div class="mb-3">
                        <label>Harga Jual <code>*</code></label>
                        <input class="form-control" name="harga_jual" value="<?= isset($barang->harga_jual) ? $barang->harga_jual : ''; ?>" type="text" placeholder="Harga Jual">
                    </div>
                    <div class="mb-3">
                        <label>Stok</label>
                        <input class="form-control" name="stok" value="<?= isset($barang->stok) ? $barang->stok : ''; ?>" type="text" placeholder="Stok" disabled>
                    </div>
                    <div class="mb-3">
                        <label>Kategori <code>*</code></label>
                        <select name="kategori" class="form-control" required>
                            <?php foreach ($kategori as $kat): ?>
                                <option value="<?= $kat['id'] ?>" <?= isset($barang->kategori_id) && $barang->kategori_id == $kat['id'] ? 'selected' : ''; ?>>
                                    <?= $kat['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Satuan <code>*</code></label>
                        <select name="satuan" class="form-control" required>
                            <?php foreach ($satuan as $sat): ?>
                                <option value="<?= $sat['id'] ?>" <?= isset($barang->satuan_id) && $barang->satuan_id == $sat['id'] ? 'selected' : ''; ?>>
                                    <?= $sat['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Supplier <code>*</code></label>
                        <select name="supplier" class="form-control" required>
                            <?php foreach ($supplier as $sup): ?>
                                <option value="<?= $sup['id'] ?>" <?= isset($barang->supplier_id) && $barang->supplier_id == $sup['id'] ? 'selected' : ''; ?>>
                                    <?= $sup['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="btn btn-warning" type="submit"><i class="fas fa-plus"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</main>
