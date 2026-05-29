document.addEventListener("DOMContentLoaded", () => {

    const track = document.querySelector(".destinations-track")
    const leftButton = document.querySelector(".arrow-button")
    const rightButton = document.querySelector(".arrow-button-2")

    const getScrollAmount = () => {
        const card = document.querySelector(".destination-card")
        if (!card) return 0;
        return card.offsetWidth + 25;
    };

    leftButton.addEventListener("click", () => {
        track.scrollBy({
                left: -getScrollAmount(),
                behavior: "smooth",
            });
    });

    rightButton.addEventListener("click", () => {
        track.scrollBy({
            left: getScrollAmount(),
            behavior: "smooth",
        });
    });
});