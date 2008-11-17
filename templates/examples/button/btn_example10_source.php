<script type="text/javascript">

	(function () {
	
		var Event = YAHOO.util.Event,
			Dom = YAHOO.util.Dom;	


		Event.onContentReady("datefields", function () {

			var oCalendarMenu;
	
			var onButtonClick = function () {
	
				// Create a Calendar instance and render it into the body 
				// element of the Overlay.
	
				var oCalendar = new YAHOO.widget.Calendar("buttoncalendar", oCalendarMenu.body.id);
	
				oCalendar.render();
	
	
				// Subscribe to the Calendar instance's "select" event to 
				// update the Button instance's label when the user
				// selects a date.
	
				oCalendar.selectEvent.subscribe(function (p_sType, p_aArgs) {
	
					var aDate,
						nMonth,
						nDay,
						nYear;
	
					if (p_aArgs) {
						
						aDate = p_aArgs[0][0];
	
						nMonth = aDate[1];
						nDay = aDate[2];
						nYear = aDate[0];
	
						oButton.set("label", (nMonth + "/" + nDay + "/" + nYear));
	
	
						// Sync the Calendar instance's selected date with the date form fields
	
						Dom.get("month").selectedIndex = (nMonth - 1);
						Dom.get("day").selectedIndex = (nDay - 1);
						Dom.get("year").value = nYear;
	
					}
					
					oCalendarMenu.hide();
				
				});
	
	
				// Pressing the Esc key will hide the Calendar Menu and send focus back to 
				// its parent Button
	
				Event.on(oCalendarMenu.element, "keydown", function (p_oEvent) {
				
					if (Event.getCharCode(p_oEvent) === 27) {
						oCalendarMenu.hide();
						this.focus();
					}
				
				}, null, this);
				
				
				var focusDay = function () {

					var oCalendarTBody = Dom.get("buttoncalendar").tBodies[0],
						aElements = oCalendarTBody.getElementsByTagName("a"),
						oAnchor;

					
					if (aElements.length > 0) {
					
						Dom.batch(aElements, function (element) {
						
							if (Dom.hasClass(element.parentNode, "today")) {
								oAnchor = element;
							}
						
						});
						
						
						if (!oAnchor) {
							oAnchor = aElements[0];
						}


						// Focus the anchor element using a timer since Calendar will try 
						// to set focus to its next button by default
						
						YAHOO.lang.later(0, oAnchor, function () {
							try {
								oAnchor.focus();
							}
							catch(e) {}
						});
					
					}
					
				};


				// Set focus to either the current day, or first day of the month in 
				// the Calendar	when it is made visible or the month changes
	
				oCalendarMenu.subscribe("show", focusDay);
				oCalendar.renderEvent.subscribe(focusDay, oCalendar, true);
	

				// Give the Calendar an initial focus
				
				focusDay.call(oCalendar);
	
	
				// Re-align the CalendarMenu to the Button to ensure that it is in the correct
				// position when it is initial made visible
				
				oCalendarMenu.align();

	
				// Unsubscribe from the "click" event so that this code is 
				// only executed once
	
				this.unsubscribe("click", onButtonClick);
			
			};
	
	
			var oDateFields = Dom.get("datefields");
				oMonthField = Dom.get("month"),
				oDayField = Dom.get("day"),
				oYearField = Dom.get("year");
	
	
			// Hide the form fields used for the date so that they can be replaced by the 
			// calendar button.
	
			oMonthField.style.display = "none";
			oDayField.style.display = "none";
			oYearField.style.display = "none";
	
	
			// Create a Overlay instance to house the Calendar instance
	
			oCalendarMenu = new YAHOO.widget.Overlay("calendarmenu", { visible: false });
	
	
			// Create a Button instance of type "menu"
	
			var oButton = new YAHOO.widget.Button({ 
											type: "menu", 
											id: "calendarpicker", 
											label: "Choose A Date", 
											menu: oCalendarMenu, 
											container: "datefields" });
	
	
			oButton.on("appendTo", function () {
			
				// Create an empty body element for the Overlay instance in order 
				// to reserve space to render the Calendar instance into.
		
				oCalendarMenu.setBody("&#32;");
		
				oCalendarMenu.body.id = "calendarcontainer";
			
			});
	
	
			// Add a listener for the "click" event.  This listener will be
			// used to defer the creation the Calendar instance until the 
			// first time the Button's Overlay instance is requested to be displayed
			// by the user.
	
			oButton.on("click", onButtonClick);
		
		});

	}());

</script>

<form id="button-example-form" name="button-example-form" method="post">

    <fieldset id="personalinfo">

		<legend>Personal Information</legend>

		<div class="field">
	        <label for="firstname">First Name: </label>
	        <input type="text" id="firstname" name="firstname" value="">
        </div>

		<div class="field">
	        <label for="lastname">Last Name: </label>
	        <input type="text" id="lastname" name="lastname" value="">
        </div>

		<div class="field" id="datefields">

	        <label for="month">Birthday: </label>

	        <select id="month" name="month">
	        	<option value="01">01</option>
	        	<option value="02">02</option>
	        	<option value="03">03</option>
	        	<option value="04">04</option>
	        	<option value="05">05</option>
	        	<option value="06">06</option>
	        	<option value="07">07</option>
	        	<option value="08">08</option>
	        	<option value="09">09</option>
	        	<option value="10">10</option>
	        	<option value="11">11</option>
	        	<option value="12">12</option>
	        </select>

	        <select id="day" name="day">
	        	<option value="01">01</option>
	        	<option value="02">02</option>
	        	<option value="03">03</option>
	        	<option value="04">04</option>
	        	<option value="05">05</option>
	        	<option value="06">06</option>
	        	<option value="07">07</option>
	        	<option value="08">08</option>
	        	<option value="09">09</option>
	        	<option value="10">10</option>
	        	<option value="11">11</option>
	        	<option value="12">12</option>
	        	<option value="13">13</option>
	        	<option value="14">14</option>
	        	<option value="15">15</option>
	        	<option value="16">16</option>
	        	<option value="17">17</option>
	        	<option value="18">18</option>
	        	<option value="19">19</option>
	        	<option value="20">20</option>
	        	<option value="21">21</option>
	        	<option value="22">22</option>
	        	<option value="23">23</option>
	        	<option value="24">24</option>
	        	<option value="25">25</option>
	        	<option value="26">26</option>
	        	<option value="27">27</option>
	        	<option value="28">28</option>
	        	<option value="29">29</option>
	        	<option value="30">30</option>
	        	<option value="31">31</option>
	        </select>

			<input type="text" id="year" name="year" value="">

		</div>

		<div class="field">

			<input type="submit" id="submit-button" name="submit-button" value="Submit Form">

		</div>

    </fieldset>

</form>