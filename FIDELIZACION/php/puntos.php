<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/puntos.css" type="text/css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>CloudCode</title>
</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="/HTML-PRUEBAS/index.html">
                        <span class="icon"><i class="bi bi-house-door-fill"></i></span>
                        <span class="title">CloudCode</span>
                    </a>
                </li>
                <li>
                    <a href="/HTML-PRUEBAS/index.html">
                        <span class="icon"><i class="bi bi-bag-dash-fill"></i></span>
                        <span class="title">DashBoard</span>
                    </a>
                </li>
                <li>
                    <a href="/HTML-PRUEBAS/puntos.html">
                        <span class="icon"><i class="bi bi-trophy-fill"></i></span>
                        <span class="title">Puntos</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="bi bi-check-circle-fill"></i></span>
                        <span class="title">Stamps</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="bi bi-megaphone-fill"></i></span>
                        <span class="title">Marketing</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="bi bi-award-fill"></i></span>
                        <span class="title">Recompensas</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="bi bi-people-fill"></i></span>
                        <span class="title">Referidos</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="bi bi-controller"></i></span>
                        <span class="title">Gamification</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="bi bi-credit-card"></i></span>
                        <span class="title">Gits Cards</span>
                    </a>
                </li>
            </ul>
        </div>
        <!--Main-->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="bi bi-list"></i>
                </div>
                <!--search-->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <i class="bi bi-search"></i>
                    </label>
                </div>
                <!--user-->
                <div class="user">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="imagen">
                <img src="/unnamed-1.png" alt="Imagen">
            </div>
            <h1>Poderosas heramientas de <span>fidelizacion</span></h1>
            <div class="cardBox">
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-person-heart"></i>
                        <div class="cardName">Fidelizacion</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-flower1"></i>
                        <div class="cardName">Gamification</div>
                    </div>
                </div>
                <div class="card">
                    <div class="iconBx">
                        <i class="bi bi-postage-fill"></i>
                        <div class="cardName">Stamps</div>
                    </div>
                </div>
                    <div class="card">
                        <div class="iconBx">
                            <i class="bi bi-patch-check-fill"></i>
                            <div class="cardName">Puntos</div>
                        </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-award-fill"></i>
                    <div class="cardName">Recompensas</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-megaphone-fill"></i>
                    <div class="cardName">Marketing</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-credit-card-2-back-fill"></i>
                    <div class="cardName">Gits Cards</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-people-fill"></i>
                    <div class="cardName">Referidos</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <i class="bi bi-graph-up-arrow"></i>
                    <div class="cardName">Analytics</div>
                </div>
            </div>
        </div>
    </div>
  

    
    </div>
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
</body>
</html>