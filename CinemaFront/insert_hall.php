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
            <h2>Insert hall</h2>
            <div class="input">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="name" id="name" placeholder="name">
                    <input type="text" name="number_seat" id="number_seat" placeholder="Number of seats in one row">
                    <input type="text" name="number_rows" id="number_rows" placeholder="Number of rows">
                    <input type="text" name="number_vip_rows" id="number_vip_rows" placeholder="Number of vip rows">
                    <label for="hall_picture">Choose hall picture: </label>
                    <input type="file" name="hall_picture" id="hall_picture">
                    <input type="text" name="screen_size" id="screen_size" placeholder="Screen size (in cubic meters)">
                    <select name="cinema_id" id="cinema_id">
                        <option value="choose">Choose cinema</option>
                    </select>
                    <select name="technology_id" id="technology_id">
                        <option value="choose">Choose tehnologiju</option>
                    </select>
                </form>
                <button class="insert">Insert new hall</button>
            </div>
        </div>
    </div>

    <?php include 'page_parts/footer.php'; ?>

    <script src="scripts/insert_hall.js"></script>
</body>

</html>