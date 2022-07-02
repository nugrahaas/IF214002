<?php

// POST content: $_POST
// JSON POST content: file_get_contents('php://input')

function postPenduduk(){
  global $dbConnection;

  $payload = json_decode(file_get_contents('php://input'));

  $sqlStatement = $dbConnection->prepare("INSERT INTO warga (nama_warga, nik_warga, no_hp_warga, pass_warga, tanggal_lahir, alamat_warga, jenis_kelamin, status_keaktifan, status_ekonomi, id_role, id_kk) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  $sqlStatement->execute(array(
    $payload->nama_warga,
    $payload->nik_warga,
    $payload->no_hp_warga,
    $payload->pass_warga,
    $payload->tanggal_lahir,
    $payload->alamat_warga,
    $payload->jenis_kelamin,
    $payload->status_keaktifan,
    $payload->status_ekonomi,
    $payload->id_role,
    $payload->id_kk    
  ));

  $output = new stdClass();
  $output->inserted = $payload;
  $output->inserted_id = $dbConnection->lastInsertId();

  echo json_encode($output);
};
