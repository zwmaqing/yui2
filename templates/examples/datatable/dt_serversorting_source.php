<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>

</head>

<body class="yui-skin-sam">
<h1>Server-side Sorting</h1>
<div id="serversorting"></div>

<script type="text/javascript" src="../../build/yuiloader/yuiloader.js"></script>
<script type="text/javascript">
var loader = new YAHOO.util.YUILoader();
loader.insert({
    require: ["fonts", "connection", "json", "datatable"],
    base: '../../build/',
    filter: 'debug',
    onSuccess: function() {
        YAHOO.example.ServerSorting = function() {
            // Column definitions
            var myColumnDefs = [
                {key:"id", label:"ID", sortable:true},
                {key:"name", label:"Name", sortable:true},
                {key:"date", label:"Date", sortable:true},
                {key:"price", label:"Price", sortable:true},
                {key:"number", label:"Number", sortable:true}
            ];

            // DataSource instance
            var myDataSource = new YAHOO.util.DataSource("assets/php/json_proxy.php?");
            myDataSource.responseType = YAHOO.util.DataSource.TYPE_JSON;
            myDataSource.responseSchema = {
                resultsList: "records",
                fields: ["id","name","date","price","number"]
            };

            // DataTable instance
            var oConfigs = {
                initialRequest: "sort=id&dir=asc&results=100", // Server parameters for initial request
                sortedBy: {key:"id", dir:YAHOO.widget.DataTable.CLASS_ASC}, // Set up initial column headers UI
                renderLoopSize: 25 // Bump up to account for large number of rows to display
            };
            var myDataTable = new YAHOO.widget.DataTable("serversorting", myColumnDefs,
                    myDataSource, oConfigs);

            // Override function for custom server-side sorting
            myDataTable.sortColumn = function(oColumn) {
                // Default ascending
                var sDir = "asc"
                
                // If already sorted, sort in opposite direction
                if(oColumn.key === this.get("sortedBy").key) {
                    sDir = (this.get("sortedBy").dir === YAHOO.widget.DataTable.CLASS_ASC) ?
                            "desc" : "asc";
                }

                // Pass in sort values to server request
                var newRequest = "sort=" + oColumn.key + "&dir=" + sDir + "&results=100&startIndex=0";
                
                // Create callback for data request
                var oCallback = {
                    success: this.onDataReturnInitializeTable,
                    failure: this.onDataReturnInitializeTable,
                    scope: this,
                    argument: {
                        // Pass in sort values so UI can be updated in callback function
                        sorting: {
                            key: oColumn.key,
                            dir: (sDir === "asc") ? YAHOO.widget.DataTable.CLASS_ASC : YAHOO.widget.DataTable.CLASS_DESC
                        }
                    }
                }
                
                // Send the request
                this.getDataSource().sendRequest(newRequest, oCallback);
            };
            
            return {
                oDS: myDataSource,
                oDT: myDataTable
            };
        }();
    }
});
</script>
</body>
</html>
