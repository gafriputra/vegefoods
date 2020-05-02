<?php
    // cara paling efektif
    //buat file khusus function

    $koneksi = mysqli_connect("localhost","root","","vegefoods");

    

  //buat functionselect
	function query($query){
		//ambil variabel $koneksi dari luar
		global $koneksi;
		// buat variabel baru dengan isi function php untuk query
		$result = mysqli_query($koneksi,$query);
		//buat array kosong
		$rows=[];
		//looping hasil query dengan function array asosiatif
		while ($row=mysqli_fetch_assoc($result)){
			$rows[]=$row;
		}
		// kembalikan hasil looping ke function
		return $rows;
  }
    
    // membuat fungsi insert 
  function tambah($data,$table){
    global $koneksi;
    if ($table === "kategori") {
      // sebelum memasukkan ke variabel
      // panggil jalan sebuah function untuk tidak menampilkan elemet html
      $nama = htmlspecialchars($data['nama_kategori']);
      $keterangan = htmlspecialchars($data['keterangan']);
      $status = htmlspecialchars($data["status"]);

      $query = "INSERT INTO $table
                  VALUE
                  ('','$nama','$keterangan','$status')
                  ";
    }elseif ($table === "supplier") {
      // sebelum memasukkan ke variabel
      // panggil jalan sebuah function untuk tidak menampilkan elemet html
      $nama = htmlspecialchars($data['nama_supplier']);
      $email = htmlspecialchars($data['email']);
      $alamat = htmlspecialchars($data['alamat']);
      $phone = htmlspecialchars($data['phone']);
      $status = htmlspecialchars($data["status"]);

      $query = "INSERT INTO $table
                  VALUE
                  ('','$nama','$email','$alamat','$phone','$status')
                  ";
    }elseif ($table === "kurir") {
      // sebelum memasukkan ke variabel
      // panggil jalan sebuah function untuk tidak menampilkan elemet html
      $nama = htmlspecialchars($data['nama_ekspedisi']);
      $email = htmlspecialchars($data['email']);
      $alamat = htmlspecialchars($data['alamat']);
      $phone = htmlspecialchars($data['phone']);
      $status = htmlspecialchars($data["status"]);

      $query = "INSERT INTO $table
                  VALUE
                  ('','$nama','$email','$alamat','$phone','$status')
                  ";
    }elseif ($table === "kota") {
      // sebelum memasukkan ke variabel
      // panggil jalan sebuah function untuk tidak menampilkan elemet html
      $nama = htmlspecialchars($data['nama_kota']);
      $harga = htmlspecialchars($data['harga']);
      $status = htmlspecialchars($data["status"]);

      $query = "INSERT INTO $table
                  VALUE
                  ('','$nama',$harga,'$status')
                  ";
    }elseif ($table === "barang") {
      // sebelum memasukkan ke variabel
      // panggil jalan sebuah function untuk tidak menampilkan elemet html
      $kategori = htmlspecialchars($data['kategori']);
      $supplier = htmlspecialchars($data['supplier']);
      $nama_barang = htmlspecialchars($data["nama_barang"]);
      $deskripsi = htmlspecialchars($data["deskripsi"]);
      $harga = htmlspecialchars($data["harga"]);
      $stok = htmlspecialchars($data["stok"]);
      $status = htmlspecialchars($data["status"]);
      $berat = htmlspecialchars($data["berat"]);

      // upload gambar
      // dengan memaksukkan atau memanggil fungsi upload kedalam variabel
      $gambar = upload();
      // jika gambar gagal (bernilai false)
      if(!$gambar){
          // jika ketemu return false , maka function lgsg selesai
          // dengam mengembalikan nilai false
          return false;
      }
      $query = "INSERT INTO $table
                  VALUE
                  ('',$kategori,$supplier,'$nama_barang','$deskripsi','$gambar',$harga,$stok,'$status',$berat)
                  ";
    }elseif ($table === "voucher") {
      // sebelum memasukkan ke variabel
      // panggil jalan sebuah function untuk tidak menampilkan elemet html
      $nama = strtolower(htmlspecialchars($data['nama_voucher']));
      $potongan = htmlspecialchars($data['harga']);
      $keterangan = htmlspecialchars($data['keterangan']);
      $status = htmlspecialchars($data["status"]);

      $query = "INSERT INTO $table
                  VALUE
                  ('','$nama',$potongan,'$keterangan','$status')
                  ";
    }
    
    mysqli_query($koneksi,$query);

    // mengembalikan nilai dari hasil query
    // jika benar dikembalikan angka > 0
    // jika salah -1
    return mysqli_affected_rows($koneksi);
    
  }

  // membuat funtion delete
  function hapus ($id,$table){
    global $koneksi;

    mysqli_query($koneksi,"DELETE FROM $table WHERE $table"."_"."id = $id");

    // mengembalikan nilai dari hasil query
    // jika benar dikembalikan angka > 0
    // jika salah -1
    return mysqli_affected_rows($koneksi);
  }

    //   membuatt function upload()
  function upload($table=false,$id=false){
    //   mengambil nilai daari $_files
      $namaFile = $_FILES['gambar']['name'];
      $ukuranFile = $_FILES['gambar']['size'];
      $error = $_FILES['gambar']['error'];
      $tempName = $_FILES['gambar']['tmp_name'];

      if ($error === 4) {
        echo "
            <script>
            alert('Pilih gambar dulu');
            </script>
        ";
        // jika ketemu return false , maka function lgsg selesai
        // dengam mengembalikan nilai false
        return false;
      }

    //   membuat array berisi ekstensi gambar yang boleh
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    // memanggil fungsi unntuk memecah string menjadi array
    // jika ketemu karakter apa ('.') dari $namaFile
    $ekstensiGambar = explode('.',$namaFile);
    // mengambil array paling terakhir (ekstensi gambar)
    // dan mengkonversikan semua string jadi huruf kecil
    $ekstensiGambar = strtolower(end($ekstensiGambar));


    // apakah ada suatu string didakan suatu array
    // kalok gaada (false) dari lambang (!)
    if (!in_array($ekstensiGambar,$ekstensiGambarValid)) {
        // tampilkan pesan
        echo "
            <script>
            alert('Yang diupload bukan gambar');
            </script>
        ";
        // jika ketemu return false , maka function lgsg selesai
        // dengam mengembalikan nilai false
        return false;
    }

    // jika ukuraannya terlalu besar dari 1mb
    if ($ukuranFile > 1000000) {
        // tampilkan pesan
        echo "
            <script>
            alert('Yang diupload terlalu besar');
            </script>
        ";
        // jika ketemu return false , maka function lgsg selesai
        // dengam mengembalikan nilai false
        return false;
    }

    // jka lolos dari pengecekkan file siap diupload

    // generate nama gambar baru dengan string random
    $namaFileBaru = false;
    if ($id) {
      $queryGambar = query("SELECT gambar from $table where barang_id = $id")[0];
      $namaFileBaru = $queryGambar['gambar'];
      // memanggil fungsi unntuk memecah string menjadi array
      // jika ketemu karakter apa ('.') dari $namaFile
      $namaFileBaru = explode('.',$namaFileBaru);
      // mengambil array paling terakhir (ekstensi gambar)
      // dan mengkonversikan semua string jadi huruf kecil
      $namaFileBaru = current($namaFileBaru);
    }else {
      $namaFileBaru = uniqid();
    }
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;
    // var_dump($namaFileBaru); die;

    // memindahkan file yang sudah diupload ke tmp_name
    // kedalam directory kita
    move_uploaded_file($tempName,'../gambar/barang/'.$namaFileBaru);
    // direturn supaya nama file yang dibaca oleh function insert
    return $namaFileBaru;
  }

  // membuat fungsi update
  function ubah($data,$table){
    global $koneksi;

    $id = $data['id'];

    if ($table === "kategori") {
      $nama_kategori = htmlspecialchars($data['nama_kategori']);
      $keterangan = htmlspecialchars($data['keterangan']);
      $status = htmlspecialchars($data["status"]);

      $query = "UPDATE $table SET
                nama_kategori= '$nama_kategori',
                keterangan = '$keterangan',
                status ='$status'
                WHERE kategori_id = $id
                  ";
    }elseif ($table === "supplier") {
      // sebelum memasukkan ke variabel
      // panggil jalan sebuah function untuk tidak menampilkan elemet html
      $nama_supplier = htmlspecialchars($data['nama_supplier']);
      $email = htmlspecialchars($data['email']);
      $alamat = htmlspecialchars($data['alamat']);
      $phone = htmlspecialchars($data['phone']);
      $status = htmlspecialchars($data["status"]);

      $query = "UPDATE $table SET
                nama_supplier= '$nama_supplier',
                email = '$email',
                alamat = '$alamat',
                phone = '$phone',
                status ='$status'
                WHERE supplier_id = $id
                  ";
    }elseif ($table === "kurir") {
      // sebelum memasukkan ke variabel
      // panggil jalan sebuah function untuk tidak menampilkan elemet html
      $nama_ekspedisi = htmlspecialchars($data['nama_ekspedisi']);
      $email = htmlspecialchars($data['email']);
      $alamat = htmlspecialchars($data['alamat']);
      $phone = htmlspecialchars($data['phone']);
      $status = htmlspecialchars($data["status"]);

      $query = "UPDATE $table SET
                nama_ekspedisi= '$nama_ekspedisi',
                email = '$email',
                alamat = '$alamat',
                phone = '$phone',
                status ='$status'
                WHERE kurir_id = $id
                  ";
    }elseif ($table === "kota") {
      // sebelum memasukkan ke variabel
      // panggil jalan sebuah function untuk tidak menampilkan elemet html
      $nama_kota = htmlspecialchars($data['nama_kota']);
      $harga = htmlspecialchars($data['harga']);
      $status = htmlspecialchars($data["status"]);

      $query = "UPDATE $table SET
                nama_kota= '$nama_kota',
                harga = $harga,
                status ='$status'
                WHERE kota_id = $id
                  ";
    }elseif ($table === "user") {
      // sebelum memasukkan ke variabel
      // panggil jalan sebuah function untuk tidak menampilkan elemet html
      $nama = htmlspecialchars($data['nama_user']);
      $email = htmlspecialchars($data['email']);
      $status = htmlspecialchars($data["status"]);

      $query = "UPDATE $table SET
                nama= '$nama',
                email = '$email',
                status ='$status'
                WHERE user_id = $id
                  ";
    }elseif ($table === "barang") {
     // sebelum memasukkan ke variabel
      // panggil jalan sebuah function untuk tidak menampilkan elemet html
      $kategori = htmlspecialchars($data['kategori']);
      $supplier = htmlspecialchars($data['supplier']);
      $nama_barang = htmlspecialchars($data["nama_barang"]);
      $deskripsi = htmlspecialchars($data["deskripsi"]);
      $harga = htmlspecialchars($data["harga"]);
      $stok = htmlspecialchars($data["stok"]);
      $status = htmlspecialchars($data["status"]);
      $berat = htmlspecialchars($data["berat"]);


      $gambarLama = $data['gambarlama'];

      // cek apakah user upload file baru atau tidak
      if ($_FILES['gambar']['error'] === 4) {
          $gambar = $gambarLama;
      }else{
          $gambar = upload($table,$id);
      }
      $query = "UPDATE $table SET
                kategori_id= $kategori,
                supplier_id = $supplier,
                nama_barang ='$nama_barang',
                deskripsi ='$deskripsi',
                gambar ='$gambar',
                harga = $harga,
                stok = $stok,
                status = '$status',
                berat = $berat
                WHERE barang_id = $id
                  ";
    }elseif ($table === "pesanan") {
      if (isset($data["submit"])) {
        $tombol = $data["submit"];
        if ($tombol === "resi") {
          $waktu_saat_ini = waktuIndonesia();
          $query =  mysqli_query($koneksi,"UPDATE pengiriman SET
                                          tanggal_pengiriman ='$waktu_saat_ini',
                                          noresi ='$data[noresi]'
                                          WHERE pesanan_id = $id");
          // jalankan query yangberisi menampilkan isi data
          $query = mysqli_query($koneksi, "SELECT * FROM pesanan_detail WHERE pesanan_id=$id");
          // looping hingga semua data keluar
          // dengan cara mengambil data dari query lalu menyimpannya kedalam array
          while($row=mysqli_fetch_assoc($query)){
              // panggil isi array yang dibutuhkan
              $barang_id = $row["barang_id"];
              $quantity = $row["quantity"];
              // jalankan query update dengan mengurangi stock
              $queryBarang = mysqli_query($koneksi, "UPDATE barang SET stok=stok-$quantity WHERE barang_id='$barang_id'");
          }
          if ($query && $queryBarang) {
            
              $query = mysqli_query($koneksi,"UPDATE $table SET
                                      status ='Dikirim'
                                      WHERE pesanan_id = $id
                                        ");
                          
          }
        }elseif ($tombol === "update"){
          $status = $data["status"];
          // sebelum memasukkan ke variabel
          // panggil jalan sebuah function untuk tidak menampilkan elemet html
          
  
          $query = "UPDATE $table SET
                    status ='$status'
                    WHERE pesanan_id = $id
                      ";
        }
      }
    }elseif ($table === "voucher") {
      // sebelum memasukkan ke variabel
      // panggil jalan sebuah function untuk tidak menampilkan elemet html
      $nama = htmlspecialchars($data['nama_voucher']);
      $potongan = htmlspecialchars($data['potongan']);
      $keterangan = htmlspecialchars($data['keterangan']);
      $status = htmlspecialchars($data["status"]);

      $query = "UPDATE $table SET
                nama_voucher= '$nama',
                potongan= $potongan,
                keterangan = '$keterangan',
                status ='$status'
                WHERE voucher_id = $id
                  ";
    }elseif ($table === "kategori") {
      // sebelum memasukkan ke variabel
      // panggil jalan sebuah function untuk tidak menampilkan elemet html
      $nama = htmlspecialchars($data['nama_kategori']);
      $keterangan = htmlspecialchars($data['keterangan']);
      $status = htmlspecialchars($data["status"]);

      $query = "UPDATE $table SET
                nama_kategori= '$nama',
                keterangan = '$keterangan',
                status ='$status'
                WHERE kategori_id = $id
                  ";
    }
     // sebelum memasukkan ke variabel
    // panggil jalan sebuah function untuk tidak menampilkan elemet html
    // echo $query;
    mysqli_query($koneksi,$query);

    // mengembalikan nilai dari hasil query
    // jika benar dikembalikan angka > 0
    // jika salah -1
    return mysqli_affected_rows($koneksi);
  }

  // membuat function cari
  function cari($keyword){
    $query2 = "SELECT * FROM barang
              WHERE
              nama_barang like '%$keyword%' or
              harga like $keyword or
              stok like $keyword or
              berat like $keyword
              ";
    // panggil function query dengan parameter variabel query2
    // dan kembalikan ke function cari
    return query($query2);
  }


  // membuat function regristasi
  function registrasi($data){
   global $koneksi;

      // mmebuat variabel dengan isi function
      // menjadikan hurufkeci(mengapus backslash)
    $username = strtolower(stripslashes($data['username']));
    // membuat variabel password
    // dengan memanggil funsi untuk memungkinkan user masukin tanda kutip
    //  tetao dianggap string bukan syntax
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    
    // cek username sudah ada atau belum
    $result = mysqli_query($koneksi,"SELECT username FROM user WHERE username = '$username'");
    // jika sudah ada / mengembalikan nilai true
    if (mysqli_fetch_assoc($result)) {
      echo "<script>
              alert('Username sudah terdaftar');
            </script>";
      return false;
    }
    // cek password sama atau tidak
    if ($password !== $password2) {
      echo "<script>
              alert('Konfirmasi password tidak sesuai!');
            </script>";
      return false;
    }

    // enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan kedatabase
    mysqli_query($koneksi, "INSERT INTO user VALUES ('','$username','$password')");

    // kembalikan / mengahsilkan angka 1 jika berhasil
    //  -1 jika gagal
    return mysqli_affected_rows($koneksi);

  }

  function tombol($data = false){
      $string = "
                  <div class='app-wrapper-footer'>
                    <div class='app-footer'>
                      <div class='app-footer__inner'>
                          <div class='app-footer-left'>
                              <ul class='nav'>
                                <li class='nav-item'>
                                    <button class='mb-2 mr-2 btn-transition btn btn-outline-light'
                                                    name='submit' value='batal'>Batal</button>
                                </li>
                ";

      if ($data) {
        $string .="
                                  
                                  <li class='nav-item'>
                                      <button class='mb-2 mr-2 btn-transition btn btn-outline-light'
                                                      name='submit' value='update_tambah'>Update & Tambah Baru</button>
                                  </li>
                                  <li class='nav-item'>
                                      <button class='mb-2 mr-2 btn btn-info'
                                                      name='submit' value='update'>Update</button>
                                  </li>
                  ";
      }else{
        $string .="
                                  
                                  <li class='nav-item'>
                                      <button class='mb-2 mr-2 btn-transition btn btn-outline-light'
                                                      name='submit' value='simpan_tambah'>Simpan & Tambah Baru</button>
                                  </li>
                                  <li class='nav-item'>
                                      <button class='mb-2 mr-2 btn btn-info'
                                                      name='submit' value='simpan'>Simpan</button>
                                  </li>
                  ";
      }

      $string .="
                              </ul>
                          </div>
                      </div>
                    </div>
                  </div>
                ";

      return $string;
  }

  function tombol_tambah(){
    global $module;
    echo "<a href='?module=".$module."&action=form' class='mr-3 btn-transition btn btn-outline-warning'>Tambah ".ucwords($module)." +</a>
          ";
  }

  function cek(){
    global $module;
    global $action;
    
    echo $module;
    echo $action;
  }

  function proses($data){
    if (isset($data["submit"])) {
      $id = isset($data["id"]) ? $data["id"] : false;
      $module = isset($data['module']) ? $data['module'] : false;
      $pagination = isset($data['pagination']) ? "&pagination=".$data['pagination'] : false;
      $button = isset($data['submit']) ? $data['submit'] : false;
      $link = "../index.php?module=$module&action=";
      $linkForm = $link."form".$pagination;
      $linkList = $link."list".$pagination;
      $notif = "&notif=";
      if($button === "simpan" || $button === "simpan_tambah"){
      // cek apakah data berhasil ditambahakanatau tidak
      // apakah
      // panggil function dengan memasukkan seluruh data hasil dari 
      // method post dan dicek apakah hasil return lebih besar dari 0

          if(tambah($data,"$module")> 0){
                  // jika berhasil
                  // keluarkan pemberitahuan
                  // langsung kembalikan kehalaman dituju(pakai js)
                  $notif .="tambah_berhasil";
                  if ($button === "simpan_tambah") {
                      echo "
                          <script>
                          document.location.href='$linkForm$notif';
                          </script>
                          ";
                  }else{
                      echo "
                          <script>
                          document.location.href='$linkList$notif';
                          </script>
                          ";
                  }
          }else{
                  $notif .="tambah_gagal";
                  echo "
                  <script>
                  document.location.href='$linkForm$notif';
                  </script>
                  ";
          }
      }elseif ($button=== "update" || $button === "update_tambah") {
          
          if(ubah($data,"$module")> 0){
                  $notif .="ubah_berhasil";
                  // jika berhasil
                  // keluarkan pemberitahuan
                  // langsung kembalikan kehalaman dituju(pakai js)
                  if ($button === "update_tambah") {
                      echo "
                          <script>
                          document.location.href='$linkForm$notif';
                          </script>
                          ";
                  }else{
                      echo "
                          <script>
                          document.location.href='$linkList$notif';
                          </script>
                          ";
                  }
          }else{
                  // jika tidak
                  $notif .="ubah_gagal";
                  echo "
                  <script>
                  document.location.href='$linkList$notif';
                  </script>
                  ";
          }
      }elseif ($button === "hapus") {
          
          if(hapus($id,"$module") > 0){
              $notif .="hapus_berhasil";
              // jika berhasil
              // keluarkan pemberitahuan
              // langsung kembalikan kehalaman dituju(pakai js)
              echo "
                  <script>
                    document.location.href='$linkList$notif';
                  </script>
              ";
          }else{
              // jika tidak
              $notif .="hapus_gagal";
              echo "
                  <script>
                    document.location.href='$linkList$notif';
                  </script>
              ";
            }
      }elseif ($button === "edit") {
          header("Location: $linkForm&id=$id");
      }else {
          // header("Location : $linkList");
          echo "
                  <script>
                    document.location.href='$linkList';
                  </script>
              ";
      }
    }
  }
  // function pageination
  // menentukan jumlah data yang ingin ditampilkan
  $data_per_halaman = 5;
  // membatt fungsi pageination
  function pagination($query, $data_per_halaman, $pagination, $url){
    // memanggil variabel koneksi dari luar fungsi
    global $koneksi;
    // membuat variabel dengan isi memanggil isi database dari query yang dimasukkan
    $queryHitung = mysqli_query($koneksi, $query);
    // membuat variabel dengan isi menghitung jumlah data yang dipanggil melalui query
    $total_data = mysqli_num_rows($queryHitung);
    // membuat variabel dengan isi membulatkan dari hasil perhitungan  dengan hasil mendekati angka paling atas
    $total_halaman = ceil ($total_data/$data_per_halaman);

    // membuat variabel dengan isi untuk mengatur button pagination
    $batasPosisiNomor = 6 ;
    $batasJumlahHalaman = 10 ;
    $mulaipagination = 1;
    $batasAkhirpagination = $total_halaman;

    // jika isi total_halaman lebih besar dari 1
    if ($total_halaman > 1) {
        // membuat list pagination
        echo "<ul class='pagination mt-3'>";
                // jika isi variabel lebih besar dari 1
                if ($pagination>1) {
                    // membuat variabel dengan isinya dikurangi 1 (untuk kembali)
                    $prev = $pagination - 1;
                    // keluarkan list dengan link menuju pagenation sebelumnya
                    echo "<li class='page-item'>
                            <a href='$url&pagination=$prev' class='page-link' aria-label='Previous'>
                              <span aria-hidden='true'>«</span>
                              <span class='sr-only'>Previous</span>
                            </a>
                        </li>";
                }
                
                // pusat IF pagenation
                if ($total_halaman >= $batasJumlahHalaman) {
                    if($pagination > $batasPosisiNomor){
                        $mulaipagination = $pagination - ($batasPosisiNomor-1);
                    }
                    $batasAkhirpagination = ($mulaipagination-1) + $batasJumlahHalaman;
                    if ($batasAkhirpagination > $total_halaman) {
                        $batasAkhirpagination = $total_halaman;
                    }
                }
                

                // membuat pengulangan sesuai isi yang sudah di IF sebelumnya
                for ($i= $mulaipagination; $i <= $batasAkhirpagination; $i++) { 
                    // jika pagenation sama dengan isi variabel i
                    if ($pagination == $i) {
                        // maka tambahkan class active
                        echo "<li class='page-item active'>
                                <a class='page-link' href='$url&pagination=$i'>$i</a>
                            </li>";
                    } else{
                        echo "<li class='page-item'>
                                <a class='page-link' href='$url&pagination=$i'>$i</a>
                            </li>";
                    }
                }

                // if untuk selanjutnya (next)
                if ($pagination < $total_halaman) {
                    $next = $pagination + 1;
                    echo "<li class='page-item'>
                            <a href='$url&pagination=$next' class='page-link' aria-label='Next'>
                              <span aria-hidden='true'>»</span>
                              <span class='sr-only'>Next</span>
                            </a>
                        </li>";
                }
        echo "</ul>";
        }
  }

  function rupiah($angka){
	
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
   
  }

  function linkActive($linkModule, $linkAction = false){
    global $module;
    global $action;
    if ($linkAction) {
      if ($module === $linkModule && $action === $linkAction) {
        echo "mm-active";
      }elseif ($module === $linkModule && $action === $linkAction) {
        echo "mm-active";
      }
    }elseif ($module === $linkModule) {
      echo "mm-show";
    } 
  }

  function login_admin($data){
    global $koneksi;
    $username = $data["username"];
    $password = $data["password"];
    $result = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE username = '$username' and status='on'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password,$row["password"]) ) {

            // set session
            $_SESSION["login_admin"] =[
              "status" => true,
              "user_id" => $row ['user_id'],
              "nama" => $row ['nama'],
              "level" => $row ['level']
            ];
            // cek remember me
            if ( isset($data['remember']) ) {
                // buaat cookie
                setcookie('id_admin', $row['user_id'], time()+600);
                setcookie('key_admin', hash('sha256',$row['username']), time()+600);
            }
            return "login_berhasil";
        }
    }

    return "login_gagal";
  }
  
  function cekSudahLogin_admin(){
    global $_SESSION;
    $data = $_SESSION;
    // apakah sudah login
    if ( isset($data["login_admin"]["status"]) ) {
      Header("Location: ../index.php");
      exit;
    }
  }

  function cekBelumLogin_admin($page=false){
    global $_SESSION;
    $data = $_SESSION;
    if ($page) {
      $page = "?page=$page";
    }
    // apakah sudah login
    if ( !isset($data["login_admin"]["status"]) ) {
      Header("Location: login/index.php");
      exit;
    }
  }

  function waktuIndonesia(){
    $timezone = time() + (60 * 60 * 7);
    return gmdate("Y-m-d H:i:s", $timezone);
  }

  
  function persentaseSupplier($data1, $data2, $data3, $data4){
    global $koneksi;
    $supplier1 = mysqli_num_rows(mysqli_query($koneksi,"SELECT supplier_id FROM barang WHERE supplier_id = $data1"));
    $supplier2 = mysqli_num_rows(mysqli_query($koneksi,"SELECT supplier_id FROM barang WHERE supplier_id = $data2"));
    $supplier3 = mysqli_num_rows(mysqli_query($koneksi,"SELECT supplier_id FROM barang WHERE supplier_id = $data3"));
    $supplier4 = mysqli_num_rows(mysqli_query($koneksi,"SELECT supplier_id FROM barang WHERE supplier_id = $data4"));
    $jumlahSupplier = $supplier1+$supplier2+$supplier3+$supplier4;
    $persentaseSupplier = number_format(($supplier1/$jumlahSupplier*100),2);
    return $persentaseSupplier;
  }
?>