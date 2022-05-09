<?php
    session_start();
    if(isset($_POST["calories"])){
        $saved = true;
    }

    else{
        $saved = false;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <!-- Custom External CSS -->
    <link rel="stylesheet" href="../css/profile.css">

    <!-- D3 Library -->
    <script src="https://d3js.org/d3.v6.min.js"></script>
</head>

<body onload="update_recipes()">
    <!-- Navigation Pane -->
    <nav id="navigation" class="navbar navbar-expand-sm navbar-light bg-light static-top py-4">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item active mr-3">
                <a class="nav-link" href="../index.php" id="home">Home
                    <span class="sr-only">(current)</span></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="signup.php" id="signup">Sign Up
                    <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="login.php" id="login">Log In</a>
            </li>

            <!-- Once logged in, profile and log out will appear -->
            <?php
            if (isset($_SESSION["username"])) {
                echo "
                <script>
                    document.getElementById('signup').innerText = 'Profile';
                    document.getElementById('signup').id = 'profile';
                    document.getElementById('profile').setAttribute('href', 'profile.php');

                    document.getElementById('login').innerText = 'Log Out';
                    document.getElementById('login').id = 'logout';
                    document.getElementById('logout').setAttribute('href', 'logout.php');
                </script>
                ";
            }
            ?>
        </ul>
    </div>
</nav>

    <!-- User Profile Details --> 
    <div class="box">
        <!-- Default User Profile Image -->
        <div class="image"></div>

        <!-- Username --> 
        <ul class="text">
            <?php echo $_SESSION["username"] ?>
        </ul>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <h4>
                        <div class="title title_box" style="font-family: Arial, Helvetica, sans-serif;">
                            SAVED RECIPE OF THE DAY
                        </div>
                    </h4>

                    <hr/>

                    <!-- Populated with all saved recipes -->
                    <div class="row" style="margin:auto;" id="saved_recipes"></div>
                </div>

                <div class="col-lg-5">
                    <!-- represents the calories for all the liked recipes -->
                    <h4>
                        <div class="title title_box" style="background-color: #AEAEAE; font-family: Arial, Helvetica, sans-serif;">
                            CALORIE TRACKER
                        </div>
                    </h4>

                    <hr/>

                    <section>
                        <svg viewBox="0 0 327 250">
                            <!-- viz here -->
                        </svg>
                    </section>
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
        function update_recipes(){
        var saved = '<?php echo $saved; ?>';
        
        if(saved = true){
            var label = '<?php echo $_POST["label"]; ?>';
            var image = '<?php echo $_POST["image"]; ?>';
            var source = '<?php echo $_POST["source"]; ?>';
            var recipe_url = '<?php echo $_POST["recipe_url"]; ?>';
            var totalNutrients = '<?php echo $_POST["totalNutrients"]; ?>';
            var totalDaily = '<?php echo $_POST["totalDaily"]; ?>';
            var bookmarked = '<?php echo $_POST["bookmarked"]; ?>';
            var html_str = '';

            html_str = `
            <div class="col-sm-6">
                <div class="card">
                <a href="#" class="card_link">
                    <div class="card__img--hover"></div>
                </a>
                <img class="card-img-top" src="${image}">
                <div class="card-body">
                    <h5 class="card__category">Recipe</h5>
                    <h5 class="card_info">${label}</h5>
                    <h6><i>${recipe_url}</i></h6>
                </div>
            </div>
            `;
            
            // Attempt to use localStorage to store recipes
            localStorage.setItem('recipe_str', localStorage.getItem('recipe_str') + html_str);

            document.getElementById("saved_recipes").innerHTML += localStorage.getItem('recipe_str');
        }

    }

        // Referenced from Codepen (https://codepen.io/borntofrappe/pen/yWJWVV) 
        // input data
        var calories = '<?php echo $_POST["calories"]; ?>';
        const data = [{
                name: 'Carbs',
                percentage: 31, // percentage
                value: 80, // millions
                color: '#FFBE61',
            },
            {
                name: 'Protein',
                percentage: 54,
                value: 140,
                color: '#6ACC01',
            },
            {
                name: 'Fats',
                percentage: 15,
                value: 40,
                color: '#F14647',
            },
        ];

        // retrieve the svg in which to plot the viz
        const svg = d3
            .select('svg');

        // identify the dimensions of the viewBox to establish the svg canvas
        const viewBox = svg.attr('viewBox');
        const regexViewBox = /\d+ \d+ (\d+) (\d+)/;
        // ! .match() returns string values
        const [, viewBoxWidth, viewBoxHeight] = viewBox.match(regexViewBox).map(item => Number.parseInt(item, 10));

        // with the margin convention include a group element translated within the svg canvas
        const margin = {
            top: 20,
            right: 20,
            bottom: 20,
            left: 20,
        };
        // compute the width and height of the actual viz from the viewBox dimensions and considering the margins
        // this to later work with width and height attributes directly through the width and height variables
        const width = viewBoxWidth - (margin.left + margin.right);
        const height = viewBoxHeight - (margin.top + margin.bottom);

        // compute the radius as half the minor size between the width and height
        const radius = Math.min(width, height) / 2;
        // initialize a variable to have the multiple elements share the same stroke-width property
        const strokeWidth = 10;

        const group = svg
            .append('g')
            .attr('transform', `translate(${margin.left} ${margin.top})`);


        // DEFAULT CIRCLE
        // circle used as a background for the colored donut chart
        // add a group to center the circle in the canvas (this to rotate the circle from the center)
        const groupDefault = group
            .append('g')
            .attr('transform', `translate(${width / 2} ${height / 2})`);

        // append the circle showing only the stroke
        groupDefault
            .append('circle')
            .attr('cx', 0)
            .attr('cy', 0)
            .attr('r', radius)
            .attr('transform', 'rotate(-90)')
            .attr('fill', 'none')
            .attr('stroke', 'hsla(0, 0%, 0%, 0.08')
            .attr('stroke-width', strokeWidth)
            .attr('stroke-linecap', 'round')
            // hide the stroke of the circle using the radius
            // this to compute the circumference of the shape
            .attr('stroke-dasharray', radius * 3.14 * 2)
            .attr('stroke-dashoffset', radius * 3.14 * 2);


        // COLORED CIRCLES
        // pie function to compute the arcs
        const pie = d3
            .pie()
            .sort(null)
            .padAngle(0.12)
            // use either the value or the percentage in the dataset
            .value(d => d.value);

        // arc function to create the d attributes for the path elements
        const arc = d3
            .arc()
            // have the arc overlaid on top of the stroke of the circle
            .innerRadius(radius)
            .outerRadius(radius);

        /* for each data point include the following structure
        g             // wrapping all arcs
            g           // wrapping each arc
            arc       // actual shape
            line      // connecting line
            text      // text label
            g
            arc
            ...
        */
        // wrapping group, horizontally centered
        const groupArcs = group
            .append('g')
            .attr('transform', `translate(${width / 2} ${height / 2})`);

        const groupsArcs = groupArcs
            .selectAll('g')
            .data(pie(data))
            .enter()
            .append('g');

        // include the arcs specifying the stroke with the same width of the circle element
        groupsArcs
            .append('path')
            .attr('d', arc)
            .attr('fill', 'none')
            .attr('stroke', d => d.data.color)
            .attr('stroke-width', strokeWidth * 0.8)
            .attr('stroke-linecap', 'round')
            .attr('stroke-linejoin', 'round')
            // hide the segments by applying a stroke-dasharray/stroke-dashoffset equal to the circle circumference
            // ! the length of the element varies, and it considered afterwords
            // for certain the paths are less than the circumference of the entire circle
            .attr('stroke-dasharray', radius * 3.14 * 2)
            .attr('stroke-dashoffset', radius * 3.14 * 2);

        // include line elements visually connecting the text labels with the arcs
        groupsArcs
            .append('line')
            .attr('x1', 0)
            .attr('x2', (d) => {
                const [x] = arc.centroid(d);
                return x > 0 ? '25' : '-25';
            })
            .attr('y1', 0)
            .attr('y2', 0)
            .attr('stroke', ({
                data: d
            }) => d.color)
            .attr('stroke-width', 1.5)
            .attr('transform', (d) => {
                const [x, y] = arc.centroid(d);
                const offset = x > 0 ? 20 : -20;
                return `translate(${x + offset} ${y})`;
            })
            .attr('stroke-dasharray', 25)
            .attr('stroke-dashoffset', 25);

        // include text elements associated with the arcs
        groupsArcs
            .append('text')
            .attr('x', 0)
            .attr('y', 0)
            .attr('font-size', 8)
            .attr('text-anchor', (d) => {
                const [x] = arc.centroid(d);
                return x > 0 ? 'start' : 'end';
            })
            .attr('transform', (d) => {
                const [x, y] = arc.centroid(d);
                const offset = x > 0 ? 50 : -50;
                return `translate(${x + offset} ${y})`;
            })
            .html(({
                data: d
            }) => `
    <tspan x="0">${d.name}:</tspan><tspan x="0" dy="10" font-size="6">${d.percentage}% / ${d.value}g</tspan>
    `)
            .style('opacity', 0)
            .style('visibility', 'hidden');


        // TRANSITIONS
        // once the elements are set up
        // draw the stroke of the larger circle element
        groupDefault
            .select('circle')
            .transition()
            .ease(d3.easeExp)
            .delay(200)
            .duration(2000)
            .attr('stroke-dashoffset', '0')
            // once the transition is complete
            // draw the smaller strokes one after the other
            .on('end', () => {
                // immediately set the stroke-dasharray and stroke-dashoffset properties to match the length of the path elements
                // using vanilla JavaScript
                const paths = document.querySelectorAll('svg g g path');
                paths.forEach((path) => {
                    const length = path.getTotalLength();
                    path.setAttribute('stroke-dasharray', length);
                    path.setAttribute('stroke-dashoffset', length);
                });

                const duration = 1000;
                // transition the path elements to stroke-dashoffset 0
                d3
                    .selectAll('svg g g path')
                    .transition()
                    .ease(d3.easeLinear)
                    .delay((d, i) => i * duration)
                    .duration(duration)
                    .attr('stroke-dashoffset', 0);

                // transition the line elements elements to stroke-dashoffset 0
                d3
                    .selectAll('svg g g line')
                    .transition()
                    .ease(d3.easeLinear)
                    .delay((d, i) => i * duration + duration / 2.5)
                    .duration(duration / 3)
                    .attr('stroke-dashoffset', 0);

                // transition the text elements to opacity 1 and visibility visible
                d3
                    .selectAll('svg g g text')
                    .transition()
                    .ease(d3.easeLinear)
                    .delay((d, i) => i * duration + duration / 2)
                    .duration(duration / 2)
                    .style('opacity', 1)
                    .style('visibility', 'visible');
            });
    </script>
</body>

</html>