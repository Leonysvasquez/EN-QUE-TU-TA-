let profileReferencesFields = document.querySelector("#profileReferencesFields");

function addWorkReference() {
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
                label1.textContent = "Nombre:";
                var field1Content = document.createElement("div");
                    var inputText1 = document.createElement("input");
                    inputText1.type = "text";
                    inputText1.name = "workReferenceName";
                    inputText1.id = "workReferenceName";
                    var spanIcon1 = document.createElement("span");
                    spanIcon1.className = "material-symbols-outlined";
                    spanIcon1.textContent = "person";


            var field2 = document.createElement("div");
            field2.className = "field";
                var label2 = document.createElement("label");
                label2.textContent = "Apellido:";
                var field2Content = document.createElement("div");
                    var inputText2 = document.createElement("input");
                    inputText2.type = "text";
                    inputText2.name = "workReferenceLastname";
                    inputText2.id = "workReferenceLastname";
                    var spanIcon2 = document.createElement("span");
                    spanIcon2.className = "material-symbols-rounded";
                    spanIcon2.textContent = "person";


            var field3 = document.createElement("div");
            field3.className = "field";
                var label3 = document.createElement("label");
                label3.textContent = "Teléfono:";
                var field3Content = document.createElement("div");
                    var inputTel1 = document.createElement("input");
                    inputTel1.type = "tel";
                    inputTel1.name = "workReferencePhone";
                    inputTel1.id = "workReferencePhone";
                    var spanIcon3 = document.createElement("span");
                    spanIcon3.className = "material-symbols-rounded";
                    spanIcon3.textContent = "phone";


            var field5 = document.createElement("div");
            field5.className = "field";
                var label5 = document.createElement("label");
                label5.textContent = "Grado académico:";
                var field5Content = document.createElement("div");
                    var select = document.createElement("select");
                    select.innerHTML = '<option value="" selected disabled>Seleccione una opcion</option><option value="Técnico">Técnico</option><option value="Licenciado">Licenciado</option><option value="Ingeniero">Ingeniero</option><option value="Doctor">Doctor</option><option value="Maestro">Maestro</option>';
                    select.name = "workReferenceGrade";
                    select.id = "workReferenceGrade";
                    var spanIcon5 = document.createElement("span");
                    spanIcon5.className = "material-symbols-outlined";
                    spanIcon5.textContent = "public";

            field1Content.appendChild(inputText1);
            field1Content.appendChild(spanIcon1);
            field2Content.appendChild(inputText2);
            field2Content.appendChild(spanIcon2);
            field3Content.appendChild(inputTel1);
            field3Content.appendChild(spanIcon3);
            field5Content.appendChild(select);
            field5Content.appendChild(spanIcon5);

            field1.appendChild(label1);
            field1.appendChild(field1Content);
            field2.appendChild(label2);
            field2.appendChild(field2Content);
            field3.appendChild(label3);
            field3.appendChild(field3Content);
            field5.appendChild(label5);
            field5.appendChild(field5Content);

        dataFields.appendChild(field1);
        dataFields.appendChild(field2);
        dataFields.appendChild(field3);
        dataFields.appendChild(field5);

        principalContainer.appendChild(dataFields);

        var hr = document.createElement("hr");
        var br = document.createElement("br");

    // profileReferencesFields.appendChild(br);
    profileReferencesFields.appendChild(principalContainer);
    // profileReferencesFields.appendChild(hr);
}