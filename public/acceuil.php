<?php
//Création d'une instance de classe PDO dans une variable $bdd. On la paramètre avec le type de serveur, son adresse, le nom de la base de donnée, le nom d'utilisateur et le mdp de la cette base de données.
$bdd = new PDO('mysql:host=localhost;dbname=shop', 'root', '');
?>
<?php 
$reponse = $bdd->query("SELECT game.name, game.image, game.prix AVG(comments.avis) FROM game INNER JOIN comments ON game.id = comments.fknjeu_id GROUP BY comments.fknjeu_id DESC LIMIT 3");
$tableau = $reponse->fetchAll($mode = PDO::FETCH_ASSOC);
    foreach($tableau as $shop){ 


        //chaque itération de la boucle doit générer une card bootstrap où le contenu de chaque carte est généré avec les information récupérées dans la base de données
       

 ?>
        <div class="card" style="width: 30%;">
            <img src="images/<?php echo $shop['game.image']; ?>" class="card-img-top" alt="..."  >
            <div class="card-body">
              <h5 class="card-title"><?php echo $shop['game.name']; ?></h5>
              <p class="card-text"><?php echo ucfirst($animal['game.stock']). "restant" ; ?></p>
              <a href="pagejeu.php?id=<?php echo $animal['game.id']; ?>" class="btn" style="background:#802B75; color:white;">
            </div>
        </div>

<?php
    }

?>