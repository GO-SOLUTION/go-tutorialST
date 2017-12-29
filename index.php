<!doctype html>
<html lang="de">
  <head>
    <title>Go-Tutorial</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="public/img/favicon.ico">
    
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="public/css/style.css" rel="stylesheet">    
  </head>
  <body>

  <body>

    <div class="container">
      <header class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-right">
            <li class="nav-item mr10">
              <a class="nav-link active" href="index.php"><i class="fa fa-home mr10"></i>Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" onclick="install()"><i class="fa fa-database mr10"></i>Installation</a>
            </li>
          </ul>
        </nav>
        <h3 class="text-muted">Go-Solution Tutorial List</h3>
      </header>

      <main role="main">

      

        <div class="row">
          <div class="col-md-12">

           

          </div>
        </div> 
        <div class="row">
          <div class="col-md-12">
            
            <h1>Tutoriallist</h1>
            <p>Dies ist eine Liste zu lernzwecken und Weiterbildung von Go-Solution.</p>

            <form>
              <label>Neues Turtorial hinzufügen:</label>
                <div class="row">
                  <div class="col">
                    <input type="hidden" name="id" id="id" value="0">
                    <input class="form-controll" type="text" name="beschreib" id="beschreib" value="Beschreib" placeholder="Beschreib">
                  </div>
                  <div class="col">
                    <input class="form-controll" type="text" name="what" id="what" value="what" placeholder="Über was">
                  </div>
                  <div class="col">
                    <input class="form-controll" type="text" name="website" id="website" value="link" placeholder="Link">
                  </div>
                  <div class="col">
                    <button onclick="speichern()" type="button" class="btn btn-success">
                      <i class="fa fa-save ml5 mr5"></i>Speichern
                    </button>
                  </div>
                </div>
            </form>


            <form method="get">
              <table class="table table-bordered table-striped" id="liste">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Beschreibung</th>
                    <th scope="col">Über</th>
                    <th scope="col">Link</th>
                    <th scope="col">Ralph</th>
                    <th scope="col">Sandro</th>
                    <th scope="col">Löschen</th>
                  </tr>
                </thead>
                <tbody id="daten">
                 
                </tbody>
              </table>
            </form>
            
          </div>
        </div>


      </main>

      <footer class="footer">
        <p>&copy; Go-Solution 2017</p>
      </footer>

    </div> <!-- /container -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> 
    <script src="public/js/app.js"></script>
  </body>
</html>