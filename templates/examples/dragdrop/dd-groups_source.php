<div id="usercontrols">
Interaction Mode:
<select id="ddmode" >
  <option value="0" selected>Point</option>
  <option value="1">Intersect</option>
</select>
</div>
<div id="workarea">

<div class="slot" id="t1" >1</div>
<div class="slot" id="t2" >2</div>
<div class="slot" id="b1" >3</div>
<div class="slot" id="b2" >4</div>
<div class="slot" id="b3" >5</div>
<div class="slot" id="b4" >6</div>

<div class="player" id="pt1" >1</div>
<div class="player" id="pt2" >2</div>
<div class="player" id="pb1" >3</div>
<div class="player" id="pb2" >4</div>
<div class="player" id="pboth1" >5</div>
<div class="player" id="pboth2" >6</div>

</div>

<script type="text/javascript">
(function() {

YAHOO.example.DDPlayer = function(id, sGroup, config) {
    YAHOO.example.DDPlayer.superclass.constructor.apply(this, arguments);
    this.initPlayer(id, sGroup, config);
};

YAHOO.extend(YAHOO.example.DDPlayer, YAHOO.util.DDProxy, {

    TYPE: "DDPlayer",

    initPlayer: function(id, sGroup, config) {
        if (!id) { 
            return; 
        }

        var el = this.getDragEl()
        YAHOO.util.Dom.setStyle(el, "borderColor", "transparent");
        YAHOO.util.Dom.setStyle(el, "opacity", 0.76);

        // specify that this is not currently a drop target
        this.isTarget = false;

        this.originalStyles = [];

        this.type = YAHOO.example.DDPlayer.TYPE;
        this.slot = null;

        this.startPos = YAHOO.util.Dom.getXY( this.getEl() );
        YAHOO.log(id + " startpos: " + this.startPos, "info", "example");
    },

    startDrag: function(x, y) {
        YAHOO.log(this.id + " startDrag", "info", "example");
        var Dom = YAHOO.util.Dom;

        var dragEl = this.getDragEl();
        var clickEl = this.getEl();

        dragEl.innerHTML = clickEl.innerHTML;
        dragEl.className = clickEl.className;

        Dom.setStyle(dragEl, "color",  Dom.getStyle(clickEl, "color"));
        Dom.setStyle(dragEl, "backgroundColor", Dom.getStyle(clickEl, "backgroundColor"));

        Dom.setStyle(clickEl, "opacity", 0.1);

        var targets = YAHOO.util.DDM.getRelated(this, true);
        YAHOO.log(targets.length + " targets", "info", "example");
        for (var i=0; i<targets.length; i++) {
            
            var targetEl = this.getTargetDomRef(targets[i]);

            if (!this.originalStyles[targetEl.id]) {
                this.originalStyles[targetEl.id] = targetEl.className;
            }

            targetEl.className = "target";
        }
    },

    getTargetDomRef: function(oDD) {
        if (oDD.player) {
            return oDD.player.getEl();
        } else {
            return oDD.getEl();
        }
    },

    endDrag: function(e) {
        // reset the linked element styles
        YAHOO.util.Dom.setStyle(this.getEl(), "opacity", 1);

        this.resetTargets();
    },

    resetTargets: function() {

        // reset the target styles
        var targets = YAHOO.util.DDM.getRelated(this, true);
        for (var i=0; i<targets.length; i++) {
            var targetEl = this.getTargetDomRef(targets[i]);
            var oldStyle = this.originalStyles[targetEl.id];
            if (oldStyle) {
                targetEl.className = oldStyle;
            }
        }
    },

    onDragDrop: function(e, id) {
        // get the drag and drop object that was targeted
        var oDD;
        
        if ("string" == typeof id) {
            oDD = YAHOO.util.DDM.getDDById(id);
        } else {
            oDD = YAHOO.util.DDM.getBestMatch(id);
        }

        var el = this.getEl();

        // check if the slot has a player in it already
        if (oDD.player) {
            // check if the dragged player was already in a slot
            if (this.slot) {
                // check to see if the player that is already in the
                // slot can go to the slot the dragged player is in
                // YAHOO.util.DDM.isLegalTarget is a new method
                if ( YAHOO.util.DDM.isLegalTarget(oDD.player, this.slot) ) {
                    YAHOO.log("swapping player positions", "info", "example");
                    YAHOO.util.DDM.moveToEl(oDD.player.getEl(), el);
                    this.slot.player = oDD.player;
                    oDD.player.slot = this.slot;
                } else {
                    YAHOO.log("moving player in slot back to start", "info", "example");
                    YAHOO.util.Dom.setXY(oDD.player.getEl(), oDD.player.startPos);
                    this.slot.player = null;
                    oDD.player.slot = null
                }
            } else {
                // the player in the slot will be moved to the dragged
                // players start position
                oDD.player.slot = null;
                YAHOO.util.DDM.moveToEl(oDD.player.getEl(), el);
            }
        } else {
            // Move the player into the emply slot
            // I may be moving off a slot so I need to clear the player ref
            if (this.slot) {
                this.slot.player = null;
            }
        }

        YAHOO.util.DDM.moveToEl(el, oDD.getEl());
        this.resetTargets();

        this.slot = oDD;
        this.slot.player = this;
    },

    swap: function(el1, el2) {
        var Dom = YAHOO.util.Dom;
        var pos1 = Dom.getXY(el1);
        var pos2 = Dom.getXY(el2);
        Dom.setXY(el1, pos2);
        Dom.setXY(el2, pos1);
    },

    onDragOver: function(e, id) {
    },

    onDrag: function(e, id) {
    }

});

var slots = [], players = [],
    Event = YAHOO.util.Event, DDM = YAHOO.util.DDM;

Event.onDOMReady(function() { 
    // slots
    slots[0] = new YAHOO.util.DDTarget("t1", "topslots");
    slots[1] = new YAHOO.util.DDTarget("t2", "topslots");
    slots[2] = new YAHOO.util.DDTarget("b1", "bottomslots");
    slots[3] = new YAHOO.util.DDTarget("b2", "bottomslots");
    slots[4] = new YAHOO.util.DDTarget("b3", "bottomslots");
    slots[5] = new YAHOO.util.DDTarget("b4", "bottomslots");
    
    // players
    players[0] = new YAHOO.example.DDPlayer("pt1", "topslots");
    players[1] = new YAHOO.example.DDPlayer("pt2", "topslots");
    players[2] = new YAHOO.example.DDPlayer("pb1", "bottomslots");
    players[3] = new YAHOO.example.DDPlayer("pb2", "bottomslots");
    players[4] = new YAHOO.example.DDPlayer("pboth1", "topslots");
    players[4].addToGroup("bottomslots");
    players[5] = new YAHOO.example.DDPlayer("pboth2", "topslots");
    players[5].addToGroup("bottomslots");

    DDM.mode = document.getElementById("ddmode").selectedIndex;

    Event.on("ddmode", "change", function(e) {
            YAHOO.util.DDM.mode = this.selectedIndex;
        });
});

})();
</script>
