<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
      rel="stylesheet"
    />
<link rel="stylesheet" href="css/login.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <link href="css/bootstrap-icons.css" rel="stylesheet" />

    <link href="css/templatemo-topic-listing.css" rel="stylesheet" />
  </head>
  <body id="top">
    <main>
        <div class="sticky-wrapper">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html">
            <i class="bi bi-dice-6"></i>
            <span>Random Game</span>
          </a>
        </div></div>
      </nav>
    </main>
    <div class="site-header d-flex justify-content-center align-items-center "  style="width: 100vw; height: 100vh"; >
        <div class="wrapper">
            <div class="logo">
                <lord-icon
                src="https://cdn.lordicon.com/xzalkbkz.json"
                trigger="hover"
                style="width:100px;height:100px">
            </lord-icon>
            </div>
            <div class="text-center mt-4 name">
                Sign In
            </div>
            <form class="p-3 mt-3" method="POST" action="php/login.php">
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" name="userName" id="userName" placeholder="Username">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password" id="pwd" placeholder="Password">
                </div>
                
                <button class="btn mt-3" type="submit" >Login</button>
            </form>
            <div class="text-center fs-6">
                <a href="#">Forget password?</a> or <a href="Signup.php">Sign up</a>
            </div>
        </div>
        </div>
       
     </div>
    </div>
  
  </body>
</html>
