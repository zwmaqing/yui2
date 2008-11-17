<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>Example: Website Top Nav With Submenus Built From Markup (YUI Library)</title>
        
        <!-- Standard reset, fonts and grids -->

        <link rel="stylesheet" type="text/css" href="../../build/reset-fonts-grids/reset-fonts-grids.css">
 

        <!-- CSS for Menu -->

        <link rel="stylesheet" type="text/css" href="../../build/menu/assets/skins/sam/menu.css"> 
 

        <!-- Page-specific styles -->

        <style type="text/css">

            div.yui-b p {
            
                margin: 0 0 .5em 0;
                color: #999;
            
            }
            
            div.yui-b p strong {
            
                font-weight: bold;
                color: #000;
            
            }
            
            div.yui-b p em {

                color: #000;
            
            }            
            
            h1 {

                font-weight: bold;
                margin: 0 0 1em 0;
                padding: .25em .5em;
                background-color: #ccc;

            }

            #productsandservices {
            
                margin: 0 0 10px 0;
            
            }

        </style>


        <!-- Dependency source files -->

        <script type="text/javascript" src="../../build/yahoo-dom-event/yahoo-dom-event.js"></script>
        <script type="text/javascript" src="../../build/container/container_core.js"></script>


        <!-- Menu source file -->

        <script type="text/javascript" src="../../build/menu/menu.js"></script>


        <!-- Page-specific script -->

        <script type="text/javascript">

            /*
                 Initialize and render the MenuBar when its elements are ready 
                 to be scripted.
            */

            YAHOO.util.Event.onContentReady("productsandservices", function () {

                /*
                     Instantiate a MenuBar:  The first argument passed to the 
                     constructor is the id of the element in the page 
                     representing the MenuBar; the second is an object literal 
                     of configuration properties.
                */

                var oMenuBar = new YAHOO.widget.MenuBar("productsandservices", { 
                                                            autosubmenudisplay: true, 
                                                            hidedelay: 750, 
                                                            lazyload: true });

                /*
                     Call the "render" method with no arguments since the 
                     markup for this MenuBar instance is already exists in 
                     the page.
                */

                oMenuBar.render();

            });

        </script>

    </head>
    <body class="yui-skin-sam" id="yahoo-com">

        <div id="doc" class="yui-t1">
            <div id="hd">
                <!-- start: your content here -->
                
                    <h1>Example: Website Top Nav With Submenus Built From Markup (YUI Library)</h1>
        
                <!-- end: your content here -->
            </div>
            <div id="bd">

                <!-- start: primary column from outer template -->
                <div id="yui-main">
                    <div class="yui-b">
                        <!-- start: stack grids here -->

                       <div id="productsandservices" class="yuimenubar yuimenubarnav">
                            <div class="bd">
                                <ul class="first-of-type">
                                    <li class="yuimenubaritem first-of-type"><a class="yuimenubaritemlabel" href="#communication">Communication</a>
                
                                        <div id="communication" class="yuimenu">
                                            <div class="bd">
                                                <ul>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://360.yahoo.com">360&#176;</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://alerts.yahoo.com">Alerts</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://avatars.yahoo.com">Avatars</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://groups.yahoo.com">Groups</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://promo.yahoo.com/broadband/">Internet Access</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#">PIM</a>
                                                    
                                                        <div id="pim" class="yuimenu">
                                                            <div class="bd">
                                                                <ul class="first-of-type">
                                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://mail.yahoo.com">Yahoo! Mail</a></li>
                                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://addressbook.yahoo.com">Yahoo! Address Book</a></li>
                                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://calendar.yahoo.com">Yahoo! Calendar</a></li>
                                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://notepad.yahoo.com">Yahoo! Notepad</a></li>
                                                                </ul>            
                                                            </div>
                                                        </div>                    
                                                    
                                                    </li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://members.yahoo.com">Member Directory</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://messenger.yahoo.com">Messenger</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://mobile.yahoo.com">Mobile</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://www.flickr.com">Flickr Photo Sharing</a></li>
                                                </ul>
                                            </div>
                                        </div>      
                                    
                                    </li>
                                    <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="http://shopping.yahoo.com">Shopping</a>
                
                                        <div id="shopping" class="yuimenu">
                                            <div class="bd">                    
                                                <ul>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://auctions.shopping.yahoo.com">Auctions</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://autos.yahoo.com">Autos</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://classifieds.yahoo.com">Classifieds</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://shopping.yahoo.com/b:Flowers%20%26%20Gifts:20146735">Flowers &#38; Gifts</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://realestate.yahoo.com">Real Estate</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://travel.yahoo.com">Travel</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://wallet.yahoo.com">Wallet</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://yp.yahoo.com">Yellow Pages</a></li>
                                                </ul>
                                            </div>
                                        </div>                    
                                    
                                    </li>
                                    <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="http://entertainment.yahoo.com">Entertainment</a>
                
                                        <div id="entertainment" class="yuimenu">
                                            <div class="bd">                    
                                                <ul>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://fantasysports.yahoo.com">Fantasy Sports</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://games.yahoo.com">Games</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://www.yahooligans.com">Kids</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://music.yahoo.com">Music</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://movies.yahoo.com">Movies</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://music.yahoo.com/launchcast">Radio</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://travel.yahoo.com">Travel</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://tv.yahoo.com">TV</a></li>
                                                </ul>                    
                                            </div>
                                        </div>                                        
                                    
                                    </li>
                                    <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="#information">Information</a>
                
                                        <div id="information" class="yuimenu">
                                            <div class="bd">                                        
                                                <ul>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://downloads.yahoo.com">Downloads</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://finance.yahoo.com">Finance</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://health.yahoo.com">Health</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://local.yahoo.com">Local</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://maps.yahoo.com">Maps &#38; Directions</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://my.yahoo.com">My Yahoo!</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://news.yahoo.com">News</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://search.yahoo.com">Search</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://smallbusiness.yahoo.com">Small Business</a></li>
                                                    <li class="yuimenuitem"><a class="yuimenuitemlabel" href="http://weather.yahoo.com">Weather</a></li>
                                                </ul>
                                            </div>
                                        </div>                                        
                                    
                                    </li>
                                </ul>            
                            </div>
                        </div>
                        
                        <p id="note"><strong>NOTE:</strong> <em>This example demonstrates how to add submenus to a menu bar using existing markup.</em></p>

                        <form name="example">
                            <select name="test">
                                <option value="one">One</option>
                                <option value="two">Two</option>
                                <option value="three">Three</option>                                
                            </select>
                        </form>

                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas sit amet metus. Nunc quam elit, posuere nec, auctor in, rhoncus quis, dui. Aliquam erat volutpat. Ut dignissim, massa sit amet dignissim cursus, quam lacus feugiat dolor, id aliquam leo tortor eget odio. Pellentesque orci arcu, eleifend at, iaculis sit amet, posuere eu, lorem. Aliquam erat volutpat. Phasellus vulputate. Vivamus id erat. Nulla facilisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nunc gravida. Ut euismod, tortor eget convallis ullamcorper, arcu odio egestas pede, ut ornare urna elit vitae mauris. Aenean ullamcorper eros a lacus. Curabitur egestas tempus lectus. Donec et lectus et purus dapibus feugiat. Sed sit amet diam. Etiam ipsum leo, facilisis ac, rutrum nec, dignissim quis, tellus. Sed eleifend.</p>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas sit amet metus. Nunc quam elit, posuere nec, auctor in, rhoncus quis, dui. Aliquam erat volutpat. Ut dignissim, massa sit amet dignissim cursus, quam lacus feugiat dolor, id aliquam leo tortor eget odio. Pellentesque orci arcu, eleifend at, iaculis sit amet, posuere eu, lorem. Aliquam erat volutpat. Phasellus vulputate. Vivamus id erat. Nulla facilisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nunc gravida. Ut euismod, tortor eget convallis ullamcorper, arcu odio egestas pede, ut ornare urna elit vitae mauris. Aenean ullamcorper eros a lacus. Curabitur egestas tempus lectus. Donec et lectus et purus dapibus feugiat. Sed sit amet diam. Etiam ipsum leo, facilisis ac, rutrum nec, dignissim quis, tellus. Sed eleifend.</p>

                        <!-- end: stack grids here -->
                    </div>
                </div>
                <!-- end: primary column from outer template -->

                <!-- start: secondary column from outer template -->
                <div class="yui-b">
                
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas sit amet metus. Nunc quam elit, posuere nec, auctor in, rhoncus quis, dui. Aliquam erat volutpat. Ut dignissim, massa sit amet dignissim cursus, quam lacus feugiat dolor, id aliquam leo tortor eget odio. Pellentesque orci arcu, eleifend at, iaculis sit amet, posuere eu, lorem. Aliquam erat volutpat. Phasellus vulputate. Vivamus id erat. Nulla facilisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Nunc gravida. Ut euismod, tortor eget convallis ullamcorper, arcu odio egestas pede, ut ornare urna elit vitae mauris. Aenean ullamcorper eros a lacus. Curabitur egestas tempus lectus. Donec et lectus et purus dapibus feugiat. Sed sit amet diam. Etiam ipsum leo, facilisis ac, rutrum nec, dignissim quis, tellus. Sed eleifend.</p>
                    
                </div>
                <!-- end: secondary column from outer template -->
            </div>
            <div id="ft">

                <p>FOOTER: Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas sit amet metus. Nunc quam elit, posuere nec, auctor in, rhoncus quis, dui. Aliquam erat volutpat. Ut dignissim, massa sit amet dignissim cursus, quam lacus feugiat.</p>

            </div>
        </div>

    </body>
</html>