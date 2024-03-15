"use strict";

const routeLocal = "/Brief-Four/frontend/pages";

// functions for menu-burger
import {
  menuBurger,
  userContainer,
  loginModal,
} from "./scripts/navbar-mobile.js";
menuBurger();
userContainer();
loginModal();

// function for adminboard
import { menuAdminboard } from "./scripts/adminboard.js";
document.addEventListener("DOMContentLoaded", () => {
  const currentPage = window.location.pathname;
  if (currentPage === `${routeLocal}/adminboard.php`) {
    menuAdminboard();
  }
});

// AJAX for screen width user for responsive page php
import { getScreenUser } from "./scripts/getScreenUser.js";
getScreenUser();

// functions for register volunteers
import { formChecker1, formChecker2 } from "./scripts/formChecker.js";
document.addEventListener("DOMContentLoaded", () => {
  const currentPage = window.location.pathname;
  if (currentPage === `${routeLocal}/inscription.php`) {
    let followingButton = document.getElementById("following");
    let followingButton2 = document.getElementById("following2");

    followingButton.addEventListener("click", () => formChecker1());
    followingButton2.addEventListener("click", () => formChecker2());
  }
});

// functions for profil page
import { btnProfilPage } from "./scripts/profil.js";
document.addEventListener("DOMContentLoaded", () => {
  const currentPage = window.location.pathname;
  if (currentPage === `${routeLocal}/profil.php`) {
    btnProfilPage();
  }
});
