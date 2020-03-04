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
         <h1>ajout de formation</h1>
        <form method="POST" action="">
            <label>année finale de a formation:</label>
            <input type="text" name="annee" value="" /><br/>
            
            <label>diplome obtenu lors de la formation:</label>
            <input type="text" name="diplome" value="" /><br/>
            
            <label>établisement fréquenté:</label>
            <input type="text" name="etablissement" value="" /><br/>
            
            <label>description</label>
            <textarea name="description"></textarea>
            <input type="submit" value="ajouter la formation" /><br/>
        </form>
    <?php 
    
    if(isset($_POST["annee"])){
        $annee=htmlspecialchars($_POST["annee"]);
        $diplome=htmlspecialchars($_POST["diplome"]);
        $etablissement=htmlspecialchars($_POST["etablissement"]);
        $description=htmlspecialchars($_POST["description"]);
       $ajout_formation=$db->prepare("INSERT INTO formation(formation_annee,formation_diplome,formation_etablissement,formation_description) VALUES (?,?,?,?)") ;
        $ajout_formation->execute(array($annee,$diplome,$etablissement,$description));
        
    } else{ echo "ajout impossible. informations manquantes"; } ?>
              
    </body>
</html>    
    
<?php    
}
?>


