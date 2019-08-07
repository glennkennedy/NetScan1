<?php require "login/loginheader.php"; ?>

<?php require "header.php";?>


  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#">NetScan</a>
      <a class="btn btn-primary" href="login/logout.php">Logout</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Want to try a free scan on your website?</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
<form action="/scan.php" method="post">
              <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input name = "url" type="text" class="form-control form-control-lg"  minlength="3" required  pattern="[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9](?:\.[a-zA-Z]{2,})+" placeholder="Enter your website you want to scan">

              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">search</button>


              </div>
              <div class="col-md-4 col-md-4 col-md-4">
              <div class="checkbox">
                <label><input type="checkbox" name = "commonPorts" value="1">Scan most common ports</label>
              </div>
            </div>
            <br>
              <div class="col-12 col-md-3">
              <label for="sel1">Or choose your own(Can only scan 5 ports at a time)</label>
              <input name = "port1" type="number" class="form-control form-control-lg" placeholder="" min="0" max="65535">
              <input name = "port2" type="number" class="form-control form-control-lg" placeholder="" min="0" max="65535">
              <input name = "port3" type="number" class="form-control form-control-lg" placeholder="" min="0" max="65535">
              <input name = "port4" type="number" class="form-control form-control-lg" placeholder="" min="0" max="65535">
              <input name = "port5" type="number" class="form-control form-control-lg" placeholder="" min="0" max="65535">

              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery/jquery.min.js"></script>
  <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
