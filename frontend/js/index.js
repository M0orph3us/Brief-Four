"use strict";

const routeLocal = "/Brief-Four/frontend/pages/";

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
  if (currentPage === `${routeLocal}adminboard.php`) {
    menuAdminboard();
  }
});

// AJAX for screen width user for responsive page php
import { getScreenUser } from "./scripts/getScreenUser.js";
getScreenUser();
