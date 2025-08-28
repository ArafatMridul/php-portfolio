<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="../projects/index.php">Projects</a></li>
                <li><a href="./index.php">Skills</a></li>
                <li><a href="../response/index.php">Response</a></li>
            </ul>
        </nav>
    </header>
    <div class="main">
        <h1>List of Skills</h1>
        <a class="btn btn-green" href="./create.php">Add new skill</a>
        <table>
            <thead>
                <tr>
                    <th>Label</th>
                    <th>Dark Icon</th>
                    <th>Light Icon</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $username = 'root';
                    $hostname = 'localhost:3307';
                    $password = '';
                    $db = 'portfolio';

                    // CREATE CONNECTION
                    $connection = new mysqli($hostname, $username, $password, $db);
                    // CHECK CONNECTION
                    if ($connection->connect_error) {
                        exit('Connection failed: '.$connection->connect_error);
                    }

                    // READ ALL ROW FROM DATABASE TABLE
                    $sql = 'SELECT * FROM skills';
                    $result = $connection->query($sql);

                    if (!$result) {
                        exit('Invalid Query : '.$connection->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "
                                <tr>
                                    <td>$row[label]</td>
                                    <td>$row[src_dark]</td>
                                    <td>$row[src_light]</td>
                                    <td>
                                        <a href='./update.php?id=$row[id]' class='btn btn-primary'>update</a>
                                        <a href='./delete.php?id=$row[id]'  class='btn btn-danger'>delete</a>
                                    </td>
                                </tr>
                            ";
                    }
                    ?>
            </tbody>
        </table>
    </div>
</body>

</html>