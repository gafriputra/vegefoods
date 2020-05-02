// ambil element2 yang dibutuhkan
// tolong carikan saya, elemen yang punya id keyword yg ada didokumen
//  kalok ketemu masukan ke variabel
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var dataBerubah = document.getElementById('data-berubah');

// tambahkan event ketika keyword ditulis
// tolong carikan saya elemen keyword, lalu tambahkan even(perilaku) berikut
// pada saat input dituliskan
// jalankan function berikut
// keyup ketika tombol dilepas, keypress ketik tombol diklik

keyword.addEventListener('keyup', function () {
    // mengambil apayang kita tuliskan
    // keyword.value adalah ambil inputnya (apapun yg diketik user)

    // buat objects ajax
    var gafri = new XMLHttpRequest();

    // mengecek kesiapaj ajaxnya
    // apakah sumber datanya siap untuk merespon?

    // ajaxnya siap gak? dan jalankan fungsi berikut
    gafri.onreadystatechange = function () {
        // readyState kesiapan nilainya 0 sampai 4 , kesiapan sebuah sumber menerima data
        //  4 itu ready
        //  status 200 berarti ok
        // kalok 404 sumbernya gaada
        if (gafri.readyState == 4 && gafri.status == 200) {
            // terus ngapain kalok sudah siap semua
            dataBerubah.innerHTML = gafri.responseText;
        }
    }


    // eksekusi ajax
    // parameter 1 method, 2 sumber, 3 unsinkronus
    gafri.open('GET', 'module/barang/hasil.php?keyword=' + keyword.value, true);
    gafri.send();
});