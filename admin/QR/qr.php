<?php
$f = "QR/visit.php";
if(!file_exists($f)){
    touch($f);
    $handle =  fopen($f, "w" ) ;
    fwrite($handle,0) ;
    fclose ($handle);
}
 
include('QR/libs/phpqrcode/qrlib.php'); 

function getUsernameFromEmail($email) {
    $find = '@';
    $pos = strpos($email, $find);
    $username = substr($email, 0, $pos);
    return $username;
}

if(isset($_POST['submit']) ) {
    $tempDir = 'QR/temp/'; 
    $body =  $_POST['msg'];
    $filename = $body;
    $codeContents = $body; 
    QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
    echo '<div class="qr-field">
                <h2 style="text-align:center">QR Code Result: </h2>
                <center>
                    <div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
                            <img src="QR/temp/'. $filename .'.png" style="width:200px; height:200px;"><br>
                    </div>
                    <a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="QR/download.php?file='. $filename .'.png">Download QR Code</a>
                </center>
            </div>';
}
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
    <title>(QR) Code Generator</title>
    <link rel="stylesheet" href="QR/libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/style.css">
    <script src="libs/navbarclock.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/qrcode.min.js"></script>
    </head>
    <body onload="startTime()">
        <nav class="navbar-inverse" style="background-color: blue" role="navigation">
            <a href="qr.php"><h1 style="color:white">QR Code Generator</h1></a>
            <div id="clockdate">
                <div class="clockdate-wrapper">
                    <div id="clock"></div>
                    <div id="date"><?php echo date('l, F j, Y'); ?></div>
                </div>
            </div>
        </nav>
        <div class="myoutput">
            <h3><strong>(QR) Code Generator</strong></h3>
            <div class="input-field">
                <h3>Please Fill-out All Fields</h3>
                <form id="myForm" method="post">
                    <div class="form-group">
                        <label>Message</label>
                        <input type="text" class="form-control" name="msg" style="width:20em;" value="<?php echo @$body; ?>" required pattern="[a-zA-Z0-9 .]+" placeholder="Enter your message">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary submitBtn" style="width:20em; margin:0;" />
                    </div>
                </form>
            </div>
            <div id="qrcode" style="text-align:center; margin-top: 20px;"></div>
            <div class = "dllink" style="text-align:center;margin:-100px 0px 
">
				<h4>www.itsourcecode.com</h4>
			</div>
		</div>
	</body>
	<footer></footer>
</html>