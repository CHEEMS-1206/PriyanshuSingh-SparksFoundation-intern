<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Make Transactions</title>

    <link rel="stylesheet" href="./css/navBar.css" />
    <link rel="stylesheet" href="./css/makeTransactions.css" />

  </head>
  <body>
    <div class="header"></div>
    <div class="container">
      <div class="navBar">
        <div class="headTitle">XYZ Bank</div>
        <div class="navigations">
          <ul>
            <li><a href="./makeTransaction.php">Send Money</a></li>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./customers.php">Customers</a></li>
            <li><a href="./transactionsPage.php">Transactions</a></li>
          </ul>
        </div>
      </div>
      <div class="mainBody">
      <h1>Make Transactions</h1>
      <div class="itemsHolder">
        <table>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Balance</th>
            <th>Operation</th>
          </tr>
        <?php
          include 'config.php';
          $sql = "SELECT * FROM customers";
          $result = mysqli_query($conn,$sql);
        ?>
        <?php 
          while($rows=mysqli_fetch_assoc($result))
            {
          ?>
          <tr>
            <td ><?php echo $rows['id'] ?></td>
            <td ><?php echo $rows['Name']?></td>
            <td ><?php echo $rows['Email']?></td>
            <td ><?php echo $rows['amount']?></td>
            <td ><a href="./selectuserdetails.php?id=<?php echo $rows['id'] ;?>" class="btn">Send Money</a></td> 
          </tr>
        <?php
          }
        ?>
        </table>
      </div>
      </div>
    </div>
    <div class="footer header">|| Created by Priyanshu Singh ||</div>
  </body>
</html>
