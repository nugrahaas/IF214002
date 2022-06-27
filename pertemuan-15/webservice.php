<?php 
  $alamatServer = "localhost";
  $userBasisData = "root";
  $passwordBasisData = "";
  $namaBasisData = "db_rukunin_backup";
  
  // header("Access-Control-Allow-Origin: *");
  // header("Access-Control-Allow-Credentials: true");
  // header('Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT');
  // header('Content-Type: application/json; charset=utf-8');
  
  $request = $_SERVER['REQUEST_URI'];
  
  function ambilSemuaDataPenduduk($alamatServer, $userBasisData, $passwordBasisData, $namaBasisData) {
    try {
      
      // Coba dulu apa yang ada di sini,
      
      // Biasanya dikasih nama $conn 
      $objekKoneksiBasisData = new PDO("mysql:localhost=$alamatServer;dbname=$namaBasisData", $userBasisData, $passwordBasisData);
      
      $objekKoneksiBasisData->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $objekPerintah = $objekKoneksiBasisData->prepare("SELECT nama_warga, `nik_warga`, `tanggal_lahir`, `status_keaktifan`, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia_warga,  
    CASE 
    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 25 THEN 'Remaja'
    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) < 50 AND TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) > 24 THEN 'Dewasa'
    WHEN TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) > 50 THEN 'Lansia'
    END AS kategori_usia
    FROM `warga`
    ORDER BY usia_warga ASC;");
      $objekPerintah->execute();
      
      $hasilQuery = $objekPerintah->fetchAll();
      
      echo json_encode($hasilQuery);
      
      // Perintah query
      
      $objekKoneksiBasisData = null;
      
    } catch(PDOException $e) {
      // Kalo gagal, jalankan yang dibawah ini
      
      echo "Sebab gagalnya: " . $e->getMessage();
    }
  }
  
  ambilSemuaDataPenduduk($alamatServer, $userBasisData, $passwordBasisData, $namaBasisData);
  
?>