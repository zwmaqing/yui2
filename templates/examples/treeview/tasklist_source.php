<!-- Some style for the expand/contract section-->
<style>
#expandcontractdiv {border:1px solid #336600; background-color:#FFFFCC; margin:0 0 .5em 0; padding:0.2em;}
#treeDiv1 { background: #fff }
</style>

<!-- markup for expand/contract links -->
<div id="expandcontractdiv">
	<a id="expand" href="#">Expand all</a>
	<a id="collapse" href="#">Collapse all</a>
	<a id="check" href="#">Check all</a>
	<a id="uncheck" href="#">Uncheck all</a>
	<a id="getchecked" href="#">Log array of checked nodes</a>
</div>
<div id="treeDiv1"></div>

<script type="text/javascript" src="<?php echo $assetsDirectory; ?>js/TaskNode.js"></script>

<script type="text/javascript">
(function() {
	var tree;
	var nodes = [];
	var nodeIndex;
	
	function treeInit() {
		YAHOO.log("Initializing TaskNode TreeView instance.")
		buildRandomTaskNodeTree();
	}
	
	//handler for expanding all nodes
	YAHOO.util.Event.on("expand", "click", function(e) {
		YAHOO.log("Expanding all TreeView  nodes.", "info", "example");
		tree.expandAll();
		YAHOO.util.Event.preventDefault(e);
	});
	
	//handler for collapsing all nodes
	YAHOO.util.Event.on("collapse", "click", function(e) {
		YAHOO.log("Collapsing all TreeView  nodes.", "info", "example");
		tree.collapseAll();
		YAHOO.util.Event.preventDefault(e);
	});

	//handler for checking all nodes
	YAHOO.util.Event.on("check", "click", function(e) {
		YAHOO.log("Checking all TreeView  nodes.", "info", "example");
		checkAll();
		YAHOO.util.Event.preventDefault(e);
	});
	
	//handler for unchecking all nodes
	YAHOO.util.Event.on("uncheck", "click", function(e) {
		YAHOO.log("Unchecking all TreeView  nodes.", "info", "example");
		uncheckAll();
		YAHOO.util.Event.preventDefault(e);
	});


	YAHOO.util.Event.on("getchecked", "click", function(e) {
		YAHOO.log("Checked nodes: " + YAHOO.lang.dump(getCheckedNodes()), "info", "example");
            
		YAHOO.util.Event.preventDefault(e);
	});

	//Function  creates the tree and 
	//builds between 3 and 7 children of the root node:
    function buildRandomTaskNodeTree() {
	
		//instantiate the tree:
        tree = new YAHOO.widget.TreeView("treeDiv1");

        for (var i = 0; i < Math.floor((Math.random()*4) + 3); i++) {
            var tmpNode = new YAHOO.widget.TaskNode("label-" + i, tree.getRoot(), false);
            // tmpNode.collapse();
            // tmpNode.expand();
            buildRandomTaskBranch(tmpNode);
        }

       // Expand and collapse happen prior to the actual expand/collapse,
       // and can be used to cancel the operation
       tree.subscribe("expand", function(node) {
              YAHOO.log(node.index + " was expanded", "info", "example");
              // return false; // return false to cancel the expand
           });

       tree.subscribe("collapse", function(node) {
              YAHOO.log(node.index + " was collapsed", "info", "example");
           });

       // Trees with TextNodes will fire an event for when the label is clicked:
       tree.subscribe("labelClick", function(node) {
              YAHOO.log(node.index + " label was clicked", "info", "example");
           });

       // Trees with TaskNodes will fire an event for when a check box is clicked
       tree.subscribe("checkClick", function(node) {
              YAHOO.log(node.index + " check was clicked", "info", "example");
           });

       tree.subscribe("clickEvent", function(node) {
              YAHOO.log(node.index + " clickEvent", "info", "example");
           });

		//The tree is not created in the DOM until this method is called:
        tree.draw();
    }

	var callback = null;

	function buildRandomTaskBranch(node) {
		if (node.depth < 5) {
			YAHOO.log("buildRandomTextBranch: " + node.index);
			for ( var i = 0; i < Math.floor(Math.random() * 4) ; i++ ) {
				var tmpNode = new YAHOO.widget.TaskNode(node.label + "-" + i, node, false);
                //tmpNode.onCheckClick = onCheckClick;
				buildRandomTaskBranch(tmpNode);
			}
		}
	}

    function onCheckClick(node) {
        YAHOO.log(node.label + " check was clicked, new state: " + 
                node.checkState, "info", "example");
    }

    function checkAll() {
        var topNodes = tree.getRoot().children;
        for(var i=0; i<topNodes.length; ++i) {
            topNodes[i].check();
        }
    }

    function uncheckAll() {
        var topNodes = tree.getRoot().children;
        for(var i=0; i<topNodes.length; ++i) {
            topNodes[i].uncheck();
        }
    }

   // Gets the labels of all of the fully checked nodes
   // Could be updated to only return checked leaf nodes by evaluating
   // the children collection first.
    function getCheckedNodes(nodes) {
        nodes = nodes || tree.getRoot().children;
        checkedNodes = [];
        for(var i=0, l=nodes.length; i<l; i=i+1) {
            var n = nodes[i];
            //if (n.checkState > 0) { // if we were interested in the nodes that have some but not all children checked
            if (n.checkState === 2) {
                checkedNodes.push(n.label); // just using label for simplicity
            }

            if (n.hasChildren()) {
checkedNodes = checkedNodes.concat(getCheckedNodes(n.children));
            }
        }

        return checkedNodes;
    }


	YAHOO.util.Event.onDOMReady(treeInit);
})();
</script>
