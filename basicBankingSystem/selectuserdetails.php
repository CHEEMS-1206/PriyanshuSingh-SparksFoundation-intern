<?php
include './config.php';
if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }

    // constraint to check insufficient balance.
    else if($amount > $sql1['amount']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    
    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Please Enter a valid amount.')";
         echo "</script>";
    }
    else {
        // deducting amount from sender's account
        $newbalance = $sql1['amount'] - $amount;
        $sql = "UPDATE customers set amount=$newbalance where id=$from";
        mysqli_query($conn,$sql);
             

        // adding amount to reciever's account
        $newbalance = $sql2['amount'] + $amount;
        $sql = "UPDATE customers set amount=$newbalance where id=$to";
        mysqli_query($conn,$sql);
                
        $sender = $sql1['Name'];
        $receiver = $sql2['Name'];
        $sql = "INSERT INTO transaction (`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($conn,$sql);

        if($query){
            echo "<script> alert('Transaction Successful');
                    window.location='transactionsPage.php';
                </script>";
        }
        $newbalance= 0;
        $amount =0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Page</title>

    <link rel="stylesheet" type="text/css" href="css/navBar.css">
    <link rel="stylesheet" href="./css/makeTransactions.css">

    <style>
        .lastInput{
            margin: 20px;
            padding: 6px 15px;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
        }
        .firstInput{
            margin: 20px;
            padding: 6px 15px;
            font-size: 15px;
            font-weight: 600;
        }
        .text{
            font-size: 18px;
            font-weight: 600;
            color:var(--color)
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="mainBody">
            <h1>Transaction</h1>
            <div class="itemsHolder">
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
            <div>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                </tr>
                <tr>
                    <td><?php echo $rows['id'] ?></td>
                    <td><?php echo $rows['Name'] ?></td>
                    <td><?php echo $rows['Email'] ?></td>
                    <td><?php echo $rows['amount'] ?></td>
                </tr>
            </table>
            <span class="text">Transfer To:</span>
            <select name="to" class="firstInput" required>
                <option value="" disabled selected>Choose</option>
                <?php
                    include 'config.php';
                    $sid=$_GET['id'];
                    $sql = "SELECT * FROM customers where id!=$sid";
                    $result=mysqli_query($conn,$sql);
                    if(!$result)
                    {
                        echo "Error ".$sql."<br>".mysqli_error($conn);
                    }
                    while($rows = mysqli_fetch_assoc($result)) {
                ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                    <?php echo $rows['Name'] ;?> (Balance: 
                    <?php echo $rows['amount'] ;?> ) 
                </option>
                <?php 
                    } 
                ?>
            </select>
            <div>
                <div>
                    <span class="text">Amount:</span>
                    <input type="number" name="amount" required class="lastInput">
                </div>
                <div>
                    <button name="submit" type="submit" class="btn" id="myBtn">Transfer</button>
                </div>
            </div>
        </div>
    </div>
</body>