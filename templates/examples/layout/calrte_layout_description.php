<h2 class="first">Create the Panel</h2>

<p>First we must create the panel instance, like this:</p>

<textarea name="code" class="HTML">
    <div id="demo"></div>
</textarea>
<textarea name="code" class="JScript">
    var panel = new YAHOO.widget.Panel('demo', {
        close: false,
        underlay: 'none',
        width: '700px',
        xy: [100, 100]
    });
    panel.render();
</textarea>

<p>Now let's give it some content. Note that we are adding a DIV to the body with an id of <code>layout</code>. This will be the element we anchor the layout to.</p>
<textarea name="code" class="JScript">
    var panel = new YAHOO.widget.Panel('demo', {
        close: false,
        underlay: 'none',
        width: '700px',
        xy: [100, 100]
    });
    panel.setHeader('Simple Application');
    panel.setBody('<div id="layout"></div>');
    panel.render();
</textarea>

<h2>Adding the Layout instance</h2>

<p>Now we need to listen for the <code>beforeRender</code> event to render our Layout.</p>
<p>Inside of the <code>beforeRender</code> event, we will wait for the element <code>layout</code> to appear in the document, then we will setup our Layout instance.</p>
<p>The layout instance we are creating will have top, left, bottom and center units configured below:</p>

<textarea name="code" class="JScript">
    panel.setBody('<div id="layout"></div>');
    panel.beforeRenderEvent.subscribe(function() {
        Event.onAvailable('layout', function() {
            layout = new YAHOO.widget.Layout('layout', {
                height: 400,
                units: [
                    { position: 'top', height: 30, header: 'Date Editor', gutter: '2' },
                    { position: 'left', width: 205, body: '', gutter: '0 5 0 2' },
                    { position: 'bottom', height: 25, id: 'status', body: 'Status', gutter: '2' },
                    { position: 'center', body: 'Select a date..', gutter: '0 2 0 0' }
                ]
            });
            layout.render();
        });
    });
    panel.render();
</textarea>

<h2>Make the Panel resizable</h2>

<p>After we have rendered our panel, we can attach the Resize Utility to it like this:</p>

<textarea name="code" class="JScript">
    panel.render();
    resize = new YAHOO.util.Resize('demo', {
        handles: ['br'],
        autoRatio: true,
        status: true,
        proxy: true,
        useShim: true,        
        minWidth: 700,
        minHeight: 400
    });
</textarea>

<p>Now give the resize handle a little CSS to make it look nicer.</p>

<textarea name="code" class="CSS">
#demo .yui-resize-handle-br {
    height: 11px;
    width: 11px;
    background-position: -20px -60px;
    background-color: transparent;
}
</textarea>

<p>This will place a handle at the bottom right corner of the panel. This will only resize the outside portion of the panel, but we want the inside to resize properly.</p>

<p>Now we need to listen for the <code>resize</code> event on the Resize instance and do a little math.</p>

<textarea name="code" class="JScript">
resize.on('resize', function(args) {
    var h = args.height;
    var hh = this.header.clientHeight;
    var padding = ((10 * 2) + 2); //Sam's skin applied a 10px padding and a 1 px border to the element..
    var bh = (h - hh - padding);
    Dom.setStyle(this.body, 'height', bh + 'px');
}, panel, true);
</textarea>

<p>Now we have the Panel resizing the way we want, but the layout is not resizing to match. Inside the <code>resize</code> event from the Resize instance we need to add this at the bottom:</p>
<textarea name="code" class="JScript">
    layout.set('height', bh);
    layout.set('width', (args.width - padding));    
    layout.resize();
</textarea>

<p>Now we have a resizable panel with a fixed layout inside.</p>

<h2>Adding the calendar</h2>
<p>Now we listen for the layout's <code>render</code> event and setup our Calendar.</p>
<p>Inside the <code>render</code> event we will call the layout method <code>getUnitByPosition('left')</code> to 
get the left unit's instance. Then we will create an empty DIV and append it to the body element of the left unit.</p>
<p>Then we will pass that element as the root node for the Calendar Control and render it.</p>
<textarea name="code" class="JScript">
layout.on('render', function() {
    var l = layout.getUnitByPosition('left');
    var el = document.createElement('div');
    l.body.appendChild(el);
    cal = new YAHOO.widget.Calendar(el);
    cal.render();
}, layout, true);
</textarea>

<h2>Adding the Rich Text Editor</h2>

<p>Using the same technique as above, we will add a Rich Text Editor to the center unit.</p>
<p>Using the layout's <code>getUnitByPosition('center')</code> method, we will set the body of the unit to the <code>textarea</code>
that we will convert into an Simple Editor instance. We will also set a custom toolbar to limit the number of buttons.</p>

<textarea name="code" class="JScript">
layout.on('render', function() {
    var c = layout.getUnitByPosition('center');
    c.set('body', '&lt;textarea id="editor"&gt;&lt;/textarea&gt;');
    editor = new YAHOO.widget.SimpleEditor('editor', {
        height: '305px',
        width: c.get('width') + 'px',
        dompath: false,
        animate: false,
        toolbar: {
            grouplabels: false,
            buttons: [
                { group: 'textstyle', label: 'Font Style',
                    buttons: [
                    { type: 'select', label: 'Arial', value: 'fontname', disabled: true,
                        menu: [
                            { text: 'Arial', checked: true },
                            { text: 'Arial Black' },
                            { text: 'Comic Sans MS' },
                            { text: 'Courier New' },
                            { text: 'Lucida Console' },
                            { text: 'Tahoma' },
                            { text: 'Times New Roman' },
                            { text: 'Trebuchet MS' },
                            { text: 'Verdana' }
                        ]
                    },
                    { type: 'spin', label: '13', value: 'fontsize', range: [ 9, 75 ], disabled: true },
                    { type: 'separator' },
                    { type: 'push', label: 'Bold', value: 'bold' },
                    { type: 'push', label: 'Italic', value: 'italic' },
                    { type: 'push', label: 'Underline', value: 'underline' },
                    { type: 'separator' },
                    { type: 'color', label: 'Font Color', value: 'forecolor', disabled: true },
                    { type: 'color', label: 'Background Color', value: 'backcolor', disabled: true }
                    ]
                }
            ]
        }
    });
    editor.on('editorContentLoaded', function() {
        var d = new Date();
        var today = d.getMonth() + 1 + '/' + d.getDate() + '/' + d.getFullYear();
        dateSelected = [today];
        layout.getUnitByPosition('top').set('header', 'Editing Date: ' + today);
        cal.cfg.setProperty('selected', today);
        cal.render();
    });
    editor.render();

</textarea>

<h2>Make the Editor resize with the Layout and Panel</h2>

<p>Now we need to add some code to the <code>resize</code> event to resize the Editor instance when the Layout and Panel are resized.</p>

<textarea name="code" class="JScript">
//Editor Resize
var th = (editor.toolbar.get('element').clientHeight + 2); //It has a 1px border..
var eH = (h - th);
editor.set('width', args.width + 'px');
editor.set('height', eH + 'px');
</textarea>


<h2>Making them talk to each other</h2>
<p>Now we need to connect the Calendar <code>selectEvent</code> to the Layout Manager.</p>
<textarea name="code" class="JScript">
cal = new YAHOO.widget.Calendar(el);
cal.selectEvent.subscribe(function(ev, args) {
    var d = args[0][0];
    layout.getUnitByPosition('top').set('header', 'Editing Date: ' + d[1] + '/' + d[2] + '/' + d[0]);
});
cal.render();
</textarea>

<p>Now the top unit's header will be updated with the selected date of the Calendar and the Editor will be enabled.</p>
<p>From here, we will set up some pseudo code for saving and storing the data entered on each date selection.</p>
<p>Basically the code below does the following:
<ul>
    <li>When a date is selected, set the var <code>dateSelected</code> to the date.</li>
    <li>Then select that date</li>
    <li>If the object <code>editorData</code> contains a key matching this date, update the Editor's content with the value.</li>
    <li>If the var <code>dateSelected</code> was already set, do this:
        <ul>
            <li>Update the body of the bottom unit with an animated image and status message.</li>
            <li>Save the Editor HTML to a var <code>html</code></li>
            <li>Add a key to <code>editorData</code> for the date and assign its value to the html from the Editor.</li>
            <li>Fire the Connection Manager request to save the data (this example doesn't do that).</li>
            <li>Clear the Editor's content.</li>
        </ul>
    </li>
</ul>
</p>
<textarea name="code" class="JScript">
cal = new YAHOO.widget.Calendar(el);
cal.selectEvent.subscribe(function(ev, args) {
    if (dateSelected) {
        //Connection Manager
        layout.getUnitByPosition('bottom').set('body', '<img src="assets/progress.gif"> Sending Data...');
        var html = editor.getEditorHTML();
        var url = 'assets/post4.php?html=' + html;
        editorData[dateSelected] = html;
        conn = YAHOO.util.Connect.asyncRequest('POST', url, {
            success: function() {
                layout.getUnitByPosition('bottom').set('body', 'Data Saved..');
            },
            failure: function() {
            }
        });
        editor.setEditorHTML('&nbsp;');
    }
    var d = args[0][0];
    dateSelected = d[1] + '/' + d[2] + '/' + d[0];
    layout.getUnitByPosition('top').set('header', 'Editing Date: ' + d[1] + '/' + d[2] + '/' + d[0]);
    if (dateSelected && editorData[dateSelected]) {
        editor.setEditorHTML(editorData[dateSelected]);
    }

    var dates = [dateSelected];
    for (var i in editorData) {
        dates[dates.length] = i;
    }
    cal.cfg.setProperty('selected', dates.join(','));
    cal.render();
});
cal.render();

</textarea>

<h2>Full Example Source</h2>
<textarea name="code" class="JScript">
(function() {
    var Dom = YAHOO.util.Dom,
        Event = YAHOO.util.Event,
        layout = null,
        cal = null,
        editor = null,
        conn = null,
        panel = null,
        dateSelected = null,
        editorData = {};

    panel = new YAHOO.widget.Panel('demo', {
        width: '700px',
        underlay: 'none',
        close: false,
        xy: [100, 100]
    });
    panel.setHeader('Editor');
    panel.setBody('&lt;div id="layout"&gt;&lt;/div&gt;');
    panel.renderEvent.subscribe(function() {
        Event.onAvailable('layout', function() {
            layout = new YAHOO.widget.Layout('layout', {
                height: 400,
                units: [
                    { position: 'top', height: 25, header: 'Date Editor', gutter: '2' },
                    { position: 'left', width: 205, body: '', gutter: '0 5 0 2' },
                    { position: 'bottom', height: 25, id: 'status', body: 'Status', gutter: '2' },
                    { position: 'center', body: 'Select a date..', gutter: '0 2 0 0' }
                ]
            });
            
            layout.on('render', function() {
                var c = layout.getUnitByPosition('center');
                c.set('body', '&lt;textarea id="caleditor"&gt;&lt;/textarea&gt;');
                editor = new YAHOO.widget.SimpleEditor('caleditor', {
                    height: '305px',
                    width: c.get('width') + 'px',
                    dompath: false,
                    animate: false,
                    focusAtStart: true,
                    toolbar: {
                        grouplabels: false,
                        buttons: [
                            { group: 'textstyle', label: 'Font Style',
                                buttons: [
                                    { type: 'select', label: 'Arial', value: 'fontname', disabled: true,
                                        menu: [
                                            { text: 'Arial', checked: true },
                                            { text: 'Arial Black' },
                                            { text: 'Comic Sans MS' },
                                            { text: 'Courier New' },
                                            { text: 'Lucida Console' },
                                            { text: 'Tahoma' },
                                            { text: 'Times New Roman' },
                                            { text: 'Trebuchet MS' },
                                            { text: 'Verdana' }
                                        ]
                                    },
                                    { type: 'spin', label: '13', value: 'fontsize', range: [ 9, 75 ], disabled: true },
                                    { type: 'separator' },
                                    { type: 'push', label: 'Bold', value: 'bold' },
                                    { type: 'push', label: 'Italic', value: 'italic' },
                                    { type: 'push', label: 'Underline', value: 'underline' },
                                    { type: 'separator' },
                                    { type: 'color', label: 'Font Color', value: 'forecolor', disabled: true },
                                    { type: 'color', label: 'Background Color', value: 'backcolor', disabled: true }
                                ]
                            }
                        ]
                    }
                });
                editor.on('editorContentLoaded', function() {
                    var d = new Date();
                    var today = d.getMonth() + 1 + '/' + d.getDate() + '/' + d.getFullYear();
                    dateSelected = [today];
                    layout.getUnitByPosition('top').set('header', 'Editing Date: ' + today);
                    cal.cfg.setProperty('selected', today);
                    cal.render();
                });
                editor.render();
                var l = layout.getUnitByPosition('left');
                var el = document.createElement('div');
                l.body.appendChild(el);
                cal = new YAHOO.widget.Calendar(el);
                cal.selectEvent.subscribe(function(ev, args) {
                    if (dateSelected) {
                        //Connection Manager
                        layout.getUnitByPosition('bottom').set('body', '&lt;img src="assets/progress.gif"&gt; Sending Data...');
                        var html = editor.getEditorHTML();
                        var url = 'assets/post4.php?html=' + html;
                        editorData[dateSelected] = html;
                        conn = YAHOO.util.Connect.asyncRequest('POST', url, {
                            success: function() {
                                layout.getUnitByPosition('bottom').set('body', 'Data Saved..');
                            },
                            failure: function() {
                            }
                        });
                        editor.setEditorHTML('&nbsp;');
                    }
                    var d = args[0][0];
                    dateSelected = d[1] + '/' + d[2] + '/' + d[0];
                    layout.getUnitByPosition('top').set('header', 'Editing Date: ' + d[1] + '/' + d[2] + '/' + d[0]);
                    if (dateSelected && editorData[dateSelected]) {
                        editor.setEditorHTML(editorData[dateSelected]);
                    }

                    var dates = [dateSelected];
                    for (var i in editorData) {
                        dates[dates.length] = i;
                    }
                    cal.cfg.setProperty('selected', dates.join(','));
                    cal.render();
                });
                cal.render();
            });
            layout.render();
        });
    });
    panel.render(document.body);
    resize = new YAHOO.util.Resize('demo', {
        handles: ['br'],
        autoRatio: true,
        status: true,
        proxy: true,
        useShim: true,
        minWidth: 700,
        minHeight: 400
    });
    resize.on('resize', function(args) {
        var h = args.height;
        var hh = this.header.clientHeight;
        var padding = ((10 * 2) + 2); //Sam's skin applied a 10px padding and a 1 px border to the element..
        var bh = (h - hh - padding);
        Dom.setStyle(this.body, 'height', bh + 'px');
        layout.set('height', bh);
        layout.set('width', (args.width - padding));
        layout.resize();

        //Editor Resize
        var th = (editor.toolbar.get('element').clientHeight + 2); //It has a 1px border..
        var eH = (h - th);
        editor.set('width', args.width + 'px');
        editor.set('height', eH + 'px');
    }, panel, true);
    resize.on('endResize', function() {
        //Fixing IE's calculations
        this.innerElement.style.height = '';
        //Focus the Editor so they can type.
        editor._focusWindow();
    }, panel, true);
    
})();
</textarea>
