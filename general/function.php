<!-- A mettre sur toute les pages du projet, permet d'utiliser les superglobales $_SESSION -->
<?php
 session_start();
// <!-- connexion à la base de donnée -->

 $bdd=new PDO("mysql:host=localhost;dbname=projet-nerf;charset=utf8","root", "");

