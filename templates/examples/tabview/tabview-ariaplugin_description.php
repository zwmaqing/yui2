<h2>Getting Started</h2>
<p>
Using the TabView ARIA Plugin is easy.  Simply include the source file(s) for the ARIA plugin after 
the TabView source files as indicated on the TabView landing page.
</p>
<textarea name="code" class="HTML" cols="60" rows="1">
<!-- Source file -->
<script type="text/javascript" src="../tabview/assets/tabviewariaplugin.js"></script>
</textarea>

<p>
All YUI ARIA Plugins require the user's browser and AT support the WAI-ARIA Roles and States.  
Currently only <a href="http://www.mozilla.com/en-US/firefox/">Firefox 3</a> and 
<a href="http://www.microsoft.com/windows/products/winfamily/ie/ie8/getitnow.mspx">Internet Explorer
8</a> have support for ARIA, and are supported by several screen readers for 
Windows that also offer support for ARIA.  For this reason the YUI ARIA Plugins are only enabled 
by default for these browsers.  To enable the ARIA plugin for other browsers, simply the set 
the <code>usearia</code> attribute to <code>true</code>.  For example:
</p>
<textarea name="code" class="JScript" cols="60" rows="1">
var oTabView = new YAHOO.widget.TabView({ usearia: true });
</textarea>

<h2>Plugin Features</h2>
<h3>The <code>labelledby</code> and <code>describedby</code> attributes.</h3>
<p>
The TabView ARIA Plugin adds a <code>labelledby</code> and <code>describedby</code>
attribute to the TabView class, each of which maps back to their respective ARIA property of 
<a href="http://www.w3.org/TR/wai-aria/#labelledby"><code>aria-labelledby</code></a> and 
<a href="http://www.w3.org/TR/wai-aria/#describedby"><code>aria-describedby</code></a>.
</p>
<textarea name="code" class="JScript" cols="60" rows="1">
var oTabView = new YAHOO.widget.TabView({ usearia: true, labelledby: "tabview-label" });
</textarea>


<h3>Enhanced Keyboard Support</h3>
<p>
Out of the box, TabView provides basic keyboard support.  Each Tab in a TabView is represented by
an <code>&#60;A&#62;</code> element that enables the user to press the tab key or shift-tab to 
move focus between each TabView.  In keeping with the 
<a href="http://www.w3.org/WAI/PF/aria-practices/#keyboard">WAI-ARIA Best Practices for keyboard 
navigation</a> the ARIA plugin for TabView enhances TabView's default behavior such that 
only one Tab is in the browser's tab index, enabling the user to easily tab into and out of the 
TabView.  When a Tab in a TabView has focus, pressing the arrow keys moves focus between each Tab
in the TabView.
</p>

<h4>Mac vs. Windows</h4>
<p>
There are two different models for arrow key support for tabbed-content controls in operating 
systems: Mac OS X and Windows.  On Windows, pressing the left or right arrow key moves focus to the 
next Tab and immediately displays its corresponding TabPanel.  On the Mac with VoiceOver enabled, 
the arrow keys only move focus between each Tab and the user must press the space bar to load the 
content of the Tab's corresponding TabPanel.  The ARIA plugin for TabView implements the Mac's 
model, as it is better for a DHTML TabView.  Since as Tab's content can be loaded via XHR, the 
Mac's more intentional Tab selection model helps prevent the user from making requests for data 
he/she is not interested in consuming.
</p>

<h4>Supporting Multiple Orientations</h4>
<p>
The <a href="http://developer.yahoo.com/yui/docs/YAHOO.widget.TabView.html#config_orientation"><code>orientation</code></a> 
attribute of the TabView is used to render the Tabs on any of the widget's four sides.  To provide 
arrow key support that will work regardless of the orientation of the Tabs, the left and up keys 
will move the focus to the previous Tab, while the right and down arrow keys will move the focus to 
the next Tab.  As an additional convenience to the user, focus is automatically moved to the first 
or last Tab when the user has reached the beginning or end of a list of Tabs.
</p>


<h2>Example-Specific Tweaks</h2>
<p>
First we'll use the <code>labelled</code> attribute to provide some helpful instructional text that 
will be announced to the user when the TabView initially receives focus.  Since each Tab's content 
is loaded asynchronously, we'll also leverage WAI-ARIA Live Regions to message the user when a 
Tab's content is both being loaded and has finished loading. The following code snippet illustrates 
how it all comes together: 
</p>
<textarea name="code" class="JScript" cols="60" rows="1">
(function() {

	var Dom = YAHOO.util.Dom,
		UA = YAHOO.env.ua,

		oTitle,
		oTabViewEl,
		oLog,
		sInstructionalText;

    var oTabView = new YAHOO.widget.TabView();
    
    oTabView.addTab( new YAHOO.widget.Tab({
        label: 'Opera',
        dataSrc: '<?php echo $assetsDirectory; ?>news.php?query=opera+browser',
        cacheData: true,
        active: true
    }));

    oTabView.addTab( new YAHOO.widget.Tab({
        label: 'Firefox',
        dataSrc: '<?php echo $assetsDirectory; ?>news.php?query=firefox+browser',
        cacheData: true
    }));

    oTabView.addTab( new YAHOO.widget.Tab({
        label: 'Explorer',
        dataSrc: '<?php echo $assetsDirectory; ?>news.php?query=microsoft+explorer+browser',
        cacheData: true
    }));

    oTabView.addTab( new YAHOO.widget.Tab({
        label: 'Safari',
        dataSrc: '<?php echo $assetsDirectory; ?>news.php?query=apple+safari+browser',
        cacheData: true
    }));

    oTabView.appendTo('container');
    

	//	Make use of some additional ARIA Roles and States to further enhance the TabView if the 
	//	browser supports ARIA.
	
	if ((UA.gecko && UA.gecko >= 1.9) || (UA.ie && UA.ie >= 8)) {

		//	Use the "labelledby" attribute provided by the ARIA plugin for TabView to label the 
		//	TabView with the <h2>, and append some instructional text to the <H2> that tells users 
		//	of screen readers how to use TabView.  This text will be read when the first Tab is 
		//	focused.  Since this text is specifically for users of screen readers, it will be 
		//	hidden off screen via CSS.

		oTitle = Dom.get("tabview-title");

		sInstructionalText = oTitle.innerHTML;

		oTitle.innerHTML = (sInstructionalText + "<em>Press the space bar or enter key to load the content of each tab.</em>");

		oTabView.set("labelledby", "tabview-title");


		//	Since the content of each Tab is loaded via XHR, append a Live Region to the TabView's 
		//	root element that will be used to message users about the status of each Tab's content.  

		oTabViewEl = oTabView.get("element");
		oLog = oTabViewEl.ownerDocument.createElement("div");

		oLog.setAttribute("role", "log");
		oLog.setAttribute("aria-live", "polite");

		oTabViewEl.appendChild(oLog);


		//	"activeTabChange" event handler used to notify the screen reader that 
		//	the content of the Tab is loading by updaing the content of the Live Region.

		oTabView.on("activeTabChange", function (event) {

			var oTabEl = this.get("activeTab").get("element"),
				sTabLabel = oTabEl.textContent || oTabEl.innerText,
				oCurrentMessage = Dom.getFirstChild(oLog),
				oMessage = oLog.ownerDocument.createElement("p");

			oMessage.innerHTML = "Please wait.  Content loading for " + sTabLabel + " property page.";

			if (oCurrentMessage) {
				oLog.replaceChild(oMessage, oCurrentMessage);
			}
			else {
				oLog.appendChild(oMessage);						
			}

		});	
	

		//	"dataLoadedChange" event handler used to notify the screen reader that 
		//	the content of the Tab has finished loading by updating the content of the Live Region.
		
		var onDataLoadedChange = function (event) {

			var oTabEl = this.get("element"),
				sTabLabel = oTabEl.textContent || oTabEl.innerText,
				oCurrentMessage = Dom.getFirstChild(oLog),
				oMessage = oLog.ownerDocument.createElement("p");

			oMessage.innerHTML = "Content loaded for " + sTabLabel + " property page.";

			if (oCurrentMessage) {
				oLog.replaceChild(oMessage, oCurrentMessage);
			}
			else {
				oLog.appendChild(oMessage);						
			}
		
		};
	
		oTabView.getTab(0).on("dataLoadedChange", onDataLoadedChange);
		oTabView.getTab(1).on("dataLoadedChange", onDataLoadedChange);
		oTabView.getTab(2).on("dataLoadedChange", onDataLoadedChange);
		oTabView.getTab(3).on("dataLoadedChange", onDataLoadedChange);

	}
    
})();
</textarea>

<h2>Screen Reader Testing</h2>
<p>
Two of the leading screen readers for Windows, 
<a href="http://www.freedomscientific.com/fs_products/software_jaws.asp">JAWS</a> and 
<a href="http://www.gwmicro.com/Window-Eyes/">Window-Eyes</a>, support ARIA.  Free, trial 
versions of both are available for download, but require Windows be restarted every 40 minutes.
The open-source 
<a href="http://www.nvda-project.org/">NVDA Screen Reader</a> is the best option for developers as 
it is both free and provides excellent support for ARIA.
</p>