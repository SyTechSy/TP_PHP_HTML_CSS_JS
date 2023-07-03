let toggleFormulaireApprenant = document.getElementById("toggle_formulaireApprenant");
let closeFormulaireApprenant = document.getElementById("close_formulaireApprenant");

if (toggleFormulaireApprenant){
    toggleFormulaireApprenant.addEventListener("click", () => {
        menu_formulaire.classList.add('show_formulaire_apprenant');
    })
}

if (closeFormulaireApprenant){
    closeFormulaireApprenant.addEventListener("click", () => {
        menu_formulaire.classList.remove('show_formulaire_apprenant');
    })
}


// ======================= MATRICULE ====================

var matriculeId = document.getElementById('text_matricule').value=create_mat(4);
function create_mat(str_length) {

    var random_str = "";
    var caract = "ABCDEFGHIJKLMNOPQRSTUVWXZQ0123456789abcdefghijklmnopqrstuvwxyz";
    for(var i, i = 0; i< str_length ; i++) {
        random_str += caract.charAt(Math.floor(Math.random()* caract.length));
    }
    return random_str;
}















// ======================= LA PROTECTION DE MON CODE ==============================

function blockAccess(event) {
    if(event.keyCode == 123 || (event.ctrlKey && event.keyCode == 73)) {
        event.preventDefault();
    }
}

document.addEventListener('keydown', blockAccess);

document.addEventListener('contextmenu', event => event.preventDefault());

// ======================= VALIDATION DE FORMULAIRE SUR LE FORM DE APPRENANT ==============================

var validation = document.getElementById('submit');
var text_lname = document.getElementById('text_lname');
var text_fname = document.getElementById('text_fname');
var text_age = document.getElementById('text_age');
var text_birth = document.getElementById('text_birth');
var text_email = document.getElementById('text_email');
var text_number = document.getElementById('text_number');
var text_photo = document.getElementById('text_photo');
var text_promo = document.getElementById('text_promo');
var text_certifica = document.getElementById('text_certifica');

var text_lname_m = document.getElementById('error_text_nom');
var text_fname_f = document.getElementById('error_text_prenom');
var text_age_a = document.getElementById('error_text_age');
var text_birth_b = document.getElementById('error_text_birth');
var text_email_e = document.getElementById('error_text_email');
var text_number_n = document.getElementById('error_text_number');
var text_photo_p = document.getElementById('error_text_photo');
var text_promo_p = document.getElementById('error_text_promo');
var text_certifica_c = document.getElementById('error_text_certifica');

var mot_cle_v = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?/;
validation.addEventListener('click', app_valide_nom);
validation.addEventListener('click', app_valide_prenom);
validation.addEventListener('click', app_valide_age);
validation.addEventListener('click', app_valide_birth);
validation.addEventListener('click', app_valide_email);
validation.addEventListener('click', app_valide_number);
validation.addEventListener('click', app_valide_photo);
validation.addEventListener('click', app_valide_promo);
validation.addEventListener('click', app_valide_certifica);


// ===================== POUR LE LAST NAME ====================
function app_valide_nom(e) {
    if(text_lname.validity.valueMissing) {
        e.preventDefault();
        text_lname_m.textContent = 'Le champ Nom est vide !';

        text_lname_m.style.color = 'red';
        text_lname.style.border= "2px solid red";
    }else if (mot_cle_v.test(text_lname.value) == false) {
        event.preventDefault();
        text_lname_m.textContent = 'Mettre le format en miniscule';
        text_lname_m.style.color = "orange";
        text_lname.style.border = "2px solid orange";
    } else {
        text_lname.style.border= "2px solid green";
        text_lname_m.textContent = '';
    }
}
// ===================== POUR LE FIRTH NAME ====================
function app_valide_prenom(e) {
    if(text_fname.validity.valueMissing) {
        e.preventDefault();
        text_fname_f.textContent = 'Le champ Prénom est vide !';

        text_fname_f.style.color = 'red';
        text_fname.style.border= "2px solid red";
    }else if (mot_cle_v.test(text_fname.value) == false) {
        event.preventDefault();
        text_fname_f.textContent = 'Format Prénom incorrect';
        text_fname_f.style.color = "orange";
        text_fname.style.border = "2px solid orange";
    } else {
        text_fname.style.border= "2px solid green";
        text_fname_f.textContent = '';
    }
}
// ===================== POUR LE AGE  ====================
function app_valide_age(e) {
    if(text_age.validity.valueMissing) {
        e.preventDefault();
        text_age_a.textContent = 'Le champ Âge est vide !';

        text_age_a.style.color = 'red';
        text_age.style.border= "2px solid red";
    } else {
        text_age.style.border= "2px solid green";
        text_age_a.textContent = '';
    }
}
// ===================== POUR LE BIRTH  ====================
function app_valide_birth(e) {
    if(text_birth.validity.valueMissing) {
        e.preventDefault();
        text_birth_b.textContent = 'Le champ Date de naissance est vide !';

        text_birth_b.style.color = 'red';
        text_birth.style.border= "2px solid red";
    } else {
        text_birth.style.border= "2px solid green";
        text_birth_b.textContent = '';
    }
}
// ===================== POUR LE EMAIL  ====================
function app_valide_email(e) {
    if(text_email.validity.valueMissing) {
        e.preventDefault();
        text_email_e.textContent = 'Le champ Email est vide !';

        text_email_e.style.color = 'red';
        text_email.style.border= "2px solid red";
    }else if (mot_cle_v.test(text_email.value) == false) {
        event.preventDefault();
        text_email_e.textContent = 'Format Email incorrect';
        text_email_e.style.color = "orange";
        text_email.style.border = "2px solid orange";
    } else {
        text_email.style.border= "2px solid green";
        text_email_e.textContent = '';
    }
}
// ===================== POUR LE NUMBER  ====================
function app_valide_number(e) {
    if(text_number.validity.valueMissing) {
        e.preventDefault();
        text_number_n.textContent = 'Le champ Number est vide !';

        text_number_n.style.color = 'red';
        text_number.style.border= "2px solid red";
    } else {
        text_number.style.border= "2px solid green";
        text_number_n.textContent = '';
    }
}
// ===================== POUR LE PHOTO  ====================
function app_valide_photo(e) {
    if(text_photo.validity.valueMissing) {
        e.preventDefault();
        text_photo_p.textContent = 'Le champ Photo est vide !';

        text_photo_p.style.color = 'red';
        text_photo.style.border= "2px solid red";
    } else {
        text_photo.style.border= "2px solid green";
        text_photo_p.textContent = '';
    }
}
// ===================== POUR LE PROMOTION  ====================
function app_valide_promo(e) {
    if(text_promo.validity.valueMissing) {
        e.preventDefault();
        text_promo_p.textContent = 'Le champ Promotion est vide !';

        text_promo_p.style.color = 'red';
        text_promo.style.border= "2px solid red";
    } else {
        text_promo.style.border= "2px solid green";
        text_promo_p.textContent = '';
    }
}
// ===================== POUR LE CERTIFICATION  ====================
function app_valide_certifica(e) {
    if(text_certifica.validity.valueMissing) {
        e.preventDefault();
        text_certifica_c.textContent = 'Le champ Certification est vide !';

        text_certifica_c.style.color = 'red';
        text_certifica.style.border= "2px solid red";
    } else {
        text_certifica.style.border= "2px solid green";
        text_certifica_c.textContent = '';
    }
}