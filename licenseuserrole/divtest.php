<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Welcome to Groundswell </title>
 
    <link  href="../common/layout.css" rel="stylesheet" type="text/css"/>
<style>

 

    div#first {
        position: absolute;
        top: 0;
        left: 0;
        background-color: #ccf;
        float: left;
        width: 33.33%;
        padding: 5px;
		height:450px;
		overflow-y : auto; 
		overflow-x:hidden;
		text-align:left;
    }

    div#second {
        position: absolute;
        top: 0;
        left: 33.33%;
        background-color: #fcc;
        width: 33%;
        padding: 5px;
		height:450px;
		float: left;
		overflow-y : auto; 
		overflow-x:hidden;
		text-align:left;
		border-left:2px solid #224466 ;
		
		
		
		
		
		
    }

    div#third {
        position: absolute;
        top: 0;
        left: 66%;
        background-color: #cff;
        width: 33.33%;
        padding: 5px;
		height:450px;
		text-align:left;
		border-left:2px solid #224466 ;
    }

    </style>
</head>

<body >


<div id="header" align="right">
	
	 <img alt=""    style="width: 51;height: 17;" src="../images/interaction/bing_logo_white.png"  id="gsfx_bsrch_logo" />
    <div style=" color:#CF0; font-weight:bold">
	 
  </div>
	 
  </div>    <div id="links">
                 
   <?php   
  

	$lrolename=" Installation ";
  echo  "<ul><li class=\"selected\"><a class=\"section\" href=\"../license/license.php\">$lrolename</a>
        					<ul>
        						<li><a href=\"../license/license.php\"><b>License setup</b> </a></li>
        						<li><a href=\"../licenserole/licenserole.php\">Role Setup</a></li>
								<li><a href=\"../licenseuserrole/licenseuserrole.php\">Access control</a></li>
							</ul>
              </li>" ;		
 
echo "</ul>"
?>

            
</div>
  <div id="links-sub"> </div>

<div id="content">

<div id="first">
        <h1>1 BW Whois</h1>
        <p>
        <a href="http://whois.bw.org/">BW Whois</a> is Bill's open-source whois 
        client. Originally released in December 1999, and still in active 
        development, BW Whois has evolved into a full-featured command-line/web 
        client with rich security features, caching and database support.
        </p>
    </div>
    
    <div id="second">
        <h1>2 AMTP</h1>
        <p>
        <a href="http://amtp.bw.org">AMTP</a> (Authenticated Mail Transfer 
        Protocol) is Bill Weinman's solution to the SPAM problem. AMTP is being 
        designed as a replacement for SMTP, with security features designed to 
        reduce the impact of Unsolicited Bulk Email (UBE) and the cost of running 
        mail servers.
        </p>
    </div>
    
    <div id="third">
        <h1>3 Writing</h1>
        <p>
        Mr. Weinman has written five books, including The CGI Book and, with his
        sister Lynda, Creative HTML Design. He has contributed to other books on
        programming and web design and has written articles for various
        computer-related periodicals.
        </p>
    </div>

</div>