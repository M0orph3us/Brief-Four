let followingButton = document.getElementById('following');
let followingButton2 = document.getElementById('following2');

followingButton.addEventListener('click', ()=>formChecker1());
followingButton2.addEventListener('click', ()=>formChecker2());

export function formChecker1() {
  let firstNameInput = document.getElementById("firstName");
  let lastNameInput = document.getElementById("lastName");
  let ageInput = document.getElementById("age");
  let sexSelect = document.getElementById("sex");
  let phoneInput = document.getElementById("tel");
  let emailInput = document.getElementById("email");

  if (firstNameInput.value.length < 3 || firstNameInput.value.length > 30) {
    alert("Le prénom est trop long, ou trop court !");
    return;
  }

  if (lastNameInput.value.length < 3 || lastNameInput.value.length > 30) {
    alert("Le nom de famille est trop long, ou trop court !");
    return;
  }

  if (
    ageInput.value.length < 1 ||
    ageInput.value.length > 2 ||
    ageInput.value < 18 ||
    ageInput.value > 45
  ) {
    alert("Vous êtes trop jeune, ou trop vieux (déso) !");
    return;
  }

  if (
    sexSelect.value == "femme" ||
    sexSelect.value == "homme" ||
    sexSelect.value == "secret"
  ) {
  } else {
    alert("Merci ce selectionner un sexe !");
    return;
  }

  if (phoneInput.value.length < 10 || phoneInput.value.length > 10) {
    alert("Le numéro de téléphone est incorrect !");
    return;
  }

  if (emailInput.value.length < 5 || emailInput.value.length > 256) {
    alert("L'adresse email n'est pas correct !");
    return;
  }

  let formPart1 = document.querySelector(".formPart1");
  formPart1.style.display = 'none';


  let formPart2 = document.querySelector(".formPart2");
  formPart2.style.display = 'flex';
}

export function formChecker2() {

  document.getElementById('following')

  let regionSelect = document.getElementById("region");
  let dateSelect = document.getElementById("dateAvailability");
  let hourSelect = document.getElementById("hourAvailability");
  let workSelect = document.getElementById("privilegedWork");
  if (
    regionSelect.value == "Auvergne-Rhone-Alpes" ||
    regionSelect.value == "Bourgogne-Franche-Comte" ||
    regionSelect.value == "Bretagne" ||
    regionSelect.value == "Centre-Val de Loire" ||
    regionSelect.value == "Corse" ||
    regionSelect.value == "Grand Est" ||
    regionSelect.value == "Hauts-de-France" ||
    regionSelect.value == "Ile-de-France" ||
    regionSelect.value == "Normandie" ||
    regionSelect.value == "Nouvelle-Aquitaine" ||
    regionSelect.value == "Occitanie" ||
    regionSelect.value == "Pays de la Loire" ||
    regionSelect.value == "Provence-Alpes-Cote d Azur"
  ) {
  } else {
    alert("Merci ce selectionner une région !");
    return;
  }

  if (dateSelect.value == "semaine" || dateSelect.value == "weekEnd") {
  } else {
    alert("Merci ce selectionner une disponibilité jour !");
    return;
  }

  if (
    hourSelect.value == "matin" ||
    hourSelect.value == "apresMidi" ||
    hourSelect.value == "soir" ||
    hourSelect.value == "nuit"
  ) {
  } else {
    alert("Merci ce selectionner une disponibilité horaire !");
    return;
  }

  if (
    workSelect.value == "securite" ||
    workSelect.value == "bar" ||
    workSelect.value == "technique" ||
    workSelect.value == "animation"
  ) {
  } else {
    alert("Merci ce selectionner un poste favoris :) !");
    return;
  }
  let formPart2 = document.querySelector(".formPart2");
  formPart2.style.display = 'none';


  let formPart3 = document.querySelector(".formPart3");
  formPart3.style.display = 'flex';

  let submitButton = document.getElementById('submit');
  submitButton.style.display = 'flex';
}

export function formChecker3() {
  let expressionInput = document.getElementById("freeExpression");
  if (expressionInput.value.length < 30 || expressionInput.value.length > 500) {
    alert("Votre billet d'humeur est trop court, ou trop long !");
    return;
  }  
  
}
