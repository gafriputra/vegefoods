<?php

    cekBelumLogin_user("login");

    if (isset($_POST)) {
        if (isset($_POST["submit"])) {
            $tombol = $_POST["submit"];
            if ($tombol == "updateNama" || $tombol == "updatePassword") {
                ubah($_POST,"user");
            }elseif ($tombol == "bayar") {
                tambah($_POST,"konfirmasi_pembayaran");
            }elseif ($tombol == "terima") {
                ubah($_POST,"pengiriman");
            }
        }
    }
?>
                <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
                    <div class="container">
                        <div class="row no-gutters slider-text align-items-center justify-content-center">
                        <div class="col-md-9 ftco-animate text-center">
                            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>My Profile</span></p>
                            <h1 class="mb-0 bread">My Profile</h1>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-5 shadow mb-5">
                    <!-- <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-2" data-toggle="tab" href="#tab-content-2">
                                <span>Basic</span>
                            </a>
                        </li>
                    </ul> -->
                    <div class="tab-content p-3">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-2" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= "Hi, ".$_SESSION["login_user"]["nama"]?></h5>
                                            <ul class="nav nav-tabs nav-justified">
                                                <li class="nav-item"><a data-toggle="tab" href="#my-profile"
                                                        class="nav-link">My Profile</a></li>
                                                <li class="nav-item"><a data-toggle="tab" href="#pesanan"
                                                        class="active nav-link">Pesanan Saya</a></li>
                                                <li class="nav-item"><a data-toggle="tab" href="#setting"
                                                        class="nav-link">Setting</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane" id="my-profile" role="tabpanel">
                                                    <p>It was popularised in the 1960s with the release of Letraset
                                                        sheets containing Lorem Ipsum passages, and more recently
                                                        with desktop publishing
                                                        software like Aldus PageMaker
                                                        including versions of Lorem Ipsum.</p>
                                                </div>
                                                <div class="tab-pane active" id="pesanan" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <?php
                                                                include_once("module/user/pesanan.php");
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="setting" role="tabpanel">
                                                    <?php
                                                        include_once("module/user/form.php");
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>