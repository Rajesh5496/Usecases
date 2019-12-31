<?php
session_start();
?>
<head>
<link rel="stylesheet" href="styles.css">
</head>
<form method="POST" enctype="multipart/form-data" action="logincheck.php">
   <div class="center" > 
  <div class="form-style-2">
<br><br><br><br><br><br><br><br><div class="form-style-2-heading">Enter Login Crendentials</div>
<form action="" align="center" method="post">
<label for="field1" align="center"><span>Username <span class="required">*</span></span><input align="center" type="text" class="input-field" name="uname" value="username" required /></label>
<label for="field2" align="center"><span>Password <span class="required">*</span></span><input align="center" type="password" class="input-field" name="pwd" value="password" required /></label>
<p><br />
<img src="captcha.php?rand=<?php echo rand(); ?>" id='captcha_image' >
</p>
<!--<label><strong>Enter Captcha:</strong></label><br />-->
<input type="text" name="captcha" placeholder="Enter Captcha" required / >

<p>Can't read the captcha?
<a href='javascript: refreshCaptcha();'>click here</a>
to refresh</p>
<br><br><label><span> </span><input align="center" type="submit" value="Login" name="submit" />&nbsp;&nbsp;&nbsp;&nbsp;<input align="center" type="reset" value="Reset" /></label>
<?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
						 
						
                        echo "<span>$error</span>";
						
						
                    }
                if(isset($_SESSION["userN"])){
					$userN = $_SESSION['userN'] ;
					echo $userN;
				}
				unset($_SESSION["error"]);
				unset($_SESSION["userN"]);
				session_destroy();
				?>  

<script>
//Refresh Captcha
function refreshCaptcha(){
    var img = document.images['captcha_image'];
    img.src = img.src.substring(
 0,img.src.lastIndexOf("?")
 )+"?rand="+Math.random()*1000;
}
</script>