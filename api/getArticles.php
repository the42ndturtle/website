<?php
  include($_SERVER['DOCUMENT_ROOT']."/includes/include.php");
  // if ($_SERVER['SERVER_ADDR'] != $_SERVER['REMOTE_ADDR']){
    // http_response_code(400);
  //   echo "uh oh";
  //   exit;
  // }
  $type = $_GET['type'];
  if($type == 'new'){
    $sql = 'SELECT * FROM articles';
    $results = $conn->query($sql);
    $count = $results->num_rows;
    $max = $count - 20;
    if($max < 0){
      $max = 0;
    }
    $sql = 'SELECT * FROM articles WHERE `key` BETWEEN ' . $count . ' AND ' . $max;
    $results = $conn->query($sql);
    if($results->num_rows > 0){
      $rows = array();
      while($row = $result->fetch_assoc()){
        array_push($rows, $row);
      }
      echo json_encode($rows);
    }
  }
?>
