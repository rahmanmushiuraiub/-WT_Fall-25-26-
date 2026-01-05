<!Doctype html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/login.css">
    
</head>


<body>



  
<form method="POST" action="../php/login.php">

    <center>
        <h2 class="w">Welcome to Event Organization</h2><br><br>

        <fieldset>
            <legend>Welcome back, please login</legend>

            <h2>Login</h2>

            <table>
                <tr>
                    <td class="a">Email</td>
                </tr>
                <tr>
                    <td>
                        <input type="email" name="email" placeholder="Enter your email" required>
                        <br><br>
                    </td>
                </tr>

                <tr>
                    <td class="b">Password</td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="password" placeholder="Enter your password" required>
                        <br><br>
                    </td>
                </tr>
            </table>

            <center>
                <input type="submit" class="button" value="Login">
                <a href="register.php" class="button">Register</a>
            </center>

        </fieldset>
    </center>

</form>

</body>
</html>

