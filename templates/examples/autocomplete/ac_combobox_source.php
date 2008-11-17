<h3>What would you like for breakfast?</h3>
<div id="bAutoComplete">
    <input id="bInput" type="text"> <span id="toggleB"></span>
	<div id="bContainer"></div>
</div>

<h3>What would you like for lunch?</h3>
<div id="lAutoComplete">
	<input id="lInput" type="text"> <span id="toggleL"></span>
	<div id="lContainer"></div>
</div>

<h3>What would you like for dinner?</h3>
<div id="dAutoComplete">
	<input id="dInput" type="text"> <span id="toggleD"></span>
	<div id="dContainer"></div>
</div>

<script type="text/javascript" src="<?php echo $assetsDirectory; ?>js/data.js"></script>
<script type="text/javascript">
YAHOO.example.Combobox = function() {
    // Instantiate DataSources
    var bDS = new YAHOO.util.LocalDataSource(YAHOO.example.Data.menu.breakfasts);
    var lDS = new YAHOO.util.LocalDataSource(YAHOO.example.Data.menu.lunches);
    var dDS = new YAHOO.util.LocalDataSource(YAHOO.example.Data.menu.dinners);

    // Instantiate AutoCompletes
    var oConfigs = {
        prehighlightClassName: "yui-ac-prehighlight",
        useShadow: true,
        queryDelay: 0,
        minQueryLength: 0,
        animVert: .01
    }
    var bAC = new YAHOO.widget.AutoComplete("bInput", "bContainer", bDS, oConfigs);
    var lAC = new YAHOO.widget.AutoComplete("lInput", "lContainer", lDS, oConfigs);
    var dAC = new YAHOO.widget.AutoComplete("dInput", "dContainer", dDS, oConfigs);
    
    // Breakfast combobox
    var bToggler = YAHOO.util.Dom.get("toggleB");
    var oPushButtonB = new YAHOO.widget.Button({container:bToggler});
    var toggleB = function(e) {
        //YAHOO.util.Event.stopEvent(e);
        if(!YAHOO.util.Dom.hasClass(bToggler, "open")) {
            YAHOO.util.Dom.addClass(bToggler, "open")
        }
        
        // Is open
        if(bAC.isContainerOpen()) {
            bAC.collapseContainer();
        }
        // Is closed
        else {
            bAC.getInputEl().focus(); // Needed to keep widget active
            setTimeout(function() { // For IE
                bAC.sendQuery("");
            },0);
        }
    }
    oPushButtonB.on("click", toggleB);
    bAC.containerCollapseEvent.subscribe(function(){YAHOO.util.Dom.removeClass(bToggler, "open")});
    
    // Lunch combobox
    var lToggler = YAHOO.util.Dom.get("toggleL");
    var oPushButtonL = new YAHOO.widget.Button({container:lToggler});
    var toggleL = function(e) {
        //YAHOO.util.Event.stopEvent(e);
        if(!YAHOO.util.Dom.hasClass(lToggler, "open")) {
            YAHOO.util.Dom.addClass(lToggler, "open")
        }
        
        // Is open
        if(lAC.isContainerOpen()) {
            lAC.collapseContainer();
        }
        // Is closed
        else {
            lAC.getInputEl().focus(); // Needed to keep widget active
            setTimeout(function() { // For IE
                lAC.sendQuery("");
            },0);
        }
    }
    oPushButtonL.on("click", toggleL);
    lAC.containerCollapseEvent.subscribe(function(){YAHOO.util.Dom.removeClass(lToggler, "open")});

    // Dinner combobox
    var dToggler = YAHOO.util.Dom.get("toggleD");
    var oPushButtonD = new YAHOO.widget.Button({container:dToggler});
    var toggleD = function(e) {
        //YAHOO.util.Event.stopEvent(e);
        if(!YAHOO.util.Dom.hasClass(dToggler, "open")) {
            YAHOO.util.Dom.addClass(dToggler, "open")
        }
        
        // Is open
        if(dAC.isContainerOpen()) {
            dAC.collapseContainer();
        }
        // Is closed
        else {
            dAC.getInputEl().focus(); // Needed to keep widget active
            setTimeout(function() { // For IE
                dAC.sendQuery("");
            },0);
        }
    }
    oPushButtonD.on("click", toggleD);
    dAC.containerCollapseEvent.subscribe(function(){YAHOO.util.Dom.removeClass(dToggler, "open")});

    return {
        bDS: bDS,
        bAC: bAC,
        lDS: lDS,
        lAC: lAC,
        dDS: dDS,
        dAC: dAC
    };
}();
</script>
