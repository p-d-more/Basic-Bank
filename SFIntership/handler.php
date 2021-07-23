<!--PHP code to handle input from Transfer Money page, validate it, make changes to the databases, and give appropriate message-->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/otherstyle.css">

</head>
<body>
    <!--Navigation bar-->
    <header id="header-nav">
        <nav class="navbar">
            <div class="container-fluid">
              <div class="nav-links" id="navLinks">
                    <a href="index.html">HOME</a>
                    <a href="customers.php">CUSTOMER LIST</a>
                    <a href="transactions.php">TRANSACTIONS</a>
            </div>
            </div>
        </nav>
    </header>  
<div>

<?php
    // Getting input from the Transfer Money Form
    $id1 = $_POST['sender'];
    $id2 = $_POST['receiver'];
    $amount = $_POST['amount'];
    $balance = 0;

    $username = "root";
    $password = "";
    $database = "PDM_Bank";
    $mysqli = new mysqli("localhost", $username, $password, $database);

    //Fetching Sender details from the table 'customer'.
    if( $result = $mysqli->query( "SELECT * FROM CUSTOMER WHERE custid = $id1" ) ) {
        while( $row = $result->fetch_assoc() ) {
            $balance1 = $row['cur_bal'];
            $Name1 = $row['fname'];
        }
        $result->close();
    }

    //Fetching Receiver details from the table 'customer'.
    if( $result = $mysqli->query( "SELECT * FROM CUSTOMER WHERE custid = $id2" ) ) {
        while( $row = $result->fetch_assoc() ) {
            $balance2 = $row['cur_bal'];
            $Name2 = $row['fname'];
        }
        $result->close();
    }
    

    //checking whether the Sender and Receiver are different persons. If not, show error. No transaction takes place.
    if ($id1 == $id2){
        $message = 'ERROR : The selected SENDER and RECEIVER are the same! Please try again.';
    }

    //checking whether the Sender has enough money to carry out the transaction. If not, show error.
    else if ($amount > $balance1){
        $message = 'ERROR : Insufficient balance! The sender account balance is '.$balance.'. Either send a value less than balance, or deposit money into the account before the transaction.';
    }

    //If both conditions shown above are satisfied, proceed with the transaction.
    else{
        $newAmount1 = $balance1 - $amount;
        $newAmount2 = $balance2 + $amount;
        
        //inserting the transaction details into the 'transactions' table.
        
        $query2 = "INSERT INTO  TRANSACTION (sender, receiver, amount) VALUES ('$Name1','$Name2',$amount)";
        //changing the account balance of both Sender and Receiver.
        $query3 = "UPDATE CUSTOMER SET cur_bal = $newAmount1 WHERE custid = $id1";
        $query4 = "UPDATE CUSTOMER SET cur_bal = $newAmount2 WHERE custid = $id2";
        if($result = $mysqli->query($query2)){
            $mysqli->query($query3);
            $mysqli->query($query4);

            $message = 'Success! The transaction is processed.';
        }
        else{
            $message = 'Database error, Try again!';
        }    
    }

    //printing out transaction details for user, along with errors if any.
    echo '<div class = "transaction-details">';
    echo '<h2>Transaction Details </h2><br><br>';
    echo '<b>Sender : </b>'.$Name1.'<br>';
    echo '<b>Receiver : </b>'.$Name2.'<br>';
    echo '<b>Amount to be transferred : </b>'.$amount.'<br><br>';
    echo '<b>Message : </b><br>';
    echo $message;

    //buttons
    echo '<div id = "row" style="display : block; text-align : center; margin : auto auto 20px auto">
            <a href = "transfer.php" class = "btn btn-light" id="button">Go Back</a>
            <a href = "transactions.php" class = "btn btn-light" id="button">Transaction History</a>
            <a href = "customers.php" class = "btn btn-light" id="button">Customer List</a>    
         </div>';

    echo '</div>'; 
?>
</div>
</body>
</html>