<?php 
    define('DB_NAME','pbk');
    define('DB_PASS','labor07pbk');

    if(isset($_POST['add'])){

    $conn = new PDO("mysql:host=localhost;dbname=".DB_NAME.";charset=utf8",
    DB_NAME,
    DB_PASS
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PBK::ERRMODE_EXCEPTION);
    $conn->setAttribute(PBK::ATTR_EMULATE_PREPARES,false);

    $sql ="INSERT INTO pbk.roles (name, active)VALUES ('{$_POST['name']}',($_POST['active]))";
    $res = $conn->query($sql);
    $roles= [];
    while($record = $res->fetch(PBK::FETCH_ASSOC))
    {
        aray_push($roles,$record);
    }
    $conn = null;
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Add New Role</h1>
        <form action="">
            <input type="hidden" name="add" value="1">
            <div class="form-group">
                <label for="name-input" >Name</label>
                <input class="form-control" type="text" name=name id="name-input">
            </div>
            <div class="form-group">
                <label for="active-select" >Active</label>
                <select name="active" id="active-select">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
        <button type="Submit" class="btn btn-primary mt-3"></button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>