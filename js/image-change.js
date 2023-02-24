
const profilePic = document.getElementById("profileLogoInput");
const profilePicPrev = document.querySelector(".profile-image-preview");
const subLogo = document.querySelector("#submitLogo");
const labelSelectLogo = document.querySelector("#labelSelectLogo");
const cancelImageUpdate = document.querySelector("#cancelImageUpdate");
const imageButtonOptions1 = document.querySelector("#imageButtonOptions1");
const imageButtonOptions2 = document.querySelector("#imageButtonOptions2");

profilePic.addEventListener("change", function() {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        profilePicPrev.style.display = "block";

        reader.addEventListener("load", function() {
            profilePicPrev.setAttribute("src", this.result);
        });

        reader.readAsDataURL(file);

        cancelImageUpdate.classList.remove("hide");
        labelSelectLogo.classList.remove("hide");
        imageButtonOptions1.classList.remove("hide");
        imageButtonOptions2.classList.remove("hide");
        subLogo.removeAttribute("disabled");
    }
});