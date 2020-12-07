<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('objects/Form.php');
    include('objects/FormValidator.php');

    $form = new Form();
    $form->setMessage(isset($_POST["message"]) ? $_POST["message"] : "");
    $form->setKnock(isset($_POST["knock"]) ? $_POST["knock"] : 0);
    $form->setRub(isset($_POST["rub"]) ? $_POST["rub"] : 0);

    $validator = new FormValidator();
    $validator->setForm($form);
    if ($validator->isValid()) {
        header('Location: welcome.php');
    } else {
        header('Location: fail.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        body { background: url('images/cave.jpg') no-repeat center center fixed; background-size: cover; }
        #knock-container { position:absolute; left: 15%; top: 70%; width: 200px; text-align: center; padding: 10px; font-size: 24px; font-weight: bold}
        #knock { width: 40px;}
        #rub-container { position:absolute; left: 70%; top: 70%; width: 200px; text-align: center; padding: 10px; font-size: 24px; font-weight: bold}
        #rub { width: 40px;}
        #message { position:absolute; left: 40%; top: 20%; width: 200px; text-align: center; font-size: 24px; font-weight: bold}
        #enter-container { position:absolute; left: 40%; top: 85%; width: 200px; text-align: center; padding: 10px; font-size: 24px; font-weight: bold}
    </style>
</head>
<body>
    <form action="index.php" method="post">
        <div class="input-element" id="knock-container">
            knock <input type="number" id="knock" name="knock"> times
        </div>
        <div class="input-element" id="rub-container">
            rub <input type="number" id="rub" name="rub"> times
        </div>
        <input type="text" id="message" name="message">
        <div class="input-element" id="enter-container">
            <input type="submit" value="enter">
        </div>

    </form>
</body>
</html>