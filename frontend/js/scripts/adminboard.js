export function menuAdminboard() {
  const eventContainer = document.querySelector("#events-container");
  const formNewEvent = document.querySelector("#form-new-event");
  const btnAssignVolunteers = document.querySelector("#assign-volunteers");
  const btnEvent = document.querySelector("#events");
  btnEvent.addEventListener("click", () => {
    formNewEvent.style.display = "none";
    eventContainer.style.display = "flex";
  });

  const btnNewEvent = document.querySelector("#new-event");
  btnNewEvent.addEventListener("click", () => {
    formNewEvent.style.display = "flex";
    eventContainer.style.display = "none";
  });
}
