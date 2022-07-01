<?php

function deletePendudukByID($id){
  global $dbConnection;

  $sqlStatement = $dbConnection->prepare("DELETE FROM warga WHERE id_warga = ?");
  $sqlStatement->execute(array($id));

  $output = new stdClass();
  $output->deleted_id = $id;

  echo json_encode($output);
};
