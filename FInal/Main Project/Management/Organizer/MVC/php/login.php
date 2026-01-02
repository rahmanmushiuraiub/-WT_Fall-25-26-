<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

    <form method="POST" action="../php/process.php">

        <center>
            <fieldset>

                <legend>Welcome back, please login</legend>

                <h2>Login</h2>

                <table>
                    <tr>
                        <td class="a">Email</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="email" id="email" placeholder="Enter your email">
                            <br><br>
                        </td>
                    </tr>

                    <tr>
                        <td class="b">Password</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" name="password" id="password" placeholder="Enter your password">
                            <br><br>
                        </td>
                    </tr>
                </table>

                <center>
                    <input type="submit" value="Submit">
                    <input type="reset" value="Clear">
                </center>

            </fieldset>
        </center>

    </form>

    <!-- Auto clear fields after submit -->
    <script>
        document.querySelector("form").addEventListener("submit", function () {
            this.reset();
        });
    </script>

</body>
</html>
