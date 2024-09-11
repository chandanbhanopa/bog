<?php
$url = $_SERVER['PHP_SELF'];
$url = str_replace("/","",$url);
?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        
        <a class="navbar-brand flex w-1/2"  href="index.php">
            <img src="images/logo.jpg" width="15%" />
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item <?php echo $url == "index.php" ? 'active' : '' ?>">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <?php  /*
                <li class="nav-item  <?php echo $url == "about.php" ? 'active' : '' ?>"">
                    <a href="about.php" class="nav-link">About</a>
                </li>
                */
                ?>
                <li class="nav-item  <?php echo $url == "services.php" ? 'active' : '' ?>"">
                    <a href="services.php" class="nav-link">Services</a>
                </li>
                <?php  /*
                <li class="nav-item  <?php echo $url == "cases.php" ? 'active' : '' ?>"">
                    <a href="cases.php" class="nav-link">Case Study</a>
                </li>
                                */
                                ?>
                <li class="nav-item  <?php echo $url == "blog.php" ? 'active' : '' ?>"">
                    <a href="blog.php" class="nav-link">Blog</a>
                </li>
                <li class="nav-item  <?php echo $url == "career.php" ? 'active' : '' ?>"">
                    <a href="career.php" class="nav-link">Career</a>
                </li>
                <li class="nav-item  <?php echo $url == "contact.php" ? 'active' : '' ?>"">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>