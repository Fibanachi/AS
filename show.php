<?php
$id = $_GET['id'];

$pdo = new PDO("mysql:host=localhost; dbname=as", "root","");

$sql = "SELECT * FROM list WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":id",$id);
$result = $statement->execute();
$list = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Surname</th>
            <th>Name</th>
            <th>Patronymic</th>
            <th>Birthday</th>
            <th>Department</th>
            <th>Position</th>
            <th>Type_person</th>
            <th>Salary</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($list as $value):?>
            <tr>
                <td><?= $value['id'];?></td>

                <td><?= $value['surname'];?></td>
                <td><?= $value['name'];?></td>
                <td><?= $value['patronymic'];?></td>
                <td><?= $value['birthday'];?></td>
                <td><?= $value['department'];?></td>
                <td><?= $value['position'];?></td>
                <td><?= $value['type_person'];?></td>
                <td><?= $value['salary'];?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

</div>
<div class="back">
    <a href="index.php">Back</a>
</div>

</body>
</html>
