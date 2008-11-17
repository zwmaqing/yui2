<!-- AutoComplete begins -->
<h3>Search the Web Using Yahoo!'s Search API:</h3>
<div id="dashboard_autocomplete">
	<input id="dashboard_input" type="text" name="p">
	<div id="dashboard_container"></div>
</div>
<!-- AutoComplete ends -->

<!-- Panel begins -->
	
	<h3>Use the Controls Below to Customize the Behavior of the AutoComplete Instance Above:</h3>
    <form id="panel">
    
        <!-- The following is in a select to demonstrate the useIFrame feature -->
        <select><option>Customize configurations for AutoComplete</option></select>

        <div>
            <input id="animHoriz" type="checkbox">
            <label for="animHoriz">Animate Horizontally</label>
        </div>
        <div>
            <input id="animVert" type="checkbox" checked>
            <label for="animVert">Animate Vertically</label>
        </div>
        <div>
            <label for="animSpeedInput">Animation Speed: </label>
            <input id="animSpeedInput" type="text" size="2" value="0.3">
            <input id="animSpeed" type="button" value="Update">
        </div>
        <div>
            <input id="useShadow" type="checkbox">
            <label for="useShadow">Use Shadow</label>
        </div>
        <div>
            <input id="useIFrame" type="checkbox">
            <label for="useIFrame">Use IFrame</label>
        </div>
        <div>
            <input id="autoHighlight" type="checkbox" checked>
            <label for="autoHighlight">Automatically Highlight First Item</label>
        </div>
        <div>
            <input id="typeAhead" type="checkbox">
            <label for="typeAhead">Type Ahead</label>
        </div>
        <div>
            <input id="forceSelection" type="checkbox">
            <label for="forceSelection">Force a Selection</label>
        </div>
        <div>
            <label for="maxResultsDisplayedInput">Maximum Results: </label>
            <input id="maxResultsDisplayedInput" type="text" size="2" value="10">
            <input id="maxResultsDisplayed" type="button" value="Update">
        </div>
        <div>
            <label for="minQueryLengthInput">Minimum Query Length: </label>
            <input id="minQueryLengthInput" type="text" size="2" value="1">
            <input id="minQueryLength" type="button" value="Update">
        </div>
        <div>
            <label for="queryDelayInput">Query Delay: </label>
            <input id="queryDelayInput" type="text" size="2" value="0.2">
            <input id="queryDelay" type="button" value="Update">
        </div>
        <div>
            <label for="typeAheadDelayInput">TypeAhead Delay: </label>
            <input id="typeAheadDelayInput" type="text" size="2" value="0.2">
            <input id="typeAheadDelay" type="button" value="Update">
        </div>
        <div>
            <label for="delimCharInput">Delimiter Character(s) like ; or [";", ","]</label><br>
            <input id="delimCharInput" type="text" size="30" value="">
            <input id="delimChar" type="button" value="Update">
        </div>
        <div>
            <label for="highlightClassNameInput">Highlight Classname</label><br>
            <input id="highlightClassNameInput" type="text" size="30" value="yui-ac-highlight" maxlength="30">
            <input id="highlightClassName" type="button" value="Update">
        </div>
        <div>
            <label for="prehighlightClassNameInput">Pre-highlight Classname</label><br>
            <input id="prehighlightClassNameInput" type="text" size="30" value="" maxlength="30">
            <input id="prehighlightClassName" type="button" value="Update">
        </div>
        <div>
            <input id="allowBrowserAutocomplete" type="checkbox" checked>
            <label for="allowBrowserAutocomplete">Allow Browser Autocomplete</label>
        </div>
        <div>
            <input id="alwaysShowContainer" type="checkbox">
            <label for="alwaysShowContainer">Always Show Container</label>
        </div>
        <div>
            <label for="setHeaderInput">Set Header</label>
            <input id="setHeader" type="button" value="Update"><br>
            <textarea id="setHeaderInput" cols="25" rows="5"></textarea>
        </div>
        <div>
            <label for="setBodyInput">Set Body</label>
            <input id="setBody" type="button" value="Update"><br>
            <textarea id="setBodyInput" cols="25" rows="5"></textarea>
        </div>
        <div>
            <label for="setFooterInput">Set Footer</label>
            <input id="setFooter" type="button" value="Update"><br>
            <textarea id="setFooterInput" cols="25" rows="5"></textarea>
        </div>
    </form>
<!-- Panel ends -->

<script type="text/javascript">
YAHOO.example.Dashboard = function() {
return {

    myDataSource: null,
    myAutoComp: null,
    
    // Initialize widgets and the dashboard
    init:  function() {

        // DataSource
        this.myDataSource = new YAHOO.util.XHRDataSource("<?php echo $assetsDirectory; ?>php/ysearch_flat.php");
        this.myDataSource.responseSchema = {
             recordDelim: "\n",
             fieldDelim: "\t"
        };
        this.myDataSource.responseType = YAHOO.util.XHRDataSource.TYPE_TEXT;

        // AutoComplete
        this.myAutoComp = new YAHOO.widget.AutoComplete("dashboard_input","dashboard_container", this.myDataSource);

        // IFrame workaround for IE
        var ua = navigator.userAgent.toLowerCase();
        if(YAHOO.env.ua.ie < 7) {
            this.myAutoComp.useIFrame = true;
            YAHOO.util.Dom.get("useIFrame").checked = true;
        }

        // Dashboard DOM event handling (assign scope to the HTML Element)
        YAHOO.util.Event.addListener("animHoriz","click",this.handleCheckboxEvent,this);
        YAHOO.util.Event.addListener("animVert","click",this.handleCheckboxEvent,this);
        YAHOO.util.Event.addListener("useShadow","click",this.handleCheckboxEvent,this);
        YAHOO.util.Event.addListener("useIFrame","click",this.handleCheckboxEvent,this);
        YAHOO.util.Event.addListener("autoHighlight","click",this.handleCheckboxEvent,this);
        YAHOO.util.Event.addListener("typeAhead","click",this.handleCheckboxEvent,this);
        YAHOO.util.Event.addListener("forceSelection","click",this.handleCheckboxEvent,this);
        YAHOO.util.Event.addListener("allowBrowserAutocomplete","click",this.handleCheckboxEvent,this);
        YAHOO.util.Event.addListener("alwaysShowContainer","click",this.handleCheckboxEvent,this);

        YAHOO.util.Event.addListener("animSpeed","click",this.handleNumberInputEvent,this);
        YAHOO.util.Event.addListener("maxResultsDisplayed","click",this.handleNumberInputEvent,this);
        YAHOO.util.Event.addListener("minQueryLength","click",this.handleNumberInputEvent,this);
        YAHOO.util.Event.addListener("queryDelay","click",this.handleNumberInputEvent,this);
        YAHOO.util.Event.addListener("typeAheadDelay","click",this.handleNumberInputEvent,this);
        
        YAHOO.util.Event.addListener("delimChar","click",this.handleDelimiterInputEvent,this);

        YAHOO.util.Event.addListener("highlightClassName","click",this.handleTextInputEvent,this);
        YAHOO.util.Event.addListener("prehighlightClassName","click",this.handleTextInputEvent,this);

        YAHOO.util.Event.addListener("setHeader","click",this.handleTextareaEvent,this);
        YAHOO.util.Event.addListener("setBody","click",this.handleTextareaEvent,this);
        YAHOO.util.Event.addListener("setFooter","click",this.handleTextareaEvent,this);
    },
    
    // For valid inputs
    updateValue: function(property, value) {
        this.myAutoComp[property] = value;
        this.logSuccess(property);
    },

    // For invalid inputs
    revertInput: function(property) {
        YAHOO.util.Dom.get(property+"Input").value = this.myAutoComp[property];
        this.logFailure(property);
    },
    
    // Log success message
    logSuccess: function(property) {
        YAHOO.log("Updated " + property + " to " + this.myAutoComp[property] + ".", "info", "example");
    },

    // Log failure message
    logFailure: function(property, error) {
        YAHOO.log("Could not update " + property + ".", "warn","example");
    },

    // DOM event handler (scope assigned to the HTML Element)
    handleCheckboxEvent: function(e, oSelf) {
        var property = this.id;
        oSelf.updateValue(property, this.checked);
        
        if(oSelf.myAutoComp.useShadow && oSelf.myAutoComp.alwaysShowContainer) {
            YAHOO.log("The AutoComplete properties useShadow and alwaysShowContainer should not be enabled concurrently.","warn","example")
        }
    },
    
    // DOM event handler (scope assigned to the HTML Element)
    handleNumberInputEvent: function(e, oSelf) {
        var property = this.id;
        
        // Validate input
        var nValue = YAHOO.util.Dom.get(property+"Input").value*1;
        if(YAHOO.lang.isNumber(nValue)) {
            oSelf.updateValue(property, nValue);
        }
        else {
            oSelf.revertInput(property);
        }
    },
    
    // DOM event handler (scope assigned to the HTML Element)
    handleDelimiterInputEvent: function(e, oSelf) {
        var property = this.id;
        
        // Validate input
        var sValue = YAHOO.util.Dom.get(property+"Input").value;
        if((sValue.indexOf("[") == 0) &&
                (sValue.indexOf("]") == sValue.length-1) &&
                (sValue.indexOf("<") < 0) &&
                (sValue.indexOf(">") < 0)) {
            // Ok to turn into an array
            try {
                sValue = eval(sValue);
            }
            catch(e) {
                // Not ok
                oSelf.revertInput(property);
                return;
            }
        }
        else if(sValue.length !== 1){
            // Not ok
            oSelf.revertInput(property);
            return;
        }
        oSelf.updateValue(property, sValue);
    },
    
    // DOM event handler (scope assigned to the HTML Element)
    handleTextInputEvent: function(e, oSelf) {
        var property = this.id;
        oSelf.updateValue(property, YAHOO.util.Dom.get(property+"Input").value);
    },

    // DOM event handler (scope assigned to the HTML Element)
    handleTextareaEvent: function(e, oSelf) {
        var method = this.id;
        var value = YAHOO.util.Dom.get(method+"Input").value;
        switch(method) {
            case "setHeader":
                oSelf.myAutoComp.setHeader(value);
                break
            case "setBody":
                oSelf.myAutoComp.setBody(value);
                break;
            case "setFooter":
                oSelf.myAutoComp.setFooter(value);
                break;
        }
        YAHOO.log("Called " + method + "() with " + value, "info", "example");
    }
};
}();
YAHOO.util.Event.addListener(this,'load',YAHOO.example.Dashboard.init, YAHOO.example.Dashboard, true);
</script>
