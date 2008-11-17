<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>ProfileViewer: Profiling Calendar</title>
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

<h1>Simple Profiling of a YUI Calendar Control Instance</h1>

<p>In this simple example, the <a href="http://developer.yahoo.com/yui/profilerviewer/">ProfilerViewer Control</a> is used to profile an instance of the <a href="http://developer.yahoo.com/yui/calendar/">YUI Calendar Control</a>. Interact with the calendar interface, then activate the ProfilerViewer to see the profile data. You can then continue to interact with the calendar, refreshing the data in the ProfilerViewer to update the profiling display.</p>

<div id="profiler">
<!--ProfilerViewer will be inserted here.-->
</div>

<div id="cal1container">
<!--Calendar instance will be inserted here.-->
</div>

<script type="text/javascript">
	
	YAHOO.namespace("example.calendar");

	YAHOO.example.calendar.init = function() {
		//instantiate Calendar:
		YAHOO.example.calendar.cal1 = new YAHOO.widget.Calendar("cal1","cal1container");
		
		//profile the instance, labeling it "cal1":
		YAHOO.tool.Profiler.registerObject("cal1", YAHOO.example.calendar.cal1 );
		
		//render the Calendar; after this line, the Calendar is on the page,
		//ready to be used; all the while, Profiler will be tracking the time
		//spent in each function:
		YAHOO.example.calendar.cal1.render();
		
		YAHOO.example.pv = new YAHOO.widget.ProfilerViewer("profiler", {
			showChart: true, //we want to see the pretty charts!
			base:"../../build/", //path to YUI assets; if you leave this
								 //blank, files will be drawn from 
								 //yui.yahooapis.com.
			//path to Charts Control swf file; if left blank, we'll
			//use the one from yui.yahooapis.com; this path is relative
			//to your current HTML page:
			swfUrl: "../../build/charts/assets/charts.swf",
			
			//In this case we only want to see functions that have
			//been called at least once and that have the "cal1"
			//label associated with them in Profiler:
			filter: function(o) {
				//Only show functions that have been called at least
				//once and that are part of the cal1 object:
				return ((o.calls > 0) && (o.fn.indexOf("cal1") > -1));
			}
		});

	}
	
	//Run the calendar.innit function only when the Dom is fully loaded:
	YAHOO.util.Event.onDOMReady(YAHOO.example.calendar.init);
	
</script>
