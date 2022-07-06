
<?php
if(isset($_POST['submit'])){

    //collect form data
    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $message = $_POST['message'];


    

    if(!isset($error)){




        $f = fopen('view1.csv', 'a');
        $Content = fputcsv($f,["Name, dept , email, phone,   gender  ,  message\n"]);
        $Content .=fputcsv($f, ["$name",  "$dept",  "$email",  "$phone"  ,  "$gender"  ,  "$message"]);

// Close the file
         
         echo $Content;
        
         fclose($f);
        exit();
    }
}


      

//if their are errors display them
if(isset($error)){
    foreach($error as $error){
        echo '<p style="color:#ff0000">$error</p>';
    }
}
?> 



<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="php.php" method="post">

      <ul>
        <h1>Login</h1>
    	
        <label for="name"> Name:</label>
        <input type="text" id="name" name="name"><br>
        <label for="dept">Department:</label>
        <input type="text" id="dept" name="dept"><br>
        
        <label>Email Address: <input type="email" name="email"></label><br>
        
        <label>Phone Number: <input type="text" name="phone"></label><br>
        <label for="gender"><b>Gender :</b></label>
        <input type="radio" name="gender" value="male" id="male"required="">
        <label for="male">Male</label>
        <input type="radio" name="gender" value="female" id="female" required="">
        <label for="female">Female</label><br><br>
        
        
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" placeholder="Send your message" ></textarea><br>
        <button type="submit" name="submit" id="submit" value="Submit" href="php.php">Submit</button><br>
      </ul>
    </form>
</body>

</html>
<?php

require_once('php.php');
?>