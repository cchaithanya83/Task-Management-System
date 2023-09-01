<!DOCTYPE html>
<html>
<head>
    <title>View Tickets</title>
    <style>

        body{
            background-color: bisque;
        }
        .topnav {
            background-color: #333;
            overflow: hidden;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topnav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        .topnav a:hover {
            background-color: #4c704c;
            color: #fff;
            border-radius: 2px;
            padding: 5px;
        }

        .ticket {
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
        }

        .ticket h3 {
            margin-top: 0;
        }

        .ticket p {
            margin: 5px 0;
        }

        .ticket a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }

        .ticket a:hover{
            background-color: #66a3ff;
            color: #333;
            border-radius: 2px;
            padding: 2px;

        }

    </style>
</head>
<body>
<div class="topnav">
    <font face="Harlow Solid Italic" size="10px" color="white"> View Ticket</font>
    <a href="index.php?varname=<?php echo $_GET['varname'];?>"><-back</a>

</div>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "miniproject");

    // Check connection
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $username = $_GET['varname'];

    if(isset($_GET['delete_ticket_id'])) {
        $delete_ticket_id = $_GET['delete_ticket_id'];

        // Delete the ticket from the database
        $delete_sql = "DELETE FROM tickets WHERE ticket_id = $delete_ticket_id";
        if(mysqli_query($conn, $delete_sql)) {
            echo '<script> window.alert( "Ticket deleted succesfully ");';
            echo 'window.location.href = "ticket.php?varname=' . $username . '";</script>';
        } else {
            echo "Error deleting ticket: " . mysqli_error($conn);
        }
    }
    if(isset($_GET['resolve_ticket_id'])) {
        $resolve_ticket_id = $_GET['resolve_ticket_id'];
        $update_sql = "UPDATE tickets SET status = 'closed' WHERE ticket_id = $resolve_ticket_id";
        if(mysqli_query($conn, $update_sql)) {
            echo '<script> window.alert( "Ticket resolved");';
            echo 'window.location.href = "ticket.php?varname=' . $username . '";</script>';
        } else {
            echo "Error editing ticket: " . mysqli_error($conn);
        }
    }

    $sql = "SELECT * FROM tickets";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="ticket">';
            echo '<h3>' . $row['title'] . '</h3>';
            echo '<p>Description: ' . $row['description'] . '</p>';
            echo '<p>Status: ' . $row['status'] . '</p>';
            if($row['status']=="open"){
            echo '<a href="?varname=' . $username . '&resolve_ticket_id=' . $row['ticket_id'] . '">Resolved</a>';
            echo '<br>';
            }
            echo '<a href="?varname=' . $username . '&delete_ticket_id=' . $row['ticket_id'] . '">Delete Ticket</a>';
            echo '</div>';
            
        }
    } else {
        echo "<p>No tickets found.</p>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
