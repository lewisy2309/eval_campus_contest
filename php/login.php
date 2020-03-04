<?php

//creation de la session et condition pour lesquelles l'utilisateur sera capable de se connecter
session_start();
         $db=  new PDO("mysql:host=127.0.0.1;dbname=campus_contest", "root","");
    
    
    if (isset($_POST["formconnect"])){    
        $emailconnect = htmlspecialchars(($_POST["emailconnect"]));
        $passwordconnect = sha1($_POST["mdpconnect"]);
        
        if (!empty($emailconnect) and !empty($passwordconnect)){
          
            $requser = $db -> prepare("SELECT * FROM user WHERE user_email=? and user_password=? ");
            $requser->execute( array ($emailconnect,$passwordconnect));
            $userexist = $requser-> rowCount();
            
            if ($userexist==1){
                $userinfo=$requser->fetch();
                $_SESSION['id_user']=$userinfo['id_user'];
                $_SESSION['user_nom']=$userinfo['user_nom'];
                $_SESSION['user_email']=$userinfo['user_email'];
                header("location:portfolio.php?id_user=".$_SESSION['id_user']);
                
            }else{ echo "<font color='red'>vous n'avez pas été authentifié, veuillez réessayer<font>";}
            
            
            
        } else {echo "tous les champs doivent être renseignés";} 
    }
                
    ?>

<!--formulaire de connection-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    
    <title>mon evaluation php</title>
    <link rel="stylesheet" href="css/test.css">
</head>

<body>
         <h1>connectez vous</h1>
            <p >conncetez vous et profitez de l'experience</p>
            <form method="POST" action="">
                
            
                <input type =email name="emailconnect" id="emailconnect" placeholder ="email" required/>
                
                <input type =password name ="mdpconnect" id="mdpconnect" placeholder ="mot de passe" required/><br/>
            
                <input type = "submit" name="formconnect" id="formconnect" value = "connection"/>
            </form>
            <div>
                <p>vous n'êtes pas encore inscrit?  <a href="admininscription.php">inscrivez vous ici!!</a></p>
            </div>
    </body>

                


</html>
