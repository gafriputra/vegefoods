<?php
    require '../../function/function.php';
    $pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1 ;
    $mulai_dari = ($pagination-1) * $data_per_halaman;
    $module = "barang";
    $action = "list";

    $keyword = $_GET["keyword"];
    $search_url = "&keyword=$keyword";
    $where = "  WHERE
                    barang.nama_barang like '%$keyword%' or
                    barang.harga like '%$keyword%' or
                    barang.stok like '%$keyword%' or
                    barang.berat like '%$keyword%'
                    ";
    
    $barang = query("SELECT barang.*, kategori.nama_kategori, supplier.nama_supplier from $module 
                    JOIN kategori ON barang.kategori_id=kategori.kategori_id
                    JOIN supplier ON barang.supplier_id=supplier.supplier_id 
                    $where ORDER BY barang.barang_id DESC LIMIT $mulai_dari,$data_per_halaman");
?>

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