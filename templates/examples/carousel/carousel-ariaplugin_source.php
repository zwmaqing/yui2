<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">

		<title>Carousel: Using the Carousel ARIA Plugin</title>

		<link rel="stylesheet" type="text/css" href="../../build/fonts/fonts.css"> 
		<link type="text/css" rel="stylesheet" href="../../build/carousel/assets/skins/sam/carousel.css">	

		<style type="text/css">

			.yui-carousel-element li {
				height: 158px;
				text-align: left;
			}
		
			#container {
				font-size: 13px;
				margin: 0 auto;
			}
		
			#container a {
				text-decoration: none;
			}
			
			#container li img {
				border: 0;
			}
					
			#container .intro {
				display: inline;
				margin: 0px 14px 0px 4px;
				width: 202px;
			}
					
			#container .item {
				display: inline;
				margin: 0 22px 0 12px;
				overflow: hidden;
				padding-right: 80px;
				width: 106px;
			}
		
			#container .item .authimg {
				bottom: 2px;
				margin-left: 61px;
				position: absolute;
				z-index: 1;
			}
					
			#container .item h3 {
				line-height: 85%;
				margin-top: 4px;
			}
					
			#container .item h3 a {
				font: 77% Arial, sans-serif;
				position: relative;
				text-transform: uppercase;
				z-index: 2;
			}
					
			#container .item h3 a:link {
				color:#35a235;
			}
					
			#container .item h4 {
				margin-top:5px;
			}
					
			#container .item h4 a {
				font: 100% Georgia, Times, serif;
				position: relative;
				z-index:2;
			}
		
			#container .item h4 a:link {
				color:#00639b;
			}
					
			#container .item cite {
				color: #888;
				display: block;
				font-size: 77%;
				line-height: normal;
				margin-bottom: 30px;
			}
					
			#container .item p.all {
				bottom: 25px;
				position: absolute;
				z-index: 2;
			}
					
			#container .item p.all a {
				font-weight: bold;
				font-size: 85%;
			}

			/*
				The Carousel ARIA Plugin removes the "href" attribute from the <A> elements used to 
				create the buttons in the navigation, resulting in the focus outline no longer be 
				rendered in Gecko-based browsers when the <A> element is focused.  For this reason, 
				it is necessary to restore the focus outline for the <A>.
			*/				
			a[role=button]:focus {
				outline: dotted 1px #000;
			}    
			
		</style>

		<script src="../../build/utilities/utilities.js"></script>
		<script src="../../build/carousel/carousel-beta-min.js"></script>
		<script type="text/javascript" src="../carousel/assets/carouselariaplugin.js"></script>	

	</head>
	<body class="yui-skin-sam">
		<h1 id="my-carousel-label">Expert Health Advice</h1>
		<div id="container">
			<ol id="carousel">
				<li class="intro"><a href="http://health.yahoo.com/experts/"><img width="202" height="162" alt="Health Expert Advice: Leading experts share advice, tips and personal experiences." src="http://l.yimg.com/us.yimg.com/i/us/he/gr/v4/carouselintro.png"/></a></li>
				<li class="item">
					<a title="View Author's Biography" class="authimg" href="http://health.yahoo.com/experts/skintype/bio/leslie-baumann/"><img width="125" height="154" alt="Leslie Baumann, M.D." src="http://d.yimg.com/origin1.lifestyles.yahoo.com/ls/he/blogs/carousel/LeslieBaumann_carousel.png"/></a>
					<h3><a href="http://health.yahoo.com/experts/skintype/bio/leslie-baumann/">Leslie Baumann, M.D.</a></h3>
					<h4><a href="http://health.yahoo.com/experts/skintype/12135/skin-treatments-for-brides-to-be/">Skin Treatments for&#8240;</a></h4>
					<cite>Posted Thu 5.1.08</cite>
					<p class="all"><a href="http://health.yahoo.com/experts/skintype/">View All Posts &#187;</a></p>
				</li>
				<li class="item">
					<a title="View Author's Biography" class="authimg" href="http://health.yahoo.com/experts/deepak/bio/deepak-chopra/"><img width="125" height="154" alt="Deepak Chopra, M.D." src="http://d.yimg.com/origin1.lifestyles.yahoo.com/ls/he/blogs/carousel/DeepakChopra_carousel.png"/></a>
					<h3><a href="http://health.yahoo.com/experts/deepak/bio/deepak-chopra/">Deepak Chopra, M.D.</a></h3>
					<h4><a href="http://health.yahoo.com/experts/deepak/2689/how-you-think-about-illness-affects-your-recovery/">How You Think About Illness&#8240;</a></h4>
					<cite>Posted Thu 5.1.08</cite>
					<p class="all"><a href="http://health.yahoo.com/experts/deepak/">View All Posts &#187;</a></p>
				</li>
				<li class="item">
					<a title="View Author's Biography" class="authimg" href="http://health.yahoo.com/experts/nutrition/bio/christine-mckinney-nutrition/"><img width="125" height="154" class="lz" alt="Christine McKinney, M.S., R.D., C.D.E." src="http://d.yimg.com/origin1.lifestyles.yahoo.com/ls/he/blogs/carousel/ChristineMcKinney_carousel.png"/></a>
					<h3><a href="http://health.yahoo.com/experts/nutrition/bio/christine-mckinney-nutrition/">Christine McKinney, M.S., R.D., C.D.E.</a></h3>
					<h4><a href="http://health.yahoo.com/experts/nutrition/12067/fat-how-much-is-enough-of-a-good-thing/">Fat: How Much Is Enough of a&#8240;</a></h4>
					<cite>Posted Thu 5.1.08</cite>
					<p class="all"><a href="http://health.yahoo.com/experts/nutrition/">View All Posts &#187;</a></p>
				</li>
				<li class="item">
					<a title="View Author's Biography" class="authimg" href="http://health.yahoo.com/experts/drmao/bio/maoshing-ni/"><img width="125" height="154" class="lz" alt="Dr. Maoshing Ni" src="http://d.yimg.com/origin1.lifestyles.yahoo.com/ls/he/blogs/carousel/MaoshingNi_carousel.png"/></a>
					<h3><a href="http://health.yahoo.com/experts/drmao/bio/maoshing-ni/">Dr. Maoshing Ni</a></h3>
					<h4><a href="http://health.yahoo.com/experts/drmao/13738/centenarian-tips-for-a-long-life/">Centenarian Tips for a Long&#8240;</a></h4>
					<cite>Posted Tue 4.29.08</cite>
					<p class="all"><a href="http://health.yahoo.com/experts/drmao/">View All Posts &#187;</a></p>
				</li>
				<li class="item">
					<a title="View Author's Biography" class="authimg" href="http://health.yahoo.com/experts/breastcancer/bio/lillie-shockney/"><img width="125" height="154" class="lz" alt="Lillie Shockney, R.N., M.A.S." src="http://d.yimg.com/origin1.lifestyles.yahoo.com/ls/he/blogs/carousel/LillieShockney_carousel.png"/></a>
					<h3><a href="http://health.yahoo.com/experts/breastcancer/bio/lillie-shockney/">
					Lillie Shockney, R.N., M.A.S.</a></h3>
					<h4><a href="http://health.yahoo.com/experts/breastcancer/5673/are-you-being-over-or-undertreated/">Are You Being Over- or&#8240;</a></h4>
					<cite>Posted Tue 4.29.08</cite>
					<p class="all"><a href="http://health.yahoo.com/experts/breastcancer/">View All Posts &#187;</a></p>
				</li>
				<li class="item">
					<a title="View Author's Biography" class="authimg" href="http://health.yahoo.com/experts/depression/bio/david-neubauer/"><img width="125" height="154" class="lz" alt="David Neubauer, M.D." src="http://d.yimg.com/origin1.lifestyles.yahoo.com/ls/he/blogs/carousel/DavidNeubauer_carousel.png"/></a>
					<h3><a href="http://health.yahoo.com/experts/depression/bio/david-neubauer/">David Neubauer, M.D.</a></h3>
					<h4><a href="http://health.yahoo.com/experts/depression/12445/could-a-breast-cancer-treatment-help-bipolar-disorder/">Could a Breast Cancer&#8240;</a></h4>
					<cite>Posted Tue 4.29.08</cite>
					<p class="all"><a href="http://health.yahoo.com/experts/depression/">View All Posts &#187;</a></p>
				</li>
				<li class="item">
					<a title="View Author's Biography" class="authimg" href="http://health.yahoo.com/experts/capessa/bio/capessa/"><img width="125" height="154" class="lz" alt="Jennifer Tuma-Young" src="http://d.yimg.com/origin1.lifestyles.yahoo.com/ls/he/blogs/carousel/Capessa_carousel.png"/></a>
					<h3><a href="http://health.yahoo.com/experts/capessa/bio/capessa/">Jennifer Tuma-Young</a></h3>
					<h4><a href="http://health.yahoo.com/experts/capessa/3473/relieve-stress-with-your-senses/">Relieve Stress With Your&#8240;</a></h4>
					<cite>Posted Mon 4.28.08</cite>
					<p class="all"><a href="http://health.yahoo.com/experts/capessa/">View All Posts &#187;</a></p>
				</li>
				<li class="item">
					<a title="View Author's Biography" class="authimg" href="http://health.yahoo.com/experts/healthieryou/bio/lucydanziger/"><img width="125" height="154" class="lz" alt="Lucy Danziger, SELF Edit" src="http://d.yimg.com/origin1.lifestyles.yahoo.com/ls/he/blogs/carousel/LucyDanziger_carousel.png"/></a>
					<h3><a href="http://health.yahoo.com/experts/healthieryou/bio/lucydanziger/">Lucy Danziger, SELF Edit</a></h3>
					<h4><a href="http://health.yahoo.com/experts/healthieryou/2639/de-stress-in-mere-minutes/">De-Stress in Mere Minutes</a></h4>
					<cite>Posted Mon 4.28.08</cite>
					<p class="all"><a href="http://health.yahoo.com/experts/healthieryou/">View All Posts &#187;</a></p>
				</li>
				<li class="item">
					<a title="View Author's Biography" class="authimg" href="http://health.yahoo.com/experts/healthnews/bio/simeon-margolis/"><img width="125" height="154" class="lz" alt="Simeon Margolis, M.D., Ph.D." src="http://d.yimg.com/origin1.lifestyles.yahoo.com/ls/he/blogs/carousel/SimeonMargolis_carousel.png"/></a>
					<h3><a href="http://health.yahoo.com/experts/healthnews/bio/simeon-margolis/">Simeon Margolis, M.D., Ph.D.</a></h3>
					<h4><a href="http://health.yahoo.com/experts/healthnews/13879/alzheimer-s-and-dementia-will-you-be-affected/">Alzheimer's and Dementia: Will&#8240;</a></h4>
					<cite>Posted Mon 4.28.08</cite>
					<p class="all"><a href="http://health.yahoo.com/experts/healthnews/">View All Posts &#187;</a></p>
				</li>
				<li class="item">
					<a title="View Author's Biography" class="authimg" href="http://health.yahoo.com/experts/intentblog/bio/intentblog/"><img width="125" height="154" class="lz" alt="Mallika Chopra, IntentBlog" src="http://d.yimg.com/origin1.lifestyles.yahoo.com/ls/he/blogs/carousel/Intentblog_carousel.png"/></a>
					<h3><a href="http://health.yahoo.com/experts/intentblog/bio/intentblog/">Mallika Chopra, IntentBlog</a></h3>
					<h4><a href="http://health.yahoo.com/experts/intentblog/2919/treating-a-sore-throat/">Treating a Sore Throat</a></h4>
					<cite>Posted Mon 4.28.08</cite>
					<p class="all"><a href="http://health.yahoo.com/experts/intentblog/">View All Posts &#187;</a></p>
				</li>
			</ol>
		</div>
		<script>
			(function () {
				var carousel;
						
				YAHOO.util.Event.onDOMReady(function (ev) {
					var carousel = new YAHOO.widget.Carousel("container", {
								animation: { speed: 0.5 },
								describedby: "my-carousel-label"
						});
								
					carousel.render(); // get ready for rendering the widget
					carousel.show();   // display the widget
				});
			})();
		</script>
	</body>
</html>
