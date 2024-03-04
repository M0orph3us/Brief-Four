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
