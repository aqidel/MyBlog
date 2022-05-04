// Set bootstrap's class active to current page number
let urlSearchParams = new URLSearchParams(window.location.search);
let params = Object.fromEntries(urlSearchParams.entries());
let element = document.getElementById(`page-${params.page}`);
element.classList.add('active');