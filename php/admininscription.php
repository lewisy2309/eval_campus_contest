<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
         
    <title>inscription</title>
    <link rel="stylesheet" href="css/test.css">
</head>

<body>
         <h1>inscription</h1>
            <p class="desciptionarea">inscripion à la par administrateur permettant de gerer le contenu du site</p>
            <form method="POST" >
                
            
                <input type =text name="nom" id="nom" placeholder ="nom complet" required/>
            
                <input type =email name = "email" id="email" placeholder ="Email" required/><br/>
                
                <input type =password name = "password" id="password" placeholder ="choissez un mot de passe" required/><br/>
                
                <input type =password name = "confirmpassword" id="confirmpassword" placeholder ="confirmez votre mot de passe" required/><br/>

                <input type = "submit" name="inscription" id="inscription" value = "inscription"/>
                
                
            </form>
            <div>
                <p>Déja administrateur du site?  <a href="login.php">effectuez vos modifications ici!!</a></p>
            </div>
    <?php
                $db=  new PDO("mysql:host=127.0.0.1;dbname=campus_contest", "root","");
                
                 
                
              
    
   
                if(isset($_POST["inscription"]) ) 
                {
                $nom = htmlspecialchars($_POST["nom"]);
                $email = htmlspecialchars($_POST["email"]);
                $passwordhash = sha1($_POST["password"]);
                if (isset ($_POST["nom"]) and isset ($_POST["email"]) ){
                
                  
                
                if ( filter_var($email, FILTER_VALIDATE_EMAIL)){ 
                     
                        $reqmail = $db->prepare ("SELECT * FROM user where user_email=?");
                        $reqmail-> execute(array($email));
                        $mailexist = $reqmail ->rowCount();
                        if ($mailexist==0){
                        if($_POST["password"]==$_POST["confirmpassword"]){
                           

                             $requete= $db->prepare("insert into user(user_nom,user_email,user_password) values (?,?,?)");
                             $requete->execute(array($nom,$email,$passwordhash));
                            echo "vous avez bien été inscrit";

                         } else { echo "réassayez!!les mots de passe saisies sont differents differents";}
                        } else { echo "<font color='red'>adresse mail déja utilisé<font/>";}
                            
                            
                } else { echo "votre adresse email n'est  pas valide";}
                } else {echo " information aquantes";}
                }
    ?>
    </body>

</html>
