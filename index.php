<?php
require_once 'includes/database.php';

// Alle characters ophalen uit de database, gesorteerd op naam
$stmt = $pdo->query("SELECT * FROM characters ORDER BY name ASC");
$characters = $stmt->fetchAll();
$totalCharacters = count($characters);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>All Characters</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet">
</head>
<body>
<header>
    <h1>Alle <?= $totalCharacters ?> characters uit de database</h1>
</header>
<div id="container">
    <?php foreach ($characters as $char): ?>
    <a class="item" href="character.php?id=<?= $char['id'] ?>">
        <div class="left">
            <img class="avatar" src="resources/images/<?= htmlspecialchars($char['avatar']) ?>" alt="<?= htmlspecialchars($char['name']) ?>">
        </div>
        <div class="right">
            <h2><?= htmlspecialchars($char['name']) ?></h2>
            <div class="stats">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?= htmlspecialchars($char['health']) ?></li>
                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?= htmlspecialchars($char['attack']) ?></li>
                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?= htmlspecialchars($char['defense']) ?></li>
                </ul>
            </div>
        </div>
        <div class="detailButton"><i class="fas fa-search"></i> bekijk</div>
    </a>
    <?php endforeach; ?>
</div>
<?php require_once 'includes/footer.php'; ?>
</body>
</html>
