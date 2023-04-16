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
    $room_no = mysqli_real_escape_string($conn, $_POST['qr']); // Escape user input to prevent SQL injection

    $qry = "SELECT *,ui.book_id as bookid, ui.room_no as uiroom, bd.user_name as bduser FROM user_info ui join booking_details bd on bd.booking_id = ui.book_id WHERE ui.room_no = '$room_no'";

    $result = $conn->query($qry);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        foreach ($row as $key => $value) {
            if ($key !== 'password') {
                $_SESSION['login_' . $key] = $value;
            }
        }

        $ip = $_SERVER['REMOTE_ADDR'];
        $user_id = isset($_SESSION['login_user_id']) ? $_SESSION['login_user_id'] : null;

        if ($user_id) {
            $stmt = $conn->prepare("UPDATE cart SET user_id = ? WHERE client_ip = ?");
            $stmt->bind_param("ss", $user_id, $ip);
            $stmt->execute();
            $stmt->close();
            $url = isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home';
            header('Location: ' . $url);
            exit;
        } else {
            echo 3;
        }
    } else {
        echo 2;
    }
} else {
    echo 0;
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
            if(cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            alert("No cameras found");
        }
        }).catch (function(e) {
            console.error(e);
        });

        scanner.addListener('scan', function(c) {
            document.getElementById('text').value = c;
            document.forms[0].submit();
        });

        <?php if (isset($message)) { ?>
            alert("<?php echo $message; ?>", 'error');
        <?php } ?>
    </script>
</body>

</html>