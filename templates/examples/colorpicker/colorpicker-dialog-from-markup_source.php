<script type="text/javascript">

//create a namespace object in the example namespace:
YAHOO.namespace("example.colorpicker")

//create a new object for this module:
YAHOO.example.colorpicker.inDialog = function() {

	//Some shortcuts to use in our example:
	var Event=YAHOO.util.Event,
		Dom=YAHOO.util.Dom,
		lang=YAHOO.lang;

	return {
	
		//In our initialization function, we'll create the dialog;
		//in its render event, we'll create our Color Picker instance.
        init: function() {

            // Instantiate the Dialog
            this.dialog = new YAHOO.widget.Dialog("yui-picker-panel", { 
				width : "500px",
				fixedcenter : true,
				visible : false, 
				constraintoviewport : true,
				buttons : [ { text:"Submit", handler:this.handleSubmit, isDefault:true },
							{ text:"Cancel", handler:this.handleCancel } ]
             });
 
			// Once the Dialog renders, we want to create our Color Picker
			// instance.
            this.dialog.renderEvent.subscribe(function() {
				if (!this.picker) { //make sure that we haven't already created our Color Picker
					YAHOO.log("Instantiating the color picker", "info", "example");
					this.picker = new YAHOO.widget.ColorPicker("yui-picker", {
						container: this.dialog
						//Here are some other configurations we could use for our Picker:
						//showcontrols: false,  // default is true, false hides the entire set of controls
						//showhexcontrols: true, // default is false
						//showhsvcontrols: true  // default is false
					});

					//listen to rgbChange to be notified about new values
					this.picker.on("rgbChange", function(o) {
						YAHOO.log(lang.dump(o), "info", "example");
					});
				}
			});	
			
			// If we wanted to do form validation on our Dialog, this
			// is where we'd do it.  Remember to return true if validation
			// passes; otherwise, your Dialog's submit method won't submit.
            this.dialog.validate = function() {
				return true;
            };

            // Wire up the success and failure handlers
            this.dialog.callback = { success: this.handleSuccess, thisfailure: this.handleFailure };
            
            // We're all set up with our Dialog's configurations;
			// now, render the Dialog
            this.dialog.render();
			
			// We can wrap up initialization by wiring all of the buttons in our
			// button dashboard to selectively show and hide parts of the
			// Color Picker interface.  Remember that "Event" here is an
			// alias for YAHOO.util.Event and "Event.on" is therfor a shortcut
			// for YAHOO.util.Event.onAvailable -- the standard Dom event attachment
			// method:
            Event.on("show", "click", this.dialog.show, this.dialog, true);
            Event.on("hide", "click", this.dialog.hide, this.dialog, true);
            Event.on("btnhsv", "click", function(e) {
                        var p = this.picker;
                        p.set(p.OPT.SHOW_HSV_CONTROLS, !p.get(p.OPT.SHOW_HSV_CONTROLS));
                    }, this.dialog, true);
            Event.on("btnhex", "click", function(e) {
                        var p = this.picker;
                        p.set(p.OPT.SHOW_HEX_CONTROLS, !p.get(p.OPT.SHOW_HEX_CONTROLS));
                    }, this.dialog, true);
            Event.on("btnrgb", "click", function(e) {
                        var p = this.picker;
                        p.set(p.OPT.SHOW_RGB_CONTROLS, !p.get(p.OPT.SHOW_RGB_CONTROLS));
                    }, this.dialog, true);
            Event.on("btnhexsummary", "click", function(e) {
                        var p = this.picker;
                        p.set(p.OPT.SHOW_HEX_SUMMARY, !p.get(p.OPT.SHOW_HEX_SUMMARY));
                    }, this.dialog, true);
			
			//initialization complete:
			YAHOO.log("Example initialization complete.", "info", "example");

		},
		
		//We'll wire this to our Dialog's submit button:
		handleSubmit: function() {
			//submit the Dialog:
			this.submit();
			//log this step to logger:
			YAHOO.log("Dialog was submitted.", "info", "example");
		},
 
 		//If the Dialog's cancel button is clicked,
		//this function fires
		handleCancel: function() {
			//the cancel method automatically hides the Dialog:
			this.cancel();
			//log this step to logger:
			YAHOO.log("Dialog was submitted.", "info", "example");
		},
		
		//We'll use Connection Manager to post our form data to the
		//server; here, we set up our "success" handler.
		handleSuccess: function(o) {
			YAHOO.log("Connection Manager returned results to the handleSuccess method.", "info", "example");
			var response = o.responseText;
			//On Yahoo servers, we may get some page stamping;
			//we can trim off the trailing comment:
			response = response.split("<!")[0];
			//write the response to the page:
			response = "<strong>The data received by the server was the following:</strong> " + response;
			document.getElementById("resp").innerHTML = response;
		},
		
		handleFailure: function(o) {
			YAHOO.log("Connection Manager returned results to the handleFailure method.", "error", "example");
			YAHOO.log("Response object:" + lang.dump(o), "error", "example");
		}
   
	}


}();

//The earliest safe moment to instantiate a Dialog (or any
//Container element is onDOMReady; we'll initialize then:
YAHOO.util.Event.onDOMReady(YAHOO.example.colorpicker.inDialog.init, YAHOO.example.colorpicker.inDialog, true);

</script>


<!--Begin markup for configurations dashboard-->
<div>
	<button id="show">Show Color Picker</button> 
	<button id="hide">Hide Color Picker</button>
	<button id="btnhsv">Show/hide HSV fields</button>
	<button id="btnhex">Show/hide HEX field</button>
	<button id="btnrgb">Show/hide RGB field</button>
	<button id="btnhexsummary">Show/hide HEX summary info</button>
</div>


<!--begin dialog markup-->
<div id="yui-picker-panel" class="yui-picker-panel">
  <div class="hd">Please choose a color:</div>
  <div class="bd">
		
	  <!--begin Color picker markup-->
      <div class="yui-picker" id="yui-picker">
		
		<!--markup for the Region Slider of the Color Picker-->
        <div class="yui-picker-bg" id="yui-picker-bg" tabindex="-1" hidefocus="true">
          <div class="yui-picker-thumb" id="yui-picker-thumb"><img src="<?php echo $assetsDirectory; ?>picker_thumb.png" /></div> 
        </div>

		<!--markup for the vertical Slider for color hue-->
        <div class="yui-picker-hue-bg" id="yui-picker-hue-bg" tabindex="-1" hidefocus="true">
          <div class="yui-picker-hue-thumb" id="yui-picker-hue-thumb"><img src="<?php echo $assetsDirectory; ?>hue_thumb.png" /></div> 
        </div> 

		<!--markup for the various Color Picker interface controls-->
        <div id="yui-picker-controls" class="yui-picker-controls">
          <div class="hd"><a href="#" id="yui-picker-controls-label"></a></div>
          <div class="bd">
            <form name="yui-picker-form" method="post" action="<?php echo $assetsDirectory; ?>post.php">

              <ul id="yui-picker-rgb-controls" class="yui-picker-rgb-controls">
                <li>R
                <input autocomplete="off" name="yui-picker-r" id="yui-picker-r" type="text" value="0" size="3" maxlength="3" /></li>
                <li>G
                <input autocomplete="off" name="yui-picker-g" id="yui-picker-g" type="text" value="0" size="3" maxlength="3" /></li>
                <li>B
                <input autocomplete="off" name="yui-picker-b" id="yui-picker-b" type="text" value="0" size="3" maxlength="3" /></li>
              </ul>

              <ul class="yui-picker-hsv-controls" id="yui-picker-hsv-controls">
                <li>H
                <input autocomplete="off" name="yui-picker-h" id="yui-picker-h" type="text" value="0" size="3" maxlength="3" /> &#176;</li>
                <li>S
                <input autocomplete="off" name="yui-picker-s" id="yui-picker-s" type="text" value="0" size="3" maxlength="3" /> %</li>
                <li>V
                <input autocomplete="off" name="yui-picker-v" id="yui-picker-v" type="text" value="0" size="3" maxlength="3" /> %</li>
              </ul>

              <ul class="yui-picker-hex-summary" id="yui-picker-hex-summary">
                <li id="yui-picker-rhex">
                <li id="yui-picker-ghex">
                <li id="yui-picker-bhex">
              </ul>

              <div class="yui-picker-hex-controls" id="yui-picker-hex-controls">
                # <input autocomplete="off" name="yui-picker-hex" id="yui-picker-hex" type="text" value="0" size="6" maxlength="6" />
              </div>

            </form>
          </div>
        </div>

		<!--markup for swatches-->
        <div class="yui-picker-swatch" id="yui-picker-swatch">&nbsp;</div>
        <div class="yui-picker-websafe-swatch" id="yui-picker-websafe-swatch">&nbsp;</div>
      </div>

  </div>
  <div class="ft"></div>
</div>

<!--container element for information returned via XHR-->
<div id="resp">Server response will be displayed in this area</div>

