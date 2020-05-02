<?php

    require '../../function/function.php';
    $pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1 ;
    $mulai_dari = ($pagination-1) * $data_per_halaman;
    $module = "user";
    $action = "list";

    $keyword = $_GET["keyword"];
    $search_url = "&keyword=$keyword";
    $where = "  WHERE
                    nama like '%$keyword%' or
                    username like '%$keyword%' or
                    email like '%$keyword%' or
                    status like '%$keyword%'
                    ";
    
    $module = "user";
    $palanggan = query("select * from $module $where LIMIT $mulai_dari,$data_per_halaman");
                    // var_dump($barang);die;
?>
                                              <div class="table-responsive">
                                                <table class="mb-0 table table-striped text-center table-hover ">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Pelanggan</th>
                                                        <th scope="col">Username</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        //lalu looping isi array yang dikirimkan
                                                        $no = 1 + $mulai_dari;
                                                        foreach($palanggan as $palanggan_part): ?>
                                                                <tr>
                                                                    <th scope="row"><?= $no ?></th>
                                                                    <td><?= $palanggan_part["nama"] ?></td>
                                                                    <td><?= $palanggan_part["username"]?></td>
                                                                    <td><?= $palanggan_part["email"] ?></td>
                                                                    <td><?= ucwords($palanggan_part["status"]) ?></td>
                                                                    <td>
                                                                        <form action="module/proses.php" method="POST">
                                                                            <input type="hidden" name="id" value="<?= $palanggan_part["user_id"] ?>">
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