let currentSlide = -1;

function showSlide(index) {
    const slides = document.querySelector("#slides");
    const slideWidth = document.querySelector("#item").offsetWidth;
    slides.style.transform = `translateX(${-index * slideWidth}px)`;


    const items = document.querySelectorAll("#item");
    const images = document.querySelectorAll("#item div img");
    const imgContainer = document.querySelectorAll("#cont_atas");
    const textContainer = document.querySelectorAll("#cont_bawah");
    const circles = document.querySelectorAll(".circle");

    // Reset width for all items
    for (let i = 0; i < items.length; i++) {
        // const item = document.querySelector('.item' + i);
        // items[i].style.height = "initial";
        items[i].style.opacity = "0.7";
        items[i].style.marginLeft = "0";
        items[i].style.marginRight = "0";
        items[i].style.zIndex = "0";
        items[i].style.width = "16rem";
        imgContainer[i].style.backgroundColor = "#e6e6e6";
        items[i].style.marginBottom = "0";
        textContainer[i].style.width = "16rem";
        circles[i].style.width = "1.5rem";
    }

    // const item = document.querySelector(".item" + (index + 1));
    // items[index].style.height = "35rem";
    items[index + 1].style.opacity = "1";
    items[index + 1].style.marginLeft = "-50px";
    items[index + 1].style.marginRight = "-50px";

    if (index != -1) {
        items[index].style.marginLeft = "1.5rem";
    } else {
        items[index + 1].style.marginLeft = "-1rem";
    }

    if (index != 6) {
        items[index + 2].style.marginRight = "1.5rem";
    } else {
        items[index + 1].style.marginRight = "0";
    }

    imgContainer[index + 1].style.backgroundColor = "#ffffff";
    items[index + 1].style.zIndex = "2";
    items[index + 1].style.width = "20rem";
    items[index + 1].style.marginBottom = "1.5rem";
    textContainer[index + 1].style.width = "20rem";
    circles[index + 1].style.width = "4rem";

    // console.log(items[index].style.width);
    currentSlide = index;
}

function prevSlide() {
    if (currentSlide > -1) {
        currentSlide -= 1;
    } else {
        currentSlide = 6;
    }
    console.log(currentSlide);
    showSlide(currentSlide);
}

function nextSlide() {
    if (currentSlide < 6) {
        currentSlide += 1;
    } else {
        currentSlide = -1;
    }
    console.log(currentSlide);
    showSlide(currentSlide);
}

let counter = 0;

const intervalId = setInterval(function () {
    counter++;

    if (counter === 5) {
        nextSlide();
        counter = 0;
    }
}, 1000);

// document.addEventListener("DOMContentLoaded", function() {
//     const carousel = document.querySelector(".carousel");
//     const nextBtn = document.getElementById("next");
//     const prevBtn = document.getElementById("prev");
//     const firstCardWidth = document.querySelector(".card").offsetWidth;

//     let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

//     let currentIndex = 0;

//     nextBtn.addEventListener("click", function() {
//         scrollTo(firstCardWidth);
//     });

//     prevBtn.addEventListener("click", function() {
//         scrollTo(-firstCardWidth);
//     });

//     function scrollTo(direction) {
//         currentIndex += direction;
//         if (currentIndex < 0) {
//             currentIndex = 0;
//         } else if (currentIndex >= carousel.children.length - cardPerView + 1) {
//             currentIndex = carousel.children.length - cardPerView;
//         }

//         const newPosition = currentIndex * firstCardWidth;
//         carousel.scrollTo({
//             left: newPosition,
//             behavior: 'smooth'
//         });
//     }
// });
