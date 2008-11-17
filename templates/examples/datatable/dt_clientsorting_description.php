<h2 class="first">Sample Code for this Example</h2>

<p>Data:</p>

<textarea name="code" class="HTML" cols="60" rows="1">YAHOO.example.Data = {
    areacodes: [
        {areacode: "201", state: "New Jersey"},
        {areacode: "202", state: "Washington, DC"},
        {areacode: "203", state: "Connecticut"},
        ...
    ]
}
</textarea>

<p>CSS:</p>

<textarea name="code" class="CSS" cols="60" rows="1">/* No custom CSS. */
</textarea>

<p>Markup:</p>

<textarea name="code" class="HTML" cols="60" rows="1">&lt;div id="sort"&gt;&lt;/div&gt;
</textarea>

<p>JavaScript:</p>

<textarea name="code" class="JScript" cols="60" rows="1">YAHOO.util.Event.addListener(window, "load", function() {
    YAHOO.example.CustomSort = function() {
        // Custom sort handler to sort by state and then by areacode
        // where a and b are Record instances to compare
        var sortStates = function(a, b, desc) {
            // Deal with empty values
            if(!YAHOO.lang.isValue(a)) {
                return (!YAHOO.lang.isValue(b)) ? 0 : 1;
            }
            else if(!YAHOO.lang.isValue(b)) {
                return -1;
            }

            // First compare by state
            var comp = YAHOO.util.Sort.compare;
            var compState = comp(a.getData("state"), b.getData("state"), desc);

            // If states are equal, then compare by areacode
            return (compState !== 0) ? compState : comp(a.getData("areacode"), b.getData("areacode"), desc);
        };

        var myColumnDefs = [
            {key:"areacode",label:"Area Codes",sortable:true},
            {key:"state",label:"States",sortable:true,sortOptions:{sortFunction:sortStates}}
        ];

        var myDataSource = new YAHOO.util.DataSource(YAHOO.example.Data.areacodes.slice(0,25));
        myDataSource.responseType = YAHOO.util.DataSource.TYPE_JSARRAY;
        myDataSource.responseSchema = {
            fields: ["areacode","state"]
        };

        var myDataTable = new YAHOO.widget.DataTable("sort", myColumnDefs,
                myDataSource, {sortedBy:{key:"areacode", dir:"asc"}});
                
        return {
            oDS: myDataSource,
            oDT: myDataTable
        };
    }();
});
</textarea>
