<?php
    $queryForm=false;
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $queryForm = query("SELECT * FROM $module WHERE $module"."_"."id =$id")[0];
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
                                    <div>Tambah user
                                        <div class="page-title-subheading">Sebelum menambahkan user, pastikan produk tersebut sudah sesuai dengan syarat dan ketentuan kami.
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
                                            <div class="card-body"><h5 class="card-title">Informasi Pelanggan</h5>
                                                <div class="position-relative row form-group">
                                                    <label for="validationCustom01" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                                        <div class="col-sm-10">
                                                            <input name="nama_user" id="validationCustom01" placeholder="" type="text" class="form-control" value="<?= $queryForm['nama']?>" required>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                </div>
                                                <div class="position-relative row form-group">
                                                    <label for="validationCustom01" class="col-sm-2 col-form-label">Nama user</label>
                                                        <div class="col-sm-10">
                                                            <input name="" id="validationCustom01" placeholder="" type="text" class="form-control" value="<?= $queryForm['username']?>" readonly>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                </div>
                                                <div class="position-relative row form-group">
                                                    <label for="validationCustom01" class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input name="email" id="validationCustom01" placeholder="" type="email" class="form-control" value="<?= $queryForm['email']?>" required>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Please choose a username.
                                                        </div>
                                                </div>
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
                                            </div>
                                        </div>
                                    </div>

                            </div>

                                <div class="app-wrapper-footer">
                                    <div class="app-footer">
                                        <div class="app-footer__inner">
                                            <div class="app-footer-left">
                                                <ul class="nav">
                                                    <li class="nav-item">
                                                        <button name="submit" class="mb-2 mr-2 btn-transition btn btn-outline-light" value="batal">Batal</button>
                                                    </li>
                                    
                                                    
                                                    <li class="nav-item">
                                                        <button name="submit" class="mb-2 mr-2 btn btn-info" value="update">Update</button>
                                                    </li>
                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>