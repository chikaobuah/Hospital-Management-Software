
 
 
 function getData(dataSource,dataSource1,dataSource2,dataSource3,dataSource4,dataSource5,dataSource6,dataSource7,dataSource8)
      { 
        var XMLHttpRequestObject = false; 
		
	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObject = new XMLHttpRequest();
		 
        } else if (window.ActiveXObject) {
          XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
		 
        }
		
		
		//for 1st div

        if(XMLHttpRequestObject) {
         XMLHttpRequestObject.open("POST", dataSource); 
		 XMLHttpRequestObject.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) { 
                document.getElementById("apDiv1").innerHTML = XMLHttpRequestObject.responseText; 
                delete XMLHttpRequestObject;
                XMLHttpRequestObject = null;
            } 
          } 

          XMLHttpRequestObject.send(null); 
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
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	    
 
 
 function subc(dataSourcesubc)
      { 
        var XMLHttpRequestObjectsubc = false; 
		

	
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