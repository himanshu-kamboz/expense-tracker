const savedTheme = localStorage.getItem("theme") || "dark";

document.body.classList.remove("dark", "light");
document.body.classList.add(savedTheme);

const theme = document.getElementById("theme");

if (theme) {

    theme.value = savedTheme;

    theme.addEventListener("change", function () {

        document.body.classList.remove("dark", "light");
        document.body.classList.add(this.value);

        localStorage.setItem("theme", this.value);

    });

}