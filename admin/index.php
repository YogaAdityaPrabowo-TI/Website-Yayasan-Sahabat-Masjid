<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>

    
    <div class="container">
        <h2>Silahkan masukkan username dan password</h2>

        <div class="wadah">
        <form action="newlogin.php" method="post">

        <h2>ADMIN WEBSITE</h2>

        <div class= "eror">
        <?php if (isset($_GET['error'])) { ?>

        <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>
        </div>
        
        <div class="username">
            <label>UserName</label>

            <input type="text" name="username" placeholder="UserName"><br>
        

            <label>Password</label>

            <input type="password" name="password" placeholder="Password"><br> 
            <br><br>
        </div>

        <div class= "login">
            <button type="submit">Login</button>
        </div>

        </form>
    </div>
    </div>

</body>

</html>