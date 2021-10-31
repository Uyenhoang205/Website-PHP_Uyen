<?php
session_start();
if (!isset($_SESSION['user_info'])) {
    header('location:Login.php');
}

$url = "List.php?";
$list_mobile = [];
$user_id = $_SESSION['user_info']['id'];

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'mobile_management');
$sql = "
    SELECT mobile.id, mobile.mobile_name, mobile.price, mobile.image, mobile.info FROM mobile
    INNER JOIN user_mobile ON mobile.id = user_mobile.mobile_id
    ";
$where = " WHERE user_mobile.user_id = $user_id";

$mobile_name = "";
if (!empty($_GET['mobile_name'])) {
    $where .= " AND mobile.mobile_name LIKE '%" . $_GET['mobile_name'] . "%'";
    $mobile_name = $_GET['mobile_name'];
    $url .= "mobile_name=$mobile_name&";
}

$start_price = "";
if (!empty($_GET['start_price'])) {
    $where .= " AND mobile.price >= " . $_GET['start_price'];
    $start_price = $_GET['start_price'];
    $url .= "start_price=$start_price&";
}

$end_price = "";
if (!empty($_GET['end_price'])) {
    $where .= " AND mobile.price <= " . $_GET['end_price'];
    $end_price = $_GET['end_price'];
    $url .= "end_price=$end_price&";
}

$mobile_category = "";
if (!empty($_GET['mobile_category'])) {
    $where .= " AND mobile.category_id = " . $_GET['mobile_category'];
    $mobile_category = $_GET['mobile_category'];
    $url .= "mobile_category=$mobile_category&";
}

//Search
$sql .= $where;
$order_by = "";
if (!empty($_GET['sort'])) {
    $order_by = $_GET['sort'];
}
if ($order_by == 1) {
    $sql .= " ORDER BY mobile.price ASC";
} else {
    $sql .= " ORDER BY mobile.price DESC";
}

//count the total of the record
$sql_count = "SELECT count(*) AS total FROM mobile
    INNER JOIN user_mobile ON mobile.id = user_mobile.mobile_id
    " . $where;
$row = mysqli_query($conn, $sql_count);
$data_count = mysqli_fetch_assoc($row);
$total_record = $data_count['total'];
$limit = 4;
$total_page = ceil($total_record / $limit);

$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
if ($current_page > $total_page) {
    $current_page = $total_page;
}
$offset = ($current_page - 1) * $limit;
$sql .= " LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);
$list_mobile = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Select mobile maker's name
$sql2 = "SELECT mobile_category.id, mobile_category.category_name FROM mobile_category";
$result2 = mysqli_query($conn, $sql2);
$list_mobile_category = mysqli_fetch_all($result2, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホームページ</title>
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
        }

        * {
            font-family: 'Times New Roman', Times, serif;
        }

        main {
            position: fixed;
            top: 40px;
            left: 30px;
            right: 30px;
            bottom: 50px;
            margin: 0 auto;
            padding: 20px;
            text-align: left;
            overflow: auto;
            width: 80%;
        }

        h1,
        .search {
            text-align: center;
        }

        .phoneList {
            border: 1px solid black;
            background-color: #EAE6E6;
            width: 20%;
            height: 400px;
            text-align: center;
            float: left;
            box-sizing: border-box;
        }

        .img {
            width: 200px;
            height: 200px;
        }

        .name {
            font-size: 20px;
            height: 45px;
        }

        .price,
        .info {
            font-size: 17px;
            height: 17px;
        }

        .edit,
        .delete {
            border: 1px solid black;
            height: 17px;
            padding: 5px;
            background-color: white;
            border-radius: 3px;
            width: 30px;
            font-size: 17px;
        }

        label {
            font-size: 17px;
        }

        input {
            width: 100px;
            height: 20px;
        }

        select {
            height: 25px;
        }

        .submit {
            width: 80px;
            height: 25px;
            font-size: 17px;
        }

        .add {
            border: 2px dashed black;
            width: 20%;
            height: 400px;
            text-align: center;
            float: left;
            box-sizing: border-box;
            padding-top: 150px;
            font-size: 40px;
        }

        .add:hover {
            background-color: #EAE6E6;
        }

        .paging {
            text-align: center;
            clear: both;
            height: 30px;
            padding: 20px;
        }

        .page,
        .previous,
        .next {
            padding: 10px;
            font-size: 17px;
            word-spacing: 10px;
        }

        .current_page {
            color: blue;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <header><?php include_once('Header.php'); ?></header>

    <main>
        <h1>携帯の一覧</h1>
        <div class="search">
            <form action="" method="GET">
                <label>携帯名: </label>
                <input type="text" name="mobile_name">
                <label>価格帯: </label>
                <input type="number" name="start_price" class="range"> ~ <input type="number" name="end_price" class="range">
                <label>種類: </label>
                <select name="mobile_category" class="select">
                    <option selected value="">種類を選択する</option>
                    <?php
                    foreach ($list_mobile_category as $category) {
                        $selected = $category_id == $category['id'] ? 'selected' : '';
                        echo "<option value='" . $category['id'] . "'>" . $category['category_name'] . "</option>";
                    }
                    ?>
                </select>
                <label>並び順: </label>
                <select name="sort" class="sort">
                    <option <?= $order_by == 1 ? 'selected' : ''; ?> value=1>安い順</option>
                    <option <?= $order_by == 2 ? 'selected' : ''; ?> value=2>高い順</option>
                </select>
                <input type="submit" name="submit" class="submit" value="検索">
            </form>
        </div>
        <br>
        <div class="list">
            <?php foreach ($list_mobile as $item) { ?>
                <div class="phoneList">
                    <img class="img" src="<?= $item['image'] ?>">
                    <p class='name'><b><?= $item['mobile_name'] ?></b></p>
                    <p class='price'><?= number_format($item['price']) ?> VND</p>
                    <a class='edit' href="Edit.php?id=<?= $item['id'] ?>">編集</a>
                    <a class='delete' href="Delete.php?id=<?= $item['id'] ?>">削除</a>
                    <p class='info'><?= $item['info'] ?></p>
                </div>
            <?php } ?>
        </div>
        <div class="add">
            <a href="Add.php">追加</a>
        </div>
        <br>
        <br>
        <div class="paging">
            <?php
            if ($current_page >= 1 && $total_page >= 1) {
                echo "<a class='previous' href='" . $url . "page=" . ($current_page - 1) . "'>前へ</a>";
            }
            for ($i = 1; $i <= $total_page; $i++) {
                if ($current_page == $i) {
                    echo "<span class='current_page'>$i</span>";
                } else {
                    echo "<a class='page' href='" . $url . "page=$i'>$i</a>";
                }
            }
            if ($current_page <= $total_page && $total_page >= 1) {
                echo "<a class='next' href='" . $url . "page=" . ($current_page + 1) . "'>次へ</a>";
            }
            ?>
        </div>
    </main>

    <footer><?php include_once('Footer.php'); ?></footer>
</body>

</html>
