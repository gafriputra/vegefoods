<?php

    $pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1 ;
    
    $where = false;
    $search_url =false;
    $keyword =false;
    // tombol cari ditekan
    if (isset($_POST['cari'])) {
        $pagination = 1;
        $keyword = $_POST["keyword"];
        $search_url = "&search=$keyword";
        $where = "  WHERE
                    barang.nama_barang like '%$keyword%' or
                    barang.harga like '%$keyword%' or
                    barang.stok like '%$keyword%' or
                    barang.berat like '%$keyword%'
                    ";
    }elseif (isset($_GET["search"])) {
        $keyword = $_GET["search"];
        $search_url = "&search=$keyword";
        $where = "  WHERE
                    barang.nama_barang like '%$keyword%' or
                    barang.harga like '%$keyword%' or
                    barang.stok like '%$keyword%' or
                    barang.berat like '%$keyword%'
                    ";
    }
    $mulai_dari = ($pagination-1) * $data_per_halaman;
    
    $barang = query("SELECT barang.*, kategori.nama_kategori, supplier.nama_supplier from $module 
                    JOIN kategori ON barang.kategori_id=kategori.kategori_id
                    JOIN supplier ON barang.supplier_id=supplier.supplier_id 
                    $where ORDER BY barang.barang_id DESC LIMIT $mulai_dari,$data_per_halaman");
                    // var_dump($barang);die;
?>

                    <div class="app-main__inner">
                        
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Regular Tables
                                        <div class="page-title-subheading">Tables are the backbone of almost all web applications.
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                        <?= tombol_tambah();?>
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

                        <div class="row">
                
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    
                                    <div class="col-lg-8 mt-3">
                                        <!-- arahkan action ke link dengan variabel url yang berisi mengikuti isi dari variabel biasab -->
                                        <form class="form-inline" action=""  method="POST">
                                            
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="keyword" id="keyword" value="<?=$keyword?>"
                                                autofocus autocomplete="off" placeholder="Search">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary" name="cari" id="tombol-cari">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">List Barang</h5>
                                        <div id="data-berubah">
                                            <div class="table-responsive">
                                                <table class="mb-0 table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Produk</th>
                                                            <th scope="col">Informasi</th>
                                                            <th scope="col">Detail</th>
                                                            <th scope="col" class="text-center">Status</th>
                                                            <th scope="col"  class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        //lalu looping isi array yang dikirimkan
                                                        $no = 1 + $mulai_dari;
                                                        foreach($barang as $barang_part): ?>
                                                                <tr>
                                                                    <th scope="row"><?= $no ?></th>
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="col-12 col-md-4 justify-content-center"><img src="gambar/barang/<?= $barang_part['gambar']?>" alt="" width="100px"></div>
                                                                            <div class="col-12 col-md-8">
                                                                                <div class="col-12 col-md-12 font-weight-bold text-capitalize"><?= $barang_part['nama_barang'] ?></div>
                                                                                <div class="mt-2 col-12 col-md-12 font-weight-light font-italic"><?= $barang_part['nama_kategori'] ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="col-12">Supplier : <?= $barang_part['nama_supplier'] ?></div>
                                                                            <div class="col-12">Harga : <?= rupiah($barang_part['harga']) ?></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="col-12">Stok : <?= $barang_part['stok'] ?> pcs</div>
                                                                            <div class="col-12">Berat : <?= $barang_part['berat'] ?> gram</div>
                                                                        </div>
                                                                    </td>
                                                                    <td  class="text-center"><?= ucwords($barang_part["status"]) ?></td>
                                                                    <td>
                                                                        <form action="module/proses.php" method="POST">
                                                                            <input type="hidden" name="id" value="<?= $barang_part["barang_id"] ?>">
                                                                            <input type="hidden" name="module" value="<?= $module ?>">
                                                                            <?php if (isset($_GET["pagination"])) : ?>
                                                                                <input type="hidden" name="pagination" value="<?= $pagination ?>">
                                                                            <?php endif; ?>
                                                                                    <button class="mb-2 mr-2 btn-transition btn btn-outline-danger" name="submit" value="hapus" 
                                                                                    onclick="return confirm('yakin');">Hapus</button>
                                                                                    <button class="mb-2 mr-2 btn-transition btn btn-outline-primary" name="submit" value="edit" 
                                                                                    >Edit</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                    <?php $no++;
                                                        endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php
                                                $queryHitungData = "SELECT * FROM $module $where";
                                                // memanggil function
                                                pagination($queryHitungData, $data_per_halaman, $pagination, "?module=$module&action=$action$search_url");
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>


                    </div>

                    <script src="module/barang/script.js"></script>