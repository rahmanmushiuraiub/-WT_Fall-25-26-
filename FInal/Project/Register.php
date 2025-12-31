<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>

    <style>
        body{
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
        }

        .a{
            width: 400px;
            background-color: white;
            margin: 80px auto;
            padding: 30px;
            border-radius: 10px;
            
        }

        h2{
            text-align: center;
            color: #003366;
            margin-bottom: 20px;
        }

        label{
            font-size: 14px;
            color: #333;
        }

        input{
            width: 100%;
            padding: 10px;
            margin: 6px 0 15px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button{
            width: 100%;
            padding: 10px;
            background-color: #003366;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        
        .login{
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login a{
            text-decoration: none;
            color: #003366;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="a">
        <h2>Create Account</h2>

    <form method="post" action="validate.php">
    <label>Full Name</label>
    <input type="text" id="fname" name="fullname" placeholder="Enter your name" required>

    <label>Phone Number</label>
    <input type="text" id="pnumber" name="phone" placeholder="Enter your phone number" required>

    <label>Email</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>

    <label>Password</label>
    <input type="password" id="password" name="password" placeholder="Create a password" required>

    <button type="submit">Register</button>
</form>


            <button type="submit">Register</button>
        </form>

        <div class="login">
            Already have an account? <a href="login.php">Login</a>
        </div>
    </div>

</body>
</html>
