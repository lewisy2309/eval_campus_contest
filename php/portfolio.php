<?php
//démarage de notre session
session_start();
$db=  new PDO("mysql:host=127.0.0.1;dbname=campus_contest", "root","");
if (isset($_GET['id_user']) and $_GET['id_user']>0){
$getid = intval($_GET['id_user']);
$requser= $db->prepare('SELECT * FROM user WHERE id_user=?');
$requser->execute(array($getid));
$userinfo= $requser->fetch();

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8"/>
        <title>BINGANGOYE GHILBERT</title>
        <link href="../css/portfolio.css" rel="stylesheet"/>
        <meta name="viewport" content="width=device-width" initial-scale=1.0/>
    </head>
    
    <body>
<!-------------------------------------------------->
<!--        PREMIER DEVISION/ LE MEU DE NAVIGATION-->
<!-------------------------------------------------->
       
        <nav >
            
            <a href="#apropos">à propos</a>
            <a href="#competences">compétences</a>
            <a href="#formations"> formations</a>
            <a href="#portfolio">portfolio</a>
            <a href="#mecontacter">me contacter</a>
            
        </nav>
        
<!-------------------------------------------------->        
<!--        2E DIVISION: A PROPOS DE MOI-->
<!-------------------------------------------------->
        
        <div class="division" id="apropos">
            <h2> A propos de moi</h2>
            <div>
                <img src="../img/work-731198_1920.jpg" alt="codage"/>
                <div><?php
                     $reponse= $db->prepare("SELECT * FROM apropos WHERE id_description=?  ");
                     $reponse->execute(array("1"));
                     $descriptioninfo= $reponse->fetch()  ;
                        
                    ?>
                    
                    <h1><?php echo $descriptioninfo["apropos_nom"] ;?><span> développeur web</span></h1>
                    <p> 
                    <?php echo $descriptioninfo["apropos_description"]?>
                    </p>
                    <?php
                    if($userinfo['id_user']== $_SESSION['id_user'] )
                    {
                    ?>
                    <a href="aproposmodification.php?id_user=1" class="modifiation" >modifier le nom et la description ici</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        
<!-------------------------------------------------->        
<!--        3E DIVISION: formation-->
<!-------------------------------------------------->
        
        <div class="division" id="formations">
            <h2>formations</h2>
            <div>
                <?php 
             $ajout_formationportfolio= $db->query("SELECT * FROM formation ORDER BY id_formation  ");
            while ($addformation = $ajout_formationportfolio->fetch())
            {
               
            ?>
                <section>
                <p><?php echo $addformation["formation_annee"] ;?></p>
                <h4><?php echo $addformation["formation_diplome"] ;?></h4>
                <p><?php echo $addformation["formation_etablissement"] ;?></p>
                <p><?php echo $addformation["formation_description"] ;?>
                </p>
                </section>

               
                <?php
                }
                ?>
                
                 <?php
                    if($userinfo['id_user']== $_SESSION['id_user'] )
                    {
                    ?>
                    <a href="ajoutformation.php?id_user=1" class="modifiation" >ajouter une formation ici</a>
                    <?php
                    }
                    ?>
            </div>
        </div>
        
<!-------------------------------------------------->
<!--        4E DIVISION: COMPETENCES-->
<!-------------------------------------------------->
        
        <div class="division" id="competences">
            <h2>compétences</h2>
            <div>
                <section>
                    <img/ src="../img/logo-2582748_1920.png" alt="logo_html">
                    <h4>html</h4>
                    <p>bonne maitrise</p>
                </section>

                <section>
                    <img/ src="../img/logo-2582747_1280.png" alt="logo_css">
                    <h4>css</h4>
                    <p>bonne maitrise</p>
                </section>

                <section>
                    <img/ src="../img/javascript-2189147_1280.png" alt="icon_js">
                    <h4>Javascript</h4>
                    <p>bonne maitrise</p>
                </section>

                <section>
                    <img/ src="../img/Python-PNG-File.png" alt="python_icon">
                    <h4>Python</h4>
                    <p>bonne maitrise</p>
                </section>

                <section>
                    <img/ src="../img/data_database_sql_query-128.png" alt="sql_icon">
                    <h4>conception de base de données</h4>
                    <p>bonne maitrise</p>
                </section>

                <section>
                    <img/ src="../img/background-3228704_1920.jpg" alt="reseau">
                    <h4>Réseaux et Protocols</h4>
                    <p>matrise moyenne</p>
                </section>
                <?php
                    if($userinfo['id_user']== $_SESSION['id_user'] )
                    {
                    ?>
                    <a href="ajoutcompetence.php?id_user=1" class="modifiation" >ajouter une compétence ici</a>
                    <?php
                    }
                    ?>
            </div>
        </div>
        
<!-------------------------------------------------->
<!--        5E DIVISION: PORTFOLIO-->
<!-------------------------------------------------->
        
        <div class="division" id="portfolio">
            <h2>portfolio</h2>
               <?php 
             $ajout_formationprojet= $db->query("SELECT * FROM projet ORDER BY id_projet ");
            while ($addprojet = $ajout_formationprojet->fetch())
            { ?>
            <section>
                <h4>make your style</h4>
                <p>site web et application mobile développés lors d'un projet scolaire avec des collègues de classe aussi passionés que moi par le developpement. C'est la plate forme révolutionnaire qui perettra d'ici quelques temps à toute personne quelques soient ses incapacités à pouvoir se faire ou se refaire une garde-robe</p>
            </section>
            <?php
                    }
                    ?>

            <?php
                    if($userinfo['id_user']== $_SESSION['id_user'] )
                    {
                    ?>
                    <a href="ajoutportfolio.php?id_user=1" class="modifiation" >ajouter un élément à votre portfolio ici</a>
                    <?php
                    }
                    ?>
        </div>
        
<!-------------------------------------------------->
<!--        6E DIVISION:ME CONTACTER-->
<!-------------------------------------------------->
        
        <div class="division" id="mecontacter">
            <h2>me contacter</h2>
            <div>  
                <div>
                <p class="desciptionarea">je vous répondrais avec grand plaisir</p>
                <section>
                    <img src="../img/location-circle-512.png" alt="location_icon"/><p> RENNES,35000 </p>
                </section>

                <section>
                    <img src="../img/email_icon.png" alt="email_icon"/><p> ghilbertbingangoye@gmail.com </p>
                </section>

                <section>
                    <img src="../img/phone_icon.png" alt="phone_icon"/><p> 0628321431 </p>
                </section>
                </div>
            
            
            <form>

                <input type =text name = nom placeholder ="nom"/><br/>
                
                <input type =text name = prénoms placeholder ="Prénoms"/><br/>

                <input type =email name = email placeholder ="adresse em@il"/><br/>
                
                <input type =text name = phone_number placeholder ="numéro de téléphone"/><br/>

                <input type =text name = objet/ placeholder ="objet"><br/>

                <textarea id = "textarea" name= message  placeholder ="Votre message"></textarea><br/>
                <input id="soumission" type = "submit" value = "envoyer"/>
                <div>
                    <input type="checkbox" id="accord" name="accord"> 
                    <p>En cliquant ici vous acceptez nos <a href="mentionslegales.html">conditions legales</a> liées à la confidentialité</p>
                </div>
            </form>
            </div>
        </div>
        
<!-------------------------------------------------->
<!--        7E DIVISION : FOOTER-->
<!-------------------------------------------------->
        <footer class="division">
            <p> &copy; 2018 copyright-GHILBERT BINGANGOYE</p> <p>designed by<span> GHILBERT BINGANGOYE</span></p>
        </footer>
        
        
    </body>
<html/>

<?php    
}   
?>