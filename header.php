<!DOCTYPE html>
<head>
    <!-- <title> theNews </title> -->
    <meta charset="<?php bloginfo('charset'); ?>"/>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 	<script src="<?php bloginfo('stylesheet_directory'); ?>/3.3.7/js/bootstrap.min.js"></script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


    <nav id="header" class="navbar navbar-default navbar-fixed-top" style="background-color:red">
        <!-- <div class="content-fluid top hidden-xs" id="toplogo">
            <div class="top-logo">
                <img src="logo.png" style="width: 300px; height: auto" />
            </div>
        </div> -->
        <div id="header-container" class="container-fluid navbar-container">
            <div class="navbar-header">
                <!-- <a class="navbar-brand hidden-xs" style="padding: 7px" id="logo" href="<?php echo home_url() ?>">
                    <img src="logo.png" style="width: 120px; height: auto; margin: auto 5px" />
                </a> -->

                <a class="navbar-brand" id="logo" href="<?php echo home_url() ?>">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/logo.png" style="width: 130px;padding-left:10px; height: auto; margin-top: 0px" />
                    
                </a>
                <p class="navbar-brand" style="font-size:1em; color: white; padding-top: 20px"><?php echo date('F j, Y') ?></p>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>


            <div class="collapse navbar-collapse" id="myNavbar">
                <div class="cen">
                    <ul class="nav navbar-nav navbar-center ">
                        <!-- <li><a href="single.html" class="nav-color" style="color:white" -->
                                <!-- title="News"> 2019 Elections</a></li> -->
                        <li><a href="../../../../category/news" class="nav-color" style="color:white" title="News">
                                News</a></li>
                        <li><a href="../../../../category/headlines" class="nav-color" style="color:white"
                                title="Headlines"> Headlines</a></li>
                        <li><a href="../../../../category/opinions" class="nav-color"style="color:white"
                                title="Opinion"> Opinion</a></li>
                        <li><a href="../../../../category/sports" class="nav-color" style="color:white" title="Sports">
                                Sports</a></li>
                        <li><a href="../../../../category/entertainment" class="nav-color" style="color:white"
                                title="Entertainment"> Entertainment</a></li>
                        <li><a href="../../../../category/lifestyle" class="nav-color" style="color:white"
                                title="Lifestyle"> Lifestyle</a></li>
                        <li>
                            <!--head search-->
                            
                            <?php get_search_form(); ?>
                            
                            <!--head search-->
                        </li>
                    
                    </ul>
                </div>
            </div>
        </div>
    </nav>