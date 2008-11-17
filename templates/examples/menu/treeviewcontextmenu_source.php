<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>Example: Adding A Context Menu To A TreeView (YUI Library)</title>

        <!-- Standard reset and fonts -->

        <link rel="stylesheet" type="text/css" href="../../build/reset/reset.css">
        <link rel="stylesheet" type="text/css" href="../../build/fonts/fonts.css">
            

        <!-- CSS for TreeView -->
        <link rel="stylesheet" type="text/css" href="../../build/treeview/assets/skins/sam/treeview.css">
         

        <!-- CSS for Menu -->

        <link rel="stylesheet" type="text/css" href="../../build/menu/assets/skins/sam/menu.css"> 


        <!-- Page-specific styles -->

        <style type="text/css">

            h1 { 

                font-weight: bold; 
                margin: 0 0 1em 0;
            }

            body {
            
                padding: 1em;
            
            }

            p, ul {

                margin: 1em 0;

            }

            
            p em,
            #operainstructions li em {

                font-weight: bold;

            }

            #operainstructions {

                list-style-type: square;
                margin-left: 2em;

            }

        </style>


        <!-- Dependency source files -->

        <script type="text/javascript" src="../../build/yahoo-dom-event/yahoo-dom-event.js"></script>
        <script type="text/javascript" src="../../build/container/container_core.js"></script>
        <script type="text/javascript" src="../../build/treeview/treeview.js"></script>


        <!-- Menu source file -->

        <script type="text/javascript" src="../../build/menu/menu.js"></script>


        <!-- Page-specific script -->

        <script type="text/javascript">

            /*
                 Initialize the TreeView instance when the "mytreeview" <div>
                 is ready to be scripted.
            */

            YAHOO.util.Event.onAvailable("mytreeview", function () {

                /*
                     Map of YAHOO.widget.TextNode instances in the 
                     TreeView instance.
                */

                var oTextNodeMap = {};
            

                // Creates a TextNode instance and appends it to the TreeView 

                function buildRandomTextBranch(p_oNode) {

                    var oTextNode,
                        i;

                    if (p_oNode.depth < 6) {

                        for (i = 0; i < Math.floor(Math.random() * 4); i++) {

                            oTextNode = new YAHOO.widget.TextNode(p_oNode.label + "-" + i, p_oNode, false);

                            oTextNodeMap[oTextNode.labelElId] = oTextNode;
                            
                            buildRandomTextBranch(oTextNode);

                        }

                    }

                }


                // Create a TreeView instance

                var oTreeView = new YAHOO.widget.TreeView("mytreeview");

                var n, oTextNode;

                for (n = 0; n < Math.floor((Math.random()*4) + 3); n++) {

                    oTextNode = new YAHOO.widget.TextNode("label-" + n, oTreeView.getRoot(), false);
                    
                    /*
                         Add the TextNode instance to the map, using its
                         HTML id as the key.
                    */
                    
                    oTextNodeMap[oTextNode.labelElId] = oTextNode;
                    
                    buildRandomTextBranch(oTextNode);

                }
        
                oTreeView.draw();


                /*
                     The YAHOO.widget.TextNode instance whose "contextmenu" 
                     DOM event triggered the display of the 
                     ContextMenu instance.
                */

                var oCurrentTextNode = null;


                /*
                     Adds a new TextNode as a child of the TextNode instance 
                     that was the target of the "contextmenu" event that 
                     triggered the display of the ContextMenu instance.
                */

                function addNode() {

                    var sLabel = window.prompt("Enter a label for the new node: ", ""),
                        oChildNode;

                    if (sLabel && sLabel.length > 0) {
                        
                        oChildNode = new YAHOO.widget.TextNode(sLabel, oCurrentTextNode, false);
    
                        oCurrentTextNode.refresh();
                        oCurrentTextNode.expand();

                        oTextNodeMap[oChildNode.labelElId] = oChildNode;

                    }

                }
                

                /*
                     Edits the label of the TextNode that was the target of the
                     "contextmenu" event that triggered the display of the 
                     ContextMenu instance.
                */

                function editNodeLabel() {

                    var sLabel = window.prompt("Enter a new label for this node: ", oCurrentTextNode.getLabelEl().innerHTML);
    
                    if (sLabel && sLabel.length > 0) {
                        
                        oCurrentTextNode.getLabelEl().innerHTML = sLabel;
    
                    }

                }
                

                /*
                    Deletes the TextNode that was the target of the "contextmenu"
                    event that triggered the display of the ContextMenu instance.
                */

                function deleteNode() {

                    delete oTextNodeMap[oCurrentTextNode.labelElId];

                    oTreeView.removeNode(oCurrentTextNode);
                    oTreeView.draw();

                }


                /*
                    "contextmenu" event handler for the element(s) that 
                    triggered the display of the ContextMenu instance - used
                    to set a reference to the TextNode instance that triggered
                    the display of the ContextMenu instance.
                */

                function onTriggerContextMenu(p_oEvent) {

					var oTarget = this.contextEventTarget,
						Dom = YAHOO.util.Dom;

                    /*
                         Get the TextNode instance that that triggered the 
                         display of the ContextMenu instance.
                    */

                    var oTextNode = Dom.hasClass(oTarget, "ygtvlabel") ? 
                    					oTarget : Dom.getAncestorByClassName(oTarget, "ygtvlabel");

                    if (oTextNode) {

                        oCurrentTextNode = oTextNodeMap[oTarget.id];

                    }
                    else {
                    
                        // Cancel the display of the ContextMenu instance.
                    
                        this.cancel();
                        
                    }
                
                }


                /*
                     Instantiate a ContextMenu:  The first argument passed to 
                     the constructor is the id of the element to be created; the 
                     second is an object literal of configuration properties.
                */

                var oContextMenu = new YAHOO.widget.ContextMenu("mytreecontextmenu", {
                                                                trigger: "mytreeview",
                                                                lazyload: true, 
                                                                itemdata: [
                                                                    { text: "Add Child Node", onclick: { fn: addNode } },
                                                                    { text: "Edit Node Label", onclick: { fn: editNodeLabel } },
                                                                    { text: "Delete Node", onclick: { fn: deleteNode } }
                                                                ] });


                /*
                     Subscribe to the "contextmenu" event for the element(s)
                     specified as the "trigger" for the ContextMenu instance.
                */

                oContextMenu.subscribe("triggerContextMenu", onTriggerContextMenu);
            
            });

        </script>

    </head>
    <body class="yui-skin-sam">
        <div id="mytreeview"></div>
    </body>
</html>