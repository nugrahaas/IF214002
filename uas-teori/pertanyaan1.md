# UAS Teori Basis Data

Nama : Nugraha Adi Sulistyo
NIM : 1207050092
Kelas : Teknik Informatika E

## Soal

1. Rancang solusi digital dari permasalahan yang teman-teman anggap penting untuk diselesaikan
2. Tentukan fitur-fitur utama dari solusi digital tersebut
3. Buat rancangan basis datanya dalam bentuk ER diagram
4. Buat model fisik dari basis datanya dalam bentuk query SQL yang meliputi: 1) data definition language untuk pembuatan tabel, 2) data manipulation language untuk contoh data awal, 3) data query language untuk analisis / business intelligence

## Jawaban

1. Sebuah aplikasi yang bertujukan untuk mengelola sistem RT di daerah Bandung, Sekelimus.

2. Fitur :
- Pendataan warga dan staff kepengurusan
- Menambah keluhan dari warga
- Menambah berita dari warga(dengan persetujuan admin) dan staff kepengurusan

3. ERD :

![image](https://user-images.githubusercontent.com/46425489/176569572-8236bc57-5abf-418c-b667-ff06f2c791d3.png)

4. DDL

```sql

CREATE TABLE `admin` (
  `id_admin` INT(11) NOT NULL,
  `nama_admin` VARCHAR(40) NOT NULL,
  `no_hp_admin` VARCHAR(20) NOT NULL,
  `nik_admin` BIGINT(16) NOT NULL,
  `pass_admin` VARCHAR(30) NOT NULL,
  `alamat_admin` VARCHAR(50) NOT NULL,
  `jenis_kelamin` ENUM('Pria','Wanita') NOT NULL
);


CREATE TABLE `berita` (
  `id_berita` INT(11) NOT NULL,
  `judul_berita` VARCHAR(40) NOT NULL,
  `deskripsi_berita` VARCHAR(500) NOT NULL,
  `jenis_berita` ENUM('Hiburan','Kriminal','Politik','Ekonomi') NOT NULL,
  `status_publikasi` ENUM('Disetujui','Menunggu Persetujuan','Ditolak') NOT NULL,
  `nama_warga` VARCHAR(40) NOT NULL,
  `no_hp_warga` VARCHAR(20) NOT NULL,
  `id_admin` INT(11) NOT NULL,
  `id_warga` INT(11) NOT NULL
);


CREATE TABLE `kecamatan` (
  `id_kecamatan` INT(11) NOT NULL,
  `nama_kecamatan` VARCHAR(40) NOT NULL,
  `jumlah_keldes` INT(11) NOT NULL,
  `id_kota` INT(11) NOT NULL
);



CREATE TABLE `keldes` (
  `id_keldes` INT(11) NOT NULL,
  `nama_keldes` VARCHAR(40) NOT NULL,
  `jumlah_rw` INT(11) NOT NULL,
  `id_kecamatan` INT(11) NOT NULL
);


CREATE TABLE `keluhan` (
  `id_keluhan` INT(11) NOT NULL,
  `judul_keluhan` VARCHAR(40) NOT NULL,
  `deskripsi_keluhan` VARCHAR(500) NOT NULL,
  `jenis_keluhan` ENUM('Sosial','Politik','Ekonomi') NOT NULL,
  `status_keluhan` ENUM('Diitnjau','Ditinjak Lanjuti','Selesai') NOT NULL,
  `nama_warga` VARCHAR(40) NOT NULL,
  `no_hp_warga` VARCHAR(20) NOT NULL,
  `id_admin` INT(11) NOT NULL,
  `id_warga` INT(11) NOT NULL
);


CREATE TABLE `kk` (
  `id_kk` BIGINT(16) NOT NULL,
  `jumlah_anggota_keluarga` INT(11) NOT NULL,
  `id_rt` INT(11) NOT NULL,
  `id_rw` INT(11) NOT NULL,
  `id_keldes` INT(11) NOT NULL,
  `id_kecamatan` INT(11) NOT NULL,
  `id_kota` INT(11) NOT NULL
);


CREATE TABLE `kota` (
  `id_kota` INT(11) NOT NULL,
  `nama_kota` VARCHAR(40) NOT NULL,
  `nama_provinsi` VARCHAR(40) NOT NULL,
  `jumlah_kecamatan` INT(11) NOT NULL
);


CREATE TABLE `role` (
  `id_role` INT(11) NOT NULL,
  `nama_role` ENUM('Walikota','Camat','Lurah/Kades','Ketua RW','Ketua RT','Sekretaris Kota','Sekretaris Kecamatan','Sekretaris Kelurahan/Desa','Sekretaris RW','Sekretaris RT','Bendahara Kota','Bendahara Kecamatan','Bendahara Kelurahan/Desa','Bendahara RW','Bendahara RT','Staff Kota','Staff Kecamatan','Staff Kelurahan/Desa','Staff RW','Staff RT','Kepala Keluarga','Warga','Admin') NOT NULL
);


CREATE TABLE `rt` (
  `id_rt` INT(11) NOT NULL,
  `nama_rt` VARCHAR(40) NOT NULL,
  `jumlah_kk` INT(11) NOT NULL,
  `id_rw` INT(11) NOT NULL
);


CREATE TABLE `rw` (
  `id_rw` INT(11) NOT NULL,
  `nama_rw` VARCHAR(40) NOT NULL,
  `jumlah_rt` INT(11) NOT NULL,
  `id_keldes` INT(11) NOT NULL
);


CREATE TABLE `warga` (
  `id_warga` INT(11) NOT NULL,
  `nama_warga` VARCHAR(40) NOT NULL,
  `nik_warga` BIGINT(16) NOT NULL,
  `no_hp_warga` VARCHAR(20) NOT NULL,
  `pass_warga` VARCHAR(30) NOT NULL,
  `alamat_warga` VARCHAR(100) NOT NULL,
  `jenis_kelamin` ENUM('Pria','Wanita') NOT NULL,
  `status_keaktifan` ENUM('Aktif Domisili','Nonaktif Domisili','Aktif Non Domisili','Tidak Terdaftar') NOT NULL,
  `status_ekonomi` ENUM('Rendah','Menengah','Tinggi') NOT NULL,
  `id_role` INT(11) NOT NULL,
  `id_kk` BIGINT(16) NOT NULL
);


ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `nik_admin` (`nik_admin`);


ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_warga` (`id_warga`),
  ADD KEY `id_admin` (`id_admin`);


ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kota` (`id_kota`);


ALTER TABLE `keldes`
  ADD PRIMARY KEY (`id_keldes`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);


ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_keluhan`),
  ADD KEY `id_warga` (`id_warga`),
  ADD KEY `id_admin` (`id_admin`);


ALTER TABLE `kk`
  ADD PRIMARY KEY (`id_kk`),
  ADD KEY `id_rt` (`id_rt`),
  ADD KEY `id_rw` (`id_rw`),
  ADD KEY `id_keldes` (`id_keldes`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_kota` (`id_kota`);


ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);


ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);


ALTER TABLE `rt`
  ADD PRIMARY KEY (`id_rt`),
  ADD KEY `id_rw` (`id_rw`);


ALTER TABLE `rw`
  ADD PRIMARY KEY (`id_rw`),
  ADD KEY `id_keldes` (`id_keldes`);


ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`),
  ADD UNIQUE KEY `login_phone` (`no_hp_warga`),
  ADD UNIQUE KEY `nik_warga` (`nik_warga`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_kk` (`id_kk`);


ALTER TABLE `admin`
  MODIFY `id_admin` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `berita`
  MODIFY `id_berita` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `keldes`
  MODIFY `id_keldes` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `keluhan`
  MODIFY `id_keluhan` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `kk`
  MODIFY `id_kk` BIGINT(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3273191209128322;


ALTER TABLE `kota`
  MODIFY `id_kota` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `role`
  MODIFY `id_role` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;


ALTER TABLE `rt`
  MODIFY `id_rt` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `rw`
  MODIFY `id_rw` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `warga`
  MODIFY `id_warga` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`),
  ADD CONSTRAINT `berita_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);


ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`);


ALTER TABLE `keldes`
  ADD CONSTRAINT `keldes_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`);


ALTER TABLE `keluhan`
  ADD CONSTRAINT `keluhan_ibfk_2` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`),
  ADD CONSTRAINT `keluhan_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);


ALTER TABLE `kk`
  ADD CONSTRAINT `kk_ibfk_1` FOREIGN KEY (`id_rt`) REFERENCES `rt` (`id_rt`),
  ADD CONSTRAINT `kk_ibfk_2` FOREIGN KEY (`id_rw`) REFERENCES `rw` (`id_rw`),
  ADD CONSTRAINT `kk_ibfk_3` FOREIGN KEY (`id_keldes`) REFERENCES `keldes` (`id_keldes`),
  ADD CONSTRAINT `kk_ibfk_4` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `kk_ibfk_5` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`);


ALTER TABLE `rt`
  ADD CONSTRAINT `rt_ibfk_1` FOREIGN KEY (`id_rw`) REFERENCES `rw` (`id_rw`);


ALTER TABLE `rw`
  ADD CONSTRAINT `rw_ibfk_1` FOREIGN KEY (`id_keldes`) REFERENCES `keldes` (`id_keldes`);


ALTER TABLE `warga`
  ADD CONSTRAINT `warga_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `warga_ibfk_2` FOREIGN KEY (`id_kk`) REFERENCES `kk` (`id_kk`);

```

DML

``` sql


INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Walikota'),
(2, 'Camat'),
(3, 'Lurah/Kades'),
(4, 'Ketua RW'),
(5, 'Ketua RT'),
(6, 'Sekretaris Kota'),
(7, 'Sekretaris Kecamatan'),
(8, 'Bendahara Kelurahan/Desa'),
(9, 'Sekretaris RW'),
(10, 'Sekretaris RT'),
(11, 'Bendahara Kota'),
(12, 'Bendahara Kecamatan'),
(13, 'Bendahara Kelurahan/Desa'),
(14, 'Bendahara RW'),
(15, 'Bendahara RT'),
(16, 'Staff Kota'),
(17, 'Staff Kecamatan'),
(18, 'Staff Kelurahan/Desa'),
(19, 'Staff RW'),
(20, 'Staff RT'),
(21, 'Kepala Keluarga'),
(22, 'Warga');


INSERT INTO `admin` (`id_admin`, `nama_admin`, `no_hp_admin`, `nik_admin`, `pass_admin`, `alamat_admin`, `jenis_kelamin`) VALUES
(1, 'Nugraha Adi Sulistyo', '085659672280', 3273211908010002, 'iyokecenodebat_admin', 'Jl. Sekelimus Gg. Kaweni No. 116 RT. 05/ RW. 08', 'Pria');

INSERT INTO `kota` (`id_kota`, `nama_kota`, `nama_provinsi`, `jumlah_kecamatan`) VALUES
(1, 'Kota Bandung', 'Jawa Barat', 26),
(2, 'Kota Banjar', 'Jawa Barat', 4),
(3, 'Kota Bekasi', 'Jawa Barat', 12),
(4, 'Kota Bogor', 'Jawa Barat', 6);

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `jumlah_keldes`, `id_kota`) VALUES
(1, 'Kecamatan Andir', 6, 1),
(2, 'Kecamatan Arcamanik', 4, 1),
(3, 'Kecamatan Antapani', 4, 1),
(4, 'Kecamatan Bandung Kidul', 4, 1);

INSERT INTO `keldes` (`id_keldes`, `nama_keldes`, `jumlah_rw`, `id_kecamatan`) VALUES
(1, 'Kelurahan Ciroyom', 10, 1),
(2, 'Kelurahan Cempaka', 7, 1),
(3, 'Kelurahan Maleber', 11, 1),
(4, 'Kelurahan Batununggal', 12, 4);

INSERT INTO `rw` (`id_rw`, `nama_rw`, `jumlah_rt`, `id_keldes`) VALUES
(1, 'RW 01', 8, 4),
(2, 'RW 02', 5, 4),
(3, 'RW 08', 6, 4);

INSERT INTO `rt` (`id_rt`, `nama_rt`, `jumlah_kk`, `id_rw`) VALUES
(1, 'RT 01', 56, 3),
(2, 'RT 04', 27, 3),
(3, 'RT 05', 85, 3);

INSERT INTO `kk` (`id_kk`, `jumlah_anggota_keluarga`, `id_rt`, `id_rw`, `id_keldes`, `id_kecamatan`, `id_kota`) VALUES
(3273129109128790, 3, 3, 3, 4, 4, 1),
(3273191209128321, 4, 3, 3, 4, 4, 1);


INSERT INTO `warga` (`id_warga`, `nama_warga`, `nik_warga`, `no_hp_warga`, `pass_warga`, `alamat_warga`, `jenis_kelamin`, `status_keaktifan`, `status_ekonomi`, `id_role`, `id_kk`) VALUES
(1, 'Nugraha Adi Sulistyo', 3273211908010002, '085659672280', 'iyokecenodebat', 'Jl. Sekelimus Gg. Kaweni No. 116 RT. 05/ RW. 08', 'Pria', 'Aktif Domisili', 'Rendah', 20, 3273129109128790),
(2, 'Asri Indah Permata Sari', 3273211110931121, '085721819203', 'asrigeulis123', 'Jl. Sekelimus Gg. Cengkir No. 132 RT. 06/ RW. 08', 'Wanita', 'Aktif Domisili', 'Rendah', 22, 3273129109128790);



INSERT INTO `berita` (`id_berita`, `judul_berita`, `deskripsi_berita`, `jenis_berita`, `status_publikasi`, `nama_warga`, `no_hp_warga`, `id_admin`, `id_warga`) VALUES
(1, 'Komika Berinisial Marshel Tercyduck Memb', 'Seorang komika tersohor berinisial Marshel Widianto tercyduck terkorbankan tersleding karena membeli produk dari dek Dea. Pertanyaan nya adalah pengalihan isu macam apalagi ini?', 'Politik', 'Menunggu Persetujuan', 'Nugraha Adi Sulistyo', '085659672280', 1, 1),
(2, 'Pertamax dan Minyak Naik!!', 'Mengcape biasa isi pertamax 25rb fulltank sekarang meninggoy banget harganya. Ga percaya? isi motor anda dengan bensin pertamax sekarang juga!! S3 marketing ni bous', 'Ekonomi', 'Disetujui', 'Nugraha Adi Sulistyo', '085659672280', 1, 1);


INSERT INTO `keluhan` (`id_keluhan`, `judul_keluhan`, `deskripsi_keluhan`, `jenis_keluhan`, `status_keluhan`, `nama_warga`, `no_hp_warga`, `id_admin`, `id_warga`) VALUES
(1, 'Warga Tidak Mau Mengikuti Kerja Bakti', 'Jadi Saya Beberesih Sendiri:(	', 'Sosial', 'Diitnjau', 'Nugraha Adi Sulistyo', '085659672280', 1, 1),
(2, 'Apakah Tidak Ada Bantuan untuk Minyak Go', 'Minyak lagi naik nih pak', 'Ekonomi', 'Ditinjak Lanjuti', 'Asri Indah Permata Sari', '085721819203', 1, 2);

```

DQL

``` sql

/* menampilkan data pada tabel warga*/

SELECT * FROM `warga`;

/* menampilkan jumlah role atau jabatan yang ada pada seluruh sistem database */

SELECT COUNT(*) AS jumlah_role FROM `role`;

/* menampilkan warga berusia dibawah 25 tahun untuk seleksi karang taruna */

SELECT `nama_warga`, `nik_warga`, `tanggal_lahir`, `status_keaktifan`, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia_warga, 
CASE 
	WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 25 THEN 'Remaja'
	WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 50 AND TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) > 24 THEN 'Dewasa'
	WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) > 50 THEN 'Lansia'
END AS kategori_usia
FROM `warga`
ORDER BY usia_warga ASC;

/* menampilkan detail dari lokasi seluruh data kk dengan join */

SELECT `id_kk`, `jumlah_anggota_keluarga`, `nama_rt`, `nama_rw`, `nama_keldes`, `nama_kecamatan`, `nama_kota`, `nama_provinsi` 
FROM `kk`
JOIN `rt` ON `kk`.`id_rt` = `rt`.`id_rt` 
JOIN `rw` ON `kk`.`id_rw` = `rw`.`id_rw`
JOIN `keldes` ON `kk`.`id_keldes` = `keldes`.`id_keldes`
JOIN `kecamatan` ON `kk`.`id_kecamatan` = `kecamatan`.`id_kecamatan`
JOIN `kota` ON `kk`.`id_kota` = `kota`.`id_kota`;

```
