let favoriteMovie = document.querySelector("#favoriteMovie");

function addMovie() {
var principalContainer = document.createElement("div");
principalContainer.setAttribute("style", "margin-bottom:45px;");

    var dataHeading = document.createElement("div");
    dataHeading.setAttribute("style", "margin-bottom:15px;");

principalContainer.appendChild(dataHeading);
principalContainer.className = "border-bottom";

    var dataFields = document.createElement("div");
    dataFields.className = "data-fields";

        var field1 = document.createElement("div");
        field1.className = "field";
            var label1 = document.createElement("label");
            label1.textContent = "Género de película:";
            var field1Content = document.createElement("div");
            var select = document.createElement("select");
                select.innerHTML = "<option value='' selected disabled>Seleccione una opción</option><optgroup label='Por estilo'><option value='Acción'>Acción</option><option value='Aventuras'>Aventuras</option><option value='Ciencia Ficción'>Ciencia Ficción</option><option value='Comedia'>Comedia</option><option value='Drama'>Drama</option><option value='Fantasía'>Fantasía</option><option value='Musical'>Musical</option><option value='No- Ficción / documental'>No- Ficción / documental</option><option value='Romance'>Romance</option><option value='Suspenso'>Suspenso</option><option value='Terror'>Terror</option></optgroup><optgroup label='Por formato'><option value='Animación'>Animación</option><option value='Cine 2D'>Cine 2D</option><option value='Cine Mudo'>Cine Mudo</option><option value='Cinema sonoro'>Cinema sonoro</option><option value='Películas 3D'>Películas 3D</option></optgroup><optgroup label='Según ambientación'><option value='Bélicas'>Bélicas</option><option value='Crimen'>Crimen</option><option value='Deportivas'>Deportivas</option><option value='Futuristas'>Futuristas</option><option value='Históricas'>Históricas</option><option value='Policíacas'>Policíacas</option><option value='Religiosas'>Religiosas</option><option value='Western'>Western</option></optgroup>";
                select.name = "music";
                select.id = "music";
                var spanIcon1 = document.createElement("span");
                spanIcon1.className = "material-symbols-outlined";
                spanIcon1.textContent = "movie";
        
        // var field2 = document.createElement("div");
        // field2.className = "field";
        // var label2 = document.createElement("label");
        // label2.textContent = "Preferencia gastronómica:";
        // var field2Content = document.createElement("div");
        //     var inputText1 = document.createElement("input");
        //     inputText1.type = "text";
        //     inputText1.id = "otherFood";
            // inputText1.setAttribute("disabled", "true");
            // inputText1.placeholder = "Escriba su preferencia";
            // var spanIcon2 = document.createElement("span");
            // spanIcon2.className = "material-symbols-outlined";
            // spanIcon2.textContent = "restaurant";

        field1Content.appendChild(select);
        field1Content.appendChild(spanIcon1);
        // field2Content.appendChild(inputText1);
        // field2Content.appendChild(spanIcon2);

        field1.appendChild(label1);
        field1.appendChild(field1Content);
        // field2.appendChild(label2);
        // field2.appendChild(field2Content);

    dataFields.appendChild(field1);
    // dataFields.appendChild(field2);

    principalContainer.appendChild(dataFields);

    var hr = document.createElement("hr");
    var br = document.createElement("br");

// profileWorkingFields.appendChild(br);
favoriteMovie.appendChild(principalContainer);
// profileWorkingFields.appendChild(hr);
}