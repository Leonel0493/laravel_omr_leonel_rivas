const body = document.querySelector("body"),
    modeToggle = document.querySelector(".mode-toggle"),
    sidebarToggle = document.querySelector(".sidebar-toggle"),
    sidebar = document.querySelector("nav");

let getMode = localStorage.getItem("mode");
let getStatus = localStorage.getItem("status");

if (getMode && getMode === "dark") {
    body.classList.toggle("dark");
}

if (getStatus && getStatus === "status") {
  sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () => {
    body.classList.toggle("dark");
    if (body.classList.contains("dark")) {
        localStorage.setItem("mode", "dark");
    } else {
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if (sidebar.classList.contains("dark")) {
        localStorage.setItem("status", "close");
    } else {
        localStorage.setItem("status", "open");
    }
});
