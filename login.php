<?php
$servername ="localhost";
$username = "root";
$password = "";
$database = "login";
$conn = new mysqli($servername,$username, $password,$database);

if($conn->connect-error){
   die("connection failed:" .$conn->connect_error);
}

if(isset($-POST['submit'])){

   $username = $_POST['username'];
   $password = $_POST['password'];

   $check_query = " SELECT * FROM users WHERE username ='$username'";

   $check_result = $conn->query($check_query);

   if($check_result->num_rows > 0){
      echo"username already exists. try again";
   }
   else {
   $insert_query = "INSERT INTO users (username, password) VALUES('$username','$password')";
   }
   if($conn->query($insert_query) ==TRUE){
      
      echo "login sucessful";
      header("location: EziHome.html");
   }
   else{
      echo "error: " . $insert_query."<br>". $conn->error;
   }

}
$conn->close();
?>