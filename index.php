<?php 

	session_start();
	
	//Include config and lang pack
	include("interface/config.php");
	include("config.php");
	include("interface/langs/" . $hawkConfig["langFile"]);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<script type="text/javascript" src="interface/js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="interface/js/jquery-ui-1.8.13.custom.min.js"></script>
        <script type="text/javascript" src="interface/js/scripts.js"></script>
        <script type="text/javascript" src="interface/js/jquery.uniform.js"></script>

        <script type="text/javascript" src="http://cdn.jquerytools.org/1.2.5/tiny/jquery.tools.min.js"></script>
        <link rel="stylesheet" type="text/css" href="interface/css/styles.css" />
        <link rel="stylesheet" type="text/css" href="interface/css/custom-theme/jquery-ui-1.8.13.custom.css" />
		<link rel="stylesheet" type="text/css" href="interface/css/uniform.default.css" />
        <link rel="icon" type="image/png" href="interface/images/favicon.ico" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $lang["pageTitle"]; ?></title>

        <style type="text/css">.password { clear: both; width: 100px; }</style>

    </head>

    
    <body>
    
        <div class="headerLogin">
        	<div class="innerHeader">
            	<p><?php echo $lang["title"]; ?></p>
            </div>
        </div>
        
        <div class="container">
        	<div class="innerContainer">
        	
        	<?php
        		if ($_GET['return'] == "true"){
	        		echo '<div class="ui-widget">
							<div class="ui-state-highlight ui-corner-all searchError"> 
							<p><span class="ui-icon ui-icon-alert"></span>
							<strong>Error: </strong>Incorrect password! or insufficient permissions!</p>
						</div>
				  		</div>';
        		}
        	?>
        		<form action="proccy.php" method="post">
        			<div class="password"><?php echo "E-Mail: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?><input name="user" type="email" />
	        		<br /><?php echo $lang["login"]["password"]; ?><input name="pass" type="password" /></div>
	        		<div class="loginb"><input type="submit" value="<?php echo $lang["login"]["login"]; ?>" class="loginButton" /></div>
        		</form>
        		
            </div>
        </div>
        
        <div class="footer">
        	<p>&copy; Michael Telatynski && Matt Oli Ingram 2013</p>
        </div>
    
    </body>
</html>
