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
    $conn = new mysqli('localhost', 'root', '', "FYP");
    $GetItemQuery = "SELECT * from items";
    $result = $conn->query($GetItemQuery);
    ?>

    <table id="testTable" class="col-12 table table table-hover  table-borderless ">
        <form name="ItemInfo" action="ItemsInfo.php" method="POST">
            <section>
                <div class="container py-5">
                    <div class="row">
                        
                        <?php
                        $Num = 0;
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                $Num++;
                                echo '<div class="col-8 col-md-3 mb-3">';
                                echo '<div class="card h-100">';
                                echo '<button style="border:none; outline:0; display:inline=block;" type="submit" name="Id" value="' . $row['Id'] . '">';
                                echo '<img src="Upload/' . $row['Image'] . '" class="card-img-top" style="max-width: 100%; height: 250px;" alt="...">';
                                echo '</button>';
                                echo '<div class="card-body">';
                                echo '<p class="h4 text-decoration-none text-dark" >' . $row['Title'] . '</p>';
                                echo '<p class="text-muted">' . $row['Price'] . '</p>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        ?>
                        
                    </div>
                </div>
            </section>
        </form>
    </table>
    
       

    <footer class="footerSection bg-light   mt-5" id="footerdiv">
        <div class="mt-3 text-center">
            <p>Copyright &copy; 2021 All rights reserved. Created in HELP University </p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>