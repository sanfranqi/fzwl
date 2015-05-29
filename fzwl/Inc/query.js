function getInfo(){
	var warn_div = document.getElementById("warn_div");
	var sn = document.getElementById("sn_code").value;
	var	table_info = document.getElementById("table_info");
	var status_info = document.getElementById("status_info");
	table_info.style.display='none';
	status_info.innerHTML="";
	warn_div.style.display = 'none';
	
	if(sn=="null"||sn==""||sn.length!=15){
		showMsg(warn_div,"单号输入错误!");	
		return;
	}
	var prefix = sn.substr(0, 3);
	if(prefix!="YDH"){
		showMsg(warn_div,"单号输入错误!");
		return;
	}
	var year = sn.substr(3, 4);
	if(year!="2015"){
		showMsg(warn_div,"单号输入错误!");
		return;
	}
	var month = sn.substr(7, 2);
	var today = new Date();
	var todayMonth = today.getMonth()+1;
	if(month>todayMonth||month<1){
		showMsg(warn_div,"单号输入错误!");
		return;
	}
	var day = sn.substr(9, 2);
		if(day>31||day<1){
		showMsg(warn_div,"单号输入错误!");
		return;
	}
	var status_title = "<span class=\"label label-info\" style=\"font-size:12px\">状态：</span>";
	if(month==today.getMonth()+1&&day>today.getDate()-2){
		status_info.innerHTML=status_title+"&nbsp;&nbsp;准备发货";
		return;
	}	
	status_info.innerHTML=status_title+"&nbsp;&nbsp;已发货";
	table_info.style.display='block';

	var step_1 = document.getElementById("step_1");
	var step_2 = document.getElementById("step_2");
	var step_3 = document.getElementById("step_3");
	var step_1_time = document.getElementById("step_1_time");
	var step_2_time = document.getElementById("step_2_time");
	var step_3_time = document.getElementById("step_3_time");
	step_2.style.display='none';
	step_3.style.display='none';

	var sn_day_str = year+"-"+month+"-"+day;
	var sn_date = StringToDate(sn_day_str);
	var today_str_short = getDateTimeStr(today).substr(0, 11);

	var two_day_later = new Date(sn_date.setDate(sn_date.getDate()+2));
	step_1_time.innerHTML=getDateTimeStr(two_day_later);

	var four_day_later = new Date(sn_date.setDate(sn_date.getDate()+2));
	var four_day_str = getDateTimeStr(four_day_later);    
	if(daysBetween(today_str_short,four_day_str.substr(0, 11))>=0){
		step_2.style.display="table-row";
		step_2_time.innerHTML=four_day_str;
	}

	var six_day_later = new Date(sn_date.setDate(sn_date.getDate()+2));
	var six_day_str = getDateTimeStr(six_day_later);
	if(daysBetween(today_str_short,six_day_str.substr(0, 11))>=0){
		step_3_time.innerHTML=six_day_str;
		step_3.style.display="table-row";	
	}
}

function showMsg(warn_div,msg){
	warn_div.style.display = "block";
	document.getElementById("warn_area").innerHTML=msg;
}

function StringToDate(DateStr){ 
 	var converted = Date.parse(DateStr); 
	var myDate = new Date(converted); 
	return myDate; 
}

function getDateTimeStr(d){  
    var year = d.getFullYear();   
    var month = d.getMonth()+1;   
    var date = d.getDate();   
    var day = d.getDay();   
    var hours = d.getHours();   
    var minutes = d.getMinutes();   
    var seconds = d.getSeconds();   
    var ms = d.getMilliseconds();
    var curDateTime= year;  
    if(month>9)  
    curDateTime = curDateTime +"-"+month;  
    else  
    curDateTime = curDateTime +"-0"+month;  
    if(date>9)  
    curDateTime = curDateTime +"-"+date;  
    else  
    curDateTime = curDateTime +"-0"+date;  
    if(hours>9)  
    curDateTime = curDateTime +" "+hours;  
    else  
    curDateTime = curDateTime +" 0"+hours;  
    if(minutes>9)  
    curDateTime = curDateTime +":"+minutes;  
    else  
    curDateTime = curDateTime +":0"+minutes;  
    if(seconds>9)  
    curDateTime = curDateTime +":"+seconds;  
    else  
    curDateTime = curDateTime +":0"+seconds;  
    return curDateTime;    
}


function daysBetween(DateOne,DateTwo){ 
	var OneMonth = DateOne.substring(5,DateOne.lastIndexOf ('-')); 
	var OneDay = DateOne.substring(DateOne.length,DateOne.lastIndexOf ('-')+1); 
	var OneYear = DateOne.substring(0,DateOne.indexOf ('-')); 
	  
	var TwoMonth = DateTwo.substring(5,DateTwo.lastIndexOf ('-')); 
	var TwoDay = DateTwo.substring(DateTwo.length,DateTwo.lastIndexOf ('-')+1); 
	var TwoYear = DateTwo.substring(0,DateTwo.indexOf ('-')); 
	  
	var cha=((Date.parse(OneMonth+'/'+OneDay+'/'+OneYear)- Date.parse(TwoMonth+'/'+TwoDay+'/'+TwoYear))/86400000);
	return cha; 
} 
