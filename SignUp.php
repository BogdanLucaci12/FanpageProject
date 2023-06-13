<?php
require 'conectare.php';

if(array_key_exists("SignUp", $_POST)){
    if(!$_POST['email']){
        header("Location: logareinregistrare.php?info=email");
       }
       if(!$_POST['password']){
          header("Location: logareinregistrare.php?info=password");
       }
       if(!$_POST['nume']){
        header("Location: logareinregistrare.php?info=nume");
       }
       if(!$_POST['prenume']){
          header("Location: logareinregistrare.php?info=prenume");
       }
    if(strpos($_POST['email'], '@')!==false){
$nume=mysqli_real_escape_string($conectare, trim($_POST['nume']));
$prenume=mysqli_real_escape_string($conectare, trim($_POST['prenume']));

$email=mysqli_real_escape_string($conectare, trim($_POST['email']));
$password=mysqli_real_escape_string($conectare, $_POST['password']);
$passwordHash=password_hash($password, PASSWORD_DEFAULT);

$sql="SELECT ID FROM login_starwars WHERE email='".$email."' LIMIT 1";
$query=mysqli_query($conectare, $sql);
$potrivire=mysqli_num_rows($query);
if ($potrivire>0) {
    header("Location: logareinregistrare.php?info=luat");
}else{
    $sql="INSERT INTO login_starwars(Nume, Prenume, email, Parola) VALUES('".$nume."','".$prenume."','".$email."', '".$passwordHash."')";
    $query=mysqli_query($conectare, $sql);
    header("Location: logareinregistrare.php?info=ok");
}//s-a inserat utilizatorul
}else{
     header("Location: logareinregistrare.php?info=@");

}//verificam daca exista @
}
else{
    header("Location: logareinregistrare.php?info=nueok");

}

?>