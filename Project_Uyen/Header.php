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

        header {
            background: #FFA07A;
            height: 70px;
            position: fixed;
            padding: 0;
            top: 0;
            left: 0;
            width: 100%;
        }

        a {
            text-decoration: none;
            color: black;
            font-size: 18px;
        }

        a:hover {
            background-color: #EAE6E6;
        }

        .logout {
            height: 25px;
            padding: 10px 10px 3px 10px;
            border: 1px solid black;
            background-color: white;
            border-radius: 10px;
            float: right;
            position: fixed;
            top: 13px;
            right: 50px;
        }

        ul {
            display: inline-block;
            letter-spacing: -1em;
            margin-left: 17%;
            margin-right: 10%;
            margin-top: 1%;
            position: fixed;
        }

        li:hover {
            background-color: #EAE6E6;
        }

        li {
            list-style: none;
            display: inline-block;
            border: 1px solid grey;
            padding: 10px;
            width: 150px;
            margin: 0;
            letter-spacing: normal;
            text-align: center;
            background-color: white;
        }
    </style>
</head>

<body>
    <header>
        <form action="" method="POST" enctype="multipart/form-data">
            <a class="logout" name="logout" href="Logout.php"><?= "ログアウト"; ?></a>
            <ul>
                <li><a href=#><?= "携帯"; ?></a></li>
                <li><a href=#><?= "ノートパソコン"; ?></a></li>
                <li><a href=#><?= "タブレット"; ?></a></li>
                <li><a href=#><?= "周辺機器"; ?></a></li>
                <li><a href=#><?= "スマートウォッチ"; ?></a></li>
            </ul>
        </form>
    </header>
</body>

</html>
