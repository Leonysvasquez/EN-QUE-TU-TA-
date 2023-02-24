let hobbies = document.querySelector("#hobbies-sport");

function addHobbies() {
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
        label1.textContent = "Hobbie o deporte:";
        var field1Content = document.createElement("div");
            var inputText1 = document.createElement("input");
            inputText1.type = "text";
            inputText1.id = "otherHobbie";
            inputText1.placeholder = "Escriba un hobbie o deporte";
            var spanIcon1 = document.createElement("span");
            spanIcon1.className = "material-symbols-outlined";
            spanIcon1.textContent = "directions_bike";

        field1Content.appendChild(inputText1);
        field1Content.appendChild(spanIcon1);

        field1.appendChild(label1);
        field1.appendChild(field1Content);

    dataFields.appendChild(field1);

    principalContainer.appendChild(dataFields);

    var hr = document.createElement("hr");
    var br = document.createElement("br");

// profileWorkingFields.appendChild(br);
hobbies.appendChild(principalContainer);
// profileWorkingFields.appendChild(hr);
}