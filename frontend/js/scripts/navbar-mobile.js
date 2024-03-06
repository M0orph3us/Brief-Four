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

  const eyeClose = document.querySelector("#hidden-eye-login");
  const eyeOpen = document.querySelector("#show-password-login");
  const passwordLogin = document.querySelector("#password-login");

  eyeClose.addEventListener("click", () => {
    eyeOpen.style.display = "block";
    eyeClose.style.display = "none";
    passwordLogin.type = "text";
  });

  eyeOpen.addEventListener("click", () => {
    eyeOpen.style.display = "none";
    eyeClose.style.display = "block";
    passwordLogin.type = "password";
  });
}
