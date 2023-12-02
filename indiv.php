<!doctype html>
<html lang="en">
    <head>
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Topic Listing Bootstrap 5 Template</title>
       
        <!-- CSS FILES -->          
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <script>  <?php session_start(); ?>
          var id = parseInt("<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : '0'; ?>");

  var score = parseInt("<?php echo isset($_SESSION['score']) ? $_SESSION['score'] : '0'; ?>");
  var username = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";
</script>
        <link href="css/templatemo-topic-listing.css" rel="stylesheet">      
        <script src="/TopicListing-1.0.0/js/script.js" ></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    </head>
 

    <body id="top" >

        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.html">
                        <i class="bi bi-dice-6"></i>
                        <span >Random Game</span>
                    </a>


                        <div class="d-none d-lg-flex" style="display: flex;">
                        <?php  echo'<h6 style="margin-right:20px;">'. $_SESSION['username'] .' </h6>'; ?>
                            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                            
                        </div>
                    </div>
                </div>
            </nav>
            

            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 mx-auto ">
                            <h1 class="text-white text-center" data-aos="fade-up">Guess. Try. Enjoy</h1>

                            <h6 class="text-center">try to find out the number</h6>
                            <div class="text-center"> <!-- Centering container -->
        <img src="images/trophy.png" alt="" style="width: 80px; height:auto;" class="center-image">
    </div>

                            <?php  echo'<h1 id="scoreDisplay" class="text-white text-center" data-aos="fade-up">'. $_SESSION['score'] .' </h1>'; ?>
                            <div class="row col-lg-10 col-12 mx-auto">
                                <div class="col">
                                    <button type="reset"  id="custom-button" onclick="initialisation()">new game</button>
                                </div>
                                <div class="col">
                                    <button type="submit" id="custom-button"  onclick="affiche()">Answer</button>
                                </div>
                                <div class="col">
                                    <button type="submit"  id="custom-button" onclick="closeWindow()" >Exit</button>
                                </div>
                            </div>
                            

                            <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search" id="myForm">
                                <div class="input-group input-group-lg">
                                    <input name="keyword" type="search" class="form-control" id="prop" placeholder="number" aria-label="Search">
                                    <button type="submit" id="check" class="form-control">Check</button>
                                </div>
                            </form>
                            

                    </div>
                </div>
            </section>

<section class="featured-section">
    <div class="container" >
        <div class="row justify-content-center">

            <div class="col-lg-8 col-12 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    
                        <div class="d-flex justify-content-center align-items-center">
                            <table class="table-output">
                        
                                    <td><i> Attempt N°:</i></td><td><input type="text" class="output" name="essai" id="essaiInput" size="30"></td></tr><tr><td>
                                    <i>Message:</i></td><td><input type="text" class="output" name="msg" id="msgInput" size="30"></td></tr><tr><td>
                                    <i>Answer:</i></td><td><input type="text" class="output" name="rep" size="30" id="rep"></td></tr>
                                    
                            </table>
                 
                </div>
            </div>
            <div class="div-histo "   >
                <table id="his" class="styled-table col-lg-8 col-12 " >
                   <thead><tr>
                        <th>Attempt </th>
                        <th>Value </th>
                        <th>Message </th>
                    </tr>
                </thead> 
                    <tbody id="historique">
            
                    </tbody>
                </table>
                </div>
                
<!--
            <div class="col-lg-10 col-12">
                <div class="custom-block custom-block-overlay">
                    <div class="d-flex flex-column h-100">
                        <img src="images/businesswoman-using-tablet-analysis.jpg" class="custom-block-image img-fluid" alt="">
                        <div class="custom-block-overlay-text d-flex">
                            <div>
                                <h5 class="text-white mb-2">Finance</h5>
                                <p class="text-white">Topic Listing Template includes homepage, listing page, detail page, and contact page. You can feel free to edit and adapt for your CMS requirements.</p>
                                <a href="topics-detail.html" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                            </div>
                            <span class="badge bg-finance rounded-pill ms-auto">25</span>
                        </div>
                        <div class="social-share d-flex">
                            <p class="text-white me-4">Share:</p>
                            <ul class="social-icon">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-facebook"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="section-overlay"></div>
                    </div>
                </div>
            </div>-->

        </div>
    </div>
</section>



        </footer>


        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>
        
 
<script>AOS.init()</script>
    </body>
</html>
