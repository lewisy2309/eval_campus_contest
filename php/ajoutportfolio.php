<?php

//modification des information de l'utilisateur
session_start();
$db=  new PDO("mysql:host=127.0.0.1;dbname=campus_contest", "root","");
if($_SESSION["id_user"]){
?>

<html lang="fr">
<head>
    <meta charset="utf-8">
    
    <title>mon evaluation php</title>
    <link rel="stylesheet" href="css/test.css">
</head>
<!--formulaire permettant d'effectuer les modifications-->
<body>
         <h1>ajout du projet</h1>
        <form method="POST" action="">
            <label>titre du projet:</label>
            <input type="text" name="projettitre" value="" /><br/>
            
            <label>description du projet</label>
            <textarea name="projetdescription"></textarea>
            <input type="submit" value="ajouter la formation" /><br/>
        </form>
    <?php 
    
    if(isset($_POST["projettitre"])){
        $projettitre=htmlspecialchars($_POST["projettitre"]);
        $projetdescription=htmlspecialchars($_POST["projetdescription"]);
        $ajout_projet=$db->prepare("INSERT INTO projet(projet_nom,projet_description) VALUES (?,?)") ;
        $ajout_projet->execute(array($projettitre,$projetdescription));
        
    } else{ echo "ajout impossible. informations manquantes"; } ?>
              
    </body>
</html>    
    
<?php    
}
?>


