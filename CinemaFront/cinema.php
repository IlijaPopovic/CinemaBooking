<html lang="en">

<head>
    <?php
    include 'page_parts/page_head.php';
    ?>
    <link rel="stylesheet" href="styles/cinema.css">
    <title>Cinema</title>
</head>

<body>
    <?php include 'page_parts/header.php'; ?>

    <div class="container">
        <div class="main">
            <h2></h2>
            <div class="cinema_image"></div>
            <div class="information_cinema">
                <h3>Informations</h3>
            </div>
            <div class="something_about_cinema">
                <h3>Something about cinema</h3>
            </div>
            <div class="cinema_halls">
                <h3>Cinema halls</h3>
                <div class="list_halls_cinema"></div>
            </div>
        </div>
    </div>

    <?php include 'page_parts/footer.php'; ?>
    <script src="scripts/cinema.js"></script>
</body>

</html>