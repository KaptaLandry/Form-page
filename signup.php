<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style.css">
    <title>Registration Page</title>
</head>
<body>
<section>
        <header>
        <h2>Kap😎DrY</h2>
            <nav>
                <div>
                    <ul>
                        <li><a href="signup.php">HOME</a></li>
                        <li><a href="#">ABOUT</a></li>
                        <li><a href="#">PRODUCT</a></li>
                        <li><a href="#">SERVICES</a></li>
                        <li><a href="#">CONTACT</a></li>
                    </ul>
                </div>

               
            </nav>

        </header>

       

        <footer>
            <div class="form">
                <h2>SIGNUP</h2><br>
                <form action="Includes/signup.inc.php" method="post">
                    <input type="text" name="name" placeholder="UserName:"><br>
                    <input type="email" name="email" placeholder="Email:"><br>
                    <input type="password" name="pass" placeholder="Password:"><br>
                    <input type="password" name="pass1" placeholder="Confirm password:"><br>
                    <input type="text" name="tel" placeholder="Telephone:"><br>
                    <input type="submit" value="SIGNUP" name="submit">
                    <!-- <input type="checkbox" name ="remember" value = "on">Remember Me -->
                    <p>Already have an account?
                    <a href="login.php">Login</a></p>
                </form>
            
            </div>
</body>
</html>