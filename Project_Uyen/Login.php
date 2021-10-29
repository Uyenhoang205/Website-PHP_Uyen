<?php
session_start();
if (isset($_SESSION['user_info'])) {
    header("location:List.php");
}

$error = '';
$user = '';
$password = '';
if (!empty($_POST['login'])) {
    $user = isset($_POST['username']) ? $_POST['username'] : '';
 
    if(strlen($_POST['password']) < 8) {
        $error = 'Mật khẩu phải chứa 8 ký tự trở lên';
    }
    
    if (empty($error)) {
        $user = $_POST['username'];
        $password = $_POST['password'];

        $conn = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($conn, 'quan_ly_dien_thoai');
        $sql = "
            SELECT user.id, user_info.user_name FROM user
            LEFT JOIN user_info ON user.id = user_info.user_id
            WHERE user.user = '" . "$user" . "' AND user.password = '" . "$password" . "'";
        $result = mysqli_query($conn, $sql);
        $user_info = mysqli_fetch_assoc($result);
        if (!empty($user_info)) {
            $_SESSION['user_info'] = $user_info;
            header ("location:List.php");
        } else {
            $error = "Tài khoản hoặc mật khẩu không đúng";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
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
            height: 400px;
            width: 300px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            padding: 60px 30px 60px 30px;
            background-color: rgba(255, 255, 255, 0.);
            box-shadow: -1px 4px 28px 0px rgba(0, 0, 0, 0.75);
            color: white;
        }

        .content header {
            color: white;
            font-size: 30px;
            font-weight: 600;
            margin: 0 0 35px 0;
        }

        input {
            position: relative;
            height: 40px;
            width: 100%;
            font-size: 15px;
        }

        a {
            color: white;
        }

        .forgot, .no_account {
            text-align: left;
        }

        button {
            background-color: #0099FF;
            color: white;
            font-size: 17px;
            font-weight: 600;
            margin: 0 0 35px 0;
            width: 100%;
            height: 40px;
        }
    </style>
</head>

<body>
    <div class="bg-img">
        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="content">
                <header><?php echo "Đăng nhập"; ?></header>
                <div>
                    <div>
                        <input name="username" type="text" value="<?=$user?>" placeholder="<?php echo "Tên đăng nhập"; ?>">
                    </div>
                    <br>
                    <div>
                        <input name="password" type="password" value="<?=$password?>" placeholder="<?php echo "Mật khẩu"; ?>">
                    </div>
                </div>
                <br>
                <br>
                <div class="forgot"><a href=#>Quên mật khẩu?</a></div>
                <br>
                <div class="no_account">Bạn chưa có tài khoản? <a href="Register.php">ĐĂNG KÝ</a></div>
                <br>
                <div>
                    <input type="submit" name="login" value="ĐĂNG NHẬP">
                </div>
                <div class = "mes-error">
                    <span><?= $error ?></span>
                </div>
        </form>
    </div>
</body>

</html>