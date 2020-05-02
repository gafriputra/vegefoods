<?php
    $queryForm=false;
    $gambarUrl = false;
    $fromHidden = false;
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $queryForm = query("SELECT * FROM $module WHERE $module"."_"."id =$id")[0];
        var_dump($queryForm);
        $gambarUrl = "<img src='gambar/$module/$queryForm[gambar]' alt=''>";
        $fromHidden = "<input type='hidden' name='id' value='$id'>
                        <input type='hidden' name='gambarlama' value='$queryForm[gambar]'>";
    }
?>
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-graph text-success">
                                        </i>
                                    </div>
                                    <div>Tambah Produk
                                        <div class="page-title-subheading">Sebelum menambahkan produk, pastikan produk tersebut sudah sesuai dengan syarat dan ketentuan Tokopedia. Semua produk yang melanggar syarat dan ketentuan akan dinon-aktifkan oleh tim kami.
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                        <i class="fa fa-star"></i>
                                    </button>
                                    <div class="d-inline-block dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-business-time fa-w-20"></i>
                                            </span>
                                            Buttons
                                        </button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-inbox"></i>
                                                        <span>
                                                            Inbox
                                                        </span>
                                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-book"></i>
                                                        <span>
                                                            Book
                                                        </span>
                                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-picture"></i>
                                                        <span>
                                                            Picture
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                                        <i class="nav-link-icon lnr-file-empty"></i>
                                                        <span>
                                                            File Disabled
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        
                        <form class="" action="module/proses.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="module" value="<?= $module ?>">
                            <?php
                                if (isset($id)) : ?>
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <?php if (isset($_GET["pagination"])) : ?>
                                        <input type="hidden" name="pagination" value="<?= $_GET["pagination"] ?>">
                                    <?php endif; ?>
                             <?php endif; ?>

                            <div class="tab-content">
                                    <div class="" id="gambar" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">Upload Produk</h5>
                                                <span>Format gambar .jpg .jpeg .png dan ukuran minimum 300 x 300px (Untuk gambar optimal gunakan ukuran minimum 700 x 700 px)</span>
                                                <div>
                                                    <div class="position-relative row form-group mt-2">
                                                        <label for="customFile" class="col-sm-2 col-form-label">File</label>
                                                        <div class="col-sm-10">
                                                            <div class="custom-file">
                                                                <input name="gambar" type="file" class="custom-file-input" id="customFile" value="">
                                                                <label class="custom-file-label" for="customFile"><?= $queryForm["gambar"]?></label>
                                                                <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="" id="informasi" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Informasi Produk</h5>
                                                <div class="position-relative row form-group"><label for="nama_barang" class="col-sm-2 col-form-label">Nama Produk</label>
                                                        <div class="col-sm-10">
                                                            <input name="nama_barang" id="nama_barang" placeholder="Nama Produk" type="text" class="form-control" value="<?= $queryForm["nama_barang"]?>">
                                                        </div>
                                                </div>
                                                <?= $fromHidden ?>
                                                <div class="position-relative row form-group"><label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                                        <div class="col-sm-10">
                                                            <select name="kategori" id="kategori" class="form-control">
                                                               <?php
                                                                     // memanggil isi dari table kategori menggunakan combobox yang setatusnya on saja
                                                                    $kategori = query("SELECT kategori_id, nama_kategori FROM kategori WHERE status='on' ORDER BY nama_kategori ASC");
                                                                    foreach($kategori as $kategori_part) :
                                                                        // menampilkan combobox nya dengan memanggil dari tabel kat$kategori di database
                                                                        //     jika isi variabel $kategori_id sama dengan isi tabel kategori_id
                                                                            if($queryForm["kategori_id"] == $kategori_part["kategori_id"]) : ?>
                                                                                <option value="<?= $kategori_part["kategori_id"] ?>" selected="true"> <?= $kategori_part["nama_kategori"] ?></option>
                                                                    <?php   else : ?>
                                                                                <option value="<?= $kategori_part["kategori_id"] ?>"> <?= $kategori_part["nama_kategori"]?> </option>
                                                                    <?php   endif;
                                                                        endforeach; ?>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="position-relative row form-group"><label for="supplier" class="col-sm-2 col-form-label">supplier</label>
                                                        <div class="col-sm-10">
                                                            <select name="supplier" id="supplier" class="form-control">
                                                                <?php
                                                                     // memanggil isi dari table kategori menggunakan combobox yang setatusnya on saja
                                                                    $supplier = query("SELECT supplier_id, nama_supplier FROM supplier WHERE status='on' ORDER BY nama_supplier ASC");
                                                                    foreach($supplier as $supplier_part) :
                                                                    // menampilkan combobox nya dengan memanggil dari tabel supplier di database
                                                                    //     jika isi variabel $supplier_id sama dengan isi tabel supplier_id
                                                                        if($queryForm["supplier_id"] == $supplier_part["supplier_id"]) : ?>
                                                                            <option value="<?= $supplier_part["supplier_id"] ?>" selected="true"> <?= $supplier_part["nama_supplier"] ?></option>
                                                                <?php   else : ?>
                                                                            <option value="<?= $supplier_part["supplier_id"] ?>"> <?= $supplier_part["nama_supplier"]?> </option>
                                                                <?php   endif;
                                                                    endforeach; ?>
                                                            </select>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="" id="deskripsi" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Deskripsi Produk</h5>
                                                <div class="position-relative row form-group"><label for="deskripsi" class="col-sm-2 col-form-label">Keterangan Produk</label>
                                                        <div class="col-sm-10"><textarea name="deskripsi" id="deskripsi" class="form-control"><?= $queryForm["deskripsi"]?></textarea></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="" id="harga" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">Harga</h5>
                                                <div class="position-relative row form-group">
                                                        <label for="validasi_harga" class="col-sm-2 col-form-label">Harga Satuan</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="group_harga">Rp.</span>
                                                                </div>
                                                                <input type="text" name="harga" class="form-control" id="validasi_harga" placeholder="Harga dalam rupiah" aria-describedby="group_harga" value="<?= $queryForm["harga"]?> " required>
                                                                <div class="invalid-feedback">
                                                                    Masukkan Harga
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="" id="pengelolaan" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Pengelolaan Produk</h5>
                                                <div class="position-relative row form-group"><label for="status" class="col-sm-2 col-form-label">Status</label>
                                                        <div class="col-sm-3">
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="on"
                                                                    <?php if($queryForm['status']== "on") {echo "selected='true'";} ?> 
                                                                >On</option>
                                                                <option value="off"
                                                                    <?php if($queryForm['status']== "off") {echo "selected='true'";} ?> 
                                                                >Off</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <div class="position-relative row form-group">
                                                        <label for="validasi_stok" class="col-sm-2 col-form-label">Stok Produk</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="group_stok">Pcs.</span>
                                                                </div>
                                                                <input type="text" name="stok" class="form-control" id="validasi_stok" placeholder="Stok Barang" aria-describedby="group_stok" value="<?= $queryForm["stok"]?>" required>
                                                                <div class="invalid-feedback">
                                                                    Masukkan Jumalah Stok
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="" id="berat" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">Berat & Pengiriman</h5>
                                                <div class="position-relative row form-group">
                                                        <label for="validasi_berat" class="col-sm-2 col-form-label">Berat Produk</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <select name="jenis_berat" id="exampleSelect" class="form-control">
                                                                        <option value="gram">Gram (g)</option>
                                                                    </select>
                                                                </div>
                                                                <input type="text" name="berat" class="form-control" id="validasi_berat" placeholder="Berat Barang" aria-describedby="group_berat" value="<?= $queryForm["berat"] ?>" required>
                                                                <div class="invalid-feedback">
                                                                    Masukkan Jumalah Stok
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <?php
                                echo tombol(isset($_GET['id']));
                            ?>
                            </div>
                        </form>
                    </div>