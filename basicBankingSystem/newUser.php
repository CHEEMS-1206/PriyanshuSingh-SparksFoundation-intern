<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Make Transactions</title>

    <link rel="stylesheet" href="./css/navBar.css" />
    <link rel="stylesheet" href="./css/newUser.css" />

  </head>
  <body>
    <div class="header"></div>
    <div class="container">
      <div class="navBar">
        <div class="headTitle">XYZ Bank</div>
        <div class="navigations">
          <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./customers.php">Customers</a></li>
            <li><a href="./transactionsPage.php">Transactions</a></li>
            <li><a href="./makeTransaction.php">Send Money</a></li>
          </ul>
        </div>
      </div>

      <div class="mainBody">
        <h1>Create a User</h1>
        <?php
          include 'config.php';

            if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $phone=$_POST['phone'];
            $balance=$_POST['balance'];
            $email=$_POST['email'];
            $age=$_POST['age'];
            $sql="insert into customers(Name,Email,amount,Phone,age) values('{$name}','{$email}','{$balance}','{$phone}', '{$age}')";
            $result=mysqli_query($conn,$sql);
            if($result){
              echo "<script> alert('Hurray! User created');
                window.location='customers.php';
              </script>";
              }
            }
          ?>
          <form method="post" >
            <div>
                <span>Name</span>
              <input placeholder="Name" type="text" name="name" required>
            </div>
            <div>
                <span>Contact</span>
              <input placeholder="Phone number" type="number" name="phone" required>
            </div>
            <div>
                <span>E-mail</span>
              <input placeholder="E-mail" type="email" name="email" required>
            </div>
            <div>
                <span>Age</span>
              <input placeholder="Age" type="number" name="age" required>
            </div>
            <div>
                <span>Amount</span>
              <input placeholder="Current balance" type="number" name="balance" required>
            </div>            
            <div>
              <button type="submit" id="CREATE" name="submit">Add user</button>
              <button type="reset" id="RESET" name="reset">Reset Form</button>
            </div>
          </form>
        </div>
      </div>
    <div class="footer header">|| Created by Priyanshu Singh ||</div>
  </body>
</html>