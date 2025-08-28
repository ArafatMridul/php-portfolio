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
                <li><a href="../skills/index.php">Skills</a></li>
                <li><a href="./index.php">Response</a></li>
            </ul>
        </nav>
    </header>
    <div class="main">
        <h1>List of responses</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
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
                $sql = 'SELECT * FROM response';
                $result = $connection->query($sql);

                if (!$result) {
                    exit('Invalid Query : '.$connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                                <tr>
                                    <td>$row[name]</td>
                                    <td>$row[email]</td>
                                    <td>$row[subject]</td>
                                    <td>$row[message]</td>
                                </tr>
                            ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>