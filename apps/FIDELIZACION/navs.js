
let sidenavOption = document.querySelector(".sidenav-option");
let so1 = document.querySelector(".so1");
let so2 = document.querySelector(".so2");
let so3 = document.querySelector(".so3");
let so4 = document.querySelector(".so4");
let so5 = document.querySelector(".so5");
let so6 = document.querySelector(".so6");
let so7 = document.querySelector(".so7");

let Stamps = document.querySelector(".sectionStamps");
let Puntos = document.querySelector(".sectionPuntos");
let Referidos = document.querySelector(".sectionReferidos");
let Marketing = document.querySelector(".sectionMarketing");
let GifCards = document.querySelector(".sectionGifCards");
let Recompensa = document.querySelector(".sectionRecompensa");
let Gamificacion = document.querySelector(".sectionGamificacion");

//postSectioner.setAttribute("hidden", true);

    
// netSel.style.display = "none";

so1.onclick = function(){
    this.classList.add("active");
    so2.classList.remove("active");
    so3.classList.remove("active");
    so4.classList.remove("active");
    so5.classList.remove("active");
    so6.classList.remove("active");
    so7.classList.remove("active");
        
    Stamps.removeAttribute("hidden");  
    Puntos.setAttribute("hidden", true);
    Referidos.setAttribute("hidden", true);
    Marketing.setAttribute("hidden", true);
    GifCards.setAttribute("hidden", true);
    Recompensa.setAttribute("hidden", true);
    Gamificacion.setAttribute("hidden", true);



    // netSel.style.display = "none";
}
so2.onclick = function(){
    this.classList.add("active");
    so1.classList.remove("active");
    so3.classList.remove("active");
    so4.classList.remove("active");
    so5.classList.remove("active");
    so6.classList.remove("active");
    so7.classList.remove("active");

    Stamps.setAttribute("hidden", true);
    Puntos.removeAttribute("hidden");
    Referidos.setAttribute("hidden", true);
    Marketing.setAttribute("hidden", true);
    GifCards.setAttribute("hidden", true);
    Recompensa.setAttribute("hidden", true);
    Gamificacion.setAttribute("hidden", true);
  

    Puntos.removeAttribute("hidden");
    // netSel.style.display = "flex";
}
so3.onclick = function(){
    this.classList.add("active");
    so1.classList.remove("active");
    so2.classList.remove("active");
    so4.classList.remove("active");
    so5.classList.remove("active");
    so6.classList.remove("active");
    so7.classList.remove("active");

  

    Stamps.setAttribute("hidden", true);
    Puntos.setAttribute("hidden", true);
    Referidos.removeAttribute("hidden");
    Marketing.setAttribute("hidden", true);
    GifCards.setAttribute("hidden", true);
    Recompensa.setAttribute("hidden", true);
    Gamificacion.setAttribute("hidden", true);

}
so4.onclick = function(){
    this.classList.add("active");
    so1.classList.remove("active");
    so2.classList.remove("active");
    so3.classList.remove("active");
    so5.classList.remove("active");
    so6.classList.remove("active");
    so7.classList.remove("active");

    Stamps.setAttribute("hidden", true);
    Referidos.setAttribute("hidden", true);
    Puntos.setAttribute("hidden", true);
    Marketing.removeAttribute("hidden");
    GifCards.setAttribute("hidden", true);
    Recompensa.setAttribute("hidden", true);
    Gamificacion.setAttribute("hidden", true);

so5.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so2.classList.remove("active");
        so3.classList.remove("active");
        so4.classList.remove("active");
        so6.classList.remove("active");
        so7.classList.remove("active");

        Stamps.setAttribute("hidden", true);
        Referidos.setAttribute("hidden", true);
        Marketing.setAttribute("hidden", true);
        Puntos.setAttribute("hidden", true);
        GifCards.removeAttribute("hidden");
        Recompensa.setAttribute("hidden", true);
        Gamificacion.setAttribute("hidden", true);
}
so6.onclick = function(){
    this.classList.add("active");
    so1.classList.remove("active");
    so2.classList.remove("active");
    so3.classList.remove("active");
    so4.classList.remove("active");
    so5.classList.remove("active");
    so7.classList.remove("active");

    Stamps.setAttribute("hidden", true);
    Referidos.setAttribute("hidden", true);
    Marketing.setAttribute("hidden", true);
    GifCards.setAttribute("hidden", true);
    Puntos.setAttribute("hidden", true);
    Recompensa.removeAttribute("hidden");
    Gamificacion.setAttribute("hidden", true);
}
so7.onclick = function(){
    this.classList.add("active");
    so1.classList.remove("active");
    so2.classList.remove("active");
    so3.classList.remove("active");
    so4.classList.remove("active");
    so5.classList.remove("active");
    so6.classList.remove("active");

    Stamps.setAttribute("hidden", true);
    Referidos.setAttribute("hidden", true);
    Marketing.setAttribute("hidden", true);
    GifCards.setAttribute("hidden", true);
    Recompensa.setAttribute("hidden", true);
    Puntos.setAttribute("hidden", true);
    Gamificacion.removeAttribute("hidden");
}
}