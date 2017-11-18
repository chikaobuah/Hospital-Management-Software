
 
 
 function getData(dataSource,dataSource1,dataSource2,dataSource3,dataSource4,dataSource5,dataSource6,dataSource7,dataSource8)
      { 
        var XMLHttpRequestObject = false; 
		var XMLHttpRequestObject1 = false; 
		var XMLHttpRequestObject2 = false; 
		var XMLHttpRequestObject3 = false; 
		var XMLHttpRequestObject4 = false; 
		var XMLHttpRequestObject5 = false; 
		var XMLHttpRequestObject6 = false;
		var XMLHttpRequestObject7 = false;
		var XMLHttpRequestObject8 = false;
	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObject = new XMLHttpRequest();
		  XMLHttpRequestObject1 = new XMLHttpRequest();
		  XMLHttpRequestObject2 = new XMLHttpRequest();
		  XMLHttpRequestObject3 = new XMLHttpRequest();
		  XMLHttpRequestObject4 = new XMLHttpRequest();
		  XMLHttpRequestObject5 = new XMLHttpRequest();
		  XMLHttpRequestObject6 = new XMLHttpRequest();
		  XMLHttpRequestObject7 = new XMLHttpRequest();
		  XMLHttpRequestObject8 = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
          XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject1 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject2 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject3 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject4 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject5 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject6 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject7 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject8 = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
		
		//for 1st div

        if(XMLHttpRequestObject) {
         XMLHttpRequestObject.open("POST", dataSource); 
		 XMLHttpRequestObject.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) { 
                document.getElementById("Licensehqlicensee").innerHTML = XMLHttpRequestObject.responseText; 
                delete XMLHttpRequestObject;
                XMLHttpRequestObject = null;
            } 
          } 

          XMLHttpRequestObject.send(null); 
        }
			
		//for 2nd div
		 if(XMLHttpRequestObject1) {
         XMLHttpRequestObject1.open("POST", dataSource1); 
		 XMLHttpRequestObject1.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject1.readyState == 4 && XMLHttpRequestObject1.status == 200) { 
                document.getElementById("subscrb").innerHTML = XMLHttpRequestObject1.responseText; 
                delete XMLHttpRequestObject1;
                XMLHttpRequestObject1 = null;
            } 
          } 

          XMLHttpRequestObject1.send(null); 
        }
		
		
	
			//for 3nd div
		 if(XMLHttpRequestObject2) {
         XMLHttpRequestObject2.open("POST", dataSource2); 
		 XMLHttpRequestObject2.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject2.readyState == 4 && XMLHttpRequestObject2.status == 200) { 
                document.getElementById("picture").innerHTML = XMLHttpRequestObject2.responseText; 
                delete XMLHttpRequestObject2;
                XMLHttpRequestObject2 = null;
            } 
          } 

          XMLHttpRequestObject2.send(null); 
        }
		
		
		
		
		
			//for 4th div
		 if(XMLHttpRequestObject3) {
         XMLHttpRequestObject3.open("POST", dataSource3); 
		 XMLHttpRequestObject3.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject3.readyState == 4 && XMLHttpRequestObject3.status == 200) { 
                document.getElementById("billboard").innerHTML = XMLHttpRequestObject3.responseText; 
                delete XMLHttpRequestObject3;
                XMLHttpRequestObject3 = null;
            } 
          } 

          XMLHttpRequestObject3.send(null); 
        }
		
		
		
		
		
			
			//for 5th div
		 if(XMLHttpRequestObject4) {
         XMLHttpRequestObject4.open("POST", dataSource4); 
		 XMLHttpRequestObject4.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject4.readyState == 4 && XMLHttpRequestObject4.status == 200) { 
                document.getElementById("service").innerHTML = XMLHttpRequestObject4.responseText; 
                delete XMLHttpRequestObject4;
                XMLHttpRequestObject4 = null;
            } 
          } 

          XMLHttpRequestObject4.send(null); 
        }
		
		
				
			//for 6th div
		 if(XMLHttpRequestObject5) {
         XMLHttpRequestObject5.open("POST", dataSource5); 
		 XMLHttpRequestObject5.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject5.readyState == 4 && XMLHttpRequestObject5.status == 200) { 
                document.getElementById("clinic").innerHTML = XMLHttpRequestObject5.responseText; 
                delete XMLHttpRequestObject5;
                XMLHttpRequestObject5 = null;
            } 
          } 

          XMLHttpRequestObject5.send(null); 
        }
		
		
		
		
				
			//for 7th div
		 if(XMLHttpRequestObject6) {
         XMLHttpRequestObject6.open("POST", dataSource6); 
		 XMLHttpRequestObject6.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject6.readyState == 4 && XMLHttpRequestObject6.status == 200) { 
                document.getElementById("prceedbut").innerHTML = XMLHttpRequestObject6.responseText; 
                delete XMLHttpRequestObject6;
                XMLHttpRequestObject6 = null;
            } 
          } 

          XMLHttpRequestObject6.send(null); 
        }
		
		
		
		
				//for 8th div
		 if(XMLHttpRequestObject7) {
         XMLHttpRequestObject7.open("POST", dataSource7); 
		 XMLHttpRequestObject7.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject7.readyState == 4 && XMLHttpRequestObject7.status == 200) { 
                document.getElementById("billboard2").innerHTML = XMLHttpRequestObject7.responseText; 
                delete XMLHttpRequestObject7;
                XMLHttpRequestObject7 = null;
            } 
          } 

          XMLHttpRequestObject7.send(null); 
        }
		
		
		
		
		
					//for 9th div
		 if(XMLHttpRequestObject8) {
         XMLHttpRequestObject8.open("POST", dataSource8); 
		 XMLHttpRequestObject8.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject8.readyState == 4 && XMLHttpRequestObject8.status == 200) { 
                document.getElementById("ticket").innerHTML = XMLHttpRequestObject8.responseText; 
                delete XMLHttpRequestObject8;
                XMLHttpRequestObject8 = null;
            } 
          } 

          XMLHttpRequestObject8.send(null); 
        }
		
		
		
      }
	  
	  
	  
	  
	  
	  
	  
	  
	  
  
 
 
 function branchf(dataSourcebf)
      { 
        var XMLHttpRequestObjectbf = false; 
		

	
	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObjectbf = new XMLHttpRequest();

	
        } else if (window.ActiveXObject) {
          XMLHttpRequestObjectbf = new ActiveXObject("Microsoft.XMLHTTP");
		 
		
        }
		
		
		//for 1st div

        if(XMLHttpRequestObject) {
         XMLHttpRequestObjectbf.open("POST", dataSourcebf); 
		 XMLHttpRequestObjectbf.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectbf.readyState == 4 && XMLHttpRequestObjectbf.status == 200) { 
                document.getElementById("cont").innerHTML = XMLHttpRequestObjectbf.responseText; 
                delete XMLHttpRequestObjectbf;
                XMLHttpRequestObjectbf = null;
            } 
          } 

          XMLHttpRequestObjectbf.send(null); 
        }
			
      }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
 /*	  
	  	  
	  
	  
	  
	    

 
 function subc(dataSourcesubc)
      { 
        var XMLHttpRequestObjectsubc = false; 
	//var lic = document.form2.lic.value;
	//var Expire = document.form2.Expire.value;
	//var length = document.form2.length.value;

	
	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObjectsubc = new XMLHttpRequest();

	
        } else if (window.ActiveXObject) {
          XMLHttpRequestObjectsubc = new ActiveXObject("Microsoft.XMLHTTP");
		 		
        }
		
		
		//for 1st div

        if(XMLHttpRequestObjectsubc) {
         XMLHttpRequestObjectsubc.open("POST", dataSourcesubc); 
		 XMLHttpRequestObjectsubc.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectsubc.readyState == 4 && XMLHttpRequestObjectsubc.status == 200) { 
                document.getElementById("subscrb").innerHTML = XMLHttpRequestObjectsubc.responseText; 
                delete XMLHttpRequestObjectsubc;
                XMLHttpRequestObjectsubc = null;
            } 
          } 

          XMLHttpRequestObjectsubc.send(null); 
        }
			
      }
	
	  
   */	  	  

	  
	  
	  
	  
	  

function subc(dataSourcesubc)
{
	var XMLHttpRequestObjectsubc = false; 
	var lic = document.form1.lic.value;
	var Expire = document.form1.Expire.value;
	var length = document.form1.length.value;


 if (window.XMLHttpRequest) { 
XMLHttpRequestObjectsubc = new XMLHttpRequest();
 
 } else if (window.ActiveXObject){ 
XMLHttpRequestObjectsubc = new ActiveXObject("Microsoft.XMLHTTP");

}


//for 1st div
XMLHttpRequestObjectsubc.onreadystatechange=function(){
if (XMLHttpRequestObjectsubc.readyState == 4 && XMLHttpRequestObjectsubc.status==200 )
document.getElementById("subscrb").innerHTML=XMLHttpRequestObjectsubc.responseText
}

//slshowlist2=slshowlist2+"?en="+en+"&ln="+ln;

dataSourcesubc=dataSourcesubc+"?lic="+lic+"&Expire="+Expire+"&length="+length;
XMLHttpRequestObjectsubc.open('GET', dataSourcesubc);
XMLHttpRequestObjectsubc.send(null);

}  
	  	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  

	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	

function addlicense(slshowlist2)
{
	var XMLHttpRequestObjectva = false;
	
	var ln = document.form2.ln.value;
	var sn = document.form2.sn.value;
	var lic = document.form2.lic.value;
	var created = document.form2.created.value;
	var creator = document.form2.creator.value;
	var nhis = document.form2.nhis.value;
	var nhisdate = document.form2.nhisdate.value;
	var lcost = document.form2.lcost.value;
	var lkey = document.form2.lkey.value;
	var contact = document.form2.contact.value;
	var jobtitle = document.form2.jobtitle.value;
	var mphone = document.form2.mphone.value;
	var email = document.form2.email.value;
	var city = document.form2.city.value;
	
	var cac = document.form2.cac.value;
	var nhmis = document.form2.nhmis.value;
	var bphone = document.form2.bphone.value;
	var country = document.form2.country.value;
	var state = document.form2.state.value;
	var lga = document.form2.lga.value;
	var postcode = document.form2.postcode.value;
	var biz = document.form2.biz.value;
	var addr = document.form2.addr.value;
	
	var webpage = document.form2.webpage.value;
	var CAC_reg_no = document.form2.CAC_reg_no.value;
	var Statement = document.form2.Statement.value;
	var NHMIS_HF_Code = document.form2.NHMIS_HF_Code.value;
	
	
	
	
	
	
 if (window.XMLHttpRequest) { 
XMLHttpRequestObjectva = new XMLHttpRequest();
 
 } else if (window.ActiveXObject){ 
XMLHttpRequestObjectva = new ActiveXObject("Microsoft.XMLHTTP");

}


//for 1st div
XMLHttpRequestObjectva.onreadystatechange=function(){
if (XMLHttpRequestObjectva.readyState == 4 && XMLHttpRequestObjectva.status==200 )
document.getElementById("Licensehqlicensee").innerHTML=XMLHttpRequestObjectva.responseText
}

//slshowlist2=slshowlist2+"?en="+en+"&ln="+ln;
slshowlist2=slshowlist2+"?ln="+ln+"&sn="+sn+"&lic="+lic+"&created="+created+"&creator="+creator+"&nhis="+nhis+"&nhisdate="+nhisdate+"&lcost="+lcost+"&lkey="+lkey+"&contact="+contact+"&jobtitle="+jobtitle+"&mphone="+mphone+"&email="+email+"&city="+city+"&webpage="+webpage+"&bphone="+bphone+"&addr="+addr+"&country="+country+"&state="+state+"&lga="+lga+"&postcode="+postcode+"&biz="+biz+"&CAC_reg_no="+CAC_reg_no+"&Statement="+Statement+"&NHMIS_HF_Code="+NHMIS_HF_Code;
XMLHttpRequestObjectva.open('GET', slshowlist2);
XMLHttpRequestObjectva.send(null);

}  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	

function addlicensehq(slshowlist2hq)
{
	var XMLHttpRequestObjectlhq = false;
	
var ln = document.form2.ln.value;
var sn = document.form2.sn.value;
var nhis = document.form2.nhis.value;
var nhisdate = document.form2.nhisdate.value;	
var lcost = document.form2.lcost.value;
var lkey = document.form2.lkey.value;
var contact = document.form2.contact.value;
var jobtitle = document.form2.jobtitle.value;
var mphone = document.form2.mphone.value;
var bphone = document.form2.bphone.value;
var email = document.form2.email.value;
var addr = document.form2.addr.value;
var country = document.form2.country.value;
var state = document.form2.state.value;
var lga = document.form2.lga.value;
var postcode = document.form2.postcode.value;
var city = document.form2.city.value;	

var biz = document.form2.biz.value;
var webpage = document.form2.webpage.value;
var CAC_reg_no = document.form2.CAC_reg_no.value;
var Statement = document.form2.Statement.value;
var NHMIS_HF_Code = document.form2.NHMIS_HF_Code.value;
var lic = document.form2.lic.value;





 if (window.XMLHttpRequest) { 
XMLHttpRequestObjectlhq = new XMLHttpRequest();
 
 } else if (window.ActiveXObject){ 
XMLHttpRequestObjectlhq = new ActiveXObject("Microsoft.XMLHTTP");

}


//for 1st div
XMLHttpRequestObjectlhq.onreadystatechange=function(){
if (XMLHttpRequestObjectlhq.readyState == 4 && XMLHttpRequestObjectlhq.status==200 )
document.getElementById("Licensehqlicensee").innerHTML=XMLHttpRequestObjectlhq.responseText
}


//slshowlist2hq=slshowlist2hq+"?ln="+ln+"&sn="+sn+"&lic="+lic+"&created="+created+"&creator="+creator+"&nhis="+nhis+"&nhisdate="+nhisdate+"&lcost="+lcost+"&lkey="+lkey+"&contact="+contact+"&jobtitle="+jobtitle+"&mphone="+mphone+"&email="+email+"&city="+city+"&webpage="+webpage+"&bphone="+bphone+"&addr="+addr+"&country="+country+"&state="+state+"&lga="+lga+"&postcode="+postcode+"&biz="+biz+"&CAC_reg_no="+CAC_reg_no+"&Statement="+Statement+"&NHMIS_HF_Code="+NHMIS_HF_Code;


slshowlist2hq=slshowlist2hq+"?ln="+ln+"&sn="+sn+"&nhis="+nhis+"&nhisdate="+nhisdate+"&lcost="+lcost+"&lkey="+lkey+"&contact="+contact+"&jobtitle="+jobtitle+"&mphone="+mphone+"&email="+email+"&bphone="+bphone+"&addr="+addr+"&country="+country+"&state="+state+"&lga="+lga+"&postcode="+postcode+"&city="+city+"&biz="+biz+"&CAC_reg_no="+CAC_reg_no+"&Statement="+Statement+"&NHMIS_HF_Code="+NHMIS_HF_Code+"&lic="+lic+"&webpage="+webpage;

XMLHttpRequestObjectlhq.open('GET', slshowlist2hq);
XMLHttpRequestObjectlhq.send(null);

}  
		  
	  
	  
	  