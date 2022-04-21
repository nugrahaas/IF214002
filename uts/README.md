# UTS

21 April 2022

1. Basis data relasional dapat langsung dibangun menggunakan perintah SQL di sistem basis data seperti MySQL, dsb tanpa ada perancangan terlebih dahulu. Jelaskan apa keuntungan melakukan perancangan basis data terlebih dahulu (menggunakan ERD ataupun Class Diagram) !
2. Jelaskan bagaimana cara mentransformasikan proses bisnis sebuah organisasi menjadi struktur data di basis data !
3. Rancang solusi digital dari satu permasalahan yang ada di sekitar Anda. 
- Deskripsikan solusi digital tersebut dalam satu paragraf
- Buat list fitur-fitur yang ada pada solusi digital tersebut
- Buat ERD notasi Chen dari struktur data yang mewakili fitur2 di solusi digital tersebut
- Buat ERD notasi Crow Foot dari struktur data logical yang mewakili fitur2 di solusi digital tersebut, lengkap dengan keys, tipe data, dan normalisasi hingga bentuk ke 3

**Jawaban**

1. ERD adalah model atau rancangan untuk membuat database, supaya lebih mudah dalam menggambarkan data yang memiliki hubungan atau relasi dalam bentuk sebuah desain. Dengan adanya ER diagram, maka sistem database yang terbentuk dapat digambarkan dengan lebih terstruktur dan terlihat rapi. Untuk menyusun sistem database yang tepat, maka kita harus menentukan terlebih dahulu mengenai jenis model data yang akan digunakan. Yang mana, hal tersebut akan sangat berpengaruh nantinya pada pengembangan aplikasi sesuai dengan kebutuhan proyek bisnis. Model ER konseptual sangat berguna untuk mendokumentasikan segala bentuk arsitektur data pada sebuah organisasi. Model ini dapat digunakan untuk satu atau lebih jenis model data logis. Tujuan dari pengembangannya adalah untuk membangun struktur metadata untuk data master entitas dan set ER model logis.

A. Data Logis

Jenis yang pertama adalah model data logis, dimana untuk proses pembuatannya tidak membutuhkan model data konseptual. Komponen dalam model data logis antara lain, entitas data master, operasional, dan transaksional yang telah terdefinisi sebelumnya. Model ini juga dapat dikembangkan secara independen mulai dari yang lebih spesifik, hingga sistem manajemen basis data yang dapat diimplementasikan langsung.

B. Data Fisik

Model data fisik memungkinkan untuk dikembangkan dari model data logis. Model ini yang digunakan sebagai database. Model data fisik dipakai dalam menentukan metadata struktural dalam sistem manajemen database sebagai objek penyimpanan data yang bersifat relasional, contohnya tabel, indeks dan trigger pada database.

Kesimpulan :

ERD adalah bentuk model untuk menyusun kerangka database untuk mempermudah dalam memberikan gambaran terkait relasi dalam bentuk sebuah desain. Untuk membuat diagram ER yang baik, anda dapat mencoba dengan menentukan entitas dan atribut yang diperlukan terkait proyek anda. Gunakanlah tools online untuk mengembangkan ERD secara lebih cepat dan tersistem.

2. Transformasi proses bisnis menjadi struktur data
- Identifikasi Entitas
- Deskripsikan Relasi Entitas
- Menambahkan Atribut
- Melengkapi Diagram
  
3. RUKUNIN

Saat ini masyarakat bingung untuk bagaimana caranya berkomunikasi. Aplikasi berjalan pada website dengan pengembangan menggunakan PHP (CodeIgniter 4). Aplikasi ini ditujukan untuk menerima berita dan keluhan dari masyarakat, kemudian berita dan keluhan tersebut nantinya ditindaklanjuti sesuai ketentuannya masing-masing.

### Logo
![Logo (1)](https://user-images.githubusercontent.com/46425489/157591377-36963ac6-d137-4575-92bb-83ae026635e6.png)

### Fitur
  1. Pendataan warga, staff warga yang mencakup Walikota, Camat, Lurah/Kades, Ketua RW, Ketua RT beserta jajarannya
  2. Menambah keluhan dari warga, nantinya bisa diproses sesuai dengan ketentuan dan bidangnya masing-masing
  3. Menambah berita dari warga(dengan persetujuan admin)

### Entitas dan Instansi
  1. Warga (Bu Ade, Pa Ade)
  2. Role (Ketua RT, Ketua RW, Walikota)
  3. Keluhan (Keluhan lampu gang yang mati, Keluhan warga yang berkelahi)
  4. Berita (Berita pembagian zakat, Berita pembagian bantuan, Berita acara futsal)
  5. Kota (Bandung, Sumedang, Garut)
  6. Kecamatan (Andir, Bandung Kidul, Arcamanik)
  7. Keldes (Ciroyom, Maleber, Batununggal)
  8. RW (RW. 08, RW. 01, RW. 03)
  9. RT (RT. 08, RT. 01, RT. 03)
  10. KK (Kartu Keluarga)
  11. Admin (Lingkup RT, RW, Kelurahan)

### Diagram



### Atribut
  1. Warga (id_warga, no_hp_warga, pass_warga, nama_warga, alamat_warga, status_ekonomi, status_keaktifan, jenis_kelamin)
  2. Role (id_role, nama_role)
  3. Keluhan (id_keluhan, nama_warga, no_hp_warga, judul_keluhan, deksripsi_keluhan, jenis_keluhan, status_keluhan)
  4. Berita (id_berita, nama_warga, no_hp_warga, judul_berita, deksripsi_berita, jenis_berita, status_berita)
  5. Admin (id_admin, no_hp_admin, username_admin, pass_admin, nama_admin, alamat_admin, jenis_kelamin)
  6. Kota (id_kota, nama_kota, nama_provinsi, jumlah_kecamatan)
  7. Kecamatan (id_kecamatan, nama_kecamatan, jumlah_keldes)
  8. Keldes (id_keldes, nama_keldes, jumlah_rw)
  9. RW (id_rw, nama_rw, jumlah_rt)
  10. Kota (id_rw, nama_rt, jumlah_kk)
  11. KK (id_kk, nama_kepala_keluarga, jumlah_anggota_keluarga, nama_rt, nama_rw, nama_keldes, nama_kecamatan, nama_kota, nama_provinsi)
