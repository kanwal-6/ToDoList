<?php include 'connection/connection_with_db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete'])) {
    $row_id = $_POST['row_id'];

    $sql_delete = "DELETE FROM `todolist` WHERE Id = '$row_id'";

    try {
        mysqli_query($conn, $sql_delete);
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="show.css">
</head>

<body>
    <?php include 'components/navbar.html' ?>
    <table border="1">
        <thead>
            <tr>
                <th>Task</th>
                <th>Day</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql_fetch = "SELECT * FROM `todolist` ";

            try {
                $result = mysqli_query($conn, $sql_fetch);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["Task"] . "</td>";
                        echo "<td>" . $row["Day"] . "</td>";
                        echo "<td>" . $row["Created_at"] . "</td>";

                        echo "<td>
                        <form method = 'post' onsubmit = 'return confirm(\"Are u Sure?\")> 
                        <input type = 'hidden' value ='" . $row['Id'] . "' name ='row_id'>
                        <input type = 'submit' value = 'Delete' name = 'delete'>
                        </form>

                        <button> Edit</button>
                    </td>";
                        echo "</tr>";
                    }
                }
            } catch (mysqli_sql_exception $e) {
                echo $e->getMessage();
            }

            ?>

        </tbody>
    </table>
</body>

</html>