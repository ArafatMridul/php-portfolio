<?php
$username = 'root';
$hostname = 'localhost:3307';
$password = '';
$db = 'portfolio';

// CREATE CONNECTION
$connection = new mysqli($hostname, $username, $password, $db);

$label = '';
$src_dark = '';
$src_light = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header('location: ./index.php');
        exit;
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM skills WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header('location: ./index.php');
        exit;
    }

    $label = $row['label'];
    $src_dark = $row['src_dark'];
    $src_light = $row['src_light'];
} else {
    $id = $_POST['id'];
    $label = $_POST['label'];
    $src_dark = $_POST['src_dark'];
    $src_light = $_POST['src_light'];

    do {
        if (empty($label) || empty($src_dark) || empty($src_light)) {
            $errorMessage = 'All the fields are required!';
            break;
        }

        $sql = "UPDATE skills 
                SET label='$label', src_dark='$src_dark', src_light='$src_light'
                WHERE id=$id";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = 'Invalid query : '.$connection->error;
            break;
        }

        $successMessage = 'Skill updated successfully!';
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
        <h1>Update Skill</h1>

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
                <label for="label">Skill name</label>
                <div class="input_field">
                    <input type="text" name="label" value="<?php echo $label; ?>">
                </div>
            </div>
            <div class="row">
                <label for="src_dark">Icon(dark)</label>
                <div class="input_field">
                    <input type="text" name="src_dark" value="<?php echo $src_dark; ?>">
                </div>
            </div>
            <div class="row">
                <label for="src_light">Icon(light)</label>
                <div class="input_field">
                    <input type="text" name="src_light" value="<?php echo $src_light; ?>">
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