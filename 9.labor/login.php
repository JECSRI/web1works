<?php

    require_once('config.php');

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $conn = new PDO(
            'mysql:host=localhost;dbname='.DB_NAME.';charset=utf8',
            DB_NAME,
            DB_PASS
        );

        $sql = "SELECT * FROM users  
        WHERE email = '{$_POST['email']}' AND password = SHA1('{$_POST['password']}')";

        $res = $conn->query($sql);
        $records = $res->fetchAll(PDO::FETCH_ASSOC);
        var_dump($records);
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
    <?php include 'common/nav.php'; ?>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="w-50 mx-auto" action="" method="POST">
                    <h3 class="mt-3">Login</h3>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input name="email" type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary mt-5">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>