<?php
require 'conectare.php';
session_start();
if(array_key_exists("LogIn", $_POST)){
 if(!$_POST['email']){
  header("Location: logareinregistrare.php?info=email");
 }
 if(!$_POST['password']){
    header("Location: logareinregistrare.php?info=password");
 }
if(isset($_POST['password']) && isset($_POST['email'])){
  $email=mysqli_real_escape_string($conectare, $_POST['email']);
  $password=mysqli_real_escape_string($conectare, $_POST['password']);
  $sql="SELECT * FROM login_starwars WHERE email = '" .$email. "'";
  $query=mysqli_query($conectare, $sql);
  $row=mysqli_fetch_array($query);
if(isset($row) AND array_key_exists("Parola", $row)){
   $verificaparola=password_verify($password, $row['Parola']);
   if($verificaparola){
    $_SESSION['ID']=$row['ID'];
    if(isset($_POST['stayLoggedIn'])){
      setcookie("ID", $row['ID'], time()+60*60*24*365);
    }
    header("Location: starwarspage.php");
   }
   else{
    header("Location: logareinregistrare.php?info=parolagresita");
}
}else{
  header("Location: logareinregistrare.php?info=emailnusepotriveste");
}
}
else{
  header("Location: logareinregistrare.php?info=nesetata");
}}
?>
