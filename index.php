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
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <div class="row justify-content-between align-items-center py-4">
            <h5 class="text-center text-white border-start font-weight-bolder">商品展示</h5>
            <form id="search-product" class="d-flex justify-content-end align-items-center" method="post">
                <input type="search" name="search" id="search-input" class="form-control w-25 mx-1"
                    placeholder="請輸入商品名稱">
                <input type="number" name="min_price" id="min-price-input" class="form-control w-25 mx-1"
                    placeholder="最低價格">
                <input type="number" name="max_price" id="max-price-input" class="form-control w-25 mx-1"
                    placeholder="最高價格">
                <button type="submit" class="btn btn-secondary">查詢</button>
            </form>
            <div class="row justify-content-start mt-4" id="search-results">
                <?php foreach($result as $row) { ?>
                <?php if ($row["template"] == 1) { ?>
                <div class="col-6" style="height:380px">
                    <div class="d-flex text-center bg-back px-2 py-3 flex-wrap">
                        <div class="col-6">
                            <img src="./images/<?php echo $row["images"]; ?>" class="w-100" style="height: 225px"
                                alt="">
                            <div class="bg-2 w-100 h-20 mt-1 py-3 text-center text-light">相關連結:<a
                                    href="<?php echo $row["links"]; ?>"><?php echo $row["links"]; ?></a></div>
                        </div>
                        <div class="col-6">
                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">
                                商品名稱:<?php echo $row["product_name"]; ?></div>
                            <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">
                                商品簡介:<?php echo $row["product_des"]; ?></div>
                            <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">
                                發布日期:<?php echo $row["time"]; ?></div>
                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">
                                費用:<?php echo $row["price"]; ?> 元</div>
                        </div>
                        <div class="col-12 mt-2">
                            <?php
                                if ($_SESSION["AUTH"]["role"] == 0) {
                                    echo "<button class='btn btn-secondary btn-sm edit-product' data-toggle='modal' data-id='" . $row['id'] . "' data-target='#edit-product'>編輯</button>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php } else if ($row["template"] == 2) { ?>
                <div class="col-6" style="height:380px">
                    <div class="d-flex text-center bg-back px-2 py-3 flex-wrap">
                        <div class="col-6">
                            <div class="bg-1 w-100 h-20 mb-1 py-3 text-center text-light">
                                商品名稱:<?php echo $row["product_name"]; ?></div>
                            <img src="./images/<?php echo $row["images"]; ?>" class="w-100" style="height: 225px"
                                alt="">
                        </div>
                        <div class="col-6">
                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">
                                費用:<?php echo $row["price"]; ?> 元</div>
                            <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">
                                商品簡介:<?php echo $row["product_des"]; ?></div>
                            <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">
                                發布日期:<?php echo $row["time"]; ?></div>
                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">相關連結:<a
                                    href="<?php echo $row["links"]; ?>"><?php echo $row["links"]; ?></a></div>
                        </div>
                        <div class="col-12 mt-2">
                            <?php
                                if ($_SESSION["AUTH"]["role"] == 0) {
                                    echo "<button class='btn btn-secondary btn-sm edit-product' data-toggle='modal' data-id='" . $row['id'] . "' data-target='#edit-product'>編輯</button>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php } else if ($row["template"] == 3) { ?>
                <div class="col-6" style="height:380px">
                    <div class="d-flex text-center bg-back px-2 py-3 flex-wrap">
                        <div class="col-6">
                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">
                                商品名稱:<?php echo $row["product_name"]; ?></div>
                            <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">
                                商品簡介:<?php echo $row["product_des"]; ?></div>
                            <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">
                                發布日期:<?php echo $row["time"]; ?></div>
                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">
                                費用:<?php echo $row["price"]; ?> 元</div>
                        </div>
                        <div class="col-6">
                            <img src="./images/<?php echo $row["images"]
                                                        ?>" class="w-100" style="height: 225px" alt="">
                            <div class="bg-2 w-100 h-20 mt-1 py-3 text-center text-light">相關連結:<a
                                    href="<?php echo $row["links"]; ?>"><?php echo $row["links"]; ?></a></div>
                        </div>
                        <div class="col-12 mt-2">
                            <?php
                                if ($_SESSION["AUTH"]["role"] == 0) {
                                    echo "<button class='btn btn-secondary btn-sm edit-product' data-toggle='modal' data-id='" . $row['id'] . "' data-target='#edit-product'>編輯</button>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php } else if ($row["template"] == 4) { ?>
                <div class="col-6" style="height:380px">
                    <div class="d-flex text-center bg-back px-2 py-3 flex-wrap">
                        <div class="col-6">
                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">
                                費用:<?php echo $row["price"]; ?> 元</div>
                            <div class="bg-2 w-100 h-30 mt-1 py-4 text-center text-light">
                                商品簡介:<?php echo $row["product_des"]; ?></div>
                            <div class="bg-3 w-100 h-20 mt-1 py-3 text-center text-light">
                                發布日期:<?php echo $row["time"]; ?></div>
                            <div class="bg-1 w-100 h-20 mt-1 py-3 text-center text-light">
                                商品名稱:<?php echo $row["product_name"]; ?></div>
                        </div>
                        <div class="col-6">
                            <div class="bg-1 w-100 h-20 mb-1 py-3 text-center text-light">相關連結:<a
                                    href="<?php echo $row["links"]; ?>"><?php echo $row["links"]; ?></a></div>
                            <img src="./images/<?php echo $row["images"]; ?>" class="w-100" style="height: 225px"
                                alt="">
                        </div>
                        <div class="col-12 mt-2">
                            <?php
                                if ($_SESSION["AUTH"]["role"] == 0) {
                                    echo "<button class='btn btn-secondary btn-sm edit-product' data-toggle='modal' data-id='" . $row['id'] . "' data-target='#edit-product'>編輯</button>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="edit-product">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editLabel">修改商品內容</h5>
                            <button class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-sm px-5 py-4">
                                <form action="update_product.php" method="post">
                                    <div class="d-flex align-items-center justify-content-between my-3">
                                        <label for="">商品名稱:</label>
                                        <input type="text" class="form-control w-75" name="product_name"
                                            id="product_name">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between my-3">
                                        <label for="">商品描述:</label>
                                        <textarea class="form-control w-75" name="product_des"
                                            id="product_des"></textarea>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between my-3">
                                        <label for="">發布日期:</label>
                                        <?php
                                    $default_time = new DateTime('now', new DateTimeZone('Asia/Taipei'));
                                    $default_time_str = $default_time->format('Y-m-d\TH:i:s');
                                    ?>
                                        <input type="datetime-local" class="form-control w-75" name="time" id="time"
                                            value="<?= $default_time_str ?>">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between my-3">
                                        <label for="">當前圖片:</label>
                                        <img src="" class="w-50 h-50" alt="" id="img">
                                    </div>
                                    <div class="d-flex align-tiems-center justify-content-between">
                                        <label for="">選取圖片:</label>
                                        <div class="custom-file w-75">
    <input type="file" class="custom-file-input" id="images" name="images">
    <label class="custom-file-label" for="images">選擇檔案</label>
    </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between my-3">
                                        <label for="">費用:</label>
                                        <input type="text" class="form-control w-75" id="price" name="price">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between my-3">
                                        <label for="">相關連結:</label>
                                        <input type="text" class="form-control w-75" id="links" name="links">
                                    </div>
                                    <div class="text-right my-3">
                                        <input type="submit" class="btn btn-primary" id="save-product" value="儲存">
                                    </div>
                                    <input type="hidden" name="id" value="<?=$row["id"]?>" id="id">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/jquery-3.6.3.min.js"></script>
<script src="./js/bootstrap.js"></script>
<script src="./js/function.js"></script>

</html>