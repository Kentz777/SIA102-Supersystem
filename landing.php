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
    // echo 0;
}
?>


<style>
    header.masthead {
        background: "url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>)";
        background-repeat: no-repeat;
        background-size: cover;
    }

    .loading-img {
        animation: loading 1.5s infinite linear;
        inset: 0;
        user-select: none;
    }

    .qr-code-img::before {
        content: "";
        position: absolute;
        height: 5px;
        top: 100%;
        bottom: 100%;
        width: 110%;
        border-radius: 5px;
        opacity: 0.75;
        box-shadow: 0 0 10px 5px blue;
        left: -5%;
        margin-inline: auto;
        background-color: blue;
        animation: barscanner 1s infinite alternate linear;
    }

    @keyframes barscanner {
        from {
            top: 0%;
        }

        to {
            bottom: 0%;
        }
    }

    @keyframes loading {
        from {
            transform: rotate(0);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>

<body>

    <div class="container-fluid d-flex justify-content-center py-2 py-lg-3 w-100 h-100" style="background-color: #e8e8e8;">
        <div class="d-flex flex-column p-3 p-lg-3" style="width: min(35rem, 100%);">
            <div class="w-100 position-relative" style="height: min(18rem, 50vw);">
                <img src="assets/img/loading-image.png" alt="loading" class="loading-img position-absolute m-auto" style="width: 2rem; aspect-ratio: 1;">
                <video id="preview" class="w-100 h-100"></video>
            </div>
            <h1 class="display-6 fs-4 text-center py-3">SCAN QR CODE HERE</h1>

            <form method="post" class="form-horizontal" id="qr-frm">
                <input type="hidden" class="form-control" name="qr" id="text" placeholder="Room no. will display here..." readonly />
            </form>

            <div class="d-flex flex-column flex-grow-1 text-center">
                <div class="qr-code-img position-relative w-25 m-auto">
                    <img src="assets/img/qr-code-img.png" alt="qr code image" class="w-100">
                </div>
                <h6>Waiting...</h6>
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