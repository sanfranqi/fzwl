﻿function $2(ObjID){
	return document.getElementById(ObjID);
}

function Ajax(TagID,UrlStr){ 
	var xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null){
  		alert ("您的浏览器不支持AJAX!");
		return false;
	}
	var Url="Ajax.asp"+UrlStr+"&sid="+Math.random();
	xmlHttp.onreadystatechange=function(){
		if (xmlHttp.readyState==4){ 
			if (xmlHttp.status==200){
				if (TagID!="") $2(TagID).innerHTML=xmlHttp.responseText;
			}
		}
	}
	xmlHttp.open("GET",Url,true);
	xmlHttp.send(null);
}

function GetXmlHttpObject(){
	var XmlHttp=null;
	try{
		XmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
	}
	catch (e){
 	 	// Internet Explorer
  		try{
			XmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
  		catch (e){
			XmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
 	}
	return XmlHttp;
}

function Nav(Val){
	try{
		var Node=$2("nav");
		var TagCount=Node.getElementsByTagName("a").length;
		var Nodes;
		for (var i=0;i<TagCount;i++){
			Nodes=Node.getElementsByTagName("a")[i];
			Nodes.Index=i;
			Nodes.className="nav_out";			
		}
		Node.getElementsByTagName("a")[Val].className="nav_over";
	}
	catch(e){
	}
}

function DisDiv(ObjID,Val){
	if (Val==0){
		$2(ObjID).style.display="none";
	}
	else{
		$2(ObjID).style.display="block";
	}
}

function DisDivs(ObjID){
	if ($2(ObjID).style.display=="none"){
		$2(ObjID).style.display="block";
	}
	else{
		$2(ObjID).style.display="none";
	}
}

function MarqueeImage(ObjDiv,Obj1,Obj2,Direction,Speed){
    var demo1 = $2(Obj1);
    var demo2 = $2(Obj2);
    var mydiv = $2(ObjDiv);
	var Tid;
	switch(Direction){
	case "left":
		if (demo1.offsetWidth<=mydiv.offsetWidth) return;
		break;
	case "right":
		if (demo1.offsetWidth<=mydiv.offsetWidth) return;
		break;
	case "top":
		if (demo1.offsetHeight<=mydiv.offsetHeight) return;
		break;
	case "bottom":
		if (demo1.offsetHeight<=mydiv.offsetHeight) return;
		break;
	}
    demo2.innerHTML=demo1.innerHTML;
    Tid=setInterval(Marquee,Speed)
    mydiv.onmouseover=function(){clearInterval(Tid)}
    mydiv.onmouseout=function(){Tid=setInterval(Marquee,Speed)}
    
    function Marquee(){
		switch(Direction){
		case "left":
            if(mydiv.scrollLeft>=demo1.offsetWidth)
                mydiv.scrollLeft=0;
            else
                mydiv.scrollLeft++;
			break;
		case "right":
            if(mydiv.scrollLeft==0)
                mydiv.scrollLeft=demo1.offsetWidth;
            else
                mydiv.scrollLeft--;
			break;
		case "top":
			if(mydiv.scrollTop>=demo1.offsetHeight)
                mydiv.scrollTop=0;
            else
                mydiv.scrollTop++;
			break;
		case "bottom":
			if(mydiv.scrollTop==0)
                mydiv.scrollTop=demo1.offsetHeight;
            else
                mydiv.scrollTop--;
			break;
		}
    }
}

function AddFavorite(sURL,sTitle){
	sURL=encodeURI(sURL); 
	try{
		window.external.addFavorite(sURL,sTitle);
	}
	catch(e){
		try{
			window.sidebar.addPanel(sTitle,sURL,"");
		}
		catch(e){
			alert("加入收藏失败，请使用Ctrl+D进行添加，或手动在浏览器里进行设置！");
		}
	}
}

function SetHome(Url){
	if (document.all){
		document.body.style.behavior='url(#default#homepage)';
		document.body.setHomePage(Url);
	}
	else{
		alert("您好,您的浏览器不支持自动设置页面为首页功能,请您手动在浏览器里设置该页面为首页！");
	}
}

function CheckSearch(Language){
	var SearchKey=$2("search_key");
	if (SearchKey.value==""){
		if (Language=="cn"){
			alert("请输入搜索内容！");
		}
		else{
			alert("Please enter keywords!");
		}
		SearchKey.focus();
		return;
	}
	location.href="Products.asp?SearchKey="+encodeURI(SearchKey.value);
}

function CheckSearch2(Evt,Language){
	Evt=Evt?Evt:(window.event?window.event:"");
	var Key=Evt.keyCode?Evt.keyCode:Evt.which;
	if (Key==13){
		var SearchKey=$2("search_key");
		if (SearchKey.value==""){
			if (Language=="cn"){
				alert("请输入搜索内容！");
			}
			else{
				alert("Please enter keywords!");
			}
			SearchKey.focus();
			return;
		}
		location.href="Products.asp?SearchKey="+encodeURI(SearchKey.value);
	}
}

function FloatDiv(ObjID,Ch){
	var Did=$2(ObjID);
	var DidTop=parseInt(Did.style.top);
	var Diff=(document.documentElement.scrollTop+document.body.scrollTop+Ch-DidTop)*.80;
	Did.style.top=Ch+document.documentElement.scrollTop+document.body.scrollTop-Diff+"px";
	setTimeout("FloatDiv('"+ObjID+"',"+Ch+")",20);
}
function FloatDiv2(ObjID,Ch){
	var Did=$2(ObjID);
	var DidTop=parseInt(Did.style.top);
	var Diff=(document.documentElement.clientHeight-53-Ch+document.documentElement.scrollTop+document.body.scrollTop-DidTop)*.80;
	Did.style.top=document.documentElement.clientHeight-53-Ch+document.documentElement.scrollTop+document.body.scrollTop-Diff+"px";
	setTimeout("FloatDiv2('"+ObjID+"',"+Ch+")",20);
}

function ReCode(ObjID){
	ObjID.src="Inc/GetCode.asp?Meter="+Math.random();
}

function iNews(Val){
	var Node=$2("inews_menu");
	var TagCount=Node.getElementsByTagName("li").length;
	for (var i=0;i<TagCount;i++){
		Node.getElementsByTagName("li")[i].className="inews_menu_out";
		$2("inews_"+i).style.display="none";
	}
	Node.getElementsByTagName("li")[Val].className="inews_menu_over";
	$2("inews_"+Val).style.display="block";
}

function CheckTrack(ObjForm,Language){
	if (ObjForm.TrackNum.value==""){
		if (Language=="en"){
			alert("Please enter the waybill number!");
		}
		else {
			alert("請輸入運單號！");
		}
		ObjForm.TrackNum.focus();
		return false;
	}
	ObjForm.submit();
}