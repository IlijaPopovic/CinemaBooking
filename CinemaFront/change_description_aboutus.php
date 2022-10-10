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
            <h2>Change text about us</h2>
            <div class="input">
                <textarea name="about_us_text" id="about_us_text" cols="30" rows="50"></textarea>
                <button class="insert">change text</button>
            </div>
        </div>
    </div>

    <?php include 'page_parts/footer.php'; ?>

    <script src="scripts/change_description_aboutus.js"></script>
</body>

</html>