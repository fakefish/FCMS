(function(){
	window.Floader=function(){
		arg=arguments;
		window.onload=function(){
			for(var i=0,len=arg.length;i<len;i++){
				var tag=document.createElement('script');
				tag.setAttribute("src",arg[i]);
				document.body.appendChild(tag);
			}
		}
	}
})();
Floader(
	"js/Module/base.js",
	"js/Module/client.js",
	"js/Module/fjax.js",
	"js/Module/tmpl.js",
	"js/Module/eventlistener.js",
	"js/Module/stream.js",

	"js/Controller/stream.index.js"
);