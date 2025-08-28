<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user details</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="./index.php">Projects</a></li>
                <li><a href="../skills/index.php">Skills</a></li>
                <li><a href="../response/index.php">Response</a></li>
            </ul>
        </nav>
    </header>
    <div class="main">
        <h1>List of Projects</h1>
        <a class="btn btn-green" href="./create.php">Add new project</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Project Title</th>
                    <th>Project Description</th>
                    <th>Github Repo</th>
                    <th>Live Site</th>
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
                $sql = 'SELECT * FROM projects';
                $result = $connection->query($sql);

                if (!$result) {
                    exit('Invalid Query : '.$connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                                <tr>
                                    <td>$row[id]</td>
                                    <td>$row[img]</td>
                                    <td>$row[title]</td>
                                    <td>$row[description]</td>
                                    <td>$row[github]</td>
                                    <td>$row[live]</td>
                                    <td class='action'>
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