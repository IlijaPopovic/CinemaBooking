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
            <h2>Registration</h2>
            <div class="input">
                <form>
                    <input type="text" name="name" id='name' placeholder="name">
                    <input type="text" name="surname" id='surname' placeholder="surname">
                    <input type="text" name="date_of_birth" id='date_of_birth' placeholder="date of birth ( dd.mm.yy Example: 28.7.1989 )">
                    <input type="text" name="mail" id='mail' placeholder="Mail">
                    <input type="text" name="phone_number" id='phone_number' placeholder="Phone number">
                    <input type="text" name="user_name" id='user_name' placeholder="Username">
                    <input type="password" name="password" id='password' placeholder="Password">
                    <input type="text" name="address" id='address' placeholder="Address">
                    <input type="text" name="city" id='city' placeholder="City">
                </form>
                <button class="insert">Create profile</button>
            </div>
        </div>
    </div>

    <?php include 'page_parts/footer.php'; ?>

    <script src="scripts/registration.js"></script>
</body>

</html>