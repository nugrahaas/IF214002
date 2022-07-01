<?php

function getAllPenduduk(){
  global $dbConnection;

  if(isset($params)) {
    $params = $_SERVER['QUERY_STRING'];
  } else {
    $params = false;
  }


  $sqlStatement = $dbConnection->prepare("
    SELECT id_warga, nama_warga, nik_warga FROM warga
    ORDER BY id_warga DESC
  ");
  $sqlStatement->execute();

  $output = new stdClass();
  $output->data = $sqlStatement->fetchall(PDO::FETCH_ASSOC);
  $output->params = $params;

  echo json_encode($output);
};
