<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Specific Recipe</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <!-- Custom External CSS -->
    <link rel="stylesheet" href="../css/specific_recipe.css">

    <!-- Custom External JavaScript -->
    <script src="../js/index.js"></script>

    <style>
    .header {
    text-align: center;
    color: rgb(36.6%, 33.3%, 23.6%);
    margin-top: 20px;
    }

    .icons {
        text-align: center;
        background-color: rgb(92.4%, 93.7%, 88.8%);
        margin-left: 450px;
        margin-right: 450px;
        margin-top: 30px;
        border-radius: 20px;
        margin: auto;
        width: 30%;
    }

    .ingredient {
        margin-top: 50px;
        margin-left: 260px;
        margin-bottom: 60px;
        margin: auto;
        padding-left: 100px;
    }

    .preparation {
        margin-top: 100px;
        margin-bottom: 50px;
        margin: auto;
    }

    .ingredient ul {
        margin: auto;
    }

    .preparation ol {
        margin: auto;
    }

    .card-img-overlay {
        width: 300px;
        height: 100%;
        background-size: contain;
        border-radius: 50%;
        margin: auto;
    }

    .btn {
        background: rgb(76.6%, 82.7%, 59.4%);
        border-color: rgb(76.6%, 82.7%, 59.4%);
        color: rgb(35.9%, 39.4%, 26.1%);
        font-size: 15px;
        font-weight: bold;
        min-width: 120px;
        margin-top: 20px;
        display: block;
        margin: auto;
    }

    .btn:hover {
        background: rgb(59.8%, 65.2%, 44.5%);
        border-color: rgb(59.8%, 65.2%, 44.5%);
    }
    </style>
</head>

<body>
    <!-- Navigation Pane Placeholder from specific_recipe_navi.php -->
    <div id="nav_placeholder"></div>

    <body>
    <!-- Constant Navigation Pane Placeholder -->
    <div id="nav_placeholder"></div>

    <!---Recipe Image Placeholder -->
    <div class='card recipe_image'>
        <img src="../images/blurimg.jpg">
        <img class="card-img-overlay" id="recipe_image" src=<?php echo $_POST["image"] ?>>
    </div>

    <div class='header'>
        <h6 class='text-muted'>RECIPE</h6>
        <!---Specific Recipe's Dish Name-->
        <h2 class="display-4" id="recipe_name" value=<?php echo $_POST["label"] ?>><?php echo $_POST["label"] ?></h2>
    </div>

    <div class='icons'>
        <!--Cook Time/Serving Size Details-->
        <ul class="list-inline">
            <li class='list-inline-item'>
                <i class='fas fa-fire' style="color:#76a04b; margin-right: 10px; margin-top: 20px; margin-bottom: 20px;">
                </i>
                <strong style="color:#76a04b; font-size: small;" id="calories"><?php echo round($_POST["calories"]) ?></strong>
                <small style="color:#76a04b;">kcal</small>
            </li>

            <li class='list-inline-item'>
                <i class='fas fa-user-alt' style="color:#76a04b; margin-right: 10px; margin-top: 20px; margin-bottom: 20px;">
                </i>
                <strong style="color:#76a04b; font-size: small;" id="servings"><?php echo $_POST["servings"] ?></strong>
                <small style="color:#76a04b;">people</small>
            </li>
        </ul>

    </div>

    <div class='row'>
        <div class='ingredient col-sm-6' id="ingredients">
            <h4>Ingredients</h4>
            <!---A list of ingredients -->
            <ul>
                <?php
                $ingredients = $_POST["ingredientLines"];
                $ingredientArray = explode(',', $ingredients);
                foreach($ingredientArray as $ingredient){
                    echo "<li>$ingredient</li>";
                }
                ?>
            </ul>
        </div>

        <div class='preparation col-sm-6' id="recipe_url">
            <h4>Preparation Steps</h4>
            <!--Recipe URL -->
            <?php echo $_POST["recipe_url"]?>
        </div>
    </div>


    <!-- If user is logged in, save recipe option is available for them -->
    <?php 
    if (isset($_SESSION["username"])){
        echo '<form action="profile.php" method="POST">';
            echo '<input type="submit" class="btn btn-primary" id="submit" value="Save Recipe">';
            echo '<input type="hidden" name="label" value=\''.$_POST["label"].'\'>';
            echo '<input type="hidden" name="image" value=\''.$_POST["image"].'\'>';
            echo '<input type="hidden" name="calories" value=\''.$_POST["calories"].'\'>';
            echo '<input type="hidden" name="source" value=\''.$_POST["source"].'\'>';
            echo '<input type="hidden" name="recipe_url" value=\''.$_POST["recipe_url"].'\'>';
            echo '<input type="hidden" name="totalNutrients" value=\''.$_POST["totalNutrients"].'\'>';
            echo '<input type="hidden" name="totalDaily" value=\''.$_POST["totalDaily"].'\'>';
            echo '<input type="hidden" name="bookmarked" value=\''.$_POST["bookmarked"].'\'>';
        echo '</form>';
    }
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <!-- Custom Internal Javascript -->
    <script>
        // Loads navigation pane automatically
        $(function() {
            $("#nav_placeholder").load("../php/navigation/specific_recipe_navi.php");
        });
    </script>

</body>

</html>