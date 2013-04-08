(function($){
	$.index={};
	var release,
		releaseBtn,
		reg,

		msg,
		count=0,
		remain,
		wf;
	wf=document.getElementById('streamUl');
	release = document.getElementById('release-form');
	releaseBtn=document.getElementById('releaseBtn');

	msg=document.getElementById('msg');
	remain=document.getElementById('remain');
	reg=/\S+/;
	request=createRequest();
	if (request==null){
		alert("unable to create request");
		return;
	}
	disableBtn(releaseBtn);
	release.onclick=function(){
		this.style.height='60px';
		activeBtn(releaseBtn);
		clearMsg();
	}
	release.onblur=function(){
		if(this.value===""){
			this.style.height='30px';
			disableBtn(releaseBtn);
		}
		remain.innerHTML="";
	}
	// check the textarea.value is less than 140
	// EventUtil.addHandler(release,'keydown',checkNum);
	if(release.addEventListener){
		release.addEventListener("input",checkNum,false);
	}else if(release.attachEvent){
		release.attachEvent("onpropertychange",checkNum);
	}
	function checkNum(){
		var max=140;
		clearMsg();
		if(release.value.length > max){
			release.value = release.value.substring(0,max);
		}else{
			remain.innerHTML=max-release.value.length + " remains";
		}
	}

	function showMsg(){
		msg.innerHTML=arguments[0];
	}
	function clearMsg(){
		msg.innerHTML="";
	}
	// water fall
	// window.onload=wfHandler;
	
	EventUtil.addHandler(window,"load",waterfall);
	EventUtil.addHandler(document,"scroll",wfHandler);
	function wfHandler(event){
		var scrollHeight=Geometry.getVerticalScroll();
		var viewHeight=Geometry.getViewportHeight();
		var docHeight=Geometry.getDocumentHeight();
		var height=(scrollHeight+viewHeight);
		if(height>=docHeight){
			waterfall();
		}
	}
	function waterfall(){
		li=document.createElement("li");
		li.innerHTML="loading....";
		li.id="load";
		wf.appendChild(li);
		EventUtil.removeHandler(document,"scroll",wfHandler);
		var url="waterfall.php?action=index&count="+count;
		request.open("GET", url, true);
		request.onreadystatechange=insertDOM;
		request.send(null);
	}
	function insertDOM(){
		var li,
			form,
			commitBtn,
			commitText,
			result,
			id,
			uid,
			content,
			target,
			type,
			url;

		if(request.readyState == 1){
			
		} else {
			if (request.readyState == 4) {
				var status=request.status;
			    if ( status>= 200 && status<=300 || status==304) {
			      for(var i=0,len=wf.childNodes.length;i<len;i++){
					try{
						if(wf.childNodes[i].innerText=='loading....'||wf.childNodes[i].innerText=='Request Error')
							wf.removeChild(wf.childNodes[i]);
					}
					catch(e){}
					};
		      result=JSON.parse(request.responseText);
		      for(var i=0;i<4;i++){
		      	li=document.createElement("li");
		      	var s=result[i].content;
			    s = s.replace(/&lt;/g, "<");  
			    s = s.replace(/&gt;/g, ">");  
			    result[i].content=s;
			    li.innerHTML=tmpl('wf_tmpl',{stream:result[i]});
		      	// li.innerHTML=tmpl('wf_tmpl',{stream:result[i]});
		      	

		      	var btns=li.getElementsByTagName('ul');
		      	var btn=btns[0].getElementsByTagName('li');
		      	
		      	var a=btn[0].getElementsByTagName('a');
		      	var re=btn[1].getElementsByTagName('a');
		      	EventUtil.addHandler(a[0],'click',$.index.commitshow);
		      	EventUtil.addHandler(re[0],'click',$.index.retweetshow);
		      	if(btn[2]){
		      		var edit=btn[2].getElementsByTagName('a');
		      		EventUtil.addHandler(edit[0],'click',$.index.editshow);
		      		var del=btn[3].getElementsByTagName('a');
		      		EventUtil.addHandler(del[0],'click',$.index.deletestream);
		      	}

		      	var userdiv=li.getElementsByTagName('div')[0];
		      	var user=userdiv.getElementsByTagName('a')[0];
		      	EventUtil.addHandler(user,'mouseover',$.index.showinfo);
		      	EventUtil.addHandler(user,'mouseout',$.index.hiddeninfo);
		      	
		      	wf.appendChild(li);
		      }

		      // if the result is the last one
		      // we must cancel the 'scroll' event
		      if(result[2].id<=1){
	      		EventUtil.removeHandler(document,"scroll",wfHandler);
	      	}else{
		      	EventUtil.addHandler(document,"scroll",wfHandler);
		      }
		      count++;

			      
			    }else{
			    	load.style.background="red"
			    	load.innerHTML="Request Error";
			    }
		  	}
		  }
		  // this function is in the index_select.js
		  // the create the shortcuts
		  // window.index_select();
	}
	$.index.showinfo=function(event){
		var div=document.getElementById('showinfo');
		if(div===null){
			event=EventUtil.getEvent(event);
			target=EventUtil.getTarget(event);
			var user=target.parentNode;
			var url=target.getAttribute("href");
			var uid=url.replace(/[^0-9]/ig,"");
			var x=mouseOffset(event).x;
			var y=mouseOffset(event).y;
			var div=document.createElement("div");
			div.innerHTML="loading";
			document.body.appendChild(div);
			

			url="uc_query.php?uid="+uid;
			request=createRequest();
			request.open("GET",url,true);
			request.send(null);
			request.onreadystatechange=function(){
				if(request.readyState==4){
					var status=request.status;
					if(status>=200&&status<=300|status==304){
						var info=JSON.parse(request.responseText);
						try{
							url="http://www.gravatar.com/avatar/"+info.avatar+"?s=80";
							request=createRequest();
							request.open("GET",url,false);
							request.send();
							status=request.status;
							if(status==200){
								info.avatar=url;
							}
						}catch(e){
							info.avatar="image/avatar/default.jpg";
						}
						div.innerHTML=tmpl("info_tmpl",{info:info});
						div.id="showinfo";
						div.style.top=y+"px";
						div.style.left=x+"px";
						
					}
				}
			}
		}else{
			return;
		}

	}
	$.index.hiddeninfo=function(event){
		var div=document.getElementById('showinfo');
		// if(div!==null){
		// 	setTimeout(function(){
		// 		document.body.removeChild(div);
		// 	},1000);
		// }
		document.body.removeChild(div);
	}
	function mouseOffset(e){
		if(e.pageX){
			return{x:e.pageX,y:e.pageY};
		}else{
			return{
				x:e.clientX+document.body.scrollLeft-document.body.clientLeft,
				y:e.clientY+document.body.scrollTop-document.body.clientTop
			}
		}
	}
})(window)
