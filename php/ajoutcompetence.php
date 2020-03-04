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
            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
     Fichier : <input type="file" name="avatar">
            
            <label>nom:</label>
            <input type="text" name="competence_nom" value="" /><br/>
            
            <label>niveau de maitrise:</label>
            <input type="text" name="competence_maitrise" value="" /><br/>

            <input type="submit" value="ajouter la compétence" /><br/>
        </form>
    <?php 
    
    if(isset($_POST['image'])){
        $competencenom=htmlspecialchars($_POST["competence_nom"]);
        $competencemaitrise=htmlspecialchars($_POST["competence_maitrise"]);
        $dossier = 'upload/';
        $fichier = basename($_FILES['avatar']['name']);
        $taille_maxi = 100000;
        $taille = filesize($_FILES['avatar']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['avatar']['name'], '.'); 
        //Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
             $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
        }
        if($taille>$taille_maxi)
        {
             $erreur = 'Le fichier est trop gros...';
        }
        if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
             //On formate le nom du fichier ici...
             $fichier = strtr($fichier, 
                  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
             $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
             if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
             {
                  echo 'Upload effectué avec succès !';
             }
             else //Sinon (la fonction renvoie FALSE).
             {
                  echo 'Echec de l\'upload !';
             }
        }
        else
        {
             echo $erreur;
        }
    }
     ?>
              
    </body>
</html>    
    
<?php    
}
?>


