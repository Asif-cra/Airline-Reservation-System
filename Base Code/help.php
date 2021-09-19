<html>
    <head>
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"
        meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark" id="navbar">
                <div class="container">
                <a href="index.php" class="navbar-brand"><h2>Atatturk</h2></a>
                <button 
                class="navbar-toggler" type="button" 
                data-bs-toggle="collapse" data-bs-target="#navmenu"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
  
                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                          <a href="Booking.php" class="nav-link links">Book</a>
                        </li>
                        <li class="nav-item">
                          <a href="help.php" class="nav-link links">Help</a>
                        </li>
                        <li class="nav-item">
                          <a href="manage.php" class="nav-link links">Manage</a>
                        </li>
                       
                        <li class="nav-item" id="logIn">
                          <a href="#" class="nav-link links" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                        </li>
                    </ul>
                    <div class="dropdown" id="dropIt" style="display:none;">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                    </div>
                            
                </div>
              </div>
            </nav>

        </header>
        <section class="mt-3">
            <div class="container mt-3">
                <h2 class="text-center mt-5 mb-5">Frequently Asked Questions</h2>
                <div class="accordion accordion-flush mx-5" id="questions">
                  <!-- item1 -->
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed"
                         type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                          >
                          Do i need visa to travel?
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse"
                       data-bs-parent="#questions">
                        <div class="accordion-body">For international travels, yes otherwise no</div>
                      </div>
                    </div>
                    <!-- itm2 -->
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button"
                         data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                         >
                          Do i need to test for COVID-19?
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse"
                        data-bs-parent="#questions">
                        <div class="accordion-body">Yes. You need to show the test results of COVID-19 </div>
                      </div>
                    </div>
                    <!-- itm3 -->
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                         data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                          >
                          Are all the flight crews vaccinated for COVID-19?
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" 
                       data-bs-parent="#questions">
                        <div class="accordion-body">Yes ! All of our flight attendates and crew members are vaccinated.</div>
                      </div>
                    </div>
                    <!-- itm4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" >
                          <button class="accordion-button collapsed" type="button"
                           data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" 
                           >
                            Will me and family be seated together?
                          </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                         aria-labelledby="flush-headingThree" data-bs-parent="#questions">
                          <div class="accordion-body">We will try our hardest to ensure that you and your family are seated together.</div>
                        </div>
                      </div>
                      <!-- imt 5 -->
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button"
                           data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseThree">
                            When do i check in?
                          </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">You must check in before at least 60 minutes from the flight.</div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                          <button class="accordion-button collapsed" type="button"
                           data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseThree">
                            How many bags can i take?
                          </button>
                        </h2>
                        <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">You can take any number of bags but the total weight must be lower than 23 kilograms. If its higher then you will be charged for every extra kilograms</div>
                        </div>
                      </div>
                  </div>
            </div>
        </section>


        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="JSh.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>