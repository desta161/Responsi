-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2021 pada 18.38
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skincare`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_log_pelanggan` (`Id_log` INT)  BEGIN
		DELETE FROM log_pelanggan
		WHERE Id_Log = Id_log;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_log_produk` (`Id_log` INT)  BEGIN
		DELETE FROM log_produk
		WHERE Id_Log = Id_log;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_log_transaksi` (`Id_log` INT)  BEGIN
		DELETE FROM log_transaksi
		WHERE Id_Log = Id_log;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_pelanggan` (`Id_pl` INT)  BEGIN
		delete from pelanggan
		where Id_Pelanggan = Id_pl;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_produk` (`Id_p` INT)  BEGIN
		delete from produk
		where Id_Produk = Id_p;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_transaksi` (`Id_Transaksi_t` INT)  BEGIn
		delete from transaksi
		WHERE Id_Transaksi = Id_Transaksi_t;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_user` (`Id_u` INT)  BEGIN
		DELETE FROM user
		WHERE Id_User = Id_u;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_pelanggan` (`Id_Pelanggan` INT(11), `Username` VARCHAR(10), `Nama` VARCHAR(20), `No_Tlp` CHAR(13), `Alamat` VARCHAR(30), `Kota` VARCHAR(20), `Provinsi` VARCHAR(20))  BEGIN
		insert into pelanggan
		values (Id_Pelanggan, Username, Nama, No_Tlp, Alamat, Kota, Provinsi);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_produk` (`Id_Produk` INT(11), `Nama` VARCHAR(50), `Brand` VARCHAR(20), `Kategori` VARCHAR(20), `By_Ingredient` VARCHAR(50), `By_Skincare_Goal` VARCHAR(50), `Harga` INT(11), `Gambar` VARCHAR(30))  BEGIN
	insert into produk
	values (Id_Produk, Nama, Brand, Kategori, By_Ingredient, By_Skincare_Goal, Harga, Gambar);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_transaksi` (`Id_Transaksi` INT(11), `Id_Produk` INT(11), `Id_Pelanggan` INT(11), `Username` VARCHAR(10), `Jumlah` INT(11), `Total` INT(11), `Tanggal` DATE)  BEGIN
		insert into transaksi
		values (Id_Transaksi, Id_Produk, Id_Pelanggan, Username, Jumlah, Total, Tanggal);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_user` (`Id_User` INT(11), `Username` VARCHAR(10), `Password` VARCHAR(255))  BEGIN
		insert into user
		values (Id_User, Username, PASSWORD);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_pelanggan` (`Id_Pelanggan_p` INT(11), `Username_p` VARCHAR(10), `Nama_p` VARCHAR(20), `No_Tlp_p` CHAR(13), `Alamat_p` VARCHAR(30), `Kota_p` VARCHAR(20), `Provinsi_p` VARCHAR(20))  BEGIN
		update pelanggan
		set Username = Username_p,
		Nama = Nama_p, 
		No_Tlp = No_Tlp_p,
		Alamat = Alamat_p,
		Kota = Kota_p,
		Provinsi = Provinsi_p
		where Id_Pelanggan = Id_Pelanggan_p;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_produk` (`Id_p` INT(11), `Nama_p` VARCHAR(50), `Brand_p` VARCHAR(20), `Kategori_p` VARCHAR(20), `By_Ingredient_p` VARCHAR(50), `By_Skincare_Goal_p` VARCHAR(50), `Harga_p` INT(11), `Gambar_p` VARCHAR(30))  BEGIN
		update produk
		set Nama = Nama_p, 
		Brand = Brand_p, 
		Kategori = Kategori_p, 
		By_Ingredient = By_Ingredient_p,  
		By_Skincare_Goal = By_Skincare_Goal_p, 
		Harga = Harga_p,
		Gambar = Gambar_p
		where Id_produk = Id_p;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_transaksi` (`Id_Transaksi_t` INT(11), `Id_Produk_t` INT(11), `Id_Pelanggan_t` INT(11), `Username_t` VARCHAR(10), `Jumlah_t` INT(11), `Total_t` INT(11), `Tanggal_t` DATE)  BEGIN
		update transaksi
		set Id_Produk = Id_Produk_t, 
		Id_Pelanggan = Id_Pelanggan_t, 
		Username = Username_t,
		Jumlah = Jumlah_t, 
		Total = Total_t,
		Tanggal = Tanggal_t
		where Id_Transaksi = Id_Transaksi_t;
	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `Id_Login` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Level` enum('admin','user') NOT NULL DEFAULT 'user',
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_pelanggan`
--

CREATE TABLE `log_pelanggan` (
  `Id_Log` int(11) NOT NULL,
  `Id_Pelanggan` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `No_Tlp` char(13) NOT NULL,
  `Alamat` varchar(30) NOT NULL,
  `Kota` varchar(20) NOT NULL,
  `Provinsi` varchar(20) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_produk`
--

CREATE TABLE `log_produk` (
  `Id_Log` int(11) NOT NULL,
  `Id_Produk` char(3) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Brand` varchar(30) NOT NULL,
  `Kategori` varchar(20) NOT NULL,
  `By_Ingredient` varchar(20) NOT NULL,
  `By_Skincare_Goal` varchar(20) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `Gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_produk`
--

INSERT INTO `log_produk` (`Id_Log`, `Id_Produk`, `Nama`, `Brand`, `Kategori`, `By_Ingredient`, `By_Skincare_Goal`, `Harga`, `Tanggal`, `Gambar`) VALUES
(1, 'A01', '2% Niacinamide+Vit B', 'DATGLOW SKIN', 'Toner', 'Niacinamide', 'Brightening', 44000, '2021-05-16', ''),
(2, 'A02', 'Face Wash Fresh & Luminous', 'Seanna', 'Face Wash', 'Niacinamide', 'Brightening', 79000, '2021-05-16', ''),
(3, 'A03', 'Bio-Peel Gauze Peeling Wine', 'NEOGEN', 'Exfoliator', 'AHA', 'Brightening', 400000, '2021-05-16', ''),
(4, 'A04', 'Face Oil Skin Matters', 'KEY by SA', 'Face Oil', 'Tamanu Oil', 'Acne-Fighting', 149000, '2021-05-16', ''),
(5, 'A05', 'Premium Natural Soap', 'Bali Secret', 'Soap', 'Bovine Collagen', 'Anti-Aging', 64000, '2021-05-16', ''),
(6, 'A06', 'Bakuchiol Skinpair Oil Serum', 'Somethinc', 'Serum', 'Bakuchiol', 'Wound Healing', 89000, '2021-05-16', ''),
(7, 'A07', 'Retinol Serum', 'Airnderm Aesthetic', 'Serum', 'Retinol', 'Anti-Aging', 125000, '2021-05-16', ''),
(8, 'A08', '7 Multi-Formula Pad', 'The Lab by Blanc Dou', 'Exfoliator', 'Hyaluronic Acid', 'Anti-Aging', 150000, '2021-05-16', ''),
(9, 'A09', 'Rice Bran Oil for Body', 'Hayejin ', 'Body Oil', 'Rice Bran', 'Anti-Aging', 318000, '2021-05-16', ''),
(10, '1', '10% Azelaic Acid Booster', 'Paula\'s Choice', 'Cream', 'BHA (Salicylic Acid)', 'Acne-Fighting', 170000, '2021-05-17', ''),
(11, '1', 'a', 'b', 'c', 'd', 'e', 10, '2021-05-20', ''),
(12, '2', 'a', 'b', 'c', 'd', 'e', 10, '2021-05-20', ''),
(13, '3', 'q', 'w', 'e', 'r', 't', 20, '2021-05-20', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_transaksi`
--

CREATE TABLE `log_transaksi` (
  `Id_Log` int(11) NOT NULL,
  `Id_Transaksi` int(11) NOT NULL,
  `Id_Produk` int(11) NOT NULL,
  `Id_Pelanggan` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Tanggal` datetime NOT NULL,
  `Tanggal_Selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `Id_Pelanggan` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `No_Tlp` char(13) NOT NULL,
  `Alamat` varchar(30) NOT NULL,
  `Kota` varchar(20) NOT NULL,
  `Provinsi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`Id_Pelanggan`, `Username`, `Nama`, `No_Tlp`, `Alamat`, `Kota`, `Provinsi`) VALUES
(8, 'desta', 'Desta', '089504446722', 'Jln. Hiu Putih', 'Palangka Raya', 'Kalimantan Tengah'),
(9, 'mila', 'Mila Sari', '081234534567', 'Jln. Paus X', 'Palangka Raya', 'Kalimantan Tengah'),
(10, 'evana', 'Elin Evana', '085249735012', 'Jln. Merdeka', 'Palangka Raya', 'Kalimantan Tengah');

--
-- Trigger `pelanggan`
--
DELIMITER $$
CREATE TRIGGER `delete_pelanggan` AFTER DELETE ON `pelanggan` FOR EACH ROW BEGIN
	insert into log_pelanggan
	set Id_Pelanggan = OLD.Id_Pelanggan,
	Username = OLD.Username,
	Nama = OLD.Nama,
	No_Tlp = OLD.No_Tlp,
	Alamat = OLD.Alamat,
	Kota = OLD.Kota,
	Provinsi = OLD.Provinsi,
	Tanggal = now();
	
	delete FROM transaksi
	where Id_Pelanggan = OLD.Id_Pelanggan;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `pemasukan_harian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `pemasukan_harian` (
`Tanggal` date
,`Total_Pemasukan` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `Id_Produk` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Brand` varchar(20) NOT NULL,
  `Kategori` varchar(20) NOT NULL,
  `By_Ingredient` varchar(50) NOT NULL,
  `By_Skincare_Goal` varchar(50) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`Id_Produk`, `Nama`, `Brand`, `Kategori`, `By_Ingredient`, `By_Skincare_Goal`, `Harga`, `Gambar`) VALUES
(1, 'Antioxidant Facial Oil', 'True to Skin', 'Face Oil', 'Brocolli Seed Oil', 'Wound Healing', 119000, 'true_to_skin.jpg'),
(2, 'Acne Cream', 'Whitelab', 'Cream', 'Calamine ', 'Acne-Fighting', 62000, 'whitelab_acne_cream.jpg'),
(3, 'Oligo Hyaluronic Acid 7 Multi-Formula Pad', 'Blanc Doux', 'Cotton Pad', 'Sodium Hyaluronate', 'Wound Healing', 359000, 'the_lab.jpg'),
(4, 'HYALuronic B5', 'Somethinc', 'Serum', 'Hyaluronic Acid', 'Anti-Aging', 115500, 'hb5.jpg'),
(5, 'Bio-Peel Gauze Peeling', 'NEOGEN', 'Cotton Pad', 'Glycolic Acid', 'Anti-Aging', 400000, 'bio_peel.jpg'),
(6, 'Second Skin Sleeping Mask', 'BYOU', 'Mask', 'Hydrolyzed Eggshell', 'Anti-Aging', 200000, 'byou.jpg'),
(7, 'Jelly Aquarysta', 'Astalift', 'Serum', 'Collagen', 'Anti-Aging', 800000, 'astalif_2.jpg'),
(8, '2% Niacinamide+Vit B5 Skin Tonic', 'DATGLOW', 'Toner', 'Niacinamide ', 'Brightening', 44600, 'datglow_skin.jpg'),
(9, 'Bakuchiol Skinpair Oil Serum', 'Somethinc', 'Serum', 'Bakuchiol', 'Acne-Fighting', 89000, 'bakuchiol.jpg'),
(10, 'Berry Kit', 'Lavonne', 'Facial Gel, Scrub', 'Berry Extract', 'Brightening', 200000, 'lavonne.jpg'),
(11, 'The Potions Pack', 'The Potions', 'Package', 'Azulane', 'Acne-Fighting', 500000, 'the_potions.jpg'),
(12, 'Paeonia Brightening Package', 'DEWPRE', 'Package', 'Niacinamide', 'Brightening ', 657000, 'dewpre.jpg'),
(13, 'Clear & Hydrated Skin Bundle', 'HALE', 'Package', 'Licorice', 'Anti-Aging', 330000, 'hale.jpg'),
(14, 'Bath Box Starter', 'The Bath Box', 'Package', 'Galactomyces ', 'Wound Healing', 700000, 'the_bath_box.jpg'),
(15, 'Skinhouse Glow Series', 'Skinhouse', 'Package', 'Kojic Acid', 'Brightening', 376000, 'skinhouse.jpg'),
(16, 'Nutrishe Package', 'NUTRISHE', 'Package', 'Collagen', 'Brightening', 350000, 'nutrishe.jpg'),
(17, 'Camiane Evolution', 'Camiane', 'Package', 'AHA', 'Acne-Fighting', 240000, 'camiane.jpg'),
(18, 'Yellow Series', 'Bloomka', 'Package', 'Calendula', 'Anti-Aging', 450000, 'yellow.jpg');

--
-- Trigger `produk`
--
DELIMITER $$
CREATE TRIGGER `delete_produk` AFTER DELETE ON `produk` FOR EACH ROW BEGIN
	INSERT INTO log_produk
	SET Id_Produk = OLD.Id_Produk,
	Nama = OLD.Nama, 
	Brand = OLD.Brand, 
	Kategori = OLD.Kategori, 
	By_Ingredient = OLD.By_Ingredient,  
	By_Skincare_Goal = OLD.By_Skincare_Goal, 
	Harga = OLD.Harga,
	Tanggal = now();
	
	DELETE FROM transaksi
	WHERE Id_Produk = OLD.Id_Produk;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `Id_Transaksi` int(11) NOT NULL,
  `Id_Produk` int(11) NOT NULL,
  `Id_Pelanggan` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`Id_Transaksi`, `Id_Produk`, `Id_Pelanggan`, `Username`, `Jumlah`, `Total`, `Tanggal`) VALUES
(1, 1, 8, 'desta', 1, 119000, '2021-05-21'),
(2, 4, 9, 'mila', 2, 231000, '2021-05-21'),
(3, 2, 10, 'evana', 3, 186000, '2021-05-22');

--
-- Trigger `transaksi`
--
DELIMITER $$
CREATE TRIGGER `delete_transaksi` AFTER DELETE ON `transaksi` FOR EACH ROW BEGIN
	INSERT INTO log_transaksi
	SET Id_Transaksi = OLD.Id_Transaksi,
	Id_Produk = OLD.Id_Produk, 
	Id_Pelanggan = OLD.Id_Pelanggan, 
	Username = OLD.Username,
	Jumlah = OLD.Jumlah, 
	Total = OLD.Total,
	Tanggal = OLD.Tanggal,
	Tanggal_Selesai = now();
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `Id_User` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Id_User`, `Username`, `Password`) VALUES
(11, 'desta', '$2y$10$U9p9EIe3UV4Uxt6WadXtSuaMmdUOYQQD4LNh4arZb1DDKaqz5/9WK'),
(12, 'mila', '$2y$10$oWRy7J0gTEwblxWBWKZEpOLwizDJXJXmayel6ZKjx1p8R4HXe/HCO'),
(13, 'evana', '$2y$10$88Bx.qkMYUDLqufrdT3hM.IDKcUh3qfUj7.0wcfIXb2rVVZQONlb6');

-- --------------------------------------------------------

--
-- Struktur untuk view `pemasukan_harian`
--
DROP TABLE IF EXISTS `pemasukan_harian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pemasukan_harian`  AS  (select `transaksi`.`Tanggal` AS `Tanggal`,sum(`transaksi`.`Total`) AS `Total_Pemasukan` from `transaksi` group by `transaksi`.`Tanggal`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id_Login`);

--
-- Indeks untuk tabel `log_pelanggan`
--
ALTER TABLE `log_pelanggan`
  ADD PRIMARY KEY (`Id_Log`);

--
-- Indeks untuk tabel `log_produk`
--
ALTER TABLE `log_produk`
  ADD PRIMARY KEY (`Id_Log`);

--
-- Indeks untuk tabel `log_transaksi`
--
ALTER TABLE `log_transaksi`
  ADD PRIMARY KEY (`Id_Log`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`Id_Pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`Id_Produk`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`Id_Transaksi`),
  ADD KEY `Id_Produk` (`Id_Produk`),
  ADD KEY `Id_Pelanggan` (`Id_Pelanggan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `Id_Login` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_pelanggan`
--
ALTER TABLE `log_pelanggan`
  MODIFY `Id_Log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `log_produk`
--
ALTER TABLE `log_produk`
  MODIFY `Id_Log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `log_transaksi`
--
ALTER TABLE `log_transaksi`
  MODIFY `Id_Log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `Id_Pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `Id_Produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `Id_Transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`Id_Produk`) REFERENCES `produk` (`Id_Produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`Id_Pelanggan`) REFERENCES `pelanggan` (`Id_Pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
