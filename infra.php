<?php 
	//Include Config File
	require 'config.php';

	$connection=mysql_connect($databasehost,$mysqlusername,$mysqlpassword);
	if(!$connection)
	{
		die("Database connection failed: ".mysql_error());
	}
	$db_select=mysql_select_db($databasename,$connection);
	if(!$db_select)
	{
		die("Database selection failed: ".mysql_error());
	}	
	
	$isloggedin=0;
	$searchresult=0;
	$searchcat=0;
	if(isset($_COOKIE['cok']))
	{
		$cookievalue=$_COOKIE['cok'];
			$sql="SELECT * FROM users 
				WHERE cookie='{$cookievalue}'";
				$result = mysql_query($sql); 
				$noofrows = mysql_affected_rows();
			if($noofrows==1)
				$isloggedin=1;
	}
	
	if(isset($_GET['search']))
	{
		$search=$_GET['search'];
		$searchresult=1;
	}
	else if(isset($_GET['cat']))
	{
		$category=$_GET['cat'];
		$searchcat=1;
	}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/nav.css"> <!-- Resource style -->
	<link rel="stylesheet" href="table2.css"> <!-- CSS reset for table-->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  	
	<title>Find Infrastructure</title>
</head>
<body>
	<header class="cd-main-header">
		<a href="http://localhost/sharecept" class="cd-logo"><img src="logo.png" alt="Logo" width="120" height="30"></a>
		
		<div class="cd-search is-hidden">
			<form action="" method="GET">
				<input type="search" name='search' placeholder="Search...">
			</form>
		</div> <!-- cd-search -->

		<a href="#0" class="cd-nav-trigger">Menu<span></span></a>

		<?php 
		
			echo '<nav class="cd-nav">
				<ul class="cd-top-nav">
				<li><a href="http://vturesultz.com/vtuknowledge/">Forum</a></li>';
			if($isloggedin==1)
			{
				echo '<li class="has-children account">
						<a href="#0">
							<img src="img/cd-avatar.png" alt="avatar">
							Account
						</a>

						<ul>

							<li><a href="#0">Upload</a></li>
							<li><a href="#0">Edit Account</a></li>
							<li><a href="http://localhost/sharecept?login=-1">Logout</a></li>
						</ul>
					</li>
				</ul>
			</nav>';
		}
		?>
		
	</header> <!-- .cd-main-header -->

	
	
	<main class="cd-main-content">
		<nav class="cd-side-nav">
	<?php

			echo '<ul>
				<li class="cd-label">Main</li>
				<li class="has-children comments">
					<a href="?cat=1">Equipments</a>
					
				</li>
				
				<li class="has-children comments">
					<a href="?cat=2">Auditorium</a>
				</li>
				
				<li class="has-children comments">
					<a href="?cat=3">LABS</a>
				</li>
				
				<li class="has-children comments">
					<a href="?cat=4">Incubation Centers</a>
				</li>';

		?>
		</nav>
		<?php
		
		echo '<div class="content-wrapper">';
		if($searchresult==0 and $searchcat==0)
		{
		
			echo '<h1>Find INFRASTRUCTURES</h1> ';
			
		}
	
		if($searchcat==1)
		{
			
			
			$sql="SELECT * FROM infrastructure 
				WHERE cat='{$category}' order by rating,unit asc";
				$result = mysql_query($sql);
				$noofrows = mysql_affected_rows();
				
				
				
				echo '<br><br><table border=3 class="pure-table pure-table-horizontal">';
				echo '<thead>
						<tr>
						  <th>Concept</th>
						  <th>Reference</th>
						  <th>Content</th>
						  <th>Image</th>
						</tr>
					  </thead>';
				
				while($data=mysql_fetch_assoc($result))
				{
					$output="<tr><td><b>".$data['concept_name']."</b></td><td><i>".$data['reference']."</td><td></i>".$data['content']."</td></tr>";
					echo $output;
				}
				
				echo '</table>';
				
				
		}
		
		if($searchresult==1)
		{
			
			$sql="SELECT * FROM books 
				WHERE concept_name like '%{$search}%' order by rating,unit asc";
				$result = mysql_query($sql);
				$noofrows = mysql_affected_rows();
				
				if($noofrows==0)
					echo "<br><br><center><b><h1>NO Results</h1></b></center>";
				
				else
				{
				echo '<br><br><table border=3 class="pure-table pure-table-horizontal">';
				echo '<thead>
						<tr>
						  <th>Concept</th>
						  <th>Reference</th>
						  <th>Content</th>
						  <th>Image</th>
						</tr>
					  </thead>';
				
				while($data=mysql_fetch_assoc($result))
				{
					$output="<tr><td><b>".$data['concept_name']."</b></td><td><i>".$data['reference']."</td><td></i>".$data['content']."</td></tr>";
					echo $output;
				}
				
				echo '</table>';
				}
			}
		
		echo '</div> <!-- .content-wrapper -->';
		?>
		
		
		
		
	</main> <!-- .cd-main-content -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.menu-aim.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
<?php
	mysql_close($connection);
?>