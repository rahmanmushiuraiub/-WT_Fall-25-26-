<!DOCTYPE html>
    <html>
<head>
 <title>Student Registration Section</title>
</head>
<body><center>
    <table>
        <tr><td>
             Full Name:
        </td></tr>
        <tr><td>
        <input type="text"id="name"></td>
    </tr>

    <tr><td>
          Email:
        </td></tr>
        <tr><td>
        <input type="text"id="email"></td>
    </tr>
    <tr><td>
       Password:
        </td></tr>
        <tr><td>
        <input type="text"id="password"></td>
    </tr>
    <tr><td>
       Confirm Password:
        </td></tr>
        <tr><td>
        <input type="text"id="confirm"></td>
    </tr>
     <tr><td>
            <button onclick="validation()">Register</button>
            <div id="error"></div>

        </td></tr>
     </center>

          <script>
    function validation() {
        var name = document.getElementById("name").value.trim();
        var email = document.getElementById("email").value.trim();
        var password = document.getElementById("password").value.trim();
        var confirm= document.getElementById("confirm").value.trim();

        var errorDiv = document.getElementById("error");
        

        if (name === "" || email === "" || password === "" || confirm === "") {
        errorDiv.innerHTML = "⚠ All fields are required!";
        return;
    }
        errorDiv.innerHTML = "✔ Successfully Submitted!";
  
    
}

git add

</script>

</body>
</html>
