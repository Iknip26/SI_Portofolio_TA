document.addEventListener("DOMContentLoaded", function () {
    const animatedElements = document.querySelectorAll(".animated-element");

    window.addEventListener("scroll", function () {
        animatedElements.forEach(function (element) {
            const elementPosition = element.getBoundingClientRect().top;
            const triggerPosition = window.innerHeight * 0.5;

            if (
                elementPosition < triggerPosition &&
                !element.classList.contains("animate")
            ) {
                element.style.opacity = 1;
                element.style.transform = "translateY(0)";
                element.classList.add("animate");
            }
        });
    });
});
