<?php
    cekBelumLogin_user("login");
    $user_id = $_SESSION["login_user"]["user_id"];
    $queryForm = query("SELECT nama FROM user WHERE user_id = $user_id and status='on'")[0];
?>
                                                    <div class="app-main__inner mt-3">
                                                        
                                                        
                                                            <input type="hidden" name="module" value="<?= $module ?>">
                                                            <?php
                                                                if (isset($id)) : ?>
                                                                    <input type="hidden" name="id" value="<?= $id ?>">
                                                                    <?php if (isset($_GET["pagination"])) : ?>
                                                                        <input type="hidden" name="pagination" value="<?= $_GET["pagination"] ?>">
                                                                    <?php endif; ?>
                                                            <?php endif; ?>
                                                        <form class="" action="?page=my_profile" method="POST" enctype="multipart/form-data">
                                                            <div class="tab-content">
                                                                    <div class="" id="gambar" role="tabpanel" class="">
                                                                        <div class="main-card mb-3 card">
                                                                            <div class="card-body">
                                                                                <!-- <h5 class="card-title">Upload Produk</h5>
                                                                                <span>Format gambar .jpg .jpeg .png dan ukuran minimum 300 x 300px (Untuk gambar optimal gunakan ukuran minimum 700 x 700 px)</span>
                                                                                    <div class="position-relative row form-group mt-2">
                                                                                        <label for="customFile" class="col-sm-2 col-form-label">File</label>
                                                                                        <div class="col-sm-10">
                                                                                            <div class="custom-file">
                                                                                                <input name="gambar" type="file" class="custom-file-input" id="customFile">
                                                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                                                                <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> -->

                                                                                <h5 class="card-title">Informasi User</h5>
                                                                                <div class="position-relative row form-group"><label for="nama_user" class="col-sm-2 col-form-label">Nama User</label>
                                                                                        <div class="col-sm-10">
                                                                                            <input name="nama_user" id="nama_user" placeholder="Nama User" type="text" class="form-control" value="<?= $queryForm["nama"]?>">
                                                                                        </div>
                                                                                </div>
                                                                                <input type="hidden" name="id" value="<?= $user_id ?>">
                                                                                <button type="submit" class="btn btn-outline-primary float-right" name="submit" value="updateNama">Update</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        </form>
                                                        <form action="?page=my_profile"  method="POST">         
                                                                    <div class="" id="harga" role="tabpanel">
                                                                        <div class="main-card mb-3 card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Ganti Password</h5>
                                                                                <div class="position-relative row form-group">
                                                                                        <label for="validasi_harga" class="col-sm-2 col-form-label">Password Lama</label>
                                                                                        <div class="col-sm-10">
                                                                                            <div class="input-group">
                                                                                                <input type="password" name="password_lama" class="form-control" id="validasi_password_lama" placeholder="Masukkan Password Lama" aria-describedby="group_password_lama" value="" required>
                                                                                                <div class="invalid-feedback">
                                                                                                    Masukkan password_lama
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="position-relative row form-group">
                                                                                        <label for="validasi_harga" class="col-sm-2 col-form-label">Password Baru</label>
                                                                                        <div class="col-sm-10">
                                                                                            <div class="input-group">
                                                                                                <input type="password" name="password_baru" class="form-control" id="validasi_password_baru" placeholder="Masukkan Password Baru" aria-describedby="group_password_baru" value="" required>
                                                                                                <div class="invalid-feedback">
                                                                                                    Masukkan password_baru
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="position-relative row form-group">
                                                                                        <label for="validasi_harga" class="col-sm-2 col-form-label">Password Lama</label>
                                                                                        <div class="col-sm-10">
                                                                                            <div class="input-group">
                                                                                                <input type="password" name="re-password" class="form-control" id="validasi_re-password" placeholder="Ulangi Password" aria-describedby="group_re-password" value="" required>
                                                                                                <div class="invalid-feedback">
                                                                                                    Ulangi Pasword Baru
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                </div>
                                                                                <input type="hidden" name="id" value="<?= $user_id ?>">
                                                                                <button type="submit" class="btn btn-outline-primary float-right" name="submit" value="updatePassword">Update</button>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        </form>      
                                                                   
                                                                    
                                
                                                             </div>
                                                    </div>