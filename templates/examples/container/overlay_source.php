<style>
	.yui-overlay { position:absolute;background:#fff;border:1px dotted black;padding:5px;margin:10px; }
	.yui-overlay .hd { border:1px solid red;padding:5px; }
	.yui-overlay .bd { border:1px solid green;padding:5px; }
	.yui-overlay .ft { border:1px solid blue;padding:5px; }

	#ctx { background:orange;width:100px;height:25px; }
	
	#example {height:15em;}
</style>

<script>
		YAHOO.namespace("example.container");

		function init() {
			// Build overlay1 based on markup, initially hidden, fixed to the center of the viewport, and 300px wide
			YAHOO.example.container.overlay1 = new YAHOO.widget.Overlay("overlay1", { fixedcenter:true,
																					  visible:false,
																					  width:"300px" } );
			YAHOO.example.container.overlay1.render();
			YAHOO.log("Overlay1 rendered.", "info", "example");

			// Build overlay2 dynamically, initially hidden, at position x:400,y:500, and 300px wide
			YAHOO.example.container.overlay2 = new YAHOO.widget.Overlay("overlay2", { xy:[600,200],
																					  visible:false,
																					  width:"300px" } );
			YAHOO.example.container.overlay2.setHeader("Overlay #2 from Script");
			YAHOO.example.container.overlay2.setBody("This is a dynamically generated Overlay.");
			YAHOO.example.container.overlay2.setFooter("End of Overlay #2");
			YAHOO.example.container.overlay2.render(document.body);
			YAHOO.log("Overlay2 rendered.", "info", "example");

			// Build overlay3 dynamically, initially hidden, aligned to context element "context", and 200px wide

            // Re-align just before the overlay is shown and whenever the window is resized to account for changes in the position  
            // of the context element after the initial context alignment 
			YAHOO.example.container.overlay3 = new YAHOO.widget.Overlay("overlay3", { context:["ctx","tl","bl", ["beforeShow", "windowResize"]],
																					  visible:false,
																					  width:"200px" } );
			YAHOO.example.container.overlay3.setHeader("Overlay #3 from Script");
			YAHOO.example.container.overlay3.setBody("This is a dynamically generated Overlay.");
			YAHOO.example.container.overlay3.setFooter("End of Overlay #3");
			YAHOO.example.container.overlay3.render(document.body);
			YAHOO.log("Overlay3 rendered.", "info", "example");

			YAHOO.util.Event.addListener("show1", "click", YAHOO.example.container.overlay1.show, YAHOO.example.container.overlay1, true);
			YAHOO.util.Event.addListener("hide1", "click", YAHOO.example.container.overlay1.hide, YAHOO.example.container.overlay1, true);

			YAHOO.util.Event.addListener("show2", "click", YAHOO.example.container.overlay2.show, YAHOO.example.container.overlay2, true);
			YAHOO.util.Event.addListener("hide2", "click", YAHOO.example.container.overlay2.hide, YAHOO.example.container.overlay2, true);

			YAHOO.util.Event.addListener("show3", "click", YAHOO.example.container.overlay3.show, YAHOO.example.container.overlay3, true);
			YAHOO.util.Event.addListener("hide3", "click", YAHOO.example.container.overlay3.hide, YAHOO.example.container.overlay3, true);
		}

		YAHOO.util.Event.addListener(window, "load", init);
</script>


<div>
	overlay1:
	<button id="show1">Show</button>
	<button id="hide1">Hide</button>
</div>
<div>
	overlay2:
	<button id="show2">Show</button>
	<button id="hide2">Hide</button>
</div>
<div>
	overlay3:
	<button id="show3">Show</button>
	<button id="hide3">Hide</button>
</div>

<div id="ctx">Align to me</div>

<div id="overlay1" style="visibility:hidden">
	<div class="hd">Overlay #1 from Markup</div>
	<div class="bd">This is a Overlay that was marked up in the document.</div>
	<div class="ft">End of Overlay #1</div>
</div>
