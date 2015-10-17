<?php
		
		setcookie('cok', "0", time() - (3600), "/"); //1 hour
		header("Location: http://localhost/sharecept");
		exit(0);
?>