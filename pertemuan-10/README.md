# Menugas Meng-GG

Kumpulan tugas pada pertemuan 10

## CheatSheet

![Captureb](https://user-images.githubusercontent.com/46425489/169148160-8dbf5156-1910-4146-80b1-82a279072232.PNG)

## Challenge

1. Buat query untuk mencari penduduk berusia diatas 25 tahun yang berada di kabupaten 3204 dari data ini

```sql
SELECT id, nama_lengkap, kode_kabupaten, nomor_hp, gender, tanggal_lahir, 
TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia_penduduk 
FROM penduduk 
WHERE TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 25 AND kode_kabupaten = '3204'
```

Hasil :

![image](https://user-images.githubusercontent.com/46425489/169153041-50098607-7d99-4956-a549-79c1071bbca9.png)

2. Nilai tambah, untuk yang menambahkan perintah-perintah MySQL lainnya

```sql
SELECT id, nama_lengkap, kode_kabupaten, nomor_hp, gender, tanggal_lahir, 
TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia_penduduk 
FROM penduduk ORDER BY usia_penduduk ASC
LIMIT 10
```

Hasil :

![image](https://user-images.githubusercontent.com/46425489/169153487-20870746-395c-4d69-bba9-fb19bc27561c.png)
