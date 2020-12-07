<?php
//var_dump($_GET);
if (!isset($_GET["id"])) 
{
    header("Location: index.php");
    exit;
}

$id =$_GET["id"];
$content = file_get_contents("data/data.txt");
$lines = explode(PHP_EOL,$content);
$cars = array();
$fotos = array();
$gevonden = false;

foreach ($lines as $line) 
{
    $deeltjes = explode(";",$line);
    $nummer = $deeltjes[0];
    if ($nummer==$id)
    {
        $naam = $deeltjes[1]; 
        $foto = $deeltjes[2]; 
        $KMperuur = $deeltjes[3];
        $sec = $deeltjes[4];
        $gevonden = true;
    }
    
}
if (!$gevonden) 
{
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
img
{
    height: 270px;
    width:480px;
}
</style>
<title><?php echo $naam?></title>
</head>
<body>
<a href="index.php"><button>back</button></a>
<div>
<h1><?php echo $naam?></h1>
<img src="images/<?php echo $foto?>">
<p>Snelheid: <?php echo $KMperuur?> KM/U</p>
<p>0 tot 100: <?php echo $sec?> seconden</p>
</div>
</body>
</html>