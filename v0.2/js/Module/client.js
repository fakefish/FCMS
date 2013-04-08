(function(){
	// UB is short for user borwser
	window.Utils.UB={};
	if(window.screenLeft){ //IE and others
	  Utils.UB.getWindowX = function(){ return window.screenLeft;};
	  Utils.UB.getWindowY = function(){ return window.screenTop;};
	}
	else if(window.screenX){ //Firefox and others
	  Utils.UB.getWindowX = function(){ return window.screenX;};
	  Utils.UB.getWindowY = function(){ return window.screenY;};
	}

	if(window.innerWidth){ //All browsers but IE
	  Utils.UB.getViewportWidth = function(){ return window.innerWidth;};
	  Utils.UB.getViewportHeight = function(){ return window.innerHeight;};
	  Utils.UB.getHorizontalScroll = function(){ return window.pageXOffset;};
	  Utils.UB.getVerticalScroll = function(){ return window.pageYOffset;};
	}
	else if (document.documentElement && document.documentElement.clientWidth){ 
	  //These functions are for IE6 when there is a DOCTYPE
	  Utils.UB.getViewportWidth = function(){ return document.documentElement.clientWidth;};
	  Utils.UB.getViewportHeight = function(){ return document.documentElement.clientHeight;};
	  Utils.UB.getHorizontalScroll = function(){ return document.documentElement.scrollLeft;};
	  Utils.UB.getVerticalScroll = function(){ return document.documentElement.scrollTop;};
	}
	else if (document.body.clientWidth){
	  //These are for IE4,,IE5,and IE6 without a DOCTYPE
	  Utils.UB.getViewportWidth=function(){ return document.body.clientWidth;};
	  Utils.UB.getViewportHeight=function(){ return document.body.clientHeight;};
	  Utils.UB.getHorizontalScroll=function(){ return document.body.scrollLeft;};
	  Utils.UB.getVerticalScroll=function(){ return document.body.scrollTop;};
	}

	//There functions return the size of the document. They are not window
	//related,but they are useful to have here anyway.
	if(document.documentElement && document.documentElement.scrollWidth){
	  Utils.UB.getDocumentWidth = function(){ return document.documentElement.scrollWidth;};
	  Utils.UB.getDocumentHeight = function(){ return document.documentElement.scrollHeight;};
	}
	else if(document.body.scrollWidth){
	  Utils.UB.getDocumentWidth = function(){ return document.body.scrollWidth;};
	  Utils.UB.getDocumentHeight = function(){ return document.body.scrollHeight;};
	}

})()