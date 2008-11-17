<h2 class="first">Using filter</h2>

<p>The <a href="/yui/selector/#filter">filter</a> method, part of the <a href="http://developer.yahoo.com/yui/selector/">YUI Selector Utility</a>, makes it easy to filter a set of nodes based on a <a href="http://www.w3.org/TR/css3-selectors/">CSS3 Selector</a>.</p>

<p>To illustrate the use of filter, we'll create a few HTML lists. When the button is clicked, we filter the collection of <code>LI</code>elements, so that only those that have the class <code>selected</code> applied are left in the array.</p>

<p>Add some markup for the lists and a button to trigger the demo:</p>
<textarea name="code" class="HTML" cols="60" rows="1">
<ul>
    <li class="selected">lorem</li>
    <li>ipsum</li>
    <li>dolor</li>
    <li>sit</li>
</ul>
<ul>
    <li>lorem</li>
    <li class="selected">ipsum</li>
    <li>dolor</li>
    <li>sit</li>
</ul>
<ul>
    <li>lorem</li>
    <li>ipsum</li>
    <li>dolor</li>
    <li class="selected">sit</li>
</ul>

<ol>
    <li>lorem</li>
    <li>ipsum</li>
    <li>dolor</li>
    <li class="selected">sit</li>
</ol>
<button id="demo-run">run</button>
</textarea>

<p>Now we will define the function that filters the nodes when the button is clicked, and assign it as a click handler.</p>

<textarea name="code" class="JScript" cols="60" rows="1">
<script type="text/javascript">
    var nodes = document.getElementById('selector-demo').getElementsByTagName('li');
    var handleClick = function(e) {
        nodes = YAHOO.util.Selector.filter(nodes, '.selected');
        alert(nodes.length); 
    };

    YAHOO.util.Event.on('demo-run', 'click', handleClick);
</script>
</textarea>

<p>This is a basic example of how to use the <code>Selector.filter</code> method.</p>

