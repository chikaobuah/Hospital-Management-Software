
 
 
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
                document.getElementById("user").innerHTML = XMLHttpRequestObject.responseText; 
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
                document.getElementById("license").innerHTML = XMLHttpRequestObject1.responseText; 
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
                document.getElementById("specialty").innerHTML = XMLHttpRequestObject2.responseText; 
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
                document.getElementById("counter").innerHTML = XMLHttpRequestObject3.responseText; 
                delete XMLHttpRequestObject3;
                XMLHttpRequestObject3 = null;
            } 
          } 

          XMLHttpRequestObject3.send(null); 
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


		




		  
function get3(dataSourcerlu,dataSourcerlu1,dataSourcerlu2)
 
      { 
var XMLHttpRequestObjectu = false;
var XMLHttpRequestObjectu1 = false;
var XMLHttpRequestObjectu2 = false;


	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObjectu = new XMLHttpRequest();
		  XMLHttpRequestObjectu1 = new XMLHttpRequest();
		  XMLHttpRequestObjectu2 = new XMLHttpRequest();
	
        } else if (window.ActiveXObject) {
          XMLHttpRequestObjectu = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObjectu1 = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObjectu2 = new ActiveXObject("Microsoft.XMLHTTP");
	
        }
		
		
		//for 1st div

        if(XMLHttpRequestObjectu) {
         
		 XMLHttpRequestObjectu.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectu.readyState == 4 && XMLHttpRequestObjectu.status == 200) 
			
			{ document.getElementById("license").innerHTML = XMLHttpRequestObjectu.responseText; 
                delete XMLHttpRequestObjectu;
                XMLHttpRequestObjectu = null;      } 
          } 
           XMLHttpRequestObjectu.open("GET", dataSourcerlu); 
          XMLHttpRequestObjectu.send(null); 
        }
		
				
		//for 2nd div

        if(XMLHttpRequestObjectu1) {
         
		 XMLHttpRequestObjectu1.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectu1.readyState == 4 && XMLHttpRequestObjectu1.status == 200) 
			
			{ document.getElementById("specialty").innerHTML = XMLHttpRequestObjectu1.responseText; 
                delete XMLHttpRequestObjectu1;
                XMLHttpRequestObjectu1 = null;      } 
          } 
           XMLHttpRequestObjectu1.open("GET", dataSourcerlu1); 
          XMLHttpRequestObjectu1.send(null); 
        }
				
		//for 3rd div

        if(XMLHttpRequestObjectu2) {
         
		 XMLHttpRequestObjectu2.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectu2.readyState == 4 && XMLHttpRequestObjectu2.status == 200) 
			
			{ document.getElementById("counter").innerHTML = XMLHttpRequestObjectu2.responseText; 
                delete XMLHttpRequestObjectu2;
                XMLHttpRequestObjectu2 = null;      } 
          } 
           XMLHttpRequestObjectu2.open("GET", dataSourcerlu2); 
          XMLHttpRequestObjectu2.send(null); 
        }
		
      }
	  

	  
	  
	  
	  
	  
	  
	  
	  
function get4(dataSourcerll,dataSourcerll1)
 
      { 
var XMLHttpRequestObjectl = false;
var XMLHttpRequestObjectl1 = false;



	//creating an XMLhttp request object
        if (window.XMLHttpRequest) {
          XMLHttpRequestObjectl = new XMLHttpRequest();
		  XMLHttpRequestObjectl1 = new XMLHttpRequest();
		 
	
        } else if (window.ActiveXObject) {
          XMLHttpRequestObjectl = new ActiveXObject("Microsoft.XMLHTTP");
		  XMLHttpRequestObjectl1 = new ActiveXObject("Microsoft.XMLHTTP");
		  
	
        }
		
		
		//for 1st div

        if(XMLHttpRequestObjectl) {
         
		 XMLHttpRequestObjectl.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectl.readyState == 4 && XMLHttpRequestObjectl.status == 200) 
			
			{ document.getElementById("specialty").innerHTML = XMLHttpRequestObjectl.responseText; 
                delete XMLHttpRequestObjectl;
                XMLHttpRequestObjectl = null;      } 
          } 
           XMLHttpRequestObjectl.open("GET", dataSourcerll); 
          XMLHttpRequestObjectl.send(null); 
        }
		
				
		//for 2nd div

        if(XMLHttpRequestObjectl1) {
         
		 XMLHttpRequestObjectl1.onreadystatechange = function() 
          { 
            if (XMLHttpRequestObjectl1.readyState == 4 && XMLHttpRequestObjectl1.status == 200) 
			
			{ document.getElementById("counter").innerHTML = XMLHttpRequestObjectl1.responseText; 
                delete XMLHttpRequestObjectl1;
                XMLHttpRequestObjectl1 = null;      } 
          } 
           XMLHttpRequestObjectl1.open("GET", dataSourcerll1); 
          XMLHttpRequestObjectl1.send(null); 
        }
				
	
		
      }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  function deuser(slshowlistdu)
{
	var XMLHttpRequestdu = false;


 if (window.XMLHttpRequest) { 
XMLHttpRequestdu = new XMLHttpRequest();
 
 } else if (window.ActiveXObject){ 
XMLHttpRequestdu = new ActiveXObject("Microsoft.XMLHTTP");

}

//for 1st div
XMLHttpRequestdu.onreadystatechange=function(){

}


XMLHttpRequestdu.open('GET', slshowlistdu);
XMLHttpRequestdu.send(null);

}










	  
	  function spec(slshowlistsp)
{
	var XMLHttpRequestsp = false;


 if (window.XMLHttpRequest) { 
XMLHttpRequestsp = new XMLHttpRequest();
 
 } else if (window.ActiveXObject){ 
XMLHttpRequestsp = new ActiveXObject("Microsoft.XMLHTTP");

}

//for 1st div
XMLHttpRequestsp.onreadystatechange=function(){

}


XMLHttpRequestsp.open('GET', slshowlistsp);
XMLHttpRequestsp.send(null);

}








	  function scount(slshowlistsc)
{
	var XMLHttpRequestsc = false;


 if (window.XMLHttpRequest) { 
XMLHttpRequestsc = new XMLHttpRequest();
 
 } else if (window.ActiveXObject){ 
XMLHttpRequestsc = new ActiveXObject("Microsoft.XMLHTTP");

}

//for 1st div
XMLHttpRequestsc.onreadystatechange=function(){

}


XMLHttpRequestsc.open('GET', slshowlistsc);
XMLHttpRequestsc.send(null);

}