<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href=" ../css/register.css">
    
</head>

<body>
    

    <div class="a">
        <h2>Create Account</h2>

        <form method="POST" action="../php/validation.php">


    <label>Full Name</label>
    <input type="text" name="fullname" placeholder="Enter your name" required>

    <label>Phone Number</label>
    <input type="text" name="phone" placeholder="Enter your phone number" required>

    <label>Email</label>
    <input type="email" name="email" placeholder="Enter your email" required>

    <label>Password</label>
    <input type="password" name="password" placeholder="Create a password" required>

    <input type="submit" value="register">
</form>



        <div class="login">
            Already have an account? <a href="login.php">Login</a>
        </div>
    </div>

    


</body>
</html>
