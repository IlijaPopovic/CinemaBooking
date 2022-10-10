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
            <h2>Change profilse</h2>
            <div class="input">
                <form>
                    <input type="text" name="name" id='name' placeholder="Name">
                    <input type="text" name="surname" id='surname' placeholder="Surname">
                    <input type="text" name="date_of_birth" id='date_of_birth' placeholder="Date of birth (dd.mm.yy Example: 7.13.1989)">
                    <input type="text" name="mail" id='mail' placeholder="Mail">
                    <input type="text" name="phone_number" id='phone_number' placeholder="Phone number">
                    <input type="text" name="user_name" id='user_name' placeholder="User name">
                    <input type="text" name="address" id='address' placeholder="Address">
                    <input type="text" name="city" id='city' placeholder="City">
                    <input type="password" name="password" id='password' placeholder="Password">
                    <input type="hidden" name="potvrdi_sifru" id='potvrdi_sifru' placeholder="Chek password" value="easteregg">
                </form>
                <button class="insert">Change profile</button>
            </div>
        </div>
    </div>

    <?php include 'page_parts/footer.php'; ?>

    <script src="scripts/change_profile.js"></script>
</body>

</html>