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
            <h2>Insert movie</h2>
            <div class="input">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="name" id="name" placeholder="Movie name">
                    <input type="text" name="language" id="language" placeholder="Movie language">
                    <input type="text" name="lenght" id="lenght" placeholder="Movie lenght ( in minutes )">
                    <input type="date" name="beginning" id="beginning" placeholder="Start date movie ( dd.mm.yy Example: 28.7.2022 )">
                    <input type="text" name="genre" id="genre" placeholder="Movie genre ( Split them with , )">
                    <input type="text" name="actors" id="actors" placeholder="Movie actors ( Split them with ,)">
                    <label for="poster">Choose movie poster: </label>
                    <input type="file" name="poster" id="poster">
                    <textarea cols="30" rows="10" type="text" name="description" id="description" placeholder="Movie description"></textarea>
                    <textarea cols="30" rows="5" type="text" name="trailer_youtube" id="trailer_youtube" placeholder="YouTube embed code"></textarea>
                </form>
                <button class="insert">Insert movie</button>
            </div>
        </div>
    </div>

    <?php include 'page_parts/footer.php'; ?>

    <script src="scripts/insert_movie.js"></script>
</body>

</html>