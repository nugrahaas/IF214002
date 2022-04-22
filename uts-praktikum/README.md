# UTS
22 April 2022

## Gambar

![image](https://user-images.githubusercontent.com/46425489/164576576-6259dfaf-5f7b-43a5-866e-f1b44d1fd04f.png)

## SQL

```sql

CREATE DATABASE `db_rukunin`

CREATE TABLE `admin` (
  `id_admin` INT(11) NOT NULL,
  `nama_admin` VARCHAR(40) NOT NULL,
  `no_hp_admin` VARCHAR(20) NOT NULL,
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
  `id_kk` INT(11) NOT NULL,
  `nama_kepala_keluarga` VARCHAR(40) NOT NULL,
  `jumlah_anggota_keluarga` INT(11) NOT NULL,
  `nama_rt` VARCHAR(40) NOT NULL,
  `nama_rw` VARCHAR(40) NOT NULL,
  `nama_keldes` VARCHAR(40) NOT NULL,
  `nama_kecamatan` VARCHAR(40) NOT NULL,
  `nama_kota` VARCHAR(40) NOT NULL,
  `nama_provinsi` VARCHAR(40) NOT NULL,
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
  `no_hp_warga` VARCHAR(20) NOT NULL,
  `pass_warga` VARCHAR(30) NOT NULL,
  `alamat_warga` VARCHAR(100) NOT NULL,
  `jenis_kelamin` ENUM('Pria','Wanita') NOT NULL,
  `status_keaktifan` ENUM('Aktif Domisili','Nonaktif Domisili','Aktif Non Domisili','Tidak Terdaftar') NOT NULL,
  `status_ekonomi` ENUM('Rendah','Menengah','Tinggi') NOT NULL,
  `id_role` INT(11) NOT NULL,
  `id_kk` INT(11) NOT NULL
);



ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);


ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_warga` (`id_warga`);


ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kota` (`id_kota`);


ALTER TABLE `keldes`
  ADD PRIMARY KEY (`id_keldes`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);


ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_keluhan`);


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
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_kk` (`id_kk`);



ALTER TABLE `berita`
  MODIFY `id_berita` INT(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` INT(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `keldes`
  MODIFY `id_keldes` INT(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `keluhan`
  MODIFY `id_keluhan` INT(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `kk`
  MODIFY `id_kk` INT(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `kota`
  MODIFY `id_kota` INT(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `role`
  MODIFY `id_role` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;


ALTER TABLE `rt`
  MODIFY `id_rt` INT(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `rw`
  MODIFY `id_rw` INT(11) NOT NULL AUTO_INCREMENT;




ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`);


ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`);


ALTER TABLE `keldes`
  ADD CONSTRAINT `keldes_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`);


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
