<?php
 include "includes/header.php";
 include "dashboard/includes/config.php";
?>

        <header class="header">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Forest Timemenu" aria-controls="Forest Timemenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="Forest Timemenu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="category.php">Gardening</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="category.php">Outdoor Living</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="category.php">Indoor Living</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="category.php">Shopping Guides</a>
                            </li>  
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div><!-- end container -->
        </header><!-- end header -->

        <div id="map"></div>
 
        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4>Who we are</h4>
                                    <p>Forest Time is a personal blog for handcrafted, cameramade photography content, fashion styles from independent creatives around the world.</p>
                                </div>

                                <div class="col-lg-4">
                                    <h4>How we help?</h4>
                                    <p>Etiam vulputate urna id libero auctor maximus. Nulla dignissim ligula diam, in sollicitudin ligula congue quis turpis dui urna nibhs. </p>
                                </div>

                                <div class="col-lg-4">
                                    <h4>Pre-Sale Question</h4>
                                    <p>Fusce dapibus nunc quis quam tempor vestibulum sit amet consequat enim. Pellentesque blandit hendrerit placerat. Integertis non.</p>
                                </div>
                            </div><!-- end row -->

                            <hr class="invis">

                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <form class="form-wrapper">
                                        <input type="text" class="form-control" placeholder="Your name">
                                        <input type="text" class="form-control" placeholder="Email address">
                                        <input type="text" class="form-control" placeholder="Phone">
                                        <input type="text" class="form-control" placeholder="Subject">
                                        <textarea class="form-control" placeholder="Your message"></textarea>
                                        <button type="submit" class="btn btn-primary">Send <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <?php include "includes/footer.php" ?>