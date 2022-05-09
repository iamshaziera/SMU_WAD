var recipes = {};
var specific_recipe = {};

// Searches API for all matching recipes 
function display_recipes(val) {
    var id = val; // search query
    var APP_ID = "f4aed779"; // unique API ID
    var APP_KEY = "119ffcf5a8888fb35ec7b8be5dad2d5e";  // unique API key
    var url = `https://api.edamam.com/search?q=${id}&app_id=${APP_ID}&app_key=${APP_KEY}&from=0&to=15`; // url to retrieve info from
    var html_str = "";
    var form_no = 0;
  
    fetch(url)
      .then((response) => response.json())
      .then((data) => {
        // iterates through each matched recipe
        for (var i = 0; i < data.hits.length; i++) {
          var uri = data.hits[i].recipe.uri;
          var label = data.hits[i].recipe.label;
          var image = data.hits[i].recipe.image;
          var yield = data.hits[i].recipe.yield;
          var calories = data.hits[i].recipe.calories;
          var ingredientLines = data.hits[i].recipe.ingredientLines; // array
          var dietLabels = data.hits[i].recipe.dietLabels; // array
          var healthLabels = data.hits[i].recipe.healthLabels; // array
          var source = data.hits[i].recipe.source;
          var recipe_url = data.hits[i].recipe.url;
          var totalNutrients = data.hits[i].recipe.totalNutrients; // dictionary
          var totalDaily = data.hits[i].recipe.totalDaily; // dictionary
          var bookmarked = data.hits[i].bookmarked;
  
          // updating global recipes dictionary with all matching recipes
          recipes[uri] = {
            "label": label,
            "image": image,
            "yield": yield,
            "calories": calories,
            "ingredientLines": ingredientLines,
            "dietLabels": dietLabels,
            "healthLabels": healthLabels,
            "source": source,
            "recipe_url": recipe_url,
            "totalNutrients": totalNutrients,
            "totalDaily": totalDaily,
            "bookmarked": bookmarked,
          };
          
          // updating html_str with all the cards of all the matching recipes
          // 1 card = 1 form that submits to specific_recipe.php onclick
          html_str = 
          `
              <form id="index_recipes${form_no}" method="POST" action="php/specific_recipe.php">
                  <div class="card">
                      <img src='${image}' class="card-img-top">
                      <div class="card-body">
                          <h5 class="card-title"><a id="${uri}" href="#" onclick="submit_form(${form_no})">${label}</a></h5>
                          <p class="card-text" style="font-weight: bold;">${label}'s recipe here!</p>
                          <p class="card-text" style="font-style: italic;">from ${source}</p>
                      </div>
                      <input type="hidden" name="label" value="${label}">
                      <input type="hidden" name="image" value="${image}">
                      <input type="hidden" name="calories" value="${calories}">
                      <input type="hidden" name="servings" value="${yield}">
                      <input type="hidden" name="ingredientLines" value="${ingredientLines}">
                      <input type="hidden" name="dietLabels" value="${dietLabels}">
                      <input type="hidden" name="healthLabels" value="${healthLabels}">
                      <input type="hidden" name="source" value="${source}">
                      <input type="hidden" name="recipe_url" value="${recipe_url}">
                      <input type="hidden" name="totalNutrients" value="${totalNutrients}">
                      <input type="hidden" name="totalDaily" value="${totalDaily}">
                      <input type="hidden" name="bookmarked" value="${bookmarked}">
                  </div>
              </form>
          `;
  
          // Continually updates filtered_recipes div in index.php with html_str of matching recipe
          document.getElementById("filtered_recipes").innerHTML += html_str;
          form_no++;
        }

      });
  }


function submit_form(form_no) {
    var form_str = "index_recipes" + form_no;
    document.getElementById(form_str).submit();
  }
