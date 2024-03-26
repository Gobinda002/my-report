

    // for the navigation bar
var navbar=document.querySelector('.nav');
window.onscroll = function(){
    this.scrollY > 280? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
}


// document.addEventListener("DOMContentLoaded", function () {
//     // Get all thumbnail items
//     var thumbnailItems = document.querySelectorAll('.thumbnail .item');

//     // Attach click event listeners to each thumbnail item
//     thumbnailItems.forEach(function (thumbnailItem, index) {
//         thumbnailItem.addEventListener('click', function () {
//             // Hide all content items
//             var allContentItems = document.querySelectorAll('.list .item');
//             allContentItems.forEach(function (item) {
//                 item.style.display = 'none';
//             });

//             // Display the selected content based on the index
//             allContentItems[index].style.display = 'block';
//         });
//     });
// });

//For swiper JS 

var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
    },
  
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
  
    slidesPerView: 1,
    loop: true,
  });
  
   