const toggleSidebar = document.querySelector("#toggle-sidebar");
const adminPanel = document.querySelector(".adminpanel");

toggleSidebar.addEventListener("click", () => {
  adminPanel.classList.toggle("active");
  if (adminpanel.classList.contains("active")) {
    toggleSidebar.style.left = "-10px";
  } else {
    toggleSidebar.style.left = "15px";
  }
});