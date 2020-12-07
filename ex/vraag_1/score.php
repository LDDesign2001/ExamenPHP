<?php
include('data.php');

$composerId = isset($_GET["composer"]) ? $_GET["composer"] : 0;
$scoreId = isset($_GET["score"]) ? $_GET["score"] : 0;

$composer = $composers[$composerId];
$score = $composer["scores"][$scoreId];
?>


<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        body {background-color: #a9a9a9}
        #controls-container {width: 120px; margin:auto; background-color: lightgreen; padding:3px; margin-bottom: 5px;}
        #controls-container:after {content: ''; display: block; clear: both; }
        .controls { float: left; width: 60px; text-align: center}
        .control-action { width: 30px; cursor: pointer; font-weight: bold; font-size: 16px;}
        #pdf-container {border:1px solid black; width: 908px; margin-left:auto; margin-right:auto}
        h1, h2{ text-align: center}
    </style>
</head>
<body>

<p><a href="index.php?composer=<?php echo $composerId; ?>">back</a></p>
<h1><?php echo $score["name"]; ?></h1>
<h2><?php echo $composer["name"]; ?></h2>
<div>
    <div id="controls-container">
        <div class="controls control-action" id="previous-page"><</div>
        <div class="controls"><span id="current-page"></span> / <span id="num-pages"></span></div>
        <div class="controls control-action" id="next-page">></div>
    </div>
    <div id="pdf-container">
        <canvas id="pdf-canvas"></canvas>
    </div>
</div>

<script src="js/pdf.js"></script>
<script>
    var url = 'docs/<?php echo $score["filename"];?>';
    var pageNumber = <?php echo $score["page"];?>;

    // The workerSrc property shall be specified.
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'js/pdf.worker.js';

    // Asynchronous download of PDF
    var loadingTask = pdfjsLib.getDocument(url);
    loadingTask.promise.then(function(pdf) {
        console.log('PDF loaded');
        var numPages = pdf.numPages;
        document.getElementById('num-pages').innerHTML = numPages;
        console.log(numPages + " pages");
        loadPage(pdf, pageNumber);
        document.getElementById('next-page').onclick = function(e){
            if (pageNumber<numPages) pageNumber++;
            loadPage(pdf, pageNumber);
        }
        document.getElementById('previous-page').onclick = function(e){
            if (pageNumber>1) pageNumber--;
            loadPage(pdf, pageNumber);
        }
    }, function (reason) {
        // PDF loading error
        console.error(reason);
    });

    function loadPage(pdf, pageNumber) {
        pdf.getPage(pageNumber).then(function(page) {
            console.log('Page '+pageNumber+' loaded');
            document.getElementById('current-page').innerHTML = pageNumber;

            var scale = 1.5;
            var viewport = page.getViewport({scale: scale});

            // Prepare canvas using PDF page dimensions
            var canvas = document.getElementById('pdf-canvas');
            var context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            var pdfContainer = document.getElementById('pdf-container');
            pdfContainer.setAttribute("style","width:"+viewport.width+"px");
            console.log(viewport.width);

            // Render PDF page into canvas context
            var renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            var renderTask = page.render(renderContext);
            renderTask.promise.then(function () {
                console.log('Page rendered');
            });
        });
    }
</script>
</body>
</html>