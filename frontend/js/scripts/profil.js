export function btnProfilPage() {
  const profilContainer = document.querySelector("#profil-container");
  const eventsUserContainer = document.querySelector("#events-user-container");
  window.onload = () => {
    profilContainer.style.display = "block";
    eventsUserContainer.style.display = "none";
  };
  const btnProfil = document.querySelector("#my-profil");
  btnProfil.addEventListener("click", () => {
    profilContainer.style.display = "block";
    eventsUserContainer.style.display = "none";
  });

  const btnMyEvents = document.querySelector("#my-events");
  btnMyEvents.addEventListener("click", () => {
    profilContainer.style.display = "none";
    eventsUserContainer.style.display = "flex";
  });
}
