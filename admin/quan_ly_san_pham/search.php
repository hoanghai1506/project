<?php
require_once "connect.php";
if (isset($_GET['term'])) {
     
   $query = "SELECT * FROM san_pham WHERE Ten_San_Pham LIKE '{$_GET['term']}%' LIMIT 25";
    $result = mysqli_query($ketnoi, $query);
 
    if (mysqli_num_rows($result) > 0) {
     while ($user = mysqli_fetch_array($result)) {
      $res[] = $user['Ten_San_Pham'];
     }
    } else {
      $res = array();
    }
    //return json res
    echo json_encode($res);
}
?>