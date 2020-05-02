<?php
    // cara paling efektif
    //buat file khusus function

    $koneksi = mysqli_connect("localhost","root","","vegefoods");

    // membuat function jika menggunakan header() jadi eror
  function direct($url){
      echo "<script> window.location = '$url'; </script>";
  }

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
    if ($table === "konfirmasi_pembayaran") {
      // sebelum memasukkan ke variabel
      // panggil jalan sebuah function untuk tidak menampilkan elemet html
      $pesanan_id = $data["pesanan_id"];
      $nama = htmlspecialchars($data['nama']);
      $nama_bank = htmlspecialchars($data['namabank']);
      $norek = htmlspecialchars($data['norek']);
      // upload gambar
      // dengan memaksukkan atau memanggil fungsi upload kedalam variabel
      $gambar = upload();
      // jika gambar gagal (bernilai false)
      if(!$gambar){
          // jika ketemu return false , maka function lgsg selesai
          // dengam mengembalikan nilai false
          return false;
      }
      
      $query = mysqli_query($koneksi,"SELECT pesanan_id FROM $table WHERE pesanan_id = $pesanan_id");
 
      // jika sudah ada / mengembalikan nilai true
      if (mysqli_fetch_assoc($query)) {
        return mysqli_affected_rows($koneksi);
      }

      $query = "INSERT INTO $table
                  VALUE
                  ('',$pesanan_id,'$nama_bank','$norek','$nama','$gambar')
                  ";
    
    
      $hasil = mysqli_query($koneksi,$query);

      if ($hasil) {
        $query = "UPDATE pesanan SET
                  status = 'Dibayar'
                  WHERE pesanan_id = $pesanan_id";
        mysqli_query($koneksi,$query);
      }
    }
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
    move_uploaded_file($tempName,'admin/gambar/bukti/'.$namaFileBaru);
    // direturn supaya nama file yang dibaca oleh function insert
    return $namaFileBaru;
  }

  // membuat fungsi update
  function ubah($data,$table){
    global $koneksi;

    $id = $data['id'];

    if ($table === "user") {
        $row = query ("SELECT * FROM $table where user_id = $id")[0];
        if (isset($data["nama_user"])) {
          
        // sebelum memasukkan ke variabel
        // panggil jalan sebuah function untuk tidak menampilkan elemet html
        $nama_user = htmlspecialchars($data["nama_user"]);
        $query = "UPDATE $table SET
                  nama ='$nama_user'
                  WHERE user_id = $id
                    ";
        }elseif (isset($data["password_lama"])) {
          $passwordLama = mysqli_real_escape_string($koneksi, $data["password_lama"]);
          $password = mysqli_real_escape_string($koneksi, $data["password_baru"]);
          $password2 = mysqli_real_escape_string($koneksi, $data["re-password"]);
          
          // cek password sama atau tidak
          if ($password == $password2) {
            // jika sudah ada / mengembalikan nilai true
            if (password_verify($passwordLama,$row["password"])) {
              
              // enskripsi password
              $password = password_hash($password, PASSWORD_DEFAULT);

              // ubah password
              $query = "UPDATE $table SET
                      password ='$password'
                      WHERE user_id = $id
                        ";
            }
          }

        }
    }elseif ($table === "pengiriman") {
      $pesanan_id = $id;
      $pengiriman_id = $data["pengiriman_id"];
      $nama_penerima = $data["nama_penerima"];
      $tanggal_diterima = waktuIndonesia();

      $query = "UPDATE $table SET
                tanggal_diterima = '$tanggal_diterima',
                nama_penerima_barang = '$nama_penerima'
                WHERE pengiriman_id = $pengiriman_id and pesanan_id = $pesanan_id";
    
    
      $hasil = mysqli_query($koneksi,$query);

      if ($hasil) {
        $query = "UPDATE pesanan SET
                  status ='Diterima'
                  WHERE pesanan_id = $pesanan_id
                    ";
      }else {
        exit;
      }

    }
     // sebelum memasukkan ke variabel
    // panggil jalan sebuah function untuk tidak menampilkan elemet html
    
    mysqli_query($koneksi,$query);

    // mengembalikan nilai dari hasil query
    // jika benar dikembalikan angka > 0
    // jika salah -1
    return mysqli_affected_rows($koneksi);
    
  }

  // membuat function cari
  function cari($keyword){
    $query2 = "SELECT * FROM mahasiswa
              WHERE
              nama like '%$keyword%'
              ";
    // panggil function query dengan parameter variabel query2
    // dan kembalikan ke function cari
    return query($query2);
  }


  // membuat function regristasi
  function registrasi($data){
   global $koneksi;
    $namaDepan = htmlspecialchars($data['nama_depan']);
    $namaBelakang = $data['nama_belakang'] != "" ? " ".htmlspecialchars($data['nama_belakang']) : false;

    $nama = $namaDepan.$namaBelakang;
    $username = htmlspecialchars($data['username']);
    $email = htmlspecialchars($data['email']);
      // mmebuat variabel dengan isi function
      // menjadikan hurufkeci(mengapus backslash)
    $username = strtolower(stripslashes($data['username']));
    $email = strtolower($data['email']);
    // membuat variabel password
    // dengan memanggil funsi untuk memungkinkan user masukin tanda kutip
    //  tetao dianggap string bukan syntax
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["repassword"]);

    $notif = false;
    
    // cek username sudah ada atau belum
    
    $result = mysqli_query($koneksi,"SELECT username,email FROM user WHERE username = '$username' or email = '$email'");
 
    // jika sudah ada / mengembalikan nilai true
    if (mysqli_fetch_assoc($result)) {
      $notif = 1;
      return $notif;
    }
    // cek password sama atau tidak
    if ($password !== $password2) {
      $notif = 2;
      return $notif;
    }

    // enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan kedatabase
    mysqli_query($koneksi, "INSERT INTO user VALUES ('','customer','$nama','$username','$email','$password','on')");

    // kembalikan / mengahsilkan angka 1 jika berhasil
    //  -1 jika gagal
    return mysqli_affected_rows($koneksi);

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
      if($button === "register"){
      // cek apakah data berhasil ditambahakanatau tidak
      // apakah
      // panggil function dengan memasukkan seluruh data hasil dari 
      // method post dan dicek apakah hasil return lebih besar dari 0

          if(registrasi($data)> 0){
                  // jika berhasil
                  // keluarkan pemberitahuan
                  // langsung kembalikan kehalaman dituju(pakai js)
                  $notif .="daftar_berhasil";
                  
          echo "
          <script>
          document.location.href='index.php?page=login$notif';
          </script>
          ";
          }else{
                  $notifAngka = registrasi($data);
                  if ($notifAngka == 1) {
                    $notifAngka = "Username/Password sudah ada";
                  }elseif ($notifAngka == 2){
                    $notifAngka = "Password tidak sama";
                  }
                  $notif .="tambah_gagal_$notifAngka";
                  
          echo "
          <script>
          document.location.href='index.php?page=register$notif';
          </script>
          ";
          }
      }
      elseif($button === "login"){
        // cek apakah data berhasil ditambahakanatau tidak
        // apakah
        // panggil function dengan memasukkan seluruh data hasil dari 
        // method post dan dicek apakah hasil return lebih besar dari 0
        
            if( login_user($data) === "login_berhasil"){
                    // jika berhasil
                    // keluarkan pemberitahuan
                    // langsung kembalikan kehalaman dituju(pakai js)
                    $notif .="login_berhasil";
                    
              echo "
                    <script>
                    document.location.href='index.php?$notif';
                    </script>
                    ";
            }elseif (login_user($data) === "login_gagal"){
                    $notif .="login_gagal";
                    
                    echo "
                          <script>
                          document.location.href='index.php?page=register$notif';
                          </script>
                          ";
            }
        }
        elseif ($button=== "Add to Cart") {
          tambahKeranjang($data);
          
      }elseif ($button === "Apply Coupon") {
          
          $hasil = voucher($data);
          if ($hasil == "voucher tidak tersedia") {
            $notif .= "tidak_tersedia";
            echo "
                          <script>
                          document.location.href='index.php?page=keranjang$notif';
                          </script>
                          ";
          }else {
            # code...
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
        echo "<div class='row mt-5'>
                <div class='col text-center'>
                    <div class='block-27'>
                      <ul>";
                // jika isi variabel lebih besar dari 1
                if ($pagination>1) {
                    // membuat variabel dengan isinya dikurangi 1 (untuk kembali)
                    $prev = $pagination - 1;
                    // keluarkan list dengan link menuju pagenation sebelumnya
                    echo "<li class=''>
                            <a href='$url&pagination=$prev' class='' aria-label='Previous'>
                              <span aria-hidden='true'>&lt;</span>
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
                        echo "<li class=' active'>
                                <a class='' href='$url&pagination=$i'>$i</a>
                            </li>";
                    } else{
                        echo "<li class=''>
                                <a class='' href='$url&pagination=$i'>$i</a>
                            </li>";
                    }
                }

                // if untuk selanjutnya (next)
                if ($pagination < $total_halaman) {
                    $next = $pagination + 1;
                    echo "<li class=''>
                            <a href='$url&pagination=$next' class='' aria-label='Next'>
                              <span aria-hidden='true'>&gt</span>
                              <span class='sr-only'>Next</span>
                            </a>
                        </li>";
                }
        echo "      </ul>
                  </div>
                </div>
              </div>";
        }
  }

  function rupiah($angka){
	
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
   
  }

  function login_user($data){
        global $koneksi;
        $username = $data["username"];
        $password = $data["password"];
        $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' and status='on'");

        // cek username
        if (mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if ( password_verify($password,$row["password"]) ) {

                // set session
                $_SESSION["login_user"] =[
                  "status" => true,
                  "user_id" => $row ['user_id'],
                  "nama" => $row ['nama'],
                  "level" => $row ['level']
                ];
                // cek remember me
                if ( isset($data['remember']) ) {
                    // buaat cookie
                    setcookie('id_user', $row['user_id'], time()+600);
                    setcookie('key_user', hash('sha256',$row['username']), time()+600);
                }
                return "login_berhasil";
            }
        }

        return "login_gagal";
  }

  function cekCookie_user($data){

    if ( isset($data["id_user"]) && isset($data["key_user"]) ) {

      $id = $data['id_user'];
      $key = $data['key_user'];

      // ambil username berdasarkan id
      $hasilCookie = query("SELECT user_id,level,nama,username FROM user WHERE user_id = $id and status='on'")[0];
      // cek cookie dan username

      if ( $key === hash('sha256', $hasilCookie['username']) ) {
          // set session
          $_SESSION["login_user"] =[
            "status" => true,
            "user_id" => $hasilCookie ['user_id'],
            "nama" => $hasilCookie ['nama'],
            "level" => $hasilCookie ['level']
          ];
      }
    }
  }

  function cekSudahLogin_user(){
    global $_SESSION;
    $data = $_SESSION;
    // apakah sudah login
    if ( isset($data["login_user"]["status"]) ) {
      direct("index.php");
      exit;
    }
  }

  function cekBelumLogin_user($page=false){
    global $_SESSION;
    $data = $_SESSION;
    if ($page) {
      $page = "?page=$page";
    }
    // apakah sudah login
    if ( !isset($data["login_user"]["status"]) ) {
      direct("index.php$page");
      exit;
    }
  }

  function tambahKeranjang($data){
    // var_dump($data);die;
    // ambil nilai barang_id yang telah dikirimkan basukkan ke variabel baru
    $barang_id = $data['barang_id'];
    // apakah varibel keranjang(session) ada isinya?, jika iya msukkan ke variabel keranjang baru, jika tidak kosongi
    $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;
    $quantity = isset($data['quantity']) ? $data['quantity'] : 1 ;
    $page = isset($data['page']) ? "?page=$data[page]" : false ;
    $linkKategori = isset($data["kategori_id"]) ? "&kategori_id=".$data["kategori_id"] : false ;
    $linkPagination = isset($data["pagination"]) ? "&pagination=".$data["pagination"] : false ;
    
    $linkBarang = false;
    if (isset($data['page']) == "detail-produk") {
      $linkBarang = "&barang_id=$barang_id";
    }

    // membuat variabel query berisi syntax memanggil colom dari tabel barang 
    $row = query("SELECT * FROM barang WHERE barang_id='$barang_id' ")[0];
    // membuat array dengan no index bedasarkan barang_id
    // dengan isi array didalam array sesuai yang dinginkan
    // $keranjang[$barang_id] = array("nama_barang" => $row["nama_barang"],
    //                                 "gambar" => $row["gambar"],
    //                                 "harga" => $row["harga"],
    //                                 "quantity" => 1 );

    // atau
    $keranjang[$barang_id] =[
            "nama_barang" => $row["nama_barang"],
            "gambar" => $row["gambar"],
            "harga" => $row["harga"],
            "berat" => $row["berat"],
            "quantity" => $quantity
    ];
    // menyimpan variabel $keranjang dengan isi array kedalam variabel session keranjangS
    $_SESSION["keranjang"] = $keranjang;
    // mengembalikan ke halaman
    direct("index.php$page$linkKategori$linkBarang$linkPagination");
  }

  function menuUser(){
    global $_SESSION;

    echo "<li class='nav-item dropdown cta cta-colored'>
            <a class='nav-link dropdown-toggle' href='#' id='dropdownUser' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><span class='icon-user'></span> User</a>
              <div class='dropdown-menu' aria-labelledby='dropdownUser'>";
    if (isset($_SESSION["login_user"])) {
      if ($_SESSION["login_user"]["status"]) {
        echo "<a class='dropdown-item' href='#'>Hi, ".$_SESSION["login_user"]["nama"]."</a>
              <a class='dropdown-item' href='?page=my_profile'>My Profile</a>
              <a class='dropdown-item' href='logout.php'>Log Out</a>";
      }
    }else{
      echo "<a class='dropdown-item' href='?page=register'>Register</a>
            <a class='dropdown-item' href='?page=login' >Log In</a>";
    }

    echo "  </div>
          </li>";
  }

  function voucher($data){
    global $koneksi;
        $nama_voucher = strtolower($data["nama_voucher"]);
        $result = mysqli_query($koneksi, "SELECT * FROM voucher WHERE nama_voucher = '$nama_voucher' and status = 'on'");

        // cek username
        if (mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            return $row['potongan'];
        }

        return 0;
  }
  function ongkir($data){
    global $koneksi;
        $kota_id = ucwords($data["kota_id"]);
        $result = mysqli_query($koneksi, "SELECT * FROM kota WHERE kota_id = '$kota_id'");

        // cek username
        if (mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            return $row['harga'];
        }

        return 0;
  }

  function cekMetodePembayaran($data,$metode){
    if ($data == $metode) {
      echo "checked";
    }
  }

  function waktuIndonesia(){
    $timezone = time() + (60 * 60 * 7);
    return gmdate("Y-m-d H:i:s", $timezone);
  }
  function proses_pemesanan($data){
    global $_SESSION;
    global $koneksi;
      $user_id = $_SESSION["login_user"]["user_id"];
      $no_invoice ="VF".$user_id.'-'.time();
      $nama_penerima =$data["nama"];
      $nomer_telepon =$data["notelp"];
      $email =$data["email"];
      $alamat =$data["alamat"];
      $kota_id =$data["kota_id"];
      $kodepos =$data["kodepos"];
        // fungsi waktu saat ini (system)
      $waktu_saat_ini = waktuIndonesia();
      $bayar =$data["bayar"];
      $total = $data["total"];
      $diskon = $data["diskon"];

      $nama_kota = query("SELECT nama_kota FROM kota where kota_id = $kota_id")[0];
      $nama_kota = $nama_kota["nama_kota"];

      
    
      $query = mysqli_query($koneksi, "INSERT INTO pesanan VALUES 
                                      ('',$user_id,'$no_invoice','$nama_penerima','$nomer_telepon','$email','$alamat','$nama_kota','$kodepos','$waktu_saat_ini','$bayar','Dipesan',$diskon,$total)");
       // jika query berhasil dijalankan
      if ($query) {
        // maka gunakan fungsi ini, untuk mengetahui id terakhhir yang di record di database
        $last_pesanan_id = mysqli_insert_id($koneksi);

        $kurir_id =$data["kurir_id"];
        $harga = $data["ongkir"];
        $query = mysqli_query($koneksi, "INSERT INTO pengiriman (pesanan_id,kurir_id, kota_id,harga)
                                            VALUES ($last_pesanan_id,$kurir_id,$kota_id,$harga)");

        $keranjang = $_SESSION['keranjang'];
        // keluarkan isi array dengan key index pertama, dan value index kedua
        foreach($keranjang AS $key => $value){
            $barang_id = $key;
            $quantity = $value['quantity'];
            $harga = $value['harga'];
            // lalu masukkan data sesuai isi nilai variabel, kedalam table psanan_detail
            mysqli_query($koneksi, "INSERT INTO pesanan_detail(pesanan_id, barang_id, quantity, harga)
                                        VALUES($last_pesanan_id,$barang_id,$quantity,$harga)");
        }
        // hancurkan isi variabel session keranjang
        unset($_SESSION["keranjang"]);
        unset($_SESSION["harga"]);

        return $no_invoice;
            
    }
  }
  
  function tombolBadge($data){
    if ($data === "Dibayar") {
      return "badge badge-secondary";
    }elseif ($data === "Diproses") {
      return "badge badge-info";
    }
  }
?>