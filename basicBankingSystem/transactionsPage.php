<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transactions</title>

    <link rel="stylesheet" href="./css/navBar.css" />
    <link rel="stylesheet" href="./css/transactions.css" />
  </head>
  <body>
    <div class="header"></div>
    <div class="container">
      <div class="navBar">
        <div class="headTitle">XYZ Bank</div>
        <div class="navigations">
          <ul>
            <li><a href="./transactionsPage.php">Transactions</a></li>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./customers.php">Customers</a></li>
            <li><a href="./makeTransaction.php">Send Money</a></li>
          </ul>
        </div>
      </div>

      <div class="mainBody">
        <h1>Transactions</h1>
        <div class="itemsHolder">
          <table>
            <tr>
              <th>T. Id</th>
              <th>Sender's Name</th>
              <th>Reciever's Name</th>
              <th>Amount</th>
              <th>Date & Time</th>
            </tr>
            <?php

            include 'config.php';

            $sql ="select * from transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
              {
            ?>
            <tr>
              <td><?php echo $rows['transfer_id']; ?></td>
              <td><?php echo $rows['sender']; ?></td>
              <td><?php echo $rows['receiver']; ?></td>
              <td><?php echo $rows['balance']; ?> </td>
              <td><?php echo $rows['datetime']; ?> </td>
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
