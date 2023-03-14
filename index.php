<?php
    require_once("pdo.php");
    session_start();
    if(!isset($_SESSION["AUTH"])){
        header("Location: login.php");
    }
    try{
        extract($_POST);
        $sql = "SELECT * FROM `products` ORDER BY `products`.`time` DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>商店首頁</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">
                <img src="./images/logos.png" class="logo mx-3" alt="">
                <span>咖啡商品展示系統</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ml-auto my-2" style="max-height: 100px;">
                    <li class="nav-item">
                        <?php echo $_SESSION["AUTH"]["role"] == 0 ? '<a class="nav-link" href="create_product.php">上架商品</a>' : ''; ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $_SESSION["AUTH"]["role"] == 0 ? '<a class="nav-link" href="member_list.php">會員管理</a>' : ''; ?>
                    </li>
                    <li class="nav-item">
                        <?php echo isset($_SESSION["AUTH"]) ? '<a class="nav-link btn btn-outline-warning" href="logout.php">登出</a>' : ''; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top: 86px" ;>
        <div class="row justify-content-between align-items-center">
            <h5 class="text-center text-white border-start font-weight-bolder">商品展示</h5>
            <form id="search-product" class="d-flex justify-content-end align-items-center" action="search_product.php"
                method="post">
                <input type="search" name="search" id="search-input" class="form-control w-25 mx-1"
                    placeholder="請輸入商品名稱">
                <input type="number" name="min_price" id="min-price-input" class="form-control w-25 mx-1"
                    placeholder="最低價格">
                <input type="number" name="max_price" id="max-price-input" class="form-control w-25 mx-1"
                    placeholder="最高價格">
                <button type="submit" class="btn btn-secondary">查詢</button>
            </form>
        </div>
    </div>
</body>
<script src="./js/jquery-3.6.3.min.js"></script>
<script src="./js/bootstrap.js"></script>
<script src="./js/function.js"></script>

</html>