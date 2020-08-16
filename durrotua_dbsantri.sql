-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 12:39 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `durrotua_dbsantri`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jam_bayar` time NOT NULL,
  `jenis_bayar` char(20) NOT NULL,
  `nominal` int(20) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `ket` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `nis`, `tanggal_bayar`, `jam_bayar`, `jenis_bayar`, `nominal`, `bulan`, `tahun`, `ket`) VALUES
(151, '17.907.B', '2020-08-16', '16:53:47', 'Ianah', 135000, '1', '2020', 'Lunas'),
(152, '17.907.B', '2020-08-16', '16:54:00', 'Katering', 0, '1', '2020', 'Tidak ikut');

-- --------------------------------------------------------

--
-- Table structure for table `memodb`
--

CREATE TABLE `memodb` (
  `kwnum` varchar(20) NOT NULL,
  `nominal` int(11) NOT NULL,
  `nama_santri` varchar(25) NOT NULL,
  `admin` varchar(25) NOT NULL,
  `tglkw` varchar(20) NOT NULL,
  `ktrg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memodb`
--

INSERT INTO `memodb` (`kwnum`, `nominal`, `nama_santri`, `admin`, `tglkw`, `ktrg`) VALUES
('001/PPDA/VII/20', 135000, 'NUR FAIDAH ', 'zuzu', '01 Juli 2020', 'Ianah'),
('002/PPDA/VII/20', 135000, 'NUR FAIDAH ', '', '02 Juli 2020', 'Ianah'),
('003/PPDA/VIII/20', 135000, 'FIDA SAILIL HANA ', 'alam', '15 Agustus 2020', 'Ianah');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_tahunan_ianah`
--

CREATE TABLE `rekap_tahunan_ianah` (
  `id` int(11) NOT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `1` varchar(15) NOT NULL,
  `2` varchar(15) NOT NULL,
  `3` varchar(15) NOT NULL,
  `4` varchar(15) NOT NULL,
  `5` varchar(15) NOT NULL,
  `6` varchar(15) NOT NULL,
  `7` varchar(15) NOT NULL,
  `8` varchar(15) NOT NULL,
  `9` varchar(15) NOT NULL,
  `10` varchar(15) NOT NULL,
  `11` varchar(15) NOT NULL,
  `12` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap_tahunan_ianah`
--

INSERT INTO `rekap_tahunan_ianah` (`id`, `tahun`, `nis`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`) VALUES
(50, '2020', '17.907.B', 'Lunas', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_tahunan_katering`
--

CREATE TABLE `rekap_tahunan_katering` (
  `id` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `1` varchar(15) NOT NULL,
  `2` varchar(15) NOT NULL,
  `3` varchar(15) NOT NULL,
  `4` varchar(15) NOT NULL,
  `5` varchar(15) NOT NULL,
  `6` varchar(15) NOT NULL,
  `7` varchar(15) NOT NULL,
  `8` varchar(15) NOT NULL,
  `9` varchar(15) NOT NULL,
  `10` varchar(15) NOT NULL,
  `11` varchar(15) NOT NULL,
  `12` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap_tahunan_katering`
--

INSERT INTO `rekap_tahunan_katering` (`id`, `tahun`, `nis`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`) VALUES
(22, '2020', '17.907.B', 'Tidak ikut', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(100) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nama_santri` varchar(30) NOT NULL,
  `kamar` varchar(10) NOT NULL,
  `angkatan` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `wali` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`id_santri`, `nis`, `nama_santri`, `kamar`, `angkatan`, `alamat`, `wali`, `no_hp`) VALUES
(17, '17.907.B', 'NUR FAIDAH ', 'Al Hafidz', 'Mumarosah', 'BOBOTSARIPURBALIGGA', 'SUWARTO', '081225470423'),
(22, '17.911.B', 'FIDA SAILIL HANA ', 'Al Hafidz', 'Mumarosah', 'JEKULOKUDUS', 'ALI MURSYIDI', '085290269371'),
(23, '17.912.B', 'ISTIQOMAH ', 'Al Hafidz', 'Mumarosah', 'PREMBUN KEBUMEN ', 'WAGINO ', '085725168737'),
(24, '17.914.B', 'NAYLA RACHMA OCTAVIA ', 'An Nafi', 'Mumarosah', 'DEMAK', 'ABDUL ROKHIM ', '082324181484'),
(25, '17.915.B', 'DIANA NASYWA QOTRUNNADA', 'An Nafi', 'Mumarosah', 'UNDAAN KUDUS ', 'SALIMIN ', '085290123078'),
(27, '17.900.B', 'WIRDA KAMALIA ', 'Al Mujib', 'Mumarosah', 'BANYURIP PEKALONGANSELATAN', 'NURRUDIN ', '085659664555'),
(28, '17.901.B', 'SUCI ASMAYANTI ', 'Al Hafidz', 'Mumarosah', 'DUKUHTUI TEGAL', 'SOCA', '085327500714'),
(29, '17.904.B', 'NAILA RAHMA OCTAVIYA', 'An Nafi', 'Sakinah', 'DEMPET DEMAK', 'ABDUL ROKHIM ', '082324181484'),
(31, '17.908.B', 'NUR MILATIS SAKINAH', 'Al Mujib', 'Mumarosah', 'BANDAR BATANG', 'MAHSUN', '085742004237'),
(32, '17.909.B', 'NUR AISYAH', 'Al Hafidz', 'Sakinah', 'SUKOLILO PATI', 'MANSURON ', '082337284754'),
(35, '17.913.B', 'ZAHRONA NUR BAITI', 'Al Hadi', 'Mumarosah', 'PAMOTAN REMBANG', 'H. M.ALI ARIFIN ', '085290242738'),
(38, '17.916.B', 'NUR FAIDAH', 'Al Hafidz', 'Sakinah', 'BOBOTSARIPURBALIGGA', 'SUWARTO', '081225470423'),
(39, '17.917.B', 'IIN AINIYAH ', 'An Nafi', 'Mumarosah', 'SLUKE REMBANG ', 'ABDUL DOPAR', '082328256672'),
(40, '17.918.B', 'ASNI FURAIDA ', 'Al Mujib', 'Mumarosah', 'TRUCUK KLATEN ', 'ABDUL HADI', '085878844066'),
(41, '17.919.B', 'INTAN ROHMAWATI', 'An Nafi', 'Sakinah', 'PUCAKWANGI PATI', 'RASMIN AL SHOLIHIN ', '085226262418'),
(42, '17.920.B', 'UMI NADA RISQIYAH', 'An Nafi', 'Mumarosah', 'RANDUDONGKAL PEMALANG ', 'MASHURI', '085921579714'),
(43, '17.738.A', 'Bayu Adi Luhung', 'H', 'Mumarosah', 'Jl. Karya Bakti Gg:5 No:13 02/04, Medoono Pekalong', 'Suradi', '0'),
(44, '17.739.A', 'Luthfi Abdul Majid Al Faiq', 'G', 'Mumarosah', 'Sinanggul Sikecer 28/05 Mlonggo Jepara', 'Rosyidi Arif', '-'),
(45, '17.740.A', 'Sabri Anami', 'G', 'Mumarosah', 'Depokrejo02/01   Kec; Kebumen', 'Sukowati', '-'),
(46, '17.742.A', 'Moh Shofal Mubarok', 'G', 'Mumarosah', 'Daren Nalumsari Jepara 02/04', 'Furqoni', '-'),
(47, '17.743.A', 'Hero Charisman', 'H', 'Mumarosah', 'Tegalretno 01/01 Petanahan, Kebumen', 'Dalatun', '-'),
(48, '17.744.A', 'Rafiq Muntafail', 'G', 'Mumarosah', 'Jatisari, Jati Mulyo 02/02, Petanahan, Kebumen', 'Sudirman', '-'),
(49, '17.745.A', 'Sirojuddin', 'H', 'Mumarosah', '04/03 Jetak, Wedung, Demak', 'Nur Roso', '-'),
(50, '17.746.A', 'Yusuf Abdulah', 'G', 'Mumarosah', 'Jatilaba, Margasari, Tegal', 'Akhmad Abdul Hakim', '-'),
(51, '17.748.A', 'Mohammad Dinar Amin', 'A', 'Sakinah', 'Korowelangkulon 07/03 Cepiring, Kendal', 'Sukarman', '-'),
(52, '17.749.B', 'Afif Farhan', 'H', 'Mumarosah', 'Rejoagung 04/01, Trangkil Pati', 'Sujono', '-'),
(53, '17.750.A', 'Muh Rizal Alfani', 'H', 'Mumarosah', 'Krajan, Kedung Winong, Sukolilo Pati', 'Suyat', '-'),
(55, '17.752.A', 'Rizki Agung Pamungkas', 'A', 'Sakinah', 'SUSUKAN, SUSUKA', 'Jakaria', '-'),
(56, '17.754.A', 'Muhammad Ilham Fikrianto', 'A', 'Mumarosah', 'Padasugih Rt 05/ Rw 02, Brebes', 'Wusdito', '-'),
(57, '17.755.A', 'Zaenurohman Arifin', 'G', 'Mumarosah', 'Pancurawis 03/10 Purwokerto Selatan, Banyumas', 'Momon Mulyono', '-'),
(58, '17.756.A', 'Ahmad Rozaqi', 'G', 'Mumarosah', 'Kangkung 02/04 Kangkung, Kendal', 'sabati', '-'),
(59, '17.757.A', 'Mohammad Itmamul Wafa', 'E', 'Mumarosah', 'Lodan Wetan, Sarang, Rembang', 'Imam Zainuri', '-'),
(60, '17.758.A', 'Ahmad Naefiroja', 'H', 'Mumarosah', 'Bendagede Binangun Rt03/09 Bantarsari Cilacap', 'Gholibazizy', '-'),
(61, '17.760.A', 'Ahmad Khusni', 'H', 'Mumarosah', 'Pandansari , Brebes', 'Solikhin', '-'),
(62, '17.761.A', 'Abdul Rozaq', 'G', 'Mumarosah', 'Suwaduk,Wedarijaksa,Pati', 'Paryoti', '-'),
(63, '17.762.A', 'Andre Sahifiyan', 'H', 'Mumarosah', 'Besito Kauman 5/4, Gebog,Kudus', 'M.Sutiyono', '-'),
(64, '17.764.A', 'Muhammad Wildan', 'A', 'Mumarosah', 'Gumelar,04/02 Kuripan Garung,Wonosobo ', 'Zainal Abidin', '-'),
(65, '17.765.A', 'Hasan Nur Iman', 'G', 'Mumarosah', 'Banjarlor, Banjarharjo, Brebes', 'Rodi', '-'),
(66, '17.766.A', 'Ahmad Wahyu Revana', 'H', 'Mumarosah', 'Sedan, Rembang', 'Moh Syaikhu', '-'),
(67, '17.767.A', 'Muhamad Imron Makhbub', 'G', 'Mumarosah', 'Panunggalann,Pulokulon,Grobogan', 'Mustofa', '-'),
(68, '17.768.A', 'Muhammad Khifni Alan Ridlwan', 'H', 'Mumarosah', 'Jekulo,2/1, Jekulo Kudus', 'Maslichan', '-'),
(69, '17.769.A', 'Ahmad Faiz', 'H', 'Mumarosah', 'Jl.Raya Jatiwaringin No:74 01/04,Pondokgede, Bekas', 'Zaenal Abidin', '-'),
(70, '17.770.A', 'M. Febriansyah Bachri', 'H', 'Mumarosah', 'Jatikramat, Jati Asih Bekasi', ' Khalimi', '-'),
(71, '17.771.A', 'Choerul  Amin', 'G', 'Mumarosah', 'Gondang 4/1 Karangreja, Purbalingga', 'Warsono', '-'),
(72, '17.772.A', 'Ilham Almatiin', 'H', 'Mumarosah', 'Jl,Kamboja 14/03,Tembok Luwung, Adiwerna,Tegal', 'Karno', '-'),
(73, '17.773.A', 'Sigit Supriono', 'G', 'Mumarosah', 'Kalitengah,Pancur, Rembang', 'Adi', '-'),
(75, '17.774.A', 'Muhammad Irsad', 'H', 'Mumarosah', 'OKI. Sumatera Selatan', 'Suyono', '-'),
(76, '17.775.A', 'Imam Dwi Bagus Solikhun', 'H', 'Mumarosah', 'Godeg 2/4, Ngenden Ampel, Boyolali', 'Romelan', '-'),
(78, '17.777.A', 'Indra Gunawan', 'G', 'Mumarosah', 'Jl. Ra Kartini Saditan, Brebes', 'Muhyanto', '-'),
(79, '17.921.B ', 'ALISAH QODRUNNADA MUNAWAROH', 'Al Hafidz', 'Mumarosah', 'DAWE KUDUS ', 'DICKY KURDI SANTOSO', '081228817236'),
(80, '17.922.B', 'NURUL ADIMA AULIYAâ€™U ROFIâ€™', 'An Nafi', 'Mumarosah', 'KEDUNGUNI PEKALONGAN ', 'M.A ROFIQ', '085742789262'),
(81, '17.924.B', 'FAHMI AYATUN', 'Al Mujib', 'Mumarosah', 'SOKARAJA BANYUMAS ', 'HETI ANDIYANI ', '085877819973'),
(82, '17.925.B', 'FAIQOTUL HIMMAH', 'An Nafi', 'Mumarosah', 'PAMOTAN REMBANG', 'ABD KHALIM ', '085290601740'),
(83, '17.926.B', ' PETIT DINI HAFSARI', 'An Nafi', 'Mumarosah', 'LAMPUNG ', 'SUPRIYONO ', '085213502479'),
(84, '17.927.B', 'NURUL FAIZAH ', 'Al Hafidz', 'Mumarosah', 'PARAKAN TEMANGGUNG', 'MUKHOLIDIN', '085743442672'),
(85, '17.928.B', 'INTAN MEILANIJMAH', 'Al Hafidz', 'Mumarosah', 'WARUNGPERIOK PEMALANG', 'ABDUL MANAN', '081229855374'),
(86, '17.929.B', 'YEINIVA INDRIA DEWI', 'Al Hafidz', 'Mumarosah', 'REMBANG', 'MOHADI', '085226036995'),
(87, '17.930.B', 'RIFâ€™ATUL ALAWIYAH', 'Al Hafidz', 'Mumarosah', 'PANCUR REMBANG', 'SYAERDZI', '085645041075'),
(88, '17.931.B', 'FADHILATUS SALAMAH', 'Al Hafidz', 'Mumarosah', 'KARANGANYAR PURBALINGGA', 'AHMAD JAMHARI', '085778186321'),
(89, '17.932.B ', 'FIDA SAILIL HANA', 'Al Hafidz', 'Mumarosah', 'JEKULOKUDUS', 'ALI MURSYIDI', '085290269371'),
(90, '17.933.B', 'YUâ€™TI Aâ€™YUNINA', 'Al Mujib', 'Mumarosah', 'NGADIREJO TEMANGGUNG ', 'KHAMIM MUSYAFA AHMAD', '085228145558'),
(91, '17.934.B', 'WILDA MUZAYANAH KHAERUNISA', 'Al Mujib', 'Mumarosah', 'SURODADI TEGAL', 'KHOERUDDIN', '-'),
(92, '17.935.B', 'ISTIQOMAH', 'Al Hafidz', 'Mumarosah', 'PREMBUN KEBUMEN', 'WAGINO', '085725168737'),
(93, '17.936.B', 'ENDAH MAULIDIYAH', 'Al Mujib', 'Mumarosah', 'KEMRANJEN BANYUMAS', 'MUCHTAR', '082226986947'),
(94, '17.937.B', 'FINA NAZILATURROHMAH', 'Al Mujib', 'Mumarosah', 'BULUSPESANTREN KEBUMEN', 'MUH MUSLIM ', '085227850308'),
(95, '17.940.B', 'COSTLY IFADA	', 'Al Mujib', 'Mumarosah', 'DUKUHSETI PATI', 'AHMAD SAHAL', '085226180460'),
(96, '17.941.B', 'Luthfirifâ€™atul Maghfiroh', 'Al Hafidz', 'Mumarosah', 'NGAWI', 'WASSIK ABDUL AZIZ', '085859274304'),
(97, '17.942.B', 'ANANDA DEWI ZAQIA', 'An Nafi', 'Mumarosah', 'PECANGAN JEPARA', 'SUDARMO', '085225162096'),
(98, '17.943.B', 'SITI NUR FAIZAH', 'Al Hafidz', 'Mumarosah', 'WELAHAN JEPARA', 'SUWAHIR', '-'),
(99, '17.944.B', 'JHAN NABILA ', 'Al Mujib', 'Mumarosah', 'YOSOREJO PEKALONGAN ', 'SRI WILUJENG', '085740484503'),
(100, '17.946.B', 'TUTIK KHOIRIYAH', 'Al Hafidz', 'Sakinah', 'SUMATRA SELATAN', 'FATHUDIN', '082371485025'),
(101, '17.947.B', 'QUDSIYATUL KHOLISOH', 'Al Mujib', 'Mumarosah', 'CIREBON', 'MUCHLISIN', '085624843846'),
(102, '17.948.B', 'USWATUN HASANAH', 'Al Mujib', 'Mumarosah', 'BANJARNEGARA', 'SYUKRON AHMAD', '082325158669'),
(103, '17.949.B', 'MIFTACHUR ROHMAH', 'Ar Rohman', 'Mumarosah', 'PAMOTAN REMBANG', 'NURHADI UTOMO', '081568204879'),
(104, '17.950.B', 'ULFA SAFANGATUN', 'An Nafi', 'Mumarosah', 'KALIGONDANG PURBALINGGA', 'TAREJA', '-'),
(105, '17.951.B', 'HIMMATUL ULYA ALFIANA', 'Al Mujib', 'Mumarosah', 'KAYEN PATI', 'HARTOYO', '-'),
(106, '17.953.B', 'ESTHININGTYAS SHEILA P', 'Al Mujib', 'Mumarosah', 'BUAYAN KEBUMEN', 'GUNUNG SETIYADI', '-'),
(107, '17.954.B', 'DIAH IKA LESTARI', 'Al Hafidz', 'Sakinah', 'SEMARANG ', 'MASYHADI', '-'),
(108, '17.955.B ', 'ENDANG SULISTIYANI', 'Al Hafidz', 'Mumarosah', 'KALIWUNGU KUDUS', 'KASAN', '-'),
(109, '17.956.B', 'PUPUT PUTRIYANI', 'Al Hafidz', 'Mumarosah', 'PATI', 'SABRAN', '082183548940'),
(110, '17.957. B', 'TASYA PUSPITA ALVIANA SAFITRI', 'Al Hafidz', 'Mumarosah', 'BAPANGAN JEPARA', 'ZAENAL ARIFIN ', '081390751696'),
(111, '17.958.B', 'ARIFATUL CHASANAH', 'Al Mujib', 'Mumarosah', 'WONOSOBO', 'ABDULROCHMAN', '081357961317'),
(112, '17.959.B', 'ROSSANDA UNAFA', 'An Nafi', 'Sakinah', 'WARUNGPRING PEMALANG', 'CHARIROH', '087733473577'),
(113, '17.960.B', 'INTAN FAUZIYAH ', 'Al Hafidz', 'Mumarosah', 'TALANG TEGAL', 'SOLICHIN', '-'),
(114, '16.454.A', 'Ahmad Zuhdi Alwan', 'H', 'Sakinah', 'Randugunting, Kota Tegal', 'Abdul Cholil', '089229212800');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level_user` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `level_user`) VALUES
(2, 'blks', 'blks', 2),
(1, 'bendahara', 'bendahara', 1),
(3, 'sekretaris', 'sekre', 3),
(4, 'zuhdi', '1234', 4),
(5, 'pengasuh', 'pengasuh', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_bayar` (`id_bayar`);

--
-- Indexes for table `memodb`
--
ALTER TABLE `memodb`
  ADD PRIMARY KEY (`kwnum`);

--
-- Indexes for table `rekap_tahunan_ianah`
--
ALTER TABLE `rekap_tahunan_ianah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tahun.nis` (`nis`,`tahun`) USING BTREE;

--
-- Indexes for table `rekap_tahunan_katering`
--
ALTER TABLE `rekap_tahunan_katering`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tahun.nis` (`nis`,`tahun`) USING BTREE;

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `rekap_tahunan_ianah`
--
ALTER TABLE `rekap_tahunan_ianah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `rekap_tahunan_katering`
--
ALTER TABLE `rekap_tahunan_katering`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
