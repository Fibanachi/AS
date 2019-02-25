<?php

$pdo = new PDO("mysql:host=localhost; dbname=as", "root","");


if (isset($_GET['page'])){
    $page = $_GET['page'];
} else {
    $page = 1;
}

if (isset($_GET['result_row'])){
    $notesOnPage = $_GET['result_row'];
}else{
    $notesOnPage = 20;
}

$from = ($page - 1) * $notesOnPage;

$sql = "SELECT * FROM list WHERE  id LIMIT $from, $notesOnPage";
$statement = $pdo->prepare($sql);
$result = $statement->execute();
$list = $statement->fetchAll(PDO::FETCH_ASSOC);



$sql = "SELECT COUNT(*)  FROM list";
$statement = $pdo->prepare($sql);
$result = $statement->execute();
$list_pag = $statement->fetchAll(PDO::FETCH_COLUMN);
$list_pag = $list_pag[0];

$pagesCount = ceil($list_pag / $notesOnPage);

if ($page !=1){
    $prev = $page - 1;
    echo "<a href=\"?page=$prev\"><<</a>";
}

for ($i = 1; $i <= $pagesCount; $i++){
    if ($page == $i){
        $class=' class= "active"';

    }else{
        $class = '';
    }
    echo "<a href = \"?page=$i\"$class>$i </a> ";
}

if ($page !=$i-1){
    $prev = $page + 1;
    echo "<a href=\"?page=$prev\">>></a>";
}


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

<div class="result_row">
    <a href="index.php?result_row=<?= 20;?>">Show row 20</a>
    <a href="index.php?result_row=<?= 40;?>">Show row 40</a>
    <a href="index.php?result_row=<?= 50;?>">Show row 50</a>
    <a href="index.php?result_row=<?= 100;?>">Show row 100</a>
</div>
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
                <td><?= $value['id'];?><a href="show.php?id=<?= $value['id'];?>">Show</a></td>

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
<div class="add_content">
    <a href="store.php?sum_note=<?= 1;?>">Add 1</a>
    <a href="store.php?sum_note=<?= 5;?>">Add 5</a>
    <a href="store.php?sum_note=<?= 10;?>">Add 10</a>
    <a href="store.php?sum_note=<?= 20;?>">Add 20</a>
    <a href="store.php?sum_note=<?= 50;?>">Add 50</a>

</div>
<div class="delete">
        <a href="delete.php">Delete</a>
</div>

</body>
</html>

