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
document.addEventListener("DOMContentLoaded", () => {
  const currentPage = window.location.pathname;
  if (currentPage === "/Brief-Four/frontend/pages/adminboard.php") {
    menuAdminboard();
  }
});

// AJAX for screen width user for backend
import { getScreenUser } from "./scripts/getScreenUser.js";
getScreenUser();
