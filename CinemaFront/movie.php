<html lang="en">

<head>
    <?php
    include 'page_parts/page_head.php';
    ?>
    <link rel="stylesheet" href="styles/movie.css">
    <title>Cinema</title>
</head>

<body>
    <?php include 'page_parts/header.php'; ?>
    <div class="container">
        <div class="main">
            <h2></h2>
            <div class="trailer">
                <div class="youtube"></div>
                <div class="average_grade"></div>
            </div>
            <div class="about_movie">
                <div class="image"></div>
                <table class="table"></table>
            </div>
            <div class="content">
                <h3>Content</h3>
            </div>
            <div class="projections">
                <h3>Projections</h3>
                <select>
                    <option value="choose_cinema">Choose cinema</option>
                </select>
                <table class="table_projection">
                    <thead>

                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="comments">
                <h3>Comments</h3>
                <table class="comments_table"></table>
            </div>
            <div class="leave_comment">
                <h3>Leave comment and grade</h3>
            </div>
        </div>
    </div>
    <?php include 'page_parts/footer.php'; ?>
    <script src="scripts/movie.js"></script>
</body>

</html>