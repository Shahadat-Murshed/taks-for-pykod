const sidebar = document.getElementById("sidebar");
const collapseBtn = document.getElementById("collapse-btn");
collapseBtn.addEventListener("click", () => {
    sidebar.classList.toggle("collapsed");
    document.getElementById("content").classList.toggle("collapsed");
    document.getElementById("topbar").classList.toggle("collapsed");
    document.querySelector("footer").classList.toggle("collapsed");
});

document.getElementById("file").addEventListener("change", function (event) {
    let file = this.files[0];
    let preview = document.getElementById("preview");

    preview.innerHTML = "";

    if (file && file.type.startsWith("image/")) {
        let reader = new FileReader();

        reader.onload = function () {
            let img = document.createElement("img");
            img.src = reader.result;
            img.classList.add("fixed-size");
            preview.appendChild(img);
        };

        reader.readAsDataURL(file);
    } else {
        let p = document.createElement("p");
        p.innerHTML = "Selected file is not an image";
        preview.appendChild(p);
    }
});
