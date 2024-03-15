function newEventVerif() {
  const nameEventValue = document.querySelector("#name-event").value;
  const commentEventValue = document.querySelector("#comment-event").value;
  const formNewEventTarget = document.querySelector("#form-new-event");
  const alert = document.createElement("p");
  alert.classList.add("error");

  if (nameEventValue.length < 3) {
    alert.textContent = "The event name must be at least 3 characters";
    formNewEventTarget.append(alert);
    return false;
  } else if (nameEventValue.length > 50) {
    alert.textContent = "The event name must be less than 50 characters";
    formNewEventTarget.append(alert);
    return false;
  } else if (commentEventValue !== "" && commentEventValue.length < 5) {
    alert.textContent = "The event name must be at least 5 characters";
    formNewEventTarget.append(alert);
    return false;
  } else if (commentEventValue !== "" && commentEventValue.length > 100) {
    alert.textContent = "The event name must be less than 50 characters";
    formNewEventTarget.apend(alert);
    return false;
  } else {
    return true;
  }
}
