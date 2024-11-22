const sidebar = document.getElementById("toggle-sidebar");
const adminpanel = document.querySelector(".adminpanel");

sidebar.addEventListener("click", () => {
  adminpanel.classList.toggle("active");
  if (adminpanel.classList.contains("active")) {
    sidebar.style.left = "-10px";
  } else {
    sidebar.style.left = "15px";
  }
});
