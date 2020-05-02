<?php
    if (isset($_POST["submit"])) {
        if ($_POST["submit"] === "resi") {
            ubah($_POST,$module);
        }
    }
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

                            <div class="col-md-12">
                                        <div class="mb-3 card">
                                            <div class="card-body">
                                                <ul class="tabs-animated-shadow nav-justified tabs-animated nav">
                                                    <li class="nav-item">
                                                        <a role="tab" class="nav-link active show" id="tab-c1-0" data-toggle="tab" href="#tab-animated1-0" aria-selected="true">
                                                            <span class="nav-text">Pesanan Baru</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a role="tab" class="nav-link show" id="tab-c1-1" data-toggle="tab" href="#tab-animated1-1" aria-selected="false">
                                                            <span class="nav-text">Siap Dikirim</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a role="tab" class="nav-link show" id="tab-c1-2" data-toggle="tab" href="#tab-animated1-2" aria-selected="false">
                                                            <span class="nav-text">Proses Pengiriman</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a role="tab" class="nav-link show" id="tab-c1-3" data-toggle="tab" href="#tab-animated1-3" aria-selected="false">
                                                            <span class="nav-text">Sampai Tujuan</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active show" id="tab-animated1-0" role="tabpanel">
                                                    <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="main-card mb-3 card">
                                                                    <div class="table-responsive">
                                                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="text-center">No Invoice</th>
                                                                                    <th>Detail Penerima</th>
                                                                                    <th class="text-center">Action</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                                                <?php
                                                                                                                    $dibayar = query("SELECT * from pesanan 
                                                                                                                                        WHERE pesanan.status = 'Dibayar' ORDER BY pesanan_id DESC");
                                                                                                                    foreach ($dibayar as $dibayar_part):
                                                                                                                ?>
                                                                                                                    <tr>
                                                                                                                        <td class="text-center text-muted">
                                                                                                                            <div>#
                                                                                                                                <a href="invoice/invoice.php?pesanan_id=<?=$dibayar_part["pesanan_id"]?>" target="_blank">
                                                                                                                                    <?= $dibayar_part["no_invoice"]?>
                                                                                                                                </a>
                                                                                                                            </div>
                                                                                                                            <div><span><?= rupiah($dibayar_part["total"])?></span></div>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                            <div class="widget-content p-0">
                                                                                                                                <div class="widget-content-wrapper">
                                                                                                                                    <div class="widget-content-left flex2">
                                                                                                                                        <div class="widget-heading"><?= $dibayar_part["nama_penerima"]?></div>
                                                                                                                                        <div class="widget-subheading opacity-7"><?= $dibayar_part["telepon"]?>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                        <td class="text-center">
                                                                                                                            <form action="module/proses.php" method="POST">
                                                                                                                                <input type="hidden" name="id" value="<?=$dibayar_part["pesanan_id"]?>">
                                                                                                                                <input type="hidden" name="module" value="<?= $module ?>">
                                                                                                                                <button type="submit" class="btn btn-outline-primary" name="submit" value="edit">Proses Pesanan</button>
                                                                                                                            </form>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                <?php
                                                                                                                    endforeach;
                                                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane show" id="tab-animated1-1" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="main-card mb-3 card">
                                                                    <div class="table-responsive">
                                                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="text-center">No Invoice</th>
                                                                                    <th>Detail Penerima</th>
                                                                                    <th class="">Kurir</th>
                                                                                    <th class="text-center">No Resi</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                                                <?php
                                                                                                                    $diproses = query("SELECT pesanan.*, pengiriman.pengiriman_id, pengiriman.harga as harga_pengiriman ,kurir.nama_ekspedisi from pesanan 
                                                                                                                                    JOIN pengiriman ON pesanan.pesanan_id = pengiriman.pesanan_id 
                                                                                                                                    JOIN kurir ON kurir.kurir_id = pengiriman.kurir_id 
                                                                                                                                    WHERE pesanan.status = 'Diproses' ORDER BY pesanan.pesanan_id DESC");
                                                                                                                    foreach ($diproses as $diproses_part):
                                                                                                                ?>
                                                                                                                    <tr>
                                                                                                                        <td class="text-center text-muted">
                                                                                                                            <div>#
                                                                                                                                <a href="invoice/invoice.php?pesanan_id=<?=$diproses_part["pesanan_id"]?>" target="_blank">
                                                                                                                                    <?= $diproses_part["no_invoice"]?>
                                                                                                                                </a>
                                                                                                                            </div>
                                                                                                                            <div><span><?= rupiah($diproses_part["total"])?></span></div>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                            <div class="widget-content p-0">
                                                                                                                                <div class="widget-content-wrapper">
                                                                                                                                    <div class="widget-content-left flex2">
                                                                                                                                        <div class="widget-heading"><?= $diproses_part["nama_penerima"]?></div>
                                                                                                                                        <div class="widget-subheading opacity-7"><?= $diproses_part["telepon"]?>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                            <div class="widget-content p-0">
                                                                                                                                <div class="widget-content-wrapper">
                                                                                                                                    <div class="widget-content-left flex2">
                                                                                                                                        <div class="widget-heading"><?= $diproses_part["nama_ekspedisi"]?></div>
                                                                                                                                        <div class="widget-subheading opacity-7"><?= rupiah($diproses_part["harga_pengiriman"])?>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                        <td class="text-center">
                                                                                                                            <form class="form-inline justify-content-center" action="" method="POST">
                                                                                                                                <input type="hidden" name="id" value="<?=$diproses_part["pesanan_id"]?>">
                                                                                                                                <input type="hidden" name="module" value="<?= $module ?>">
                                                                                                                                <div class="input-group">
                                                                                                                                    <input type="text" class="form-control" name="noresi" value="" autofocus="" autocomplete="off" placeholder="Masukkan Resi">
                                                                                                                                    <div class="input-group-append">
                                                                                                                                        <button type="submit" class="btn btn-primary" name="submit" value="resi">Kirim</button>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </form>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                <?php
                                                                                                                    endforeach;
                                                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane show" id="tab-animated1-2" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="main-card mb-3 card">
                                                                    <div class="table-responsive">
                                                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="text-center">No Invoice</th>
                                                                                    <th>Detail Penerima</th>
                                                                                    <th class="">Kurir</th>
                                                                                    <th class="text-center">Pengiriman</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                                                <?php
                                                                                                                    $dikirim = query("SELECT pesanan.*, pengiriman.noresi, pengiriman.tanggal_pengiriman, pengiriman.harga as harga_pengiriman ,kurir.nama_ekspedisi from pesanan 
                                                                                                                                    JOIN pengiriman ON pesanan.pesanan_id = pengiriman.pesanan_id 
                                                                                                                                    JOIN kurir ON kurir.kurir_id = pengiriman.kurir_id 
                                                                                                                                    WHERE pesanan.status = 'Dikirim' ORDER BY pesanan.pesanan_id DESC");
                                                                                                                    foreach ($dikirim as $dikirim_part):
                                                                                                                ?>
                                                                                                                    <tr>
                                                                                                                        <td class="text-center text-muted">
                                                                                                                            <div>#
                                                                                                                                <a href="invoice/invoice.php?pesanan_id=<?=$dikirim_part["pesanan_id"]?>" target="_blank">
                                                                                                                                    <?= $dikirim_part["no_invoice"]?>
                                                                                                                                </a>
                                                                                                                            </div>
                                                                                                                            <div><span><?= rupiah($dikirim_part["total"])?></span></div>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                            <div class="widget-content p-0">
                                                                                                                                <div class="widget-content-wrapper">
                                                                                                                                    <div class="widget-content-left flex2">
                                                                                                                                        <div class="widget-heading"><?= $dikirim_part["nama_penerima"]?></div>
                                                                                                                                        <div class="widget-subheading opacity-7"><?= $dikirim_part["telepon"]?>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                            <div class="widget-content p-0">
                                                                                                                                <div class="widget-content-wrapper">
                                                                                                                                    <div class="widget-content-left flex2">
                                                                                                                                        <div class="widget-heading"><?= $dikirim_part["nama_ekspedisi"]?></div>
                                                                                                                                        <div class="widget-subheading opacity-7"><?= rupiah($dikirim_part["harga_pengiriman"])?>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                        <td class="text-center">
                                                                                                                            <div class="widget-content p-0">
                                                                                                                                <div class="widget-content-wrapper">
                                                                                                                                    <div class="widget-content-left flex2">
                                                                                                                                        <div class="widget-heading">No Resi : <?= $dikirim_part["noresi"]?></div>
                                                                                                                                        <div class="widget-subheading opacity-7">Dikirim : <?=$dikirim_part["tanggal_pengiriman"]?>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                <?php
                                                                                                                    endforeach;
                                                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane show" id="tab-animated1-3" role="tabpanel">
                                                                            <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="main-card mb-3 card">
                                                                                            <div class="table-responsive">
                                                                                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th class="text-center">No Invoice</th>
                                                                                                            <th>Detail Penerima</th>
                                                                                                            <th class="text-center">Status</th>
                                                                                                            <th class="text-center" colspan="2">Pengiriman</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                    <?php
                                                                                                        $diterima = query("SELECT pesanan.*, pengiriman.*, kurir.nama_ekspedisi from pesanan 
                                                                                                                            JOIN pengiriman ON pesanan.pesanan_id = pengiriman.pesanan_id 
                                                                                                                            JOIN kurir ON kurir.kurir_id = pengiriman.kurir_id 
                                                                                                                            WHERE pesanan.status = 'Diterima' ORDER BY pesanan.pesanan_id DESC");
                                                                                                        foreach ($diterima as $diterima_part):
                                                                                                    ?>
                                                                                                        <tr>
                                                                                                            <td class="text-center text-muted">
                                                                                                                <div>#
                                                                                                                    <a href="invoice/invoice.php?pesanan_id=<?=$diterima_part["pesanan_id"]?>" target="_blank">
                                                                                                                        <?= $diterima_part["no_invoice"]?>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                                <div><span><?= rupiah($diterima_part["total"])?></span></div>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <div class="widget-content p-0">
                                                                                                                    <div class="widget-content-wrapper">
                                                                                                                        <div class="widget-content-left flex2">
                                                                                                                            <div class="widget-heading"><?= $diterima_part["nama_penerima"]?></div>
                                                                                                                            <div class="widget-subheading opacity-7"><?= $diterima_part["telepon"]?>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                            <td class="text-center">
                                                                                                                <div class="badge badge-success p-3"><?= $diterima_part["status"]?></div>
                                                                                                            </td>
                                                                                                            <td class="">
                                                                                                                <div class="widget-heading"><?= $diterima_part["nama_ekspedisi"]?></div>
                                                                                                                <div class="widget-subheading opacity-7">Resi : 545645645465<?= $diterima_part["noresi"]?></div>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <div class="widget-heading">Diterima Oleh : <?= $diterima_part["nama_penerima_barang"]?></div>
                                                                                                                <div class="widget-subheading opacity-7">Tanggal : <?= date("d-m-Y",strtotime($diterima_part["tanggal_diterima"]))?></div>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    <?php
                                                                                                        endforeach;
                                                                                                    ?>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>

                        </div>