const valorPost = 548.75;
const valorReel = 548.75;
const valorHistoria = 548.75;

const valorMensualPost = valorPost*4;
const valorMensualReel = valorReel*4;
const valorMensualHistoria = valorHistoria*4;

var subRedes = 0.0;
var pAumento = 0.0;
var pDescuento = 0.0;
var aumento = 0.0;
var descuento = 0.0;
var subTotal = 0.0;
var total = 0.0;

// FACEBOOK
var netFacebook = document.getElementById("netFacebook");
var valorPostFacebook = 0.0;
var subFacebook = 0.0;

netFacebook.addEventListener("change", sumFacebook);
function sumFacebook() {
    var cantPostFacebook = parseInt(document.getElementById("cantPostFacebook").value);

    if (netFacebook.checked == false) {
        subFacebook = 0.0;
    } else {
        subFacebook = (valorMensualPost*cantPostFacebook);
    }
    sumRedes();
}

// INSTAGRAM
var netInstagram = document.getElementById("netInstagram");
var valorPostInstagram = 0.0;
var subInstagram = 0.0;

netInstagram.addEventListener("change", sumInstagram);
function sumInstagram() {
    var cantPostInstagram = parseInt(document.getElementById("cantPostInstagram").value);
    
    if (netInstagram.checked == false) {
        subInstagram = 0.0;
    } else {
        subInstagram = (valorMensualPost*cantPostInstagram);
    }
    sumRedes();
}

// GOOGLE
var netGoogle = document.getElementById("netGoogle");
var valorPostGoogle = 0.0;
var subGoogle = 0.0;

netGoogle.addEventListener("change", sumGoogle);
function sumGoogle() {
    var cantPostGoogle = parseInt(document.getElementById("cantPostGoogle").value);
    
    if (netGoogle.checked == false) {
        subGoogle = 0.0;
    } else {
        subGoogle = (valorMensualPost*cantPostGoogle);
    }
    sumRedes();
}

// YOUTUBE
var netYoutube = document.getElementById("netYoutube");
var valorPostYoutube = 0.0;
var subYoutube = 0.0;

netYoutube.addEventListener("change", sumYoutube);
function sumYoutube() {
    var cantPostYoutube = parseInt(document.getElementById("cantPostYoutube").value);
    
    if (netYoutube.checked == false) {
        subYoutube = 0.0;
    } else {
        subYoutube = (valorMensualPost*cantPostYoutube);
    }
    sumRedes();
}

// TIKTOK
var netTiktok = document.getElementById("netTiktok");
var valorPostTiktok = 0.0;
var subTiktok = 0.0;

netTiktok.addEventListener("change", sumTiktok);
function sumTiktok() {
    var cantPostTiktok = parseInt(document.getElementById("cantPostTiktok").value);
    
    if (netTiktok.checked == false) {
        subTiktok = 0.0;
    } else {
        subTiktok = (valorMensualPost*cantPostTiktok);
    }
    sumRedes();
}

// TWITTER
var netTwitter = document.getElementById("netTwitter");
var valorPostTwitter = 0.0;
var subTwitter = 0.0;

netTwitter.addEventListener("change", sumTwitter);
function sumTwitter() {
    var cantPostTwitter = parseInt(document.getElementById("cantPostTwitter").value);
    
    if (netTwitter.checked == false) {
        subTwitter = 0.0;
    } else {
        subTwitter = (valorMensualPost*cantPostTwitter);
    }
    sumRedes();
}

// LINKEDIN
var netLinkedin = document.getElementById("netLinkedin");
var valorPostLinkedin = 0.0;
var subLinkedin = 0.0;

netLinkedin.addEventListener("change", sumLinkedin);
function sumLinkedin() {
    var cantPostLinkedin = parseInt(document.getElementById("cantPostLinkedin").value);
    
    if (netLinkedin.checked == false) {
        subLinkedin = 0.0;
    } else {
        subLinkedin = (valorMensualPost*cantPostLinkedin);
    }
    sumRedes();
}

// SNAPCHAT
var netSnapchat = document.getElementById("netSnapchat");
var valorPostSnapchat = 0.0;
var subSnapchat = 0.0;

netSnapchat.addEventListener("change", sumSnapchat);
function sumSnapchat() {
    var cantPostSnapchat = parseInt(document.getElementById("cantPostSnapchat").value);
    
    if (netSnapchat.checked == false) {
        subSnapchat = 0.0;
    } else {
        subSnapchat = (valorMensualPost*cantPostSnapchat);
    }
    sumRedes();
}

// HISTORIAS
var netHistoria = document.getElementById("netHistoria");
var valorPostHistoria = 0.0;
var subHistoria = 0.0;

netHistoria.addEventListener("change", sumHistoria);
function sumHistoria() {
    var cantPostHistoria = parseInt(document.getElementById("cantPostHistoria").value);
    var redesHistoria = parseInt(document.getElementById("redesHistoria").value);
    
    if (netHistoria.checked == false) {
        subHistoria = 0.0;
    } else {
        if (redesHistoria == 3) {
            subHistoria = (valorMensualHistoria*cantPostHistoria)*2;
        } else {
            subHistoria = (valorMensualHistoria*cantPostHistoria)
        }
    }
    sumRedes();
}

// REELS
var netReel = document.getElementById("netReel");
var valorPostReel = 0.0;
var subReel = 0.0;

netReel.addEventListener("change", sumReel);
function sumReel() {
    var cantPostReel = parseInt(document.getElementById("cantPostReel").value);
    var redesReel = parseInt(document.getElementById("redesReel").value);
    
    if (netReel.checked == false) {
        subReel = 0.0;
    } else {
        if (redesReel == 3) {
            subReel = (valorMensualReel*cantPostReel)*2;
        } else {
            subReel = (valorMensualReel*cantPostReel)
        }
    }
    sumRedes();
}


// CALCULO SUB REDES
function sumRedes() {
    subRedes = (
        subFacebook +
        subInstagram +
        subGoogle +
        subYoutube +
        subTiktok +
        subTwitter +
        subLinkedin +
        subSnapchat +
        subHistoria +
        subReel
    );
    sumSubtotal();

    console.log("sub-"+subRedes);
}


// CONTENIDO ENTREGADO
var cECliente = document.getElementById("contenidoEntregadoCliente");
var cEEmpresa = document.getElementById("contenidoEntregadoEmpresa");


// Tiempos de contrato
var tContratoI = document.getElementById("tiempoContratoI");
var tContrato6 = document.getElementById("tiempoContrato6");
var tContrato12 = document.getElementById("tiempoContrato12");
var tContrato18 = document.getElementById("tiempoContrato18");
var tContrato24 = document.getElementById("tiempoContrato24");


// SUBTOTAL, AUMENTOS Y DESCUENTOS
function sumSubtotal() {
    if (tContratoI.checked == true) {
        pDescuento = 0.0;
        if (cEEmpresa.checked == true) {
            pAumento = 0.15;
        } else {
            pAumento = 0.0;
        }
    }

    if (tContrato6.checked == true) {
        pDescuento = 0.03;
        if (cEEmpresa.checked == true) {
            pAumento = 0.12;
        } else {
            pAumento = 0.0;
        }
    }

    if (tContrato12.checked == true) {
        pDescuento = 0.06;
        if (cEEmpresa.checked == true) {
            pAumento = 0.09;
        } else {
            pAumento = 0.0;
        }
    }

    if (tContrato18.checked == true) {
        pDescuento = 0.09;
        if (cEEmpresa.checked == true) {
            pAumento = 0.06;
        } else {
            pAumento = 0.0;
        }
    }

    if (tContrato24.checked == true) {
        pDescuento = 0.12;
        if (cEEmpresa.checked == true) {
            pAumento = 0.03;
        } else {
            pAumento = 0.0;
        }
    }

    subTotal = subRedes;
    
    descuento = (subTotal*pDescuento)
    aumento = (subTotal*pAumento);

    sumTotal();
}


// CALCULO TOTAL
function sumTotal() {
    total = (subTotal-descuento)+aumento;
    var totalCostLabel = document.getElementById("totalCostLabel");
    totalCostLabel.textContent = total.toLocaleString("en-US");

    var totalCost = document.getElementById("totalCost");
    totalCost.value = total.toFixed(2);
    totalCost.setAttribute("value", total.toFixed(2));
}