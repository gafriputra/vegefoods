<?php
	cekBelumLogin_user("login");

	$form=false;
	$tombol = "Cek Pesanan";
	if (isset($_POST["submit"])) {
		if (!isset($_SESSION["harga"]["kota_id"])) {
			// header("Location: index.php?page=keranjang");
			direct("index.php?page=keranjang");
			exit;
		}

		$subtotal = isset($_POST["subtotal"]) ? $_POST["subtotal"] : $_SESSION["harga"]["subtotal"];
		$ongkir = isset($_POST["ongkir"]) ? $_POST["ongkir"] : $_SESSION["harga"]["ongkir"];
		$diskon = isset($_POST["diskon"]) ? $_POST["diskon"] : $_SESSION["harga"]["diskon"]*$subtotal;
		$total = $subtotal + $ongkir -$diskon;
		$kota_id = $_SESSION["harga"]["kota_id"];

		// if (isset($_POST["kirim"])) {
		// 	var_dump($_POST);
		// 	$kirim = $_POST["kirim"];
		// 	$form["nama"] = $_POST["nama"];
		// 	$form["notelp"] = $_POST["notelp"];
		// 	$form["email"] = $_POST["email"];
		// 	$form["alamat"] = $_POST["alamat"];
		// 	$form["kodepos"] = $_POST["kodepos"];
		// 	$form["kurir_id"] = $_POST["kurir_id"];
		// 	$form["bayar"] = $_POST["bayar"];
	
		// 	if ($kirim == "Cek Pesanan") {
		// 		$tombol = "Edit Pesanan";
	
		// 		$ongkir = ongkir($_POST);
		// 		$_SESSION["harga"]["ongkir"] = $ongkir;
		// 		$ongkir = $ongkir*ceil($_SESSION["harga"]["totalBerat"]);
		// 		$_SESSION["harga"]["kota_id"] = $_POST["kota_id"];
				
		// 		$form["disable"] = "disabled";
		// 		$form["tombol"] = "<p><input type='submit' name='kirim' value='Finish' class='btn btn-primary py-3 px-4'></p>";
		// 	}elseif ($kirim == "Edit Pesanan") {
		// 		$form["disable"] = false;
		// 	}elseif ($kirim == "Finish") {
		// 		# code...
		// 	}
		// }
	}elseif (!isset($_POST["submit"])) {
		direct("index.php");
	}

?>

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>


	<form action="?page=succes" class="billing-form" method="POST">
		<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			<div class="col-xl-7 ftco-animate">
								<h3 class="mb-4 billing-heading">Billing Details</h3>
								<div class="row align-items-end">
									<div class="col-md-12">
										<div class="form-group">
											<label for="nama">Nama Penerima</label>
										<input type="text" class="form-control" placeholder="" name="nama" id="nama" value="<?= $form["nama"]?>" <?= $form["disable"]?> required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="notelp">No telp Penerima</label>
										<input type="text" class="form-control" placeholder="" name="notelp" id="notelp" value="<?= $form["notelp"]?>" <?= $form["disable"]?> required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="email">Email Penerima</label>
										<input type="email" class="form-control" placeholder="" name="email" id="email" value="<?= $form["notelp"]?>" <?= $form["disable"]?> required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label for="alamat">Alamat Lengkap</label>
										<input type="alamat" class="form-control" placeholder="" name="alamat" id="alamat" value="<?= $form["alamat"]?>" <?= $form["disable"]?> required>
										</div>
									</div>
									<div class="col-md-6">
										
											<div class="form-group">
												<label for="kota">Nama Kota </label>
												<caption>*Disable</caption>
														<input type="hidden" name="kota_id" value="<?=$kota_id ?>">
														<?php
															$kota = query("SELECT * FROM kota WHERE status='on' and kota_id =$kota_id")[0];
														?>
														<input type="text" class="form-control" value="<?= $kota["nama_kota"] ?>" readonly>
											</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="kodepos">Kodepos</label>
										<input type="text" class="form-control" placeholder="" name="kodepos" id="kodepos" value="<?= $form["kodepos"]?>" <?= $form["disable"]?> required>
										</div>
									</div>
									<div class="col-md-6">
											<div class="form-group">
												<label for="country">Kurir</label>
												<div class="select-wrap">
													<div class="icon"><span class="ion-ios-arrow-down"></span></div>
														<select name="kurir_id" id="kurir" class="form-control" <?= $form["disable"] ?>>
																	<?php
																		// memanggil isi dari table kurir menggunakan combobox yang setatusnya on saja
																		$kurir = query("SELECT * FROM kurir WHERE status='on' ORDER BY nama_ekspedisi ASC");
																		foreach($kurir as $kurir_part){
																			// menampilkan combobox nya dengan memanggil dari tabel kurir di database
																			//     jika isi variabel $kurir_id sama dengan isi tabel kurir_id
																			if($form["kurir_id"] == $kurir_part['kurir_id']){
																				echo "<option value='$kurir_part[kurir_id]' selected='true'>".$kurir_part['nama_ekspedisi']."</option>";
																			}else {
																				//     jika tidak ada maka masukkan semuanya tanpa
																				echo "<option value='$kurir_part[kurir_id]'>".$kurir_part['nama_ekspedisi']."</option>";
																			}
																			// echo "<option value='$kurir_part[kurir_id]'>$kurir_part[nama_ekspedisi]</option>";
																			}
																	?>
														</select>
												</div>
											</div>
									</div>
									<div class="w-100"></div>
									<div class="col-md-12">
										<a href="?page=keranjang" class="btn btn-danger py-3 px-4">Kembali Ke keranjang</a>
									</div>

								</div>
						</div>
						<div class="col-xl-5">
				<div class="row mt-5 pt-3">
					<div class="col-md-12 d-flex mb-5">
						<div class="cart-detail cart-total p-3 p-md-4">
							<h3 class="billing-heading mb-4">Cart Total</h3>
							<p class="d-flex">
									<span>Subtotal</span>
										<span><?= rupiah($subtotal) ?></span>
									</p>
									<p class="d-flex">
										<span>Delivery</span>
										<span><?= rupiah($ongkir) ?></span>
									</p>
									<p class="d-flex">
										<span>Discount (-)</span>
										<span><?= rupiah($diskon) ?></span>
									</p>
									<hr>
									<p class="d-flex total-price">
										<span>Total</span>
										<span><?= rupiah($total) ?></span>
									</p>
						</div>
					</div>
					<div class="col-md-12">
						<div class="cart-detail p-3 p-md-4">
							<h3 class="billing-heading mb-4">Payment Method</h3>
										<div class="form-group">
											<div class="col-md-12">
												<div class="custom-control custom-radio">
													<input id="bank" name="bayar" type="radio" class="custom-control-input" value="Bank" <?= cekMetodePembayaran($form["bayar"],"bank")." ".$form["disable"] ?> required="">
													<label class="custom-control-label" for="bank">Transfer Bank</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<div class="custom-control custom-radio">
													<input id="tunai" name="bayar" type="radio" class="custom-control-input" value="Tunai" <?= cekMetodePembayaran($form["bayar"],"tunai")." ".$form["disable"] ?> required="">
													<label class="custom-control-label" for="tunai">Bayar Tunai</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<div class="custom-control custom-radio">
													<input id="emoney" name="bayar" type="radio" class="custom-control-input" value="Emoney" <?= cekMetodePembayaran($form["bayar"],"emoney")." ".$form["disable"] ?> required="">
													<label class="custom-control-label" for="emoney">E-Money</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="form-check">
												<div class="custom-control custom-checkbox my-1 mr-sm-2">
													<input type="checkbox" name="aggre" class="custom-control-input" id="invalidCheck" required>
													<label class="custom-control-label" for="invalidCheck">Agree to terms and conditions</label>
													
													<div class="invalid-feedback">
														You must agree before submitting.
													</div>
													<div class="valid-feedback">
														Looks good!
													</div>
												</div>
											</div>
										</div>
										<input type="hidden" name="subtotal" value="<?= $subtotal ?>">
										<input type="hidden" name="ongkir" value="<?= $ongkir?>">
										<input type="hidden" name="diskon" value="<?= $diskon?>">
										<input type="hidden" name="total" value="<?= $total?>">
										<p>
											<button type="submit" name="submit" value="<?= $tombol ?>" class="btn btn-primary py-3 px-4">Buat Pesanan</button>
										</p>
									</div>
					</div>
				</div>
			</div> <!-- .col-md-8 -->
			</div>
		</div>
		</section> <!-- .section -->
	
	</form><!-- END -->