    <!DOCTYPE html>
    <html>
    <head>
        <title>View Tickets</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #c093b2;
                margin: 0;
                padding: 20px;
                background-image: url('../images\ \(3\).jpeg'); /* Set the background image here */
    background-size: cover; /* Ensure the image covers the entire body */
    background-repeat: no-repeat; /* Prevent image repetition */
    background-attachment: fixed;
            }

            h1 {
                text-align: center;
                color: #fff;
            }

            .card {
                background-color: #fff;
                padding: 20px;
                margin: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;width: 200px;
            }

            h3 {
                margin: 0;
            }

            p {
                margin: 0;
            }

            a {
                color: #ff5733;
                text-decoration: none;
                margin-top: 10px;
                display: inline-block;
            }

            a:hover {
                text-decoration: underline;
            }
        




            h1{
                text-align: center;
            }

            .back {
                margin-left: auto;
            }




    /* Top navigation bar styles */
    .topnav {
        background-color: #333;
        color: white;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .org {
        font-family: 'Harlow Solid Italic', sans-serif;
        font-size: 24px;
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

    .back {
        margin-left: auto;
        background-color: transparent;
        color: #fff;
    }

    /* Main content styles */
    .container {
        max-width: 80px;
        margin: 0 auto;
        padding: 5px;
    }

    h1 {
        text-align: center;
    }

    /* Ticket card styles */
    .ticket-card {
        background-color: #fff;
        margin: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    h3 {
        margin: 0;
    }

    p {
        margin: 0;
    }

    a.delete-link {
        color: #ff5733;
        text-decoration: none;
        margin-top: 10px;
        display: inline-block;
    }

    a.delete-link:hover {
        text-decoration: underline;
    }

        </style>
        
    </head>
    <body>
    <div class="topnav">

        <a href="create_ticket.php?varname=<?php echo $_GET['varname'] ?>">Raise a Ticket</a>
        <br>
        <br>
        <a href="index.php?varname=<?php echo $_GET['varname'] ?>">View Task</a>
        <br>
        <br>
        <a href="../chat.php?varname=<?php echo $_GET['varname'] ?>">Chat Box</a> 
        <button id="backButton" class="back">Back</button>
    </div>
    <script>
            var backButton = document.getElementById('backButton');
            backButton.addEventListener('click', function() {
                window.history.back();
            });
        </script>
        <h1>View Tickets</h1>

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

        $sql = "SELECT * FROM tickets WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="card">';
                echo '<h3>' . $row['title'] . '</h3>';
                echo '<p>Description: ' . $row['description'] . '</p>';
                echo '<p>Status: ' . $row['status'] . '</p>';
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
