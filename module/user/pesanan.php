<?php
    $id = $_SESSION["login_user"]["user_id"];
?>
                                                            <div class="main-card mb-3 card">
                                                                <div class="card-body">
                                                                    <ul class="nav nav-tabs nav-justified">
                                                                        <li class="nav-item"><a data-toggle="tab" href="#bayar"
                                                                                class="active nav-link">Konfirmasi Pembayaran</a></li>
                                                                        <li class="nav-item"><a data-toggle="tab" href="#proses"
                                                                                class="nav-link">Diproses</a></li>
                                                                        <li class="nav-item"><a data-toggle="tab" href="#kirim"
                                                                                class="nav-link">Dikirim</a></li>
                                                                        <li class="nav-item"><a data-toggle="tab" href="#sampai"
                                                                                class="nav-link">Sampai Tujuan</a></li>
                                                                    </ul>
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane active" id="bayar" role="tabpanel">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="main-card mb-3 card">
                                                                                        <div class="table-responsive">
                                                                                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th class="text-center">No Invoice</th>
                                                                                                        <th>Detail Penerima</th>
                                                                                                        <th class="text-center">Kota</th>
                                                                                                        <th class="text-center">Status</th>
                                                                                                        <th class="text-center">Konfirmasi</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                <?php
                                                                                                    $dipesan = query("SELECT * from pesanan where user_id = $id and status='Dipesan' ORDER BY pesanan_id DESC");
                                                                                                    foreach ($dipesan as $dipesan_part):
                                                                                                ?>
                                                                                                    <tr>
                                                                                                        <td class="text-center text-muted">
                                                                                                            <div>#
                                                                                                                <a href="admin/invoice/invoice.php?pesanan_id=<?=$dipesan_part["pesanan_id"]?>" target="_blank">
                                                                                                                    <?= $dipesan_part["no_invoice"]?>
                                                                                                                </a>
                                                                                                            </div>
                                                                                                            <div><span><?= rupiah($dipesan_part["total"])?></span></div>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <div class="widget-content p-0">
                                                                                                                <div class="widget-content-wrapper">
                                                                                                                    <div class="widget-content-left flex2">
                                                                                                                        <div class="widget-heading"><?= $dipesan_part["nama_penerima"]?></div>
                                                                                                                        <div class="widget-subheading opacity-7"><?= $dipesan_part["telepon"]?>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                        <td class="text-center">
                                                                                                            <div class="widget-heading"><?= $dipesan_part["nama_kota"]?></div>
                                                                                                            <div class="widget-subheading opacity-7"><?= $dipesan_part["kodepos"]?></div>
                                                                                                        </td>
                                                                                                        <td class="text-center">
                                                                                                            <div class="badge badge-warning p-3"><?= $dipesan_part["status"]?></div>
                                                                                                        </td>
                                                                                                        <td class="">
                                                                                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal<?= $dipesan_part["pesanan_id"]?>">Konfirmasi</button>
                                                                                                            <div class="modal fade bd-example-modal-lg" id="modal<?= $dipesan_part["pesanan_id"]?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                                                                <div class="modal-dialog modal-lg">
                                                                                                                    <div class="modal-content">
                                                                                                                    <div class="modal-header text-center">
                                                                                                                        <h5 class="modal-title">Konfirmasi Pembayaran</h5>
                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <div class="row">
                                                                                                                            <div class="col-lg-10 mx-auto">
                                                                                                                                <div class="bg-white rounded-lg shadow-sm p-5">
                                                                                                                                    <!-- Credit card form tabs -->
                                                                                                                                    <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                                                                                                                                    
                                                                                                                                    <li class="nav-item">
                                                                                                                                        <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                                                                                                                                                            <i class="fa fa-university"></i>
                                                                                                                                                            Bank Transfer
                                                                                                                                                        </a>
                                                                                                                                    </li>
                                                                                                                                    <li class="nav-item">
                                                                                                                                        <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
                                                                                                                                                            <i class="fa fa-paypal"></i>
                                                                                                                                                            E-Money
                                                                                                                                                        </a>
                                                                                                                                    </li>
                                                                                                                                    <li class="nav-item">
                                                                                                                                        <a data-toggle="pill" href="#nav-tab-bank" class="nav-link  rounded-pill">
                                                                                                                                                            <i class="fa fa-credit-card"></i>
                                                                                                                                                            Informasi Bank Kami
                                                                                                                                                        </a>
                                                                                                                                    </li>
                                                                                                                                    </ul>
                                                                                                                                    <!-- End -->


                                                                                                                                    <!-- Credit card form content -->
                                                                                                                                    <div class="tab-content">

                                                                                                                                    <!-- credit card info-->
                                                                                                                                    <div id="nav-tab-card" class="tab-pane fade show active">
                                                                                                                                        <p class="alert alert-success">No Invoice #<?= $dipesan_part["no_invoice"]?></p>
                                                                                                                                        <form role="form" class="text-left" action="" method="POST" enctype="multipart/form-data">
                                                                                                                                            <div class="form-group">
                                                                                                                                                <label for="username">Atas Nama</label>
                                                                                                                                                <input type="text" name="nama" placeholder="Nama.." required class="form-control">
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group">
                                                                                                                                                <label for="cardNumber">Dari Bank</label>
                                                                                                                                                <div class="input-group">
                                                                                                                                                <input type="text" name="namabank" placeholder="Nama Bank" class="form-control" required>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group">
                                                                                                                                                <label for="cardNumber">No Rekening</label>
                                                                                                                                                <div class="input-group">
                                                                                                                                                <input type="text" name="norek" placeholder="Nomer Rekening" class="form-control" required>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group">
                                                                                                                                                <div class="input-group">
                                                                                                                                                    <div class="input-group-prepend">
                                                                                                                                                        <span class="input-group-text" id="inputGroupFileAddon01">Bukti Transfer</span>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="custom-file">
                                                                                                                                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="gambar"
                                                                                                                                                        aria-describedby="inputGroupFileAddon01">
                                                                                                                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file...</label>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <input type="hidden" name="pesanan_id" value="<?=$dipesan_part["pesanan_id"]?>">                                   
                                                                                                                                            <button type="submit" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm" name="submit" value="bayar"> Kirim  </button>
                                                                                                                                        </form>
                                                                                                                                    </div>
                                                                                                                                    <!-- End -->

                                                                                                                                    <!-- Paypal info -->
                                                                                                                                    <div id="nav-tab-paypal" class="tab-pane fade text-left">
                                                                                                                                        <p>E-money is easiest way to pay online</p>
                                                                                                                                        <p>
                                                                                                                                        <button type="button" class="btn btn-primary rounded-pill"><i class="fa fa-paypal mr-2"></i> Log into my E-money</button>
                                                                                                                                        </p>
                                                                                                                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                                                                                                        </p>
                                                                                                                                    </div>
                                                                                                                                    <!-- End -->

                                                                                                                                    <!-- bank transfer info -->
                                                                                                                                    <div id="nav-tab-bank" class="tab-pane fade text-left">
                                                                                                                                        <h6>Bank account details</h6>
                                                                                                                                        <dl>
                                                                                                                                        <dt>Bank</dt>
                                                                                                                                        <dd> Bank Central Asia</dd>
                                                                                                                                        </dl>
                                                                                                                                        <dl>
                                                                                                                                        <dt>Account number</dt>
                                                                                                                                        <dd>7775877975</dd>
                                                                                                                                        </dl>
                                                                                                                                        <dl>
                                                                                                                                        <dt>Bank</dt>
                                                                                                                                        <dd>Mandiri</dd>
                                                                                                                                        </dl>
                                                                                                                                        <dt>Account number</dt>
                                                                                                                                        <dd>884854545454</dd>
                                                                                                                                        </dl>
                                                                                                                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                                                                                                        </p>
                                                                                                                                    </div>
                                                                                                                                    <!-- End -->
                                                                                                                                    </div>
                                                                                                                                    <!-- End -->

                                                                                                                                </div>
                                                                                                                            </div>
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
                                                                        <div class="tab-pane" id="proses" role="tabpanel">
                                                                            <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="main-card mb-3 card">
                                                                                            <div class="table-responsive">
                                                                                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th class="text-center">No Invoice</th>
                                                                                                            <th>Detail Penerima</th>
                                                                                                            <th class="text-center">Kota</th>
                                                                                                            <th class="text-center">Status</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                    <?php
                                                                                                        $diproses = query("SELECT * from pesanan where user_id = $id and (status='Diproses' or status = 'Dibayar') ORDER BY pesanan_id DESC");
                                                                                                        foreach ($diproses as $diproses_part):
                                                                                                    ?>
                                                                                                        <tr>
                                                                                                            <td class="text-center text-muted">
                                                                                                                <div>#
                                                                                                                    <a href="admin/invoice/invoice.php?pesanan_id=<?=$diproses_part["pesanan_id"]?>" target="_blank">
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
                                                                                                            <td class="text-center">
                                                                                                                <div class="widget-heading"><?= $diproses_part["nama_kota"]?></div>
                                                                                                                <div class="widget-subheading opacity-7"><?= $diproses_part["kodepos"]?></div>
                                                                                                            </td>
                                                                                                            <td class="text-center">
                                                                                                                <div class="<?= tombolBadge($diproses_part["status"]); ?> p-3"><?= $diproses_part["status"]?></div>
                                                                                                            </td>
                                                                                                            <td class="">
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
                                                                        <div class="tab-pane" id="kirim" role="tabpanel">
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
                                                                                                        $dikirim = query("SELECT pesanan.*, pengiriman.noresi, pengiriman.pengiriman_id ,kurir.nama_ekspedisi from pesanan 
                                                                                                                            JOIN pengiriman ON pesanan.pesanan_id = pengiriman.pesanan_id 
                                                                                                                            JOIN kurir ON kurir.kurir_id = pengiriman.kurir_id 
                                                                                                                            WHERE user_id = $id AND pesanan.status = 'Dikirim' ORDER BY pesanan.pesanan_id DESC");
                                                                                                        foreach ($dikirim as $dikirim_part):
                                                                                                    ?>
                                                                                                        <tr>
                                                                                                            <td class="text-center text-muted">
                                                                                                                <div>#
                                                                                                                    <a href="admin/invoice/invoice.php?pesanan_id=<?=$dikirim_part["pesanan_id"]?>" target="_blank">
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
                                                                                                            <td class="text-center">
                                                                                                                <div class="badge badge-primary p-3"><?= $dikirim_part["status"]?></div>
                                                                                                            </td>
                                                                                                            <td class="">
                                                                                                                <div class="widget-heading"><?= $dikirim_part["nama_ekspedisi"]?></div>
                                                                                                                <div class="widget-subheading opacity-7">Resi : <?= $dikirim_part["noresi"]?></div>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <form action="" method="POST">
                                                                                                                    
                                                                                                                    <input type="hidden" name="nama_penerima" value="<?= $dikirim_part["nama_penerima"] ?>">
                                                                                                                    <input type="hidden" name="pengiriman_id" value="<?= $dikirim_part["pengiriman_id"] ?>">
                                                                                                                    <input type="hidden" name="id" value="<?= $dikirim_part["pesanan_id"] ?>">

                                                                                                                    <div class="form-group">
                                                                                                                        <div class="custom-control custom-checkbox">
                                                                                                                            <input type="checkbox" name="terima" class="custom-control-input" id="customControlInline_<?=$dikirim_part["pesanan_id"]?>">
                                                                                                                            <label class="custom-control-label" for="customControlInline_<?=$dikirim_part["pesanan_id"]?>">Sudah Diterima</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="form-group">
                                                                                                                        <button class="btn btn-outline-primary" name="submit" value="terima">Konfirmasi</button>
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
                                                                        <div class="tab-pane" id="sampai" role="tabpanel">
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
                                                                                                                            WHERE user_id = $id AND pesanan.status = 'Diterima' ORDER BY pesanan.pesanan_id DESC");
                                                                                                        foreach ($diterima as $diterima_part):
                                                                                                    ?>
                                                                                                        <tr>
                                                                                                            <td class="text-center text-muted">
                                                                                                                <div>#
                                                                                                                    <a href="admin/invoice/invoice.php?pesanan_id=<?=$diterima_part["pesanan_id"]?>" target="_blank">
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
                                                                                                                <div class="widget-subheading opacity-7">Resi : <?= $diterima_part["noresi"]?></div>
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