<h2 class="first">Using Transition Effects via the "effect" Property and the ContainerEffect Object</h2>

<p>The ContainerEffect class allows <a href="http://developer.yahoo.com/yui/container/overlay/">Overlay</a> and its subclasses to be configured with transitional animations that are activated when an Overlay is shown or hidden. For instance, an Overlay can easily be  made to fade in and out, or slide in and out of the viewport when the visibility of the Overlay is changed. The <code>effect</code> property takes an object literal or an array of object literals which define two fields: the predefined effect to use, and the duration of the animation.</p>

<p>In this tutorial, we will create three Overlays and set them up to use the <code>effect</code> property in different ways. First, we will create a simple Overlay that fades in and out. The built-in ContainerEffect constant used for the fade animation is <code>YAHOO.widget.ContainerEffect.FADE</code>, so we will specify that as the "effect" property of our object literal. The duration should be 0.25 seconds, specified by the "duration" property of the literal:</p>

<textarea name="code" class="JScript" cols="60" rows="1">
YAHOO.example.container.overlay1 = 
	new YAHOO.widget.Overlay("overlay1", { xy:[150,100], 
	   visible:false, 
	   zIndex:1000,
	   width:"300px",
	   effect:{effect:YAHOO.widget.ContainerEffect.FADE,duration:0.25} } );
</textarea>

<p>Our second Overlay shows how you can use  ContainerEffect's "SLIDE" constant. This Overlay looks exactly like the first one, but we will replace "FADE" with "SLIDE":</p>

<textarea name="code" class="JScript" cols="60" rows="1">
YAHOO.example.container.overlay2 = 
	new YAHOO.widget.Overlay("overlay2", { xy:[250,200], 
	   visible:false, 
	   zIndex:1000,
	   width:"300px",
	   effect:{effect:YAHOO.widget.ContainerEffect.SLIDE,duration:0.25} } );
</textarea>

<p>Effects can also be specified as an array of transitions that will all execute simultaneously. For instance, an Overlay can be made to fade and slide in at the same time. When using the ContainerEffect class to configure your Overlay, chaining is not supported, so all animations will always execute at the same time. However, if you need to chain animations, the Animation utility allows you to do this using events. We will set up the third and final Overlay with an array of effects:</p>

<textarea name="code" class="JScript" cols="60" rows="1">
YAHOO.example.container.overlay3 = 
	new YAHOO.widget.Overlay("overlay3", { xy:[350,300], 
	   visible:false, 
	   zIndex:1000,
	   width:"300px",
	   effect:[{effect:YAHOO.widget.ContainerEffect.FADE,duration:0.5},
			   {effect:YAHOO.widget.ContainerEffect.SLIDE,duration:0.5}] } );
</textarea>