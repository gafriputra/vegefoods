<?php
    $queryForm=false;
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $queryForm = query("SELECT pesanan.*, konfirmasi_pembayaran.* FROM pesanan
                            JOIN konfirmasi_pembayaran ON pesanan.pesanan_id = konfirmasi_pembayaran.pesanan_id
                        WHERE pesanan.pesanan_id = $id")[0];
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
                                    <div>Update Transaksi
                                        <div class="page-title-subheading">Sebelum menambahkan kategori, pastikan produk tersebut sudah sesuai dengan syarat dan ketentuan kami.
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
                        
                        <form class="" novalidate action="module/proses.php" method="POST">
                            <input type="hidden" name="module" value="<?= $module ?>">
                            <?php
                                if (isset($id)) : ?>
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <?php if (isset($_GET["pagination"])) : ?>
                                        <input type="hidden" name="pagination" value="<?= $_GET["pagination"] ?>">
                                    <?php endif; ?>
                             <?php endif; ?>
                            <div class="tab-content">

                                    <div class="" id="#" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Informasi Transaksi</h5>
                                                <div class="position-relative row form-group">
                                                        <label class="col-sm-2 col-form-label font-weight-bold">Nomer Invoice :</label>
                                                        <div class="col-sm-4 mt-2">#
                                                            <a href="invoice/invoice.php?pesanan_id=<?=$queryForm["pesanan_id"]?>" target="_blank">
                                                               <?= $queryForm["no_invoice"]?>
                                                            </a>
                                                            <p>
                                                                <?= rupiah($queryForm["total"])?>
                                                            </p>
                                                        </div>
                                                        <label class="col-sm-2 col-form-label font-weight-bold">Info Pembayaran :</label>
                                                        <div class="col-sm-4 mt-2">
                                                            <p>
                                                                <?= $queryForm["nama_bank"]?>
                                                            </p>
                                                            <p>
                                                                <?= $queryForm["nomor_rekening"]?> (An. <?= $queryForm["nama_rekening"]?>)
                                                            </p>
                                                        </div>
                                                </div>
                                                <div class="position-relative row form-group"><label for="deskripsi" class="col-sm-2 col-form-label font-weight-bold">Bukti Transfer</label>
                                                    <div class="col-sm-10 ftco-animate">
                                                        <a href="" class="image-popup"><img src="gambar/bukti/<?= $queryForm["gambar"]?>" class="img-fluid" alt="Colorlib Template"></a>
                                                    </div>
                                                </div>
                                                <div class="position-relative row form-group"><label for="status" class="col-sm-2 col-form-label">Status</label>
                                                        <div class="col-sm-3">
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="Diproses">Diproses</option>
                                                                <option value="Ditolak">Ditolak</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <input type="hidden" name="id" value="<?=$queryForm["pesanan_id"]?>">
                                                <input type="hidden" name="module" value="<?=$module?>">
                                                <button type="submit" name="submit" value="update" class="btn btn-primary">Update Status</button>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </form>
                    </div>