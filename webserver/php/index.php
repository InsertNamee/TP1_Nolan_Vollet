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
    $host = 'mysql'; 
    $db   = 'my_database'; 
    $user = 'my_user'; 
    $pass = ''; 
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        exit;
    }

    $sql = "SELECT id, nom, description FROM mes_elements"; 

    $stmt = $pdo->query($sql);

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nom</th><th>Description</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    $pdo = null;
    ?>
</body>
</html>
