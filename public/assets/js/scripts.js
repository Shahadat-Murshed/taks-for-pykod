const sidebar = document.getElementById("sidebar");
const collapseBtn = document.getElementById("collapse-btn");
collapseBtn.addEventListener("click", () => {
    sidebar.classList.toggle("collapsed");
    document.getElementById("content").classList.toggle("collapsed");
    document.getElementById("topbar").classList.toggle("collapsed");
    document.querySelector("footer").classList.toggle("collapsed");
});
