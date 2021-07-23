<!--PHP code for transaction records page -->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/otherstyle.css">
</head>
<body>
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
    //Connecting to the local SQL database. If hosting online, credentials will change. Everything else remains the same.
    $username = "root";
    $password = "";
    $database = "PDM_Bank";
    $mysqli = new mysqli("localhost", $username, $password, $database);

    $query = "SELECT * FROM TRANSACTION";

    //Showing the contents of the 'transactions' table in tabular form.
    echo '<table> 
        <caption>Transaction History </caption>
        <thead>
        <tr> 
            <th> <font face="Arial">S. No.</font> </th> 
            <th> <font face="Arial">Sender</font> </th> 
            <th> <font face="Arial">Receiver</font> </th> 
            <th> <font face="Arial">Amount</font> </th> 
            <th> <font face="Arial">Time</font> </th> 
        </tr>
        </thead>';

    echo '<tbody>';

    //fetching individual table rows
    if ($result = $mysqli->query($query)) {

        while ($row = $result->fetch_assoc()) {
            $field1name = $row["transid"];
            $field2name = $row["sender"];
            $field3name = $row["receiver"];
            $field4name = $row["amount"];
            $field5name = $row["time"];

            echo '<tr>';
            echo '<td>'.$field1name.'</td>';
            echo '<td>'.$field2name.'</td>';
            echo '<td>'.$field3name.'</td>';
            echo '<td>'.$field4name.'</td>';
            echo '<td>'.$field5name.'</td>';
            echo '</tr>';
        }
        echo '</tbody>';

        $result->free();
    }
    echo '</table>';
?>
</div>
<!--Transfer Money button-->
<div style="display : block; text-align : center; margin : auto auto 20px auto">
    <a href="transfer.php" class="btn btn-light">Transfer Money</a>
</div>
</body>
</html>