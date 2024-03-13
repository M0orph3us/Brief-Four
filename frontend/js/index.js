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
import {
  formChecker1,
  formChecker2,
  formChecker3,
} from "./scripts/formChecker.js";
document.addEventListener("DOMContentLoaded", () => {
  const currentPage = window.location.pathname;
  if (currentPage === `${routeLocal}/inscription.php`) {
    followingButton = document.getElementById("following");
    followingButton.addEventListener("click", formChecker1);
    followingButton2 = document.getElementById("following2");
    followingButton2.addEventListener("click", formChecker2);
  }
});
