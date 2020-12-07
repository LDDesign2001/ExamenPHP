<?php
include('include/Painting.php');
include('include/PaintingRepository.php');
$paintingRepository = new PaintingRepository;
$paintings = $paintingRepository->findAll();

session_start();

if(isset($_GET["theme"])) {
    $_SESSION["theme"] = $_GET["theme"];
}
if(isset($_GET["currency"])) {
    $_SESSION["currency"] = $_GET["currency"];
}

$theme = isset($_SESSION["theme"]) ? $_SESSION["theme"] : "default";
$currency = isset($_SESSION["currency"]) ? $_SESSION["currency"] : "eur";

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/<?php echo $theme ?>.css">
</head>
<body>
    <ul class="menu">
        <li class="left"><a href="index.php?theme=default">Standaard</a></li>
        <li class="left"><a href="index.php?theme=spring">Fris</a></li>
        <li class="left"><a href="index.php?theme=autumn">Kleurig</a></li>
        <li class="left"><a href="index.php?theme=darcula">Donker</a></li>
        <li class="left"><a href="index.php?theme=kerst">Kerst</a></li>
        <li class="right"><a href="index.php?currency=yen">¥</a></li>
        <li class="right"><a href="index.php?currency=gbp">£</a></li>
        <li class="right"><a href="index.php?currency=usd">$</a></li>
        <li class="right"><a href="index.php?currency=eur">€</a></li>
    </ul>
    <h1>Paintings for sale</h1>
    <div class="container">
        <ul class="paintings">
            <?php foreach ($paintings as $painting) : ?>
                <li>
                    <p class="name"><?php echo $painting->getName(); ?></p>
                    <img class="image" src="images/<?php echo $painting->getImage()?>">
                    <p class="painter"><?php echo $painting->getPainter(); ?></p>
                    <p class="price"><?php echo $painting->getPrice($currency); ?></p>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</body>
</html>