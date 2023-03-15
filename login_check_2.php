<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>二次驗證</title>
    <style>
    td {
        width: 180px;
        height: 180px;
        border: 2px solid #fff;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-center">
            <table>
                <tr>
                    <td data-id="1"></td>
                    <td data-id="2"></td>
                </tr>
                <tr>
                    <td data-id="3"></td>
                    <td data-id="4"></td>
                </tr>
            </table>
            <div class="text-center">
                <p class="py-3 m-0 text-white">請選擇兩個相鄰的格子，以連成一條水平或垂直線。</p>
                <button id="checkit" class="btn btn-outline-light">驗證</button>
            </div>
        </div>
    </div>
</body>
<script src="./js/jquery-3.6.3.min.js"></script>
<script src="./js/function.js"></script>

</html>