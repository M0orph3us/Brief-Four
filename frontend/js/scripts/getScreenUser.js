export function getScreenUser() {
  const screenWidth =
    window.innerWidth ||
    document.documentElement.clientWidth ||
    document.body.clientWidth ||
    window.screen.width;

  const data = "width=" + screenWidth;

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "../../backend/controller/widthScreenUser", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = () => {
    try {
      if (xhr.readyState === 4) {
        console.log("request OK");
        if (xhr.status === 200) {
          console.log(xhr.responseText);
        } else {
          console.error("Erreur côté client. Statut : " + xhr.status);
        }
      }
    } catch (error) {
      console.error("Une erreur inattendue s'est produite : " + error.message);
    }
  };
  xhr.onerror = function () {
    console.error("Erreur de réseau lors de la requête.");
  };

  xhr.send(data);
}
