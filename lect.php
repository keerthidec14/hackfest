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
	$showsubject=0;
	$searchresult=0;
	$searchsub=0;
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
	if(isset($_GET['branch']) && isset($_GET['sem']))
	{
		$branch=$_GET['branch'];
		$sem=$_GET['sem'];
		$showsubject=1;
	}
	else if(isset($_GET['search']))
	{
		$search=$_GET['search'];
		$searchresult=1;
	}
	else if(isset($_GET['sub']))
	{
		$subject=$_GET['sub'];
		$searchsub=1;
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
  	
	<title>Find Lecturers</title>
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
		if($showsubject!=1)
		{
			echo '<ul>
				<li class="cd-label">Main</li>
				<li class="has-children comments">
					<a href="#">CSE</a>
					
					<ul>
						<li><a href="?branch=cse&sem=1">Semester 1</a></li>
						<li><a href="?branch=cse&sem=2">Semester 2</a></li>
						<li><a href="?branch=cse&sem=3">Semester 3</a></li>
						<li><a href="?branch=cse&sem=4">Semester 4</a></li>
						<li><a href="?branch=cse&sem=5">Semester 5</a></li>
						<li><a href="?branch=cse&sem=6">Semester 6</a></li>
						<li><a href="?branch=cse&sem=7">Semester 7</a></li>
						<li><a href="?branch=cse&sem=8">Semester 8</a></li>
					</ul>
				</li>
				
				<li class="has-children comments">
					<a href="#">ISE</a>
					
					<ul>
						<li><a href="?branch=ise&sem=1">Semester 1</a></li>
						<li><a href="?branch=ise&sem=2">Semester 2</a></li>
						<li><a href="?branch=ise&sem=3">Semester 3</a></li>
						<li><a href="?branch=ise&sem=4">Semester 4</a></li>
						<li><a href="?branch=ise&sem=5">Semester 5</a></li>
						<li><a href="?branch=ise&sem=6">Semester 6</a></li>
						<li><a href="?branch=ise&sem=7">Semester 7</a></li>
						<li><a href="?branch=ise&sem=8">Semester 8</a></li>
					</ul>
				</li>
				
				<li class="has-children comments">
					<a href="#">EC</a>
					
					<ul>
						<li><a href="?branch=ec&sem=1">Semester 1</a></li>
						<li><a href="?branch=ec&sem=2">Semester 2</a></li>
						<li><a href="?branch=ec&sem=3">Semester 3</a></li>
						<li><a href="?branch=ec&sem=4">Semester 4</a></li>
						<li><a href="?branch=ec&sem=5">Semester 5</a></li>
						<li><a href="?branch=ec&sem=6">Semester 6</a></li>
						<li><a href="?branch=ec&sem=7">Semester 7</a></li>
						<li><a href="?branch=ec&sem=8">Semester 8</a></li>
					</ul>
				</li>
				
				<li class="has-children comments">
					<a href="#">EE</a>
					
					<ul>
						<li><a href="?branch=ee&sem=1">Semester 1</a></li>
						<li><a href="?branch=ee&sem=2">Semester 2</a></li>
						<li><a href="?branch=ee&sem=3">Semester 3</a></li>
						<li><a href="?branch=ee&sem=4">Semester 4</a></li>
						<li><a href="?branch=ee&sem=5">Semester 5</a></li>
						<li><a href="?branch=ee&sem=6">Semester 6</a></li>
						<li><a href="?branch=ee&sem=7">Semester 7</a></li>
						<li><a href="?branch=ee&sem=8">Semester 8</a></li>
					</ul>
				</li>
				<li class="has-children comments">
					<a href="#">ME</a>
					
					<ul>
						<li><a href="?branch=me&sem=1">Semester 1</a></li>
						<li><a href="?branch=me&sem=2">Semester 2</a></li>
						<li><a href="?branch=me&sem=3">Semester 3</a></li>
						<li><a href="?branch=me&sem=4">Semester 4</a></li>
						<li><a href="?branch=me&sem=5">Semester 5</a></li>
						<li><a href="?branch=me&sem=6">Semester 6</a></li>
						<li><a href="?branch=me&sem=7">Semester 7</a></li>
						<li><a href="?branch=me&sem=8">Semester 8</a></li>
					</ul>
				</li>
				<li class="has-children comments">
					<a href="#">CV</a>
					
					<ul>
						<li><a href="?branch=cv&sem=1">Semester 1</a></li>
						<li><a href="?branch=cv&sem=2">Semester 2</a></li>
						<li><a href="?branch=cv&sem=3">Semester 3</a></li>
						<li><a href="?branch=cv&sem=4">Semester 4</a></li>
						<li><a href="?branch=cv&sem=5">Semester 5</a></li>
						<li><a href="?branch=cv&sem=6">Semester 6</a></li>
						<li><a href="?branch=cv&sem=7">Semester 7</a></li>
						<li><a href="?branch=cv&sem=8">Semester 8</a></li>
					</ul>
				</li>
				<li class="has-children comments">
					<a href="#">Others</a>
					
					<ul>
						<li><a href="?branch=oth&sem=1">Semester 1</a></li>
						<li><a href="?branch=oth&sem=2">Semester 2</a></li>
						<li><a href="?branch=oth&sem=3">Semester 3</a></li>
						<li><a href="?branch=oth&sem=4">Semester 4</a></li>
						<li><a href="?branch=oth&sem=5">Semester 5</a></li>
						<li><a href="?branch=oth&sem=6">Semester 6</a></li>
						<li><a href="?branch=oth&sem=7">Semester 7</a></li>
						<li><a href="?branch=oth&sem=8">Semester 8</a></li>
					</ul>
				</li>';
			}
			else
			{
				echo '<ul>
					<li class="cd-label">Main</li>
					<li class="has-children comments">
					<a href="?sub=Logic Design">Logic Design</a>
					</ul>';
			}
		?>
		</nav>
		<?php
		
		echo '<div class="content-wrapper">';
		if($showsubject==0 and $searchresult==0 and $searchsub==0)
		{
		
			echo '<h1>Find Lecturers</h1> ';
			
		}
	
		if($searchsub==1)
		{
			
			$sql="SELECT * FROM books 
				WHERE subject='{$subject}' order by rating,unit asc";
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