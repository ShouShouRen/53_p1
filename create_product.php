<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>建立商品</title>
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
                        <a href="index.php" class="btn btn-outline-warning">離開</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-3" style="margin-top: 86px;">
        <div class="row justify-content-between align-items-center py-3">
            <h5 class="border-start text-light">上架管理</h5>
        </div>
        <div class="row">
            <div class="col-12 bg-white p-3 shadow-lg rounded-lg" style="min-height: 780px">
                <ul class="nav nav-tabs" id="tab">
                    <li class="nav-item">
                        <a href="#chose" class="nav-link active" id="chose-tab" data-toggle="tab">選擇版醒</a>
                    </li>
                    <li class="nav-item">
                        <a href="#input" class="nav-link" id="input-tab" data-toggle="tab">填寫資料</a>
                    </li>
                    <li class="nav-item">
                        <a href="#preview" class="nav-link" id="preview-tab" data-toggle="tab">商品預覽</a>
                    </li>
                    <li class="nav-item">
                        <a href="#submit" class="nav-link" id="submit-tab" data-toggle="tab">確認送出</a>
                    </li>
                </ul>
                <form action="store_product.php" method="post" enctype="multipart/form-data">
                    <div class="tab-content" id="tabcontent">
                        <div class="tab-pane fade show active" id="chose">
                            <div class="container my-3">
                                <div class="text-right">
                                    <button class="btn btn-secondary" type="button">新增版型</button>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-6 d-flex" style="height:380px">
                                        <div class="col-6 h-100 bg-back p-3 text-center text-light">
                                            <div
                                                class="bg-1 w-100 h-75 d-flex justify-content-center align-items-center">
                                                <p>圖片</p>
                                            </div>
                                            <div class="bg-2 w-100 h-20 mt-1 py-3">相關連結</div>
                                        </div>
                                        <div class="col-6 h-100 bg-back p-3 text-center text-light">
                                            <div class="bg-1 w-100 h-20 mt-1 py-3">商品名稱</div>
                                            <div class="bg-2 w-100 h-30 mt-1 py-4">商品簡介</div>
                                            <div class="bg-3 w-100 h-20 mt-1 py-3">發布日期</div>
                                            <div class="bg-1 w-100 h-20 mt-1 py-3">費用</div>
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex" style="height:380px">
                                        <div class="col-6 h-100 bg-back p-3 text-center text-light">
                                            <div class="bg-1 w-100 h-20 mb-1 py-3">商品名稱</div>
                                            <div
                                                class="bg-2 w-100 h-75 d-flex justify-content-center align-items-center">
                                                <p>圖片</p>
                                            </div>
                                        </div>
                                        <div class="col-6 h-100 bg-back p-3 text-center text-light">
                                            <div class="bg-1 w-100 h-20 mt-1 py-3">費用</div>
                                            <div class="bg-2 w-100 h-30 mt-1 py-4">商品簡介</div>
                                            <div class="bg-3 w-100 h-20 mt-1 py-3">發布日期</div>
                                            <div class="bg-1 w-100 h-20 mt-1 py-3">相關連結</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2 text-center">
                                    <div class="col-6">
                                        商品版型1:
                                        <input type="radio" name="template" id="template1" value="1">
                                    </div>
                                    <div class="col-6">
                                        商品版型2:
                                        <input type="radio" name="template" id="template2" value="2">
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-6 d-flex" style="height:380px">
                                        <div class="col-6 h-100 bg-back p-3 text-center text-light">
                                            <div class="bg-1 w-100 h-20 mt-1 py-3">商品名稱</div>
                                            <div class="bg-2 w-100 h-30 mt-1 py-4">商品簡介</div>
                                            <div class="bg-3 w-100 h-20 mt-1 py-3">發布日期</div>
                                            <div class="bg-1 w-100 h-20 mt-1 py-3">費用</div>
                                        </div>
                                        <div class="col-6 h-100 bg-back p-3 text-center text-light">
                                            <div
                                                class="bg-1 w-100 h-75 d-flex justify-content-center align-items-center">
                                                <p>圖片</p>
                                            </div>
                                            <div class="bg-2 w-100 h-20 mt-1 py-3">相關連結</div>
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex" style="height:380px">
                                        <div class="col-6 h-100 bg-back p-3 text-center text-light">
                                            <div class="bg-1 w-100 h-20 mt-1 py-3">費用</div>
                                            <div class="bg-2 w-100 h-30 mt-1 py-4">商品簡介</div>
                                            <div class="bg-3 w-100 h-20 mt-1 py-3">發布日期</div>
                                            <div class="bg-1 w-100 h-20 mt-1 py-3">商品名稱</div>
                                        </div>
                                        <div class="col-6 h-100 bg-back p-3 text-center text-light">
                                            <div class="bg-2 w-100 h-20 mb-1 py-3">相關連結</div>
                                            <div
                                                class="bg-1 w-100 h-75 d-flex justify-content-center align-items-center">
                                                <p>圖片</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2 text-center">
                                    <div class="col-6">
                                        商品版型3:
                                        <input type="radio" name="template" id="template3" value="3">
                                    </div>
                                    <div class="col-6">
                                        商品版型4:
                                        <input type="radio" name="template" id="template4" value="4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="input">
                            <div class="d-flex justify-content-center">
                                <div class="col-8">
                                    <div class="bg-white p-4 rounded-lg">
                                        <h4 class="text-center my-5">填寫資料</h4>
                                        <div class="d-flex align-items-center justify-content-between my-3">
                                            <label for="">商品標題:</label>
                                            <input type="text" class="form-control w-75" name="product_name">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between my-3">
                                            <label for="">商品描述:</label>
                                            <textarea name="product_des" class="form-control w-75"></textarea>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between my-3">
                                            <label for="">發布日期:</label>
                                            <?php
                                            $default_time = new DateTime('now', new DateTimeZone('Asia/Taipei'));
                                            $default_time_str = $default_time->format('Y-m-d\TH:i:s');
                                            ?>
                                            <input type="datetime-local" class="form-control w-75" name="time"
                                                value="<?php echo $default_time_str ?>">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between my-3">
                                            <label for="">圖片:</label>
                                            <input type="file" name="images">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between my-3">
                                            <label for="">費用:</label>
                                            <input type="text" class="form-control w-75" name="price">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between my-3">
                                            <label for="">相關連結:</label>
                                            <input type="text" class="form-control w-75" name="links">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="preview">

                        </div>
                        <div class="tab-pane fade" id="submit">
                            <div class="d-center">
                                <button class="btn btn-primary" type="submit">確認送出</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="./js/jquery-3.6.3.min.js"></script>
<script src="./js/bootstrap.js"></script>
<script src="./js/template.js"></script>
</html>