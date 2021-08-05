// TECHNIQUE CONSOLE.LOG pour débuger
// onclick="console.log('click, bigplanet()'); bigplanet()"

// test pour remplacer les id des planètes
// var mars = document.getElementById("marsMain");
// mars.addEventListener('click', event => {
    //     console.log("marsDeux");
    //     console.log(event);
    //     document.querySelectorAll(".bigPlanet").style.display = "block";
    // })
    
    // autre lien utile
    // https://stackoverflow.com/questions/23168119/how-to-use-onclick-in-an-external-javascript-file
    
window.onload = function () {
    var luneIMG = document.getElementById("onclickLune");
    var marsIMG = document.getElementById("onclickMars");
    var saturneIMG = document.getElementById("onclickSaturne");
    var plutonIMG = document.getElementById("onclickPluton");
    luneIMG.onclick = biglune;
    marsIMG.onclick = bigmars;
    saturneIMG.onclick = bigsaturne;
    plutonIMG.onclick = bigpluton;
}

// LUNE
function biglune () {
    document.getElementById("bigLune").style.display = "block";
}

function opacityLuneNone () {
    var opac = document.getElementById("bigLune");
    if (opac.style.opacity = "1") {
        opac.style.opacity = "0";
        opac.style.transition = "1s";
    } else {
        opac.style.opacity = "1";
    }
}

// MARS

function bigmars () {
    document.getElementById("bigMars").style.display = "block";
}

function opacityMarsNone () {
    var opac2 = document.getElementById("bigMars");
    if (opac2.style.opacity = "1") {
        opac2.style.opacity = "0";
        opac2.style.transition = "1s";
    } else {
        opac2.style.opacity = "1";
    }
}

// SATURNE
function bigsaturne () {
    document.getElementById("bigSaturne").style.display = "block";
}

function opacitySaturneNone () {
    var opac3 = document.getElementById("bigSaturne");
    if (opac3.style.opacity = "1") {
        opac3.style.opacity = "0";
        opac3.style.transition = "1s";
    } else {
        opac3.style.opacity = "1";
    }
}

// PLUTON
function bigpluton () {
    document.getElementById("bigPluton").style.display = "block";
}

function opacityPlutonNone () {
    var opac3 = document.getElementById("bigPluton");
    if (opac3.style.opacity = "1") {
        opac3.style.opacity = "0";
        opac3.style.transition = "1s";
    } else {
        opac3.style.opacity = "1";
    }
}

// window.onload = function () {
    //     var pasdemars = document.getElementById("zeromars");
//     pasdemars.onclick = console.log('click, marsNone()'); marsNone;
// }
// onclick="console.log('click, bigplanet()'); bigplanet()"

// SATURNE