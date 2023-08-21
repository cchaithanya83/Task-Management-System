<!DOCTYPE html>
<html>
<head>
    <title>View Tickets</title>
</head>
<body>
<div class="topnav">
    <font face="Harlow Solid Italic" size="10px" color="black"> View Ticket</font>
    <a href="../index.html"><-back</a>

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
            echo '<div>';
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
