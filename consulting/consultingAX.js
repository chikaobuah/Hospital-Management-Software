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

var mod = "AddButton";

var url="insertbutton.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&theid="+theid+"&mod="+mod;


xmlHttpxy.onreadystatechange=function(){ 
if (xmlHttpxy.readyState==4){ 
addbt=xmlHttpxy.responseText;
if (addbt!= "1"){
	alert(addbt)
	} else
	{
		loadpage('waiting.php','info.php', 'notes.php', 'list.php','alert.php','history.php','vitals.php','service.php','time.php','waiting', 'info', 'note', 'list', 'showlist', 'history', 'vitals', 'service', 'time');
		}

}else if(xmlHttpxy.readyState==3){

}}
xmlHttpxy.open("GET",url,true);	
xmlHttpxy.send(null);

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

function loadpage(wait, info, note, list, showlist, history, vitals, service, time, waitcontainer, infocontainer, notecontainer, listcontainer, showlistcontainer, historycontainer, vitalscontainer, servicecontainer, timecontainer)
{
	
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
var history_request = false
var vitals_request = false
var service_request = false
var time_request = false



if (window.XMLHttpRequest) // if Mozilla, Safari etc
{
waiting_request =  new XMLHttpRequest()
info_request = new XMLHttpRequest()
note_request = new XMLHttpRequest()
list_request = new XMLHttpRequest()
showlist_request = new XMLHttpRequest()
history_request = new XMLHttpRequest()
vitals_request = new XMLHttpRequest()
service_request = new XMLHttpRequest()
time_request = new XMLHttpRequest()
}

else if (window.ActiveXObject){ // if IE
try {
waiting_request =  new ActiveXObject("Msxml2.XMLHTTP")
info_request = new ActiveXObject("Msxml2.XMLHTTP")
note_request = new ActiveXObject("Msxml2.XMLHTTP")
list_request = new ActiveXObject("Msxml2.XMLHTTP")
showlist_request = new ActiveXObject("Msxml2.XMLHTTP")
history_request = new ActiveXObject("Msxml2.XMLHTTP")
vitals_request = new ActiveXObject("Msxml2.XMLHTTP")
service_request = new ActiveXObject("Msxml2.XMLHTTP")
time_request = new ActiveXObject("Msxml2.XMLHTTP")

} 
catch (e){
try{
waiting_request =  new ActiveXObject("Msxml2.XMLHTTP")
info_request = new ActiveXObject("Msxml2.XMLHTTP")
note_request = new ActiveXObject("Msxml2.XMLHTTP")
list_request = new ActiveXObject("Msxml2.XMLHTTP")
showlist_request = new ActiveXObject("Msxml2.XMLHTTP")
history_request = new ActiveXObject("Msxml2.XMLHTTP")
vitals_request = new ActiveXObject("Msxml2.XMLHTTP")
service_request = new ActiveXObject("Msxml2.XMLHTTP")
time_request = new ActiveXObject("Msxml2.XMLHTTP")
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
loadtime(time_request, servicecontainer)
}
time=time+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
time_request.open('GET', time, true)
time_request.send(null)

function loadtime(time_request, timecontainer){
if (time_request.readyState == 4 && (time_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(timecontainer).innerHTML=time_request.responseText
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
LoadInvestigation(pr, en, sc, cap, lc2, lc, st, id, id2,3);
LoadAllergy(pr, en, sc, cap, lc2, lc, st, id, id2,7)
}
slshowlist2=slshowlist2+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2;
slshowlist2_request.open('GET', slshowlist2, true)
slshowlist2_request.send(null)

function slloadshowlist2(slshowlist2_request, slshowlistcontainer2){
if (slshowlist2_request.readyState == 4 && (slshowlist2_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(slshowlistcontainer2).innerHTML=slshowlist2_request.responseText
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
//DAB("QueryRespLoader").innerHTML="<img src='../common/Themes/loader.gif' />Loading...";
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
//DAB("QueryRespLoader").innerHTML="<img src='../common/Themes/loader.gif' />Loading...";
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
//DAB("QueryRespLoader").innerHTML="<img src='../common/Themes/loader.gif' />Loading...";
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
var dia = document.form11.dia.value;

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
//DAB("QueryRespLoader").innerHTML="<img src='../common/Themes/loader.gif' />Loading...";
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
var procedure_FK = document.form14.procedure_FK.value;
var provider = document.form14.provider.value;
var appointment = document.form14.appointment.value;
var request = document.form14.request.value;

var mod = "AddInvestigation";

var url="insertinv.php";
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc2="+lc2+"&lc="+lc+"&id2="+id2+"&procedure_FK="+procedure_FK+"&provider="+provider+"&appointment="+appointment+"&request="+request+"&mod="+mod;


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
//DAB("QueryRespLoader").innerHTML="<img src='../common/Themes/loader.gif' />Loading...";
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
//DAB("QueryRespLoader").innerHTML="<img src='../common/Themes/loader.gif' />Loading...";
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
url=url+"?pr="+pr+"&en="+en+"&sc="+sc+"&id="+id+"&st="+st+"&cap="+cap+"&lc="+lc+"&id2="+id2+"&drug_FK="+drug_FK+"&che="+che+"&allergy_FK"+allergy_FK+"&alg"+alg+"&mod="+mod;


xmlHttp5.onreadystatechange=function(){ 
if (xmlHttp5.readyState==4){ 
addall=xmlHttp5.responseText;
if (addall != 1){
	LoadAllergy(pr, en, sc, cap, lc2, lc, st, id, id2, 7);
	alert("Error Writting This entry")
	} else
	{
		LoadAllergy(pr, en, sc, cap, lc2, lc, st, id, id2, 7);
		}


}else if(xmlHttp5.readyState==3){

}}
xmlHttp5.open("GET",url,true);	
xmlHttp5.send(null);

}




