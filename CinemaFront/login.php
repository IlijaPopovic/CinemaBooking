<html lang="en">

<head>
    <?php
    include 'page_parts/page_head.php';
    ?>
    <link rel="stylesheet" href="styles/login.css">
    <title>Cinema</title>
</head>

<body>
    <?php include 'page_parts/header.php'; ?>


    <div class="container">
        <div class="login_insert">
            <h2>Log in</h2>
            <div class="login">
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="password" name="password" id="password" placeholder="Password">
                <button class="uloguj_se">Log in</button>
                <a href="registration.php">Create a profile here</a>
            </div>
        </div>
    </div>


    <?php include 'page_parts/footer.php'; ?>
    <script src="scripts/login.js"></script>
</body>

</html>