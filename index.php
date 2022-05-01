<?php

include 'DBconnect.php';
    session_start();

    if(empty($_SESSION['user_id'])){

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['btn'])){

    $email = $_POST["email"];
    $password = $_POST["password"];

      if(!empty($email)&&!empty($password)){

        $sql = "SELECT * FROM passenger WHERE email ='$email' AND password = '$password'";
        $result = mysqli_query($conn,$sql);
        
        $mysqli_num_row = mysqli_num_rows($result);

        if($mysqli_num_row){
          $data = mysqli_fetch_array($result);
          $id = $data['id'];
          $Uname = $data['name'];
          $_SESSION['user_id']=$id;
          $_SESSION['user_name'] = $Uname;
        
          header('location:ticket.php');
        }

      }else{
        echo "invalid username or password";
      }
    

    }
    


}




?>





<html>

<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="User_login_style.css">
  <link rel="stylesheet" href="nav_style.css">
  <title>Sign in</title>
</head>

<body>
  
  <div>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo" >YellowLine Enterprise</label>
      <ul>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="Admin_login.php">Admin</a></li>
        <li><a href="operator_login.php">Operator</a></li>
        <li><a href="about_us.html">Contact Us</a></li>
        
      </ul>
    </nav>
    
  </div>
  
    
    <div class="main">
      <p class="sign" align="center">User <br/>Log in</p>
      
      <form action ="/busProject/index.php" method = "post" >
      

      <div class="form-group col-md-6">
        <input  type="email" class="un " id="email" name="email" align="center" placeholder="Email">
      </div>

      <div class="form-group col-md-6">
        <input  type="password" class="un " id="password" name="password" align="center" placeholder="Password">
      </div>

      
      <div class="form-group col-md-6" align="center">
        <input  type="submit" value="LogIn"  name="btn"  class="btn btn-success" >
      </div>
      
    
            
</form> 
        <?php
    }else{
      header('location:ticket.php');
    }
    ?>
        
        
        
        <div class="login">
          <p>Don't have account?</p>
          <a  href="signup.php" align="center">SignUp</a>
        </div>
        
        
              
                  
      
  </div>
  
     
</body>

</html>