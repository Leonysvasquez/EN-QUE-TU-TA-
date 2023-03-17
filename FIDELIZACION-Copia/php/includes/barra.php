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