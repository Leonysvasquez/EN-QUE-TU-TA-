let sportTeams = document.querySelector("#sportTeams");

function addSportTeam() {
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
            label1.textContent = "Deporte:";
            var field1Content = document.createElement("div");
            var select = document.createElement("select");
                select.innerHTML = "<option value='' selected disabled>Seleccione una opción</option><option value='Baseball'>Baseball</option><option value='Basketball>Basketball</option><option value='Football'>Football</option><option value='Voleyball'>Voleyball</option><option value='Natación'>Natación</option><option value='Tennis'>Tennis</option><option value='Hockey'>Hockey</option><option value='Ping-pong'>Ping-pong</option><option value='Ajedrez'>Ajedrez</option><option value='Ciclismo'>Ciclismo</option><option value='Fórmula 1'>Fórmula 1</option>";
                select.name = "sport";
                select.id = "sport";
                select.onclick = "foodValue();";
                var spanIcon1 = document.createElement("span");
                spanIcon1.className = "material-symbols-outlined";
                spanIcon1.textContent = "sports_basketball";
        
        var field2 = document.createElement("div");
        field2.className = "field";
        var label2 = document.createElement("label");
        label2.textContent = "Nombre del equipo:";
        var field2Content = document.createElement("div");
            var inputText1 = document.createElement("input");
            inputText1.type = "text";
            inputText1.name = "sportTeam";
            inputText1.id = "sportTeam";
            var spanIcon2 = document.createElement("span");
            spanIcon2.className = "material-symbols-outlined";
            spanIcon2.textContent = "groups";

        field1Content.appendChild(select);
        field1Content.appendChild(spanIcon1);
        field2Content.appendChild(inputText1);
        field2Content.appendChild(spanIcon2);

        field1.appendChild(label1);
        field1.appendChild(field1Content);
        field2.appendChild(label2);
        field2.appendChild(field2Content);

    dataFields.appendChild(field1);
    dataFields.appendChild(field2);

    principalContainer.appendChild(dataFields);

    var hr = document.createElement("hr");
    var br = document.createElement("br");

// profileWorkingFields.appendChild(br);
sportTeams.appendChild(principalContainer);
// profileWorkingFields.appendChild(hr);
}