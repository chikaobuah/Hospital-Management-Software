
 
 
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
         XMLHttpRequestObject.open("GET", dataSource); 
		 XMLHttpRequestObject.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) { 
                document.getElementById("plan").innerHTML = XMLHttpRequestObject.responseText; 
                delete XMLHttpRequestObject;
                XMLHttpRequestObject = null;
            } 
          } 

          XMLHttpRequestObject.send(null); 
        }
			
		//for 2nd div
		 if(XMLHttpRequestObject1) {
         XMLHttpRequestObject1.open("GET", dataSource1); 
		 XMLHttpRequestObject1.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject1.readyState == 4 && XMLHttpRequestObject1.status == 200) { 
                document.getElementById("scheme").innerHTML = XMLHttpRequestObject1.responseText; 
                delete XMLHttpRequestObject1;
                XMLHttpRequestObject1 = null;
            } 
          } 

          XMLHttpRequestObject1.send(null); 
        }
		
		
	
			//for 3nd div
		 if(XMLHttpRequestObject2) {
         XMLHttpRequestObject2.open("GET", dataSource2); 
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
         XMLHttpRequestObject3.open("GET", dataSource3); 
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
         XMLHttpRequestObject4.open("GET", dataSource4); 
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
         XMLHttpRequestObject5.open("GET", dataSource5); 
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
         XMLHttpRequestObject6.open("GET", dataSource6); 
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
         XMLHttpRequestObject7.open("GET", dataSource7); 
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
         XMLHttpRequestObject8.open("GET", dataSource8); 
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
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	   function getplan(dataSourceplan,dataSourceplan1,dataSourceplan2)
      { 
        var XMLHttpRequestObjectp = false; 
		var XMLHttpRequestObjectp1 = false; 
		var XMLHttpRequestObjectp2 = false; 
		
	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObjectp = new XMLHttpRequest();
		  XMLHttpRequestObjectp1 = new XMLHttpRequest();
		  XMLHttpRequestObjectp2 = new XMLHttpRequest();
		 
        } else if (window.ActiveXObject) {
          XMLHttpRequestObjectp = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObjectp1 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObjectp2 = new ActiveXObject("Microsoft.XMLHTTP");
		
        }
		
		
		//for 1st div

        if(XMLHttpRequestObjectp) {
         XMLHttpRequestObjectp.open("GET", dataSourceplan); 
		 XMLHttpRequestObjectp.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectp.readyState == 4 && XMLHttpRequestObjectp.status == 200) { 
                document.getElementById("scheme").innerHTML = XMLHttpRequestObjectp.responseText; 
                delete XMLHttpRequestObjectp;
                XMLHttpRequestObjectp = null;
            } 
          } 

          XMLHttpRequestObjectp.send(null); 
        }
		
		
		
			//for 2nd div

        if(XMLHttpRequestObjectp1) {
         XMLHttpRequestObjectp1.open("GET", dataSourceplan1); 
		 XMLHttpRequestObjectp1.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectp1.readyState == 4 && XMLHttpRequestObjectp1.status == 200) { 
                document.getElementById("service").innerHTML = XMLHttpRequestObjectp1.responseText; 
                delete XMLHttpRequestObjectp1;
                XMLHttpRequestObjectp1 = null;
            } 
          } 

          XMLHttpRequestObjectp1.send(null); 
        }
		
		
		
		
		
		
				//for 3rd div

        if(XMLHttpRequestObjectp2) {
         XMLHttpRequestObjectp2.open("GET", dataSourceplan2); 
		 XMLHttpRequestObjectp2.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectp2.readyState == 4 && XMLHttpRequestObjectp2.status == 200) { 
                document.getElementById("billboard").innerHTML = XMLHttpRequestObjectp2.responseText; 
                delete XMLHttpRequestObjectp2;
                XMLHttpRequestObjectp2 = null;
            } 
          } 

          XMLHttpRequestObjectp2.send(null); 
        }
		
		
      }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  function getcounter(dataSourceplanct)
      { 
        var XMLHttpRequestObjectct = false; 
	 
		
	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObjectct = new XMLHttpRequest();

		 
        } else if (window.ActiveXObject) {
          XMLHttpRequestObjectct = new ActiveXObject("Microsoft.XMLHTTP");
		
		
        }
		
		
		//for 1st div

        if(XMLHttpRequestObjectct) {
         XMLHttpRequestObjectct.open("GET", dataSourceplanct); 
		 XMLHttpRequestObjectct.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectct.readyState == 4 && XMLHttpRequestObjectct.status == 200) { 
                document.getElementById("prceedbut").innerHTML = XMLHttpRequestObjectct.responseText; 
                delete XMLHttpRequestObjectct;
                XMLHttpRequestObjectct = null;
            } 
          } 

          XMLHttpRequestObjectct.send(null); 
        }
		
		
		
      }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  function showHint(str)
{
	
	if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
  			xmlhttp=new XMLHttpRequest();
			xmlhttp1=new XMLHttpRequest();
  		}
			else
  		{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
  		}
  
  if(xmlhttp) {
	xmlhttp.onreadystatechange=function()
  		{
 		if (xmlhttp.readyState==4 && xmlhttp.status==200)
    		{
    			document.getElementById("d1").innerHTML=xmlhttp.responseText;
    		}
	
  		}
  
	xmlhttp.open("GET","gethint.php?q="+str,true);//Send the request off to a file on the server
	xmlhttp.send(null);
	
  }
	
	
	
	
	    if(xmlhttp1) {
         xmlhttp1.open("GET", "gethint1.php?q="+str,true); 
		 xmlhttp1.onreadystatechange = function() 
          { 
            if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) { 
                document.getElementById("d2").innerHTML = xmlhttp1.responseText; 
                delete xmlhttp1;
                xmlhttp1 = null;
            } 
          } 

          xmlhttp1.send(null); 
        }
		

}


























	  

	  
	  
	  
	  
	  
	  
	  
	  
	  
	  function getbill2(bill2)
      { 
        var XMLHttpRequestObjectbil2 = false; 
	  
		
	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObjectbill2 = new XMLHttpRequest();

		 
        } else if (window.ActiveXObject) {
          XMLHttpRequestObjectbill2 = new ActiveXObject("Microsoft.XMLHTTP");
	
		
        }
		
		
		//for 1st div

        if(XMLHttpRequestObjectbill2) {
         XMLHttpRequestObjectbill2.open("GET", bill2); 
		 XMLHttpRequestObjectbill2.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectbill2.readyState == 4 && XMLHttpRequestObjectbill2.status == 200) { 
                document.getElementById("billboard2").innerHTML = XMLHttpRequestObjectbill2.responseText; 
                delete XMLHttpRequestObjectbill2;
                XMLHttpRequestObjectbill2= null;
            } 
          } 

          XMLHttpRequestObjectbill2.send(null); 
        }
		
		
	      }
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
function getvisit(dataSourcev,dataSourcev1,dataSourcev2)
 
      { 
/*
var en = document.form1.en.value;
var vi = document.form1.vi.value;
var creator = document.form1.creator.value;
var vitals_fk = document.form1.vitals_fk.value;
var reading = document.form1.reading.value;
dataSourcev=dataSourcev+"?en="+en+"&vi="+vi+"&creator="+creator+"&vitals_fk="+vitals_fk+"&reading="+reading; */
	
		  var XMLHttpRequestObjectv = false;
		  var XMLHttpRequestObjectv1 = false; 
		  var XMLHttpRequestObjectv2 = false; 
		
	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObjectv = new XMLHttpRequest();
		  XMLHttpRequestObjectv1 = new XMLHttpRequest();
		  XMLHttpRequestObjectv2 = new XMLHttpRequest();
	
        } else if (window.ActiveXObject) {
          XMLHttpRequestObjectv = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObjectv1 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObjectv2 = new ActiveXObject("Microsoft.XMLHTTP");
	
        }
		
		
		//for 1st div

        if(XMLHttpRequestObjectv) {
         XMLHttpRequestObjectv.open("GET", dataSourcev); 
		 XMLHttpRequestObjectv.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectv.readyState == 4 && XMLHttpRequestObjectv.status == 200) { 
                document.getElementById("prceedbut").innerHTML = XMLHttpRequestObjectv.responseText; 
                delete XMLHttpRequestObjectv;
                XMLHttpRequestObjectv = null;
            } 
          } 

          XMLHttpRequestObjectv.send(null); 
        }
		
		
		
			//for 2nd div

        if(XMLHttpRequestObjectv1) {
         XMLHttpRequestObjectv1.open("GET", dataSourcev1); 
		 XMLHttpRequestObjectv1.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectv1.readyState == 4 && XMLHttpRequestObjectv1.status == 200) { 
                document.getElementById("d1").innerHTML = XMLHttpRequestObjectv1.responseText; 
                delete XMLHttpRequestObjectv1;
                XMLHttpRequestObjectv1 = null;
            } 
          } 

          XMLHttpRequestObjectv1.send(null); 
        }
		
		
			//for 3rd div

        if(XMLHttpRequestObjectv) {
         XMLHttpRequestObjectv2.open("GET", dataSourcev2); 
		 XMLHttpRequestObjectv2.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectv2.readyState == 4 && XMLHttpRequestObjectv2.status == 200) { 
                document.getElementById("d2").innerHTML = XMLHttpRequestObjectv2.responseText; 
                delete XMLHttpRequestObjectv2;
                XMLHttpRequestObjectv2 = null;
            } 
          } 

          XMLHttpRequestObjectv2.send(null); 
        }
	
      }
	  
	  
	  
	  