<?php
session_start();
if (!isset($_SESSION['user_info'])) {
    header("Location: Login.php");
}

$error = "";
$mobile_id = isset($_GET['id']) ? $_GET['id'] : '';
if (empty($mobile_id)) {
    die('Không tìm được thông tin điện thoại');
}

//Query gia tri tu file List.php vao
$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'quan_ly_dien_thoai');
$sql = "
    SELECT * FROM mobile
    WHERE mobile.id = $mobile_id
    ";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

//Query gia tri category_name vao select
$sql1 = "SELECT mobile_category.id, mobile_category.category_name FROM mobile_category";
$result1 = mysqli_query($conn, $sql1);
$list_mobile_category = mysqli_fetch_all($result1, MYSQLI_ASSOC);

//Update
if (!empty($_POST['update'])) {
    $new_name = $_POST['name'];
    $new_category_mobile = $_POST['category_mobile'];
    $new_price = $_POST['price'];
    $new_info = $_POST['info'];
    $sql2 = "
       UPDATE mobile SET mobile_name = '$new_name', category_id = '$new_category_mobile', price = '$new_price', info = '$new_info'
       WHERE mobile.id = $mobile_id
    ";
    $result2 = mysqli_query($conn, $sql2);
    $new_info = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    header('Location: List.php');
}

//Back
if (isset($_POST['back'])) {
    header ("location: List.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
        }

        main {
            width: 50%;
            height: 400px;
            box-sizing: border-box;
            line-height: 40px;
            font-size: 20px;
            margin-left: 27%;
            margin-top: 10%;
        }

        .title {
            text-align: center;
        }

        .content {
            padding-left: 15%;
            padding-right: 15%;
            padding-top: 5%;
        }

        label {
            position: fixed;
            left: 35%;
            padding: 5px;
        }

        input {
            margin-left: 40%;
            padding: 5px;
            width: 250px;
        }

        .add {
            margin-left: 40%;
            padding: 5px;
            width: 250px;
        }

        button {
            font-size: 15px;
            padding: 5px;
        }

        .update, .back {
            margin-left: 25%;
            margin-top: 20px;
        }

        .select {
            width: 265px;
            height: 30px;
            margin-left: 40%;
            padding: 5px;
        }
    </style>
</head>

<body>
    <header><?php include_once('Header.php'); ?></header>
    
    <main>
        <h2 class="title">Chỉnh sửa điện thoại</h2>
        <form class="content" method="POST" enctype="multipart/form-data" action="">
            <div>
                <label>Tên điện thoại: </label>
                <input type="text" name="name" value="<?= $data['mobile_name'] ?>">
            </div>
            <div>
                <label>Hãng điện thoại: </label>
                <select name="category_mobile" class="select">
                    <option selected value="">Chọn hãng điện thoại</option>
                    <?php
                    foreach ($list_mobile_category as $category) {
                        $selected = $data['category_id'] == $category['id'] ? 'selected' : '';
                        echo "<option $selected value='" . $category['id'] . "'>" . $category['category_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label>Giá tiền: </label>
                <input type="number" name="price" value="<?= $data['price'] ?>">
            </div>
            <div>
                <label>Thông tin khuyến mại: </label>
                <input type="text" name="info" value="<?= $data['info'] ?>">
            </div>
            <br>
            <input type="submit" class="update" name="update" value="Cập nhật">
            <input type="submit" class="back" name="back" value="Quay lại">
        </form>
        <div class="mes-error">
            <span><?= $error ?></span>
        </div>
    </main>

    <footer><?php include_once('Footer.php'); ?></footer>
</body>

</html>