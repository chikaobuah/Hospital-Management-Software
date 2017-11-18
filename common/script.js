function getHTTPObject() {
  var xmlhttp;
 
  if(window.XMLHttpRequest){
    xmlhttp = new XMLHttpRequest();
  }
  else if (window.ActiveXObject){
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    if (!xmlhttp){
        xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
    
}
  return xmlhttp;

  
}
var http = getHTTPObject(); // We create the HTTP Object

/*
	Funtion Name=requestInfo 
	Param = url >> Url to call : id = Passing div id for multiple use ~ as a seprator for eg. div1~div2 :
	redirectPage >> if you like to redirect to other page once the event success then 
	the response text = 1 and the redirectPage not left empty
*/

    function requestInfo(url,id,redirectPage) {      
		var temp=new Array();
			http.open("GET", url, true);
			http.onreadystatechange = function() {
				if (http.readyState == 4) {
				  if(http.status==200) {
			  		var results=http.responseText;
					if(redirectPage=="" || results!="1") {
						
						var temp=id.split("~"); // To display on multiple div 
						//alert(temp.length);
						var r=results.split("~"); // To display multiple data into the div 
						//alert(temp.length);
						if(temp.length>1) {
							for(i=0;i<temp.length;i++) {	
								alert(temp[i]);
								document.getElementById(temp[i]).innerHTML=r[i];
							}
						} else {
							document.getElementById(id).innerHTML = results;
						}	
					} else {
						//alert(results);
						
						window.location.href=redirectPage;			
					}
				  } 
  				}
			};
			http.send(null);
       }

function getState(codeId)
{
   var strURL="statecall.php?countrycode="+codeId;
   var req = getXMLHTTP();
   if (req)
   {
     req.onreadystatechange = function()
     {
      if (req.readyState == 4)
      {
    // only if "OK"
    if (req.status == 200)
         {
       document.getElementById('statediv').innerHTML=req.responseText;
    } else {
         alert("There was a problem while using XMLHTTP:\n" + req.statusText);
    }
       }
      }
   req.open("GET", strURL, true);
   req.send(null);
   }
}

function NewrequestInfo(url,id) {      
		var temp=new Array();
			http.open("GET", url, true);
			http.onreadystatechange = function() {
				if (http.readyState == 4) {
				  if(http.status==200) {
			  		var results=http.responseText;
					if(redirectPage=="" || results!="1") {
						
						var temp=id.split("~"); // To display on multiple div 
						//alert(temp.length);
						var r=results.split("~"); // To display multiple data into the div 
						//alert(temp.length);
						if(temp.length>1) {
							for(i=0;i<temp.length;i++) {	
								alert(temp[i]);
								document.getElementById(temp[i]).innerHTML=r[i];
							}
						} else {
							document.getElementById(id).innerHTML = results;
						}	
					} else {
						//alert(results);
						//window.location.href=redirectPage;			
					}
				  } 
  				}
			};
			http.send(null);
       }

/*
	Function Name= emptyValidation
	Desc = This function is used to validation for the empty field 
	Param fieldList = This arguments set as a string varialble. you just need to supply the textbox name
	if the textbox is multiple then supply with ~ separator for eg. username~password
*/
function emptyValidation(fieldList) {
		
		var field=new Array();
		field=fieldList.split("~");
		var counter=0;
		for(i=0;i<field.length;i++) {
			if(document.getElementById(field[i]).value=="") {
				document.getElementById(field[i]).style.backgroundColor="#FF0000";
				counter++;
			} else {
				document.getElementById(field[i]).style.backgroundColor="#FFFFFF";	
			}
		}
		if(counter>0) {
				alert("The Field mark as red could not left empty");
				return false;
				
		}  else {
			return true;
		}
		
}

function init_table() {
		requestInfo('showTable.php?mode=list','showTable','');
	}
	
	function save_data() {
			var id=document.getElementById("id").value;
			var username=document.getElementById("username").value;
			var password=document.getElementById("password").value;
			var checkValidation=emptyValidation('id~username~password');
	
		if(checkValidation==true) {
			requestInfo('showTable.php?mode=save_new&id='+id+'&username='+username+'&password='+password,'showTable','');
		} 
	}
	
	function update_data() {
			var prev_id=document.getElementById("prev_id").value;
			var id=document.getElementById("id").value;
			var username=document.getElementById("username").value;
			var password=document.getElementById("password").value;
			var checkValidation=emptyValidation('id~username~password');
	
		if(checkValidation==true) {
			requestInfo('showTable.php?mode=update_data&id='+id+'&username='+username+'&password='+password+'&prev_id='+prev_id,'showTable','');
		} 
	}
	
	
function confirmLink(theLink)
{
   
    var is_confirmed = confirm('Are you sure to delete this record?\n\nThis will permanently delete the Record!');
    if (is_confirmed) {
        theLink.href += '';
    }

    return is_confirmed;
}