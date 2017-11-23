<?php

require_once "../config/db.php";

if (isset($_GET["q"])) {
    $query = $_GET["q"];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="This is a test for project n°3 team 26">
    <meta name="author" content="0m3ga-K0d3r">
    <link rel="icon" href="">

    <!-- Normalize CSS :D -->
    <link rel="stylesheet" href="../assets/css/vendors/normalize.css">

    <!-- Bootstrap & FontAwesome Stylesheets -->
    <link rel="stylesheet" href="../assets/css/vendors/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/vendors/bootstrap-select.min.css">
    <link rel="stylesheet" href="../assets/css/vendors/font-awesome.min.css">
    <!-- For Icons -->
    <!-- Custom CSS File -->
    <!-- Animation CSS -->
    <link rel="stylesheet" href="../assets/css/vendors/animate.min.css">
    <link rel="stylesheet" href="../assets/css/resources/search.css">



    <script src="../assets/js/vendors/jquery-3.1.1.min.js"></script>

    <title>DANYA PRJECT | 0m3ga-k0d3r</title>
</head>


<body>
<!-- PRELOADER -->
<div class="spn_hol">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<!-- END PRELOADER -->

<!-- Navbar Start -->


<nav class="navbar light-theme">
    <div class="container">
        <!-- Logo and Toggle Are grouped for better mobile Display -->
        <div class="navbar-header"> <!-- Navbar Header -->
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigationLinks"
                    aria-expanded="false">
                <i class="fa fa-bars"></i>
            </button>
            <!-- - Logo Start -->
            <a href="../editor/index.php" class="navbar-brand">0m3ga<strong>K0d3r.</strong></a>
            <!-- - Logo End -->
        </div> <!-- End Navbar Header -->
        <!-- Begin Navigation Links -->
        <!-- Collecting nav links,forms and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigationLinks">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-gear"></i> Settings <i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li><a href="" data-target="#changeWebsiteThemeModal" data-toggle="modal">Change Website Theme</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="../editor/index.php"><i class="fa fa-code"></i> Editor</a>
                </li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">More &nbsp;<i class="fa  fa-chevron-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="../editor/developers.php"><i class="fa fa-group"></i> &nbsp;Developers</a></li>
                        <li><a href="index.php"><i class="fa fa-clock-o"></i>  &nbsp;Latest Saved</a></li>
                        <li class="divider"></li>
                        <li><a href="../editor/contact.php"><i class="fa fa-envelope"></i> &nbsp;Contact Us</a></li>
                        <li><a href="../editor/about.php"><i class="fa fa-question-circle"></i> &nbsp;About Project</a></li>
                    </ul>
                </li>

            </ul>

        </div>


        <!-- End Navigation Links -->

    </div>
</nav>
<!-- Navbar End -->



<div class="container" id="searchContainer">
    <div class="row" id="searchBar">
        <div class="col-md-6 col-md-offset-3">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search Here" value="<?php global $query; echo $query; ?>">
                    <span class="input-group-btn">
                    <input type="submit" value="search" class="btn btn-custom">
                </span>
                </div>
                <br><br>
                <div class="row">
                <div class="col-md-1">
                    
                </div>
                    <div class="col-md-5">
                        <p>Date</p>
                        <select class="selectpicker" name="date" id="datefilter">
                           <option value="latest">Latest Websites</option>
                           <option value="Oldest">Oldest Websites</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                       <p>Category</p>
                       <select class="selectpicker" name="category" id="cat_filter">
                          <option value="all">All</option>
                          <option value="Security">Security</option>
                          <option value="Economy">Economy</option>
                          <option value="Linux">Linux</option>
                          <option value="Web">Web</option>
                       </select>
                    </div>
                </div>

            </form>
        </div>
    </div>




        <?php
            if (isset($_GET["q"])) {
                $query = $_GET["q"];
                $cat = $_GET["category"];
                if (strcmp($_GET["date"], "Oldest") == 0) {
                   if (strcmp($cat,"all") == 0) {
                      $sql = "SELECT * FROM savedwebsites WHERE website_name LIKE '%$query%' ORDER BY website_date_saved ASC ";
                   } else {
                      $sql = "SELECT * FROM savedwebsites WHERE website_name LIKE '%$query%' AND website_category='$cat' ORDER BY website_date_saved ASC ";
                   }

                } else {
                   if (strcmp($cat,"all") == 0) {
                      $sql = "SELECT * FROM savedwebsites WHERE website_name LIKE '%$query%' ORDER BY website_date_saved DESC ";
                   } else {
                      $sql = "SELECT * FROM savedwebsites WHERE website_name LIKE '%$query%' AND website_category='$cat' ORDER BY website_date_saved DESC ";
                   }

                }





                echo "<h4 class='text-center'>Results for: $query</h4>";
                $sqlResult = mysqli_query($conn, $sql);
                if ($sqlResult) {
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($sqlResult)) {
                        $count++;

                        echo "<div class='row searchResult'>";


                        echo "<div class=\"col-md-4\">";
                        echo "<div class=\"card\">";
                        echo "<a href=\"javascript:void(0)\" style=\"padding-left:40px;\"> <i class=\"fa fa-file \" style=\"font-size:250px; padding-top:20px;\"></i></a>";
                        echo "<br><br><br>";
                        echo "<div class=\"card-container\">";
                        echo "<h3>" . $row['website_name'] ."</h3>";
                        echo "Category: " . "<span class=\"label label-primary\">". $row['website_category'] ."</span>";
                        echo "<br>";
                        echo "Date: " . $row['website_date_saved'];
                        echo "<p> Descrition: ". substr($row['website_description'], 0, 120) ." ...</p>";
                        echo "<div class=\"btn-group btn-group-justified\" role=\"group\">";
                        echo "<a class='btn btn-custom' href='../editor/index.php?edit_id=" . $row['website_id'] . "'>Edit</a>";
                        echo "<a class='btn btn-success' href='view.php?id='" . $row['website_id'] . ">View</a>";

                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            }



        ?>



</div>












<script src="../assets/js/vendors/tether.min.js"></script>
<script src="../assets/js/vendors/bootstrap.min.js"></script>
<script src="../assets/js/vendors/bootstrap-select.min.js"></script>

<script>
    $(window).bind("load", function () {
        $(".spn_hol").fadeOut(1000);


    });
    $('.selectpicker').selectpicker({
        style: 'btn-custom',
        size: 4
    });
</script>

</body>
</html>
