<?php
    include 'DBconnect.php';
    

    if(isset($_POST['btn'])){ 
        $passengername=$_POST['passengername'];
        $destination = $_POST['dst'];
        $depart = $_POST['dprt'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        //Here Starts account Creation

        if(!empty($email)&&!empty($pass)){

            $sql = "INSERT INTO `passenger` (`name`,`email`, `password`) VALUES ('$passengername', '$email', '$pass')";
            $result = mysqli_query($conn,$sql);
            if($result){

              //echo "Account Created";
            }
    
          }else{
            echo "Field Should not be empty asdf";
          }





        //Ends Here

        $sql2 = "SELECT id FROM passenger WHERE email = '$email'";
        $search = mysqli_query($conn,$sql2);
        if($search){
            $data = mysqli_fetch_array($search);
            $id = $data['id'];
        }else{
            echo "fetching failed";
        }



        if(!empty($passengername)  && !empty($destination)){
            $query = "INSERT INTO `ticket` (`destination`, `departure`, `passenger_id`, `passenger_name`, `operator_id`, `bus_name`, `seat_type`, `approval`) VALUES ('$destination', '$depart', '$id', '$passengername', '2', 'YellowLine05', 'AC', 'Approved')";
            $createquery = mysqli_query($conn, $query);
            if($createquery){
                echo "Your Data Submitted!";
            }
            else{
                echo 'not working';
            }
        }else{
            echo "Field should not be empty.";
        }
    }
?>
<?php
    if(isset($_GET['delete'])){
        $ticket_id=$_GET['delete'];
        $query = "DELETE FROM ticket WHERE id={$ticket_id}";
        $deletequery= mysqli_query($conn ,$query);
        if($deletequery){
            echo "Data Remove Successful";
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin</title>
  </head>
  <body>
    <div class="container shadow m-5 p-3">
        <form action="/busProject/admin_home.php" method="post" class="d-flex justify-content-around">
            
            <input class="text" type="text" name="passengername" 
            placeholder="Enter Passenger Name">
            <input class="text" type="text" name="email" 
            placeholder="Enter Passenger Email">
            <input class="text" type="text" name="pass" 
            placeholder="Enter Passenger Password">

            <input class="text"  name="dst"
             placeholder="Enter Destination">

             <input class="text"  name="dprt"
             placeholder="Departure time">
            
            <input type="submit" value="Insert" name="btn" class="btn
            btn-success">
        </form>
    </div>
    <div class="container  m-5 p-3">
        <form action="" method="post" class="d-flex justify-content-around">
            <?php
                if(isset($_GET['update'])){
                    $ticket_id=$_GET['update'];
                    $query4 = "SELECT * FROM ticket WHERE id={$ticket_id}";
                    $getdata= mysqli_query($conn, $query4);
                    while($rx=mysqli_fetch_assoc($getdata)){
                        $passengername = $rx['passenger_name'];
                        $ticket_id = $rx['id'];
                        $destination = $rx['destination'];
                        $depart = $rx['departure'];
                        $approve = $rx['approval'];
            ?>
            <input class="text" type="text" name="passenger_name"
             value="<?php echo $passengername ?>">
            <input class="form-control" type="text" name="desti" 
            value="<?php echo $destination ?>">
            <input class="form-control" type="text" name="depart" 
            value="<?php echo $depart?>">
            <input class="form-control" type="text" name="approve" 
            value="<?php echo $approve?>">
            <input type="submit" value="Update" name="update_btn" class="btn
            btn-primary">
            <?php }}?>
            <?php
                if(isset($_POST['update_btn'])){
                    $passenger_name=$_POST['passenger_name'];
                    $destination_new = $_POST['desti'];
                    $depart_new = $_POST['depart'];
                    $approve_new = $_POST['approve'];
                    if(!empty($passenger_name) && !empty($destination_new)){
                        $query="UPDATE ticket SET passenger_name='$passenger_name' , destination='$destination_new', departure = '$depart_new', approval = '$approve_new' WHERE id='$ticket_id'";
                       
                    $updatequery=mysqli_query($conn , $query);
                    if($updatequery){
                        echo "Data Updated";
                    }
                    }else{
                        echo "Field should not be empty.";
                    }
                }
            ?>
        </form>
    </div>
    <div class="container">
        <table class ="table table-bordered">
            <tr>
                <th>Ticket ID</th>
                <th>Passenger Name</th>
                <th>Destination</th>
                <th>Departure</th>
                <th>Approval</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                $query="SELECT * FROM ticket";
                $readquery = mysqli_query($conn, $query);
                if($readquery->num_rows>0){
                    while($rd=mysqli_fetch_assoc($readquery)){
                    
                        $passengername = $rd['passenger_name'];
                        $ticket_id = $rd['id'];
                        $destination = $rd['destination'];
                        $depart = $rd['departure'];
                        $approve = $rd['approval'];

                
            
            ?>
            <tr>
                <td><?php echo $ticket_id; ?></td>
                <td><?php echo $passengername; ?></td>
                <td><?php echo $destination; ?></td>
                <td><?php echo $depart; ?></td>
                <td><?php echo $approve; ?></td>
                <td><a href="admin_home.php?update=<?php echo $ticket_id; ?>" class="btn btn-info">Update</a></td>
                <td><a href="admin_home.php?delete=<?php echo $ticket_id; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php }}else{
                echo "No Data to show";
            }
             ?>
        </table>

    </div>
    <a href="User_logout.php"><h2> Log Out </h2> </a>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>