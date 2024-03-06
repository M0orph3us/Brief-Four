export function menuBurger() {
  if (window.screen.width <= 768) {
    const openBurger = document.querySelector("#open-burger");
    const closeBurger = document.querySelector("#close-burger");

    const burgerContainer = document.querySelector("#burger-container");
    openBurger.addEventListener("click", () => {
      openBurger.style.display = "none";
      burgerContainer.style.display = "flex";
      closeBurger.style.display = "block";
    });

    closeBurger.addEventListener("click", () => {
      openBurger.style.display = "block";
      burgerContainer.style.display = "none";
      closeBurger.style.display = "none";
    });
  }
}

export function userContainer() {
  if (window.screen.width <= 768) {
    const userLogo = document.querySelector(".profil");
    const userContainer = document.querySelector("#user-container");

    userLogo.addEventListener("click", () => {
      if (window.getComputedStyle(userContainer).display === "none") {
        userContainer.style.display = "flex";
      } else {
        userContainer.style.display = "none";
      }
    });
  }
}

export function loginModal() {
  const modalLoginForm = document.querySelector("#modal-login-form");
  const allBtnLogin = document.querySelectorAll(".btn-login");
  const arrayBtnLogin = [...allBtnLogin];
  arrayBtnLogin.forEach((btnLogin) => {
    btnLogin.addEventListener("click", () => {
      modalLoginForm.style.display = "block";
    });
  });

  const closeModal = document.querySelector("#close-modal-login");
  closeModal.addEventListener("click", () => {
    modalLoginForm.style.display = "none";
  });

  const btnVolunteer = document.querySelector("#btn-volunteer");
  const btnAdmin = document.querySelector("#btn-admin");
  const formVolunteer = document.querySelector("#login-user-form");
  const formAdmin = document.querySelector("#login-admin-form");

  btnAdmin.addEventListener("click", () => {
    formVolunteer.style.display = "none";
    formAdmin.style.display = "flex";
  });

  btnVolunteer.addEventListener("click", () => {
    formVolunteer.style.display = "flex";
    formAdmin.style.display = "none";
  });

  const eyeClose = document.querySelectorAll(".hidden-eye-login");
  const arrayEyeClose = [...eyeClose];
  const eyeOpen = document.querySelectorAll(".show-eye-login");
  const arrayEyeOpen = [...eyeOpen];
  const passwordLogin = document.querySelector("#password-login");
  arrayEyeClose.forEach((eyeClose) => {
    eyeClose.addEventListener("click", () => {
      eyeClose.style.display = "none";
      passwordLogin.type = "text";
      arrayEyeOpen.forEach((eyeOpen) => {
        eyeOpen.style.display = "block";
      });
    });
  });

  arrayEyeOpen.forEach((eyeOpen) => {
    eyeOpen.addEventListener("click", () => {
      eyeOpen.style.display = "none";
      passwordLogin.type = "password";
      arrayEyeClose.forEach((eyeClose) => {
        eyeClose.style.display = "block";
      });
    });
  });
}
