<?php
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;
	$subtotal=0;
	$totalBerat = 0;
	$ongkir = isset($_SESSION["harga"]["ongkir"]) ? $_SESSION["harga"]["ongkir"] :0;
	$diskon = isset($_SESSION["harga"]["diskon"]) ? $_SESSION["harga"]["diskon"] :0;
	$nama_voucher = isset($_SESSION["harga"]["nama_voucher"]) ? $_SESSION["harga"]["nama_voucher"] : false;
	$kota_id = isset($_SESSION["harga"]["kota_id"]) ? $_SESSION["harga"]["kota_id"] : false;
	if (isset($_POST["submit"])) {
		if ($_POST["submit"] == "Apply Coupon") {
			$diskon = voucher($_POST)/100;
			$_SESSION["harga"]["diskon"] = $diskon;
			$nama_voucher = $_POST["nama_voucher"];
			$_SESSION["harga"]["nama_voucher"] = $nama_voucher;
		}elseif ($_POST["submit"] == "Cek Ongkir") {
			$ongkir = ongkir($_POST);
			$_SESSION["harga"]["ongkir"] = $ongkir;
			$kota_id = $_POST["kota_id"];
			$_SESSION["harga"]["kota_id"] = $kota_id;
		}
	}
?>
		
		<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
					<h1 class="mb-0 bread">My Cart</h1>
				</div>
				</div>
			</div>
		</div>
<?php 
if ($totalBarang == 0): ?>
		<section class="ftco-section ftco-cart">
				<div class="container">
					<h3> Saat ini belum ada data didalam keranjang belanja anda</h3>
				</div>
		</section>
<?php else :?>
        <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
					<div class="col-md-12 ftco-animate">
						<div class="cart-list">
							<table class="table">
								<thead class="thead-primary">
								<tr class="text-center">
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>Product name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
								</tr>
								</thead>
								<tbody>
								
									<?php 
											foreach($keranjang as $key => $value): 
											$barang_id = $key;

											$nama_barang = $value["nama_barang"];
											$quantity = $value["quantity"];
											$gambar = $value["gambar"];
											$harga = $value["harga"];
											$berat = $value["berat"]*$quantity;
											
											$totalBerat = $totalBerat + $berat;
											$total = $quantity * $harga;
											$subtotal = $subtotal + $total; ?>

												<tr class="text-center">
													<td class="product-remove"><a href="hapus_item.php?barang_id=<?=$barang_id?>"><span class="ion-ios-close"></span></a></td>
													
													<td class="image-prod"><div class="img" style="background-image:url(admin/gambar/barang/<?= $gambar ?>);"></div></td>
													
													<td class="product-name">
														<h3><?= $nama_barang ?></h3>
														<p>Far far away, behind the word mountains, far from the countries</p>
													</td>
													
													<td class="price"><?= rupiah($harga); ?></td>
													
													<td class="quantity">
														<div class="input-group mb-3">
														<input type="text" name="<?= $barang_id ?>" class="quantity form-control input-number update-quantity" value="<?= $quantity?>">
													</div>
												</td>
													
													<td class="total"><?= rupiah($total) ?></td>
												</tr><!-- END TR-->
									<?php
										endforeach; ?>

									<!-- <tr class="text-center">
										<td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
										
										<td class="image-prod"><div class="img" style="background-image:url(images/product-4.jpg);"></div></td>
										
										<td class="product-name">
											<h3>Bell Pepper</h3>
											<p>Far far away, behind the word mountains, far from the countries</p>
										</td>
										
										<td class="price">$15.70</td>
										
										<td class="quantity">
											<div class="input-group mb-3">
											<input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
										</div>
									</td>
										
										<td class="total">$15.70</td>
									</tr> -->
									<!-- END TR-->
									</tbody>
							</table>
						</div>
					</div>
				</div>
			
    			<div class="row justify-content-end">
					<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
						<div class="cart-total mb-3">
							<h3>Coupon Code</h3>
							<p>Enter your coupon code if you have one</p>
							<form action="" class="info" method="POST">
								<div class="form-group">
									<label for="">Coupon code</label>
									<input type="text" class="form-control text-left px-3" placeholder="Kode Voucher" name="nama_voucher" value="<?=$nama_voucher?>">
								</div>
						</div>
						<p><input type="submit" class="btn btn-primary py-3 px-4" name="submit" value="Apply Coupon"></p>
							</form>
					</div>
					<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
						
						<form action="" class="info" method="POST">
							<div class="cart-total mb-3">
								<h3>Estimate shipping</h3>
								<p>Enter your destination to get a shipping estimate</p>
								<div class="form-group">
									<select name="kota_id" id="kota" class="form-control" placeholder="joko">
										<option value="">Pilih Kota</option>
												<?php
													// memanggil isi dari table kota menggunakan combobox yang setatusnya on saja
													$kota = query("SELECT * FROM kota WHERE status='on' ORDER BY nama_kota ASC");
													foreach($kota as $kota_part){
														// menampilkan combobox nya dengan memanggil dari tabel kota di database
														//     jika isi variabel $kota_id sama dengan isi tabel kota_id
														if($kota_id == $kota_part['kota_id']){
															echo "<option value='$kota_part[kota_id]' selected='true'>".$kota_part['nama_kota']." ( ".$kota_part['harga']."/kg )"."</option>";
														}else {
															//     jika tidak ada maka masukkan semuanya tanpa
															echo "<option value='$kota_part[kota_id]'>".$kota_part['nama_kota']." ( ".$kota_part['harga']."/kg )"."</option>";
														}
														// echo "<option value='$kota_part[kota_id]'>$kota_part[nama_kota]</option>";
														}
												?>
									</select>
								</div>
							
							</div>
							<p><input type="submit" class="btn btn-primary py-3 px-4" name="submit" value="Cek Ongkir"></p>
						</form>
					</div>
					<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
						<div class="cart-total mb-3">
							<h3>Cart Totals</h3>
							<p class="d-flex">
								<span>Total Berat</span>
								<span><?php  $_SESSION["harga"]["totalBerat"]=$totalBerat/1000;
											echo $_SESSION["harga"]["totalBerat"];
								
								?> Kg</span>
							</p>
							<p class="d-flex">
								<span>Subtotal</span>
								<span><?= rupiah($subtotal) ?></span>
							</p>
							<p class="d-flex">
								<span>Delivery</span>
								<span><?= rupiah($ongkir*ceil($_SESSION["harga"]["totalBerat"])) ?></span>
							</p>
							<p class="d-flex">
								<span>Discount (-) <?= $diskon*100 ?>%</span>
								<span><?= rupiah($diskon*$subtotal) ?></span>
							</p>
							<hr>
							<p class="d-flex total-price">
								<span>Total</span>
								<span><?= rupiah($subtotal+ ($ongkir*ceil($totalBerat/1000))-($diskon*$subtotal)) ?></span>
							</p>
						</div>
						<form action="?page=checkout" method="POST">
							<input type="hidden" name="subtotal" value="<?= $subtotal ?>">
							<input type="hidden" name="ongkir" value="<?= $ongkir*ceil($totalBerat/1000) ?>">
							<input type="hidden" name="diskon" value="<?= $diskon*$subtotal ?>">
							<input type="hidden" name="total" value="<?= $subtotal+ ($ongkir*ceil($totalBerat/1000))-($diskon*$subtotal) ?>">
							<?php
								$_SESSION["harga"]["subtotal"] = $subtotal;
								// $_SESSION["harga"]["total"] =  $subtotal+ ($ongkir*ceil($totalBerat/1000))-($diskon*$subtotal);
							?>
							<p><input type="submit" class="btn btn-primary py-3 px-4" name="submit" value="Proceed to Checkout"></p>
						</form>
					</div>
    			</div>
			</div>
		</section>
		
<?php 
endif; ?>