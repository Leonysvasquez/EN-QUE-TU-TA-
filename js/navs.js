// Script para dropdown del navbar

    let notificationDropdown = document.querySelector(".notification-dropdown");
    let appsDropdown = document.querySelector(".apps-dropdown");
    let userDropdown = document.querySelector(".user-dropdown");

    let notificationDropdownContent = document.querySelector("#notification-dropdown-content");
    let appsDropdownContent = document.querySelector("#apps-dropdown-content");
    let userDropdownContent = document.querySelector("#user-dropdown-content");

    let appsArrow = document.querySelector("#apps-arrow");
    let notificationArrow = document.querySelector("#notification-arrow");

    let main = document.querySelector("main");
    let profileImageContainer = document.querySelector(".profile-image-container");
    let profileDataContainer = document.querySelector(".profile-data-container");

    notificationDropdown.onclick = function(){
        notificationDropdownContent.classList.toggle('dropdown-active');
        notificationArrow.classList.toggle('dropdown-active');
        appsDropdownContent.classList.remove('dropdown-active');
        userDropdownContent.classList.remove('dropdown-active');
        appsArrow.classList.remove('dropdown-active');
    }
    appsDropdown.onclick = function(){
        appsDropdownContent.classList.toggle('dropdown-active');
        appsArrow.classList.toggle('dropdown-active');
        notificationDropdownContent.classList.remove('dropdown-active');
        userDropdownContent.classList.remove('dropdown-active');
        notificationArrow.classList.remove('dropdown-active');
    }
    userDropdown.onclick = function(){
        userDropdownContent.classList.toggle('dropdown-active');
        appsDropdownContent.classList.remove('dropdown-active');
        notificationDropdownContent.classList.remove('dropdown-active');
        appsArrow.classList.remove('dropdown-active');
        notificationArrow.classList.remove('dropdown-active');
    }


// Script para el sidenav

    let sidenavOption = document.querySelector(".sidenav-option");
    let so1 = document.querySelector(".so1");
    let so2 = document.querySelector(".so2");
    let so3 = document.querySelector(".so3");
    let so4 = document.querySelector(".so4");
    let so5 = document.querySelector(".so5");
    let so6 = document.querySelector(".so6");
    let so7 = document.querySelector(".so7");
    let so8 = document.querySelector(".so8");
    let so9 = document.querySelector(".so9");

    let sectionProfile = document.querySelector(".section-profile");
    let sectionDashboard = document.querySelector(".section-dashboard");
    let sectionSchedules = document.querySelector(".section-schedules");
    let sectionServices = document.querySelector(".section-services");
    let sectionProducts = document.querySelector(".section-products");
    let sectionBanks = document.querySelector(".section-banks");
    let sectionUsers = document.querySelector(".section-users");
    let sectionSettings = document.querySelector(".section-settings");
    let sectionHelp = document.querySelector(".section-help");

    so1.onclick = function(){
        this.classList.add("active");
        so2.classList.remove("active");
        so3.classList.remove("active");
        so4.classList.remove("active");
        so5.classList.remove("active");
        so6.classList.remove("active");
        so7.classList.remove("active");
        so8.classList.remove("active");
        so9.classList.remove("active");

        sectionDashboard.removeAttribute("hidden");
        sectionProfile.setAttribute("hidden", true);
        sectionSchedules.setAttribute("hidden", true);
        sectionServices.setAttribute("hidden", true);
        sectionProducts.setAttribute("hidden", true);
        sectionBanks.setAttribute("hidden", true);
        sectionUsers.setAttribute("hidden", true);
        sectionSettings.setAttribute("hidden", true);
        sectionHelp.setAttribute("hidden", true);
    }
    so2.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so3.classList.remove("active");
        so4.classList.remove("active");
        so5.classList.remove("active");
        so6.classList.remove("active");
        so7.classList.remove("active");
        so8.classList.remove("active");
        so9.classList.remove("active");

        sectionDashboard.setAttribute("hidden", true);
        sectionProfile.removeAttribute("hidden");
        sectionSchedules.setAttribute("hidden", true);
        sectionServices.setAttribute("hidden", true);
        sectionProducts.setAttribute("hidden", true);
        sectionBanks.setAttribute("hidden", true);
        sectionUsers.setAttribute("hidden", true);
        sectionSettings.setAttribute("hidden", true);
        sectionHelp.setAttribute("hidden", true);
    }
    so3.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so2.classList.remove("active");
        so4.classList.remove("active");
        so5.classList.remove("active");
        so6.classList.remove("active");
        so7.classList.remove("active");
        so8.classList.remove("active");
        so9.classList.remove("active");

        sectionDashboard.setAttribute("hidden", true);
        sectionProfile.setAttribute("hidden", true);
        sectionSchedules.removeAttribute("hidden");
        sectionServices.setAttribute("hidden", true);
        sectionProducts.setAttribute("hidden", true);
        sectionBanks.setAttribute("hidden", true);
        sectionUsers.setAttribute("hidden", true);
        sectionSettings.setAttribute("hidden", true);
        sectionHelp.setAttribute("hidden", true);
    }
    so4.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so2.classList.remove("active");
        so3.classList.remove("active");
        so5.classList.remove("active");
        so6.classList.remove("active");
        so7.classList.remove("active");
        so8.classList.remove("active");
        so9.classList.remove("active");

        sectionDashboard.setAttribute("hidden", true);
        sectionProfile.setAttribute("hidden", true);
        sectionSchedules.setAttribute("hidden", true);
        sectionServices.removeAttribute("hidden");
        sectionProducts.setAttribute("hidden", true);
        sectionBanks.setAttribute("hidden", true);
        sectionUsers.setAttribute("hidden", true);
        sectionSettings.setAttribute("hidden", true);
        sectionHelp.setAttribute("hidden", true);
    }
    so5.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so2.classList.remove("active");
        so3.classList.remove("active");
        so4.classList.remove("active");
        so6.classList.remove("active");
        so7.classList.remove("active");
        so8.classList.remove("active");
        so9.classList.remove("active");

        sectionDashboard.setAttribute("hidden", true);
        sectionProfile.setAttribute("hidden", true);
        sectionSchedules.setAttribute("hidden", true);
        sectionServices.setAttribute("hidden", true);
        sectionProducts.removeAttribute("hidden");
        sectionBanks.setAttribute("hidden", true);
        sectionUsers.setAttribute("hidden", true);
        sectionSettings.setAttribute("hidden", true);
        sectionHelp.setAttribute("hidden", true);
    }
    so6.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so2.classList.remove("active");
        so3.classList.remove("active");
        so4.classList.remove("active");
        so5.classList.remove("active");
        so7.classList.remove("active");
        so8.classList.remove("active");
        so9.classList.remove("active");

        sectionDashboard.setAttribute("hidden", true);
        sectionProfile.setAttribute("hidden", true);
        sectionSchedules.setAttribute("hidden", true);
        sectionServices.setAttribute("hidden", true);
        sectionProducts.setAttribute("hidden", true);
        sectionBanks.setAttribute("hidden", true);
        sectionUsers.removeAttribute("hidden");
        sectionSettings.setAttribute("hidden", true);
        sectionHelp.setAttribute("hidden", true);
    }
    so7.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so2.classList.remove("active");
        so3.classList.remove("active");
        so4.classList.remove("active");
        so5.classList.remove("active");
        so6.classList.remove("active");
        so8.classList.remove("active");
        so9.classList.remove("active");

        sectionDashboard.setAttribute("hidden", true);
        sectionProfile.setAttribute("hidden", true);
        sectionSchedules.setAttribute("hidden", true);
        sectionServices.setAttribute("hidden", true);
        sectionProducts.setAttribute("hidden", true);
        sectionBanks.setAttribute("hidden", true);
        sectionUsers.setAttribute("hidden", true);
        sectionSettings.removeAttribute("hidden");
        sectionHelp.setAttribute("hidden", true);
    }
    so8.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so2.classList.remove("active");
        so3.classList.remove("active");
        so4.classList.remove("active");
        so5.classList.remove("active");
        so6.classList.remove("active");
        so7.classList.remove("active");
        so9.classList.remove("active");

        sectionDashboard.setAttribute("hidden", true);
        sectionProfile.setAttribute("hidden", true);
        sectionSchedules.setAttribute("hidden", true);
        sectionServices.setAttribute("hidden", true);
        sectionProducts.setAttribute("hidden", true);
        sectionBanks.setAttribute("hidden", true);
        sectionUsers.setAttribute("hidden", true);
        sectionSettings.setAttribute("hidden", true);
        sectionHelp.removeAttribute("hidden");
    }
    so9.onclick = function(){
        this.classList.add("active");
        so1.classList.remove("active");
        so2.classList.remove("active");
        so3.classList.remove("active");
        so4.classList.remove("active");
        so5.classList.remove("active");
        so6.classList.remove("active");
        so7.classList.remove("active");
        so8.classList.remove("active");

        sectionDashboard.setAttribute("hidden", true);
        sectionProfile.setAttribute("hidden", true);
        sectionSchedules.setAttribute("hidden", true);
        sectionServices.setAttribute("hidden", true);
        sectionProducts.setAttribute("hidden", true);
        sectionBanks.setAttribute("hidden", true);
        sectionUsers.setAttribute("hidden", true);
        sectionSettings.setAttribute("hidden", true);
        sectionHelp.removeAttribute("hidden");
    }
    