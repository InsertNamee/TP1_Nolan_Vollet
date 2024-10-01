<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des éléments</title>
</head>
<body>
    <h1>Liste des éléments depuis la base de données</h1>
    
    <?php
    // Informations de connexion à la base de données
    $host = 'mysql'; // Nom du service Docker pour MySQL (défini dans docker-compose.yml)
    $db   = 'my_database'; // Nom de la base de données
    $user = 'my_user'; // Nom d'utilisateur MySQL
    $pass = ''; // Mot de passe MySQL
    $charset = 'utf8mb4';

    // Créer une connexion PDO
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    try {
        // Créer une nouvelle instance PDO
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        exit;
    }

    // Requête pour récupérer les données
    $sql = "SELECT id, nom, description FROM mes_elements"; // Changez la table et les colonnes ici

    // Exécution de la requête
    $stmt = $pdo->query($sql);

    // Vérifier si des résultats ont été trouvés
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nom</th><th>Description</th></tr>";

    // Boucle pour afficher les résultats
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Fermer la connexion
    $pdo = null;
    ?>
</body>
</html>
