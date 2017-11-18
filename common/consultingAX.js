//**********************************************************************************************************************************************************************************************showHint***************************************************************************************************************************************************************************************

function showHint(str)
{
	if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
  			xmlhttpsh=new XMLHttpRequest();
  		}
			else
  		{// code for IE6, IE5
  		xmlhttpsh=new ActiveXObject("Microsoft.XMLHTTP");
  		}
  
  
	xmlhttpsh.onreadystatechange=function()
  		{
 		if (xmlhttpsh.readyState==4 && xmlhttpsh.status==200)
    		{
    			document.getElementById("app").innerHTML=xmlhttpsh.responseText;
    		}
	
  		}
		
var url="gethint.php";
url=url+"?q="+str
  
	xmlhttpsh.open("GET",url,true);//Send the request off to a file on the server
	xmlhttpsh.send();
}




/*<![CDATA[*/
function CngClass(obj){
	var Lst;
 if (Lst) Lst.className='';
 obj.className='highlight';
 Lst=obj;
}
/*]]>*/

//**********************************************************************************************************************************************************************************************button***************************************************************************************************************************************************************************************



// JavaScript Document
var xmlHttpxy;
function DABxy(param){
var I_ksxy=document.getElementById(param);
return I_ksxy;
}
function getXMLHttpRequest(){
var xmlHttpxy=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttpxy = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttpxy=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttpxy=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttpxy;
}


//add notes and update note

function Button(){
xmlHttpxy=getXMLHttpRequest();
if(xmlHttpxy==null){
alert("Your browser does not support Ajax");
return;}

var pr = document.button.pr.value;
var en = document.button.en.value;
var sc = document.button.sc.value;
var id = document.button.id.value;
var st = document.button.st.value;
var cap = document.button.cap.value;
var lc2 = document.button.lc2.value;
var lc = document.button.lc.value;
var id2 = document.button.id2.value;
var theid = document.button.theid.value;
var thetask = document.button.thetask.value;
var mod = "AddButton";

var url="insertbutton.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&theid="+theid+"&thetask="+thetask+"&mod="+mod;


xmlHttpxy.onreadystatechange=function(){ 
if (xmlHttpxy.readyState==4){ 
addbt=xmlHttpxy.responseText;
if (addbt!= "1"){
	alert(addbt)
	} else
	{
		loadpage('waiting.php','info.php', 'notes.php', 'list.php','alert.php','history.php','vitals.php','service.php','time.php','untitled.php','waiting', 'info', 'note', 'list', 'showlist', 'history', 'vitals', 'service', 'time','button');
		}

}else if(xmlHttpxy.readyState==3){

}}
xmlHttpxy.open("GET",url,true);	
xmlHttpxy.send(null);

}
  //**********************************************************************************************************************************************************************************************myselect5***************************************************************************************************************************************************************************************



 function gotourl5( mySelect5 ) {
var pr = document.form25.pr.value;
var en = document.form25.en.value;
var sc = document.form25.sc.value;
var id = document.form25.id.value;
var st = document.form25.st.value;
var cap = document.form25.cap.value;
var lc2 = document.form25.lc2.value;
var lc = document.form25.lc.value;
var id2 = document.form25.id2.value;
 var myValue5 = document.form25.style_FK.options
[document.form25.style_FK.options.selectedIndex].value;
      LoadX(pr, en, sc, cap, lc2, lc, st, id, id2, myValue5); 
	  LoadY(pr, en, sc, cap, lc2, lc, st, id, id2, myValue5); 
	  LoadZ(pr, en, sc, cap, lc2, lc, st, id, id2, myValue5); 
   }
   
//**********************************************************************************************************************************************************************************************myselect4***************************************************************************************************************************************************************************************



 function gotourl4( mySelect4 ) {
var pr = document.form25.pr.value;
var en = document.form25.en.value;
var sc = document.form25.sc.value;
var id = document.form25.id.value;
var st = document.form25.st.value;
var cap = document.form25.cap.value;
var lc2 = document.form25.lc2.value;
var lc = document.form25.lc.value;
var id2 = document.form25.id2.value;
 var myValue4 = document.form25.service_FK.options
[document.form25.service_FK.options.selectedIndex].value;
      LoadDrugs(pr, en, sc, cap, lc2, lc, st, id, id2, myValue4); 
   }  
   

//**********************************************************************************************************************************************************************************************myselect2***************************************************************************************************************************************************************************************



 function gotourl2( mySelect2 ) {
var pr = document.form15.pr.value;
var en = document.form15.en.value;
var sc = document.form15.sc.value;
var id = document.form15.id.value;
var st = document.form15.st.value;
var cap = document.form15.cap.value;
var lc2 = document.form15.lc2.value;
var lc = document.form15.lc.value;
var id2 = document.form15.id2.value;
 var myValue2 = document.form15.select.options
[document.form15.select.options.selectedIndex].value;
      LoadAllergy(pr, en, sc, cap, lc2, lc, st, id, id2, myValue2); 
   }  
   

   
   
//**********************************************************************************************************************************************************************************************myselect***************************************************************************************************************************************************************************************



 function gotourl( mySelect ) {
	  var pr = document.form14.pr.value;
var en = document.form14.en.value;
var sc = document.form14.sc.value;
var id = document.form14.id.value;
var st = document.form14.st.value;
var cap = document.form14.cap.value;
var lc2 = document.form14.lc2.value;
var lc = document.form14.lc.value;
var id2 = document.form14.id2.value;
 var myValue = document.form14.select.options
[document.form14.select.options.selectedIndex].value;
      LoadInvestigation(pr, en, sc, cap, lc2, lc, st, id, id2, myValue); 
   }  


//**********************************************************************************************************************************************************************************************change***************************************************************************************************************************************************************************************

function change (elem) {
    AddNote();}


//*******************************************************************************************************************************************************************************************onload**************************************************************************************************************************************************************************************


var rootdomain="http://"+window.location.hostname

function loadpage()
{
	
var wait = "waiting.php"
var	info = "info.php"
var	note = "notes.php"
var	list = "list.php"
var	showlist = "alert.php"
var	showlist2 = "untitled.php"
var	history = "history.php"
var	vitals = "vitals.php"
var	service = "service.php"
var	time = "time.php"
var	button = "untitled.php"
var	waitcontainer = "waiting"
var	infocontainer = "info"
var	notecontainer = "note"
var	listcontainer = "list"
var	showlistcontainer = "showlist"
var	listcontainer2 = "list2"
var	showlistcontainer2 = "showlist2"
var	historycontainer = "history"
var	vitalscontainer = "vitals"
var	servicecontainer = "service"
var	timecontainer = "time"
var	buttoncontainer = "button"
	
	
	
var pr = 1;
var en = 1;
var sc = 1;
var id = 1;
var st = 1;
var cap = 1;
var lc2 = 1;
var lc = 1;
var id2 = 1;

var waiting_request = false
var info_request = false
var note_request = false
var list_request = false
var showlist_request = false
var showlist2_request = false
var history_request = false
var vitals_request = false
var service_request = false
var time_request = false
var button_request = false



if (window.XMLHttpRequest) // if Mozilla, Safari etc
{
waiting_request =  new XMLHttpRequest()
info_request = new XMLHttpRequest()
note_request = new XMLHttpRequest()
list_request = new XMLHttpRequest()
showlist_request = new XMLHttpRequest()
showlist2_request = new XMLHttpRequest()
history_request = new XMLHttpRequest()
vitals_request = new XMLHttpRequest()
service_request = new XMLHttpRequest()
time_request = new XMLHttpRequest()
button_request = new XMLHttpRequest()
}

else if (window.ActiveXObject){ // if IE
try {
waiting_request =  new ActiveXObject("Msxml2.XMLHTTP")
info_request = new ActiveXObject("Msxml2.XMLHTTP")
note_request = new ActiveXObject("Msxml2.XMLHTTP")
list_request = new ActiveXObject("Msxml2.XMLHTTP")
showlist_request = new ActiveXObject("Msxml2.XMLHTTP")
showlist2_request = new ActiveXObject("Msxml2.XMLHTTP")
history_request = new ActiveXObject("Msxml2.XMLHTTP")
vitals_request = new ActiveXObject("Msxml2.XMLHTTP")
service_request = new ActiveXObject("Msxml2.XMLHTTP")
time_request = new ActiveXObject("Msxml2.XMLHTTP")
button_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
waiting_request =  new ActiveXObject("Msxml2.XMLHTTP")
info_request = new ActiveXObject("Msxml2.XMLHTTP")
note_request = new ActiveXObject("Msxml2.XMLHTTP")
list_request = new ActiveXObject("Msxml2.XMLHTTP")
showlist_request = new ActiveXObject("Msxml2.XMLHTTP")
showlist2_request = new ActiveXObject("Msxml2.XMLHTTP")
history_request = new ActiveXObject("Msxml2.XMLHTTP")
vitals_request = new ActiveXObject("Msxml2.XMLHTTP")
service_request = new ActiveXObject("Msxml2.XMLHTTP")
time_request = new ActiveXObject("Msxml2.XMLHTTP")
button_request = new ActiveXObject("Msxml2.XMLHTTP")
}
catch (e){}
}
}
else
return false

/*******waiting******/
waiting_request.onreadystatechange=function(){
loadwait(waiting_request, waitcontainer)
}
wait=wait+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
waiting_request.open('GET', wait, true)
waiting_request.send(null)

function loadwait(waiting_request, waitcontainer){
if (waiting_request.readyState == 4 && (waiting_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(waitcontainer).innerHTML=waiting_request.responseText

}

/*******info******/
info_request.onreadystatechange=function(){
loadinfo(info_request, infocontainer)
}
info=info+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
info_request.open('GET', info, true)
info_request.send(null)

function loadinfo(info_request, infocontainer){
if (info_request.readyState == 4 && (info_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(infocontainer).innerHTML=info_request.responseText
}

/*******note******/
note_request.onreadystatechange=function(){
loadnote(note_request, notecontainer)
}
note=note+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
note_request.open('GET', note, true)
note_request.send(null)

function loadnote(note_request, notecontainer){
if (note_request.readyState == 4 && (note_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(notecontainer).innerHTML=note_request.responseText
}

/*******list******/
list_request.onreadystatechange=function(){
loadlist(list_request, listcontainer)
}
list=list+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
list_request.open('GET', list, true)
list_request.send(null)

function loadlist(list_request, listcontainer){
if (list_request.readyState == 4 && (list_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(listcontainer).innerHTML=list_request.responseText
}

/*******showlist******/
showlist_request.onreadystatechange=function(){
loadshowlist(showlist_request, showlistcontainer)
}
showlist=showlist+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
showlist_request.open('GET', showlist, true)
showlist_request.send(null)

function loadshowlist(showlist_request, showlistcontainer){
if (showlist_request.readyState == 4 && (showlist_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(showlistcontainer).innerHTML=showlist_request.responseText
}

/*******showlist******/
showlist2_request.onreadystatechange=function(){
loadshowlist2(showlist2_request, showlistcontainer2)
}
showlist2=showlist2+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
showlist2_request.open('GET', showlist2, true)
showlist2_request.send(null)

function loadshowlist2(showlist2_request, showlistcontainer2){
if (showlist2_request.readyState == 4 && (showlist2_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(showlistcontainer2).innerHTML=showlist2_request.responseText
}

/*******history******/
history_request.onreadystatechange=function(){
loadhistory(history_request, historycontainer)
}
history=history+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
history_request.open('GET', history, true)
history_request.send(null)

function loadhistory(history_request, historycontainer){
if (history_request.readyState == 4 && (history_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(historycontainer).innerHTML=history_request.responseText
}

/*******vitals******/
vitals_request.onreadystatechange=function(){
loadvitals(vitals_request, vitalscontainer)
}
vitals=vitals+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
vitals_request.open('GET', vitals, true)
vitals_request.send(null)

function loadvitals(vitals_request, vitalscontainer){
if (history_request.readyState == 4 && (history_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(vitalscontainer).innerHTML=vitals_request.responseText
}


/*******service******/
service_request.onreadystatechange=function(){
loadservice(service_request, servicecontainer)
}
service=service+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
service_request.open('GET', service, true)
service_request.send(null)

function loadservice(service_request, servicecontainer){
if (service_request.readyState == 4 && (service_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(servicecontainer).innerHTML=service_request.responseText
}

/*******time******/
time_request.onreadystatechange=function(){
loadtime(time_request, timecontainer)
}
time=time+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
time_request.open('GET', time, true)
time_request.send(null)

function loadtime(time_request, timecontainer){
if (time_request.readyState == 4 && (time_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(timecontainer).innerHTML=time_request.responseText
}
/*******button******/
button_request.onreadystatechange=function(){
loadbutton(button_request, buttoncontainer)
}
button=button+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
button_request.open('GET', button, true)
button_request.send(null)

function loadbutton(button_request, buttoncontainer){
if (button_request.readyState == 4 && (button_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(buttoncontainer).innerHTML=button_request.responseText
}

}


//********************************************************************************************************************************************************************************************waiting*******************************************************************************************************************************************************************************************************



var winfo = 'info.php';
var wnote = 'notes.php';
var wlist = 'list.php';
var wlist2 = 'list2.php';
var wshowlist = 'alert.php';
var whistory = 'history.php';
var wvitals = 'vitals.php';
var wservice = 'service.php';
var wtime = 'time.php';
var wbutton = 'button.php';

var winfocontainer = 'info';
var wnotecontainer = 'note';
var wlistcontainer = 'list';
var wlist2container = 'list2';
var wshowlistcontainer = 'showlist';
var wshowlist2container = 'showlist2';
var whistorycontainer = 'history';
var wvitalscontainer = 'vitals';
var wservicecontainer = 'service';
var wtimecontainer = 'time';
var wbuttoncontainer = 'button';


var wrootdomain="http://"+window.location.hostname

function selectt(pr, en, sc, cap, lc2, lc, st, id, id2,wshowlist2)
{
var winfo_request = false
var wnote_request = false
var wlist_request = false
var wlist2_request = false
var wshowlist_request = false
var wshowlist2_request = false
var whistory_request = false
var wvitals_request = false
var wservice_request = false
var wtime_request = false
var wbutton_request = false


if (window.XMLHttpRequest) // if Mozilla, Safari etc
{
winfo_request = new XMLHttpRequest()
wnote_request = new XMLHttpRequest()
wlist_request = new XMLHttpRequest()
wlist2_request = new XMLHttpRequest()
wshowlist_request = new XMLHttpRequest()
wshowlist2_request = new XMLHttpRequest()
whistory_request = new XMLHttpRequest()
wvitals_request = new XMLHttpRequest()
wservice_request = new XMLHttpRequest()
wtime_request = new XMLHttpRequest()
wbutton_request = new XMLHttpRequest()
}

else if (window.ActiveXObject){ // if IE
try {
winfo_request = new ActiveXObject("Msxml2.XMLHTTP")
wnote_request = new ActiveXObject("Msxml2.XMLHTTP")
wlist_request = new ActiveXObject("Msxml2.XMLHTTP")
wlist2_request = new ActiveXObject("Msxml2.XMLHTTP")
wshowlist_request = new ActiveXObject("Msxml2.XMLHTTP")
wshowlist2_request = new ActiveXObject("Msxml2.XMLHTTP")
whistory_request = new ActiveXObject("Msxml2.XMLHTTP")
wvitals_request = new ActiveXObject("Msxml2.XMLHTTP")
wservice_request = new ActiveXObject("Msxml2.XMLHTTP")
wtime_request = new ActiveXObject("Msxml2.XMLHTTP")
wbutton_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
wwaiting_request =  new ActiveXObject("Msxml2.XMLHTTP")
winfo_request = new ActiveXObject("Msxml2.XMLHTTP")
wnote_request = new ActiveXObject("Msxml2.XMLHTTP")
wlist_request = new ActiveXObject("Msxml2.XMLHTTP")
wlist2_request = new ActiveXObject("Msxml2.XMLHTTP")
wshowlist_request = new ActiveXObject("Msxml2.XMLHTTP")
whistory_request = new ActiveXObject("Msxml2.XMLHTTP")
wvitals_request = new ActiveXObject("Msxml2.XMLHTTP")
wlist2_request = new ActiveXObject("Msxml2.XMLHTTP")
wshowlist2_request = new ActiveXObject("Msxml2.XMLHTTP")
wservice_request = new ActiveXObject("Msxml2.XMLHTTP")
wtime_request = new ActiveXObject("Msxml2.XMLHTTP")
wbutton_request = new ActiveXObject("Msxml2.XMLHTTP")
}
catch (e){}
}
}
else
return false


/*******winfo******/
winfo_request.onreadystatechange=function(){
wloadinfo(winfo_request, winfocontainer)
}
winfo=winfo+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
winfo_request.open('GET', winfo, true)
winfo_request.send(null)

function wloadinfo(winfo_request, winfocontainer){
if (winfo_request.readyState == 4 && (winfo_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(winfocontainer).innerHTML=winfo_request.responseText
}

/*******wnote******/
wnote_request.onreadystatechange=function(){
wloadnote(wnote_request, wnotecontainer)
LoadNote(pr, en, sc, cap, lc2, lc, st, id, id2);
}
wnote=wnote+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
wnote_request.open('GET', wnote, true)
wnote_request.send(null)

function wloadnote(wnote_request, wnotecontainer){
if (wnote_request.readyState == 4 && (wnote_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wnotecontainer).innerHTML=wnote_request.responseText
}

/*******wlist******/
wlist_request.onreadystatechange=function(){
wloadlist(wlist_request, wlistcontainer)
}
wlist=wlist+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
wlist_request.open('GET', wlist, true)
wlist_request.send(null)

function wloadlist(wlist_request, wlistcontainer){
if (wlist_request.readyState == 4 && (wlist_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wlistcontainer).innerHTML=wlist_request.responseText
}

/*******wlist2******/
wlist2_request.onreadystatechange=function(){
wloadlist2(wlist2_request, wlist2container)
}
wlist2=wlist2+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
wlist2_request.open('GET', wlist2, true)
wlist2_request.send(null)

function wloadlist2(wlist2_request, wlist2container){
if (wlist2_request.readyState == 4 && (wlist2_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wlist2container).innerHTML=wlist2_request.responseText
}

/*******wshowlist******/
wshowlist_request.onreadystatechange=function(){
wloadshowlist(wshowlist_request, wshowlistcontainer)
}
wshowlist=wshowlist+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
wshowlist_request.open('GET', wshowlist, true)
wshowlist_request.send(null)

function wloadshowlist(wshowlist_request, wshowlistcontainer){
if (wshowlist_request.readyState == 4 && (wshowlist_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wshowlistcontainer).innerHTML=wshowlist_request.responseText
}

/*******wshowlist2******/
wshowlist2_request.onreadystatechange=function(){
wloadshowlist2(wshowlist2_request, wshowlist2container)
LoadDiagnosis(pr, en, sc, cap, lc2, lc, st, id, id2);
LoadString()
}
wshowlist2=wshowlist2+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
wshowlist2_request.open('GET', wshowlist2, true)
wshowlist2_request.send(null)

function wloadshowlist2(wshowlist2_request, wshowlist2container){
if (wshowlist2_request.readyState == 4 && (wshowlist2_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wshowlist2container).innerHTML=wshowlist2_request.responseText
}

/*******whistory******/
whistory_request.onreadystatechange=function(){
wloadhistory(whistory_request, whistorycontainer)
}
whistory=whistory+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
whistory_request.open('GET', whistory, true)
whistory_request.send(null)

function wloadhistory(whistory_request, whistorycontainer){
if (whistory_request.readyState == 4 && (whistory_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(whistorycontainer).innerHTML=whistory_request.responseText
}

/*******wvitals******/
wvitals_request.onreadystatechange=function(){
wloadvitals(wvitals_request, wvitalscontainer)
LoadVital(pr, en, sc, cap, lc2, lc, st, id, id2);
}
wvitals=wvitals+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
wvitals_request.open('GET', wvitals, true)
wvitals_request.send(null)

function wloadvitals(wvitals_request, wvitalscontainer){
if (whistory_request.readyState == 4 && (whistory_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wvitalscontainer).innerHTML=wvitals_request.responseText
}


/*******wservice******/
wservice_request.onreadystatechange=function(){
wloadservice(wservice_request, wservicecontainer)
}
wservice=wservice+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
wservice_request.open('GET', wservice, true)
wservice_request.send(null)

function wloadservice(wservice_request, wservicecontainer){
if (wservice_request.readyState == 4 && (wservice_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wservicecontainer).innerHTML=wservice_request.responseText
}

/*******wtime******/
wtime_request.onreadystatechange=function(){
wloadtime(wtime_request, wservicecontainer)
}
wtime=wtime+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
wtime_request.open('GET', wtime, true)
wtime_request.send(null)

function wloadtime(wtime_request, wtimecontainer){
if (wtime_request.readyState == 4 && (wtime_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wtimecontainer).innerHTML=wtime_request.responseText
}

/*******wbutton******/
wbutton_request.onreadystatechange=function(){
wloadbutton(wbutton_request, wbuttoncontainer)
}
wbutton=wbutton+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
wbutton_request.open('GET', wbutton, true)
wbutton_request.send(null)

function wloadbutton(wbutton_request, wbuttoncontainer){
if (wbutton_request.readyState == 4 && (wbutton_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(wbuttoncontainer).innerHTML=wbutton_request.responseText
}

}

//**********************************************************************************************************************************************************************************************list2***************************************************************************************************************************************************************************************


var slrootdomain2="http://"+window.location.hostname

function listt2(pr, en, sc, cap, lc2, lc, st, id, id2,slshowlistcontainer2,slshowlist2)
{
var slshowlist2_request = false

if (window.XMLHttpRequest) // if Mozilla, Safari etc
{
slshowlist2_request = new XMLHttpRequest()
}

else if (window.ActiveXObject){ // if IE
try {
slshowlist2_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
slshowlist2_request = new ActiveXObject("Msxml2.XMLHTTP")

}
catch (e){}
}
}
else
return false



/*******slshowlist2******/
slshowlist2_request.onreadystatechange=function(){
slloadshowlist2(slshowlist2_request, slshowlistcontainer2)

LoadDiagnosis(pr, en, sc, cap, lc2, lc, st, id, id2);
LoadString()
}

slshowlist2=slshowlist2+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
slshowlist2_request.open('GET', slshowlist2, true)
slshowlist2_request.send(null)

function slloadshowlist2(slshowlist2_request, slshowlistcontainer2){
if (slshowlist2_request.readyState == 4 && (slshowlist2_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(slshowlistcontainer2).innerHTML=slshowlist2_request.responseText
}

}

//**********************************************************************************************************************************************************************************************list2a***************************************************************************************************************************************************************************************


var slrootdomain2a="http://"+window.location.hostname

function listt2a(pr, en, sc, cap, lc2, lc, st, id, id2,slshowlistcontainer2a,slshowlist2a)
{
var slshowlist2a_request = false

if (window.XMLHttpRequest) // if Mozilla, Safari etc
{
slshowlist2a_request = new XMLHttpRequest()
}

else if (window.ActiveXObject){ // if IE
try {
slshowlist2a_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
slshowlist2a_request = new ActiveXObject("Msxml2.XMLHTTP")

}
catch (e){}
}
}
else
return false



/*******slshowlist2******/
slshowlist2a_request.onreadystatechange=function(){
slloadshowlist2a(slshowlist2a_request, slshowlistcontainer2a)

LoadInvestigation(pr, en, sc, cap, lc2, lc, st, id, id2,3);
 }

slshowlist2a=slshowlist2a+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
slshowlist2a_request.open('GET', slshowlist2a, true)
slshowlist2a_request.send(null)

function slloadshowlist2a(slshowlist2a_request, slshowlistcontainer2a){
if (slshowlist2a_request.readyState == 4 && (slshowlist2a_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(slshowlistcontainer2a).innerHTML=slshowlist2a_request.responseText
}

}

//**********************************************************************************************************************************************************************************************list2b***************************************************************************************************************************************************************************************


var slrootdomain2b="http://"+window.location.hostname

function listt2b(pr, en, sc, cap, lc2, lc, st, id, id2,slshowlistcontainer2b,slshowlist2b)
{
var slshowlist2b_request = false

if (window.XMLHttpRequest) // if Mozilla, Safari etc
{
slshowlist2b_request = new XMLHttpRequest()
}

else if (window.ActiveXObject){ // if IE
try {
slshowlist2b_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
slshowlist2b_request = new ActiveXObject("Msxml2.XMLHTTP")

}
catch (e){}
}
}
else
return false



/*******slshowlist2b******/
slshowlist2b_request.onreadystatechange=function(){
slloadshowlist2b(slshowlist2b_request, slshowlistcontainer2b)

LoadAllergy(pr, en, sc, cap, lc2, lc, st, id, id2,7);
 }

slshowlist2b=slshowlist2b+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
slshowlist2b_request.open('GET', slshowlist2b, true)
slshowlist2b_request.send(null)

function slloadshowlist2b(slshowlist2b_request, slshowlistcontainer2b){
if (slshowlist2b_request.readyState == 4 && (slshowlist2b_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(slshowlistcontainer2b).innerHTML=slshowlist2b_request.responseText
}

}

//**********************************************************************************************************************************************************************************************list2c***************************************************************************************************************************************************************************************


var slrootdomain2c="http://"+window.location.hostname

function listt2c(pr, en, sc, cap, lc2, lc, st, id, id2,slshowlistcontainer2c,slshowlist2c)
{
var slshowlist2c_request = false

if (window.XMLHttpRequest) // if Mozilla, Safari etc
{
slshowlist2c_request = new XMLHttpRequest()
}

else if (window.ActiveXObject){ // if IE
try {
slshowlist2c_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
slshowlist2c_request = new ActiveXObject("Msxml2.XMLHTTP")

}
catch (e){}
}
}
else
return false



/*******slshowlist2c******/
slshowlist2c_request.onreadystatechange=function(){
slloadshowlist2c(slshowlist2c_request, slshowlistcontainer2c)

LoadHealth(pr, en, sc, cap, lc2, lc, st, id, id2);
 }

slshowlist2c=slshowlist2c+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
slshowlist2c_request.open('GET', slshowlist2c, true)
slshowlist2c_request.send(null)

function slloadshowlist2c(slshowlist2c_request, slshowlistcontainer2c){
if (slshowlist2c_request.readyState == 4 && (slshowlist2c_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(slshowlistcontainer2c).innerHTML=slshowlist2c_request.responseText
}

}

//**********************************************************************************************************************************************************************************************list2d***************************************************************************************************************************************************************************************


var slrootdomain2d="http://"+window.location.hostname

function listt2d(pr, en, sc, cap, lc2, lc, st, id, id2,slshowlistcontainer2d,slshowlist2d)
{
var slshowlist2d_request = false

if (window.XMLHttpRequest) // if Mozilla, Safari etc
{
slshowlist2d_request = new XMLHttpRequest()
}

else if (window.ActiveXObject){ // if IE
try {
slshowlist2d_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
slshowlist2d_request = new ActiveXObject("Msxml2.XMLHTTP")

}
catch (e){}
}
}
else
return false



/*******slshowlist2d******/
slshowlist2d_request.onreadystatechange=function(){
slloadshowlist2d(slshowlist2d_request, slshowlistcontainer2d)

LoadAllergy(pr, en, sc, cap, lc2, lc, st, id, id2,7);
 }

slshowlist2d=slshowlist2d+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
slshowlist2d_request.open('GET', slshowlist2d, true)
slshowlist2d_request.send(null)

function slloadshowlist2d(slshowlist2d_request, slshowlistcontainer2d){
if (slshowlist2d_request.readyState == 4 && (slshowlist2d_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(slshowlistcontainer2d).innerHTML=slshowlist2d_request.responseText
}

}

//**********************************************************************************************************************************************************************************************list2d***************************************************************************************************************************************************************************************


var slrootdomain2e="http://"+window.location.hostname

function listt2e(pr, en, sc, cap, lc2, lc, st, id, id2,slshowlistcontainer2e,slshowlist2e)
{
var slshowlist2e_request = false

if (window.XMLHttpRequest) // if Mozilla, Safari etc
{
slshowlist2e_request = new XMLHttpRequest()
}

else if (window.ActiveXObject){ // if IE
try {
slshowlist2e_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
slshowlist2e_request = new ActiveXObject("Msxml2.XMLHTTP")

}
catch (e){}
}
}
else
return false



/*******slshowlist2e******/
slshowlist2e_request.onreadystatechange=function(){
slloadshowlist2e(slshowlist2e_request, slshowlistcontainer2e)

LoadPre(pr, en, sc, cap, lc2, lc, st, id, id2)
LoadDrugs(pr, en, sc, cap, lc2, lc, st, id, id2, 1)
LoadX(pr, en, sc, cap, lc2, lc, st, id, id2, 100); 
LoadY(pr, en, sc, cap, lc2, lc, st, id, id2, 100); 
LoadZ(pr, en, sc, cap, lc2, lc, st, id, id2, 100); 
 }

slshowlist2e=slshowlist2e+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
slshowlist2e_request.open('GET', slshowlist2e, true)
slshowlist2e_request.send(null)

function slloadshowlist2e(slshowlist2e_request, slshowlistcontainer2e){
if (slshowlist2e_request.readyState == 4 && (slshowlist2e_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(slshowlistcontainer2e).innerHTML=slshowlist2e_request.responseText
}

}

//**********************************************************************************************************************************************************************************************note***************************************************************************************************************************************************************************************

// JavaScript Document
var xmlHttp;
function DAB(param){
var I_ks=document.getElementById(param);
return I_ks;
}
function getXMLHttpRequest(){
var xmlHttp=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp;
}


//add notes and update note

function AddNote(){
xmlHttp=getXMLHttpRequest();
if(xmlHttp==null){
alert("Your browser does not support Ajax");
return;}

var pr = document.myform.pr.value;
var en = document.myform.en.value;
var sc = document.myform.sc.value;
var id = document.myform.id.value;
var st = document.myform.st.value;
var cap = document.myform.cap.value;
var lc2 = document.myform.lc2.value;
var lc = document.myform.lc.value;
var id2 = document.myform.id2.value;
var pnote = document.myform.pnote.value;
var note = document.myform.note.value;
var creator = document.myform.creator.value;

var mod = "AddNote";

var url="insertnote.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&pnote="+pnote+"&note="+note+"&creator="+creator+"&mod="+mod;


xmlHttp.onreadystatechange=function(){ 
if (xmlHttp.readyState==4){ 
addnt=xmlHttp.responseText;
if (addnt!= "1"){
	LoadNote(pr, en, sc, cap, lc2, lc, st, id, id2);
	alert("Error Writting This entry")
	} else
	{
		LoadNote(pr, en, sc, cap, lc2, lc, st, id, id2);
		}

}else if(xmlHttp.readyState==3){

}}
xmlHttp.open("GET",url,true);	
xmlHttp.send(null);

}

//loadnotes
function LoadNote(pr, en, sc, cap, lc2, lc, st, id, id2){
xmlHttp=getXMLHttpRequest();
if(xmlHttp==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadNote";
var note = "note";


var url="insertnote.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&pnote="+"pnote"+"&note="+note+"&creator="+"creator"+"&mod="+mod;

xmlHttp.onreadystatechange=function(){ 
if (xmlHttp.readyState==4){ 
Sat=xmlHttp.responseText;
DAB("AllNote").innerHTML=Sat

}else if(xmlHttp.readyState==3){
//DAB("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttp.open("GET",url,true);	
xmlHttp.send(null);

}

//**********************************************************************************************************************************************************************************************Vital**************************************************************************************************************************************************************************************

// JavaScript Document
var xmlHttp2;
function DAB2(param){
var I_ks2=document.getElementById(param);
return I_ks2;
}
function getXMLHttpRequest(){
var xmlHttp2=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp2 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp2=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp2=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp2;
}
//add vital 

function AddVital(){
xmlHttp2=getXMLHttpRequest();
if(xmlHttp2==null){
alert("Your browser does not support Ajax");
return;}

var pr = document.form1.pr.value;
var en = document.form1.en.value;
var sc = document.form1.sc.value;
var id = document.form1.id.value;
var st = document.form1.st.value;
var cap = document.form1.cap.value;
var lc2 = document.form1.lc2.value;
var lc = document.form1.lc.value;
var id2 = document.form1.id2.value;
var creator = document.form1.creator.value;
var vitals_fk = document.form1.vitals_fk.value;
var reading = document.form1.reading.value;

var mod = "AddVital";

var url="insertvit.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&creator="+creator+"&vitals_fk="+vitals_fk+"&reading="+reading+"&mod="+mod;


xmlHttp2.onreadystatechange=function(){ 
if (xmlHttp2.readyState==4){ 
addvt=xmlHttp2.responseText;
if (addvt!= 1){
	LoadVital(pr, en, sc, cap, lc2, lc, st, id, id2);
	alert("Error Writting This entry")
	} else
	{
		LoadVital(pr, en, sc, cap, lc2, lc, st, id, id2);
		}


}else if(xmlHttp2.readyState==3){

}}
xmlHttp2.open("GET",url,true);	
xmlHttp2.send(null);

}

//loadvitals
function LoadVital(pr, en, sc, cap, lc2, lc, st, id, id2){
xmlHttp2=getXMLHttpRequest();
if(xmlHttp2==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadVital";
var creator = "creator";
var vitals_fk = "creator";
var reading = "creator";

var url="insertvit.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&creator="+creator+"&vitals_fk="+vitals_fk+"&reading="+reading+"&mod="+mod;

xmlHttp2.onreadystatechange=function(){ 
if (xmlHttp2.readyState==4){ 
Sat2=xmlHttp2.responseText;
DAB2("AllVital").innerHTML=Sat2

}else if(xmlHttp2.readyState==3){
//DAB("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttp2.open("GET",url,true);	
xmlHttp2.send(null);

}

//**********************************************************************************************************************************************************************************************Diagnosis**************************************************************************************************************************************************************************************

// JavaScript Document
var xmlHttp3;
function DAB3(param){
var I_ks3=document.getElementById(param);
return I_ks3;
}
function getXMLHttpRequest(){
var xmlHttp3=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp3 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp3=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp3=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp3;
}



// JavaScript Document
var xmlHttpc;
function DABc(param){
var I_ksc=document.getElementById(param);
return I_ksc;
}
function getXMLHttpRequest(){
var xmlHttpc=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttpc = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttpc=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttpc=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttpc;
}
 
//loadString
function LoadString(){
xmlHttpc=getXMLHttpRequest();
if(xmlHttpc==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadString";
var pr = document.form11.pr.value;
var en = document.form11.en.value;
var sc = document.form11.sc.value;
var id = document.form11.id.value;
var st = document.form11.st.value;
var cap = document.form11.cap.value;
var lc2 = document.form11.lc2.value;
var lc = document.form11.lc.value;
var id2 = document.form11.id2.value;
var che = "che";
var diagnosis_FK = "dia";
var string = document.form11.string.value;

var url="insertdia.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&che="+che+"&diagnosis_FK="+diagnosis_FK+"&string="+string+"&mod="+mod;

xmlHttpc.onreadystatechange=function(){ 
if (xmlHttpc.readyState==4){ 
Satc=xmlHttpc.responseText;
DABc("DiaString").innerHTML=Satc

}else if(xmlHttpc.readyState==3){
DAB("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttpc.open("GET",url,true);	
xmlHttpc.send(null);

}
 

 
//add diagnosis 
function AddDiagnosis(){
xmlHttp3=getXMLHttpRequest();
if(xmlHttp3==null){
alert("Your browser does not support Ajax");
return;}

var pr = document.form11.pr.value;
var en = document.form11.en.value;
var sc = document.form11.sc.value;
var id = document.form11.id.value;
var st = document.form11.st.value;
var cap = document.form11.cap.value;
var lc2 = document.form11.lc2.value;
var lc = document.form11.lc.value;
var id2 = document.form11.id2.value;
var che = "che";
var diagnosis_FK = document.form11.diagnosis_FK.value;
var dia = "dia";

var mod = "AddDiagnosis";

var url="insertdia.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&che="+che+"&dia="+dia+"&diagnosis_FK="+diagnosis_FK+"&mod="+mod;


xmlHttp3.onreadystatechange=function(){ 
if (xmlHttp3.readyState==4){ 
addig=xmlHttp3.responseText;
if (addig== 1){
	LoadDiagnosis(pr, en, sc, cap, lc2, lc, st, id, id2);
	} else{
		LoadDiagnosis(pr, en, sc, cap, lc2, lc, st, id, id2);
		alert("Error Writting This entry");
		}


}else if(xmlHttp3.readyState==3){

}}
xmlHttp3.open("GET",url,true);	
xmlHttp3.send(null);

}


//loadDiagnosis
function LoadDiagnosis(pr, en, sc, cap, lc2, lc, st, id, id2){
xmlHttp3=getXMLHttpRequest();
if(xmlHttp3==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadDiagnosis";
var che = "che";
var diagnosis_FK = "dia";

var url="insertdia.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&che="+che+"&diagnosis_FK="+diagnosis_FK+"&mod="+mod;

xmlHttp3.onreadystatechange=function(){ 
if (xmlHttp3.readyState==4){ 
Sat3=xmlHttp3.responseText;
DAB3("AllDiagnosis").innerHTML=Sat3

}else if(xmlHttp3.readyState==3){
DAB("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttp3.open("GET",url,true);	
xmlHttp3.send(null);

}

//Update Diagnosis
function UpdateDiagnosis(diag){
xmlHttp3=getXMLHttpRequest();
if(xmlHttp3==null){
alert("Your browser does not support Ajax");
return;}
var mod = "UpdateDiagnosis";
var pr = document.form11.pr.value;
var en = document.form11.en.value;
var sc = document.form11.sc.value;
var id = document.form11.id.value;
var st = document.form11.st.value;
var cap = document.form11.cap.value;
var lc2 = document.form11.lc2.value;
var lc = document.form11.lc.value;
var id2 = document.form11.id2.value;
var che = "che";
var diagnosis_FK = document.form11.diagnosis_FK.value;
var dia = document.form11.dia.value;

var url="insertdia.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&che="+che+"&diagnosis_FK="+diagnosis_FK+"&dia="+dia+"&diag="+diag+"&mod="+mod;

xmlHttp3.onreadystatechange=function(){ 
if (xmlHttp3.readyState==4){ 
uppig=xmlHttp3.responseText;
if (uppig== 1){
	LoadDiagnosis(pr, en, sc, cap, lc2, lc, st, id, id2);
	} else
	{	LoadDiagnosis(pr, en, sc, cap, lc2, lc, st, id, id2);
		alert("Error Writting This entry");
		}


}else if(xmlHttp3.readyState==3){

}}
xmlHttp3.open("GET",url,true);	
xmlHttp3.send(null);

}

//**********************************************************************************************************************************************************************************************Investigation**************************************************************************************************************************************************************************************

// JavaScript Document
var xmlHttp4;
function DAB4(param){
var I_ks4=document.getElementById(param);
return I_ks4;
}
function getXMLHttpRequest(){
var xmlHttp4=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp4 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp4=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp4=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp4;
}
//add investigation 

function AddInvestigation(){
xmlHttp4=getXMLHttpRequest();
if(xmlHttp4==null){
alert("Your browser does not support Ajax");
return;}

var pr = document.form14.pr.value;
var en = document.form14.en.value;
var sc = document.form14.sc.value;
var id = document.form14.id.value;
var st = document.form14.st.value;
var cap = document.form14.cap.value;
var lc2 = document.form14.lc2.value;
var lc = document.form14.lc.value;
var id2 = document.form14.id2.value;
var che = "che";
var scr = document.form14.select.value;
var procedure_FK = document.form14.procedure_FK.value;
var provider = document.form14.provider.value;
var appointment = "";
var request = document.form14.request.value;

var mod = "AddInvestigation";

var url="insertinv.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&scr="+scr+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&procedure_FK="+procedure_FK+"&provider="+provider+"&appointment="+appointment+"&request="+request+"&mod="+mod;


xmlHttp4.onreadystatechange=function(){ 
if (xmlHttp4.readyState==4){ 
addin=xmlHttp4.responseText;
if (addin!= "1"){
	selectt(pr, en, sc, cap, lc2, lc, st, id, id2,'investigation.php');
	LoadInvestigation(pr, en, sc, cap, lc2, lc, st, id, id2,3);
	
	} else
	{
		selectt(pr, en, sc, cap, lc2, lc, st, id, id2,'investigation.php');
		LoadInvestigation(pr, en, sc, cap, lc2, lc, st, id, id2,3);
		}


}else if(xmlHttp4.readyState==3){

}}
xmlHttp4.open("GET",url,true);	
xmlHttp4.send(null);

}


//loadinvestigation
function LoadInvestigation(pr, en, sc, cap, lc2, lc, st, id, id2,service){
xmlHttp4=getXMLHttpRequest();
if(xmlHttp4==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadInvestigation";
var che = "che";
var procedure_FK = "che";
var provider = "che";
var appointment = "che";
var request = "che";

var url="insertinv.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&procedure_FK="+procedure_FK+"&provider="+provider+"&appointment="+appointment+"&request="+request+"&service="+service+"&mod="+mod;


xmlHttp4.onreadystatechange=function(){ 
if (xmlHttp4.readyState==4){ 
Sat4=xmlHttp4.responseText;
DAB4("AllInvestigation").innerHTML=Sat4

}else if(xmlHttp4.readyState==3){
DAB("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttp4.open("GET",url,true);	
xmlHttp4.send(null);

}

//Update Investigation
function UpdateInvestigation(inv){
xmlHttp4=getXMLHttpRequest();
if(xmlHttp4==null){
alert("Your browser does not support Ajax");
return;}
var mod = "UpdateInvestigation";
var pr = document.form14.pr.value;
var en = document.form14.en.value;
var sc = document.form14.sc.value;
var id = document.form14.id.value;
var st = document.form14.st.value;
var cap = document.form14.cap.value;
var lc2 = document.form14.lc2.value;
var lc = document.form14.lc.value;
var id2 = document.form14.id2.value;
var che = "che";
var procedure_FK = document.form14.procedure_FK.value;
var provider = document.form14.provider.value;
var appointment = document.form14.appointment.value;
var request = document.form14.request.value;

var url="insertinv.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&procedure_FK="+procedure_FK+"&provider="+provider+"&appointment="+appointment+"&request="+request+"&inv="+inv+"&mod="+mod;


xmlHttp4.onreadystatechange=function(){ 
if (xmlHttp4.readyState==4){ 
addig=xmlHttp4.responseText;
if (addig != 1){
	LoadInvestigation(pr, en, sc, cap, lc2, lc, st, id, id2,3);
	alert("Error Writting This entry")
	} else
	{
		LoadInvestigation(pr, en, sc, cap, lc2, lc, st, id, id2,3);
		}


}else if(xmlHttp4.readyState==3){

}}
xmlHttp4.open("GET",url,true);	
xmlHttp4.send(null);

}


//**********************************************************************************************************************************************************************************************allergy**************************************************************************************************************************************************************************************

// JavaScript Document
var xmlHttp5;
function DAB5(param){
var I_ks5=document.getElementById(param);
return I_ks5;
}
function getXMLHttpRequest(){
var xmlHttp5=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp5 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp5=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp5=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp5;
}

//add allergy 
function AddAllergy(){
xmlHttp5=getXMLHttpRequest();
if(xmlHttp5==null){
alert("Your browser does not support Ajax");
return;}

var pr = document.form15.pr.value;
var en = document.form15.en.value;
var sc = document.form15.sc.value;
var id = document.form15.id.value;
var st = document.form15.st.value;
var cap = document.form15.cap.value;
var lc = document.form15.lc.value;
var lc2 = document.form15.lc2.value;
var id2 = document.form15.id2.value;
var che = "che";
var drug_FK = document.form15.Drug.value;
var mod = "AddAllergy";
var allergy_FK = "all";
var alg = "alg";

var url="insertall.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&drug_FK="+drug_FK+"&che="+che+"&allergy_FK"+allergy_FK+"&alg"+alg+"&mod="+mod;

xmlHttp5.onreadystatechange=function(){ 
if (xmlHttp5.readyState==4){ 
addall=xmlHttp5.responseText;
if (addall!= "1"){
	LoadAllergy(pr, en, sc, cap, lc2, lc, st, id, id2, 7);
	alert("Error Writting This entry")
	} else
	{
		selectt(pr, en, sc, cap, lc2, lc, st, id, id2,'allergy.php');
		LoadAllergy(pr, en, sc, cap, lc2, lc, st, id, id2, 7);
		}


}else if(xmlHttp5.readyState==3){

}}
xmlHttp5.open("GET",url,true);	
xmlHttp5.send(null);

}


//loadallergy

function LoadAllergy(pr, en, sc, cap, lc2, lc, st, id, id2, sel){
xmlHttp5=getXMLHttpRequest();
if(xmlHttp5==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadAllergy";
var che = "che";
var drug_FK = "che";
var allergy_FK = "all";


var url="insertall.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&sel="+sel+"&id="+id+"&st="+st+"&cap="+cap+"&lc="+lc+"&lc2="+lc2+"&id2="+id2+"&drug_FK="+drug_FK+"&che="+che+"&allergy_FK"+allergy_FK+"&mod="+mod;

xmlHttp5.onreadystatechange=function(){ 
if (xmlHttp5.readyState==4){ 
Sat5=xmlHttp5.responseText;
DAB5("AllAllergy").innerHTML=Sat5

}else if(xmlHttp5.readyState==3){
DAB("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttp5.open("GET",url,true);	
xmlHttp5.send(null);

}

//Update Investigation
function UpdateAllergy(alg){
xmlHttp5=getXMLHttpRequest();
if(xmlHttp5==null){
alert("Your browser does not support Ajax");
return;}
var mod = "UpdateAllergy";
var pr = document.form15.pr.value;
var en = document.form15.en.value;
var sc = document.form15.sc.value;
var id = document.form15.id.value;
var st = document.form15.st.value;
var cap = document.form15.cap.value;
var lc = document.form15.lc.value;
var id2 = document.form15.id2.value;
var che = "che";
var drug_FK = document.form15.Drug.value;
var allergy_FK = document.form15.allergy_FK.value;


var url="insertall.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc="+lc+"&id2="+id2+"&drug_FK="+drug_FK+"&che="+che+"&allergy_FK"+allergy_FK+"&alg="+alg+"&mod="+mod;


xmlHttp5.onreadystatechange=function(){ 
if (xmlHttp5.readyState==4){ 
addall=xmlHttp5.responseText;
if (addall != 1){
	LoadAllergy(pr, en, sc, cap, lc2, lc, st, id, id2, 7);
	alert(addall)
	} else
	{
		selectt(pr, en, sc, cap, lc2, lc, st, id, id2,'allergy.php');
		LoadAllergy(pr, en, sc, cap, lc2, lc, st, id, id2, 7);
		}


}else if(xmlHttp5.readyState==3){

}}
xmlHttp5.open("GET",url,true);	
xmlHttp5.send(null);

}

//**********************************************************************************************************************************************************************************************Prescription**************************************************************************************************************************************************************************************

// JavaScript Document
var xmlHttppr;
function DABpr(param){
var I_kspr=document.getElementById(param);
return I_kspr;
}
function getXMLHttpRequest(){
var xmlHttppr=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttppr = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttppr=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttppr=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttppr;
}

// JavaScript Document
var xmlHttppre;
function DABpre(param){
var I_kspre=document.getElementById(param);
return I_kspre;
}
function getXMLHttpRequest(){
var xmlHttppre=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttppre = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttppre=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttppre=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttppre;
}

// JavaScript Document
var xmlHttppr2;
function DABpr2(param){
var I_kspr2=document.getElementById(param);
return I_kspr2;
}
function getXMLHttpRequest(){
var xmlHttppr2=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttppr2 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttppr2=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttppr2=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttppr2;
}

// JavaScript Document
var xmlHttppr3;
function DABpr3(param){
var I_kspr3=document.getElementById(param);
return I_kspr3;
}
function getXMLHttpRequest(){
var xmlHttppr3=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttppr3 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttppr3=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttppr3=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttppr3;
}


// JavaScript Document
var xmlHttpxxx;
function DABxxx(param){
var I_ksxxx=document.getElementById(param);
return I_ksxxx;
}
function getXMLHttpRequest(){
var xmlHttpxxx=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttpxxx = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttpxxx=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttpxxx=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttpxxx;
}

// JavaScript Document
var xmlHttpyyy;
function DAByyy(param){
var I_ksyyy=document.getElementById(param);
return I_ksyyy;
}
function getXMLHttpRequest(){
var xmlHttpyyy=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttpyyy = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttpyyy=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttpyyy=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttpyyy;
}
 
 // JavaScript Document
var xmlHttpzzz;
function DABzzz(param){
var I_kszzz=document.getElementById(param);
return I_kszzz;
}
function getXMLHttpRequest(){
var xmlHttpzzz=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttpzzz = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttpzzz=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttpzzz=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttpzzz;
}

 // JavaScript Document
var xmlHttppre;
function DABpre(param){
var I_kspre=document.getElementById(param);
return I_kspre;
}
function getXMLHttpRequest(){
var xmlHttppre=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttppre = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttppre=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttppre=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttppre;
}
 
 
 // JavaScript Document
var xmlHttpprep;
function DABprep(param){
var I_ksprep=document.getElementById(param);
return I_ksprep;
}
function getXMLHttpRequest(){
var xmlHttpprep=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttpprep = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttpprep=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttpprep=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttpprep;
}
 
 
 //Update Priescription
function AddPre(){
xmlHttpprep=getXMLHttpRequest();
if(xmlHttpprep==null){
alert("Your browser does not support Ajax");
return;}
var mod = "AddPre";
var pr = document.form25.pr.value;
var en = document.form25.en.value;
var sc = document.form25.sc.value;
var id = document.form25.id.value;
var st = document.form25.st.value;
var cap = document.form25.cap.value;
var lc = document.form25.lc.value;
var lc2 = document.form25.lc2.value;
var id2 = document.form25.id2.value;
var drug_FK = document.form25.drug_FK.value;
var style = document.form25.style_FK.value;
var usage = document.form25.usage.value;
var x = document.form25.x.value;
var y = document.form25.y.value;
var z = document.form25.z.value;
var scr = document.form25.service_FK.value;


var url="insertpre.php";
url=url+"?pr="+pr+"&scr="+scr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc="+lc+"&lc2="+lc2+"&id2="+id2+"&drug_FK="+drug_FK+"&style="+style+"&usage="+usage+"&x="+x+"&y="+y+"&z="+z+"&mod="+mod;


xmlHttpprep.onreadystatechange=function(){ 
if (xmlHttpprep.readyState==4){ 
addall=xmlHttpprep.responseText;
if (addall != 1){
selectt(pr, en, sc, cap, lc2, lc, st, id, id2,'prescription.php');
LoadPre(pr, en, sc, cap, lc2, lc, st, id, id2)
LoadDrugs(pr, en, sc, cap, lc2, lc, st, id, id2, 1)
LoadX(pr, en, sc, cap, lc2, lc, st, id, id2, 100); 
LoadY(pr, en, sc, cap, lc2, lc, st, id, id2, 100); 
LoadZ(pr, en, sc, cap, lc2, lc, st, id, id2, 100);
	//alert(addall)
	} else
	{
		selectt(pr, en, sc, cap, lc2, lc, st, id, id2,'prescription.php');
		LoadPre(pr, en, sc, cap, lc2, lc, st, id, id2)
LoadDrugs(pr, en, sc, cap, lc2, lc, st, id, id2, 1)
LoadX(pr, en, sc, cap, lc2, lc, st, id, id2, 100); 
LoadY(pr, en, sc, cap, lc2, lc, st, id, id2, 100); 
LoadZ(pr, en, sc, cap, lc2, lc, st, id, id2, 100);
		}


}else if(xmlHttpprep.readyState==3){

}}
xmlHttpprep.open("GET",url,true);	
xmlHttpprep.send(null);

}
 
 
//loadDrugs
function LoadDrugs(pr, en, sc, cap, lc2, lc, st, id, id2,string){
xmlHttppr=getXMLHttpRequest();
if(xmlHttppr==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadDrugs";

var url="insertpre.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&string="+string+"&mod="+mod;

xmlHttppr.onreadystatechange=function(){ 
if (xmlHttppr.readyState==4){ 
Satpr=xmlHttppr.responseText;
DABpr("AllDrugs").innerHTML=Satpr

}else if(xmlHttppr.readyState==3){
DABpr("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttppr.open("GET",url,true);	
xmlHttppr.send(null);

}


function LoadPre(pr, en, sc, cap, lc2, lc, st, id, id2){
xmlHttppre=getXMLHttpRequest();
if(xmlHttppre==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadPre";

var url="insertpre.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&mod="+mod;

xmlHttppre.onreadystatechange=function(){ 
if (xmlHttppre.readyState==4){ 
Satpre=xmlHttppre.responseText;
DABpre("AllPre").innerHTML=Satpre

}else if(xmlHttppre.readyState==3){
DABpre("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttppre.open("GET",url,true);	
xmlHttppre.send(null);

}


 
//loadX
function LoadX(pr, en, sc, cap, lc2, lc, st, id, id2,checkx){
xmlHttpxxx=getXMLHttpRequest();
if(xmlHttpxxx==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadX";

var url="insertpre.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&checkx="+checkx+"&mod="+mod;

xmlHttpxxx.onreadystatechange=function(){ 
if (xmlHttpxxx.readyState==4){ 
Satxxx=xmlHttpxxx.responseText;
DABxxx("x").innerHTML=Satxxx

}else if(xmlHttpxxx.readyState==3){
DABxxx("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttpxxx.open("GET",url,true);	
xmlHttpxxx.send(null);

}
 
 //loadY
function LoadY(pr, en, sc, cap, lc2, lc, st, id, id2,checky){
xmlHttpyyy=getXMLHttpRequest();
if(xmlHttpyyy==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadY";

var url="insertpre.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&checky="+checky+"&mod="+mod;

xmlHttpyyy.onreadystatechange=function(){ 
if (xmlHttpyyy.readyState==4){ 
Satyyy=xmlHttpyyy.responseText;
DAByyy("y").innerHTML=Satyyy

}else if(xmlHttpyyy.readyState==3){
DAByyy("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttpyyy.open("GET",url,true);	
xmlHttpyyy.send(null);

}


//loadZ
function LoadZ(pr, en, sc, cap, lc2, lc, st, id, id2,checkz){
xmlHttpzzz=getXMLHttpRequest();
if(xmlHttpzzz==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadZ";

var url="insertpre.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&checkz="+checkz+"&mod="+mod;

xmlHttpzzz.onreadystatechange=function(){ 
if (xmlHttpzzz.readyState==4){ 
Satzzz=xmlHttpzzz.responseText;
DABzzz("z").innerHTML=Satzzz

}else if(xmlHttpzzz.readyState==3){
DABzzz("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttpzzz.open("GET",url,true);	
xmlHttpzzz.send(null);

}

//add diagnosis 
function AddDiagnosis(){
xmlHttppre=getXMLHttpRequest();
if(xmlHttppre==null){
alert("Your browser does not support Ajax");
return;}

var pr = document.form11.pr.value;
var en = document.form11.en.value;
var sc = document.form11.sc.value;
var id = document.form11.id.value;
var st = document.form11.st.value;
var cap = document.form11.cap.value;
var lc2 = document.form11.lc2.value;
var lc = document.form11.lc.value;
var id2 = document.form11.id2.value;
var che = "che";
var diagnosis_FK = document.form11.diagnosis_FK.value;
var dia = "dia";

var mod = "AddDiagnosis";

var url="insertdia.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&che="+che+"&dia="+dia+"&diagnosis_FK="+diagnosis_FK+"&mod="+mod;


xmlHttppre.onreadystatechange=function(){ 
if (xmlHttppre.readyState==4){ 
addig=xmlHttppre.responseText;
if (addig== 1){
	LoadDiagnosis(pr, en, sc, cap, lc2, lc, st, id, id2);
	} else{
		LoadDiagnosis(pr, en, sc, cap, lc2, lc, st, id, id2);
		alert("Error Writting This entry");
		}


}else if(xmlHttppr.readyState==3){

}}
xmlHttppre.open("GET",url,true);	
xmlHttppre.send(null);

}


//loadDiagnosis
function LoadDiagnosis(pr, en, sc, cap, lc2, lc, st, id, id2){
xmlHttppr2=getXMLHttpRequest();
if(xmlHttppr2==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadDiagnosis";
var che = "che";
var diagnosis_FK = "dia";

var url="insertdia.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&che="+che+"&diagnosis_FK="+diagnosis_FK+"&mod="+mod;

xmlHttppr2.onreadystatechange=function(){ 
if (xmlHttppr2.readyState==4){ 
Satpr2=xmlHttppr2.responseText;
DABpr2("AllDiagnosis").innerHTML=Satpr2

}else if(xmlHttppr2.readyState==3){
DABpr2("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttppr2.open("GET",url,true);	
xmlHttppr2.send(null);

}

//Update Diagnosis
function UpdateDiagnosis(diag){
xmlHttppr3=getXMLHttpRequest();
if(xmlHttppr3==null){
alert("Your browser does not support Ajax");
return;}
var mod = "UpdateDiagnosis";
var pr = document.form11.pr.value;
var en = document.form11.en.value;
var sc = document.form11.sc.value;
var id = document.form11.id.value;
var st = document.form11.st.value;
var cap = document.form11.cap.value;
var lc2 = document.form11.lc2.value;
var lc = document.form11.lc.value;
var id2 = document.form11.id2.value;
var che = "che";
var diagnosis_FK = document.form11.diagnosis_FK.value;
var dia = document.form11.dia.value;

var url="insertdia.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&che="+che+"&diagnosis_FK="+diagnosis_FK+"&dia="+dia+"&diag="+diag+"&mod="+mod;

xmlHttppr3.onreadystatechange=function(){ 
if (xmlHttppr3.readyState==4){ 
uppig=xmlHttppr3.responseText;
if (uppig== 1){
	LoadDiagnosis(pr, en, sc, cap, lc2, lc, st, id, id2);
	} else
	{	LoadDiagnosis(pr, en, sc, cap, lc2, lc, st, id, id2);
		alert("Error Writting This entry");
		}


}else if(xmlHttppr3.readyState==3){

}}
xmlHttppr3.open("GET",url,true);	
xmlHttppr3.send(null);

}



//**********************************************************************************************************************************************************************************************health**************************************************************************************************************************************************************************************

// JavaScript Document
var xmlHttp7;
function DAB7(param){
var I_ks7=document.getElementById(param);
return I_ks7;
}
function getXMLHttpRequest(){
var xmlHttp7=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp7 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp7=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp7=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp7;
}

// JavaScript Document
var xmlHttp21;
function DAB21(param){
var I_ks21=document.getElementById(param);
return I_ks21;
}
function getXMLHttpRequest(){
var xmlHttp21=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp21 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp21=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp21=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp21;
}


// JavaScript Document
var xmlHttp22;
function DAB22(param){
var I_ks22=document.getElementById(param);
return I_ks22;
}
function getXMLHttpRequest(){
var xmlHttp22=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp22 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp22=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp22=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp22;
}



// JavaScript Document
var xmlHttp23;
function DAB23(param){
var I_ks23=document.getElementById(param);
return I_ks23;
}
function getXMLHttpRequest(){
var xmlHttp23=null;
try{// Firefox, Opera 8.0+, Safari
xmlHttp23 = new XMLHttpRequest();
}catch(e){
try{ // Internet Explorer
xmlHttp23=new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
xmlHttp23=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp23;
}

//add allergy 
function AddHealth(){
xmlHttp7=getXMLHttpRequest();
if(xmlHttp7==null){
alert("Your browser does not support Ajax");
return;}

var pr = document.form19.pr.value;
var en = document.form19.en.value;
var sc = document.form19.sc.value;
var id = document.form19.id.value;
var st = document.form19.st.value;
var cap = document.form19.cap.value;
var lc = document.form19.lc.value;
var lc2 = document.form19.lc2.value;
var id2 = document.form19.id2.value;
var diagnosis_FK = document.form19.diagnosis_FK.value;
var mod = "AddHealth";
var relate = document.form19.relate.value;
var string = document.form19.string.value;

var url="inserthea.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&diagnosis_FK="+diagnosis_FK+"&relate="+relate+"&id2="+id2+"&mod="+mod+"&string="+string;

xmlHttp7.onreadystatechange=function(){ 
if (xmlHttp7.readyState==4){ 
addhea=xmlHttp7.responseText;
if (addhea!= "1"){
	LoadHealth(pr, en, sc, cap, lc2, lc, st, id, id2);
	alert(addhea)
	} else
	{
		selectt(pr, en, sc, cap, lc2, lc, st, id, id2,'health.php');
		LoadHealth(pr, en, sc, cap, lc2, lc, st, id, id2);
		}


}else if(xmlHttp7.readyState==3){

}}
xmlHttp7.open("GET",url,true);	
xmlHttp7.send(null);

}


//loadhealth

function LoadHealth(pr, en, sc, cap, lc2, lc, st, id, id2){
xmlHttp21=getXMLHttpRequest();
if(xmlHttp21==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadHealth";
var che = "che";
var drug_FK = "che";


var url="inserthea.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc="+lc+"&lc2="+lc2+"&id2="+id2+"&drug_FK="+drug_FK+"&che="+che+"&mod="+mod;

xmlHttp21.onreadystatechange=function(){ 
if (xmlHttp21.readyState==4){ 
Sat21=xmlHttp21.responseText;
DAB21("AllHealth").innerHTML=Sat21
LoadString2();
}else if(xmlHttp21.readyState==3){
DAB21("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttp21.open("GET",url,true);	
xmlHttp21.send(null);

}

//Update health
function UpdateHealth(hea){
xmlHttp22=getXMLHttpRequest();
if(xmlHttp22==null){
alert("Your browser does not support Ajax");
return;}
var mod = "UpdateHealth";
var pr = document.form19.pr.value;
var en = document.form19.en.value;
var sc = document.form19.sc.value;
var id = document.form19.id.value;
var st = document.form19.st.value;
var cap = document.form19.cap.value;
var lc = document.form19.lc.value;
var id2 = document.form19.id2.value;
var lc2 = document.form19.lc2.value;



var url="inserthea.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc="+lc+"&id2="+id2+"&hea="+hea+"&mod="+mod;


xmlHttp22.onreadystatechange=function(){ 
if (xmlHttp22.readyState==4){ 
addhea=xmlHttp22.responseText;
if (addhea != 1){
	LoadHealth(pr, en, sc, cap, lc2, lc, st, id, id2);
	alert(addhea)
	} else
	{
		selectt(pr, en, sc, cap, lc2, lc, st, id, id2,'allergy.php');
		LoadHealth(pr, en, sc, cap, lc2, lc, st, id, id2);
		}


}else if(xmlHttp22.readyState==3){

}}
xmlHttp22.open("GET",url,true);	
xmlHttp22.send(null);

}

//loadString
function LoadString2(){
xmlHttp23=getXMLHttpRequest();
if(xmlHttp23==null){
alert("Your browser does not support Ajax");
return;}
var mod = "LoadString2";
var pr = document.form19.pr.value;
var en = document.form19.en.value;
var sc = document.form19.sc.value;
var id = document.form19.id.value;
var st = document.form19.st.value;
var cap = document.form19.cap.value;
var lc2 = document.form19.lc2.value;
var lc = document.form19.lc.value;
var id2 = document.form19.id2.value;
var che = "che";
var string = document.form19.string.value;

var url="inserthea.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&che="+che+"&string="+string+"&mod="+mod;

xmlHttp23.onreadystatechange=function(){ 
if (xmlHttp23.readyState==4){ 
Sat23=xmlHttp23.responseText;
DAB23("AllString2").innerHTML=Sat23


}else if(xmlHttp23.readyState==3){
DAB23("QueryRespLoader").innerHTML="<img src='Themes/loader.gif' />Loading...";
}}
xmlHttp23.open("GET",url,true);	
xmlHttp23.send(null);

}


