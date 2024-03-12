"use strict";

// functions for menu-burger
import {
  menuBurger,
  userContainer,
  loginModal,
} from "./scripts/navbar-mobile.js";
menuBurger();
userContainer();
loginModal();

// functions for adminboard
import { menuAdminboard } from "./scripts/adminboard.js";
menuAdminboard();

// functions for register volunteers
import {
  formChecker1,
  formChecker2,
  formChecker3,
} from "./scripts/formChecker.js";
document.addEventListener("DOMContentLoaded", () => {
  const currentPage = window.location.pathname;
  if (currentPage === "/Brief-Four/frontend/pages/inscription.php") {
    followingButton = document.getElementById("following");
    followingButton.addEventListener("click", formChecker1);
    followingButton2 = document.getElementById("following2");
    followingButton2.addEventListener("click", formChecker2);
  }
});
