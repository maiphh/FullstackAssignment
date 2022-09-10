const noti = document.querySelector(".noti");
const closeIcon = document.querySelector(".close");
const progress = document.querySelector(".progress");
const btn = document.querySelector(".addProductbtn");


function popUp() {
  noti.classList.add("active");
  progress.classList.add("active");
  // setTimeout(() => {
  //   noti.classList.remove("active");
  //
  // },5000);
  //
  // setTimeout(() => {
  //   progress.classList.remove("active");
  //
  // },5000)
};

// btn.addEventListener("click", () =>{
//   noti.classList.add("active");
//   progress.classList.add("active");
//   // setTimeout(() => {
//   //   noti.classList.remove("active");
//   //
//   // },5000);
//   //
//   // setTimeout(() => {
//   //   progress.classList.remove("active");
//   //
//   // },5000)
// });


closeIcon.addEventListener("click",() =>{
  noti.classList.remove("active");
progress.classList.remove("active");
  // setTimeout(() => {
  //   progress.classList.remove("active");
  //
  // },300)
})
