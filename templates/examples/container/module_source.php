<style type="text/css">
	.yui-module { border:1px dotted black;padding:5px;margin:10px; display:none; }
	.yui-module .hd { border:1px solid red;padding:5px; }
	.yui-module .bd { border:1px solid green;padding:5px; }
	.yui-module .ft { border:1px solid blue;padding:5px; }
</style>

<script type="text/javascript">

    YAHOO.namespace("example.container");

    YAHOO.util.Event.onDOMReady(function () {

        YAHOO.example.container.module1 = new YAHOO.widget.Module("module1", { visible: false });
        YAHOO.example.container.module1.render();

        YAHOO.example.container.module2 = new YAHOO.widget.Module("module2", { visible: false });
        YAHOO.example.container.module2.setHeader("Module #2 from Script");
        YAHOO.example.container.module2.setBody("This is a dynamically generated Module.");
        YAHOO.example.container.module2.setFooter("End of Module #2");
        YAHOO.example.container.module2.render();

        YAHOO.util.Event.addListener("show1", "click", YAHOO.example.container.module1.show, YAHOO.example.container.module1, true);
        YAHOO.util.Event.addListener("hide1", "click", YAHOO.example.container.module1.hide, YAHOO.example.container.module1, true);

        YAHOO.util.Event.addListener("show2", "click", YAHOO.example.container.module2.show, YAHOO.example.container.module2, true);
        YAHOO.util.Event.addListener("hide2", "click", YAHOO.example.container.module2.hide, YAHOO.example.container.module2, true);

    });

</script>

<div>
	<button id="show1">Show module1</button> 
	<button id="hide1">Hide module1</button>
</div>

<div id="module1">
	<div class="hd">Module #1 from Markup</div>
	<div class="bd">This is a Module that was marked up in the document.</div>
	<div class="ft">End of Module #1</div>
</div>

<div id="module2"></div>

<div>
	<button id="show2">Show module2</button> 
	<button id="hide2">Hide module2</button>
</div>