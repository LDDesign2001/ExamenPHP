<?php
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if (is_null($id)) 
{
    header("Location: index.php");
}

$data = file_get_contents("data/data.txt");
$lines = explode(PHP_EOL,$data);

$result = array();
$gevonden = false;
foreach ($lines as $line) 
{
    $parts = explode(";",$line);
    if ($parts[0] == $id) 
    {
        $gevonden = true;
    } 
    else 
    {
        $result[] = $parts;
    }
}

if ($gevonden) 
{
    //bewaar de data uit result opnieuw in de file
    $lines = array();
    foreach ($result as $resultLine) 
    {
        $lines[] = implode(";",$resultLine);
    }
    $content = implode(PHP_EOL,$lines);
    file_put_contents("data/data.txt", $content);
} 
else 
{
    die("we kunnen de data met id ".$id." niet vinden");
}

header("Location: index.php");     
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
       <li><a  href="detail.php?id=<?php echo $nummer;?>"><?php echo $car?></a> (<a href="edit.php?id=<?php echo $nummer;?>">edit</a>)</li>
        <?php endforeach;?>
    </ul>
</body>
</html>