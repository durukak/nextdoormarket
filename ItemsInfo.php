<link rel="stylesheet" href="CSS/style3.css">
<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script type="text/javascript" src="JavaScript/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-light bg-light navbar-expand-sm sticky-top" style="background-color: #e3f2fd;">
        <div class="container">

            <a class="navbar-brand " style="color: red;" href="index.php">NEXTDOOR Market</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-nav mr-auto w-100 justify-content-end" id="search_box" style="text-align: center;padding-top:19;">
                <form action="search_result.php" method="get">
                    <input type="text" name="search_word" size="40" required="required">
                    <button class="btn btn=primary">Search</button>
                </form>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item"><a class="nav-link " href="index.php">Home </a></li>
                    <li class="nav-item"><a class="nav-link " href="ItemsPage.php">MyAds </a></li>
                    <li class="nav-item"><a class="nav-link active " href="ItemsList.php">Buy </a></li>
                    <li class="nav-item"><a class="nav-link " href="Logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    $Id = $_POST['Id'];
    $conn = new mysqli('localhost', 'root', '', "FYP");
    $GetItemQuery = "SELECT * from items WHERE Id ='$Id' ";
    $GetUserQuery2 = "SELECT * from users, items WHERE users.username = items.username and Id ='$Id' ";
    $result = $conn->query($GetItemQuery);
    $row = mysqli_fetch_array($result);
    $result2 = $conn->query($GetUserQuery2);
    $row2 = mysqli_fetch_array($result2);
    ?>

    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">

                        <?php echo '<img class="card-img-top" style="max-width: 100%; height: 350px;" src="Upload/'.$row['Image'].'" alt= "Image"  alt="Image">' ?>

                    </div>
                </div>
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><?php echo $row['Title'] ?></h1>
                            <p class="h3 py-2">Price: <?php echo $row['Price'] ?></p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Category: <?php echo $row['Category'] ?></h6>
                                </li>
                            </ul>
                            <h6>Description: <?php echo $row['Description'] ?></h6>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Condition: <?php echo $row['ItemCondition'] ?></h6>
                                </li>
                            </ul>
                            <h6>Shop information</h6>
                            <ul class="list-unstyled pb-3">
                                <li>Name: <?php echo $row2['username'] ?></li>
                                <li>Address: <?php echo $row2['address'] ?></li>
                                <li>Phone: <?php echo $row2['phone'] ?></li>
                                <li><a href="client.html">Chat with seller</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    
    
     <div class="container">
        <h5 class=" mt-5" id="textChange">Recommended Products</h5>

        <hr>

        <div class="text-center">
            <img src="Upload/loader.gif" id="loader" width="200" style="display: none;">
        </div>

        <div class="row" id="result">
            <?php 
              $sql = "SELECT * FROM items order by Id  desc LIMIT 4";
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                # code...
                ?>
                <div class="col-sm-6 col-lg-3 ">
                    <div  class="card-dec  ">
                        <div id="Products" class="card border-0 products text-center">
                            
                            <?php 
                            echo '<img class="card-img img-fluid float mb-3 rounded" src="Upload/'.$row['Image'].'" alt= "Image" >';
                             ?>
                            
                            <div class="card-body ">
                                <h6  class="text-light bg-info text-center rounded p-1"> <?= $row['Title']; ?></h6>
                                <h4 class="card-title text-danger">Price: <?= $row['Price']; ?></h4>
                                <?php
                                echo "<form action='ItemsInfo.php' method='post'>";

                            echo "<input type='hidden' value='".$row['Id']."' name='Id' />";

                            echo '<td> <button type="submit" class= "btnDetail" name="edit_data"> View details</button></td>';

                            echo "</form>";
                                  ?>
                            </div>

                        </div>
                    </div>
                </div>
                <?php 
              }

            ?>
            
        </div>

    </div>







    <footer class="footerSection bg-light   mt-5" id="footerdiv">
        <div class="mt-3 text-center">
            <p>Copyright &copy; 2021 All rights reserved. Created in HELP University </p>
        </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>