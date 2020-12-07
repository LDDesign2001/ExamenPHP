<?php
$images = array('bl','bn','cm','cn','et','gh','gj','gv','gy','lh','ml','pu','sg','to','tp','zi');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #body {
            background-color: blueviolet;
        }
        img.flag {
            width: 120px;
            height : 80px;
            opacity: 0.5;
        }
        .ok-button {
            position:absolute;
            width: 40px;
            height: 40px;
            top: -15px;
            right: -15px;
            opacity: 0.5;
        }
        .flag.active, .active {
            opacity: 1;
        }
        .container {
            margin-top: 20px;
            width: 760px;
            margin-left: auto;
            margin-right: auto;
        }
        div.flag {
            position:relative;
            float: left;
            width: 150px;
            height: 100px;
            text-align: center;
            border: 5px double lightgreen;
            padding: 20px 10px 0 10px;
            margin: 5px;
            background-color: lightyellow;
        }
    </style>
</head>

<body id="body">
<div class="container">
    <?php foreach ($images as $image) : ?>
        <div class="flag">
            <img class="flag" src="images/tn_<?php echo $image; ?>-flag.gif" />
            <a href="">
                <img class="ok-button" src="images/ok.png" />
            </a>
        </div>
    <?php endforeach ?>
</div>
</body>
</html>