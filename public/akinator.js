/*
 *  Name: Danhiel Vu & Long Nguyen
 *  Date: 12/22/2019
 *
 *  This is the java scipts page for Akinator.
 */
 "use strict";

 (function() {

   window.addEventListener("load", init);

   function init() {
     id("start-btn").addEventListener("click", initGame);
     id("about-btn").addEventListener("click", viewAbout);
     id("sources-btn").addEventListener("click", viewSources);
     id("back-btn").addEventListener("click", toggleBackView);
   }

   function initGame() {
     toggleGameView();
     requestInformation();
   }

   function requestInformation() {
     fetch("/information")
       .then(checkStatus)
       .then(resp => resp.json())
       .then(startGame)
       .catch(handleError);
   }

   function startGame(response) {

   }

   function viewAbout() {
     toggleBackView();
     id("about-view").classList.toggle("hidden");
     id("sub-title").textContent = "About";
   }

   function viewSources() {
     toggleBackView();
     id("sources-view").classList.toggle("hidden");
     id("sub-title").textContent = "Sources";
   }

   function toggleGameView() {
     id("main-view").classList.toggle("hidden");
     id("game-view").classList.toggle("hidden");
   }

   function toggleBackView() {
     id("main-view").classList.toggle("hidden");
     id("back-view").classList.toggle("hidden");
     id("title").classList.toggle("hidden");
     id("about-view").classList.add("hidden");
     id("sources-view").classList.add("hidden");
   }

   function id(name) {
     return document.getElementById(name);
   }

   function qs(name) {
     return document.querySelector(name);
   }

   function gen(tag) {
     return document.createElement(tag);
   }
})();
