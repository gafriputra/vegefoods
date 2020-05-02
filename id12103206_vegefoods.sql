-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Mar 2020 pada 02.22
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id12103206_vegefoods`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `alamat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat_lengkap` varchar(250) NOT NULL,
  `nama_kota` varchar(20) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(10) NOT NULL,
  `banner` varchar(100) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `link` varchar(500) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(10) NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` enum('on','off') NOT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `kategori_id`, `supplier_id`, `nama_barang`, `deskripsi`, `gambar`, `harga`, `stok`, `status`, `berat`) VALUES
(3, 123245, 1, 'Brokoli', 'Brokoli adalah tanaman sayuran yang termasuk dalam suku kubis-kubisan atau Brassicaceae. Brokoli berasal dari daerah Laut Tengah dan sudah sejak masa Yunani Kuno dibudidayakan. Sayuran ini masuk ke Indonesia belum lama dan kini cukup populer sebagai bahan pangan.', '5df57e6700314.jpg', 7000, 985, 'on', 250),
(4, 123246, 12, 'Paprika', 'Paprika adalah tumbuhan penghasil buah yang berasa manis dan sedikit pedas dari suku terong-terongan atau Solanaceae. Buahnya yang berwarna hijau, kuning, merah, atau ungu sering digunakan sebagai campuran salad.', '5df5be71cdae9.jpg', 15000, 998, 'on', 1000),
(5, 123246, 12, 'Tomat', 'omat merupakan tumbuhan siklus hidup singkat, dapat tumbuh setinggi 1 sampai 3 meter. Tumbuhan ini memiliki buah berawarna hijau, kuning, dan merah yang biasa dipakai sebagai sayur dalam masakan atau dimakan secara langsung tanpa diproses. ', '5df5bf0b8e6b2.jpg', 5000, 1094, 'on', 250),
(6, 123248, 11, 'Petai', 'Petai, pete, atau mlanding merupakan pohon tahunan tropika dari suku polong-polongan, anak-suku petai-petaian. Tumbuhan ini tersebar luas di Nusantara bagian barat. Bijinya, yang disebut &quot;petai&quot; juga, dikonsumsi ketika masih muda, baik segar maupun direbus. ', '5df5bf72a187b.jpg', 7000, 60000, 'on', 250),
(7, 123246, 12, 'Stroberi', 'Stroberi atau tepatnya stroberi kebun adalah sebuah varietas stroberi yang paling banyak dikenal di dunia. Seperti spesies lain dalam genus Fragaria, buah ini berada dalam keluarga Rosaceae.', '5df5bfc9c7e0f.jpg', 2000, 995, 'on', 500),
(8, 123246, 12, 'Cabai Merah', 'Cabai atau cabai merah adalah buah dan tumbuhan anggota genus Capsicum. Buahnya dapat digolongkan sebagai sayuran maupun bumbu, tergantung bagaimana digunakan. Sebagai bumbu, buah cabai yang pedas sangat populer di Asia Tenggara sebagai penguat rasa makanan.', '5df5c01981486.jpg', 2000, 2980, 'on', 250),
(9, 123245, 3, 'Wortel', 'Wortel adalah tumbuhan biennial yang menyimpan karbohidrat dalam jumlah besar untuk tumbuhan tersebut berbunga pada tahun kedua. Batang bunga tumbuh setinggi sekitar 1 m, dengan bunga berwarna putih, dan rasa yang manis langu. Bagian yang dapat dimakan dari wortel adalah bagian umbi atau akarnya.', '5df5c05ea3a48.jpg', 5000, 1000, 'on', 250),
(10, 123245, 1, 'Kubis', 'Kubis, kol, kobis, atau kobis bulat adalah tanaman dua tahunan hijau atau ungu berdaun, ditanam sebagai tanaman tahunan sayuran untuk kepala padat berdaunnya. Erat kaitannya dengan tanaman cole lainnya, seperti brokoli, kembang kol, dan kubis brussel, itu diturunkan dari B. oleracea var. oleracea, kubis lapangan liar', '5df5c0c64b3b9.jpg', 3000, 2500, 'on', 250),
(11, 123247, 3, 'Bawang Merah', 'Bawang merah adalah salah satu bumbu masak utama dunia yang berasal dari Iran, Pakistan, dan pegunungan-pegunungan di sebelah utaranya, tetapi kemudian menyebar ke berbagai penjuru dunia, baik sub-tropis maupun tropis.', '5df5c11ab7ad4.jpg', 5000, 2199, 'on', 200),
(12, 123247, 3, 'Bawang Putih', 'Bawang putih digunakan sebagai bumbu yang digunakan hampir di setiap makanan dan masakan Indonesia. Sebelum dipakai sebagai bumbu, bawang putih dihancurkan dengan ditekan dengan sisi pisau (dikeprek) sebelum dirajang halus dan ditumis di penggorengan dengan sedikit minyak goreng. Bawang putih bisa juga dihaluskan dengan berbagai jenis bahan bumbu yang lain. ', '5df5c16592985.jpg', 5000, 997, 'on', 250),
(13, 123249, 1, 'Jus Jeruk', 'Sari buah jeruk adalah sari buah yang diperoleh dengan memeras atau menekan isi buah jeruk. Diminum di banyak tempat di dunia, sari buah jeruk biasanya menjadi bagian makan pagi atau sarapan.', '5df5c1dedf042.jpg', 15000, 3949, 'on', 450),
(14, 123249, 11, 'Fgh', 'Zgdyfjg', '5e425f193df23.jpg', 30000, 5, 'on', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `karyawan_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`karyawan_id`, `nama`, `username`, `email`, `password`, `level`, `status`) VALUES
(1, 'gafri putra', 'gafriputra', 'gafri.putra@gmail.com', '$2y$10$oPiw.aCqeIddTdunBC6u8uaPHJiEOygTGSFQOfsZoZITVgDAiQdai', 'admin', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(10) NOT NULL,
  `nama_kategori` varchar(250) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`, `keterangan`, `status`) VALUES
(123245, 'Sayur - Sayuran', 'Sayuran merupakan sebutan umum bagi bahan pangan asal tumbuhan yang biasanya mengandung kadar air tinggi dan dikonsumsi dalam keadaan segar atau setelah diolah secara minimal. Sebutan untuk beraneka jenis sayuran disebut sebagai sayur-sayuran', 'on'),
(123246, 'Buah - Buahan', 'Buah adalah organ pada tumbuhan berbunga yang merupakan perkembangan lanjutan dari bakal buah (ovarium). Buah biasanya membungkus dan melindungi biji.', 'on'),
(123247, 'Rempah - Rempah', 'Rempah-rempah adalah bagian tumbuhan yang beraroma atau berasa kuat yang digunakan dalam jumlah kecil di makanan sebagai pengawet atau perisa dalam masakan.', 'on'),
(123248, 'Biji - Bijian', 'Biji adalah bakal biji dari tumbuhan berbunga yang telah masak. Biji dapat terlindung oleh organ lain atau tidak.', 'on'),
(123249, 'Minuman Jus', 'Jus adalah minuman yang dibuat dari ekstraksi atau pengepresan cairan alami yang terkandung dalam buah dan sayuran. ', 'on'),
(123250, 'Kacang-kacangan', 'Kacang adalah istilah non-botani yang biasa dipakai untuk menyebut biji sejumlah tumbuhan polong-polongan. ', 'on'),
(123251, 'Susu Dan Madu', 'Minum susu dengan madu memiliki efek yang sangat menguntungkan untuk menghalau beberapa bakteri. Ketika Anda minum susu hangat dan madu, Anda mengurangi sembelit, kembung, dan masalah usus lainnya.', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `user_id` int(11) NOT NULL,
  `string` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesukaan`
--

CREATE TABLE `kesukaan` (
  `user_id` int(11) NOT NULL,
  `string` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `konfirmasi_id` int(10) NOT NULL,
  `pesanan_id` int(10) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_rekening` varchar(150) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`konfirmasi_id`, `pesanan_id`, `nama_bank`, `nomor_rekening`, `nama_rekening`, `gambar`) VALUES
(2, 2, 'BCA', '6645544132132', 'Gafri Putra Aliffansah', '5e01d67c22a9e.jpg'),
(6, 4, 'BCA', '6645544132132', 'Gafri Putra Aliffansah', '5e01d85717571.jpg'),
(8, 5, 'CIMB NIAGA', '62153215789', 'Astrid Safira Nugraheni', '5e0400d1e2868.png'),
(9, 6, 'CIMB NIAGA', '6645544132132', 'JOKOWI', '5e06d8b61bfd5.jpg'),
(10, 8, 'mandiri', '6645544132132', 'Astrid Safira Nugraheni', '5e072834c6c4b.jpg'),
(14, 9, 'BCA', '6645544154689', 'safira maya', '5e072c6a0f8ee.jpg'),
(16, 10, 'BCA', '123242343434242', 'IMRON', '5e08092f1fa7b.png'),
(17, 7, 'CIMB NIAGA', '6645544132132', 'Gafri Putra', '5e08aae66810d.jpg'),
(20, 14, 'Mayora', '123242343434242', 'JOKOWI', '5e0c25c95a101.png'),
(21, 16, 'Niaga', '1234546648206434816', 'Astrid', '5e0c9738b81e1.jpg'),
(22, 19, 'niaga', '256314979211899', 'astrid', '5e100d6411a68.jpg'),
(23, 20, 'BCA', '6645544154689', 'Gafri Putra Aliffansah', '5e1324fb98d32.jpg'),
(24, 21, 'BCA', '342412345465', 'ade', '5e412c82a532d.jpg'),
(25, 23, 'df', '333', 'sef', '5e412e00933af.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `kota_id` int(11) NOT NULL,
  `nama_kota` varchar(150) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kota_id`, `nama_kota`, `harga`, `status`) VALUES
(1, 'Surabaya', 9000, 'on'),
(2, 'Sidoarjo', 9000, 'on'),
(3, 'Malang', 12000, 'on'),
(4, 'Mojokerto', 10000, 'on'),
(5, 'Pasuruan', 12000, 'on'),
(6, 'Jombang', 11000, 'on'),
(7, 'Nganjuk', 11000, 'on'),
(8, 'Lamongan', 12000, 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `kurir_id` int(11) NOT NULL,
  `nama_ekspedisi` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `phone` char(13) DEFAULT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`kurir_id`, `nama_ekspedisi`, `email`, `alamat`, `phone`, `status`) VALUES
(1, 'Sicepat', 'care@sicepat.com', 'www.sicepat.com', '0313526845684', 'on'),
(2, 'JNE', 'care@jne.id', 'www.jne.co.id', '0831254544', 'on'),
(3, 'JNT', 'care@jet.co.id', 'www.jet.co.id', '081356385562', 'on'),
(4, 'Ninja Express', 'admin@ninjaexpress.co', 'www.ninjaexpress.co', '0312547895645', 'on'),
(11, 'AntarAja', 'care@antaraja.id', 'www.antaraja.id', '0854123654789', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `pengiriman_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `kurir_id` int(11) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `tanggal_pengiriman` date DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `noresi` varchar(50) DEFAULT NULL,
  `tanggal_diterima` date DEFAULT NULL,
  `nama_penerima_barang` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`pengiriman_id`, `pesanan_id`, `kurir_id`, `kota_id`, `tanggal_pengiriman`, `harga`, `noresi`, `tanggal_diterima`, `nama_penerima_barang`) VALUES
(1, 2, 2, 6, '2019-12-25', 33000, '123', '2019-12-26', 'Gafri Putra Aliffansah'),
(3, 4, 4, 1, '2019-12-26', 45000, '321212', '2019-12-28', 'Gafri Putra Aliffansah'),
(4, 5, 1, 1, '2019-12-26', 36000, '62154782102', '2019-12-26', 'Astrid Safira Nugraheni'),
(5, 6, 4, 6, '0000-00-00', 11000, '', '0000-00-00', ''),
(6, 7, 4, 4, '2020-02-11', 200000, '/67899', '0000-00-00', ''),
(7, 8, 2, 7, '2020-01-01', 55000, '25368102640202', '0000-00-00', ''),
(8, 9, 2, 7, '2019-12-28', 11000, '2564456564465', '0000-00-00', ''),
(9, 10, 3, 5, '2019-12-29', 12000, '12331231232', '2019-12-29', 'Imron Waru'),
(11, 14, 4, 7, '2020-01-01', 55000, '65312215454', '2020-01-01', 'Jokowidodo'),
(12, 15, 11, 1, NULL, 72000, NULL, NULL, NULL),
(13, 16, 3, 1, '2020-01-01', 18000, '', '2020-01-01', 'Astrid'),
(14, 17, 4, 2, NULL, 9000, NULL, NULL, NULL),
(15, 18, 11, 2, NULL, 18000, NULL, NULL, NULL),
(16, 19, 2, 2, '2020-01-04', 18000, '1256515729921681', '2020-01-04', 'astrid'),
(17, 20, 2, 3, '2020-01-06', 276000, '2526516516516', '2020-01-06', 'Gafri Putra Aliffansah'),
(18, 21, 11, 3, '2020-02-10', 12000, '12345678', NULL, NULL),
(19, 22, 3, 1, NULL, 9000, NULL, NULL, NULL),
(20, 23, 4, 8, '2020-02-10', 12000, '23145467869708', NULL, NULL),
(21, 24, 2, 1, NULL, 9000, NULL, NULL, NULL),
(22, 25, 2, 1, NULL, 9000, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `pesanan_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `no_invoice` varchar(100) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat_lengkap` varchar(250) NOT NULL,
  `nama_kota` varchar(20) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `metode_pembayaran` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`pesanan_id`, `user_id`, `no_invoice`, `nama_penerima`, `telepon`, `email`, `alamat_lengkap`, `nama_kota`, `kodepos`, `tanggal_pemesanan`, `metode_pembayaran`, `status`, `diskon`, `total`) VALUES
(2, 1, 'VF1-1576991376', 'Gafri Putra Aliffansah', '083830116257', 'gafri.putra@gmail.com', 'Jl. Brigjen Katamso 4 No 223 Rt 30 Rw 06', 'Jombang', ' 61256', '2019-12-22 06:09:36', 'Tunai', 'Diterima', 9750, 88250),
(4, 1, 'VF1-1577155528', 'Gafri Putra Aliffansah', '083830116257', 'astrid@gmail.com', 'Jl. Brigjen Katamso 4 No 223 Rt 30 Rw 06', 'Surabaya', ' 61248', '2019-12-24 09:45:28', 'Tunai', 'Diterima', 3000, 62000),
(5, 1, 'VF1-1577320594', 'Astrid Safira Nugraheni', '0885655760038', 'astrid.safira@gmail.com', 'Jl. Undaan Kulon 2 ', 'Surabaya', ' 632541', '2019-12-26 07:36:34', 'Bank', 'Diterima', 22500, 163500),
(6, 1, 'VF1-1577368525', 'Ruzain Putra Gemilang', '0856312454787', 'ruzain.putra@gmail.com', 'Jl. Brigjen Katamso 4 No 223 Rt 30 Rw 06', 'Jombang', ' 61256', '2019-12-26 20:55:25', 'Bank', 'Dibayar', 1500, 19500),
(7, 1, 'VF1-1577456609', 'Imron', '086532154212', 'imron.daito@gmai.com', 'Jl. Waru Indah 6254 Kavling 115', 'Mojokerto', '56894', '2019-12-27 21:23:29', 'Emoney', 'Dikirim', 100000, 600000),
(8, 1, 'VF1-1577527108', 'Astrid Safira Nugraheni', '081256654998', 'astrid@gmail.com', 'Jl. Undaan Kulon 2 ', 'Nganjuk', ' ', '2019-12-28 16:58:28', 'Bank', 'Dikirim', 14850, 139150),
(9, 1, 'VF1-1577528364', 'safira maya', '081256457899', 'safira98@gmail.com', 'Jl. Undaan Kulon 2 ', 'Nganjuk', ' 61256', '2019-12-28 17:19:24', 'Bank', 'Ditolak', 2250, 23750),
(10, 4, 'VF4-1577584911', 'Imron Waru', '0856312547845', 'imron.daito@gmai.com', 'Jl. Brigjen Katamso 4 No 223 Rt 30 Rw 06', 'Pasuruan', ' 61256', '2019-12-29 09:01:51', 'Bank', 'Diterima', 1050, 17950),
(14, 6, 'VF6-1577854329', 'Jokowidodo', '081256457899', 'jokowidodo@gmail.com', 'Jl. Merdeka Indonesia', 'Nganjuk', '626663', '2020-01-01 11:52:09', 'Tunai', 'Diterima', 3750, 201250),
(15, 7, 'VF7-1577859043', 'Zhafran', '08234567888', 'iansyah@gmail.com', 'Jagir sidoresmo', 'Surabaya', '60288', '2020-01-01 13:10:43', 'Tunai', 'Dipesan', 1000, 111000),
(16, 8, 'VF8-1577881465', 'Astrid', 'Safira', 'astridsafira74@gmail.com', 'Jl. Undaan kulon 2', 'Surabaya', '6127', '2020-01-01 19:24:25', 'Bank', 'Diterima', 0, 45000),
(17, 9, 'VF9-1577887232', 'Syarah zeze', '081334911125', 'syarahzeze123@gmail.com', 'Waru sidoarjo', 'Sidoarjo', '31456', '2020-01-01 21:00:32', 'Bank', 'Dipesan', 0, 23000),
(18, 9, 'VF9-1577887972', 'Syarah zeze', '081334911125', 'syarahzeze123@gmail.com', 'Waru sidoarjo', 'Sidoarjo', '31456', '2020-01-01 21:12:52', 'Bank', 'Dipesan', 0, 38000),
(19, 8, 'VF8-1578110256', 'astrid', '081245263997', 'astridsafira74@gmail.com', 'Jl. Undaan Kulon', 'Sidoarjo', '61579', '2020-01-04 10:57:36', 'Bank', 'Diterima', 0, 39000),
(20, 1, 'VF1-1578312908', 'Gafri Putra Aliffansah', '05263622562', 'gafri.putra@gmail.comm', 'Jl. Brigjen Katamso 4 No 223 Rt 30 Rw 06', 'Malang', ' 61256', '2020-01-06 19:15:08', 'Bank', 'Dikirim', 78000, 718000),
(21, 12, 'VF12-1581329074', 'ade', '0987654', 'adefirmansyah776@gmail.com', 'Jalan dupak timur 2 no.44 , Surabaya', 'Malang', '60171', '2020-02-10 17:04:34', 'Tunai', 'Dikirim', 0, 17000),
(22, 12, 'VF12-1581329327', 'ade', '0987654', 'lindachoireni44@gmail.com', 'Jalan dupak timur 2 no.44 , Surabaya', 'Surabaya', '60171', '2020-02-10 17:08:47', 'Bank', 'Dipesan', 0, 13000),
(23, 13, 'VF13-1581329840', 'dasf', '999', 'xdvf@as', 'dd', 'Lamongan', '44555', '2020-02-10 17:17:20', 'Bank', 'Dikirim', 0, 17000),
(24, 16, 'VF16-1581407214', 'Gogon', '031', 'gogonmahesa@gmail.com', 'Jl.dupak baru 17', 'Surabaya', '60178', '2020-02-11 14:46:54', 'Bank', 'Dipesan', 0, 24000),
(25, 16, 'VF16-1581407337', 'Gogon', '031', 'gogonmahesa@gmail.com', 'Jl.dupak baru 17', 'Surabaya', '60178', '2020-02-11 14:48:57', 'Bank', 'Dipesan', 0, 24000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `pesanan_id` int(10) NOT NULL,
  `barang_id` int(10) NOT NULL,
  `quantity` tinyint(2) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`pesanan_id`, `barang_id`, `quantity`, `harga`) VALUES
(2, 12, 1, 10000),
(2, 5, 1, 5000),
(2, 9, 10, 5000),
(4, 7, 10, 2000),
(5, 13, 10, 15000),
(6, 12, 1, 10000),
(7, 11, 100, 5000),
(8, 7, 2, 2000),
(8, 5, 5, 5000),
(8, 3, 10, 7000),
(9, 4, 1, 15000),
(10, 3, 1, 7000),
(14, 13, 10, 15000),
(15, 8, 10, 2000),
(15, 7, 10, 2000),
(16, 3, 1, 7000),
(16, 5, 1, 5000),
(16, 4, 1, 15000),
(17, 7, 1, 2000),
(17, 5, 1, 5000),
(17, 6, 1, 7000),
(18, 4, 1, 15000),
(18, 5, 1, 5000),
(19, 13, 1, 15000),
(19, 7, 3, 2000),
(20, 11, 100, 5000),
(20, 8, 10, 2000),
(21, 12, 1, 5000),
(22, 8, 2, 2000),
(23, 11, 1, 5000),
(24, 4, 1, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `phone` char(13) DEFAULT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `nama_supplier`, `email`, `alamat`, `phone`, `status`) VALUES
(1, 'PT. Makanan Sehat Indonesia', 'care@makananku.com', 'www.makananku.com', '08564688745', 'on'),
(3, 'PT. Indonesia Sehat', 'admin@indosehat.com', 'www.sayursehat.com', '083830116257', 'on'),
(11, 'PT. Segar Abadi', 'care@sayurku.com', 'www.sayurku.id', '085632547812', 'on'),
(12, 'PT. Buahan Indonesia', 'care@buahan.id', 'buahan.id', '0862351547895', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `level` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `level`, `nama`, `username`, `email`, `password`, `status`) VALUES
(1, 'customer', 'gafri putra', 'gafriputra', 'gafri.putra@gmail.com', '$2y$10$oPiw.aCqeIddTdunBC6u8uaPHJiEOygTGSFQOfsZoZITVgDAiQdai', 'on'),
(2, 'customer', 'kaos kulo', 'kaoskulo', 'kaoskulo@gmail.com', '$2y$10$LGMZffGiOGKU8md90U4mYe6T.yc0UNZhaKC11vsyJaADImwc7gvve', 'on'),
(3, 'customer', 'Astrid Safira', '', '', '$2y$10$nlMCsUtVayxTGSc75zPGuO7DwtaiMgN3A8y/li6NuBfamllNsOAky', 'on'),
(4, 'customer', 'Imron', 'imron', 'imron@gmail.com', '$2y$10$PDUIG4vcar4Ka044y8KVAOL66AgLZwhcLuZ2h45ldC4Lw8ofvpxs6', 'on'),
(6, 'customer', 'joko widodo', 'jokowi', 'jokowi@gmail.com', '$2y$10$tPC4GggVuLYGhejmMqToh.wcVlG3MhZK76E4OZ1maEZLEnlXfCnri', 'on'),
(7, 'customer', 'Al Zhaf', 'alzhaf', 'iansyah35@gmail.com', '$2y$10$5F2Y5Mm1sjnN0ezwTr9MeeT3EewyVYyF45njgTpiZg33PRkmRReC2', 'on'),
(8, 'customer', 'Astrid Nugraheni', 'astridsafira', 'astridsafira74@gmail.com', '$2y$10$Qz3axWvgz6AJA7usfzlxLO1IzIqPsnmuKh6F/bJOKxDs.eftSBcvu', 'on'),
(9, 'customer', 'Syarahze Isnan', 'syarahze', 'syarahzeze123@gmail.com', '$2y$10$9rX8TPO7bjQaavW24c9R6Omo1zSXrGCkh34k8y64FGxYzOn4nZ8AO', 'on'),
(10, 'customer', 'jon jonvok', 'asu', 'asu@gmail.com', '$2y$10$kB1Lqq5PuFAUAD9KTlKChuSQdOFPPIZqdpT5IDqohaw2AAE/jQkX2', 'on'),
(11, 'customer', 'nei dean', 'neidean', 'neideanc@gmail.com', '$2y$10$4mhKUOiDi4PrJHphnrevoOo7iccQWQ.vgasjcV8p6D8XjvKg9bCMG', 'on'),
(12, 'customer', 'ade firmansyah', 'ade', 'adefirmansyah776@gmail', '$2y$10$ljfXSim4QatKlEznEDuEReYbu6QZdW/6YksHFdjNJJcL0GAsDloY2', 'on'),
(13, 'customer', 'f jk', 'ahmed', 'ahmet@bukutuk.com', '$2y$10$h4tQFX02UCoxTSjntDjYTeAkVnmCh6yueLFbFnSQFCAUTfjWQVj0e', 'on'),
(14, 'customer', 'Ismu Ade', 'adefr', 'ade@gmail.com', '$2y$10$sApwTW6nSb1AwddEhAxhtOD498eUIdbfJCUaUf11f4N2U/2G82P4S', 'on'),
(15, 'customer', 'Ade Firmansyah', 'adetomm', 'adefirmansyah12@gmail.com', '$2y$10$VSo18VAsDSa7T/Z83uMxv.Jm9eKO4z84zHjec9Gl5SgT9FjWXKr0u', 'on'),
(16, 'customer', 'Ade Afer', 'ade00', 'adefirmansyah776@gmail.com', '$2y$10$NQClWLg195Br2JNJtmsms.dwj4BMhuL41wAFPGgFjZzwGU5eOZhtG', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `voucher_id` int(11) NOT NULL,
  `nama_voucher` varchar(50) NOT NULL,
  `potongan` float NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `voucher`
--

INSERT INTO `voucher` (`voucher_id`, `nama_voucher`, `potongan`, `keterangan`, `status`) VALUES
(1, '1212berkah', 15, 'potongan harga 15%', 'on'),
(3, 'harbolnas', 2.5, 'Potongan Harbolnas', 'on'),
(4, 'tahunbaru', 20, 'Diskon Tahun Baru 2020', 'on');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`alamat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `kesukaan`
--
ALTER TABLE `kesukaan`
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`konfirmasi_id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kota_id`),
  ADD KEY `kota_id` (`kota_id`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`kurir_id`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`pengiriman_id`),
  ADD KEY `pengiriman_id` (`pengiriman_id`),
  ADD KEY `kurir_id` (`kurir_id`),
  ADD KEY `kota_id` (`kota_id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD KEY `pesanan_id` (`pesanan_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `alamat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `karyawan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123252;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `konfirmasi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `kota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `kurir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `pengiriman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `pesanan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD CONSTRAINT `alamat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `kesukaan`
--
ALTER TABLE `kesukaan`
  ADD CONSTRAINT `kesukaan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`kurir_id`) REFERENCES `kurir` (`kurir_id`),
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`kota_id`),
  ADD CONSTRAINT `pengiriman_ibfk_3` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `pesanan_detail_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
