<style>
#example { height:10em; }
.mask { background-color:#000;-moz-opacity:0.75;opacity:.75;filter:alpha(opacity=75);}
.photobox {border:3px solid #666;overflow:visible;background-color:#333;padding:5px;}
.photobox .container-close {top:8px;right:8px;height:15px;width:18px;}
.photobox .container-close.nonsecure {background-image:url(<?php echo $assetsDirectory; ?>img/ybox-close.gif);}
.photobox .container-close.secure {background-image:url(<?php echo $assetsDirectory; ?>img/ybox-close.gif);}
.photobox .hd {font-family:georgia, times new roman, times, serif;font-weight:normal;border:none;border-bottom:1px solid #666;background:transparent;color:#FFF;height:18px;text-align:left;overflow:visible;padding:0;padding-bottom:5px;margin-bottom:5px;width:500px;}
.photobox .hd span {vertical-align:middle;line-height:15px;}
.photobox .bd  {padding:0;}
.photobox .bd img {border:none;}
.photobox .ft {height:16px;width:500px;padding:5px 0;position:relative;}
.photobox .ft .back {position:absolute;left:1px;}
.photobox .ft .back img, .photobox .ft .next img {border:none;}
.photobox .ft .next {position:absolute;right:1px;}
</style>

<script>
YAHOO.namespace("example.container");

// BEGIN PHOTOBOX SUBCLASS //
YAHOO.widget.PhotoBox = function(el, userConfig) {
	if (arguments.length > 0) {
		YAHOO.widget.PhotoBox.superclass.constructor.call(this, el, userConfig);
	}
}

// Inherit from YAHOO.widget.Panel
YAHOO.extend(YAHOO.widget.PhotoBox, YAHOO.widget.Panel);

// Define the CSS class for the PhotoBox
YAHOO.widget.PhotoBox.CSS_PHOTOBOX = "photobox";

// Define the HTML for the footer navigation
YAHOO.widget.PhotoBox.NAV_FOOTER_HTML = "<a id=\"$back.id\" href=\"javascript:void(null)\" class=\"back\"><img src=\"<?php echo $assetsDirectory; ?>img/ybox-back.gif\" /></a><a id=\"$next.id\" href=\"javascript:void(null)\" class=\"next\"><img src=\"<?php echo $assetsDirectory; ?>img/ybox-next.gif\" /></a>";

// Initialize the PhotoBox by setting up the footer navigation
YAHOO.widget.PhotoBox.prototype.init = function(el, userConfig) {
	YAHOO.widget.PhotoBox.superclass.init.call(this, el); 
	
	this.beforeInitEvent.fire(YAHOO.widget.PhotoBox);

	YAHOO.util.Dom.addClass(this.innerElement, YAHOO.widget.PhotoBox.CSS_PHOTOBOX);
	
	if (userConfig) {
		this.cfg.applyConfig(userConfig, true);
	}
	
	this.setFooter(YAHOO.widget.PhotoBox.NAV_FOOTER_HTML.replace("$back.id",this.id+"_back").replace("$next.id",this.id+"_next"));
	
	this.renderEvent.subscribe(function() {
		var back = document.getElementById(this.id + "_back");
		var next = document.getElementById(this.id + "_next");

		YAHOO.util.Event.addListener(back, "mousedown", this.back, this, true);
		YAHOO.util.Event.addListener(next, "mousedown", this.next, this, true);

	}, this, true);

	this.initEvent.fire(YAHOO.widget.PhotoBox);
};

// Set up the PhotoBox's "photos" property for setting up the list of photos
YAHOO.widget.PhotoBox.prototype.initDefaultConfig = function() {
	YAHOO.widget.PhotoBox.superclass.initDefaultConfig.call(this);
	
	this.cfg.addProperty("photos", { handler:this.configPhotos, suppressEvent:true });
};

// Handler executed when the "photos" property is modified
YAHOO.widget.PhotoBox.prototype.configPhotos = function(type, args, obj) {
	var photos = args[0];

	if (photos) {
		this.images = [];

		if (! (photos instanceof Array)) {
			photos = [photos];
		}

		this.currentImage = 0;

		if (photos.length == 1) {
			this.footer.style.display = "none";
		}

		for (var p=0;p<photos.length;p++) {
			var photo = photos[p];
			var img = new Image();
			img.src = photo.src;
			img.title = photo.caption;
			img.id = this.id + "_img";
			img.width = 500
			this.images[this.images.length] = img;
		}

		this.setImage(0);
	}
};

// Sets the current image displayed in the PhotoBox to the corresponding image in the photo dataset, 
// and determines whether back and forward arrows should be diplsayed, based on the position in the dataset
YAHOO.widget.PhotoBox.prototype.setImage = function(index) {
	var photos = this.cfg.getProperty("photos");

	if (photos) {
		if (! (photos instanceof Array)) {
			photos = [photos];
		}
		
		var back = document.getElementById(this.id + "_back");
		var next = document.getElementById(this.id + "_next");
		var img =  document.getElementById(this.id + "_img");
		var title = document.getElementById(this.id + "_title");

		this.currentImage = index;

		var current = this.images[index];

		var imgNode = document.createElement("IMG");
		imgNode.setAttribute("src",current.src);
		imgNode.setAttribute("title",current.title);
		imgNode.setAttribute("width",500);
		imgNode.setAttribute("id",current.id);
		
		img.parentNode.replaceChild((this.browser == "safari"?imgNode:current), img);
		
		this.body.style.height = "auto";

		title.innerHTML = current.title;

		if (this.currentImage == 0) {
			back.style.display = "none";
		} else {
			back.style.display = "block";
		}

		if (this.currentImage == (photos.length-1)) {
			next.style.display = "none";
		} else {
			next.style.display = "block";
		}
	}
};

// Navigates to the next image
YAHOO.widget.PhotoBox.prototype.next = function() {	
	if (typeof this.currentImage == 'undefined') {
		this.currentImage = 0;
	}

	this.setImage(this.currentImage+1);
};

// Navigates to the previous image
YAHOO.widget.PhotoBox.prototype.back = function() {
	if (typeof this.currentImage == 'undefined') {
		this.currentImage = 0;
	}

	this.setImage(this.currentImage-1);
};

// Overrides the handler for the "modal" property with special animation-related functionality
YAHOO.widget.PhotoBox.prototype.configModal = function(type, args, obj) {
	var modal = args[0];

	if (modal) {
		this.buildMask();

		if (typeof this.maskOpacity == 'undefined') {
			this.mask.style.visibility = "hidden";
			this.mask.style.display = "block";
			this.maskOpacity = YAHOO.util.Dom.getStyle(this.mask,"opacity");
			this.mask.style.display = "none";
			this.mask.style.visibility = "visible";
		}

		if (! YAHOO.util.Config.alreadySubscribed( this.beforeShowEvent, this.showMask, this ) ) {
			this.beforeShowEvent.subscribe(this.showMask, this, true);
		}
		if (! YAHOO.util.Config.alreadySubscribed( this.hideEvent, this.hideMask, this) ) {
			this.hideEvent.subscribe(this.hideMask, this, true);
		}
		if (! YAHOO.util.Config.alreadySubscribed( YAHOO.widget.Overlay.windowResizeEvent, this.sizeMask, this ) ) {
			YAHOO.widget.Overlay.windowResizeEvent.subscribe(this.sizeMask, this, true);
		}
		if (! YAHOO.util.Config.alreadySubscribed( this.destroyEvent, this.removeMask, this) ) {
			this.destroyEvent.subscribe(this.removeMask, this, true);
		}
		this.cfg.refireEvent("zIndex");
	} else {
		this.beforeShowEvent.unsubscribe(this.showMask, this);
		this.beforeHideEvent.unsubscribe(this.hideMask, this);
		YAHOO.widget.Overlay.windowResizeEvent.unsubscribe(this.sizeMask);
	}
};

// Overrides the showMask function to allow for fade-in animation
YAHOO.widget.PhotoBox.prototype.showMask = function() {
	if (this.cfg.getProperty("modal") && this.mask) {
		YAHOO.util.Dom.addClass(document.body, "masked");
		this.sizeMask();

		var o = this.maskOpacity;

		if (! this.maskAnimIn) {
			this.maskAnimIn = new YAHOO.util.Anim(this.mask, {opacity: {to:o}}, 0.25)
			YAHOO.util.Dom.setStyle(this.mask, "opacity", 0);
		}

		if (! this.maskAnimOut) {
			this.maskAnimOut = new YAHOO.util.Anim(this.mask, {opacity: {to:0}}, 0.25)
			this.maskAnimOut.onComplete.subscribe(function() {
													this.mask.tabIndex = -1;
													this.mask.style.display = "none";
													this.hideMaskEvent.fire();
													YAHOO.util.Dom.removeClass(document.body, "masked");
												  }, this, true);
			
		}
		this.mask.style.display = "block";
		this.maskAnimIn.animate();
		this.mask.tabIndex = 0;
		this.showMaskEvent.fire();
	}
};

// Overrides the showMask function to allow for fade-out animation
YAHOO.widget.PhotoBox.prototype.hideMask = function() {
	if (this.cfg.getProperty("modal") && this.mask) {
		this.maskAnimOut.animate();
	}
};
// END PHOTOBOX SUBCLASS //

function init() {
	YAHOO.example.container.photobox = new YAHOO.widget.PhotoBox("photobox", 
	{ 
		effect:{effect:YAHOO.widget.ContainerEffect.FADE,duration:0.45}, 
		fixedcenter:true,
		constraintoviewport:true,
		underlay:"none",
		close:true,
		visible:false,
		draggable:false,
		modal:true, 
		photos:[{src:"http://developer.yahoo.com/yui/docs/assets/examples/exampleimages/medium/japan.jpg",caption:"Japan"},
				{src:"http://developer.yahoo.com/yui/docs/assets/examples/exampleimages/medium/katatjuta.jpg",caption:"Kata Tjuta National Park"},
				{src:"http://developer.yahoo.com/yui/docs/assets/examples/exampleimages/medium/morraine.jpg",caption:"Morraine Meadows"},
				{src:"http://developer.yahoo.com/yui/docs/assets/examples/exampleimages/medium/museum.jpg",caption:"British Museum"},
				{src:"http://developer.yahoo.com/yui/docs/assets/examples/exampleimages/medium/uluru.jpg",caption:"Uluru"},
				{src:"http://developer.yahoo.com/yui/docs/assets/examples/exampleimages/medium/yui.jpg",caption:"YUI"}
			   ], 
		width:"500px"
	} );
	YAHOO.example.container.photobox.render();
	
	YAHOO.util.Event.addListener("show", "click", YAHOO.example.container.photobox.show, YAHOO.example.container.photobox, true);
}

YAHOO.util.Event.onDOMReady(init);
</script>

<button id="show">Show PhotoBox</button>

<div id="photobox">
	<div class="hd"><div class="lt"></div><span id="photobox_title"></span><div class="rt"></div></div>
	<div class="bd">
		<img id="photobox_img" src="#" width="500"/>
	</div>
</div>

