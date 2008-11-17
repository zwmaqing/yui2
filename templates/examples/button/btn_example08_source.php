<script type="text/javascript">

    YAHOO.example.init = function () {

        // "contentready" event handler for the "splitbuttonsfrommarkup" <fieldset>

        YAHOO.util.Event.onContentReady("splitbuttonsfrommarkup", function () {

            // Create a Button using an existing <input> element as a data source

            var oSplitButton1 = new YAHOO.widget.Button("splitbutton1", { type: "split", menu: "splitbutton1select" });

            var oSplitButton2 = new YAHOO.widget.Button("splitbutton2", { type: "split", menu: "splitbutton2select" });
            
            // Create a Button using an existing <input> element and a YAHOO.widget.Overlay instance as its menu
            
            var oSplitButton3 = new YAHOO.widget.Button("splitbutton3", { type: "split", menu: "splitbutton3menu" });
        
        });


        // Create a Button without using existing markup    

        //  Create an array of YAHOO.widget.MenuItem configuration properties

        var aSplitButton4Menu = [
        
            { text: "one", value: 1 },
            { text: "two", value: 2 },
            { text: "three", value: 3 }
        
        ];

        /*
            Instantiate a Split Button using the array of YAHOO.widget.MenuItem 
            configuration properties as the value for the "menu" configuration 
            attribute.
        */

        var oSplitButton4 = new YAHOO.widget.Button({ type: "split",  label: "Split Button 4", name: "splitbutton3", menu: aSplitButton4Menu, container: "splitbuttonsfromjavascript" });

        /*
            Search for an element to place the Split Button into via the 
            Event utilities "onContentReady" method
        */

        YAHOO.util.Event.onContentReady("splitbuttonsfromjavascript", function () {
        
            // Instantiate an Overlay instance
        
            var oOverlay = new YAHOO.widget.Overlay("splitbutton5menu", { visible: false });
            
            oOverlay.setBody("Split Button 5 Menu");


            // Instantiate a Split Button

            var oSplitButton5 = new YAHOO.widget.Button({ type: "split",  label: "Split Button 5", menu: oOverlay });

            /*
                 Append the Split Button and Overlay to the element with the id 
                 of "splitbuttonsfromjavascript"
            */

            oSplitButton5.appendTo(this);

            oOverlay.render(this);
                            
        });


        function onExampleSubmit(p_oEvent) {

            var bSubmit = window.confirm("Are you sure you want to submit this form?");

            if(!bSubmit) {
            
                YAHOO.util.Event.preventDefault(p_oEvent);
            
            }

        }

        YAHOO.util.Event.on("button-example-form", "submit", onExampleSubmit);
    
    } ();

</script>

<form id="button-example-form" name="button-example-form" method="post">

    <fieldset id="splitbuttons">
        <legend>Split Buttons</legend>

        <fieldset id="splitbuttonsfrommarkup">
            <legend>From Markup</legend>

            <input type="submit" id="splitbutton1" name="splitbutton1_button" value="Split Button 1">
            <select id="splitbutton1select" name="splitbutton1select" multiple>
                <option value="0">One</option>
                <option value="1">Two</option>
                <option value="2">Three</option>                
            </select>

            <input type="button" id="splitbutton2" name="splitbutton2_button" value="Split Button 2">
            <select id="splitbutton2select" name="splitbutton2select">
                <option value="0">One</option>
                <option value="1">Two</option>
                <option value="2">Three</option>                
            </select>

            <input type="button" id="splitbutton3" name="splitbutton3_button" value="Split Button 3">
            <div id="splitbutton3menu" class="yui-overlay">
                <div class="bd">Split Button 3 Menu</div>
            </div>

        </fieldset>

        <fieldset id="splitbuttonsfromjavascript">
            <legend>From JavaScript</legend>
        </fieldset>

    </fieldset> 

</form>