<div id="markup">
    <table id="accounts">
        <thead>
            <tr>
                <th>Due Date</th>
                <th>Account Number</th>
                <th>Quantity</th>
                <th>Amount Due</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1/23/1999</td>
                <td>29e8548592d8c82</td>
                <td>12</td>
                <td>$150.00</td>
            </tr>
            <tr>
                <td>5/19/1999</td>
                <td>83849</td>
                <td>8</td>
                <td>$60.00</td>
            </tr>
            <tr>
                <td>8/9/1999</td>
                <td>11348</td>
                <td>1</td>
                <td>$34.99</td>
            </tr>
            <tr>
                <td>1/23/2000</td>
                <td>29e8548592d8c82</td>
                <td>10</td>
                <td>$1.00</td>
            </tr>
            <tr>
                <td>4/28/2000</td>
                <td>37892857482836437378273</td>
                <td>123</td>
                <td>$33.32</td>
            </tr>
            <tr>
                <td>1/23/2001</td>
                <td>83849</td>
                <td>5</td>
                <td>$15.00</td>
            </tr>
            <tr>
                <td>9/30/2001</td>
                <td>224747</td>
                <td>14</td>
                <td>$56.78</td>
            </tr>
        </tbody>
    </table>
</div>


<script type="text/javascript">
YAHOO.util.Event.addListener(window, "load", function() {
    YAHOO.example.EnhanceFromMarkup = function() {
        var myColumnDefs = [
            {key:"due",label:"Due Date",formatter:YAHOO.widget.DataTable.formatDate,sortable:true},
            {key:"account",label:"Account Number", sortable:true},
            {key:"quantity",label:"Quantity",formatter:YAHOO.widget.DataTable.formatNumber,sortable:true},
            {key:"amount",label:"Amount Due",formatter:YAHOO.widget.DataTable.formatCurrency,sortable:true}
        ];

        var parseNumberFromCurrency = function(sString) {
            // Remove dollar sign and make it a float
            return parseFloat(sString.substring(1));
        };

        var myDataSource = new YAHOO.util.DataSource(YAHOO.util.Dom.get("accounts"));
        myDataSource.responseType = YAHOO.util.DataSource.TYPE_HTMLTABLE;
        myDataSource.responseSchema = {
            fields: [{key:"due", parser:"date"},
                    {key:"account"},
                    {key:"quantity", parser:"number"},
                    {key:"amount", parser:parseNumberFromCurrency} // point to a custom parser
            ]
        };

        var myDataTable = new YAHOO.widget.DataTable("markup", myColumnDefs, myDataSource,
                {caption:"Example: Progressively Enhanced Table from Markup",
                sortedBy:{key:"due",dir:"desc"}}
        );
        
        return {
            oDS: myDataSource,
            oDT: myDataTable
        };
    }();
});
</script>
