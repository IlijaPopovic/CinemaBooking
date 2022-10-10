<html lang="en">

<head>
    <?php
    include 'page_parts/page_head.php';
    ?>
    <link rel="stylesheet" href="styles/insert.css">
    <title>Cinema</title>
</head>

<body>
    <?php include 'page_parts/header.php'; ?>
    <div class="container">
        <div class="main">
            <h2>Insert tehnolgoy</h2>
            <div class="input">
                <form action="">
                    <input type="text" name="technology_name" id="technology_name" placeholder="Technology name">
                    <input type="text" name="technology_price" id="technology_price" placeholder="Technology price (Euro)">
                    <input type="text" name="technology_discount" id="technology_discount" placeholder="Technology discount (%)">
                </form>
                <button class="insert">Insert new tehnology</button>
            </div>
        </div>
    </div>

    <?php include 'page_parts/footer.php'; ?>

    <script src="scripts/insert_tehnology.js"></script>
</body>

</html>