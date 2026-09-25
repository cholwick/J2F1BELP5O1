<?php
require_once 'includes/database.php';

$id = $_GET['id'] ?? null;
$character = null;

if ($id !== null) {
    $stmt = $pdo->prepare("SELECT * FROM characters WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $character = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Character - <?= $character ? htmlspecialchars($character['name']) : 'Niet gevonden' ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet">
</head>
<body>
<?php if ($character): ?>
<header>
    <h1><?= htmlspecialchars($character['name']) ?></h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a>
</header>
<div id="container">
    <div class="detail">
        <div class="left">
            <img class="avatar" src="resources/images/<?= htmlspecialchars($character['avatar']) ?>" alt="<?= htmlspecialchars($character['name']) ?>">
            <div class="stats" style="background-color: <?= htmlspecialchars($character['color']) ?>;">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?= htmlspecialchars($character['health']) ?></li>
                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?= htmlspecialchars($character['attack']) ?></li>
                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?= htmlspecialchars($character['defense']) ?></li>
                </ul>
                <ul class="gear">
                    <?php if (!empty($character['weapon'])): ?>
                    <li><b>Weapon</b>: <?= htmlspecialchars($character['weapon']) ?></li>
                    <?php endif; ?>
                    <?php if (!empty($character['armor'])): ?>
                    <li><b>Armor</b>: <?= htmlspecialchars($character['armor']) ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="right">
            <p><?= nl2br(htmlspecialchars($character['bio']), false) ?></p>
        </div>
        <div style="clear: both"></div>
    </div>
</div>
<?php else: ?>
<header>
    <h1>Character niet gevonden</h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a>
</header>
<div id="container">
    <p style="padding: 20px;">Er is geen karakter gevonden met dit ID. Kies een ander karakter uit het overzicht.</p>
</div>
<?php endif; ?>
<?php require_once 'includes/footer.php'; ?>
</body>
</html>
