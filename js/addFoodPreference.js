let gastronomicPreferences = document.querySelector("#gastronomicPreferences");

function addFoodPreference() {
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
            label1.textContent = "Preferencia gastronómica:";
            var field1Content = document.createElement("div");
            var select = document.createElement("select");
                select.innerHTML = "<option value='' selected disabled>Seleccione una opción</option><option value='Comida asiática'>Comida asiática</option><option value='Comida Mexicana'>Comida mexicana</option><option value='Comida Europea'>Comida europea</option><option value='Comida Italiana'>Comida italiana</option><option value='Comida Vegana'>Comida vegana</option><option value='Otro'>Otro</option>";
                select.name = "gastronomicPreference";
                select.id = "gastronomicPreference";
                select.onclick = "foodValue();";
                var spanIcon1 = document.createElement("span");
                spanIcon1.className = "material-symbols-outlined";
                spanIcon1.textContent = "restaurant";
        
        // var field2 = document.createElement("div");
        // field2.className = "field";
        // var label2 = document.createElement("label");
        // label2.textContent = "Preferencia gastronómica:";
        // var field2Content = document.createElement("div");
        //     var inputText1 = document.createElement("input");
        //     inputText1.type = "text";
        //     inputText1.id = "otherFood";
        //     // inputText1.setAttribute("disabled", "true");
        //     inputText1.placeholder = "Escriba su preferencia";
        //     var spanIcon2 = document.createElement("span");
        //     spanIcon2.className = "material-symbols-outlined";
        //     spanIcon2.textContent = "restaurant";

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
gastronomicPreferences.appendChild(principalContainer);
// profileWorkingFields.appendChild(hr);
}