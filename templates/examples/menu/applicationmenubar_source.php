<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>Example: Application Menubar (YUI Library)</title>

        <!-- Standard reset and fonts -->

        <link rel="stylesheet" type="text/css" href="../../build/reset/reset.css">
        <link rel="stylesheet" type="text/css" href="../../build/fonts/fonts.css">
        <link rel="stylesheet" type="text/css" href="../../build/container/assets/skins/sam/container.css">


        <!-- CSS for Menu -->

        <link rel="stylesheet" type="text/css" href="../../build/menu/assets/skins/sam/menu.css"> 


        <!-- Page-specific styles -->

        <style type="text/css">

            html {
            
                background-color: #dfb8df;
            
            }
            
            em#yahoolabel {

                text-indent: -6em;
                display: block;
                background: url(http://us.i1.yimg.com/us.yimg.com/i/us/nt/b/purpley.1.0.gif) center center no-repeat;
                width: 2em;
                overflow: hidden;

            }


            /*
                Setting the "zoom" property to "1" triggers the "hasLayout" 
                property in IE.  This is necessary to fix a bug IE where 
                mousing mousing off a the text node of MenuItem instance's 
                text label, or help text without the mouse actually exiting the
                boundaries of the MenuItem instance will result in the losing  
                the background color applied when it is selected.
            */
            
            #filemenu.visible .yuimenuitemlabel,
            #editmenu.visible .yuimenuitemlabel {

                *zoom: 1;

            }


			/*
				Remove "hasLayout" from the submenu of the file menu.			
			*/

            #filemenu.visible .yuimenu .yuimenuitemlabel {

                *zoom: normal;

            }
        
        </style>


        <!-- Dependency source files -->

        <script type="text/javascript" src="../../build/utilities/utilities.js"></script>
        <script type="text/javascript" src="../../build/container/container.js"></script>


        <!-- Menu source file -->

        <script type="text/javascript" src="../../build/menu/menu.js"></script>


        <!-- Page-specific script -->

        <script type="text/javascript">

            /*
                 Initialize and render the MenuBar when the page's DOM is ready 
                 to be scripted.
            */

            YAHOO.util.Event.onDOMReady(function () {

                /*
                     Define an array of object literals, each containing 
                     the data necessary to create the items for a MenuBar.
                */

                var aItemData = [

                    { 
                        text: "<em id=\"yahoolabel\">Yahoo!</em>", 
                        submenu: { 
                            id: "yahoo", 
                            itemdata: [
                                "About Yahoo!",
                                "YUI Team Info",
                                "Preferences"
                            ]
                        }
                        
                    },

                    { 
                        text: "File", 
                        submenu: {  
                            id: "filemenu", 
                            itemdata: [

                                { text: "New File", helptext: "Ctrl + N" },
                                "New Folder",
                                { text: "Open", helptext: "Ctrl + O" },
                                { 
                                    text: "Open With...", 
                                    submenu: { 
                                        id: "applications", 
                                        itemdata: [
                                            "Application 1", 
                                            "Application 2", 
                                            "Application 3", 
                                            "Application 4"
                                        ] 
                                    } 
                                },
                                { text: "Print", helptext: "Ctrl + P" }

                            ] 
                        }
                    
                    },
                    
                    {
                        text: "Edit", 
                        submenu: { 
                            id: "editmenu", 
                            itemdata: [

                                [ 
                                    { text: "Undo", helptext: "Ctrl + Z" },
                                    { text: "Redo", helptext: "Ctrl + Y", disabled: true }
                                ],
                                
                                [
                                    { text: "Cut", helptext: "Ctrl + X", disabled: true },
                                    { text: "Copy", helptext: "Ctrl + C", disabled: true },
                                    { text: "Paste", helptext: "Ctrl + V" },
                                    { text: "Delete", helptext: "Del", disabled: true }
                                ],
                                
                                [ { text: "Select All", helptext: "Ctrl + A" } ],
    
                                [
                                    { text: "Find", helptext: "Ctrl + F" },
                                    { text: "Find Again", helptext: "Ctrl + G" }
                                ]
                    
                        ] }

                    },

                    "View",

                    "Favorites",

                    "Tools",

                    "Help"
                ];


                /*
                     Instantiate a MenuBar:  The first argument passed to the 
                     constructor is the id of the element to be created; the 
                     second is an object literal of configuration properties.
                */

                var oMenuBar = new YAHOO.widget.MenuBar("mymenubar", { 
                                                            lazyload: true, 
                                                            itemdata: aItemData 
                                                            });


                /*
                     Since this MenuBar instance is built completely from 
                     script, call the "render" method passing in a node 
                     reference for the DOM element that its should be 
                     appended to.
                */

                oMenuBar.render(document.body);


                // Add a "show" event listener for each submenu.
                
                function onSubmenuShow() {

					var oIFrame,
						oElement,
                        nOffsetWidth;


					// Keep the left-most submenu against the left edge of the browser viewport

					if (this.id == "yahoo") {
						
						YAHOO.util.Dom.setX(this.element, 0);

						oIFrame = this.iframe;            
			

						if (oIFrame) {
				
							YAHOO.util.Dom.setX(oIFrame, 0);
				
						}
						
						this.cfg.setProperty("x", 0, true);
					
					}


					/*
						Need to set the width for submenus of submenus in IE to prevent the mouseout 
						event from firing prematurely when the user mouses off of a MenuItem's 
						text node.
					*/

                    if ((this.id == "filemenu" || this.id == "editmenu") && YAHOO.env.ua.ie) {

                        oElement = this.element;
                        nOffsetWidth = oElement.offsetWidth;
                
                        /*
                            Measuring the difference of the offsetWidth before and after
                            setting the "width" style attribute allows us to compute the 
                            about of padding and borders applied to the element, which in 
                            turn allows us to set the "width" property correctly.
                        */
                        
                        oElement.style.width = nOffsetWidth + "px";
                        oElement.style.width = (nOffsetWidth - (oElement.offsetWidth - nOffsetWidth)) + "px";
                    
                    }

                }
                

                // Subscribe to the "show" event for each submenu
                
                oMenuBar.subscribe("show", onSubmenuShow);


                var oPanel = new YAHOO.widget.Panel("exampleinfo", { constraintoviewport: true, fixedcenter: true, width: "400px", zIndex: 1});
                
                oPanel.setHeader("Application Menubar Example");
                oPanel.setBody("This example demonstrates how to create an application-like menu bar using JavaScript.");

                oPanel.render(document.body);
            
            });

        </script>

    </head>
    <body class="yui-skin-sam">
    </body>
</html>