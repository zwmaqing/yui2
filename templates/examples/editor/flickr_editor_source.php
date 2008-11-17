<style>
    .yui-skin-sam .yui-toolbar-container .yui-toolbar-flickr span.yui-toolbar-icon {
        background-image: url( <?php echo $assetsDirectory; ?>flickr_default.gif );
        background-position: 1px 0px;
        left: 5px;
    }
    .yui-skin-sam .yui-toolbar-container .yui-toolbar-flickr-selected span.yui-toolbar-icon {
        background-image: url( <?php echo $assetsDirectory; ?>flickr_active.gif );
        background-position: 1px 0px;
        left: 5px;
    }

        #gutter1 {
            overflow: hidden;
            visibility: hidden;
            text-align: left;
        }

        #gutter1 .bd {
            border:1px solid #808080;
            border-left: none;
            background-color: #F2F2F2;
            height: 95%;
            overflow: hidden;
            width: 249px;
            margin-top: 10px;
            padding-left: .25em;
        }

        #gutter1 ul {
            list-style-type: none;
        }
        #gutter1 ul li {
            margin: 0;
            padding: 0;
            float:left;
            display:inline;
        }

        #gutter1 .bd h2 {
            font-size: 120%;
            font-weight: bold;
            margin: 0.5em 0;
            color: #000;
            border: none;
        }

        #gutter1 img {
            margin: 0 .5em;
            border:1px solid #808080;
            height: 50px;
            width: 50px;
        }

        #flickr_results {
            height: 75%;
            overflow: auto;
            position:static;
        }

        #flickr_results p {
            padding: .5em;
            margin-bottom: 1em;
        }

        #flickr_results div.yui-ac-content {
            width: 225px;
        }

        .yui-skin-sam .yui-ac-input {
            position: static;
            width: 12em;
        }

        #gutter1 .tip {
            display:block;
            font-size:85%;
            margin:0.5em;
            padding-left:23px;
            position:relative;
            text-align:left;
        }

        #gutter1 .tip span.icon-info {
            background-position:-106px -32px;
            background-image:url(css/sprite.png);
            background-position:-84px -32px;
            display:block;
            height:20px;
            left:0pt;
            position:absolute;
            top:0pt;
            width:20px;
        }
</style>
<style>
.yui-toolbar-group-insertitem {
    *width: auto;
}
</style>

<form method="post" action="#" id="form1">
<textarea id="editor" name="editor" rows="20" cols="75">
This is some more test text. <font face="Times New Roman">This is some more test text. This is some more <b>test <i>text</i></b></font>. This is some more test text. This is some more test text. This is some more test text. This is some more test text. This is some more test text. This is some more test text. 
</textarea>
</form>

<script>

/* Gutter Plugin */
(function() {
    var Dom = YAHOO.util.Dom,
        Event = YAHOO.util.Event;

    YAHOO.gutter = function() {
        return {
            status: false,
            gutter: null,
            createGutter: function() {
                YAHOO.log('Creating gutter (#gutter1)', 'info', 'example');
                this.gutter = new YAHOO.widget.Overlay('gutter1', {
                    height: '425px',
                    width: '300px',
                    context: [myEditor.get('element_cont').get('element'), 'tl', 'tr'],
                    position: 'absolute',
                    visible: false
                });
                this.gutter.hideEvent.subscribe(function() {
                    myEditor.toolbar.deselectButton('flickr');
                    Dom.setStyle('gutter1', 'visibility', 'visible');                
                    var anim = new YAHOO.util.Anim('gutter1', {
                        width: {
                            from: 300,
                            to: 0
                        },
                        opacity: {
                            from: 1,
                            to: 0
                        }
                    }, 1);
                    anim.onComplete.subscribe(function() {  
                        Dom.setStyle('gutter1', 'visibility', 'hidden');
                    });
                    anim.animate();
                }, this, true);
                this.gutter.showEvent.subscribe(function() {
                    myEditor.toolbar.selectButton('flickr');
                    this.gutter.cfg.setProperty('context', [myEditor.get('element_cont').get('element'), 'tl', 'tr']);
                    Dom.setStyle(this.gutter.element, 'width', '0px');
                    var anim = new YAHOO.util.Anim('gutter1', {
                        width: {
                            from: 0,
                            to: 300
                        },
                        opacity: {
                            from: 0,
                            to: 1
                        }
                    }, 1);
                    anim.animate();
                }, this, true);
                var warn = '';
                if (myEditor.browser.webkit || myEditor.browser.opera) {
                    warn = myEditor.STR_IMAGE_COPY;
                }
                this.gutter.setBody('<h2>Flickr Image Search</h2><label for="flikr_search">Tag:</label><input type="text" value="" id="flickr_search"><div id="flickr_results"><p>Enter flickr tags into the box above, separated by commas. Be patient, this example my take a few seconds to get the images..</p></div>' + warn);
                this.gutter.render(document.body);
            },
            open: function() {
                Dom.get('flickr_search').value = '';
                YAHOO.log('Show Gutter', 'info', 'example');
                this.gutter.show();
                this.status = true;
            },
            close: function() {
                YAHOO.log('Close Gutter', 'info', 'example');
                this.gutter.hide();
                this.status = false;
            },
            toggle: function() {
                if (this.status) {
                    this.close();
                } else {
                    this.open();
                }
            }
        }
    }
    
})();


YAHOO.util.Event.onAvailable('flickr_search', function() {
    YAHOO.log('onAvailable: #flickr_search', 'info', 'example');
    YAHOO.util.Event.on('flickr_results', 'mousedown', function(ev) {
        YAHOO.util.Event.stopEvent(ev);
        var tar = YAHOO.util.Event.getTarget(ev);
        if (tar.tagName.toLowerCase() == 'img') {
            if (tar.getAttribute('fullimage', 2)) {
                YAHOO.log('Found an image, insert it..', 'info', 'example');
                var img = tar.getAttribute('fullimage', 2),
                    title = tar.getAttribute('fulltitle'),
                    owner = tar.getAttribute('fullowner'),
                    url = tar.getAttribute('fullurl');
                this.toolbar.fireEvent('flickrClick', { type: 'flickrClick', img: img, title: title, owner: owner, url: url });
            }
        }
    }, myEditor, true);
    YAHOO.log('Create the Auto Complete Control', 'info', 'example');
    oACDS = new YAHOO.widget.DS_XHR("<?php echo $assetsDirectory; ?>flickr_proxy.php",
        ["photo", "title", "id", "owner", "secret", "server"]);
    oACDS.scriptQueryParam = "tags";
    oACDS.responseType = YAHOO.widget.DS_XHR.TYPE_XML;
    oACDS.maxCacheEntries = 0;
    oACDS.scriptQueryAppend = "method=flickr.photos.search";

    // Instantiate AutoComplete
    oAutoComp = new YAHOO.widget.AutoComplete('flickr_search','flickr_results', oACDS);
    oAutoComp.autoHighlight = false;
    oAutoComp.alwaysShowContainer = true; 
    oAutoComp.formatResult = function(oResultItem, sQuery) {
        // This was defined by the schema array of the data source
        var sTitle = oResultItem[0];
        var sId = oResultItem[1];
        var sOwner = oResultItem[2];
        var sSecret = oResultItem[3];
        var sServer = oResultItem[4];
        var urlPart = 'http:/'+'/static.flickr.com/' + sServer + '/' + sId + '_' + sSecret;
        var sUrl = urlPart + '_s.jpg';
        var lUrl = urlPart + '_m.jpg';
        var fUrl = 'http:/'+'/www.flickr.com/photos/' + sOwner + '/' + sId;
        var sMarkup = '<img src="' + sUrl + '" fullimage="' + lUrl + '" fulltitle="' + sTitle + '" fullid="' + sOwner + '" fullurl="' + fUrl + '" class="yui-ac-flickrImg" title="Click to add this image to the editor"><br>';
        return (sMarkup);
    };
});

var gutter = null;

var myConfig = {
    height: '300px',
    width: '600px',
    animate: true,
    dompath: true,
    focusAtStart: true
};

YAHOO.log('Editor loaded..', 'info', 'example');
var myEditor = new YAHOO.widget.Editor('editor', myConfig);

myEditor.on('toolbarLoaded', function() { 
    YAHOO.log('Toolbar loaded, add button and create gutter', 'info', 'example');
    gutter = new YAHOO.gutter();

    var flickrConfig = {
            type: 'push',
            label: 'Insert Flickr Image',
            value: 'flickr'
    }
   
    myEditor.toolbar.addButtonToGroup(flickrConfig, 'insertitem');

    myEditor.toolbar.on('flickrClick', function(ev) {
        YAHOO.log('flickrClick: ' + YAHOO.lang.dump(ev), 'info', 'example');
        this._focusWindow();
        if (ev && ev.img) {
            YAHOO.log('We have an image, insert it', 'info', 'example');
            //To abide by the Flickr TOS, we need to link back to the image that we just inserted
            var html = '<a href="' + ev.url + '"><img src="' + ev.img + '" title="' + ev.title + '"></a>';
            this.execCommand('inserthtml', html);
        }
        gutter.toggle();
    }, myEditor, true);
    gutter.createGutter();
});
myEditor.render();

</script>

