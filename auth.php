
<?php 
echo "<ul>";
$nor=$_SESSION["noofroles"];//no of roles
for ($nor1 = 0; $nor1 < $nor; $nor1++) {

$not4r=$_SESSION["rtn"];// the no of task for each role array
$not4r[$nor1];// the no of task assigned to role $nor1


			for ($not1 = 0; $not1 < $not4r[$nor1]; $not1++) {
				
				$rtz=$_SESSION["roletask"][$nor1][0][$not1];
				if ($pagetask==$rtz){$yes=1; break;} else{$yes=0;}// checking which of the current role's task is equal to this page target
					
				}
					
				
					if ($yes>0){
				
						echo "<li class=\"selected\">";
						echo "<a class=\"section\" href=\"".$_SESSION["roletaskaddr"][$nor1][0][0]."\">";
						//echo 
						echo "<b>".$_SESSION["rolename"][$nor1]."</b>"."<br/>";
						echo "</a>";
						
						echo"<ul>";	
				
							for ($not1 = 0; $not1 < $not4r[$nor1]; $not1++) {
							echo "<li><a class=\"current-sub\" href=\"".$_SESSION["roletaskaddr"][$nor1][0][$not1]."\">";
							echo $_SESSION["roletask"][$nor1][0][$not1]."<br/>";
							echo "</a></li>";
							}
						echo "</ul>";
						echo "</li>" ;
						} 
				
					else{
						echo "<li><a class=\"section\" href=\"".$_SESSION["roletaskaddr"][$nor1][0][0]."\">";
						echo "<b>".$_SESSION["rolename"][$nor1]."</b>"."<br/>";	
						echo"</a>";
						echo"</li>"; 
					}
				
						
					
						
} 

echo "</ul>";	





?>


