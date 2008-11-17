<div id="cal1Container"></div>

<form name="dates">
	<select id="selMonth" name="selMonth">
		<option value="" selected> </option>
		<option value="Jan">1</option>
		<option value="Feb">2</option>
		<option value="Mar">3</option>
		<option value="Apr">4</option>
		<option value="May">5</option>
		<option value="Jun">6</option>
		<option value="Jul">7</option>
		<option value="Aug">8</option>
		<option value="Sep">9</option>
		<option value="Oct">10</option>
		<option value="Nov">11</option>
		<option value="Dec">12</option>
	</select>

	<select name="selDay" id="selDay">
		<option value="" selected> </option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
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

	<select name="selYear" id="selYear">
		<option value="" selected> </option>
		<option value="2006">2006</option>
		<option value="2007">2007</option>
		<option value="2008">2008</option>
	</select>
</form>

<script type="text/javascript">
	YAHOO.namespace("example.calendar");

	YAHOO.example.calendar.init = function() {
	
		function handleSelect(type,args,obj) {
			var dates = args[0]; 
			var date = dates[0];
			var year = date[0], month = date[1], day = date[2];

			var selMonth = document.getElementById("selMonth");
			var selDay = document.getElementById("selDay");
			var selYear = document.getElementById("selYear");
			
			selMonth.selectedIndex = month;
			selDay.selectedIndex = day;

			for (var y=0;y<selYear.options.length;y++) {
				if (selYear.options[y].text == year) {
					selYear.selectedIndex = y;
					break;
				}
			}
		}

		function updateCal() {
			var selMonth = document.getElementById("selMonth");
			var selDay = document.getElementById("selDay");
			var selYear = document.getElementById("selYear");
			
			var month = parseInt(selMonth.options[selMonth.selectedIndex].text);
			var day = parseInt(selDay.options[selDay.selectedIndex].value);
			var year = parseInt(selYear.options[selYear.selectedIndex].value);
			
			if (! isNaN(month) && ! isNaN(day) && ! isNaN(year)) {
				var date = month + "/" + day + "/" + year;

				YAHOO.example.calendar.cal1.select(date);
				YAHOO.example.calendar.cal1.cfg.setProperty("pagedate", month + "/" + year);
				YAHOO.example.calendar.cal1.render();
			}
		}

		YAHOO.example.calendar.cal1 = new YAHOO.widget.Calendar("cal1","cal1Container", 
																	{ mindate:"1/1/2006",
																	  maxdate:"12/31/2008" });
		YAHOO.example.calendar.cal1.selectEvent.subscribe(handleSelect, YAHOO.example.calendar.cal1, true);
		YAHOO.example.calendar.cal1.render();

		YAHOO.util.Event.addListener(["selMonth","selDay","selYear"], "change", updateCal);
	}

	YAHOO.util.Event.onDOMReady(YAHOO.example.calendar.init);
</script>

<div style="clear:both" ></div>
