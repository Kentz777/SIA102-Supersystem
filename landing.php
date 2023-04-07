<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('header.php');
include('admin/db_connect.php');

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
    if (!is_numeric($key))
        $_SESSION['setting_' . $key] = $value;
}

if (isset($_POST['qr'])) {
    $text = $_POST['qr'];

    $sql = "SELECT room_no FROM booking_details WHERE room_no = '$text'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: index.php?room_no=$text");
    } else {
        $message = "Invalid room number. Please try again.";
    }
}
?>

<style>
    header.masthead {
        background: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <video id="preview" width="100%"></video>
            </div>
            <div class="col-md-6">
                <form method="post" class="form-horizontal" id="qr-frm">
                    <label for="text">SCAN QR CODE</label>
                    <input type="text" name="qr" id="text" readonly placeholder="Scan QR Code" class="form-control">
                </form>
            </div>
        </div>
    </div>
    <script>
        let scanner = new Instascan.Scanner({
            video: document.getElementById("preview")
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert("No cameras found");
            }
        }).catch(function(e) {
            console.error(e);
        });

        scanner.addListener('scan', function(c) {
            document.getElementById('text').value = c;
            document.forms[0].submit();
        });

        <?php if (isset($message)) { ?>
            alert_toast("<?php echo $message; ?>", 'error');
        <?php } ?>
    </script>
</body>

</html>