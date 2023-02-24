let favoriteMusic = document.querySelector("#favoriteMusic");

function addMusic() {
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
            label1.textContent = "Género musical:";
            var field1Content = document.createElement("div");
            var select = document.createElement("select");
                select.innerHTML = "<option value='' selected disabled>Seleccione una opción</option><option value='Bachata'>Bachata</option><option value='Balada'>Balada</option><option value='Ballenato'>Ballenato</option><option value='Blues'>Blues</option><option value='Bossa Nova'>Bossa Nova</option><option value='Country'>Country</option><option value='Disco'>Disco</option><option value='Flamenco'>Flamenco</option><option value='Funk'>Funk</option><option value='Góspel'>Góspell</option><option value='Hip hop/Rap'>Hip hop/Rap</option><option value='Jazz'>Jazz</option><option value='Lo-Fi'>Lo-Fi</option><option value='Merengue'>Merengue</option><option value='Metal'>Metal</option><option value='Música clásica'>Música clásica</option><option value='Música melódica'>Música melódica</option><option value='Pop'>Pop</option><option value='Ranchera'>Ranchera</option><option value='Reggae'>Reggae</option><option value='Reggaetón'>Reggaetón</option><option value='Rock and Roll'>Rock and Roll</option><option value='Salsa'>Salsa</option><option value='Soul'>Soul</option><option value='Techno'>Techno</option>";
                select.name = "music";
                select.id = "music";
                var spanIcon1 = document.createElement("span");
                spanIcon1.className = "material-symbols-outlined";
                spanIcon1.textContent = "music_note";
        
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
favoriteMusic.appendChild(principalContainer);
// profileWorkingFields.appendChild(hr);
}