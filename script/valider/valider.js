var validation = document.getElementById('submit');
var nom = document.getElementById('nom');
var prenom = document.getElementById('prenom');
var email = document.getElementById('email');
var pass = document.getElementById('pass');
var pass2 = document.getElementById('pass2');

var nom_m = document.getElementById('nom_manquant');
var prenom_p = document.getElementById('nom_manquant1');
var email_e = document.getElementById('nom_manquant2');
var pass_pa = document.getElementById('nom_manquant3');
var pass_p2 = document.getElementById('nom_manquant4');

var nom_v = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?/;
validation.addEventListener('click', f_valide);
validation.addEventListener('click', f_valide_prenom);
validation.addEventListener('click', f_valide_email);
validation.addEventListener('click', f_valide_pass);
validation.addEventListener('click', f_valide_pass2);

// ===================== POUR LE NOM ====================

function f_valide(e) {
    if(nom.validity.valueMissing) {
        e.preventDefault();
        nom_m.textContent = 'Le champ Nom ne doit être vide !';

        nom_m.style.color = 'red';
        nom.style.border= "2px solid red";
    }else if (nom_v.test(nom.value) == false) {
        event.preventDefault();
        nom_m.textContent = 'Format Nom incorrect';
        nom_m.style.color = "orange";
        nom.style.border = "2px solid orange";
    } else {
        nom.style.border= "2px solid green";
        nom_m.textContent = '';
    }
}

// ===================== POUR LE PRENOM ====================

function f_valide_prenom(e) {
    if(prenom.validity.valueMissing) {
        e.preventDefault();
        prenom_p.textContent = 'Le champ Prénom ne doit être vide !';

        prenom_p.style.color = 'red';
        prenom.style.border= "2px solid red";
    }else if (nom_v.test(prenom.value) == false) {
        event.preventDefault();
        prenom_p.textContent = 'Format Prénom incorrect';
        prenom_p.style.color = "orange";
        prenom.style.border = "2px solid orange";
    } else {
        prenom.style.border= "2px solid green";
        prenom_p.textContent = '';
    }
}

// ===================== POUR LE EMAIL ====================

function f_valide_email(e) {
    if(email.validity.valueMissing) {
        e.preventDefault();
        email_e.textContent = 'Le champ Email ne doit être vide !';

        email_e.style.color = 'red';
        email.style.border= "2px solid red";
    }else if (nom_v.test(email.value) == false) {
        event.preventDefault();
        email_e.textContent = 'Format Email incorrect';
        email_e.style.color = "orange";
        email.style.border = "2px solid orange";
    } else {
        email.style.border= "2px solid green";
        email_e.textContent = '';
    }
}

// ===================== POUR LE EMAIL ====================

function f_valide_pass(e) {
    if(pass.validity.valueMissing) {
        e.preventDefault();
        pass_pa.textContent = 'Le champ Email ne doit être vide !';

        pass_pa.style.color = 'red';
        pass.style.border= "2px solid red";
    }else {
        pass.style.border= "2px solid green";
        pass_pa.textContent = '';
    }
}

// ===================== POUR LE EMAIL ====================

function f_valide_pass2(e) {
    if(pass2.validity.valueMissing) {
        e.preventDefault();
        pass_p2.textContent = 'Le champ Email ne doit être vide !';

        pass_p2.style.color = 'red';
        pass2.style.border= "2px solid red";
    }else {
        pass2.style.border= "2px solid green";
        pass_p2.textContent = '';
    }
}