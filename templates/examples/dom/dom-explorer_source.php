<h3>Source</h3>

<div id="source" class="contentContainer">
    <pre>
    </pre>
</div>
        
<h3>Functions</h3>
<div id="functions" class="contentContainer">
    <ul id="functionList">
        <li id="get1"><a href="foo.html">get('demo')</a></li>
        <li id="get2"><a href="foo.html">get(['demo', 'demoList'])</a></li>
        <li id="getAncestorByTagName"><a href="foo.html">getAncestorByTagName('div', 'one')</a></li>
        <li id="getAncestorByClassName"><a href="foo.html">getAncestorByClassName('listItem')</a></li>
        <li id="getChildren"><a href="foo.html">getChildren('demoList')</a></li>

        <li id="getElementsBy"><a href="foo.html">getElementsBy(<em>getElementsByClassName('specialItems')</em>, 'li', 'demo')</a></li>
        <li id="getFirstChild"><a href="foo.html">getFirstChild('demoList')</a></li>
        <li id="getLastChild"><a href="foo.html">getLastChild('demoList')</a></li>
        <li id="getNextSibling"><a href="foo.html">getNextSibling('one')</a></li>
        <li id="getPreviousSibling"><a href="foo.html">getPreviousSibling('two')</a></li>

        <li id="isAncestor"><a href="foo.html">isAncestor('demo', 'one')</a></li>
        <li id="insertBefore"><a href="foo.html">insertBefore(<em>li</em>, 'one')</a></li>
        <li id="insertAfter"><a href="foo.html">insertAfter(<em>li</em>, 'one')</a></li>
    </ul>
</div>

<h3>Render</h3>
<div id="render" class="contentContainer">    				
</div>

<h3>Output</h3>
<div id="output" class="contentContainer">
</div>



<script type="text/javascript" charset="utf-8">

(function() {
YAHOO.util.Event.addListener("functionList", "click", function(evt) {
	var target = YAHOO.util.Event.getTarget(evt);	
	YAHOO.util.Event.preventDefault(evt);    		
	if(evt.type === 'click' && target && target.parentNode.id) {
		setView(target.parentNode.id);
	}
});     	

// constant codedemo
var codedemo = [];
codedemo.push('<div id="demo">');
codedemo.push('  <ul id="demoList" class="parent">');    	
codedemo.push('    <li id="one" class="listItem">item 1</li>');
codedemo.push('    <li id="two" class="listItem">item 2</li>');
codedemo.push('    <li id="three" class="specialItem">item 3</li>');    	
codedemo.push('  </ul>');
codedemo.push('</div>');

// views object
var views = {
	sourceView: document.getElementById('source'),
	renderView: document.getElementById('render'),
	outputView: document.getElementById('output'),

	defaultView: {
		source: function() {
			return codedemo;
		},
		output: ['Please select a function.']
	},
	get1 : {
		source: function(){
			var temp = [].concat(codedemo);
			temp[0] = '<div id="demo" class="highlight">';
			return temp;
		},
		output: ['<div id="demo" class="highlight">']
	},
	get2 : {
		source: function(){
			var temp = [].concat(codedemo);
			temp[0] = '<div id="demo" class="highlight">';
			temp[1] = '  <ul id="demoList" class="parent highlight">';
			return temp;
		},
		output: ['<div id="demo" class="highlight">', '<ul id="demoList" class="parent highlight">']
	},
	getAncestorByTagName : {
		source: function() {
			var temp = [].concat(codedemo);
			temp[0] = '<div id="demo" class="highlight">';
			return temp;
		},
		output: ['<div id="demo" class="highlight">']
	},
	getAncestorByClassName : {
		source: function (){
				var temp = [].concat(codedemo);
				temp[1]='  <ul id="demoList" class="parent highlight">';
				return temp;
		},
		output: ['<ul id="demoList" class="parent highlight">']    
	},
	getChildren : {
	   source: function (){
		   var temp = [].concat(codedemo);
		   temp[2]='    <li id="one" class="listItem highlight">item 1</li>';
		   temp[3]='    <li id="two" class="listItem highlight">item 2</li>';
		   temp[4]='    <li id="three" class="specialItem highlight">item 3</li>';                   
		   return temp;
	   },        
	   output: ['<li id="one" class="listItem">first</li>', 
				'<li id="two" class="listItem highlight">second</li>' ,
				'<li id="three" class="specialItem highlight">item 3</li>']
   },
   getFirstChild : {
	source: function (){
		var temp =[].concat(codedemo);
		temp[2]='    <li id="one" class="listItem highlight">item 1</li>';
		return temp;
	}, 
	output: ['<li id="one" class="listItem">']
   },
   getLastChild : {
	source: function(){
		var temp =[].concat(codedemo);
		temp[4] = '    <li id="three" class="specialItem highlight">item 3</li>';
		return temp;
	},
	output : ['<li id="three" class="specialItem">']
   },
   getNextSibling : {
	 source: function(){
		var temp = [].concat(codedemo);
		temp[3]='    <li id="two" class="listItem highlight">item 2</li>';
		return temp;
	 },
	 output: ['<li id="two" class="listItem">']
   },
   getPreviousSibling : {
	 source: function(){
		var temp = [].concat(codedemo);
		temp[2]='    <li id="one" class="listItem highlight">item 1</li>';
		return temp;
	 },
	 output: ['<li id="one" class="listItem">']
   },
   isAncestor : {
	source : function(){
		var temp = [].concat(codedemo);
		temp[0] = '<div id="demo" "highlight">';
		temp[2]='    <li id="one" class="listItem highlight">item 1</li>';
		return temp;
	},
	output: ['true']
   },
   insertBefore : {
		source : function(){
		var temp = [].concat(codedemo);
		temp.splice(2,0,'    <li id="four" class ="listItem highlight">new Item</li>');
		return temp;
	},
	output: ['<li id="four">']
   },
   insertAfter: {
		source : function(){
		var temp = [].concat(codedemo);
		temp.splice(3,0,'    <li id="four" class ="listItem highlight">new Item</li>');
		return temp;
	},
	output: ['<li id="four">']
   },
   getElementsBy : {
		source: function (){
				var temp = [].concat(codedemo);
				temp[4] ='    <li id="three" class="specialItem highlight">item 3</li>';
				return temp;
		},		
		output: ['<li id="three" class="specialItem">item 3</li>']
	}
};

// render initial view
setView('defaultView');

function setView(viewName) {   
	// update sourceView
	views['sourceView'].innerHTML = renderCode(views[viewName].source());
	
	// update renderView
	var code = views[viewName].source().join('');
	code = code.replace(',', '');
	views['renderView'].innerHTML = code;   

	var output = views[viewName].output;
	views['outputView'].innerHTML = '';
	var pre = document.createElement('pre');
	for (var i = 0; output[i]; i++) {
		pre.appendChild(document.createTextNode(output[i]));
		pre.appendChild(document.createTextNode('\n'));                
		views['outputView'].appendChild(pre);
	}
}


function renderCode(codedemo){
  var out = '';          
  out += '<pre><ol>';
  var hlString = '';
  
  for(var i=0;codedemo[i];i++){                          
	if (codedemo[i].search('highlight') !== -1) {
		hlString = ' class="highlight"';
	} else {
		if (i%2==0)
		hlString = ' class="even"';
	}        
	out += '<li' + hlString + '><code>'+encode(codedemo[i])+'</code></li>'
	hlString = ''
  }
  out+='</ol></pre>';
  return out;
}        
function encode(str){
  str = str.replace(/</g,'&lt;');
  str = str.replace(/>/g,'&gt;');
  str = str.replace(/"/g,'&quot;');
  return str;
}
})();   
</script>
