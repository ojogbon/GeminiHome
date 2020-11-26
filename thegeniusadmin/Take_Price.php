<?php
session_start();

include './connect.php';

$staffid =  65;//$_SESSION['logged_in_mail'];
$officerId = 9;// $_SESSION['staffTag'];
$stark  = $_GET['Myorders'];
$image  = $_GET['image'];

function is_ajax_resquest () {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
  $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

$name = isset($_POST['inn']) ? $_POST['inn'] : 'No Name';
$amount = isset($_POST['select']) ? $_POST['select'] : 'No amount';


if ($name === 'No Name' || $amount === 'No amount' || $stark === '' || $image === '' ) {
  // code...
  echo $amount.'>?>';
  echo $name.' '.$stark;
echo "Not Seen";
}else {
  if (is_ajax_resquest()) {
    //$real = explode($amount,' ');


    $query  = "INSERT INTO `smoothiePrice` (`id`, `staffid`, `price`, `combo`,`images`, `date`, `status`)
        VALUES (null,'$officerId','$name','$stark','$image',now(),'0')";
    $insert = mysqli_query($mycon,$query);
     if (!$insert){
       echo "naaa";
    }
    else
    {
       echo "Done!";;
    }
  }else {
    // code...
    echo "Not Ajax";
  }

}


 ?>
