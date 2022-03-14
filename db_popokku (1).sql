-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2022 pada 02.54
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_popokku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `headline` varchar(50) NOT NULL,
  `tanggal_rilis` datetime NOT NULL DEFAULT current_timestamp(),
  `edited` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `judul`, `isi`, `headline`, `tanggal_rilis`, `edited`) VALUES
(0, 'Mario ', '<ol>\r\n	<li>Kejadian yang berhasil diamati di pasar terhadap suatu barang adalah sebagai berikut : Bila barang tersebut tidak ada di pasar, maka harga per-unit yang diminta dapat mencapai Rp. 120.000. Tetapi bila barang ada sebanyak 20 unit harga yang ditawarkan maka harga yang ditawarkan sebesar Rp. 60.000 per unit. <em>Market equilibrium </em>&nbsp;terjadi pada harga Rp. 80.000 dan kuantitas 40 unit.</li>\r\n</ol>\r\n\r\n<p>Diminta :</p>\r\n\r\n<p>a.&nbsp;&nbsp; Carilah fungsi permintaan dan penawaran</p>\r\n\r\n<p>b.&nbsp;&nbsp; Grafik yang menunjukkan kondisi pasar tersebut</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li><strong>Kejadian yang berhasil diamati di pasar terhadap suatu barang adalah sebagai berikut : Bila barang tersebut ada sebanyak 40 unit, maka per unit yang diminta dapat mencapai hanya Rp. 150.000,- tetapi bila barang ada sebanyak 60 unit harga yang ditawarkan sebesar Rp. 80.000,- per unit. <em>Market equilibrium</em> terjadi pada harga Rp. 100.000 dan kuantitas 80 unit.</strong></li>\r\n</ol>\r\n', 'headline_artikel_Eutor5x.png', '2021-02-12 18:12:22', 1),
(1, 'APAA???', 'ini isi', 'headline_artikelnSckDfP.png', '2021-02-12 17:27:10', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_donasi`
--

CREATE TABLE `tb_donasi` (
  `id_donasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah_donasi` int(11) NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `lati` varchar(50) DEFAULT NULL,
  `longi` varchar(50) DEFAULT NULL,
  `alamat_jemput` text NOT NULL,
  `id_kurir` int(11) DEFAULT 0,
  `tanggal_diambil` datetime DEFAULT NULL,
  `status_donasi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_donasi`
--

INSERT INTO `tb_donasi` (`id_donasi`, `id_user`, `jumlah_donasi`, `tanggal_pengajuan`, `lati`, `longi`, `alamat_jemput`, `id_kurir`, `tanggal_diambil`, `status_donasi`) VALUES
(2, 12, 100, '2021-02-16 17:00:00', NULL, NULL, 'dimanaa', 7, '2021-02-16 12:00:00', 2),
(6, 13, 95, '2021-02-17 12:00:00', '-8.171294744583374', '113.72642046863048', 'disini                                                                                                                                                                                                ', 1, '2021-02-25 12:00:00', 2),
(7, 12, 100, '2021-02-19 12:00:00', '-6.4390402302111704', '106.90408992562313', 'disiiiiiniiiiii yaaa                                ', 10, '2021-02-18 12:00:00', 2),
(8, 12, 10, '2021-02-25 19:00:00', '-8.138697896388997', '113.2246913854033', 'disana pokoknya dah', 0, NULL, 0),
(10, 21, 100, '2022-02-14 09:00:00', '-8.3337673', '114.2812305', 'jl Kapten Sutaji Dusun Banje Desa Bubuk RT 04 RW 02 , rumah Pagar Biru                                                                                                                                                                                                                                ', 1, '2022-02-14 09:00:00', 2),
(11, 21, 100, '2022-02-28 12:00:00', '-8.33355842100556', '114.28115308284761', 'Dusun Banje Desa Bubuk RT 04 RW 02 rumah Pagar Biru                                ', 7, '2022-02-28 12:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kapasitas`
--

CREATE TABLE `tb_kapasitas` (
  `id_kapasitas` int(11) NOT NULL,
  `id_level_kapasitas` int(11) NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `kapasitas_max` int(11) NOT NULL,
  `kapasitas_sekarang` int(11) NOT NULL,
  `kapasitas_sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kapasitas`
--

INSERT INTO `tb_kapasitas` (`id_kapasitas`, `id_level_kapasitas`, `id_kurir`, `kapasitas_max`, `kapasitas_sekarang`, `kapasitas_sisa`) VALUES
(2, 1, 1, 500, 400, 400),
(9, 2, 7, 1000, 100, 100),
(10, 2, 10, 1000, 300, 200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Makanan'),
(4, 'Pot Bunga'),
(6, 'pot');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `lokasi_kegiatan` varchar(100) NOT NULL,
  `foto_kegiatan` varchar(100) NOT NULL,
  `tanggal_kegiatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `deskripsi_kegiatan`, `lokasi_kegiatan`, `foto_kegiatan`, `tanggal_kegiatan`) VALUES
(1, 'Bakti Sisosialalla', '2.	Kejadian yang berhasil diamati di pasar terhadap suatu barang adalah sebagai berikut : Bila barang tersebut tidak ada di pasar, maka harga per-unit yang diminta dapat mencapai Rp. 120.000. Tetapi bila barang ada sebanyak 20 unit harga yang ditawarkan maka harga yang ditawarkan sebesar Rp. 60.000 per unit. Market equilibrium  terjadi pada harga Rp. 80.000 dan kuantitas 40 unit. \r\nDiminta :\r\na.	Carilah fungsi permintaan dan penawaran \r\nb.	Grafik yang menunjukkan kondisi pasar tersebut \r\n\r\n3.	Kejadian yang berhasil diamati di pasar terhadap suatu barang adalah sebagai berikut : Bila barang tersebut ada sebanyak 40 unit, maka per unit yang diminta dapat mencapai hanya Rp. 150.000,- tetapi bila barang ada sebanyak 60 unit harga yang ditawarkan sebesar Rp. 80.000,- per unit. Market equilibrium terjadi pada harga Rp. 100.000 dan kuantitas 80 unit.\r\n', 'disanas', 'foto_kegiatan_6rqRbzC.png', '0000-00-00'),
(2, 'Maleng Berjamaah', 'gatau dech', 'Disana', 'foto_kegiatan_EWqNJlA.png', '2021-02-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kurir`
--

CREATE TABLE `tb_kurir` (
  `id_kurir` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lokasi_kurir` varchar(100) NOT NULL,
  `plat_nomor_kurir` varchar(15) NOT NULL,
  `foto_kurir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kurir`
--

INSERT INTO `tb_kurir` (`id_kurir`, `id_user`, `lokasi_kurir`, `plat_nomor_kurir`, `foto_kurir`) VALUES
(1, 10, 'Banyuwnagi Kota', 'BG 1010 XXX', 'kurir_profil_Y4nDZdy.png'),
(7, 5, 'alasrejo', 'DK 2929 LT', 'kurir_profil_1KzERAo.png'),
(10, 11, 'ada bug kah??', 'P 1999 UC', 'kurir_profil_SGUrAut.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'Kurir'),
(4, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level_kapasitas`
--

CREATE TABLE `tb_level_kapasitas` (
  `id_level_kapasitas` int(11) NOT NULL,
  `nama_level_kapasitas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_level_kapasitas`
--

INSERT INTO `tb_level_kapasitas` (`id_level_kapasitas`, `nama_level_kapasitas`) VALUES
(1, 'Cabang'),
(2, 'Pusat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelatihan`
--

CREATE TABLE `tb_pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_pelatihan` datetime NOT NULL,
  `lokasi_pelatihan` text NOT NULL,
  `hp_panitia` varchar(40) NOT NULL,
  `pemateri` varchar(50) DEFAULT NULL,
  `dilaksanakan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelatihan`
--

INSERT INTO `tb_pelatihan` (`id_pelatihan`, `id_user`, `waktu_pelatihan`, `lokasi_pelatihan`, `hp_panitia`, `pemateri`, `dilaksanakan`) VALUES
(1, 13, '2021-02-12 14:19:00', 'DImana gitu', '0811222233', 'Surakjen', 1),
(2, 12, '2021-03-17 15:00:00', 'disana', '0811122233', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penukaran`
--

CREATE TABLE `tb_penukaran` (
  `id_penukaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_produk` varchar(25) NOT NULL,
  `bukti_pembayaran` varchar(50) NOT NULL,
  `tanggal_penukaran` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `gambar`, `deskripsi_produk`, `stok_produk`) VALUES
(12, 0, 'rwrw', '', '1643600722_575b2f4487c8837ec985.jpg', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_level`, `nama`, `email`, `password`, `no_hp`, `alamat`) VALUES
(1, 2, 'Aing teh Admin', 'a@min.com', '202cb962ac', '08112233', 'haaaaaaaaa\r\nsaya dimanaaaa'),
(4, 1, 'Saya', 'a@a.com', '6f9b0a55df8ac28564cb9f63a10be8af6ab3f7c2', '0811', 'Disanaassssssssssssssssss'),
(5, 3, 'kamu', 'c@c.com', '553ee7ed112721e16b4a002c897ca23da744191d', '', ''),
(10, 3, 'contoh', 'saya@saya.com', '4f0de9380dcc54f0c95a6c3a37863b687e55b5b1', '', ''),
(11, 3, 'nama', 'nama@mail.com', '040bd08a4290267535cd247b8ba2eca129d9fe9f', '', ''),
(20, 2, 'wese', 'wese@gmail.com', '27c851e7d65cfe55b8e81b86d69871284b3b2132', '', ''),
(21, 4, 'dika', 'dika@gmail.com', '113dcc22e0874373671d9c9416d5ee09912fb657', '083831936745', 'Dusun Banje Desa Bubuk RT 04 RW 02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `tb_donasi`
--
ALTER TABLE `tb_donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indeks untuk tabel `tb_kapasitas`
--
ALTER TABLE `tb_kapasitas`
  ADD PRIMARY KEY (`id_kapasitas`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `tb_kurir`
--
ALTER TABLE `tb_kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_level_kapasitas`
--
ALTER TABLE `tb_level_kapasitas`
  ADD PRIMARY KEY (`id_level_kapasitas`);

--
-- Indeks untuk tabel `tb_pelatihan`
--
ALTER TABLE `tb_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indeks untuk tabel `tb_penukaran`
--
ALTER TABLE `tb_penukaran`
  ADD PRIMARY KEY (`id_penukaran`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_donasi`
--
ALTER TABLE `tb_donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_kapasitas`
--
ALTER TABLE `tb_kapasitas`
  MODIFY `id_kapasitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kurir`
--
ALTER TABLE `tb_kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_level_kapasitas`
--
ALTER TABLE `tb_level_kapasitas`
  MODIFY `id_level_kapasitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pelatihan`
--
ALTER TABLE `tb_pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_penukaran`
--
ALTER TABLE `tb_penukaran`
  MODIFY `id_penukaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
