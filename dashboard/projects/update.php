<?php
$username = 'root';
$hostname = 'localhost:3307';
$password = '';
$db = 'portfolio';

// CREATE CONNECTION
$connection = new mysqli($hostname, $username, $password, $db);

$image = '';
$title = '';
$description = '';
$github = '';
$live = '';
$errorMessage = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header('location: ./index.php');
        exit;
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM projects WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header('location: ./index.php');
        exit;
    }

    $image = $row['img'];
    $title = $row['title'];
    $description = $row['description'];
    $github = $row['github'];
    $live = $row['live'];
} else {
    $id = $_POST['id'];
    $image = $_POST['image'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $github = $_POST['github'];
    $live = $_POST['live'];

    do {
        if (empty($image) || empty($title) || empty($description) || empty($github) || empty($live)) {
            $errorMessage = 'All the fields are required!';
            break;
        }

        $sql = "UPDATE projects 
                SET img='$image', title='$title', description='$description', github='$github', live='$live'
                WHERE id=$id";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = 'Invalid query : '.$connection->error;
            break;
        }

        $successMessage = 'Client updated successfully!';
    } while (false);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../update.css">
</head>

<body>
    <div class="container">
        <div>
            <a href="./index.php" class="back">Go Back</a>
        </div>
        <h1>Update Project</h1>

        <?php
            if (!empty($errorMessage)) {
                echo "
                <div>
                <h2>$errorMessage</h2>
                </div>";
            }
?>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row">
                <label for="img">Image</label>
                <div class="input_field">
                    <input type="text" name="image" value="<?php echo $image; ?>">
                </div>
            </div>
            <div class="row">
                <label for="title">Title</label>
                <div class="input_field">
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </div>
            </div>
            <div class="row">
                <label for="description">Description</label>
                <div class="input_field">
                    <input type="text" name="description" value="<?php echo $description; ?>">
                </div>
            </div>
            <div class="row">
                <label for="github">Github</label>
                <div class="input_field">
                    <input type="text" name="github" value="<?php echo $github; ?>">
                </div>
            </div>
            <div class="row">
                <label for="live">Live</label>
                <div class="input_field">
                    <input type="text" name="live" value="<?php echo $live; ?>">
                </div>
            </div>

            <?php
        if (!empty($successMessage)) {
            echo "
                    <div>
                    <h2>$successMessage</h2>
                    </div>";
        }
?>

            <div class="btn-container">
                <div>
                    <button type="submit">Submit</button>
                </div>
                <div>
                    <a href="./index.php" role="button" class="btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>