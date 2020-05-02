<?php
    $pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1 ;
    $mulai_dari = ($pagination-1) * $data_per_halaman;
    $where = false;
    $search_url =false;
    $kategori = query("select * from $module $where LIMIT $mulai_dari,$data_per_halaman");
    // tombol cari ditekan
    // if (isset($_POST['cari'])) {
    //     $kategori = cari($_POST['keyword']);
    // }
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
                                    <div class="card-body">
                                        <h5 class="card-title">List Kategori</h5>
                                        <table class="mb-0 table table-striped text-center table-hover ">
                                            <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Kategori</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                //lalu looping isi array yang dikirimkan
                                                $no = 1 + $mulai_dari;
                                                foreach($kategori as $kategori_part): ?>
                                                        <tr>
                                                            <th scope="row"><?= $no ?></th>
                                                            <td><?= $kategori_part["nama_kategori"] ?></td>
                                                            <td><?= substr($kategori_part["keterangan"],0,30) ?>......</td>
                                                            <td><?= ucwords($kategori_part["status"]) ?></td>
                                                            <td>
                                                                <form action="module/proses.php" method="POST">
                                                                    <input type="hidden" name="id" value="<?= $kategori_part["kategori_id"] ?>">
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