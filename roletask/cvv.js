
 
 
 function getData(dataSource,dataSource1,dataSource2,dataSource3)
      { 
        var XMLHttpRequestObject = false; 
		var XMLHttpRequestObject1 = false; 
		var XMLHttpRequestObject2 = false; 
		var XMLHttpRequestObject3 = false; 
	
	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObject = new XMLHttpRequest();
		  XMLHttpRequestObject1 = new XMLHttpRequest();
		  XMLHttpRequestObject2 = new XMLHttpRequest();
		  XMLHttpRequestObject3 = new XMLHttpRequest();
		
        } else if (window.ActiveXObject) {
          XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject1 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject2 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObject3 = new ActiveXObject("Microsoft.XMLHTTP");
		
        }
		
		
		//for 1st div

        if(XMLHttpRequestObject) {
         XMLHttpRequestObject.open("POST", dataSource); 
		 XMLHttpRequestObject.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) { 
                document.getElementById("role").innerHTML = XMLHttpRequestObject.responseText; 
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
                document.getElementById("task").innerHTML = XMLHttpRequestObject1.responseText; 
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
		
		
				
      }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	   
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
 
 
 function gettask(dataSource,dataSource1)
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
                document.getElementById("task").innerHTML = XMLHttpRequestObject.responseText; 
                delete XMLHttpRequestObject;
                XMLHttpRequestObject = null;
            } 
          } 

          XMLHttpRequestObject.send(null); 
        }
			
      }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  		  
		  
		  
function getrole(dataSourcerl)
 
      { 
var XMLHttpRequestObjectv = false;
var en = document.form2.rolename.value;
dataSourcerl=dataSourcerl+"?en="+en;

	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObjectv = new XMLHttpRequest();
	
        } else if (window.ActiveXObject) {
          XMLHttpRequestObjectv = new ActiveXObject("Microsoft.XMLHTTP");
	
        }
		
		
		//for 1st div

        if(XMLHttpRequestObjectv) {
         
		 XMLHttpRequestObjectv.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectv.readyState == 4 && XMLHttpRequestObjectv.status == 200) 
			
			{ document.getElementById("role").innerHTML = XMLHttpRequestObjectv.responseText; 
                delete XMLHttpRequestObjectv;
                XMLHttpRequestObjectv = null;      } 
          } 
           XMLHttpRequestObjectv.open("GET", dataSourcerl); 
          XMLHttpRequestObjectv.send(null); 
        }
		
		
		
      }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  


function addrole(slshowlist2)
{
	var XMLHttpRequestObjectva = false;
	var en = document.form2.rolename.value;
	var lic = document.form2.lic.value;
	

 if (window.XMLHttpRequest) { 
XMLHttpRequestObjectva = new XMLHttpRequest();
 
 } else if (window.ActiveXObject){ 
XMLHttpRequestObjectva = new ActiveXObject("Microsoft.XMLHTTP");

}




//for 1st div
XMLHttpRequestObjectva.onreadystatechange=function(){
if (XMLHttpRequestObjectva.readyState == 4 && XMLHttpRequestObjectva.status==200 )
document.getElementById("role").innerHTML=XMLHttpRequestObjectva.responseText
}

slshowlist2=slshowlist2+"?en="+en+"&lic="+lic;
XMLHttpRequestObjectva.open('GET', slshowlist2);
XMLHttpRequestObjectva.send(null);

}


























	  
	  


function addtask(slshowlist2)
{
	var XMLHttpRequestaddtask = false;


 if (window.XMLHttpRequest) { 
XMLHttpRequestaddtask = new XMLHttpRequest();
 
 } else if (window.ActiveXObject){ 
XMLHttpRequestaddtask = new ActiveXObject("Microsoft.XMLHTTP");

}

//for 1st div
XMLHttpRequestaddtask.onreadystatechange=function(){

}


XMLHttpRequestaddtask.open('GET', slshowlist2);
XMLHttpRequestaddtask.send(null);

}


		

jQuery(function() {

jQuery('#test td').click(function(event) {
		$('#test td').each(function() {
			if($(this).is(".currentLink")) {
				$(this).removeClass("currentLink");
			}
		});
		$(this).addClass("currentLink");
	});
	
	jQuery('#test2 td').click(function(event) {
		$('#test2 td').each(function() {
			if($(this).is(".currentLink")) {
				$(this).removeClass("currentLink");
			}
		});
		$(this).addClass("currentLink");
	});
	
	
	
	
	jQuery('#test3 li').click(function(event) {
		$('#test3 li').each(function() {
			if($(this).is(".currentLink")) {
				$(this).removeClass("currentLink");
			}
		});
		$(this).addClass("currentLink");
	});
	
});	
	  