<h2 class="first">Setting up the element that we are going to resize</h2>

<p>We are just going to make the element <code>#resize</code> resizable.</p>
<p>Note that we have placed the CSS property <code>overflow: hidden</code> on the first element inside to keep the text from escaping when we resize.</p>

<textarea name="code" class="CSS">
    #resize {
        border: 1px solid black;
        height: 100px;
        width: 200px;
        background-color: #fff;
    }
    #resize div.data {
        overflow: hidden;
        height: 100%;
        width: 100%;
    }
</textarea>
<textarea name="code" class="HTML">
<div id="resize">
<div class="data">
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse justo nibh, pharetra at, adipiscing ullamcorper.</p>
</div>
</div>
</textarea>

<h2>Creating the resize instance</h2>

<p>By default, the Resize Utility assumes that you want to resize the element from 3 handles. Right, Bottom &amp; Bottom Right. You can change this by setting the <code>handles</code> configuration attribute. See the <a href="../../docs/module_resize.html">API docs</a> for more information.</p>

<textarea name="code" class="JScript">
(function() {
    var Dom = YAHOO.util.Dom,
        Event = YAHOO.util.Event;
    
    var resize = new YAHOO.util.Resize('resize');
})();
</textarea>

