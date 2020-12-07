<?php
$content = file_get_contents("data/data.txt");
$lines = explode(PHP_EOL,$content);
$cars = array();
foreach ($lines as $line) 
{
    if ($line=="") 
    {
        continue;
    }
    $deeltjes = explode(";",$line);
    $nummer = $deeltjes[0];
    $naam = $deeltjes[1];   
    $cars[$nummer] = $naam;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto's</title>
</head>
<body>
    <h1>Auto's</h1>
    <ul>
    <?php foreach ($cars as $nummer=>$car):?>
       <li><a  href="detail.php?id=<?php echo $nummer;?>"><?php echo $car?></a> (<a href="edit.php?id=<?php echo $nummer;?>">edit</a>) (<a href="delete.php?id=<?php echo $nummer;?>">delete</a>)</li>
        <?php endforeach;?>
    </ul>
    <a href="edit.php"><button>NEW</button></a>
    
</body>
</html>