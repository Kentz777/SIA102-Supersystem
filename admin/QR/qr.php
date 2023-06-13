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
    $filename = $body.' - '.rand(1000,9999);
    $codeContents = $body; 
    QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
    echo '<div class="qr-field">
                <h2 style="text-align:center">QR Code Result: </h2>
                <center>
                    <div class="qrframe">
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
   
    <script src="libs/navbarclock.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/qrcode.min.js"></script>

    <style>
        .myoutput {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding-top: 200px;

}



    </style>
    </head>
    <body onload="startTime()">
     <center>
        <div class="myoutput">
            <div class="container">
            <h3 style="color:white;"><strong>Generate Room QR</strong></h3>
            <div class="input-field">
         
                <form id="myForm" method="post">
                    <div class="form-group">
                        <label style="color:white;">Enter Room No.</label>
                        <input type="text" class="form-control" name="msg" style="width:20em;" value="<?php echo @$body; ?>" required pattern="[a-zA-Z0-9 .]+" placeholder="Room#">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary submitBtn" style="width:20em; margin:0;" />
                    </div>
                </form>
            </div>
            <div id="qrcode" style="text-align:center; margin-top: 20px;"></div>
            <div class = "dllink" style="text-align:center;margin:-100px 0px 
">
				
			</div>
</div>
		</div>
</center>
	</body>
	<footer></footer>
</html>