<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$filter_sql = "";

if (isset($_POST['filter_type']) && $_POST['filter_type'] === 'date' && !empty($_POST['filter_date'])) {
    $filter_date = $_POST['filter_date'];
    $filter_sql = " WHERE DATE(Sales.sale_date) = '$filter_date'";
} elseif (isset($_POST['filter_type']) && $_POST['filter_type'] === 'month_year') {
    if (!empty($_POST['filter_month']) && !empty($_POST['filter_year'])) {
        $filter_month = $_POST['filter_month'];
        $filter_year = $_POST['filter_year'];
        $filter_sql = " WHERE MONTH(Sales.sale_date) = '$filter_month' AND YEAR(Sales.sale_date) = '$filter_year'";
    } elseif (!empty($_POST['filter_month'])) {
        $filter_month = $_POST['filter_month'];
        $filter_sql = " WHERE MONTH(Sales.sale_date) = '$filter_month'";
    } elseif (!empty($_POST['filter_year'])) {
        $filter_year = $_POST['filter_year'];
        $filter_sql = " WHERE YEAR(Sales.sale_date) = '$filter_year'";
    }
}

$sql = "SELECT Sales.sale_date, Sales.user_id, Users.username, 
        GROUP_CONCAT(Sales.p_name_copy SEPARATOR ', ') AS products,
        SUM(Sales.quantity) AS total_quantity,
        SUM(Sales.total_price) AS total_price
        FROM Sales 
        JOIN Users ON Sales.user_id = Users.user_id
        $filter_sql
        GROUP BY Sales.sale_date, Sales.user_id
        ORDER BY Sales.sale_date DESC";

$sales = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Bai Jamjuree', sans-serif;
            background: linear-gradient(to right, #769FCD, #B9D7EA);
            margin: 0;
            padding: 0;
        }

        .holding-container {
            margin: auto;
            width: 90%;
            background-color: #F7FBFC;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            height: 380px;
            overflow-y: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #F7FBFC;
            font-size: 16px;
        }

        thead {
            background-color: #0D4C92;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #0D4C92 !important;
            color: white !important;
            font-weight: bold;
        }

        .back-home {
            position: absolute;
            top: 18px;
            right: 20px;
            font-size: 15px;
            padding: 8px 15px;
            border: 2px solid #0D4C92;
            border-radius: 5px;
            background-color: white;
            color: #0D4C92;
            font-weight: bold;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .back-home:hover {
            background-color: #0D4C92;
            color: white;
        }

        h2 {
            text-align: center;
            padding-top: 20px;
            font-size: 35px;
            font-weight: bold;
            color:rgb(0, 0, 0);
        }

        h3 {
            text-align: center;
            padding-top: 1px;
            font-size: 20px;
            font-weight: bold;
            color:rgb(0, 0, 0);
        }

        .filter-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .filter-form {
            display: flex;
            gap: 20px;
            align-items: flex-end;
            flex-wrap: wrap;
            justify-content: center;
        }

        .filter-item {
            display: flex;
            flex-direction: column;
            min-width: 150px;
        }

        .filter-form input[type="date"],
        .filter-form input[type="number"] {
            padding: 10px;
            font-size: 14px;
            width: 100%;
        }

        .filter-form button {
            padding: 10px 15px;
            background-color: #0D4C92;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            white-space: nowrap;
        }

        .filter-form button:hover {
            background-color: #0A3C74;
        }
    </style>
</head>
<body>
    <h2>📊 Sales Report</h2>
    <h3>ราคาขายต่อใบเสร็จ</h3>
    <a href="index.php" class="back-home">🔙 กลับหน้าหลัก</a>

    <div class="filter-container">
        <form method="post" action="" class="filter-form">
            <!-- Date Filter + Its Own Button -->
            <div class="filter-item">
                <label for="filter_date">เลือก วัน/เดือน/ปี:</label>
                <input type="date" id="filter_date" name="filter_date">
            </div>
            <div class="filter-item">
                <button type="submit" name="filter_type" value="date">กรอง</button>
            </div>

            <!-- Month Filter -->
            <div class="filter-item">
                <label for="filter_month">เลือกเดือน:</label>
                <input type="number" id="filter_month" name="filter_month" min="1" max="12" step="1">
            </div>

            <!-- Year Filter -->
            <div class="filter-item">
                <label for="filter_year">เลือกปี:</label>
                <input type="number" id="filter_year" name="filter_year" min="2000" max="2100">
            </div>

            <!-- Combined Filter Button -->
            <div class="filter-item">
                <button type="submit" name="filter_type" value="month_year">กรอง</button>
            </div>
        </form>
    </div>

    <div class="holding-container">
        <table>
            <thead>
                <tr>
                    <th>วันที่ขาย</th>
                    <th>สินค้า</th>
                    <th>จำนวนรวม</th>
                    <th>ราคารวม</th>
                    <th>พนักงาน</th>
                </tr>
            </thead>
            <tbody>
    <?php 
    $grand_total_price = 0;
    while ($row = $sales->fetch_assoc()) { 
        $grand_total_price += $row['total_price'];
    ?>
    <tr>
        <td><?= htmlspecialchars($row['sale_date']) ?></td>
        <td><?= htmlspecialchars($row['products']) ?></td>
        <td><?= $row['total_quantity'] ?></td>
        <td><?= number_format($row['total_price'], 2) ?> บาท</td>
        <td><?= htmlspecialchars($row['username']) ?></td>
    </tr>
    <?php } ?>
    <!-- Summary Row -->
    <tr style="font-weight: bold; background-color: #dfefff;">
        <td colspan="3" style="text-align: right;">รวมทั้งหมด:</td>
        <td><?= number_format($grand_total_price, 2) ?> บาท</td>
        <td></td>
    </tr>
</tbody>

        </table>
    </div>
</body>
</html>
