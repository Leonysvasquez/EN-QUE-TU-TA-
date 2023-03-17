<!--DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    //<title>CloudCode</title>
</head>
<body-->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="index.php">
                        <span class="icon"><i class="bi bi-house-door-fill"></i></span>
                        <span class="title">CLOUDCODE</span>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <span class="icon"><i class="bi bi-bag-dash-fill"></i></span>
                        <span class="title">DASHBOARD</span>
                    </a>
                </li>
                <li>
                    <a href="puntos.php">
                        <span class="icon"><i class="bi bi-trophy-fill"></i></span>
                        <span class="title">PUNTOS</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="bi bi-check-circle-fill"></i></span>
                        <span class="title">STAMPS</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="bi bi-megaphone-fill"></i></span>
                        <span class="title">MARKETING</span>
                    </a>
                </li>
                <li>
                    <a href="recompensa.php">
                        <span class="icon"><i class="bi bi-award-fill"></i></span>
                        <span class="title">RECOMPENSA</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="bi bi-people-fill"></i></span>
                        <span class="title">REFERIDOS</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="bi bi-controller"></i></span>
                        <span class="title">GAMIFICACION</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="bi bi-credit-card"></i></span>
                        <span class="title">GIFT CARDS</span>
                    </a>
                </li>
            </ul>
        </div> 
    </div>

    
    <div class="main">
        <script>
        //menuToggle//
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');
        
        toggle.onclick = function(){
            navigation.classList.toggle('acive')
            main.classList.toggle('acive')
        }
        let list = document.querySelectorAll('.navigation li');
        function activelink(){
            list.forEach((item)=>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
        item.addEventListener('mouseover', activelink));
    </script>

