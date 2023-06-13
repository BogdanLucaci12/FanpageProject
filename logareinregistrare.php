<?php
session_start();
if(array_key_exists("logout", $_GET)) {
  session_unset();
  setcookie("ID", "", time() - 60 * 60);
  $_COOKIE["ID"] = "";
}
else if(array_key_exists("ID", $_SESSION) OR array_key_exists("ID", $_COOKIE)) {
 
  header("Location: starwarspage.php?nedelogat");}


?>
<!doctype html>
<html lang="en">
  <head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pagina de Logare</title>
    <script src="jQuery.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="stillogare.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php
  if(isset($_GET['info'])&& $_GET['info']== 'ok'){
    echo '<div class="eroare">Acum te poti loga </div>';
  }
  if(isset($_GET['info'])&& $_GET['info']== 'parolagresita'){
    echo '<div class="eroare">Parola introdusa nu se potriveste cu ceea asociata emailului. Te rog incearca din nou! </div>';
  }
  if(isset($_GET['info'])&& $_GET['info']== 'emailnusepotriveste'){
    echo '<div class="eroare">Emailul introdus nu se afla in baza de date </div>';
  }
  if(isset($_GET['info'])&& $_GET['info']== 'nesetata'){
    echo '<div class="eroare">Ceva nu a functionat corect. Incearca mai tarziu </div>';
  }
  if(isset($_GET['info'])&& $_GET['info']== 'email'){
    echo '<div class="eroare">Campul email este gol </div>';
  }
  if(isset($_GET['info'])&& $_GET['info']== 'password'){
    echo '<div class="eroare">Campul parola este gol! </div>';
  }
  if(isset($_GET['info'])&& $_GET['info']== 'nume'){
    echo '<div class="eroare">Campul nume este gol! </div>';
  }
  if(isset($_GET['info'])&& $_GET['info']== 'prenume'){
    echo '<div class="eroare">Campul prenume este gol </div>';
  }
  if(isset($_GET['info'])&& $_GET['info']== 'luat'){
    echo '<div class="eroare">Emaiul introdus exista deja! Te rog alege alt email </div>';
  }
  if(isset($_GET['info'])&& $_GET['info']== '@'){
    echo '<div class="eroare">emailul introdus nu este un email </div>';
  }
  ?>
  <div class="container w-75 p-3">
    <div class="butonswiper">
  <p  class="togglebutton">Log In</p>
  <p  class="togglebutton">Sign Up</p>
  </div>
    <!-- Formularul de logare -->
   <form action="LogIn.php" id="LogIn" method="post">
   <p>Introdu Email-ul si Parola inregistrate!</p>
   <p>Daca nu te-ai inregistrat, apasa butonul SignUp!</p>
     <fieldset>
        <label for="">Email</label>
        <input type="text" name="email" id="" class="form-control">
        <label for="">Parola</label>
        <input type="password" name="password" id=""class="form-control">
        </fieldset>
        <fieldset class="checkbox">
        Ramai logat
         <input type="checkbox" name="stayLoggedIn" id="">
        </fieldset>
        <fieldset>
          <button type="submit" value="LogIn" name="LogIn" id="logare" class="btn btn-warning">Logheaza-te</button>
        </fieldset>
   </form>


   <!-- Formularul de inregistrare -->
<form action="signUp.php" id="SignUp" method="post">
<p>Completeaza campurile pentru a te putea loga ulterior</p>
<fieldset>
        <label for="">Nume</label>
        <input type="text" name="nume" id="" class="form-control">
        <label for="">Prenume</label>
        <input type="text" name="prenume" id=""class="form-control">
        <label for="">Email</label>
        <input type="text" name="email" id=""class="form-control">
        <label for="">Parola</label>
        <input type="password" name="password" id=""class="form-control">
        
        </fieldset>
       <fieldset>
       <button type="submit" value="SignUp" name="SignUp" id="inregistrare" class="btn btn-warning">Inregistreaza-te</button>
  </div>     
<!-- Sfarsitul containerului -->
 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
   $(".togglebutton").click(function(){
   $("#LogIn").toggle();
   $("#SignUp").toggle();
   });

</script> 
</body>
</html>