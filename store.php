<?php

$sum_note = $_GET['sum_note'];

for ($i = 1; $i <= $sum_note; $i++){
    $pdo = new PDO("mysql:host=localhost; dbname=as", "root","");

    $name = array("Abraham", "Addison", "Adrian", "Albert", "Alec", "Alfred", "Alvin", "Andrew", "Andy", "Archibald", "Archie", "Arlo", "Arthur", "Arthur", "Austen", "Barnabe", "Bartholomew", "Bertram", "Bramwell", "Byam", "Cardew", "Chad", "Chance", "Colin", "Coloman", "Curtis", "Cuthbert", "Daniel", "Darryl", "David", "Dickon", "Donald", "Dougie", "Douglas", "Earl", "Ebenezer", "Edgar", "Edmund", "Edward", "Edwin", "Elliot", "Emil", "Floyd", "Franklin", "Frederick", "Gabriel", "Galton", "Gareth", "George", "Gerard", "Gilbert", "Gorden", "Gordon", "Graham", "Grant", "Henry", "Hervey", "Hudson", "Hugh", "Ian", "Jack", "Jaime", "James", "Jason", "Jeffrey", "Joey", "John", "Jolyon", "Jonas", "Joseph", "Joshua", "Julian", "Justin", "Kurt", "Lanny", "Larry", "Laurence", "Lawton", "Lester", "Malcolm", "Marcus", "Mark", "Marshall", "Martin", "Marvin", "Matt", "Maximilian", "Michael", "Miles", "Murray", "Myron", "Nate", "Nathan", "Neil", "Nicholas", "Nicolas", "Norman", "Oliver", "Oscar", "Osric", "Owen", "Patrick", "Paul", "Peleg", "Philip", "Phillipps", "Raymond", "Reginald", "Rhys", "Richard", "Robert", "Roderick", "Rodger", "Roger", "Ronald", "Rowland", "Rufus", "Russell", "Sebastian", "Shahaf", "Simon", "Stephen", "Swaine", "Thomas", "Tobias", "Travis", "Victor", "Vincent", "Vincent", "Vivian", "Wayne", "Wilfred", "William", "Winston", "Zadoc");
    $random_name = array_rand($name);

    $surname = array("Johnson", "Williams", "Jones", "Brown", "Davis", "Miller", "Wilson", "Moore", "Taylor", "Anderson");
    $random_surname = array_rand($surname);

    $patronymic = array("Victorovich", "Stasov", "Georgiyev", "Vasilyev", "Aleksandrov",  "Mikhaylovich", "Vasilyevich", "Vladimirovich", "Vova");
    $random_patronymic = array_rand($patronymic);

    $randomDate = mt_rand(1, time());
    $birthday = date("Y-m-d", $randomDate);

    $department = array("Office", "Design department", "Technical department", "Powerhouse", "Experimental workshop", "Training Department", "Pilot production", "Finance Department",  "Office service", "Accounting", "Secretariat");
    $random_department = array_rand($department);

    $position = array("Manager", "Dispatcher", "Dealer", "Broker", "Administrator", "HR Manager", "Technologist", "Designer", "Engineer", "Director");
    $random_position = array_rand($position);

    $type_person = array("Hour", "Month");
    $random_type_person = array_rand($type_person);

    $salary = rand(1, 4087);


    $sql = "INSERT INTO list (surname, name, patronymic, birthday, department, position, type_person, salary)
                  VALUES ( '$surname[$random_surname]','$name[$random_name]', '$patronymic[$random_patronymic]', '$birthday' , '$department[$random_department]', '$position[$random_position]', '$type_person[$random_type_person]', '$salary')";
    $statement = $pdo->prepare($sql);
    $result = $statement->execute();
}

header("Location: index.php");
exit;

//var_dump($result);
?>