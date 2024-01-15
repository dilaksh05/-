let images = document.querySelectorAll(".img-gallery img");
let wrapper = document.querySelector(".imageWrapper"); // Corrected class name
let imgWrapper = document.getElementById("fullImg");
let close = document.querySelector(".imageWrapper span"); // Selecting the span inside .imageWrapper

images.forEach((img, index) => {
  img.addEventListener("click", () => {
    openModal(`images/img${index}.jpg`);
  });
});

close.addEventListener("click", () => (wrapper.style.display = "none"));

function openModal(pic) {
  wrapper.style.display = "flex";
  imgWrapper.src = pic;
}
function openModal(pic) {
  console.log("Opening modal with image:", pic);
  
  wrapper.style.display = "flex";
  imgWrapper.src = pic;

  console.log("Image source set to:", imgWrapper.src);
}
