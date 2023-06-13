<?php
require 'conectare.php';
if(isset($_FILES['my_image']) && isset($_POST['submit'])){
  print_r($_FILES['my_image']);
   $img_name=$_FILES['my_image']['name'];
   $img_size=$_FILES['my_image']['size'];
   $img_temp=$_FILES['my_image']['tmp_name'];
   $error=$_FILES['my_image']['error'];
if($error===0){
   if($img_size>1000000){
    $em="TooBig";
    header("Location: starwarspage.php?$em");
   }
   else{
      $img_ex= pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc=strtolower($img_ex);
      $allowed_ex=array("jpg", "png", "jpeg");
      if(in_array($img_ex_lc, $allowed_ex)){
        $new_img_name=uniqid("IMG-", true). '.'. $img_ex_lc;
        $img_upload_path='imaginiincarcate/'.$new_img_name;
        move_uploaded_file($img_temp, $img_upload_path);
        //insert into db
        $sql=" INSERT INTO imagini(Imagine)VALUES('$new_img_name')";
        mysqli_query($conectare, $sql);
        $em="inserat";
        header("Location: starwarspage.php?info=$em");
      }else{
        $em="Extension";
        header("Location: starwarspage.php?info=$em");
      }
   }
}else{
    $em="error occur";
    header("Location: starwarspage.php?info=$em");
}//end of $error;
}
else{
    echo"nu este setat";
}//end of isset
?>