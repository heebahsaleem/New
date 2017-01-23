<!DOCTYPE html> 
<html> 
	<head> 
<link rel="stylesheet" href="result.css" type="text/css">

		<title>Result page</title> 
		
<style type="text/css">
.results {margin-left:12%; margin-right:12%; margin-top:10px;}
#up
{ font-size:35px;
font-family:Arial Black;
color:#C20351;
}
</style>
	</head> 
	
	
<body bgcolor="#F5DEB3"> 
</br>
<form action="result.php" method="get"> 
<img src="logo.png" >
</br>			
	<input type="text" name="user_query" size="170"/>
		<input type="submit" name="search" value="Search Now">
</form>
</br>
	<a href="search.html"><button>Go Back</button></a>
	
<?php 
	mysql_connect("localhost","root","");
	mysql_select_db("search");
	
	if(isset($_GET['search']))
{
	
	
        $get_value = $_GET['user_query'];
if($get_value=='')
{ echo"<center><b>Please write something in the box</b></center>";
exit();
}

	$result_query="select * from sites where site_keywords like '%$get_value%'";
        $run_result=mysql_query($result_query);
if(mysql_num_rows($run_result)<1)
{ echo"<center><b>Oops! sorry nothing was found in the database</b></center>";
}

while($row_result=mysql_fetch_array($run_result))
{
$site_title=$row_result['site_title'];
$site_link=$row_result['site_link'];
$site_desc=$row_result['site_desc'];
$site_image=$row_result['site_image'];

	echo "<div class='results'>
		<h2> $site_title</h2>
                <a href='$site_link' target='_blank'>$site_link</a>
		<p align='justify'>$site_desc</p>
                <img src='image/$site_image' width='100px' height='100px'/>
                
      </div>";

		}
}


?>


</body> 
</html>