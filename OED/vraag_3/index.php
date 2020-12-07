<?php
include('include/Painting.php');
include('include/PaintingRepository.php');
$paintingRepository = new PaintingRepository;
$paintings = $paintingRepository->findAll();

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/default.css">
</head>
<body>
    <ul class="menu">
        <li class="left">Standaard</li>
        <li class="left">Fris</li>
        <li class="left">Kleurig</li>
        <li class="left">Donker</li>
        <li class="left">Kerst</li>
        <li class="right">¥</li>
        <li class="right">£</li>
        <li class="right">$</li>
        <li class="right">€</li>
    </ul>
    <h1>Paintings for sale</h1>
    <div class="container">
        <ul class="paintings">
            <?php foreach ($paintings as $painting) : ?>
                <li>
                    <p class="name"><?php echo $painting->getName(); ?></p>
                    <img class="image" src="images/<?php echo $painting->getImage()?>">
                    <p class="painter"><?php echo $painting->getPainter(); ?></p>
                    <p class="price"><?php echo $painting->getPrice(); ?></p>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</body>
</html>