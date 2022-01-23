<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=affectation', 'root', '');
    
    
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}



echo'dsklqd';
$stmt = $dbh->prepare("INSERT INTO affectation (Id_affect,Id_agent,Id_poste) VALUES (:aff, :ag , :p)");
$stmt->bindParam(':aff', NULL);
$stmt->bindParam(':ag',$_POST['p']);
$stmt->bindParam(':p',$_POST['q']);
$stmt->execute();
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Tp </title>
</head>
<body>
<section>
    <header>
        <h1>Affectation opération aux Postes</h1>  
    </header>
    <div id="jj"></div>
    <div class=" list-wrapper">
        <div>
            <h2>Liste Agents</h2>
            <table style="width:100%" class="t-agentposte">
                
                    <tr>
                        <th>Id_Agent</th>
                        <th>Username</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>mobile</th>
                        <th>Statut</th>
                    </tr>
                
                <?php
                    foreach($dbh->query(' SELECT * from agent where agent.id_agent NOT IN (SELECT agent.id_agent from agent JOIN affectation ON agent.id_agent=affectation.Id_agent) ;') as $row) {
                ?>            
                    <tr class="bodyt">
                        <td><?php echo $row['id_agent']; ?></td>
                        <td><?php echo $row['Username']; ?></td>
                        <td><?php echo $row['Nom']; ?></td>
                        <td><?php echo $row['Prenom']; ?></td>
                        <td><?php echo $row['Mobile']; ?></td>
                        <td><?php echo $row['Statut']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
            </table>
        </div>
        <div>
            <h2>Liste des postes</h2>
            <table style="width:100%" class="t-agentposte">
                
                    <tr>
                        <th>Id_poste</th>
                        <th>Designation</th>
                        <th>role</th>
                    </tr>
 
                    <?php
                    foreach($dbh->query('SELECT * from poste where poste.id_poste NOT IN (SELECT poste.id_poste from poste JOIN affectation ON poste.id_poste=affectation.Id_poste)') as $row) {
                ?>            
                    <tr class="poste">
                        <td ><?php echo $row['id_poste']; ?></td>
                        <td><?php echo $row['Designation']; ?></td>
                        <td><?php echo $row['Role']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                
            </table>
        </div>
        <div>
            
            <button id="btaj" value="kara">Ajouter</button>
        </div>
    </div>


    <div class='affectation'>
        <div>
            <h2>AFFECTATION</h2>
            <table style="width:100%" class="t-affectation">
                <tr>
                    <th>Id_Agent</th>
                    <th>Username</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>mobile</th>
                    <th>Statut</th>
                    <th>Id_poste</th>
                    <th>Designation</th>
                    <th>role</th>
                    <th>Select</th>
                </tr>
                <tr>
                <?php
                    foreach($dbh->query('SELECT * from agent JOIN affectation ON agent.id_agent=affectation.Id_agent JOIN poste ON affectation.Id_poste=poste.id_poste;') as $row) {
                ?>            
                    <tr class="bodyt">
                        <td ><?php echo $row['id_agent']; ?></td>
                        <td><?php echo $row['Username']; ?></td>
                        <td><?php echo $row['Nom']; ?></td>
                        <td><?php echo $row['Prenom']; ?></td>
                        <td><?php echo $row['Mobile']; ?></td>
                        <td><?php echo $row['Statut']; ?></td>
                        <td ><?php echo $row['id_poste']; ?></td>
                        <td><?php echo $row['Designation']; ?></td>
                        <td><?php echo $row['Role']; ?></td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <?php
                    }
                    ?>
                    
                </tr>
                
            </table>
        </div>
        <div>
            <button>Supprimer</button>
        </div>
    </div>
</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="index.js"></script>
</body>
</html>