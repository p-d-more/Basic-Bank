<!--PHP code for the customers list page--> 
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/otherstyle.css">
</head>

<body>
    <header id="header-nav">
        <nav class="navbar">
            <div class="container-fluid">
              <div class="nav-links" id="navLinks">
                    <a href="index.html">HOME</a>
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

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

    $query = "SELECT * FROM CUSTOMER";

    //showing contents of 'customers' table, in tabular form.
    echo '<table> 
        <caption> Customer List </caption>
        <thead>
        <tr> 
            <th> <font face="Arial">ID</font> </th> 
            <th> <font face="Arial">First Name</font> </th> 
            <th> <font face="Arial">Last Name</font> </th> 
            <th> <font face="Arial">Phone Number</font> </th> 
            <th> <font face="Arial">Email</font> </th> 
            <th> <font face="Arial">Current Balance</font> </th> 
        </tr>
        </thead>';

    echo '<tbody>';

    //fetching individual rows from the 'customer' table.
    if ($result = $mysqli->query($query)) {

        while ($row = $result->fetch_assoc()) {
            $field1name = $row["custid"];
            $field2name = $row["fname"];
            $field3name = $row["lname"];
            $field4name = $row["mobno"];
            $field5name = $row["email"];
            $field6name = $row["cur_bal"];

            echo '<tr>';
            echo '<td>'.$field1name.'</td>';
            echo '<td>'.$field2name.'</td>';
            echo '<td>'.$field3name.'</td>';
            echo '<td>'.$field4name.'</td>';
            echo '<td>'.$field5name.'</td>';
            echo '<td>'.$field6name.'</td>';

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