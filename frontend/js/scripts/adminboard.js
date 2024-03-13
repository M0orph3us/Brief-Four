export function menuAdminboard() {
  const eventContainer = document.querySelector("#events-container");
  const formNewEvent = document.querySelector("#form-new-event");
  const formVolunteersEvents = document.querySelector(
    "#form-volunteers-events"
  );

  const btnEvent = document.querySelector("#events");
  btnEvent.addEventListener("click", () => {
    console.log("event");
    eventContainer.style.display = "flex";
    formNewEvent.style.display = "none";
    formVolunteersEvents.style.display = "none";
  });

  const btnNewEvent = document.querySelector("#new-event");
  btnNewEvent.addEventListener("click", () => {
    console.log("newEvent");
    formNewEvent.style.display = "flex";
    eventContainer.style.display = "none";
    formVolunteersEvents.style.display = "none";
  });

  const btnAssignVolunteers = document.querySelector("#assign-volunteers");
  btnAssignVolunteers.addEventListener("click", () => {
    console.log("assignVol");
    formVolunteersEvents.style.display = "flex";
    formNewEvent.style.display = "none";
    eventContainer.style.display = "none";
  });
}
