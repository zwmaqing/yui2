<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Carousel: Circular Carousel</title>

    <link rel="stylesheet" type="text/css" href="../../build/fonts/fonts.css">
    <link type="text/css" rel="stylesheet" href="../../build/carousel/assets/skins/sam/carousel.css">

    <script type="text/javascript" src="../../build/yahoo-dom-event/yahoo-dom-event.js"></script>
    <script type="text/javascript" src="../../build/element/element-beta-min.js"></script>
    <script type="text/javascript" src="../../build/carousel/carousel-beta-min.js"></script>

    <style type="text/css">
    body {
        margin:0;
        padding:0;
    }

    #container {
        margin: 0 auto;
    }

    .yui-carousel-element li {
        height: 375px;
    }
    </style>

</head>
<body class="yui-skin-sam">
    <h1>Circular Carousel Example</h1>
    <!-- The Carousel container -->
    <div id="container">
        <ol id="carousel">
            <li>
                <img src="http://farm1.static.flickr.com/69/213130158_0d1aa23576_d.jpg"
                 height="375" width="500">
            </li>
            <li>
                <img src="http://farm1.static.flickr.com/72/213128367_74b0a657c3_d.jpg"
                 height="375" width="500">
            </li>
            <li>
                <img src="http://farm1.static.flickr.com/98/213129707_1f40c509fa_d.jpg"
                 height="375" width="500">
            </li>
            <li>
                <img src="http://farm1.static.flickr.com/59/213129191_b958880a96_d.jpg"
                 height="375" width="500">
            </li>
            <li>
                <img src="http://farm1.static.flickr.com/92/214077367_77ae970965_d.jpg"
                 height="375" width="500">
            </li>
            <li>
                <img src="http://farm1.static.flickr.com/81/214076446_18fe6a6c91_d.jpg"
                 height="375" width="500">
            </li>
            <li>
                <img src="http://farm1.static.flickr.com/93/214075781_0604edb894_d.jpg"
                 height="375" width="500">
            </li>
            <li>
                <img src="http://farm1.static.flickr.com/40/214075243_ea66c4cb31_d.jpg"
                 height="375" width="500">
            </li>
            <li>
                <img src="http://farm1.static.flickr.com/67/214074120_33933bf232_d.jpg"
                 height="375" width="500">
            </li>
            <li>
                <img src="http://farm1.static.flickr.com/79/214073568_f16d1ffce7_d.jpg"
                 height="375" width="500">
            </li>
        </ol>
    </div>
    <script>
    (function () {
        var carousel;
                
        YAHOO.util.Event.onDOMReady(function (ev) {
            var carousel    = new YAHOO.widget.Carousel("container", {
                        isCircular: true, numVisible: 1
                });

            carousel.render(); // get ready for rendering the widget
            carousel.show();   // display the widget
        });
    })();
    </script>
</body>
</html>
