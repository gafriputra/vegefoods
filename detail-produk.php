<?php
    if (isset($_GET["barang_id"])) {
        $id = $_GET["barang_id"];
		$queryForm = query("SELECT * FROM barang WHERE barang_id =$id")[0];
		$barang = query("SELECT barang.* FROM barang
					JOIN kategori ON barang.kategori_id=kategori.kategori_id
					WHERE barang.status = 'on' and kategori.status = 'on'
					ORDER BY RAND() LIMIT 4");
    }
?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
            <h1 class="mb-0 bread">Product Single</h1>
          </div>
        </div>
      </div>
    </div>

<form action="proses.php" method="POST">
	<input type="hidden" name="barang_id" value="<?= $id ?>">
	<input type="hidden" name="page" value="<?= $page?>">
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="admin/gambar/barang/<?= $queryForm["gambar"] ?>" class="image-popup"><img src="admin/gambar/barang/<?= $queryForm["gambar"] ?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?= $queryForm["nama_barang"] ?></h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                            </p>
                            <p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;"><?= $queryForm['berat']?> <span style="color: #bbb;">gram/pcs</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p>
					</div>
    				<p class="price"><span><?= rupiah($queryForm["harga"]) ?></span></p>
    				<p><?= $queryForm["deskripsi"] ?></p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
									<div class="select-wrap">
										<div class="icon"><span class="ion-ios-arrow-down"></span></div>
											<select name="" id="" class="form-control">
												<option value="">Small</option>
												<option value="">Medium</option>
												<option value="">Large</option>
												<option value="">Extra Large</option>
											</select>
									</div>
		           				 </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
								<span class="input-group-btn mr-2">
									<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
										<i class="ion-ios-remove"></i>
									</button>
								</span>
								<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1"
									min="1" max="100">
								<span class="input-group-btn ml-2">
									<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
										<i class="ion-ios-add"></i>
									</button>
								</span>
							</div>
							<div class="col-md-12">
								<p style="color: #000;"><?= $queryForm['stok'] ?> pcs available</p>
							</div>
          				</div>
					  <p><input type="submit" value="Add to Cart" class="btn btn-black py-3 px-5" name="submit"></p>
    			</div>
    		</div>
    	</div>
	</section>
</form>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Products</span>
            <h2 class="mb-4">Related Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
				<?php foreach($barang as $barang_part): ?>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="admin/gambar/barang/<?= $barang_part["gambar"] ?>" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"><?= $barang_part['nama_barang']?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale"><?= rupiah($barang_part['harga'])?></span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a  href="?page=detail-produk&id=<?= $barang_part["barang_id"]?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
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
				</div>
				<?php endforeach; ?>

    		</div>
    	</div>
	</section>
