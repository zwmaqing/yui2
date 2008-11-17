<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Layout inside a resizable Panel</title>
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

#demo .yui-resize-handle-br {
    height: 11px;
    width: 11px;
    background-position: -20px -60px;
    background-color: transparent;
}

</style>
<link rel="stylesheet" type="text/css" href="../../build/reset-fonts-grids/reset-fonts-grids.css" />
<link rel="stylesheet" type="text/css" href="../../build/container/assets/skins/sam/container.css" />
<link rel="stylesheet" type="text/css" href="../../build/resize/assets/skins/sam/resize.css" />
<link rel="stylesheet" type="text/css" href="../../build/layout/assets/skins/sam/layout.css" />
<link rel="stylesheet" type="text/css" href="../../build/button/assets/skins/sam/button.css" />
<script type="text/javascript" src="../../build/yahoo/yahoo-min.js"></script>
<script type="text/javascript" src="../../build/event/event-min.js"></script>
<script type="text/javascript" src="../../build/dom/dom-min.js"></script>
<script type="text/javascript" src="../../build/element/element-beta-min.js"></script>
<script type="text/javascript" src="../../build/dragdrop/dragdrop-min.js"></script>
<script type="text/javascript" src="../../build/container/container-min.js"></script>
<script type="text/javascript" src="../../build/resize/resize-min.js"></script>
<script type="text/javascript" src="../../build/animation/animation-min.js"></script>
<script type="text/javascript" src="../../build/layout/layout-min.js"></script>
</head>
<body class=" yui-skin-sam">

<div id="demo"></div>

<script>
(function() {
    var Dom = YAHOO.util.Dom,
        Event = YAHOO.util.Event,
        layout = null,
        resize = null;

    Event.onDOMReady(function() {
        var panel = new YAHOO.widget.Panel('demo', {
            draggable: true,
            close: false,
            autofillheight: "body", // default value, specified here to highlight its use in the example            
            underlay: 'none',
            width: '500px',
            xy: [100, 100]
        });
        panel.setHeader('Test Panel');
        panel.setBody('<div id="layout"></div>');
        panel.beforeRenderEvent.subscribe(function() {
            Event.onAvailable('layout', function() {
                layout = new YAHOO.widget.Layout('layout', {
                    height: 400,
                    width: 480,
                    units: [
                        { position: 'top', height: 25, resize: false, body: 'Top', gutter: '2' },
                        { position: 'left', width: 150, resize: true, body: 'Left', gutter: '0 5 0 2', minWidth: 150, maxWidth: 300 },
                        { position: 'bottom', height: 25, body: 'Bottom', gutter: '2' },
                        { position: 'center', body: 'Center Unit', gutter: '0 2 0 0' }
                    ]
                });

                layout.render();
            });
        });
        panel.render();
        resize = new YAHOO.util.Resize('demo', {
            handles: ['br'],
            autoRatio: true,
            status: false,
            minWidth: 380,
            minHeight: 400
        });
        resize.on('resize', function(args) {
            var panelHeight = args.height,
            padding = 20;
            //Hack to trick IE into behaving
            Dom.setStyle('layout', 'display', 'none');
            this.cfg.setProperty("height", panelHeight + 'px');
            layout.set('height', this.body.offsetHeight - padding);
            layout.set('width', this.body.offsetWidth - padding);
            //Hack to trick IE into behaving
            Dom.setStyle('layout', 'display', 'block');
            layout.resize();
            
        }, panel, true);
    });
})();

</script>
</body>
</html>
