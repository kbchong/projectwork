<?php
use backend\models\GallerySearch;

?>
<!DOCTYPE html>

<html lang="en">


<!-- Heading Part 1, for Fulbright Science Assistance Program -->
<!-- CSS,  -->
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fulbright Science School Assistance Program (Grading System)</title>

       <!-- Meta tag for Search Engine Optimization -->
        <meta name="Fulbright Science School Website" content="Fulbright Science School's Offical Website!">
        <!--End-->

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
    </head>
    
    <!-- Heading Part 2, Upper Left -->
    <body>
    
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62123498-1', 'auto');
  ga('send', 'pageview');

</script>



        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                    	<h4>FULBRIGHT SCIENCE SCHOOL ASSISTANCE PROGRAM</h4>
                       
                    </a>
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                
                    <div class="nav-collapse collapse pull-right">
                        </div>
            
                </div>
            </div>
        </div>
 
        <div id="home">
            <div id="da-slider" class="da-slider">
                <div class="triangle"></div>
                <div class="mask"></div>
                <div class="container">
                    
                    <!-- For Slider No. 1 Code -->
                    <div class="da-slide">
                        <h2 class="fittext2">Our visions for our learners </h2>
                        <p id="Vision">Responding to the growing demand for quality education and the need of the present
                    time to make youth empowered learners, FULBRIGHT SCIENCE SCHOOL envisions learners 
                    equipped with adequate knowledge and skills and have maintained intellectual social
                    curiosity to become effective agents of social transformations.</p>
                        <div class="da-img">
                           
                        </div>
                    </div>
                    
                    <!-- For Slider No. 2 Code -->
                    <div class="da-slide">
                        <h4>Fulbright Science School<br>
                            Offical Website. Enroll Now.</h4>
                        <a href="?r=site/login" class="da-link button">Login</a>
                        <div class="da-img">
                           
                        </div>
                    </div>

                    <!-- For Slider No. 3 Code -->
                    <div class="da-slide">
                        <h2>Knowing the requirements</h2>
                        
                        <p>Transferee? Incoming freshmen? Or returning student?
                        We're now accepting new applicants. Click the button to see the requirements.</p>

                        <a href="?r=site/enrollment" class="da-link button">How to Enroll</a>
                        <div class="da-img">
                            
                        </div>
                    </div>
                    
                    <!-- Slider Navigation Arrows -->
                    <div class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                    </div>
                </div>
            </div>
        </div>


        <!-- Body Part1 Enrollment for Fulbright Science School -->
        <div class="section primary-section" id="service">
            <div class="container">
                <div class="title">
                    <h1>Why enroll at Fulbright Science School?</h1>
                    <p id="Mission">We are committed to giving quality education and values
                	formation. It shall become and ideal learning institution for 
                	young boys and girls in making them active learners through 
                	exploration and discovery. The students are encouraged to use 
                	their reasoning skills, practice listening, explore their 
                	environment and express, understand and handle their feelings 
                	intellectually. Each school activity shall offer the students the 
                	opportunity to establish confidence, responsibility and independence.</p>
                </div>

                <!-- For Enrollment Procedures Tab -->
                <div class="row-fluid">
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <img class="img-circle" src="images/Service1.png" alt="service 1">
                            </div>
                            <h3>Enrollment Procedures</h3>
                            <a href="?r=site/enrollment"  id="link">Click for more information.</a>

                        </div>
                    </div>

                    <!-- For School Requirements Tab -->
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <img class="img-circle" src="images/Service2.png" alt="service 2" />
                            </div>
                            <h3>School Requirements</h3>
                            <p>Learn more about what you need and when you need it. </p>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <img class="img-circle" src="images/Service3.png" alt="service 3">

                            </div>

                            <!-- For about the School's page -->
                            <h3>The School</h3>
                            <a href="?r=site/about" id="link">Click to view about the School</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- "Have you Seen Fulbright Science School?" part -->
        <div class="section secondary-section " id="portfolio">
            <div class="triangle"></div>
            <div class="container">
                <div class=" title">
                    <h1>Have you seen Fulbright Science School?</h1>
                    <p>Here are some photos of our school facilities and what we have in store for you.</p>
                </div>


                <!-- Details for School Gallery -->
                <?php
                    $searchModel = new GallerySearch();
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    foreach ($dataProvider->models as $model) {
                    
                    echo '<div id="single-project">
                    <div id="slidingDiv'.$model->id.'" class="toggleDiv row-fluid single-project">
                        <div class="span6">
                            <img src="'.$model->gallery_picture.'" alt="project '.$model->id.'" />
                        </div>
                        <div class="span6">
                            <div class="project-description">
                                <div class="project-title clearfix">
                                    <h3>'.$model->gallery_name.'</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                </div>
                                <div class="project-info">
                                    <div>
                                        <span></span>'.$model->gallery_name.'</div>
                                        
                                </div>
                                <p>'.$model->gallery_description.'</p>
                            </div>
                        </div>
                    </div>';
                }?> 


                    <!-- Main Images for the School's Gallery -->
                                <ul id="portfolio-grid" class="thumbnails row">
                <?php
                    $searchModel = new GallerySearch();
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    foreach ($dataProvider->models as $model) {
                    
                    echo '<li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="'.$model->gallery_picture.'" alt="project '.$model->id.'">
                                <a href="#single-project" class="more show_hide" rel="#slidingDiv'.$model->id.'">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>'.$model->gallery_name.'</h3>
                                
                                <div class="mask"></div>
                            </div>
                        </li>';
                }?>                       
                    </ul>
                </div>
            </div>
        </div>
        
        
       
        <div class="footer">
            <p>&copy; 2015 Fulbright Science School</p>
        </div>
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>

        <!-- Include javascript -->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
       
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>