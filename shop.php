<?php
    $pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1 ;
    $data_per_halaman = 4;
    $mulai_dari = ($pagination-1) * $data_per_halaman;
	$kategori_id = isset($_GET["kategori_id"]) ? $_GET["kategori_id"] : false;
	$linkKategori = isset($_GET["kategori_id"]) ? "&kategori_id=".$_GET["kategori_id"] : false ;
	$linkPagination = isset($_GET["pagination"]) ? "&pagination=".$_GET["pagination"] : false ;
    $whereKategori_id = false;
    if ($kategori_id) {
        $whereKategori_id = "AND barang.kategori_id = $kategori_id";
    }
    $kategori = query("SELECT kategori.kategori_id, kategori.nama_kategori FROM kategori WHERE status ='on'");
    $barang = query("SELECT barang.* FROM barang
					JOIN kategori ON barang.kategori_id=kategori.kategori_id
					WHERE barang.status = 'on' AND kategori.status = 'on' $whereKategori_id
					LIMIT $mulai_dari,$data_per_halaman");
    // tombol cari ditekan
    // if (isset($_POST['cari'])) {
    //     $kategori = cari($_POST['keyword']);
    // }
?>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center ">
    				<ul class="product-category">
                        <li><a href="<?= "?page=$page" ?>" class="
                            <?php
                                if (!$kategori_id) {
                                    echo "active";
                                }
                            ?>
                                             ">All</a></li>
                        <?php foreach($kategori as $kategori_part): 
                                if ($kategori_id == $kategori_part["kategori_id"]):?>
                                    <li><a href="<?= "?page=$page&kategori_id=$kategori_part[kategori_id]"; ?>" class="active"><?= $kategori_part["nama_kategori"]; ?></a></li>
                                <?php else: ?>
                                    <li><a href="<?= "?page=$page&kategori_id=$kategori_part[kategori_id]"; ?>" ><?= $kategori_part["nama_kategori"]; ?></a></li>
                        <?php  endif;
                            endforeach; ?>
    				</ul>
    			</div>
    		</div>
    		<div class="row">
    			<!-- <div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/product-1.jpg" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Bell Pepper</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
                </div> -->
            <?php foreach($barang as $barang_part): ?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
					<a href="admin/gambar/barang/<?= $barang_part["gambar"] ?>" class="image-popup"><img class="img-fluid" src="admin/gambar/barang/<?= $barang_part["gambar"] ?>" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?= $barang_part["nama_barang"] ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span><?= rupiah($barang_part["harga"]) ?></span></p>
		    					</div>
	    					</div>
    						<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="?page=detail-produk&barang_id=<?= $barang_part["barang_id"]?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="tambah_keranjang.php?page=<?=$page."&barang_id=".$barang_part["barang_id"].$linkKategori.$linkPagination?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
										<span><i class="ion-ios-cart"></i></span>
									</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
                </div>
            <?php endforeach; ?>

            </div>
            
            <?php 
                 $queryHitungData = "SELECT barang.* FROM barang
                                    JOIN kategori ON barang.kategori_id=kategori.kategori_id
                                    WHERE barang.status = 'on' AND kategori.status = 'on' $whereKategori_id";
                pagination($queryHitungData,$data_per_halaman,$pagination,"?page=$page$linkKategori")?>
    	</div>
    </section>