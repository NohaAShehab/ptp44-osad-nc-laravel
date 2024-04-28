<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<h1 style="color: green; text-align: center;"> Welcome to my new home page </h1>
    <?php echo "Hello from laravel <pre>";
        var_dump($students);
        echo "<table class='table'> <tr> <td>ID </td> <td> Name</td></tr>";
    foreach ($students as $student) {
        echo "<tr> <td>" . $student['id'] . "</td> <td>" . $student['name'] . "</td></tr>";
    }
    echo "</table>";
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>



