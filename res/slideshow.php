<!DOCTYPE html> <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>An HTML5 Slideshow w/ Canvas & jQuery | Tutorialzine Demo</title>

<link rel="stylesheet" type="text/css" href="res/styles.css" />

</head>

<body>    

<div id="slideshow">

    <ul class="slides">
        <li><img src="res/img/photos/1.jpg" width="285" height="140" alt="Monthly Girlds Nozaki Kun" /></li>
        <li><img src="res/img/photos/2.png" width="285" height="140" alt="Saga of Tanya the Evil" /></li>
        <li><img src="res/img/photos/3.jpg" width="285" height="140" alt="Kiznaiver" /></li>
        <li><img src="res/img/photos/4.jpg" width="285" height="140" alt="Golden Time" /></li>
        <!--<li><img src="res/img/photos/5.jpg" width="285" height="140" alt="Tonari no Kaibutsu kun" /></li>
        <li><img src="res/img/photos/6.jpg" width="285" height="140" alt="Yona" /></li>-->
        <!--text to be included/commented as appropriate:-->
        <li>
            <canvas style="display: none;" height="140" width="285"></canvas>
            <div style="background-color: white; height:140px; width:285px;">
                <h2 style="text-align: center; color: red; line-height: 140px;"><b>AND MORE!</b></h2>
            </div>
        </li>
        <!--
        <li>
            <canvas style="display: none;" height="140" width="285"></canvas>
            <div style="background-color: white; height:140px; width:285px;">
                <h2 style="text-align: center; color: red; line-height: 140px;"><b>TO BE ANNOUNCED</b></h2>
            </div>
        </li>
        -->
    </ul>

    <span class="arrow previous"></span>
    <span class="arrow next"></span>

</div>

</body>
</html>
