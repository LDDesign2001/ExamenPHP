<?php
include('data.php');
$composerId = isset($_GET["composer"]) ? $_GET["composer"] : 0;
$currentComposer = $composers[$composerId];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        a { text-decoration: none; color : black;}
        img { height: 400px; }
        h1 { text-align: center}
        .menu-container { margin: 10px; border: 1px solid #a9a9a9; }
        .menu-container::after { content: ''; display: block; clear: both; }
        .content-container { margin: 50px; border: 5px solid lightgrey; }
        .content-container::after { content: ''; display: block; clear: both; }
        .container-left { float: left; width: 50%}
        .container-right { float: left; width: 50%; text-align: right}
        .menu { float: left; width: 15%; text-align: center; padding: 20px; }
        .menu-active { background-color: lightgrey; }
        .score { padding: 5px; }
    </style>
</head>

<body>
<div class="container">
    <div class="menu-container">
        <?php foreach ($composers as $index => $composer): ?>
        <div class="menu <?php if ($index==$composerId): ?>menu-active<?php endif; ?>">
            <a href="index.php?composer=<?php echo $index;?>"><?php echo $composer["name"];?></a>
        </div>
        <?php endforeach; ?>
    </div>

    <h1><?php echo $currentComposer["name"];?></h1>
    <div class="content-container">
        <div class="container-left">
            <ul>
                <?php foreach ($currentComposer["scores"] as $index=>$score):?>
                <li class="score">
                    <a href="score.php?composer=<?php echo $composerId; ?>&score=<?php echo $index; ?>">
                        <?php echo $score["name"]; ?> (<?php echo $score["reference"]; ?>)
                    </a>
                </li>
                <?php endforeach ; ?>
            </ul>
        </div>
        <div class="container-right">
            <img src="images/<?php echo $currentComposer["picture"]; ?>">
        </div>
    </div>

</div>
</body>
</html>