/* Sign form move */
const signinBtn = document.querySelector('.signinBtn');
const signupBtn = document.querySelector('.signupBtn');
const formBx = document.querySelector('.formBx');
const body = document.querySelector('body');

signupBtn.onclick = function(){
    formBx.classList.add('active');
    body.classList.add('active');
}

signinBtn.onclick = function(){
    formBx.classList.remove('active');
    body.classList.remove('active');
}

// Preview logo function
function previewLogo(id){
    document.querySelector(id).addEventListener("change", function(e){
        if(e.target.files.lenght == 0){
            return;
        }
        let file = e.target.files[0];
        let url = URL.createObjectURL(file);
        // document.querySelector(id+" div").innerText = file.name;
        let logoContainer = document.querySelector("#selectedLogo");
        logoContainer.style.background = 'url("'+url+'") no-repeat';
        logoContainer.style.backgroundSize = 'contain';
        logoContainer.style.backgroundPosition = 'center';
        document.querySelector("#logoText").innerHTML = "";
    });
}

previewLogo("a");