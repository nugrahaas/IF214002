<?php

function getPendudukByID($id){
  global $dbConnection;

  $sqlStatement = $dbConnection->prepare("SELECT id_warga, nama_warga, nik_warga FROM warga WHERE id_warga = ?");
  $sqlStatement->execute(array($id));

  $output = new stdClass();
  $output->data = $sqlStatement->fetch(PDO::FETCH_ASSOC);
  $output->params = $params;

  echo json_encode($output);
};
