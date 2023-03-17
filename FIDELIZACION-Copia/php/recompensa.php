<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/recompensa.css" type="text/css">
    <link rel="stylesheet" href="../css/index.css" type="text/css">
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <title>Recompensa</title>
</head>
<body>
<?php require_once 'includes/sidebar.php'   ?>

<?php   require_once 'includes/barra.php' ?>
    <div class="header">
        <div class="recompensa">
            <i class="bi bi-award-fill"></i>
            <h3>Lista de Recompensas</h3>
        <div class="total">
            Total: 4
        </div>
        </div>
        <div class="recompensaend">
            <button id="myButton" class="button">Crear Recompensa</button>
            <p class="parrafo">Establecimiento: Salon Euphoria</p>
        </div>
    </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modalheader">
                    <!-- Header modal -->
                    <div class="texto">
                        <h5>Nombre de la empresa :</h5><input type="text">
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary" onclick="openForm('left'); changeButtonColor(this)">Productos</button>
                        <button type="button" class="btn btn-primary" onclick="openForm('middle'); changeButtonColor(this)">Servicios</button>
                        <button type="button" class="btn btn-primary" onclick="openForm('right'); changeButtonColor(this)">Otros</button>
                    </div>
                </div>
                <div id="leftForm" class="form" style="display:none;">
                    <form>
                        <label for="name">Seleccione el Producto para su Recompensa</label>
                        <select required id="name" class="name">
                            <option value="" selected>Seleccionar opción...</option>
                            <option value="value1">Opción 1</option>
                            <option value="value2">Opción 2</option>
                            <option value="value3">Opción 3</option>
                            <option value="value1">Opción 4</option>
                            <option value="value2">Opción 5</option>
                            <option value="value3">Opción 6</option>
                            <option value="value1">Opción 7</option>
                            <option value="value2">Opción 8</option>
                            <option value="value3">Opción 9</option>
                            <option value="value3">Opción 10</option>
                        </select>
                        <div class="contenedor">
                            <div>
                                <label for="seleccion1">Valor de la recompensa</label>
                                <select id="seleccion1" required>
                                        <option value="" selected>Seleccionar opción...</option>
                                        <option value="value1">Opción 1</option>
                                        <option value="value2">Opción 2</option>
                                        <option value="value3">Opción 3</option>
                                        <option value="value1">Opción 4</option>
                                        <option value="value2">Opción 5</option>
                                        <option value="value3">Opción 6</option>
                                        <option value="value1">Opción 7</option>
                                        <option value="value2">Opción 8</option>
                                        <option value="value3">Opción 9</option>
                                        <option value="value3">Opción 10</option>
                                </select>
                            </div>
                            <div>
                                <label for="seleccion2">Fecha de la recompensa</label>
                                <select id="seleccion2" required>
                                        <option value="" selected>Seleccionar opción...</option>
                                        <option value="value1">Opción 1</option>
                                        <option value="value2">Opción 2</option>
                                        <option value="value3">Opción 3</option>
                                        <option value="value1">Opción 4</option>
                                        <option value="value2">Opción 5</option>
                                        <option value="value3">Opción 6</option>
                                        <option value="value1">Opción 7</option>
                                        <option value="value2">Opción 8</option>
                                        <option value="value3">Opción 9</option>
                                        <option value="value3">Opción 10</option>
                                </select>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="subir">
                                <label for="subir" class="subir">Subir Imagen</label>
                                <input type="file" name="subir" id="subir" class="subir">
                            </div>
                            <input type="button" value="Crear Recompensa" class="btn_recompensa">
                        </div>
                    </form>
                </div>
                <div id="middleForm" class="form" style="display:none;">
                    <form>
                        <label for="name">Seleccione el Servico para su Recompensa</label>
                        <select required id="name" class="name">
                            <option value="" selected>Seleccionar opción...</option>
                            <option value="value1">Opción 1</option>
                            <option value="value2">Opción 2</option>
                            <option value="value3">Opción 3</option>
                            <option value="value1">Opción 4</option>
                            <option value="value2">Opción 5</option>
                            <option value="value3">Opción 6</option>
                            <option value="value1">Opción 7</option>
                            <option value="value2">Opción 8</option>
                            <option value="value3">Opción 9</option>
                            <option value="value3">Opción 10</option>
                        </select>
                        <div class="contenedor">
                            <div>
                                <label for="seleccion1">Valor de la recompensa</label>
                                <select id="seleccion1" required>
                                        <option value="" selected>Seleccionar opción...</option>
                                        <option value="value1">Opción 1</option>
                                        <option value="value2">Opción 2</option>
                                        <option value="value3">Opción 3</option>
                                        <option value="value1">Opción 4</option>
                                        <option value="value2">Opción 5</option>
                                        <option value="value3">Opción 6</option>
                                        <option value="value1">Opción 7</option>
                                        <option value="value2">Opción 8</option>
                                        <option value="value3">Opción 9</option>
                                        <option value="value3">Opción 10</option>
                                </select>
                            </div>
                            <div>
                                <label for="seleccion2">Fecha de la recompensa</label>
                                <select id="seleccion2" required>
                                        <option value="" selected>Seleccionar opción...</option>
                                        <option value="value1">Opción 1</option>
                                        <option value="value2">Opción 2</option>
                                        <option value="value3">Opción 3</option>
                                        <option value="value1">Opción 4</option>
                                        <option value="value2">Opción 5</option>
                                        <option value="value3">Opción 6</option>
                                        <option value="value1">Opción 7</option>
                                        <option value="value2">Opción 8</option>
                                        <option value="value3">Opción 9</option>
                                        <option value="value3">Opción 10</option>
                                </select>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="subir">
                                <label for="subir" class="subir">Subir Imagen</label>
                                <input type="file" name="subir" id="subir" class="subir">
                            </div>
                            <input type="button" value="Crear Recompensa" class="btn_recompensa">
                        </div>
                    </form>
                </div>
                <div id="rightForm" class="form" style="display:none;">
                    <form>
                        <label for="name">Seleccione Otro para su Recompensa</label>
                        <select required id="name" class="name">
                            <option value="" selected>Seleccionar opción...</option>
                            <option value="value1">Opción 1</option>
                            <option value="value2">Opción 2</option>
                            <option value="value3">Opción 3</option>
                            <option value="value1">Opción 4</option>
                            <option value="value2">Opción 5</option>
                            <option value="value3">Opción 6</option>
                            <option value="value1">Opción 7</option>
                            <option value="value2">Opción 8</option>
                            <option value="value3">Opción 9</option>
                            <option value="value3">Opción 10</option>
                        </select>
                        <div class="contenedor">
                            <div>
                                <label for="seleccion1">Valor de la recompensa</label>
                                <select id="seleccion1" required>
                                        <option value="" selected>Seleccionar opción...</option>
                                        <option value="value1">Opción 1</option>
                                        <option value="value2">Opción 2</option>
                                        <option value="value3">Opción 3</option>
                                        <option value="value1">Opción 4</option>
                                        <option value="value2">Opción 5</option>
                                        <option value="value3">Opción 6</option>
                                        <option value="value1">Opción 7</option>
                                        <option value="value2">Opción 8</option>
                                        <option value="value3">Opción 9</option>
                                        <option value="value3">Opción 10</option>
                                </select>
                            </div>
                            <div>
                                <label for="seleccion2">Fecha de la recompensa</label>
                                <select id="seleccion2" required>
                                        <option value="" selected>Seleccionar opción...</option>
                                        <option value="value1">Opción 1</option>
                                        <option value="value2">Opción 2</option>
                                        <option value="value3">Opción 3</option>
                                        <option value="value1">Opción 4</option>
                                        <option value="value2">Opción 5</option>
                                        <option value="value3">Opción 6</option>
                                        <option value="value1">Opción 7</option>
                                        <option value="value2">Opción 8</option>
                                        <option value="value3">Opción 9</option>
                                        <option value="value3">Opción 10</option>
                                </select>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="subir">
                                <label for="subir" class="subir">Subir Imagen</label>
                                <input type="file" name="subir" id="subir" class="subir">
                            </div>
                            <input type="button" value="Crear Recompensa" class="btn_recompensa">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script>
      // Get the modal
        var modal = document.getElementById("myModal");
        // Get the button that opens the modal
        var btn = document.getElementById("myButton");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks the button, open the modal
        btn.onclick = function() {
        modal.style.display = "block";
        openForm('left'); // Agrega esta línea para abrir automáticamente el formulario "Left"
        }
        span.onclick = function() {
        modal.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
        // Open the form corresponding to the button clicked
        function openForm(formName) {
        var forms = document.getElementsByClassName("form");
        for (var i = 0; i < forms.length; i++) {
            forms[i].style.display = "none";
        }
        document.getElementById(formName + "Form").style.display = "block";
        }
    </script>
</body>
</html>