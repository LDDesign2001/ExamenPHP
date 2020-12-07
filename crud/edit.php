<?php
$id = isset($_GET["id"])?$_GET["id"] : null;
$filename = "data/data.txt";
$content = file_get_contents($filename);
$lines = explode(PHP_EOL,$content);
$data = array();
foreach ($lines as $line ) 
{
    $data[] = explode(";",$line);
}
if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
    $name = $_POST['naamAuto'];
    $foto = $_POST['Foto'];
    $MaxSnelheid = $_POST['Snelheid'];
    $Honderd = $_POST['Nultothonderd'];
    $hoogste = 0;
    foreach($data as $auto)
    {
        if ($auto[0]>$hoogste) 
        {
            $hoogste = $auto[0];
        }
    }
    $nieuweAuto = array($hoogste+1,$name,$foto,$MaxSnelheid,$Honderd);
    $content = $content . PHP_EOL . implode(";",$nieuweAuto);
    //PHP_EOL --> nieuwe lijn
    file_put_contents($filename,$content);
    //var_dump($_POST); 
    die("
    <style>
    img
    {
        height : 200px;
        width : 300px;
    }
    </style>
    <a href=index.php><button>back</button></a>
    <h1>volgende auto werd toegevoegd:</h1>
    <ul><li>naam : $name</li>
    <img src =images/$foto>
    <li>Maximum snelheid :  $MaxSnelheid</li>
    <li>Van nul to honderd : $Honderd. seconden</li>
    </ul>");    
}
$auto = null;
if (is_null($id)) 
{
    $auto = array(null,"","","","");
}else {
    foreach ($data as $dataLine) 
    {
       if ($dataLine[0] == $id) 
       {
           $auto = $dataLine;
       }
    }
}
//var_dump($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
    input
    {
        height :100px;
        width : 200px;
    }
    </style>
</head>
<body>
<a href="index.php"><button>back</button></a>
    <form method = "POST" action = "edit.php">
    <input type="text" name= "naamAuto" placeholder="Naam van je auto" value = "<?php echo $auto[1];?>">
    <input type="text" name= "Foto" placeholder="Naam van je foto"value = "<?php echo $auto[2];?>">
    <input type="text" name= "Snelheid"placeholder="Maximum snelheid van je auto"value = "<?php echo $auto[3];?>">
    <input type="text" name= "Nultothonderd"placeholder="Tijd van 0 to 100 km/u"value = "<?php echo $auto[4];?>">
    <input type="submit">
    </form>
</body>
</html>