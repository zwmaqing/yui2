<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>ProfileViewer: Profiling Calendar with a German UI</title>
<link rel="stylesheet" type="text/css" href="../../build/reset/reset.css"> 
<link rel="stylesheet" type="text/css" href="../../build/base/base.css"> 
<link rel="stylesheet" type="text/css" href="../../build/fonts/fonts.css"> 
<link rel="stylesheet" type="text/css" href="../../build/calendar/assets/skins/sam/calendar.css"> 
<link rel="stylesheet" type="text/css" href="../../build/profilerviewer/assets/skins/sam/profilerviewer.css"> 

<script type="text/javascript" src="../../build/utilities/utilities.js"></script>
<script type="text/javascript" src="../../build/element/element-beta-min.js"></script>
<script type="text/javascript" src="../../build/calendar/calendar.js"></script>
<script type="text/javascript" src="../../build/profiler/profiler-min.js"></script>
<script type="text/javascript" src="../../build/profilerviewer/profilerviewer-beta-min.js"></script>

<style type="text/css">
	body {
		margin:1em;
	}
</style>

</head>

<body class="yui-skin-sam">

<h1>Internationalizing the ProfilerViewer Interface: German</h1>

<p>The <a href="http://developer.yahoo.com/yui/profilerviewer/">ProfilerViewer Control</a> can be easily internationalized by modifying the <code>STRINGS</code> member of <code>YAHOO.widget.ProfilerViewer</code>  In this example, a German translation provided by Christian Heilmann is applied to the UI.</p>

<div id="profiler">
<!--ProfilerViewer will be inserted here.-->
</div>

<div id="cal1container">
<!--Calendar instance will be inserted here.-->
</div>

<script type="text/javascript">

YAHOO.widget.ProfilerViewer.STRINGS = {
	title: "YUI Profiler (beta)",
	buttons: {
		viewprofiler: "Profiler Daten anzeigen",
		hideprofiler: "Profiler Report verstecken",
		showchart: "Diagramm anzeigen",
		hidechart: "Diagramm verstecken",
		refreshdata: "Daten neu laden"
	},
	colHeads: {
    	//key: [column label, column width in px]
		fn: ["Funktion/Methode", null],
		calls: ["Aufrufe", 60],
		avg: ["Durchschnitt", 90],
		min: ["Schnellste", 80],
		max: ["Langsamste", 85],
		total: ["Zeit total", 80],
		pct: ["Prozent", 70]
	},
	millisecondsAbbrev: "ms",
	initMessage: "Diagramm wird vorbereitet...",
	installFlashMessage: "Konnte Flash Inhalt nicht laden. YUI Charts Control erfordert Flash Player 9.0.45 or neuer. Bitten laden Sie die neueste Version des Flash Players beim <a href='http://www.adobe.com/go/getflashplayer'>Adobe Flash Player Download Center</a> herunter."
};



	
	YAHOO.namespace("example.calendar");

	YAHOO.example.calendar.init = function() {
		YAHOO.example.calendar.cal1 = new YAHOO.widget.Calendar("cal1","cal1container");
		YAHOO.tool.Profiler.registerObject("cal1", YAHOO.example.calendar.cal1 );
		YAHOO.example.calendar.cal1.render();

		var pv = new YAHOO.widget.ProfilerViewer("profiler", {
			visible: true, //expand the viewer mmediately after instantiation
			showChart: true,
			base:"../../build/",
			swfUrl: "../../build/charts/assets/charts.swf"
		});
		
		//Just to make the instance publicly accessible via the console:
		YAHOO.example.pv = pv;
		
	}

	YAHOO.util.Event.onDOMReady(YAHOO.example.calendar.init);
	
</script>
</body>
</html>
