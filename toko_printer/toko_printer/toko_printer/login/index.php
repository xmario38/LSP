<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <img src="bg1.svg" alt="" class="bg">
    <div class="container">
       <center> <h2><i>PRINTER DIESEL</i></h2></center>
        <center><h3>Silahkan Masukan Akun Anda!</h3></center>
        <form action="process.php" method="POST">
            <label>Username</label>
            <input type="text" name="username" class="form-control" id=""> <br /><br />

        <label>Password</label>
        <input type="password" name="password" class="form-control" id=""> <br /><br />
        
        <button type="submit" name="login">Login</button>

        <div class="register">
            <small>Belum punya akun? <br/>
            <a href="../register/index.php">Register!</a></small>
        </div>
        </form>
    </div>
</body>
</html>