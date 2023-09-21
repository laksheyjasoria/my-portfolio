<?php
include 'config.php';


    // fetch file to download from database
    $sql = "SELECT * FROM users ";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = $file['resume'];

    if (file_exists($filepath)) {
        $nm='Lakshey Kumar CV.pdf';
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $nm);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize( $file['resume']));
        readfile( $file['resume']);

       
}else{
   
    echo "<script>alert('There is some problem contact us to solve it if u press ok it will redirect to contact option');
   window.location.href = 'more.php';</script>";
  
}


?>