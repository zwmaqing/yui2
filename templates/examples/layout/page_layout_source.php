<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Full Page Layout - Example</title>
<style type="text/css">
/*margin and padding on body element
  can introduce errors in determining
  element position and are not recommended;
  we turn them off as a foundation for YUI
  CSS treatments. */
body {
	margin:0;
	padding:0;
}
#toggle {
    text-align: center;
    padding: 1em;
}
#toggle a {
    padding: 0 5px;
    border-left: 1px solid black;
}
#tRight {
    border-left: none !important;
}
</style>
<link rel="stylesheet" type="text/css" href="../../build/reset-fonts-grids/reset-fonts-grids.css" />
<link rel="stylesheet" type="text/css" href="../../build/resize/assets/skins/sam/resize.css" />
<link rel="stylesheet" type="text/css" href="../../build/layout/assets/skins/sam/layout.css" />
<link rel="stylesheet" type="text/css" href="../../build/button/assets/skins/sam/button.css" />
<script type="text/javascript" src="../../build/yahoo/yahoo-min.js"></script>
<script type="text/javascript" src="../../build/event/event-min.js"></script>
<script type="text/javascript" src="../../build/dom/dom-min.js"></script>
<script type="text/javascript" src="../../build/element/element-beta-min.js"></script>
<script type="text/javascript" src="../../build/dragdrop/dragdrop-min.js"></script>
<script type="text/javascript" src="../../build/resize/resize-min.js"></script>
<script type="text/javascript" src="../../build/animation/animation-min.js"></script>
<script type="text/javascript" src="../../build/layout/layout-min.js"></script>


</head>

<body class=" yui-skin-sam">
<div id="top1"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p></div>
<div id="bottom1"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p></div>
<div id="right1">
    <b>Right 1</b>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
</div>
<div id="left1">
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
</div>
<div id="center1">
    <p id="toggle"><a href="#" id="tRight">Toggle Right</a><a href="#" id="tLeft">Toggle Left</a><a href="#" id="closeLeft">Close Left</a><a href="#" id="padRight">Add Gutter to Right</a></p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
</div>


<script>

(function() {
    var Dom = YAHOO.util.Dom,
        Event = YAHOO.util.Event;

    Event.onDOMReady(function() {
        var layout = new YAHOO.widget.Layout({
            units: [
                { position: 'top', height: 50, body: 'top1', header: 'Top', gutter: '5px', collapse: true, resize: true },
                { position: 'right', header: 'Right', width: 300, resize: true, gutter: '5px', footer: 'Footer', collapse: true, scroll: true, body: 'right1', animate: true },
                { position: 'bottom', header: 'Bottom', height: 100, resize: true, body: 'bottom1', gutter: '5px', collapse: true },
                { position: 'left', header: 'Left', width: 200, resize: true, body: 'left1', gutter: '5px', collapse: true, close: true, collapseSize: 50, scroll: true, animate: true },
                { position: 'center', body: 'center1' }
            ]
        });
        layout.on('render', function() {
            layout.getUnitByPosition('left').on('close', function() {
                closeLeft();
            });
        });
        layout.render();
        Event.on('tLeft', 'click', function(ev) {
            Event.stopEvent(ev);
            layout.getUnitByPosition('left').toggle();
        });
        Event.on('tRight', 'click', function(ev) {
            Event.stopEvent(ev);
            layout.getUnitByPosition('right').toggle();
        });
        Event.on('padRight', 'click', function(ev) {
            Event.stopEvent(ev);
            var pad = prompt('CSS gutter to apply: ("2px" or "2px 4px" or any combination of the 4 sides)', layout.getUnitByPosition('right').get('gutter'));
            layout.getUnitByPosition('right').set('gutter', pad);
        });
        var closeLeft = function() {
            var a = document.createElement('a');
            a.href = '#';
            a.innerHTML = 'Add Left Unit';
            Dom.get('closeLeft').parentNode.appendChild(a);

            Dom.setStyle('tLeft', 'display', 'none');
            Dom.setStyle('closeLeft', 'display', 'none');
            Event.on(a, 'click', function(ev) {
                Event.stopEvent(ev);
                Dom.setStyle('tLeft', 'display', 'inline');
                Dom.setStyle('closeLeft', 'display', 'inline');
                a.parentNode.removeChild(a);
                layout.addUnit(layout.get('units')[3]);
                layout.getUnitByPosition('left').on('close', function() {
                    closeLeft();
                });
            });
        };
        Event.on('closeLeft', 'click', function(ev) {
            Event.stopEvent(ev);
            layout.getUnitByPosition('left').close();
        });
    });


})();
</script>
</body>
</html>
