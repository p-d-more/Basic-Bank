<!--PHP code for Transfer Money page-->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transfer Money</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/otherstyle.css">
</head>

<body>
    <!--Navigation Bar-->
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

    $query = "SELECT * FROM CUSTOMER";

    //creating Transfer Money form. The input is sent to 'handler.php' for further processing.
    echo '<form method = "post" action = "handler.php">';
    echo '<h2 style = "margin-left : 40px;"> Transfer Money</h2><br>';
    
    //creating Select Sender dropdown
    echo '<select name = "sender" required>';
    echo '<option selected disabled value = "">Choose Sender</option>';

        //Each Sender option is read from the 'customers' table and printed out.
        if ($result = $mysqli->query($query)) {

            while ($row = $result->fetch_assoc()) {
                $field1name = $row["custid"];
                $field2name = $row["fname"];
                $field3name = $row["lname"];
                $field4name = $row["mobno"];
                $field5name = $row["email"];
                $field6name = $row["cur_bal"];

                echo '<option value ='.$field1name.'>'.$field2name.'</option>';
                
            }

    $result->free();
    }
    echo '</select>';

    //creating Select Receiver dropdown
    echo '<select name = "receiver" required>';
    echo '<option selected disabled value = "">Choose Receiver</option>';

        //Each Receiver option, read from 'customers' table.
        if ($result = $mysqli->query($query)) {

            while ($row = $result->fetch_assoc()) {
                $field1name = $row["custid"];
                $field2name = $row["fname"];
                $field3name = $row["lname"];
                $field4name = $row["mobno"];
                $field5name = $row["email"];
                $field6name = $row["cur_bal"];


                echo '<option value ='.$field1name.' required>'.$field2name.'</option>';
                
            }

        $result->free();
    }
    echo '</select>';
    echo '<br>';
    echo '<br>';
    
    //input label for the amount to be transferred
    echo '<label for = "amount"> Enter the amount to be transferred :</label>';

    echo '<input name = "amount" type = "number" required>';
    echo '<br>';
    echo '<br>';

    //submit button for the form
    echo '<input type = "submit" name = "submit" class = "btn btn-light">';

    echo '</form>';
?>
</div>
</body>
</html>