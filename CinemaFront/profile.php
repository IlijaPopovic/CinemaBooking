<html lang="en">

<head>
    <?php
    include 'page_parts/page_head.php';
    ?>
    <link rel="stylesheet" href="styles/profile.css">
    <title>Cinema</title>
</head>

<body>
    <?php include 'page_parts/header.php'; ?>

    <div class="container">
        <h2>My profile</h2>
        <div class="about_user">
            <h3>About user</h3>
            <table class="table_user"></table>
            <button class="change">Change</button>
            <button class="log_out">Log out</button>
        </div>
        <div class="user_reservation">
            <h3>User reservation</h3>
            <table class="table_reservation">
                <thead></thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <?php include 'page_parts/footer.php'; ?>
    <script src="scripts/profile.js"></script>
</body>

</html>