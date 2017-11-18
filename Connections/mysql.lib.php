<?php

class connect
{
	var $Host = C_DB_HOST;			// Hostname of our MySQL server
	var $Database = C_DB_NAME;		// Logical database name on that server
	var $User = C_DB_USER;			// Database user
	var $Password = C_DB_PASS;		// Database user's password
	var $Link_ID = 0;				// Result of mysql_connect()
	var $Query_ID = 0;				// Result of most recent mysql_query()
	var $Record	= array();			// Current mysql_fetch_array()-result
	var $Row;						// Current row number
	var $Errno = 0;					// Error state of query
	var $Error = "";

	function halt($msg)
	{
		echo("</TD></TR></TABLE><B>Database error:</B> $msg<BR>\n");
		echo("<B>MySQL error</B>: $this->Errno ($this->Error)<BR>\n");
		echo "Session halted.";
		return $this->Error;
	}

	function connect()
	{
		if($this->Link_ID == 0)
		{
			$this->Link_ID = mysql_connect($this->Host, $this->User, $this->Password);
			if (!$this->Link_ID)
			{
				$this->halt("Link_ID == false, connect failed");
			}
			$SelectResult = mysql_select_db($this->Database, $this->Link_ID);
			if(!$SelectResult)
			{
				$this->Errno = mysql_errno($this->Link_ID);
				$this->Error = mysql_error($this->Link_ID);
				$this->halt("cannot select database <I>".$this->Database."</I>");
			}
		}
	}

	function query($Query_String)
	{
		$this->connect();
		$this->Query_ID = mysql_query($Query_String,$this->Link_ID);
		$this->Row = 0;
		$this->Errno = mysql_errno();
		$this->Error = mysql_error();
		if (!$this->Query_ID)
		{
			$this->halt("Invalid SQL: ".$Query_String);
		}
		return $this->Query_ID;
	}
	
function query_fetch($fetch=0)
{
	if($fetch==0) {
		$result=@mysql_fetch_assoc($this->Query_ID);
	} else {
		$result=@mysql_fetch_array($this->Query_ID);
	}
	
	if(!is_array($result)) 
	return false;
	$this->total_field=mysql_num_fields($this->Query_ID);

	foreach($result as $key=>$val){
		$result[$key]=trim(htmlspecialchars($val));
	}
	 return $result; 
}

function query_fetch_tr($css='',$col_name='no',$update='no',$delete='no',$add='no',$not_show='no',$total_rows=0)
{
	if(!empty($not_show)) {
		$val=0;
	 } else {
		$val=1;
	 }
	// For Add

		if($add=="yes") {
			if(!empty($update))  $c=$c+1;
			if(!empty($delete)) $c=$c+1;
			$colspan=$this->num_field()+$c;
			$tr_output="<tr><td colspan='$colspan'><a href='?mode=add'> Add New Data</a> </tr> ";
		}
	
	// End of Add
	if($col_name=="yes") {
		$tr_output.="<tr>";
		for($j=$val;$j<$this->num_field();$j++) {
			$tr_output.="<th>".ucwords(strtolower($this->get_field_name($j)));
		}
		// For Update 
		if($update=="yes") {
			$addNewTD="<th>Update</th>";
		} else {
			$addNewTD="";
		}
		// End of Update
		// For Delete 
		if($delete=="yes") {
			$addDelTD="<th>Delete</th>";
		} else {
			$addDelTD="";
		}
		
		// End of Delete
		$tr_output.="$addNewTD $addDelTD </tr>";
	}
	if($total_rows==0) {
		echo  $tr_output;
	} 
	
	while($result=$this->query_fetch(1))
    {
    	
        if(is_array($result))
		{
        	if($css!="")
            {
            	$css_val="class=".$css;
            }
            $tr_output.="<tr $css_val>";
			
            for($i=$val;$i<$this->num_field();$i++)
            {
            	if($result[$i]=="")
                {
                	$result[$i]="&nbsp;";
                }
                $tr_output.="<td>".$result[$i]."</td>";
            }
			if($update=="yes") {
				$tr_output.="<td><a href='?sn=$result[0]&mode=update'>Update</a></td>";
			}
			if($delete=="yes") {
				$tr_output.="<td><a href='?sn=$result[0]&mode=delete'> Delete</a> </td>";
			}
            $tr_output.="</tr>";
        }
            echo $tr_output;
            unset($tr_output);
    }
 }


function paging($sqlPaging="",$offSet=0) {
	$sqlPaging=$sqlPaging;
	$eu = ($start - 0); 
	$limit = $offSet;                             
	$a = $eu + $limit; 
	$back = $eu - $limit; 
	$next = $eu + $limit; 
	$mainQuery=$sqlPaging." limit $eu,$limit";
	$this->query($mainQuery);
	$nume=$this->num_rows();
echo "<table align = 'right' width='500' border=0>
<tr>
<td  align='right' width='50%'>";
if($back >=0) { 
print "<a href='$page_name?start=$back'><font face='arial' size='1'> << </font></a>"; 
} 
echo " Page ";
$i=0;
$l=1;
for($i=0;$i < $nume;$i=$i+$limit){
	if($i <> $eu){
		echo " <a href='$page_name?start=$i'><font face='arial' size='1'>$l</font></a> ";
	} else { 
		echo "<font face='arial' size='1' color=red> &nbsp;$l</font>";
	}     
	$l=$l+1;
	echo "&nbsp;";
}
	if($a < $nume) { 
		print "<a href='$page_name?start=$next'><font face='arial' size='1'> >> </font></a>";
	} 
	echo "</tr></table>";

	
}

function num_field()
{
	return mysql_num_fields($this->Query_ID);
}
function get_field_name($i)
{
	return mysql_field_name($this->Query_ID,$i);
}


/*
function fetch_field()
{
	return mysql_fetch_field($this->Query_ID,2);
}
*/

function next_record()
	{
		$this->Record = mysql_fetch_array($this->Query_ID);
		$this->Row += 1;
		$this->Errno = mysql_errno();
		$this->Error = mysql_error();
		$stat = is_array($this->Record);
		if (!$stat)
		{
			mysql_free_result($this->Query_ID);
			$this->Query_ID = 0;
		}
		return $this->Record;
	}

	function num_rows()
	{
		return mysql_num_rows($this->Query_ID);
	}
	function maxRow($tablename,$field,$condition)
	{
		$sql="select max($field) from $tablename $condition";
		$this->query($sql);
		$result=@mysql_fetch_array($this->Query_ID);
		return $result[0];
	}
	function affected_rows()
	{
		return mysql_affected_rows($this->Link_ID);
	}

	function optimize($tbl_name)
	{
		$this->connect();
		$this->Query_ID = @mysql_query("OPTIMIZE TABLE $tbl_name",$this->Link_ID);
	}

	function clean_results()
	{
		if($this->Query_ID != 0) mysql_free_result($this->Query_ID);
	}

	function close()
	{
		if($this->Link_ID != 0) mysql_close($this->Link_ID);
	}
}
?>