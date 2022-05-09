<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Half-Cooked</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <!-- Custom External CSS -->
    <link rel="stylesheet" href="css/index.css">

    <!-- Custom External Javascript -->
    <script src="js/index.js"></script>

    <style>
        .dark    {
        font-family: 'Raleway', sans-serif;
        padding: 3em 2em;
        font-size: 18px;
        background: #222;
        color: #aaa
        }

        h1,h2 {
        font-weight: 200;
        margin: 0.4em 0;
        }

        h1 { font-size: 3.5em; }
        h2 {
        color: #888;
        font-size: 2em;
        }

        .card:hover {
        box-shadow: 0px 30px 18px -8px rgba(0, 0, 0,0.1);
          /* transform: scale(1.10, 1.10); */
          opacity: 0.7;
          transition: all 1s ease-in-out;
      }

      .uppercase {
        text-transform: uppercase;
      }
    </style>

</head>

<body>
    <!-- Constant Navigation Pane Placeholder -->
    <div id="nav_placeholder"></div>

    <!-- Reference from Brauson on Codepenio -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
    <div class="dark"><h1>Our recipes are
    <span
        class="txt-rotate"
        data-period="2000"
        data-rotate='[ "Healthy.", "Nutritious.", "Delicious.", "fun!" ]'></span>
        </h1>
        <h2>A single recipe is all you need.</h2>
    </div>


<script>
        var TxtRotate = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
        };

        TxtRotate.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 300 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function() {
            that.tick();
        }, delta);
        };

        window.onload = function() {
        var elements = document.getElementsByClassName('txt-rotate');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-rotate');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
            new TxtRotate(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
        document.body.appendChild(css);
        };
</script>

    <!-- All Content -->
    <div class="row no-gutters">

        <!-- Quote Design -->
        <div class="col-2" style="margin-top: 200px; padding-left: 2px;">
            <img src="images/quote2.png" style="width: 70%; height: 700px;">
        </div>

        <!-- Main Content -->
        <div class="col-10 mt-4">
            <div class="display-3 discover dropdown" style="margin-left:10px;">
                <button class="btn btn-lg btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                😋 Discover here &#8675;
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#cuisine">Cuisine 🌍</a>
                    <a class="dropdown-item" href="#meal">Meal of the Day 🕔</a>
                    <a class="dropdown-item" href="#diet">Dietary 🍅 </a>
                    <a class="dropdown-item" href="#health">Health 🌿</a>
                </div>
            </div>

            <!-- Filtered recipes display -->
            <div class="btn-group  mt-2 mb-5  justify-content-center" data-toggle="buttons">
            <div class="container-sm card-columns" id="filtered_recipes" style="margin-top:20px;"></div>
            </div>

            <!-- All categories default display -->
            <div id="categories" style="text-align:center;">
                <div class="mb-5">
                    <h2 class="display-5 discover my-4 uppercase"><a id="cuisine">Cuisine</a></h2>

                    <div class="card-deck">
                        <div class="card" id="card">
                                <img class="card-img-top" src="images/cuisine/american.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="american" onclick="display_recipes()">American</a></h5>
                            </div>
                        </div>

                        <div class="card">
                            <img class="card-img-top" src="images/cuisine/asian.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="asian" onclick="display_recipes()">Asian</a></h5>
                                
                            </div>
                        </div>

                        <div class="card">
                            <img class="card-img-top" src="images/cuisine/french.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="french" onclick="display_recipes()">French</a></h5>
                                
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/cuisine/indian.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="indian" onclick="display_recipes()">Indian</a></h5>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <h2 class="display-5 discover my-4 uppercase"><a id="meal">Meal of the Day</a></h2>
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="images/meal/breakfast.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="breakfast" onclick="display_recipes()">Breakfast</a></h5>
                                
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/meal/lunch.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="lunch" onclick="display_recipes()">Lunch</a></h5>
                                
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/meal/dinner.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="dinner" onclick="display_recipes()">Dinner</a></h5>
                                
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/meal/snack.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="snack" onclick="display_recipes()">Snack</a></h5>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <h2 class="display-5 discover my-4 uppercase"><a id="diet">Dietary</a></h2>

                    
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="images/diet/balanced.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="balanced" onclick="display_recipes()">Balanced</a></h5>
                                
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/diet/high-protein.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="high-protein" onclick="display_recipes()">High Protein</a></h5>
                                
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/diet/low-fat.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="low-fat" onclick="display_recipes()">Low Fat</a></h5>
                                
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/diet/low-carb.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="low-carb" onclick="display_recipes()">Low Carb</a></h5>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <h2 class="display-5 discover my-4 uppercase"><a id="health">Health</a></h2>
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="images/health/vegan.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="vegan" onclick="display_recipes()">Vegan</a></h5>
                                
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/health/vegetarian.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="vegetarian" onclick="display_recipes()">Vegetarian</a></h5>
                                
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="images/health/alcohol-free.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#!" id="alcohol-free" onclick="display_recipes()">Alcohol Free</a></h5>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <!-- Custom internal Javascript -->
    <script>
        var value = {};
        $(function() {
            $("#nav_placeholder").load("php/navigation/index_navi.php");
        });
    </script>
</body>

</html>