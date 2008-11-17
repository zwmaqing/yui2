<h2 class="first">Resize Utility's core CSS file</h2>

<p>The Resize Utility's base class is a starting point for skinning the Resize Utility. Include this file and use the skin file as a reference for your new skin (<a href="../../build/resize/assets/resize-core.css">you can view the full contents of the base class here</a>).</p>

<h2>Sam's skin CSS file</h2>

<p>Once you have the base class in place, you can proceed to customize the look and feel of your Resize Utility by working with the skinnning file.   Starting with the Sam Skin version below is generally the fastest approach, allowing you to customize just those parts of the skin that will make your implementation resonate with the overall design of your application.</p>

<textarea name="code" class="CSS">
/* Give the handle a background color */
.yui-skin-sam .yui-resize .yui-resize-handle {
    background-color: #F2F2F2;
}
/* Give the active handle a different color */
.yui-skin-sam .yui-resize .yui-resize-handle-active {
    background-color: #7D98B8;
    zoom: 1;
}
.yui-skin-sam .yui-resize .yui-resize-handle-l,
.yui-skin-sam .yui-resize .yui-resize-handle-r,
.yui-skin-sam .yui-resize .yui-resize-handle-l-active,
.yui-skin-sam .yui-resize .yui-resize-handle-r-active {
    height: 100%;
}
/* Give a border to the 8-way knob style handles */
.yui-skin-sam .yui-resize-knob .yui-resize-handle {
    border: 1px solid #808080;
}
/* Show the active handle when hovered */
.yui-skin-sam .yui-resize-hover .yui-resize-handle-active {
    opacity: 1;
    filter: alpha(opacity=100);
}

/* Style the resize proxy */
.yui-skin-sam .yui-resize-proxy {
    border: 1px dashed #426FD9;
}

/* Style the status box similar to a tooltip */
.yui-skin-sam .yui-resize-status {
    border: 1px solid #A6982B;
    border-top: 1px solid #D4C237;
    background-color: #FFEE69;
    color: #000;
}


/* Style the content of the status box */
.yui-skin-sam .yui-resize-status strong, .yui-skin-sam .yui-resize-status em {
    float: left;
    display: block;
    clear: both;
    padding: 1px;
    text-align: center;
}

/* Setup the gripper */
.yui-skin-sam .yui-resize .yui-resize-handle-inner-r,
.yui-skin-sam .yui-resize .yui-resize-handle-inner-l {
    background: transparent url( layout_sprite.png) no-repeat 0 -5px;
    height: 16px;
    width: 5px;
    position: absolute;
    top: 45%;
}

/* Setup the gripper */
.yui-skin-sam .yui-resize .yui-resize-handle-inner-t,
.yui-skin-sam .yui-resize .yui-resize-handle-inner-b {
    background: transparent url(layout_sprite.png) no-repeat -20px 0;
    height: 5px;
    width: 16px;
    position: absolute;
    left: 50%;
}

/* Bottom Right Gripper */
.yui-skin-sam .yui-resize .yui-resize-handle-br {
    background-image: url( layout_sprite.png );
    background-repeat: no-repeat;
    background-position: -22px -62px;
}

/* Top Right Gripper */
.yui-skin-sam .yui-resize .yui-resize-handle-tr {
    background-image: url( layout_sprite.png );
    background-repeat: no-repeat;
    background-position: -22px -42px;
}

/* Top Left Gripper */
.yui-skin-sam .yui-resize .yui-resize-handle-tl {
    background-image: url( layout_sprite.png );
    background-repeat: no-repeat;
    background-position: -22px -82px;
}

/* Bottom Left Gripper */
.yui-skin-sam .yui-resize .yui-resize-handle-bl {
    background-image: url( layout_sprite.png );
    background-repeat: no-repeat;
    background-position: -22px -23px;
}

/* Remove the background image from the 8-way knobs */
.yui-skin-sam .yui-resize-knob .yui-resize-handle-t,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-r,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-b,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-l,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-tl,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-tr,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-bl,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-br,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-inner-t,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-inner-r,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-inner-b,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-inner-l,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-inner-tl,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-inner-tr,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-inner-bl,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-inner-br {
    background-image: none;
}

.yui-skin-sam .yui-resize-knob .yui-resize-handle-l,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-r,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-l-active,
.yui-skin-sam .yui-resize-knob .yui-resize-handle-r-active {
    height: 6px;
    width: 6px;
}
</textarea>
