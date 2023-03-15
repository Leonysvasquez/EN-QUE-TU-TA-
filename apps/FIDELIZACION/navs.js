
    let sidenavOption = document.querySelector(".sidenav-option");
    let so1 = document.querySelector(".so1");
    let so2 = document.querySelector(".so2");
    let so3 = document.querySelector(".so3");
    let so4 = document.querySelector(".so4");
    let so5 = document.querySelector(".so5");
    let so6 = document.querySelector(".so6");
    let so7 = document.querySelector(".so7");


    let planSectionForm = document.getElementById("planSectionForm");
    let postSectioner = document.getElementById("postSectioner");
    let sectionPuntos = document.getElementById("sectionPuntos");
    //postSectioner.setAttribute("hidden", "true");
    
   
    // netSel.style.display = "none";

    so1.onclick = function(){
        this.classList.add("active");
        so2.classList.remove("active");
        so3.classList.remove("active");
        so4.classList.remove("active");
        so5.classList.remove("active");
        so6.classList.remove("active");
        so7.classList.remove("active");

        planSectionForm.removeAttribute("hidden");
        postSectioner.setAttribute("hidden", "true");
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

        planSectionForm.setAttribute("hidden", "true");
        sectionPuntos.removeAttribute("hidden");
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

        sectionPuntos.removeAttribute("hidden");
        postSectioner.setAttribute("hidden", "true");
        planSectionForm.setAttribute("hidden", "true");
        // netSel.style.display = "none";

    }
    so4.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so2.classList.remove("active");
        so3.classList.remove("active");
        so5.classList.remove("active");
        so6.classList.remove("active");
        so7.classList.remove("active");

        planSectionForm.removeAttribute("hidden");
        postSectioner.setAttribute("hidden", "true");
        // netSel.style.display = "none";
    
    so5.onclick = function(){
            this.classList.add("active");
            so1.classList.remove("active");
            so2.classList.remove("active");
            so3.classList.remove("active");
            so4.classList.remove("active");
            so6.classList.remove("active");
            so7.classList.remove("active");

            planSectionForm.removeAttribute("hidden");
            postSectioner.setAttribute("hidden", "true");
            // netSel.style.display = "none";
    }
    so6.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so2.classList.remove("active");
        so3.classList.remove("active");
        so4.classList.remove("active");
        so5.classList.remove("active");
        so7.classList.remove("active");

        planSectionForm.removeAttribute("hidden");
        postSectioner.setAttribute("hidden", "true");
}
    so7.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so2.classList.remove("active");
        so3.classList.remove("active");
        so4.classList.remove("active");
        so5.classList.remove("active");
        so6.classList.remove("active");

        planSectionForm.removeAttribute("hidden");
        postSectioner.setAttribute("hidden", "true");
    }
}