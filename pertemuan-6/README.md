# Tabel Ternormalisasi 1 dan 2 Rukunin
Tabel-tabel berikut merupakan tabel yang isian datanya(dummies) sudah dinormalisasi.

#### Tabel Admin
|🔑id_admin|nama_admin|no_hp_admin|pass_admin|alamat_admin|status_keaktifan|status_ekonomi|
|---|---|---|---|---|---|---|
|1|Ujang Motegi|087745671111|ujangnihbous|Bojongloa Kidul|Aktif|Menengah|
|2|Toton Mandalika|087899881212|totonnihbous|Bandung Kidul|Aktif|Rendah|
|3|Asep Aragon|087899881212|asepnihbous|Antapani|Aktif|Tinggi|

#### Tabel Warga
|🔑id_warga|nama_warga|no_hp_warga|pass_warga|alamat_warga|status_keaktifan|status_ekonomi|jenis_kelamin|role|
|---|---|---|---|---|---|---|---|---|
|1|Mustafa Losail|085645671111|mustafasikece|Bandung Kidul|Aktif|Menengah|Pria|Ketua RT|
|2|Ucup Mandalika|085899881212|ucupsikece|Bandung Kidul|Aktif|Rendah|Pria|Warga|
|3|Nunung Sachsenring|089699881212|nunungpanggeulisna|Bandung Kidul|Aktif|Tinggi|Wanita|Warga|

#### Tabel Berita
|🔑id_berita|nama_warga|no_hp_warga|judul_berita|deskripsi_berita|jenis_berita|status_publikasi_berita|
|---|---|---|---|---|---|---|---|---|
|1|Mustafa Losail|085645671111|Komika Berinisial Marshel Tercyduck Membeli Produk dari Dea|blablabla|Hiburan, Kriminal|Disetujui|
|2|Ucup Mandalika|085899881212|Pertamax dan Minyak Naik!!|blablabla|Politik|Menunggu Persetujuan|
|3|Nunung Sachsenring|089699881212|Kupas Tuntas Cara Pemerintah Mengalihkan Isu yang Beredar dengan Isu Personal|blablabla|Politik|Ditolak|

#### Tabel Keluhan
|🔑id_keluhan|nama_warga|no_hp_warga|judul_keluhan|deskripsi_keluhan|jenis_keluhan|status_keluhan|
|---|---|---|---|---|---|---|
|1|Mustafa Losail|085645671111|Warga Tidak Mau Mengikuti Kerja Bakti|Jadi Saya Beberesih Sendiri:(|Sosial|Ditinjau|
|2|Ucup Mandalika|085899881212|aya nu gelut kamari pak|si burhan lawan si maman, untung we saya masang si burhan|Sosial|Ditindak Lanjuti|
|3|Nunung Sachsenring|089699881212|Apakah Tidak Ada Bantuan untuk Minyak Goreng??|Minyak lagi naik nih pak|Ekonomi|Selesai|

#### Tabel Role
|🔑id_role|nama_role|deskripsi_role|
|---|---|---|
|1|Ketua RT|Wilayah Lingkungan RT|
|2|Ketua RW|Wilayah Lingkungan RW|
|3|Sekretaris RT|Wilayah Lingkungan RT|

#### Tabel Kota
|🔑id_kota|nama_kota|jumlah_kecamatan|
|---|---|---|
|1|Kota Bandung|30|
|2|Kota Sumedang|26|
|3|Kabupaten Garut|42|

#### Tabel Kecamatan
|🔑id_kecamatan|nama_kecamatan|jumlah_keldes|
|---|---|---|
|1|Kecamatan Andir|6|
|2|Kecamatan Antapani|4|
|3|Kecamatan Arcamanik|4|

#### Tabel Keldes
|🔑id_keldes|nama_keldes|jumlah_rw|
|---|---|---|
|1|Kelurahan Ciroyom|10|
|2|Kelurahan Cempaka|7|
|3|Kelurahan Maleber|11|
|4|Kelurahan Batununggal|12|

#### Tabel RW
|🔑id_rw|nama_rw|jumlah_rt|id_keldes|
|---|---|---|---|
|1|RW. 08|6|4|
|2|RW. 01|8|4|
|3|RW. 02|5|4|

#### Tabel RT
|🔑id_rt|nama_rt|jumlah_kk|id_rw|
|---|---|---|---|
|1|RT. 01|56|1|
|2|RT. 04|27|1|
|3|RT. 05|85|1|

#### Tabel KK
|🔑id_kk|nama_kepala_keluarga|jumlah_anggota_keluarga
|---|---|---|
|1|Mustafa Losail|3|
|2|Toton Mandalika|4|
|3|Asep Aragon|2|
