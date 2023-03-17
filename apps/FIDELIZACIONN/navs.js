
    let sidenavOption = document.querySelector(".sidenav-option");
    let so1 = document.querySelector(".so1");
    let so2 = document.querySelector(".so2");
    let so3 = document.querySelector(".so3");
    let so4 = document.querySelector(".so4");

    let planSectionForm = document.getElementById("planSectionForm");
    let postSectioner = document.getElementById("postSectioner");
    postSectioner.setAttribute("hidden", "true");
    // netSel.style.display = "none";

    so1.onclick = function(){
        this.classList.add("active");
        so2.classList.remove("active");
        so3.classList.remove("active");
        so4.classList.remove("active");

        planSectionForm.removeAttribute("hidden");
        postSectioner.setAttribute("hidden", "true");
        // netSel.style.display = "none";
    }
    so2.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so3.classList.remove("active");
        so4.classList.remove("active");

        planSectionForm.setAttribute("hidden", "true");
        postSectioner.removeAttribute("hidden");
        // netSel.style.display = "flex";
    }
    so3.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so2.classList.remove("active");
        so4.classList.remove("active");

    }
    so4.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so2.classList.remove("active");
        so3.classList.remove("active");
    }