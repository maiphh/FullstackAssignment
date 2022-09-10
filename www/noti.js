const noti = document.querySelector(".noti");
const closeIcon = document.querySelector(".close");
const progress = document.querySelector(".progress");
const btn = document.querySelector(".addProductbtn");

function popUp() {
    noti.classList.add("active");
    progress.classList.add("active");
}

closeIcon.addEventListener("click", () => {
    noti.classList.remove("active");
    progress.classList.remove("active");
});
