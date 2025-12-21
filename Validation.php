<html>
<head>
    <title>PHP Code</title>
</head>
 
<body>
<h1>This is PHP Class</h1>
 
<?php
$name = "";
$age = "";
$email="";
$dob="";
$gender="";
$nameerror = "";
$ageerror = "";
$emailerror="";
$doberror="";
$gendererror="";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (empty($_POST["name"])) {
        $nameerror = "Enter your Name";
    } else {
        $name = text_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name) ) {

            $nameerror = "Please enter a valid name";
        }

        if (str_word_count($name) < 2) {
    $nameerror = "Name must contain at least two words";
}
    }

 
 
    if (empty($_POST["age"])) {
        $ageerror = "Enter your Age";
    } else {
        $age = text_input($_POST["age"]);
        if (!is_numeric($age) || $age <= 0) {
            $ageerror = "Please enter a valid age";
        }
    }
    if (empty($_POST["email"])) {
        $ageerror = "Enter your email";
    } 
    else{
            $email = text_input($_POST["email"]);

           if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/", $email)) {
                $emailerror = "Please enter a valid email address (e.g., anything@example.com).";
            }
        }

        if (empty($_POST["gender"])) {
            $gendererror = "Gender cannot be empty.";
        } else {
            $gender = text_input($_POST["gender"]);
        }

    }

   /* if (empty($_POST["dob"])) {
        $doberror = "Enter your date of birth";
    } 
    else{
            $dob = date_input($_POST["dob"]);
              $doberror = " ";
            }*/
        

    


 
function text_input($data)
{
    return trim($data);
}
?>
 
<form method="post" action="">
    Name:
    <input type="text" name="name" value="<?php echo $name; ?>">
    <span style="color:red"><?php echo $nameerror; ?></span>
    <br><br>
 
    Age:
    <input type="text" name="age" value="<?php echo $age; ?>">
    <span style="color:red"><?php echo $ageerror; ?></span>
    <br><br>
    
 Email:
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span style="color:red"><?php echo $emailerror; ?></span>
    <br><br>
    
Date of Birth:
    <input type="date" name="dob" value="<?php echo $dob; ?>">
    <span style="color:red"><?php echo $doberror; ?></span>
    <br><br>

    <label>Enter your gender:</label>
   <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>> Male
    <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>> Female
    <input type="radio" name="gender" value="Other" <?php if ($gender == "Other") echo "checked"; ?>> Other
    <br><br>

            <span style="color:red"><?php echo $gendererror; ?></span>
<br><br>


    <input type="submit" value="Submit">
</form>
 
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameerror) && empty($ageerror)&& empty($emailerror)&& empty($doberror)&& empty($gendererror)) {
    echo "<br>The Name is : " . $name;
    echo "<br>The Age is : " . $age;
    echo "<br>The email is : " . $email;
   echo "<br>The Date of birth is : " . $dob;
    echo "<br>The gender is : " . $gender;
}
?>
 
</body>
</html>