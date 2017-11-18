
 
 
 function getData(dataSource,dataSource1,dataSource2,dataSource3,dataSource4)
      { 
        var XMLHttpRequestObject = false; 
		var XMLHttpRequestObject1 = false; 
		var XMLHttpRequestObject2 = false; 
		var XMLHttpRequestObject3 = false; 
		var XMLHttpRequestObject4 = false;
	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObject = new XMLHttpRequest();
		  XMLHttpRequestObject1 = new XMLHttpRequest();
		  XMLHttpRequestObject2 = new XMLHttpRequest();
		  XMLHttpRequestObject3 = new XMLHttpRequest();
		  XMLHttpRequestObject4 = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
          XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject1 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject2 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject3 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject4 = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
		
		//for 1st div

        if(XMLHttpRequestObject) {
         XMLHttpRequestObject.open("GET", dataSource); 
		 XMLHttpRequestObject.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) { 
                document.getElementById("ticket").innerHTML = XMLHttpRequestObject.responseText; 
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
                document.getElementById("vitalsforenr").innerHTML = XMLHttpRequestObject3.responseText; 
                delete XMLHttpRequestObject3;
                XMLHttpRequestObject3 = null;
            } 
          } 

          XMLHttpRequestObject3.send(null); 
        }
		
		
		
		
					//for 5th div
		 if(XMLHttpRequestObject5) {
         XMLHttpRequestObject5.open("GET", dataSource4); 
		 XMLHttpRequestObject5.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject5.readyState == 4 && XMLHttpRequestObject5.status == 200) { 
                document.getElementById("billboard").innerHTML = XMLHttpRequestObject5.responseText; 
                delete XMLHttpRequestObject5;
                XMLHttpRequestObject5 = null;
            } 
          } 

          XMLHttpRequestObject5.send(null); 
        }
		
		
		
		
		
		
      }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	   function getplan(dataSource)
      { 
        var XMLHttpRequestObjectp = false; 
		
	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObjectp = new XMLHttpRequest();
		 
        } else if (window.ActiveXObject) {
          XMLHttpRequestObjectp = new ActiveXObject("Microsoft.XMLHTTP");
		
        }
		
		
		//for 1st div

        if(XMLHttpRequestObjectp) {
         XMLHttpRequestObjectp.open("GET", dataSource); 
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
		
      }
	  
	  
	  
	  
	  
	  
	  
	  	  
	 
 function getDatav(dataSourcev)
 
      { 


var en = document.form1.en.value;
var vi = document.form1.vi.value;



var creator = document.form1.creator.value;
var vitals_fk = document.form1.vitals_fk.value;
var reading = document.form1.reading.value;
	  
	
	
	
	
	

dataSourcev=dataSourcev+"?en="+en+"&vi="+vi+"&creator="+creator+"&vitals_fk="+vitals_fk+"&reading="+reading;
	
	
	
		
	
	  
	  
        var XMLHttpRequestObjectv = false; 
		
	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObjectv = new XMLHttpRequest();
	
        } else if (window.ActiveXObject) {
          XMLHttpRequestObjectv = new ActiveXObject("Microsoft.XMLHTTP");
	
        }
		
		
		//for 1st div

        if(XMLHttpRequestObjectv) {
         XMLHttpRequestObjectv.open("GET", dataSourcev); 
		 XMLHttpRequestObjectv.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectv.readyState == 4 && XMLHttpRequestObjectv.status == 200) { 
                document.getElementById("vitals").innerHTML = XMLHttpRequestObjectv.responseText; 
                delete XMLHttpRequestObjectv;
                XMLHttpRequestObjectv = null;
            } 
          } 

          XMLHttpRequestObjectv.send(null); 
        }
			

		
		
		
		
		
      }
	  
	  
	  