<h2 class="first">Editor's core CSS file</h2>

<p>The editors base class is a starting point for skinning the Editor. Include this file and use the skin file as a reference for your new skin (<a href="../../build/editor/assets/editor-core.css">you can view the full contents of the base class here</a>).</p>

<h2>Sam's skin CSS file</h2>

<p>Once you have the base class in place, you can proceed to customize the look and feel of your Editor by working with the skinnning file.   Starting with the Sam Skin version below is generally the fastest approach, allowing you to customize just those parts of the skin that will make your implementation resonate with the overall design of your application.</p>

<textarea name="code" class="CSS">
/* Place the border around the editor */
.yui-skin-sam .yui-editor-container {
    border: 1px solid #808080;
}
/* Color the border of the container */
.yui-skin-sam .yui-toolbar-container {
    zoom: 1;
}
/* Load the background image on the Toolbars titlebar */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-titlebar {
    background: url(sprite.png) repeat-x 0 -200px;
    position: relative;
}
.yui-skin-sam .yui-editor-container .draggable .yui-toolbar-titlebar {
    cursor: move;
}

/* Give the titlebar some color and padding */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-titlebar h2 {
    color: #000000;
    font-weight: bold;
    margin: 0;
    padding: 0.3em 1em;
    font-size: 100%;
    text-align: left;
}

/* Give the toolbars groups titles some color and padding */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-group h3 {
    color: #808080;
    font-size: 75%;
    margin: 1em 0 0;
    padding-bottom: 0;
    padding-left: 0.25em;
    text-align: left;
}

/* Hide all of the sepatators borders */
.yui-toolbar-container span.yui-toolbar-separator {
    border: none;
    text-indent: 33px;
    overflow: hidden;
    margin: 0 .25em;
}

/* Background color of the toolbar */
.yui-skin-sam .yui-toolbar-container {
    background-color: #F2F2F2;
}

/* Add some padding to the toolbars sub container */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-subcont {
    padding: 0 1em 0.35em;
    border-bottom:1px solid #808080;
}
/* When the collapsed class is added, add a border to the bottom of the titlebar (since the toolbar itself is display none) */
.yui-skin-sam .yui-toolbar-container-collapsed .yui-toolbar-titlebar {
    border-bottom:1px solid #808080;
}

/* Remove the shadows from the menus in the toolbar - Menu.css override */
.yui-skin-sam .yui-editor-container .visible .yui-menu-shadow,
.yui-skin-sam .yui-editor-panel .visible .yui-menu-shadow {
    display: none;
}

/* Remove padding/margin from lists */
.yui-skin-sam .yui-editor-container ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
/* Remove padding/margin from list items */
.yui-skin-sam .yui-editor-container ul li {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
/* Float the LI's that wrap the buttons */
.yui-skin-sam .yui-toolbar-group ul li.yui-toolbar-groupitem {
    float: left;
}

/* Set the color and the border of the dompath container at the bottom of the editor */
.yui-skin-sam .yui-editor-container .dompath {
    background-color: #F2F2F2;
    border-top:1px solid #808080;
    color: #999;
    text-align: left;
    padding: 0.25em;
}

/* Set the image for the collapse button on the toolbar */
.yui-skin-sam .yui-toolbar-container .collapse {
    background: url(sprite.png) no-repeat 0 -400px;
}
/* Position the image and the container */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-titlebar span.collapse {
    cursor: pointer;
    position: absolute;
    top: 4px;
    right: 2px;
    display: block;
    overflow: hidden;
    height: 15px;
    width: 15px;
    text-indent: 9999px;
}

/* Set the default styles for the buttons */
.yui-skin-sam .yui-toolbar-container .yui-push-button,
.yui-skin-sam .yui-toolbar-container .yui-color-button,
.yui-skin-sam .yui-toolbar-container .yui-menu-button {
    background: url(sprite.png) repeat-x 0 0;
    position: relative;
    display: block;
    height: 22px;
    width: 30px;
    margin: 0;
    border-color: #808080;
    color: #f2f2f2;
    border-style: solid;
    border-width: 1px 0;
    zoom: 1;
}
/* Set the height of the buttons and pad them on the left for the icon */
.yui-skin-sam .yui-toolbar-container .yui-push-button a,
.yui-skin-sam .yui-toolbar-container .yui-color-button a,
.yui-skin-sam .yui-toolbar-container .yui-menu-button a {
    padding-left: 35px;
    height: 20px;
    text-decoration: none;
    font-size: 0px;
    line-height: 2;
    display: block;
    color: #000;
    overflow: hidden;
    white-space: nowrap;
}
.yui-skin-sam .yui-toolbar-container .yui-toolbar-spinbutton a,
.yui-skin-sam .yui-toolbar-container .yui-toolbar-select a {
    font-size: 12px;
}
/* Set the height of the buttons and pad them on the left for the icon */
.yui-skin-sam .yui-toolbar-container .yui-push-button .first-child,
.yui-skin-sam .yui-toolbar-container .yui-color-button .first-child,
.yui-skin-sam .yui-toolbar-container .yui-menu-button .first-child {
    border-color: #808080;
    border-style: solid;
    border-width: 0 1px;
    margin: 0 -1px;
    display: block;
    position: relative;
}
.yui-skin-sam .yui-toolbar-container .yui-push-button-disabled .first-child,
.yui-skin-sam .yui-toolbar-container .yui-color-button-disabled .first-child,
.yui-skin-sam .yui-toolbar-container .yui-menu-button-disabled .first-child {
    border-color: #ccc;
}
.yui-skin-sam .yui-toolbar-container .yui-push-button-disabled a,
.yui-skin-sam .yui-toolbar-container .yui-color-button-disabled a,
.yui-skin-sam .yui-toolbar-container .yui-menu-button-disabled a {
    color: #A6A6A6;
    cursor: default;
}
.yui-skin-sam .yui-toolbar-container .yui-push-button-disabled,
.yui-skin-sam .yui-toolbar-container .yui-color-button-disabled,
.yui-skin-sam .yui-toolbar-container .yui-menu-button-disabled {
    border-color: #ccc;
}
/* IE needs a little help positioning the first child */
.yui-skin-sam .yui-toolbar-container .yui-button .first-child {
    *left: 0px;
}

/* Font Family Drop Down */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-fontname {
    width: 135px;
}

/* Header Drop Down */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-heading {
    width: 92px;
}

/* Handle the hover state of the buttons */
.yui-skin-sam .yui-toolbar-container .yui-button-hover {
    background:url(sprite.png) repeat-x 0 -1300px;
    border-color: #808080;
}

/* Handle the selected state of the buttons */
.yui-skin-sam .yui-toolbar-container .yui-button-selected {
    background: url(sprite.png) repeat-x 0 -1700px;
    border-color: #808080;
}
/* When the nogrouplabels class is applied, set the h3's to display none */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-nogrouplabels h3 {
    display: none;
}
/* When not showing the h3 group labels, add some margin to make up for them*/
.yui-skin-sam .yui-toolbar-container .yui-toolbar-nogrouplabels .yui-toolbar-group {
	margin-top: .75em;
}


/* Handle the icon placeholder for the buttons
    This is very important - position of this must be absolute.
    If it is not positioned absolute, IE will place it over the a in the Toolbar
    Doing this will cause the editor to loose focus and loose the selection.
*/
.yui-skin-sam .yui-toolbar-container .yui-push-button span.yui-toolbar-icon,
.yui-skin-sam .yui-toolbar-container .yui-color-button span.yui-toolbar-icon,
.yui-skin-sam .yui-toolbar-container .yui-menu-button span.yui-toolbar-icon {
    display: block;
    position: absolute;
    top: 2px;
    height: 18px;
    width: 18px;
    overflow: hidden;
    background: url(editor-sprite.gif) no-repeat 30px 30px;
}

/* Swap out the image to an active image */
.yui-skin-sam .yui-toolbar-container .yui-button-selected span.yui-toolbar-icon, .yui-skin-sam .yui-toolbar-container .yui-button-hover span.yui-toolbar-icon {
    background-image: url(editor-sprite-active.gif);
}
/* Change the defaults to make them look more like the editor */
.yui-skin-sam .yui-toolbar-container .visible .yuimenuitemlabel {
    cursor: pointer;
    color: #000;
    *position: relative;
}

/* Set the background color of all menu containers */
.yui-skin-sam .yui-toolbar-container .yui-button-menu {
    background-color: #fff;
}
/* Adding this style to Menu's allows the scrolled menu to work in IE */
.yui-skin-sam .yui-toolbar-container .yui-button-menu .yui-menu-body-scrolled {
    position: relative;
}
/* Set the background of all menu items that are selected */
.yui-skin-sam div.yuimenu li.selected {
    background-color: #B3D4FF;
}
/* Set the color of the hrefs in a selected menu item */
.yui-skin-sam div.yuimenu li.selected a.selected {
    color: #000;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-bold span.yui-toolbar-icon {
    background-position: 0 0;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-strikethrough span.yui-toolbar-icon {
    background-position: 0 -108px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-italic span.yui-toolbar-icon {
    background-position: 0 -36px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-undo span.yui-toolbar-icon {
    background-position: 0 -1326px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-redo span.yui-toolbar-icon {
    background-position: 0 -1355px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-underline span.yui-toolbar-icon {
    background-position: 0 -72px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-subscript span.yui-toolbar-icon {
    background-position: 0 -180px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-superscript span.yui-toolbar-icon {
    background-position: 0 -144px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-forecolor span.yui-toolbar-icon {
    background-position: 0 -216px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-backcolor span.yui-toolbar-icon {
    background-position: 0 -288px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-justifyleft span.yui-toolbar-icon {
    background-position: 0 -324px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-justifycenter span.yui-toolbar-icon {
    background-position: 0 -360px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-justifyright span.yui-toolbar-icon {
    background-position: 0 -396px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-justifyfull span.yui-toolbar-icon {
    background-position: 0 -432px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-indent span.yui-toolbar-icon {
    background-position: 0 -720px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-outdent span.yui-toolbar-icon {
    background-position: 0 -684px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-createlink span.yui-toolbar-icon {
    background-position: 0 -792px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-insertimage span.yui-toolbar-icon {
    background-position: 1px -756px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-left span.yui-toolbar-icon {
    background-position: 0 -972px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-right span.yui-toolbar-icon {
    background-position: 0 -936px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-inline span.yui-toolbar-icon {
    background-position: 0 -900px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-block span.yui-toolbar-icon {
    background-position: 0 -864px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-bordercolor span.yui-toolbar-icon {
    background-position: 0 -252px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-removeformat span.yui-toolbar-icon {
    background-position: 0 -1080px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-hiddenelements span.yui-toolbar-icon {
    background-position: 0 -1044px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-insertunorderedlist span.yui-toolbar-icon {
    background-position: 0 -468px;
    left: 5px;
}
/* Setting the background position of the sprite */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-insertorderedlist span.yui-toolbar-icon {
    background-position: 0 -504px;
    left: 5px;
}
/* Set the width of the spin buttons */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-spinbutton,
.yui-skin-sam .yui-toolbar-container .yui-toolbar-spinbutton .first-child {
    width: 35px;
}
/* Pad the first child */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-spinbutton .first-child a {
    padding-left: 2px;
    text-align: left;    
}

/* Spin Buttons - Remove the icon holder, they don't need it */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-spinbutton span.yui-toolbar-icon {
    display: none;
}

/* Spin Buttons - Prep the arrows */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-spinbutton a.up,
.yui-skin-sam .yui-toolbar-container .yui-toolbar-spinbutton a.down {
    right: 2px;
    background: url(editor-sprite.gif) no-repeat 0 -1222px;
    overflow: hidden;
    height: 6px;
    width: 7px;
    min-height: 0;
    padding: 0;
}
/* Spin Buttons - The up arrow */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-spinbutton a.up {
    top: 2px;
    background-position: 0 -1222px;
}
/* Spin Buttons - The down arrow */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-spinbutton a.down {
    bottom: 2px;
    background-position: 0 -1187px;
}
/* Handle plain Select Elements */
.yui-skin-sam .yui-toolbar-container select {
    height: 22px;
    border: 1px solid #808080;
}
/* Pad and align the Select Menus */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-select .first-child a {
    padding-left: 5px;
    text-align: left;    
}
/* Set the icon of the select menu for the drop down arrow */
.yui-skin-sam .yui-toolbar-container .yui-toolbar-select span.yui-toolbar-icon {
    background: url( editor-sprite.gif ) no-repeat 0 -1144px;
    overflow: hidden;
    right: -2px;
    top: 0px;
    height: 20px;
}
/* Fix the color menu background if it's inside a Property Editor */
.yui-skin-sam .yui-editor-panel .yui-color-button-menu .bd {
    background-color: transparent;
    border: none;
    width: 135px;
}

/* Place a border around the color menu */
.yui-skin-sam .yui-color-button-menu .yui-toolbar-colors {
    border: 1px solid #808080;
}


/* Property Editor Panel styles */
.yui-skin-sam .yui-editor-panel {
    padding: 0;
    margin: 0;
    border: none;
    background-color: transparent;
    overflow: visible;
    position: absolute;
}

/* Margins on the header of the Property Editor */
.yui-skin-sam .yui-editor-panel .hd {
    margin: 10px 0 0;
    padding: 0;
    border: none;
}
/* Setup the background image on the title bar
    We are styling the h3 instead if the div so we can make room
    for the "knob" that floats on the top of the window.
*/
.yui-skin-sam .yui-editor-panel .hd h3 {
    color: #000;
    border: 1px solid #808080;
    background: url(sprite.png) repeat-x 0 -200px;
    width: 99%;
    position: relative;
    margin: 0;
    padding: 3px 0 0 0;
    font-size: 93%;
    text-indent: 5px;
    height: 20px;
}
/* Style the body of the Property Editor */
.yui-skin-sam .yui-editor-panel .bd {
    background-color: #F2F2F2;
    border-left: 1px solid #808080;
    border-right: 1px solid #808080;
    width: 99%;
    margin: 0;
    padding: 0;
    overflow: visible;
}
/* Remove the padding/margin on lists in the Property Editor */
.yui-skin-sam .yui-editor-panel ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

/* Remove the padding/margin on list items in the Property Editor */
.yui-skin-sam .yui-editor-panel ul li {
    margin: 0;
    padding: 0;
}
/* IE is havig trouble with our menu sizes here */
.yui-skin-sam .yui-editor-panel .yuimenu {
    /**width: 90px !important;*/
}
/* Remove the border from the toolbar's container and add some margin to it */
.yui-skin-sam .yui-editor-panel .yui-toolbar-container .yui-toolbar-subcont {
    padding: 0;
    border: none;
    margin-top: 0.35em;
}
/* Set the width of the bordersize and bordertype menu buttons */
.yui-skin-sam .yui-editor-panel .yui-toolbar-bordersize, .yui-skin-sam .yui-editor-panel .yui-toolbar-bordertype {
    width: 50px;
}

/* Form styling */
.yui-skin-sam .yui-editor-panel label {
    display: block;
    float: none;
    padding: 4px 0;
    margin-bottom: 7px;
}
/* Form styling */
.yui-skin-sam .yui-editor-panel label strong {
    font-weight: normal;
    font-size: 93%;
    text-align: right;
    padding-top: 2px;
}

/* Form styling */
.yui-skin-sam .yui-editor-panel label input {
    width: 75%;
}
/* Form styling */
.yui-skin-sam .yui-editor-panel .createlink_target,
.yui-skin-sam .yui-editor-panel .insertimage_target {
    width: auto;
    margin-right: 5px;
}

/* Form styling */
.yui-skin-sam .yui-editor-panel .removeLink {
    width: 98%;
}
/* Color the input yellow if it has the warning class applied */
.yui-skin-sam .yui-editor-panel label input.warning {
    background-color: #FFEE69;
}

/* Style the titles of the toolbar groups */
.yui-skin-sam .yui-editor-panel .yui-toolbar-group h3 {
    color: #000;
    float: left;
    font-weight: normal;
    font-size: 93%;
    margin: 5px 0 0 0;
    padding: 0 3px 0 0;
    text-align: right;
}
/* Style the header for the Height and Width boxes */
.yui-skin-sam .yui-editor-panel .height-width h3 {
    margin: 3px 0 0 10px;
}
/* Style the height and width container */
.yui-skin-sam .yui-editor-panel .height-width {
    margin: 3px 0 0 35px;
    *margin-left: 14px;
    width: 42%;
    *width: 44%;
}
/* Give the border group a width */
.yui-skin-sam .yui-editor-panel .yui-toolbar-group-border {
    width: 190px;
}
.yui-skin-sam .yui-editor-panel .no-button .yui-toolbar-group-border {
    width: 210px;
}
/* Give the padding group a width */
.yui-skin-sam .yui-editor-panel .yui-toolbar-group-padding {
    width: 203px;
    _width: 198px;
}
.yui-skin-sam .yui-editor-panel .no-button .yui-toolbar-group-padding {
    width: 172px;
}
/* Fix some margins for the H3's */
.yui-skin-sam .yui-editor-panel .yui-toolbar-group-padding h3 {
    margin-left: 25px;
    *margin-left: 12px;
}
/* Image Properties - Text flow container size */
.yui-skin-sam .yui-editor-panel .yui-toolbar-group-textflow {
    width: 182px;
}

/* Remove the background image set in Panel.css */
.yui-skin-sam .yui-editor-panel .hd {
    background: none;
}

/* Give the footer som color and a border */
.yui-skin-sam .yui-editor-panel .ft {
    background-color: #F2F2F2;
    border: 1px solid #808080;
    border-top: none;
    padding: 0;
    margin: 0 0 2px 0;
}

/* Style the close button in the Property Editor */
.yui-skin-sam .yui-editor-panel .hd span.close {
    background:url(sprite.png) no-repeat 0 -300px;
    cursor:pointer;
    display:block;
    height:16px;
    overflow:hidden;
    position:absolute;
    right:5px;
    text-indent:500px;
    top:2px;
    width:26px;
}
/* Style the tip in the footer */
.yui-skin-sam .yui-editor-panel .ft span.tip {
    background-color: #EDF5FF;
    border-top: 1px solid #808080;
    font-size: 85%;
}
/* Style the tip in the footer */
.yui-skin-sam .yui-editor-panel .ft span.tip strong {
    display: block;
    float: left;
    margin: 0 2px 8px 0;
}


/* Setup the icon for a tip */
.yui-skin-sam .yui-editor-panel .ft span.tip span.icon {
    background: url( editor-sprite.gif ) no-repeat 0 -1260px;
    display: block;
    height: 20px;
    left: 2px;
    position: absolute;
    top: 8px;
    width: 20px;
}
/* Setup the background image for an info icon */
.yui-skin-sam .yui-editor-panel .ft span.tip span.icon-info {
    background-position: 2px -1260px;
}
/* Setup the background image for a warning icon */
.yui-skin-sam .yui-editor-panel .ft span.tip span.icon-warn {
    background-position: 2px -1296px;
}

/* Handle the knob that floats on top of the panel */
.yui-skin-sam .yui-editor-panel .hd span.knob {
    position: absolute;
    height: 10px;
    width: 28px;
    top: -10px;
    left: 25px;
    text-indent: 9999px;
    overflow: hidden;
    background: url( editor-knob.gif ) no-repeat 0 0;
}
/* Reset some styles from the editor toolbar, when a toolbar is inside the Property Editor */
.yui-skin-sam .yui-editor-panel .yui-toolbar-container {
    float: left;
    width: 100%;
    background-image: none;
    border: none;
}
/* Reset styles for menu buttons inside the Property Editor */
.yui-skin-sam .yui-editor-panel .yui-toolbar-container .bd {
    background-color: #ffffff;
}

/* This image is the one used to place the blankimage placeholder into the editor when you click on Insert an Image */
.yui-editor-blankimage {
    background-image: url( blankimage.png );
}

.yui-skin-sam .yui-editor-container .yui-resize-handle-br {
    /* Make the handle a little bigger than the default */
    height: 11px;
    width: 11px;
    /* Resposition the image */
    background-position: -20px -60px;
    /* Kill the hover on the handle */
    background-color: transparent;
}
</textarea>
