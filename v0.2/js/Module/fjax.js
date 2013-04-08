(function(){
	var request,
			data,
			url,
			type,
			callback;
	window.Utils.Fjax=function(obj){
		if(typeof(obj)=="object"){
			url=obj.url;
			data=obj.data;
			type=obj.type || "GET";
			callback=obj.callback;
			request=createRequest();
			request.open(type, url, true);
			if(type=="GET"){
				request.send(null);
			}else{
				request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				request.send(data);
			}
			request.onreadystatechange=callback;
			console.log(request);
		}
	}
	function createRequest(){
		try{
			request=new XMLHttpRequest();
		} catch (tryMS){
			try{
				request=new ActiveXObject("Msxml2.XMLHTTP");
			} catch (otherMS) {
				try{
					request=new ActiveXObject("Microsoft.XMLHTTP");
				} catch(failed){
					request=null;
				}
			}
		}
		return request;
	}
})()