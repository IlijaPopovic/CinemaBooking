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
            <h2>Insert projection</h2>
            <div class="input">
                <form action="">
                    <input type="datetime-local" name="projection_date" id='projection_date' placeholder="date and time of projection (dd.mm.yy h:m Example: 7.13.2022 16:35)">
                    <select name="movie_id" id="movie_id">
                        <option value="choose">Choose movie</option>
                    </select>
                    <select name="hall_id" id="hall_id">
                        <option value="choose">Choose hall</option>
                    </select>
                </form>
                <button class="insert">insert new projection</button>
            </div>
        </div>
    </div>

    <?php include 'page_parts/footer.php'; ?>

    <script src="scripts/insert_projection.js"></script>
</body>

</html>