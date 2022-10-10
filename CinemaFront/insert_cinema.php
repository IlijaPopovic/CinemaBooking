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
            <h2>Insert cinema</h2>
            <div class="input">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="name" id="name" placeholder="Cinema name">
                    <input type="text" name="address" id="address" placeholder="Address">
                    <input type="text" name="city" id="city" placeholder="City">
                    <input type="text" name="phone_number" id="phone_number" placeholder="Phone number">
                    <label for="cinema_image">Choose cinema image: </label>
                    <input type="file" name="cinema_image" id="cinema_image">
                    <textarea name="about_cinema" id="about_cinema" cols="30" rows="10" placeholder="About cinema"></textarea>
                </form>
                <button class="insert">Insert new cinema</button>
            </div>
        </div>
    </div>

    <?php include 'page_parts/footer.php'; ?>

    <script src="scripts/insert_cinema.js"></script>
</body>

</html>