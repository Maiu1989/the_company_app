<?php
    session_start();
    require '../classes/User.php'; 

    $user_obj = new User; 
    $user = $user_obj->getUser(); 
    //$user = ['first_name' => 'mai' etc...]


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>

 <!-- Offline-->
    

<!--Online-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

 <!-- Offline-->
 <script src="js/bootstrap.bundle.js" ></script>
 <!--Online-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
 <!-- font awesome-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="../assets/css/style.css">
 
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark" style = "margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">The Company</h1>
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['fullname'] ?></span>
                <form action="../actions/logout_action.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="row justify-content-center gx-0">
        <div class="col-4">
            <h2 class="text-center mb-4">Edit Users</h2>
            <form action="../actions/Edit_action.php" method="post" enctype = "multipart/form-data">
                <div class="row justify-content-center mb-3">
                    <div class="col-6">
                        <?php 
                        if($user['photo']){
                            ?>
                            <img src="../assets/images/<?= $user['photo']?>" alt="<?= $user['photo']?>" class="d-block mx-auto edit-photo">
                            
                        <?php 
                        }else{

                            ?>
                            <i class="fa-solid fa-user text-secondary d-block text-center edit-icon"></i>
                       <?php 
                        }
                        ?>

                        <input type="file" name="photo" id="photo" class="form-control mt-s" accept="image/*">
                    </div>
                </div>
            <div class="mb-3">
                <label for="first-name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="<?=$user['first_name']?>" required autofocus>
                </div>
                <div class="mb-3">
                <label for="last-name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="<?=$user['last_name']?>" required>
                </div>
                <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control hw-bold" maxlength="15" value="<?=$user['username']?>" required>
                </div>
                <div class="text-end">
                    <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
                    <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
                </div>


            </form>
        </div>
    </main>

   
</body>
</html>