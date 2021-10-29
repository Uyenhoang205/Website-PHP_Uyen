<?php
session_start();
if (isset($_SESSION['user_info'])) {
    header("location:Login.php");
}

$error = '';
$name = '';
$user = '';
$mail = '';
$bday = '';
$psw = '';
$success = '';

if (!empty($_POST['register'])) {
    if (strlen($_POST['psw']) < 8 && strlen($_POST['again']) < 8) {
        $error = "Mật khẩu phải từ 8 ký tự trở lên";
    }

    if ($_POST['psw'] != $_POST['again']) {
        $error = "Mật khẩu không đồng nhất. Vui lòng nhập lại";
    }

    $name = $_POST['name'];
    $user = $_POST['user'];
    $mail = $_POST['mail'];
    $bday = date('Y-m-d', strtotime($_POST['bday']));
    $psw = $_POST['psw'];

    $conn = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($conn, 'quan_ly_dien_thoai');

    $sqla = "SELECT user.user FROM user WHERE user.user = '$user'";
    $result1 = mysqli_query($conn, $sqla);
    $data1 = mysqli_fetch_assoc($result1);
    if (!empty($data1)) {
        $error = "Tên đăng nhập đã có người sử dung, vui lòng chọn tên đăng nhập khác";
    }

    $sqlb = "SELECT user_info.email FROM user_info WHERE user_info.email = '$mail'";
    $result2 = mysqli_query($conn, $sqlb);
    $data2 = mysqli_fetch_assoc($result2);
    if (!empty($data2)) {
        $error = "Email đã có người sử dung, vui lòng chọn email khác để đăng ký";
    }

    if (empty($error)) {
        $name = $_POST['name'];
        $user = $_POST['user'];
        $mail = $_POST['mail'];
        $bday = date('Y-m-d', strtotime($_POST['bday']));
        $psw = $_POST['psw'];

        $conn = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($conn, 'quan_ly_dien_thoai');
        $sql1 = "INSERT INTO user (user, password) VALUES ('$user', '$psw')";
        $result = mysqli_query($conn, $sql1);
        $user_id = mysqli_insert_id($conn);
        $sql2 = "INSERT INTO user_info (user_id, name, email, birthday) VALUES ('$user_id', '$name', '$email', '$bday')";
        $result = mysqli_query($conn, $sql2);
        mysqli_close($conn);
        $success = "Đăng ký thành công " . " <div><a href = 'Login.php'>Login</a></div>";
    }
}

if (mysqli_query($conn, $sql)) {
    echo "Đăng ký thành công";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
        }

        .bg-img {
            background-image: url('nature.jpeg');
            height: 100vh;
            background-size: cover;
            background-position: center;
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .content {
            position: absolute;
            height: 450px;
            width: 450px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            padding: 60px 30px 60px 30px;
            background-color: rgba(255, 255, 255, 0.);
            box-shadow: -1px 4px 28px 0px rgba(0, 0, 0, 0.75);
            color: white;
            line-height: 50px;
        }

        .content h2 {
            color: white;
            font-size: 30px;
            font-weight: 600;
            margin: 0 0 35px 0;
        }

        label {
            position: absolute;
            padding: 5px;
            font-size: 20px;
        }

        .name,
        .user,
        .psw,
        .again,
        .bday,
        .mail {
            margin-left: 40%;
            padding: 10px;
            width: 250px;
            font-size: 15px;
        }

        a {
            color: white;
            text-decoration: none;
            font-size: 20px;
        }

        .register {
            background-color: #0099FF;
            font-size: 17px;
            font-weight: 600;
            border: 1px solid black;
            width: 100%;
            height: 40px;
            margin-top: 25px;
        }
    </style>
</head>

<body>
    <div class="bg-img">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="content">
                <h2>Đăng ký tài khoản</h2>
                <div>
                    <label>Họ và tên:</label>
                    <input class="name" name="name" type="text" placeholder="Nhập họ và tên" value="" required>
                </div>
                <div>
                    <label>Tài khoản:</label>
                    <input class="user" name="user" type="text" placeholder="Nhập tên tài khoản" value="" required>
                </div>
                <div>
                    <label>Email:</label>
                    <input class="mail" name="mail" type="mail" placeholder="Nhập tên địa chỉ email" value="" required>
                </div>
                <div>
                    <label>Ngày tháng năm sinh:</label>
                    <input class="bday" name="bday" type="date" placeholder="Nhập ngày tháng năm sinh" value="" required>
                </div>
                <div>
                    <label>Mật khẩu:</label>
                    <input class="psw" name="psw" type="password" value="" placeholder="Nhập mật khẩu" required>
                </div>
                <div>
                    <label>Nhập lại mật khẩu:</label>
                    <input class="again" name="again" type="password" value="" placeholder="Nhập lại mật khẩu" required>
                </div>
                <input class="register" type="submit" name="register" value="Đăng ký">

                <div class="mes-error">
                    <span><?= $error ?></span>
                </div>
                <div class="success">
                    <span><?= $success ?></span>
                </div>
            </div>
        </form>
    </div>
</body>

</html>