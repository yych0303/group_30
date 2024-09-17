
<?php
include "link.php";
$rows= "";
// // 資料庫查詢(送出查詢的SQL指令) where 商品類別='cpu'
if ($result = mysqli_query($link, "SELECT * FROM 商品清單 ORDER BY item_id")) {
    while ($row = mysqli_fetch_row($result)) {
        
        $rows .= "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td><img src='./images/item/$row[3]' height='200px' width='200px' /></td><td>". $row[4] . "</td></tr>";
    }
    $num = mysqli_num_rows($result); //查詢結果筆數
    mysqli_free_result($result); // 釋放佔用的記憶體
}

mysqli_close($link); // 關閉資料庫連結
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>資料庫查詢</title>
    <style>
        table {
            width: 500px;
            margin: 0 auto;
            border: 1px solid;
            border-collapse: collapse;
        }

        tr, td, th {
            border: 1px solid;
            text-align: center
        }
        caption{
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <table>
        <!-- <tr>
            <th>學號</th>
            <th>姓名</th>
            <th>地址</th>
        </tr> -->
        <?php echo $rows; ?>
    </table>
</body>

</html>