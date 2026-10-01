-- Sanitized Always Ngoding schema and local seed. Generate db.sql with make db.
-- Application login: ZihxS / admin123. Replace this public seed password before deployment.

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `__DB_DATABASE__` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `__DB_DATABASE__`;

DELIMITER $$

CREATE DEFINER=CURRENT_USER PROCEDURE `__DB_PREFIX__fungsi_eksekusi_atm` ()  NO SQL COMMENT 'untuk update anggota terbaik mingguan' BEGIN

SELECT penginput INTO @rajin_membuat_artikel
FROM __DB_PREFIX__artikel
WHERE status = 'aktif' AND tanggal_posting >= NOW() - INTERVAL 1 WEEK
GROUP BY penginput
ORDER BY COUNT(*) DESC
LIMIT 1;

SELECT pengguna INTO @rajin_berdiskusi
FROM __DB_PREFIX__j_diskusi
WHERE diblok = 'N' AND tanggal >= NOW() - INTERVAL 1 WEEK
GROUP BY pengguna
ORDER BY COUNT(*) DESC
LIMIT 1;

SELECT p.nama_pengguna INTO @banyak_berkontribusi
FROM __DB_PREFIX__pengguna AS p
LEFT JOIN __DB_PREFIX__untuk_atm_artikel AS a ON p.nama_pengguna = a.nama_pengguna
LEFT JOIN __DB_PREFIX__untuk_atm_k_artikel AS ka ON p.nama_pengguna = ka.nama_pengguna
LEFT JOIN __DB_PREFIX__untuk_atm_k_loker AS kl ON p.nama_pengguna = kl.nama_pengguna
LEFT JOIN __DB_PREFIX__untuk_atm_j_diskusi AS jd ON p.nama_pengguna = jd.nama_pengguna
GROUP BY p.nama_pengguna
ORDER BY (IFNULL(a.jumlah,0)+IFNULL(ka.jumlah,0)+IFNULL(kl.jumlah,0)+IFNULL(jd.jumlah,0)) DESC
LIMIT 1;

SELECT p.nama_pengguna INTO @anggota_baru_paling_rajin
FROM __DB_PREFIX__pengguna AS p
LEFT JOIN __DB_PREFIX__untuk_atm_z_bt_css AS css ON p.nama_pengguna = css.nama_pengguna
LEFT JOIN __DB_PREFIX__untuk_atm_z_bt_html AS html ON p.nama_pengguna = html.nama_pengguna
LEFT JOIN __DB_PREFIX__untuk_atm_z_bt_jquery AS jquery ON p.nama_pengguna = jquery.nama_pengguna
LEFT JOIN __DB_PREFIX__untuk_atm_z_bt_js AS js ON p.nama_pengguna = js.nama_pengguna
LEFT JOIN __DB_PREFIX__untuk_atm_z_bt_mysql AS mysql ON p.nama_pengguna = mysql.nama_pengguna
LEFT JOIN __DB_PREFIX__untuk_atm_z_bt_php AS php ON p.nama_pengguna = php.nama_pengguna
GROUP BY p.nama_pengguna
ORDER BY (IFNULL(css.jumlah,0)+IFNULL(html.jumlah,0)+IFNULL(jquery.jumlah,0)+IFNULL(js.jumlah,0)+IFNULL(mysql.jumlah,0)+IFNULL(php.jumlah,0)) DESC
LIMIT 1;

SELECT
rajin_membuat_artikel,
rajin_berdiskusi,
banyak_berkontribusi,
anggota_baru_paling_rajin
INTO
@rajin_membuat_artikel_sebelumnya,
@rajin_berdiskusi_sebelumnya,
@banyak_berkontribusi_sebelumnya,
@anggota_baru_paling_rajin_sebelumnya
FROM
__DB_PREFIX__atm;

UPDATE
__DB_PREFIX__atm
SET
rajin_membuat_artikel = IFNULL(@rajin_membuat_artikel,@rajin_membuat_artikel_sebelumnya),
rajin_berdiskusi = IFNULL(@rajin_berdiskusi,@rajin_berdiskusi_sebelumnya),
banyak_berkontribusi =  IFNULL(@banyak_berkontribusi,@banyak_berkontribusi_sebelumnya),
anggota_baru_paling_rajin = IFNULL(@anggota_baru_paling_rajin,@anggota_baru_paling_rajin_sebelumnya);

END$$

DELIMITER ;

CREATE TABLE `__DB_PREFIX__1_css` (
  `id_1_css` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `modul_ke` int(11) NOT NULL,
  `bagian_terakhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__1_html` (
  `id_1_html` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `modul_ke` int(11) NOT NULL,
  `bagian_terakhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__1_jquery` (
  `id_1_jquery` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `modul_ke` int(11) NOT NULL,
  `bagian_terakhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__1_js` (
  `id_1_js` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `modul_ke` int(11) NOT NULL,
  `bagian_terakhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__1_mysql` (
  `id_1_mysql` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `modul_ke` int(11) NOT NULL,
  `bagian_terakhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__1_php` (
  `id_1_php` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `modul_ke` int(11) NOT NULL,
  `bagian_terakhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__artikel` (
  `id_artikel` int(11) NOT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `judul` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `tags` varchar(150) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` enum('konsep','menunggu persetujuan','tidak disetujui','aktif','tidak aktif') NOT NULL,
  `tanggal_posting` date NOT NULL,
  `jam_posting` time NOT NULL,
  `terakhir_diperbaharui` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__atm` (
  `rajin_membuat_artikel` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `rajin_berdiskusi` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `banyak_berkontribusi` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `anggota_baru_paling_rajin` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='atm = anggota terbaik mingguan';

CREATE TABLE `__DB_PREFIX__diskusi` (
  `id_diskusi` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `tags` varchar(150) NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `tanggal_posting` date NOT NULL,
  `jam_posting` time NOT NULL,
  `terakhir_diperbaharui` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__donasi` (
  `id_donasi` int(11) NOT NULL,
  `pengguna` varchar(50) DEFAULT 'Anonim',
  `jumlah` int(11) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `__DB_PREFIX__dsjd` (
  `id_dsjd` int(11) NOT NULL,
  `id_jawaban` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__dsk_artikel` (
  `id_dsk_artikel` int(11) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__dsk_loker` (
  `id_dsk_loker` int(11) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__ds_artikel` (
  `id_ds_artikel` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__ds_diskusi` (
  `id_ds_diskusi` int(11) NOT NULL,
  `id_diskusi` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__ds_loker` (
  `id_ds_loker` int(11) NOT NULL,
  `id_loker` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__hof` (
  `id_hof` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `__DB_PREFIX__iklan` (
  `id_iklan` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `penempatan` varchar(100) NOT NULL,
  `link_tujuan` varchar(200) NOT NULL,
  `kontak_pengiklan` text NOT NULL,
  `jatuh_tempo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__j_diskusi` (
  `id_j_diskusi` int(11) NOT NULL,
  `id_diskusi` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `diblok` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__kategori` (
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `__DB_PREFIX__kategori` (`kategori`) VALUES
('Android'),
('Design'),
('Desktop'),
('Edukasi'),
('Game'),
('Hardware'),
('IOS'),
('Lain Lain'),
('Machine Learning'),
('Network'),
('Software'),
('Website');

CREATE TABLE `__DB_PREFIX__konfigurasi` (
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `github` varchar(100) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `versi` varchar(10) NOT NULL,
  `pemeliharaan` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__kustom_sertifikat` (
  `id_kustom_sertifikat` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `nama_sertifikat` varchar(100) NOT NULL,
  `link_sertifikat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `__DB_PREFIX__k_artikel` (
  `id_k_artikel` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `diblok` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__k_loker` (
  `id_k_loker` int(11) NOT NULL,
  `id_loker` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `diblok` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__link_iklan` (
  `id_link_iklan` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) NOT NULL,
  `premium` enum('N','Y') NOT NULL,
  `jumlah_lihat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__loker` (
  `id_loker` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `syarat_ketentuan` text NOT NULL,
  `nilai_tambah` text NOT NULL,
  `kirim_cv_ke` varchar(100) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `poster` varchar(100) DEFAULT NULL,
  `gaji_minimal` int(11) NOT NULL,
  `gaji_maksimal` int(11) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `status` enum('menunggu persetujuan','tidak disetujui','aktif','tidak aktif') NOT NULL,
  `tanggal_posting` date NOT NULL,
  `jam_posting` time NOT NULL,
  `terakhir_diperbaharui` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penginput` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__lupa_ks` (
  `id_lupa_ks` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__midtrans` (
  `kode` varchar(100) NOT NULL,
  `transaksi_id` varchar(100) NOT NULL,
  `tipe_pembayaran` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `__DB_PREFIX__notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `untuk` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `konten` text NOT NULL,
  `link` varchar(150) DEFAULT NULL,
  `tanggal_waktu` varchar(100) NOT NULL,
  `baru` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__pencapaian` (
  `id_pencapaian` int(11) NOT NULL,
  `nama_pencapaian` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tipe` enum('untuk jumlah posting','untuk jumlah kontribusi','untuk jumlah poin diskusi','untuk jumlah poin belajar','kalkulasi 3 jumlah','kustom') NOT NULL COMMENT 'kalkulasi 3 jumlah = jumlah_kontribusi + poin_diskusi + poin_belajar',
  `target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `__DB_PREFIX__pencapaian` (`id_pencapaian`, `nama_pencapaian`, `gambar`, `tipe`, `target`) VALUES
(11, 'Berhasil menempuh 100 poin belajar', 'ff994082ebf3069e3d74eb169dcf0a25_AlwaysNgoding.png', 'untuk jumlah poin belajar', 100),
(12, 'Berhasil menempuh 200 poin belajar', 'bd891849be8095234a682701591aacd0_AlwaysNgoding.png', 'untuk jumlah poin belajar', 200),
(13, 'Berhasil menempuh 300 poin belajar', 'c66782ff99c16343095c1058d65068c4_AlwaysNgoding.png', 'untuk jumlah poin belajar', 300),
(14, 'Berhasil menempuh 400 poin belajar', 'c96108b5f6d657d3d6dbcac1d4441493_AlwaysNgoding.png', 'untuk jumlah poin belajar', 400),
(15, 'Berhasil menempuh 550 poin belajar', 'ae30e8f1c373d1214905498606d9efd4_AlwaysNgoding.png', 'untuk jumlah poin belajar', 550),
(16, 'Berhasil menempuh 700 poin belajar', '4440bad404cada3230df40de7d6cd833_AlwaysNgoding.png', 'untuk jumlah poin belajar', 700),
(17, 'Berhasil menempuh 850 poin belajar', '8d3547049e5ccc6061370348826f09c3_AlwaysNgoding.png', 'untuk jumlah poin belajar', 850),
(18, 'Berhasil menempuh 1000 poin belajar', '8ad521abb6086dd3f3432ae3f4582716_AlwaysNgoding.png', 'untuk jumlah poin belajar', 1000),
(19, 'Berhasil menempuh 1200 poin belajar', 'f08430fa45632cc1ce77aa8955be9466_AlwaysNgoding.png', 'untuk jumlah poin belajar', 1200),
(20, 'Berhasil menempuh 1400 poin belajar', '2d22acec36ed54261520d7824260dfbe_AlwaysNgoding.png', 'untuk jumlah poin belajar', 1400),
(21, 'Berhasil menempuh 1600 poin belajar', '90212d994f59a7c1a9233b8c52f6373f_AlwaysNgoding.png', 'untuk jumlah poin belajar', 1600),
(22, 'Berhasil menempuh 1800 poin belajar', '04f3a6982d93b486bc1910524031541f_AlwaysNgoding.png', 'untuk jumlah poin belajar', 1800),
(23, 'Berhasil menempuh 2050 poin belajar', 'b3304fcfd747037577c2c37b18b94325_AlwaysNgoding.png', 'untuk jumlah poin belajar', 2050),
(24, 'Berhasil menempuh 2300 poin belajar', 'e3babebae7bb8ae5ccea053e5a6a116b_AlwaysNgoding.png', 'untuk jumlah poin belajar', 2300),
(25, 'Berhasil menempuh 2550 poin belajar', '377b64c8e095d3fcd75dc0ef7fe0f8c5_AlwaysNgoding.png', 'untuk jumlah poin belajar', 2550),
(26, 'Berhasil menempuh 3000 poin belajar', '6b7cc70bb3f259a009bb01d07a3a2147_AlwaysNgoding.png', 'untuk jumlah poin belajar', 3000),
(27, 'Berhasil memposting 3 artikel', '83141c84538e31d6299d8c4bbb5fb1dc_AlwaysNgoding.png', 'untuk jumlah posting', 3),
(28, 'Berhasil memposting 5 artikel', '3b55e93f342950de150c83f4b21e7ac0_AlwaysNgoding.png', 'untuk jumlah posting', 5),
(29, 'Berhasil memposting 10 artikel', 'f2ce6887d1f4ed9b91011adbc96a371b_AlwaysNgoding.png', 'untuk jumlah posting', 10),
(30, 'Berhasil memposting 15 artikel', '7c449442012622122cd386733582565d_AlwaysNgoding.png', 'untuk jumlah posting', 15),
(31, 'Berhasil memposting 20 artikel', '7866810d26b6e2cf9666a96f34bd9720_AlwaysNgoding.png', 'untuk jumlah posting', 20),
(32, 'Berhasil memposting 25 artikel', 'a64b21c40cc490348f291c0dccc84bff_AlwaysNgoding.png', 'untuk jumlah posting', 25),
(33, 'Berhasil memposting 30 artikel', 'd60710733d91093903ca5f0de29c108f_AlwaysNgoding.png', 'untuk jumlah posting', 30),
(34, 'Berhasil memposting 35 artikel', '41e8900f9ab2333e024c9980dd841bfb_AlwaysNgoding.png', 'untuk jumlah posting', 35),
(35, 'Berhasil memposting 40 artikel', 'c8b71043a8fa5c32e470a229f76a9e37_AlwaysNgoding.png', 'untuk jumlah posting', 40),
(36, 'Berhasil memposting 50 artikel', '79fcf8496e121cd2507324e67f8840e6_AlwaysNgoding.png', 'untuk jumlah posting', 50),
(37, 'Berhasil memposting 60 artikel', '65e5101645430c96085c797f94152fd5_AlwaysNgoding.png', 'untuk jumlah posting', 60),
(38, 'Berhasil memposting 70 artikel', '3165f36d367b59e31fb103259125dbe3_AlwaysNgoding.png', 'untuk jumlah posting', 70),
(39, 'Berhasil memposting 80 artikel', 'e26036c17894152abf5f7b4cc76b238d_AlwaysNgoding.png', 'untuk jumlah posting', 80),
(40, 'Berhasil memposting 100 artikel', 'e15a366f5ec2a21912edb020d6dd74da_AlwaysNgoding.png', 'untuk jumlah posting', 100),
(41, 'Berhasil memposting 125 artikel', '27f209176fb9e0bea495a9f1e9020cd2_AlwaysNgoding.png', 'untuk jumlah posting', 125),
(42, 'Berhasil memposting 150 artikel', '6d6fb5b568b43442ffe1cb7fc40ebae3_AlwaysNgoding.png', 'untuk jumlah posting', 150),
(43, 'Berhasil menempuh 5 jumlah kontribusi', '487f28b23793c514f3f006844170e1a4_AlwaysNgoding.png', 'untuk jumlah kontribusi', 5),
(44, 'Berhasil menempuh 10 jumlah kontribusi', 'd77933352add1ec40e6d0eba2d36757a_AlwaysNgoding.png', 'untuk jumlah kontribusi', 10),
(45, 'Berhasil menempuh 15 jumlah kontribusi', '65b3bca511c3af440b277597ab788fc6_AlwaysNgoding.png', 'untuk jumlah kontribusi', 15),
(46, 'Berhasil menempuh 20 jumlah kontribusi', '48d2d11f5247b745d41602aa38ba134b_AlwaysNgoding.png', 'untuk jumlah kontribusi', 20),
(47, 'Berhasil menempuh 25 jumlah kontribusi', '9be5ad67680bc9d6051911839946cf46_AlwaysNgoding.png', 'untuk jumlah kontribusi', 25),
(48, 'Berhasil menempuh 30 jumlah kontribusi', '33381257578d2d8b5cacbc958d35d6ae_AlwaysNgoding.png', 'untuk jumlah kontribusi', 30),
(49, 'Berhasil menempuh 40 jumlah kontribusi', '137dc79e9adb90e0d15f83861ce296ea_AlwaysNgoding.png', 'untuk jumlah kontribusi', 40),
(50, 'Berhasil menempuh 50 jumlah kontribusi', '96c63262a1ea452bd6a39f7c9ba8088b_AlwaysNgoding.png', 'untuk jumlah kontribusi', 50),
(51, 'Berhasil menempuh 60 jumlah kontribusi', '7f60cf49c0ab745ef8fb80ef0efe65f1_AlwaysNgoding.png', 'untuk jumlah kontribusi', 60),
(52, 'Berhasil menempuh 75 jumlah kontribusi', 'ef64054f54f81a3cdc4d60c0a6ae22f7_AlwaysNgoding.png', 'untuk jumlah kontribusi', 75),
(53, 'Berhasil menempuh 90 jumlah kontribusi', '24738871525d1d486d3dc2d559cfbe3f_AlwaysNgoding.png', 'untuk jumlah kontribusi', 90),
(54, 'Berhasil menempuh 105 jumlah kontribusi', 'aa1bf78b074e65d2da74d2eecce59c99_AlwaysNgoding.png', 'untuk jumlah kontribusi', 105),
(55, 'Berhasil menempuh 120 jumlah kontribusi', 'f7337db8a18cc6c82b1238a814da9ba5_AlwaysNgoding.png', 'untuk jumlah kontribusi', 120),
(56, 'Berhasil menempuh 140 jumlah kontribusi', 'bcd7adeff82435e551c486217d26d3cb_AlwaysNgoding.png', 'untuk jumlah kontribusi', 140),
(57, 'Berhasil menempuh 160 jumlah kontribusi', 'aa0ce27d8cae2ebbe5945585d7e665c8_AlwaysNgoding.png', 'untuk jumlah kontribusi', 160),
(58, 'Berhasil menempuh 200 jumlah kontribusi', '809d02727996b2a3d9ccb309b194b37f_AlwaysNgoding.png', 'untuk jumlah kontribusi', 200),
(59, 'Berhasil menempuh 5 poin diskusi', 'acf0204b57c5c7177ec9c5589b9aef93_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 5),
(60, 'Berhasil menempuh 10 poin diskusi', '6174748cd5c64e326b51239c1040deeb_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 10),
(61, 'Berhasil menempuh 15 poin diskusi', '377d81c1c94b7f88ed43d0e75f400477_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 15),
(62, 'Berhasil menempuh 20 poin diskusi', '2d6e020555bccfa42a5650a1abb8c35b_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 20),
(63, 'Berhasil menempuh 25 poin diskusi', '64c8eb55b7b5a7b3bfb8177195b8c3b5_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 25),
(64, 'Berhasil menempuh 30 poin diskusi', '79de3e84b3979624e57a4e3c4d0764ed_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 30),
(65, 'Berhasil menempuh 40 poin diskusi', '8fadb34e9ec79f3c7c9a7bcdca07aaf5_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 40),
(66, 'Berhasil menempuh 50 poin diskusi', 'ba246a1d6f3305f33e67aa82773837aa_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 50),
(67, 'Berhasil menempuh 60 poin diskusi', '6f092e32d10d7b3181389114ae18caef_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 60),
(68, 'Berhasil menempuh 75 poin diskusi', 'eb954b192f495caa31363616d2a35a05_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 75),
(69, 'Berhasil menempuh 90 poin diskusi', 'b7d3d7e11a2fe50f7a8f72a4d8c5820f_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 90),
(70, 'Berhasil menempuh 105 poin diskusi', 'fc88824afd1873ab495929aeb032fbe8_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 105),
(71, 'Berhasil menempuh 120 poin diskusi', '6f447f3d72bdacd8e2ae365f56483fab_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 120),
(72, 'Berhasil menempuh 140 poin diskusi', '24448b8bdb6e10491c18cb48edad1f31_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 140),
(73, 'Berhasil menempuh 160 poin diskusi', '25586eb91d9b30e3d6e4cf50bb712735_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 160),
(74, 'Berhasil menempuh 200 poin diskusi', 'cf07d8086c56ac7cfdf53bf402197678_AlwaysNgoding.png', 'untuk jumlah poin diskusi', 200),
(75, 'Berhasil menjadi anggota pertama yang menyelesaikan kelas HTML', 'cca421bbc917ac3fa9e5c28f493d2699_AlwaysNgoding.png', 'kustom', 1),
(76, 'Berhasil menjadi anggota pertama yang menyelesaikan kelas CSS', 'b13e5c9655e9716fd4123dfea612d0c4_AlwaysNgoding.png', 'kustom', 1),
(77, 'Berhasil menjadi anggota pertama yang menyelesaikan kelas PHP', 'deaa2a3ad6cae719f26954b3a5850391_AlwaysNgoding.png', 'kustom', 1),
(78, 'Berhasil menjadi anggota pertama yang menyelesaikan kelas MySQL', '432be96005b9d89853cc0c6d62305625_AlwaysNgoding.png', 'kustom', 1),
(79, 'Berhasil menjadi anggota pertama yang menyelesaikan kelas JavaScript', '550d7f417818fba1aae578b6b151c17a_AlwaysNgoding.png', 'kustom', 1);

CREATE TABLE `__DB_PREFIX__pengguna` (
  `nama_pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `kata_sandi` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `level` enum('anggota','admin','superadmin') NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `tentang` text,
  `alamat` text,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `aktif` enum('N','Y') NOT NULL,
  `tanggal_bergabung` date NOT NULL,
  `tanggal_terverifikasi` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website_pribadi` varchar(100) DEFAULT NULL,
  `akun_medsos` varchar(100) DEFAULT NULL,
  `jumlah_kontribusi` int(11) NOT NULL,
  `poin_diskusi` int(11) NOT NULL,
  `poin_belajar` int(11) NOT NULL,
  `terakhir_ubah_kata_sandi` timestamp NULL DEFAULT NULL,
  `terakhir_masuk` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DELIMITER $$

CREATE TRIGGER `__DB_PREFIX__init_pengguna` AFTER INSERT ON `__DB_PREFIX__pengguna` FOR EACH ROW BEGIN

INSERT INTO __DB_PREFIX__1_html VALUES
(NULL, NEW.nama_pengguna, 1, 1),
(NULL, NEW.nama_pengguna, 2, 1),
(NULL, NEW.nama_pengguna, 3, 1),
(NULL, NEW.nama_pengguna, 4, 1),
(NULL, NEW.nama_pengguna, 5, 1),
(NULL, NEW.nama_pengguna, 6, 1);

INSERT INTO __DB_PREFIX__1_css VALUES
(NULL, NEW.nama_pengguna, 1, 1),
(NULL, NEW.nama_pengguna, 2, 1),
(NULL, NEW.nama_pengguna, 3, 1),
(NULL, NEW.nama_pengguna, 4, 1),
(NULL, NEW.nama_pengguna, 5, 1),
(NULL, NEW.nama_pengguna, 6, 1),
(NULL, NEW.nama_pengguna, 7, 1),
(NULL, NEW.nama_pengguna, 8, 1);

INSERT INTO __DB_PREFIX__1_php VALUES
(NULL, NEW.nama_pengguna, 1, 1),
(NULL, NEW.nama_pengguna, 2, 1),
(NULL, NEW.nama_pengguna, 3, 1),
(NULL, NEW.nama_pengguna, 4, 1),
(NULL, NEW.nama_pengguna, 5, 1),
(NULL, NEW.nama_pengguna, 6, 1),
(NULL, NEW.nama_pengguna, 7, 1),
(NULL, NEW.nama_pengguna, 8, 1);

INSERT INTO __DB_PREFIX__1_mysql VALUES
(NULL, NEW.nama_pengguna, 1, 1),
(NULL, NEW.nama_pengguna, 2, 1),
(NULL, NEW.nama_pengguna, 3, 1),
(NULL, NEW.nama_pengguna, 4, 1),
(NULL, NEW.nama_pengguna, 5, 1),
(NULL, NEW.nama_pengguna, 6, 1);

END$$

DELIMITER ;

CREATE TABLE `__DB_PREFIX__persentase_1` (
`pengguna` varchar(50)
,`persentase_html` bigint(17) unsigned
,`persentase_css` bigint(17) unsigned
,`persentase_php` bigint(17) unsigned
,`persentase_mysql` bigint(17) unsigned
,`persentase_js` bigint(17) unsigned
);

CREATE TABLE `__DB_PREFIX__pyd` (
  `id_pyd` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='pyd = pengguna yang dibisukkan';

CREATE TABLE `__DB_PREFIX__p_pencapaian` (
  `id_p_pencapaian` int(11) NOT NULL,
  `id_pencapaian` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tanggal_tercapai` date NOT NULL,
  `jam_tercapai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__p_premium` (
  `id_p_premium` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `jatuh_tempo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__p_sertifikat` (
  `id_p_sertifikat` int(11) NOT NULL,
  `id_sertifikat` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tanggal_memperoleh` date NOT NULL,
  `jam_memperoleh` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `konten` text NOT NULL,
  `tanggal_waktu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `nama_sertifikat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `__DB_PREFIX__sertifikat` (`id_sertifikat`, `nama_sertifikat`) VALUES
(2, 'HTML'),
(3, 'CSS'),
(4, 'PHP'),
(6, 'MySQL'),
(7, 'JavaScript');

CREATE TABLE `__DB_PREFIX__slhd` (
  `id_slhd` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `modul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='slhd = Status Lihat Halaman Donasi';

CREATE TABLE `__DB_PREFIX__suara` (
  `id_suara` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `isi` text NOT NULL,
  `status` enum('aktif','tidak aktif','menunggu persetujuan','tidak disetujui') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__tags` (
  `tags` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__token_lks` (
  `id_token_lks` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__verif_akun` (
  `id_verif_akun` int(11) NOT NULL,
  `pengguna` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `__DB_PREFIX__persentase_1_css` (
`pengguna` varchar(50)
,`persentase` decimal(39,4)
);

CREATE TABLE `__DB_PREFIX__persentase_1_html` (
`pengguna` varchar(50)
,`persentase` decimal(39,4)
);

CREATE TABLE `__DB_PREFIX__persentase_1_js` (
`pengguna` varchar(50)
,`persentase` decimal(39,4)
);

CREATE TABLE `__DB_PREFIX__persentase_1_mysql` (
`pengguna` varchar(50)
,`persentase` decimal(16,0)
);

CREATE TABLE `__DB_PREFIX__persentase_1_php` (
`pengguna` varchar(50)
,`persentase` decimal(39,4)
);

CREATE TABLE `__DB_PREFIX__untuk_atm_artikel` (
`nama_pengguna` varchar(50)
,`jumlah` bigint(21)
);

CREATE TABLE `__DB_PREFIX__untuk_atm_j_diskusi` (
`nama_pengguna` varchar(50)
,`jumlah` bigint(21)
);

CREATE TABLE `__DB_PREFIX__untuk_atm_k_artikel` (
`nama_pengguna` varchar(50)
,`jumlah` bigint(21)
);

CREATE TABLE `__DB_PREFIX__untuk_atm_k_loker` (
`nama_pengguna` varchar(50)
,`jumlah` bigint(21)
);

CREATE TABLE `__DB_PREFIX__untuk_atm_z_bt_css` (
`nama_pengguna` varchar(50)
,`jumlah` decimal(32,0)
);

CREATE TABLE `__DB_PREFIX__untuk_atm_z_bt_html` (
`nama_pengguna` varchar(50)
,`jumlah` decimal(32,0)
);

CREATE TABLE `__DB_PREFIX__untuk_atm_z_bt_jquery` (
`nama_pengguna` varchar(50)
,`jumlah` decimal(32,0)
);

CREATE TABLE `__DB_PREFIX__untuk_atm_z_bt_js` (
`nama_pengguna` varchar(50)
,`jumlah` decimal(32,0)
);

CREATE TABLE `__DB_PREFIX__untuk_atm_z_bt_mysql` (
`nama_pengguna` varchar(50)
,`jumlah` decimal(32,0)
);

CREATE TABLE `__DB_PREFIX__untuk_atm_z_bt_php` (
`nama_pengguna` varchar(50)
,`jumlah` decimal(32,0)
);

DROP TABLE IF EXISTS `__DB_PREFIX__persentase_1`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__persentase_1`  AS SELECT `pengguna`.`nama_pengguna` AS `pengguna`, cast(floor(if(isnull(`html`.`persentase`),0,`html`.`persentase`)) as unsigned) AS `persentase_html`, cast(floor(if(isnull(`css`.`persentase`),0,`css`.`persentase`)) as unsigned) AS `persentase_css`, cast(floor(if(isnull(`php`.`persentase`),0,`php`.`persentase`)) as unsigned) AS `persentase_php`, cast(floor(if(isnull(`mysql`.`persentase`),0,`mysql`.`persentase`)) as unsigned) AS `persentase_mysql`, cast(floor(if(isnull(`js`.`persentase`),0,`js`.`persentase`)) as unsigned) AS `persentase_js` FROM (((((`__DB_PREFIX__pengguna` `pengguna` left join `__DB_PREFIX__persentase_1_html` `html` on((convert(`pengguna`.`nama_pengguna` using utf8mb4) = convert(`html`.`pengguna` using utf8mb4)))) left join `__DB_PREFIX__persentase_1_css` `css` on((convert(`pengguna`.`nama_pengguna` using utf8mb4) = convert(`css`.`pengguna` using utf8mb4)))) left join `__DB_PREFIX__persentase_1_php` `php` on((convert(`pengguna`.`nama_pengguna` using utf8mb4) = convert(`php`.`pengguna` using utf8mb4)))) left join `__DB_PREFIX__persentase_1_mysql` `mysql` on((convert(`pengguna`.`nama_pengguna` using utf8mb4) = convert(`mysql`.`pengguna` using utf8mb4)))) left join `__DB_PREFIX__persentase_1_js` `js` on((convert(`pengguna`.`nama_pengguna` using utf8mb4) = convert(`js`.`pengguna` using utf8mb4))));

DROP TABLE IF EXISTS `__DB_PREFIX__persentase_1_css`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__persentase_1_css`  AS SELECT `css`.`pengguna` AS `pengguna`, if(((select `__DB_PREFIX__1_css`.`bagian_terakhir` from `__DB_PREFIX__1_css` where ((`__DB_PREFIX__1_css`.`modul_ke` = 1) and (`__DB_PREFIX__1_css`.`pengguna` = `css`.`pengguna`))) = 1),0,((sum(`css`.`bagian_terakhir`) / 195) * 100)) AS `persentase` FROM `__DB_PREFIX__1_css` AS `css` GROUP BY `css`.`pengguna`;

DROP TABLE IF EXISTS `__DB_PREFIX__persentase_1_html`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__persentase_1_html`  AS SELECT `html`.`pengguna` AS `pengguna`, if(((select `__DB_PREFIX__1_html`.`bagian_terakhir` from `__DB_PREFIX__1_html` where ((`__DB_PREFIX__1_html`.`modul_ke` = 1) and (`__DB_PREFIX__1_html`.`pengguna` = `html`.`pengguna`))) = 1),0,((sum(`html`.`bagian_terakhir`) / 97) * 100)) AS `persentase` FROM `__DB_PREFIX__1_html` AS `html` GROUP BY `html`.`pengguna`;

DROP TABLE IF EXISTS `__DB_PREFIX__persentase_1_js`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__persentase_1_js`  AS SELECT `js`.`pengguna` AS `pengguna`, if(((select `__DB_PREFIX__1_js`.`bagian_terakhir` from `__DB_PREFIX__1_js` where ((`__DB_PREFIX__1_js`.`modul_ke` = 1) and (`__DB_PREFIX__1_js`.`pengguna` = `js`.`pengguna`))) = 1),0,((sum(`js`.`bagian_terakhir`) / 214) * 100)) AS `persentase` FROM `__DB_PREFIX__1_js` AS `js` GROUP BY `js`.`pengguna`;

DROP TABLE IF EXISTS `__DB_PREFIX__persentase_1_mysql`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__persentase_1_mysql`  AS SELECT `mysql`.`pengguna` AS `pengguna`, if(((select `__DB_PREFIX__1_mysql`.`bagian_terakhir` from `__DB_PREFIX__1_mysql` where ((`__DB_PREFIX__1_mysql`.`modul_ke` = 1) and (`__DB_PREFIX__1_mysql`.`pengguna` = `mysql`.`pengguna`))) = 1),0,ceiling(((sum(`mysql`.`bagian_terakhir`) / 149) * 100))) AS `persentase` FROM `__DB_PREFIX__1_mysql` AS `mysql` GROUP BY `mysql`.`pengguna`;

DROP TABLE IF EXISTS `__DB_PREFIX__persentase_1_php`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__persentase_1_php`  AS SELECT `php`.`pengguna` AS `pengguna`, if(((select `__DB_PREFIX__1_php`.`bagian_terakhir` from `__DB_PREFIX__1_php` where ((`__DB_PREFIX__1_php`.`modul_ke` = 1) and (`__DB_PREFIX__1_php`.`pengguna` = `php`.`pengguna`))) = 1),0,((sum(`php`.`bagian_terakhir`) / 182) * 100)) AS `persentase` FROM `__DB_PREFIX__1_php` AS `php` GROUP BY `php`.`pengguna`;

DROP TABLE IF EXISTS `__DB_PREFIX__untuk_atm_artikel`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__untuk_atm_artikel`  AS SELECT `p`.`nama_pengguna` AS `nama_pengguna`, count(`a`.`id_artikel`) AS `jumlah` FROM (`__DB_PREFIX__pengguna` `p` left join `__DB_PREFIX__artikel` `a` on((`p`.`nama_pengguna` = `a`.`penginput`))) WHERE ((`a`.`status` = 'aktif') AND (`a`.`tanggal_posting` >= (now() - interval 1 week))) GROUP BY `p`.`nama_pengguna` ORDER BY count(`a`.`id_artikel`) DESC;

DROP TABLE IF EXISTS `__DB_PREFIX__untuk_atm_j_diskusi`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__untuk_atm_j_diskusi`  AS SELECT `p`.`nama_pengguna` AS `nama_pengguna`, count(`jd`.`id_j_diskusi`) AS `jumlah` FROM (`__DB_PREFIX__pengguna` `p` left join `__DB_PREFIX__j_diskusi` `jd` on((`p`.`nama_pengguna` = `jd`.`pengguna`))) WHERE ((`jd`.`diblok` = 'N') AND (`jd`.`tanggal` >= (now() - interval 1 week))) GROUP BY `p`.`nama_pengguna` ORDER BY count(`jd`.`id_j_diskusi`) DESC;

DROP TABLE IF EXISTS `__DB_PREFIX__untuk_atm_k_artikel`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__untuk_atm_k_artikel`  AS SELECT `p`.`nama_pengguna` AS `nama_pengguna`, count(`ka`.`id_k_artikel`) AS `jumlah` FROM (`__DB_PREFIX__pengguna` `p` left join `__DB_PREFIX__k_artikel` `ka` on((`p`.`nama_pengguna` = `ka`.`pengguna`))) WHERE ((`ka`.`diblok` = 'N') AND (`ka`.`tanggal` >= (now() - interval 1 week))) GROUP BY `p`.`nama_pengguna` ORDER BY count(`ka`.`id_k_artikel`) DESC;

DROP TABLE IF EXISTS `__DB_PREFIX__untuk_atm_k_loker`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__untuk_atm_k_loker`  AS SELECT `p`.`nama_pengguna` AS `nama_pengguna`, count(`kl`.`id_k_loker`) AS `jumlah` FROM (`__DB_PREFIX__pengguna` `p` left join `__DB_PREFIX__k_loker` `kl` on((`p`.`nama_pengguna` = `kl`.`pengguna`))) WHERE ((`kl`.`diblok` = 'N') AND (`kl`.`tanggal` >= (now() - interval 1 week))) GROUP BY `p`.`nama_pengguna` ORDER BY count(`kl`.`id_k_loker`) DESC;

DROP TABLE IF EXISTS `__DB_PREFIX__untuk_atm_z_bt_css`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__untuk_atm_z_bt_css`  AS SELECT `p`.`nama_pengguna` AS `nama_pengguna`, sum(`css`.`bagian_terakhir`) AS `jumlah` FROM (`__DB_PREFIX__pengguna` `p` left join `__DB_PREFIX__1_css` `css` on((`p`.`nama_pengguna` = `css`.`pengguna`))) WHERE (`p`.`tanggal_bergabung` >= (now() - interval 1 week)) GROUP BY `p`.`nama_pengguna` ORDER BY sum(`css`.`bagian_terakhir`) DESC;

DROP TABLE IF EXISTS `__DB_PREFIX__untuk_atm_z_bt_html`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__untuk_atm_z_bt_html`  AS SELECT `p`.`nama_pengguna` AS `nama_pengguna`, sum(`html`.`bagian_terakhir`) AS `jumlah` FROM (`__DB_PREFIX__pengguna` `p` left join `__DB_PREFIX__1_html` `html` on((`p`.`nama_pengguna` = `html`.`pengguna`))) WHERE (`p`.`tanggal_bergabung` >= (now() - interval 1 week)) GROUP BY `p`.`nama_pengguna` ORDER BY sum(`html`.`bagian_terakhir`) DESC;

DROP TABLE IF EXISTS `__DB_PREFIX__untuk_atm_z_bt_jquery`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__untuk_atm_z_bt_jquery`  AS SELECT `p`.`nama_pengguna` AS `nama_pengguna`, sum(`jquery`.`bagian_terakhir`) AS `jumlah` FROM (`__DB_PREFIX__pengguna` `p` left join `__DB_PREFIX__1_jquery` `jquery` on((`p`.`nama_pengguna` = `jquery`.`pengguna`))) WHERE (`p`.`tanggal_bergabung` >= (now() - interval 1 week)) GROUP BY `p`.`nama_pengguna` ORDER BY sum(`jquery`.`bagian_terakhir`) DESC;

DROP TABLE IF EXISTS `__DB_PREFIX__untuk_atm_z_bt_js`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__untuk_atm_z_bt_js`  AS SELECT `p`.`nama_pengguna` AS `nama_pengguna`, sum(`js`.`bagian_terakhir`) AS `jumlah` FROM (`__DB_PREFIX__pengguna` `p` left join `__DB_PREFIX__1_js` `js` on((`p`.`nama_pengguna` = `js`.`pengguna`))) WHERE (`p`.`tanggal_bergabung` >= (now() - interval 1 week)) GROUP BY `p`.`nama_pengguna` ORDER BY sum(`js`.`bagian_terakhir`) DESC;

DROP TABLE IF EXISTS `__DB_PREFIX__untuk_atm_z_bt_mysql`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__untuk_atm_z_bt_mysql`  AS SELECT `p`.`nama_pengguna` AS `nama_pengguna`, sum(`mysql`.`bagian_terakhir`) AS `jumlah` FROM (`__DB_PREFIX__pengguna` `p` left join `__DB_PREFIX__1_mysql` `mysql` on((`p`.`nama_pengguna` = `mysql`.`pengguna`))) WHERE (`p`.`tanggal_bergabung` >= (now() - interval 1 week)) GROUP BY `p`.`nama_pengguna` ORDER BY sum(`mysql`.`bagian_terakhir`) DESC;

DROP TABLE IF EXISTS `__DB_PREFIX__untuk_atm_z_bt_php`;

CREATE ALGORITHM=UNDEFINED DEFINER=CURRENT_USER SQL SECURITY DEFINER VIEW `__DB_PREFIX__untuk_atm_z_bt_php`  AS SELECT `p`.`nama_pengguna` AS `nama_pengguna`, sum(`php`.`bagian_terakhir`) AS `jumlah` FROM (`__DB_PREFIX__pengguna` `p` left join `__DB_PREFIX__1_php` `php` on((`p`.`nama_pengguna` = `php`.`pengguna`))) WHERE (`p`.`tanggal_bergabung` >= (now() - interval 1 week)) GROUP BY `p`.`nama_pengguna` ORDER BY sum(`php`.`bagian_terakhir`) DESC;

ALTER TABLE `__DB_PREFIX__1_css`
  ADD PRIMARY KEY (`id_1_css`),
  ADD KEY `pengguna` (`pengguna`);

ALTER TABLE `__DB_PREFIX__1_html`
  ADD PRIMARY KEY (`id_1_html`),
  ADD KEY `nama_pengguna` (`pengguna`),
  ADD KEY `id_1_html` (`id_1_html`);

ALTER TABLE `__DB_PREFIX__1_jquery`
  ADD PRIMARY KEY (`id_1_jquery`),
  ADD KEY `pengguna` (`pengguna`);

ALTER TABLE `__DB_PREFIX__1_js`
  ADD PRIMARY KEY (`id_1_js`),
  ADD KEY `pengguna` (`pengguna`);

ALTER TABLE `__DB_PREFIX__1_mysql`
  ADD PRIMARY KEY (`id_1_mysql`),
  ADD KEY `pengguna` (`pengguna`);

ALTER TABLE `__DB_PREFIX__1_php`
  ADD PRIMARY KEY (`id_1_php`),
  ADD KEY `pengguna` (`pengguna`);

ALTER TABLE `__DB_PREFIX__artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `penginput` (`penginput`),
  ADD KEY `judul` (`judul`),
  ADD KEY `tags` (`tags`),
  ADD KEY `kategori` (`kategori`),
  ADD KEY `status` (`status`),
  ADD KEY `tanggal_posting` (`tanggal_posting`),
  ADD KEY `id_artikel` (`id_artikel`);

ALTER TABLE `__DB_PREFIX__atm`
  ADD KEY `anggota_baru_paling_rajin` (`anggota_baru_paling_rajin`),
  ADD KEY `banyak_berkontribusi` (`banyak_berkontribusi`),
  ADD KEY `rajin_membantu` (`rajin_berdiskusi`),
  ADD KEY `rajin_membuat_artikel` (`rajin_membuat_artikel`);

ALTER TABLE `__DB_PREFIX__diskusi`
  ADD PRIMARY KEY (`id_diskusi`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `penginput` (`penginput`),
  ADD KEY `id_diskusi` (`id_diskusi`),
  ADD KEY `judul` (`judul`),
  ADD KEY `tags` (`tags`),
  ADD KEY `status` (`status`),
  ADD KEY `tanggal_posting` (`tanggal_posting`);

ALTER TABLE `__DB_PREFIX__donasi`
  ADD PRIMARY KEY (`id_donasi`);

ALTER TABLE `__DB_PREFIX__dsjd`
  ADD PRIMARY KEY (`id_dsjd`),
  ADD KEY `tb_dsjd_ibfk_1` (`id_jawaban`),
  ADD KEY `pengguna` (`pengguna`),
  ADD KEY `id_dsjd` (`id_dsjd`),
  ADD KEY `id_jawaban` (`id_jawaban`),
  ADD KEY `tanggal` (`tanggal`);

ALTER TABLE `__DB_PREFIX__dsk_artikel`
  ADD PRIMARY KEY (`id_dsk_artikel`),
  ADD KEY `tb_dsk_artikel_ibfk_1` (`id_komentar`),
  ADD KEY `pengguna` (`pengguna`),
  ADD KEY `id_dsk_artikel` (`id_dsk_artikel`),
  ADD KEY `id_komentar` (`id_komentar`),
  ADD KEY `tanggal` (`tanggal`);

ALTER TABLE `__DB_PREFIX__dsk_loker`
  ADD PRIMARY KEY (`id_dsk_loker`),
  ADD KEY `tb_dsk_loker_ibfk_1` (`id_komentar`),
  ADD KEY `pengguna` (`pengguna`),
  ADD KEY `id_dsk_loker` (`id_dsk_loker`),
  ADD KEY `id_komentar` (`id_komentar`),
  ADD KEY `tanggal` (`tanggal`);

ALTER TABLE `__DB_PREFIX__ds_artikel`
  ADD PRIMARY KEY (`id_ds_artikel`),
  ADD KEY `tb_ds_artikel_ibfk_1` (`id_artikel`),
  ADD KEY `id_ds_artikel` (`id_ds_artikel`),
  ADD KEY `id_artikel` (`id_artikel`),
  ADD KEY `pengguna_2` (`pengguna`),
  ADD KEY `tanggal` (`tanggal`);

ALTER TABLE `__DB_PREFIX__ds_diskusi`
  ADD PRIMARY KEY (`id_ds_diskusi`),
  ADD KEY `tb_ds_diskusi_ibfk_1` (`id_diskusi`),
  ADD KEY `pengguna` (`pengguna`),
  ADD KEY `id_ds_diskusi` (`id_ds_diskusi`),
  ADD KEY `id_diskusi` (`id_diskusi`),
  ADD KEY `tanggal` (`tanggal`);

ALTER TABLE `__DB_PREFIX__ds_loker`
  ADD PRIMARY KEY (`id_ds_loker`),
  ADD KEY `tb_ds_loker_ibfk_1` (`id_loker`),
  ADD KEY `pengguna` (`pengguna`),
  ADD KEY `id_ds_loker` (`id_ds_loker`),
  ADD KEY `id_loker` (`id_loker`),
  ADD KEY `tanggal` (`tanggal`);

ALTER TABLE `__DB_PREFIX__hof`
  ADD PRIMARY KEY (`id_hof`);

ALTER TABLE `__DB_PREFIX__iklan`
  ADD PRIMARY KEY (`id_iklan`),
  ADD KEY `jatuh_tempo` (`jatuh_tempo`),
  ADD KEY `id_iklan` (`id_iklan`);

ALTER TABLE `__DB_PREFIX__j_diskusi`
  ADD PRIMARY KEY (`id_j_diskusi`),
  ADD KEY `tb_j_diskusi_ibfk_1` (`id_diskusi`),
  ADD KEY `pengguna` (`pengguna`),
  ADD KEY `id_j_diskusi` (`id_j_diskusi`),
  ADD KEY `id_diskusi` (`id_diskusi`),
  ADD KEY `diblok` (`diblok`),
  ADD KEY `tanggal` (`tanggal`);

ALTER TABLE `__DB_PREFIX__kategori`
  ADD PRIMARY KEY (`kategori`),
  ADD KEY `kategori` (`kategori`);

ALTER TABLE `__DB_PREFIX__kustom_sertifikat`
  ADD PRIMARY KEY (`id_kustom_sertifikat`);

ALTER TABLE `__DB_PREFIX__k_artikel`
  ADD PRIMARY KEY (`id_k_artikel`),
  ADD KEY `tb_k_artikel_ibfk_1` (`id_artikel`),
  ADD KEY `pengguna` (`pengguna`),
  ADD KEY `id_k_artikel` (`id_k_artikel`),
  ADD KEY `id_artikel` (`id_artikel`),
  ADD KEY `tanggal` (`tanggal`),
  ADD KEY `diblok` (`diblok`);

ALTER TABLE `__DB_PREFIX__k_loker`
  ADD PRIMARY KEY (`id_k_loker`),
  ADD KEY `tb_k_loker_ibfk_1` (`id_loker`),
  ADD KEY `pengguna` (`pengguna`),
  ADD KEY `id_k_loker` (`id_k_loker`),
  ADD KEY `id_loker` (`id_loker`),
  ADD KEY `tanggal` (`tanggal`),
  ADD KEY `diblok` (`diblok`);

ALTER TABLE `__DB_PREFIX__link_iklan`
  ADD PRIMARY KEY (`id_link_iklan`);

ALTER TABLE `__DB_PREFIX__loker`
  ADD PRIMARY KEY (`id_loker`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `penginput` (`penginput`),
  ADD KEY `id_loker` (`id_loker`),
  ADD KEY `nama_perusahaan` (`nama_perusahaan`),
  ADD KEY `posisi` (`posisi`),
  ADD KEY `lokasi` (`lokasi`),
  ADD KEY `status` (`status`),
  ADD KEY `jatuh_tempo` (`jatuh_tempo`),
  ADD KEY `tanggal_posting` (`tanggal_posting`);

ALTER TABLE `__DB_PREFIX__lupa_ks`
  ADD PRIMARY KEY (`id_lupa_ks`),
  ADD KEY `email` (`email`),
  ADD KEY `id_lupa_ks` (`id_lupa_ks`),
  ADD KEY `kadaluarsa` (`kadaluarsa`);

ALTER TABLE `__DB_PREFIX__midtrans`
  ADD PRIMARY KEY (`kode`);

ALTER TABLE `__DB_PREFIX__notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `untuk` (`untuk`),
  ADD KEY `id_notifikasi` (`id_notifikasi`),
  ADD KEY `baru` (`baru`);

ALTER TABLE `__DB_PREFIX__pencapaian`
  ADD PRIMARY KEY (`id_pencapaian`),
  ADD KEY `id_pencapaian` (`id_pencapaian`) USING BTREE;

ALTER TABLE `__DB_PREFIX__pengguna`
  ADD PRIMARY KEY (`nama_pengguna`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `nama_pengguna` (`nama_pengguna`),
  ADD KEY `poin_diskusi` (`poin_diskusi`),
  ADD KEY `poin_belajar` (`poin_belajar`),
  ADD KEY `jumlah_kontribusi` (`jumlah_kontribusi`);

ALTER TABLE `__DB_PREFIX__pyd`
  ADD PRIMARY KEY (`id_pyd`),
  ADD KEY `pengguna` (`pengguna`);

ALTER TABLE `__DB_PREFIX__p_pencapaian`
  ADD PRIMARY KEY (`id_p_pencapaian`),
  ADD KEY `id_p_pencapaian` (`id_p_pencapaian`),
  ADD KEY `id_pencapaian` (`id_pencapaian`),
  ADD KEY `pengguna` (`pengguna`);

ALTER TABLE `__DB_PREFIX__p_premium`
  ADD PRIMARY KEY (`id_p_premium`),
  ADD KEY `id_p_premium` (`id_p_premium`),
  ADD KEY `jatuh_tempo` (`jatuh_tempo`),
  ADD KEY `pengguna` (`pengguna`);

ALTER TABLE `__DB_PREFIX__p_sertifikat`
  ADD PRIMARY KEY (`id_p_sertifikat`),
  ADD KEY `id_p_sertifikat` (`id_p_sertifikat`),
  ADD KEY `id_sertifikat` (`id_sertifikat`),
  ADD KEY `tanggal_memperoleh` (`tanggal_memperoleh`),
  ADD KEY `jam_memperoleh` (`jam_memperoleh`),
  ADD KEY `pengguna` (`pengguna`);

ALTER TABLE `__DB_PREFIX__riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `pengguna` (`pengguna`),
  ADD KEY `id_riwayat` (`id_riwayat`);

ALTER TABLE `__DB_PREFIX__sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`),
  ADD KEY `id_sertifikat` (`id_sertifikat`);

ALTER TABLE `__DB_PREFIX__slhd`
  ADD PRIMARY KEY (`id_slhd`);

ALTER TABLE `__DB_PREFIX__suara`
  ADD PRIMARY KEY (`id_suara`),
  ADD KEY `pengguna` (`pengguna`),
  ADD KEY `id_suara` (`id_suara`),
  ADD KEY `status` (`status`);

ALTER TABLE `__DB_PREFIX__tags`
  ADD PRIMARY KEY (`tags`),
  ADD KEY `tags` (`tags`);

ALTER TABLE `__DB_PREFIX__token_lks`
  ADD PRIMARY KEY (`id_token_lks`),
  ADD KEY `pengguna` (`pengguna`);

ALTER TABLE `__DB_PREFIX__verif_akun`
  ADD PRIMARY KEY (`id_verif_akun`),
  ADD KEY `pengguna` (`pengguna`);

ALTER TABLE `__DB_PREFIX__1_css`
  MODIFY `id_1_css` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__1_html`
  MODIFY `id_1_html` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__1_jquery`
  MODIFY `id_1_jquery` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__1_js`
  MODIFY `id_1_js` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__1_mysql`
  MODIFY `id_1_mysql` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__1_php`
  MODIFY `id_1_php` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__diskusi`
  MODIFY `id_diskusi` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__dsjd`
  MODIFY `id_dsjd` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__dsk_artikel`
  MODIFY `id_dsk_artikel` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__dsk_loker`
  MODIFY `id_dsk_loker` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__ds_artikel`
  MODIFY `id_ds_artikel` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__ds_diskusi`
  MODIFY `id_ds_diskusi` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__ds_loker`
  MODIFY `id_ds_loker` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__hof`
  MODIFY `id_hof` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__iklan`
  MODIFY `id_iklan` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__j_diskusi`
  MODIFY `id_j_diskusi` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__kustom_sertifikat`
  MODIFY `id_kustom_sertifikat` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__k_artikel`
  MODIFY `id_k_artikel` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__k_loker`
  MODIFY `id_k_loker` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__link_iklan`
  MODIFY `id_link_iklan` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__loker`
  MODIFY `id_loker` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__lupa_ks`
  MODIFY `id_lupa_ks` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__pencapaian`
  MODIFY `id_pencapaian` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__pyd`
  MODIFY `id_pyd` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__p_pencapaian`
  MODIFY `id_p_pencapaian` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__p_premium`
  MODIFY `id_p_premium` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__p_sertifikat`
  MODIFY `id_p_sertifikat` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__slhd`
  MODIFY `id_slhd` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__suara`
  MODIFY `id_suara` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__token_lks`
  MODIFY `id_token_lks` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__verif_akun`
  MODIFY `id_verif_akun` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `__DB_PREFIX__1_css`
  ADD CONSTRAINT `__DB_PREFIX__1_css_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__1_html`
  ADD CONSTRAINT `__DB_PREFIX__1_html_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__1_jquery`
  ADD CONSTRAINT `__DB_PREFIX__1_jquery_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__1_js`
  ADD CONSTRAINT `__DB_PREFIX__1_js_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__1_mysql`
  ADD CONSTRAINT `__DB_PREFIX__1_mysql_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__1_php`
  ADD CONSTRAINT `__DB_PREFIX__1_php_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__artikel`
  ADD CONSTRAINT `__DB_PREFIX__artikel_ibfk_1` FOREIGN KEY (`penginput`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__atm`
  ADD CONSTRAINT `__DB_PREFIX__atm_ibfk_1` FOREIGN KEY (`anggota_baru_paling_rajin`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE SET NULL,
  ADD CONSTRAINT `__DB_PREFIX__atm_ibfk_2` FOREIGN KEY (`banyak_berkontribusi`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE SET NULL,
  ADD CONSTRAINT `__DB_PREFIX__atm_ibfk_3` FOREIGN KEY (`rajin_berdiskusi`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE SET NULL,
  ADD CONSTRAINT `__DB_PREFIX__atm_ibfk_4` FOREIGN KEY (`rajin_membuat_artikel`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE SET NULL;

ALTER TABLE `__DB_PREFIX__diskusi`
  ADD CONSTRAINT `__DB_PREFIX__diskusi_ibfk_1` FOREIGN KEY (`penginput`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__dsjd`
  ADD CONSTRAINT `__DB_PREFIX__dsjd_ibfk_1` FOREIGN KEY (`id_jawaban`) REFERENCES `__DB_PREFIX__j_diskusi` (`id_j_diskusi`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `__DB_PREFIX__dsjd_ibfk_2` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__dsk_artikel`
  ADD CONSTRAINT `__DB_PREFIX__dsk_artikel_ibfk_1` FOREIGN KEY (`id_komentar`) REFERENCES `__DB_PREFIX__k_artikel` (`id_k_artikel`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `__DB_PREFIX__dsk_artikel_ibfk_2` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__dsk_loker`
  ADD CONSTRAINT `__DB_PREFIX__dsk_loker_ibfk_1` FOREIGN KEY (`id_komentar`) REFERENCES `__DB_PREFIX__k_loker` (`id_k_loker`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `__DB_PREFIX__dsk_loker_ibfk_2` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__ds_artikel`
  ADD CONSTRAINT `__DB_PREFIX__ds_artikel_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `__DB_PREFIX__artikel` (`id_artikel`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `__DB_PREFIX__ds_artikel_ibfk_2` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__ds_diskusi`
  ADD CONSTRAINT `__DB_PREFIX__ds_diskusi_ibfk_1` FOREIGN KEY (`id_diskusi`) REFERENCES `__DB_PREFIX__diskusi` (`id_diskusi`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `__DB_PREFIX__ds_diskusi_ibfk_2` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__ds_loker`
  ADD CONSTRAINT `__DB_PREFIX__ds_loker_ibfk_1` FOREIGN KEY (`id_loker`) REFERENCES `__DB_PREFIX__loker` (`id_loker`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `__DB_PREFIX__ds_loker_ibfk_2` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__j_diskusi`
  ADD CONSTRAINT `__DB_PREFIX__j_diskusi_ibfk_1` FOREIGN KEY (`id_diskusi`) REFERENCES `__DB_PREFIX__diskusi` (`id_diskusi`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `__DB_PREFIX__j_diskusi_ibfk_2` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__k_artikel`
  ADD CONSTRAINT `__DB_PREFIX__k_artikel_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `__DB_PREFIX__artikel` (`id_artikel`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `__DB_PREFIX__k_artikel_ibfk_2` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__k_loker`
  ADD CONSTRAINT `__DB_PREFIX__k_loker_ibfk_1` FOREIGN KEY (`id_loker`) REFERENCES `__DB_PREFIX__loker` (`id_loker`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `__DB_PREFIX__k_loker_ibfk_2` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__loker`
  ADD CONSTRAINT `__DB_PREFIX__loker_ibfk_1` FOREIGN KEY (`penginput`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__lupa_ks`
  ADD CONSTRAINT `__DB_PREFIX__lupa_ks_ibfk_1` FOREIGN KEY (`email`) REFERENCES `__DB_PREFIX__pengguna` (`email`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__notifikasi`
  ADD CONSTRAINT `__DB_PREFIX__notifikasi_ibfk_1` FOREIGN KEY (`untuk`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__pyd`
  ADD CONSTRAINT `__DB_PREFIX__pyd_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__p_pencapaian`
  ADD CONSTRAINT `__DB_PREFIX__p_pencapaian_ibfk_1` FOREIGN KEY (`id_pencapaian`) REFERENCES `__DB_PREFIX__pencapaian` (`id_pencapaian`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `__DB_PREFIX__p_pencapaian_ibfk_2` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE;

ALTER TABLE `__DB_PREFIX__p_premium`
  ADD CONSTRAINT `__DB_PREFIX__p_premium_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__p_sertifikat`
  ADD CONSTRAINT `__DB_PREFIX__p_sertifikat_ibfk_1` FOREIGN KEY (`id_sertifikat`) REFERENCES `__DB_PREFIX__sertifikat` (`id_sertifikat`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `__DB_PREFIX__p_sertifikat_ibfk_2` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__riwayat`
  ADD CONSTRAINT `__DB_PREFIX__riwayat_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE SET NULL ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__suara`
  ADD CONSTRAINT `__DB_PREFIX__suara_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__token_lks`
  ADD CONSTRAINT `__DB_PREFIX__token_lks_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `__DB_PREFIX__verif_akun`
  ADD CONSTRAINT `__DB_PREFIX__verif_akun_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `__DB_PREFIX__pengguna` (`nama_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- Synthetic local settings and the only application account.
INSERT INTO `__DB_PREFIX__konfigurasi`
(`facebook`, `twitter`, `instagram`, `github`, `whatsapp`, `email`, `youtube`, `versi`, `pemeliharaan`)
VALUES ('https://www.facebook.com/profile.php?id=61591383925961', 'https://x.com/AlwaysNgoding', 'https://www.instagram.com/SobatDangdut.id', 'https://github.com/ZihxS', '085777578169', 'm.saleh.solahudin@gmail.com', '', 'archive', 'N');

INSERT INTO `__DB_PREFIX__atm`
(`rajin_membuat_artikel`, `rajin_berdiskusi`, `banyak_berkontribusi`, `anggota_baru_paling_rajin`)
VALUES (NULL, NULL, NULL, NULL);

INSERT INTO `__DB_PREFIX__pengguna`
(`nama_pengguna`, `kata_sandi`, `level`, `nama_lengkap`, `foto`, `tentang`, `alamat`, `jenis_kelamin`, `status`, `aktif`, `tanggal_bergabung`, `tanggal_terverifikasi`, `email`, `website_pribadi`, `akun_medsos`, `jumlah_kontribusi`, `poin_diskusi`, `poin_belajar`, `terakhir_ubah_kata_sandi`, `terakhir_masuk`)
VALUES ('ZihxS', '$2y$10$TXE2yp2gpZdNX1cZt5aTPeLn6y58ANQ89VsGn80pMIzmYQohWcVym', 'superadmin', 'ZihxS', 'blank.png', NULL, NULL, NULL, NULL, 'Y', '2026-10-01', '2026-10-01', 'admin@example.test', NULL, NULL, 0, 0, 0, NULL, NULL);
