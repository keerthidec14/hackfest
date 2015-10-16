<?php
$sesflag=0;
$errflag=0;
if(isset($_COOKIE['cok']))
	$sesflag=1;
if(isset($_GET['login']))
{
	$errflag=1;
}
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sharecept</title>
    
    
    <link rel="stylesheet" href="css/login.css">
	<!-- Button -->
	<link rel="stylesheet" type="text/css" href="css/default.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<script src="./js/jquery-2.1.1.min.js"></script>
	<script src="./js/jquery.bpopup.min.js"></script>
	<script src="js/modernizr.custom.js"></script>
	
	<script src="js/login.js"></script>
    
    
  </head>
	<style type="text/css">
    <!--For iframe popup -->
		
	a.back{
                background:transparent url(back.png) no-repeat top left;
                position:fixed;
                width:150px;
                height:27px;
                outline:none;
                bottom:0px;
                left:0px;
            }
            #content{
                margin:0 auto;
            }
	#element_to_pop_up { display:none; }
	
			.frame {
				margin: 0;
				padding: 0;
				overflow: hidden;
			}
			.b-close {
				border-radius: 7px;
				font: bold 131% sans-serif;
				padding: 0 6px 2px;
				background-color: #2b91af;
				color: #fff;
				cursor: pointer;
				text-align: center;
				text-decoration: none;
				position: absolute;
				right: -7px;
				top: -7px;
			}
			.b-close:hover {
				background-color: #1e1e1e;
			}
        </style>
  <body>
					
						
    <div class="wrapper">
	<center><img src="logo.png" /></center>
	<center><h1><b>#Share... #Care... #Learn...</b></h1>
	<br>
	<br>
	<br>
	
	
			
			
	<div class="container2">
	<?php
	if($sesflag==0)
	{
			echo "<form>
					<button type='button' id='login-button' >Login</button>
				</form>";
			if($errflag==1)
				echo "<h3 color=red>Invalid Username/Password</h3>";
	}
	?>
			<div id="element_to_pop_up"> 
							
						<span class="button b-close"><span>X</span></span>
						<iframe src="login/login.php" class="frame" frameBorder="0" scrolling="no" seamless="seamless" height="350" width="400"></iframe>
							
					</div>	
		<!-- Button -->
		<br>
		<br>
		<br>
		<br>
		<p>
				<table>
					<tr>
					<td>
					<section id="btn-click">
					<form action="books.php">
						<button class="btn btn-7 btn-7a icon-truck" >BOOKS</button>
					<form>
					
					<form action="infra.php">
						<button class="btn btn-7 btn-7a icon-truck">INFRASTRUCTURE</button>
					<form>	
					
					<form action="lect.php">
						<button class="btn btn-7 btn-7a icon-truck">LECTURERS</button>
					<form>
					</section>
					</td>
					</tr>
				</table>
		</p>
		<!----->
		
	</div>	
		
	
	<div class="container">
	</div>
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul> 
</div>
    

    
    
    <script src="js/classie.js"></script>
		<script>
			var buttons7Click = Array.prototype.slice.call( document.querySelectorAll( '#btn-click button' ) ),
				buttons9Click = Array.prototype.slice.call( document.querySelectorAll( 'button.btn-8g' ) ),
				totalButtons7Click = buttons7Click.length,
				totalButtons9Click = buttons9Click.length;

			buttons7Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );
			buttons9Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );

			function activate() {
				var self = this, activatedClass = 'btn-activated';

				if( classie.has( this, 'btn-7h' ) ) {
					// if it is the first of the two btn-7h then activatedClass = 'btn-error';
					// if it is the second then activatedClass = 'btn-success'
					activatedClass = buttons7Click.indexOf( this ) === totalButtons7Click-2 ? 'btn-error' : 'btn-success';
				}
				else if( classie.has( this, 'btn-8g' ) ) {
					// if it is the first of the two btn-8g then activatedClass = 'btn-success3d';
					// if it is the second then activatedClass = 'btn-error3d'
					activatedClass = buttons9Click.indexOf( this ) === totalButtons9Click-2 ? 'btn-success3d' : 'btn-error3d';
				}

				if( !classie.has( this, activatedClass ) ) {
					classie.add( this, activatedClass );
					setTimeout( function() { classie.remove( self, activatedClass ) }, 1000 );
				}
			}

			document.querySelector( '.btn-7i' ).addEventListener( 'click', function() {
				classie.add( document.querySelector( '#trash-effect' ), 'trash-effect-active' );
			}, false );
		</script>
		
		
 </body>
  <!-- login -->
		<script>
		(function($) {
				$(function() {
					$('#login-button').bind('click', function(e) {
						e.preventDefault();
							$('#element_to_pop_up').bPopup({
								contentContainer:'.content',
								loadUrl: 'http://localhost/sharecept/test.html' //Uses jQuery.load()
							});
					});
				 }); 
			 })(jQuery);
		</script>
			<script type="text/javascript" language="javascript">
							function closepopup()
							{
								$(document).ready(function(){
									$('#element_to_pop_up').bPopup().close();
								});
								
							}
			</script>
</html>
