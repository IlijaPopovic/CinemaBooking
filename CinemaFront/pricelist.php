<html lang="en">

<head>
    <?php
    include 'page_parts/page_head.php';
    ?>
    <link rel="stylesheet" href="styles/pricelist.css">
    <title>Cinema</title>
</head>

<body>
    <?php include 'page_parts/header.php'; ?>
    <div class="container">
        <div class="main">
            <h2>Pricelist</h2>
            <table class="table">
                <tr>
                    <th>Technology</th>
                    <th>Price</th>
                    <th>Discount </th>
                </tr>
            </table>

            <div class="technology_discounts"></div>
        </div>
    </div>

    <?php include 'page_parts/footer.php'; ?>

    <script src="scripts/pricelist.js"></script>
</body>

</html>