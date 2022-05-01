<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'DBconnect.php';
    

    if(isset($_POST['btn'])){

    $dst = $_POST["dst"];
    $dprt = $_POST["dprt"];
    $bus = $_POST["bus"];
    $type = $_POST["type"];
    $passId = $_SESSION['user_id'];
    $passName = $_SESSION['user_name'];

      if(!empty($dst)&&!empty($dprt)){

        $sql1 = "INSERT INTO `ticket` (`destination`, `departure`, `passenger_id`, `passenger_name`, `operator_id`, `bus_name`, `seat_type`, `approval`) VALUES ('$dst', '$dprt', '$passId', '$passName', '1', '$bus', '$type', 'Not Approved')";
        $result = mysqli_query($conn,$sql1);
        if($result){
          echo 'Ticket Booked ';
        }

      }else{
        echo "Field Should not be empty";
      }
    

    }
    

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" href="ticket_style.css">
    <!--BOOTSTRAP LINK-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="bg">
    <form action="/busProject/ticket.php" method="POST">

        <div class="signup-form bg-dark">

            <div class="Signup-head bg-warning">
                <h1>Book Your Ticket</h1>
            </div>

           

            <div class="signup-content2">
                <br>
            
                <label class="text-white travel">Destination</label>
            <select class="bg-dark text-white travel2" name="dst">
                <option></option>
                <option>Dhaka</option>
                <option>Chittagong</option>
                <option>Rajshahi</option>
                <option>Cumilla</option>
                <option>Khulna</option>
                <option>Barishal</option>
                
            </select>
            <label class="text-white travel">Depart</label>
            <select class="bg-dark text-white travel2" name="dprt">
                <option></option>
                <option>10.00AM</option>
                <option>12.30PM</option>
                <option>3.30PM</option>
                <option>6.00PM</option>
                <option>8.00PM</option>
                <option>11.00PM</option>
                
            </select>
        <br>
            <label class="text-white travel">Bus_Name</label>
            <select class="bg-dark text-white travel2" name="bus">
                <option></option>
                <option>YellowLine01</option>
                <option>YellowLine02</option>
                <option>YellowLine03</option>
                <option>YellowLine04</option>
                <option>YellowLine05</option>
                <option>YellowLine06</option>
                
            </select>
            

            <br>

            <label class="text-white travel">Seat_type</label>
            <select class="bg-dark text-white travel2" name="type">
                <option></option>
                <option>Non-AC</option>
                <option>AC</option>
                
            </select>

            <input type="submit" value="BookTicket" class="submit-btn bg-warning" name="btn">
        </div>
        </div>
    </form>
    <a href="User_logout.php"><h2> Log Out </h2> </a>
</div>
</body>
</html>