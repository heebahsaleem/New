<!DOCTYPE html> 
<html> 
	<head>
		<title>Search Engine in PHP</title> 
	</head>
	
<body bgcolor="gray">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="logo.png" />
	<form action="insert_site.php" method="post" enctype="multipart/form-data"> 
		
		<table bgcolor="#E9967A" width="500" border="2" cellspacing="2" align="center">
			
			<tr>
				<td colspan="5" align="center"><h2>Inserting new website:</h2></td>
			</tr>
			<tr>
				<td align="right"><b>Site Title:</b></td>
				<td><input type="text" name="site_title" /></td>
			</tr>
			
			<tr>
				<td align="right"><b>Site Link:</b></td>
				<td><input type="text" name="site_link" /></td>
			</tr>
			
			<tr>
				<td align="right"><b>Site Keywords:</b></td>
				<td><input type="text" name="site_keywords" /></td>
			</tr>
			
			<tr>
				<td align="right"><b>Site Description:</b></td>
				<td><textarea cols="22" rows="8" name="site_desc"></textarea></td>
			</tr>
			
			<tr>
				<td align="right"><b>Site Image:</b></td>
				<td><input type="file" name="site_image" /></td>
			</tr>
			
			<tr>
				<td align="center" colspan="5"><input type="submit" name="submit" value="Add Site Now"/></td>
			</tr>-

		
		
		</table>
	
	
	</form>

</body>
</html>
<?php 
	mysql_connect("localhost","root","");
	mysql_select_db("search");
	
	
	if(isset($_POST['submit'])){
	        
		 $site_title = $_POST['site_title'];
		 $site_link = $_POST['site_link'];
		 $site_keywords = $_POST['site_keywords'];
		 $site_desc = $_POST['site_desc'];
		 $site_image = $_FILES['site_image']['name'];
		 $site_image_tmp = $_FILES['site_image']['tmp_name'];
	
		
		if($site_title=='' OR $site_link=='' OR $site_keywords=='' OR $site_desc==''){
		
		echo "<script>alert('please fill all the fields!')</script>";
		
		exit();
		}
		else {
		
		$insert_query = ("insert into sites (site_title,site_link,site_keywords,site_desc,site_image) values ('$site_title','$site_link','$site_keywords','$site_desc','$site_image')");
                                 
		
		move_uploaded_file($site_image_tmp,"image/{$site_image}");
	
		if(mysql_query($insert_query)){
		
		echo "<script>alert('Data inserted into table')</script>";
		
		
		}
		
		}
	
	}


?>




