<?php
session_start();
if (!isset($_SESSION['user_info'])) {
    header("Location: Login.php");
}

$list_mobile_category = [];

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'phone_management');
$sql = "SELECT mobile_category.id, mobile_category.category_name FROM mobile_category";
$result = mysqli_query($conn, $sql);
$list_mobile_category = mysqli_fetch_all($result, MYSQLI_ASSOC);

$error = '';
$name = '';
$category_id = '';
$price = '';
$file_upload = '';
$info = '';

if (!empty($_POST['upload'])) { 
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $category_id = isset($_POST['category_mobile']) ? $_POST['category_mobile'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $file_upload = isset($_POST['picture']) ? $_POST['picture'] : '';
    $info = isset($_POST['info']) ? $_POST['info'] : '';

    if (empty($_POST['name'])) {
        $error = "携帯名の入力が必要です。";
    }

    if (empty($_POST['category_mobile'])) {
        $error = "種類の入力が必要です。";
    }

    if (empty($_POST['price'])) {
        $error = "値段の入力が必要です。";
    }

    if (empty($_POST['picture'])) {
        $error = "写真をアップロードしてください。";
    }

    if (empty($_POST['name']) && empty($_POST['category_mobile']) && empty($_POST['price']) && empty($_POST['picture'])) {
        $error = "携帯の情報を入力してください。";
    }

    if (empty($error)) {
        $target_dir = "picture/";
        $file_upload = $target_dir . basename($_FILES['picture']['name']);
        move_uploaded_file($_FILES['picture']['tmp_name'], $file_upload);
        $name = $_POST['name'];
        $category_id = $_POST['category_mobile'];
        $price = $_POST['price'];
        $info = $_POST['info'];
        $sql1 = "
            INSERT INTO mobile(mobile_name, category_id, price, image, info)
            VALUES ('$name', '$category_id', '$price', '$file_upload', '$info')
        ";
        $result = mysqli_query($conn, $sql1);
        if ($result) {
            $user_id = $_SESSION['user_info']['id'];
            $mobile_id = mysqli_insert_id($conn);

            $sql2 = "INSERT INTO user_mobile(user_id, mobile_id) VALUES ('$user_id', '$mobile_id')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("location: List.php");
            } else {
                $error = mysqli_error($conn);
            }
        } else {
            $error = mysqli_error($conn);
        }
    }
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
            position: absolute;
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

        .upload, .back {
            margin-left: 25%;
            margin-top: 20px;
        }

        .select {
            width: 265px;
            height: 30px;
            margin-left: 40%;
            padding: 5px;
        }

        .mes-error {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header><?php include_once('Header.php'); ?></header>

    <main>
        <h2 class="title">携帯の追加</h2>
        <form class="content" method="POST" enctype="multipart/form-data" action="">
            <div>
                <label>携帯名: </label>
                <input type="text" name="name">
            </div>
            <div>
                <label>種類: </label>
                <select name="category_mobile" class="select">
                    <option selected value="">種類を入力する</option>
                    <?php
                    foreach ($list_mobile_category as $category) {
                        echo "<option value='" . $category['id'] . "'>" . $category['category_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label>値段: </label>
                <input type="number" name="price">
            </div>
            <div>
                <label>写真: </label>
                <input type="file" class="picture" name="picture">
            </div>
            <div>
                <label>割引情報: </label>
                <input type="text" name="info">
            </div>
            <br>
            <input type="submit" class="upload" name="upload" value="アップロード">
            <input type="submit" class="back" name="back" value="戻る">
        </form>
        <div class="mes-error">
            <span><?= $error ?></span>
        </div>
    </main>

    <footer><?php include_once('Footer.php'); ?></footer>
</body>

</html>
