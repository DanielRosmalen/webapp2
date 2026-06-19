document.addEventListener("DOMContentLoaded", () => {

    const track = document.querySelector(".destinations-track")
    const leftButton = document.querySelector(".arrow-button")
    const rightButton = document.querySelector(".arrow-button-2")
    const plekkenOmTeDromen = document.querySelector(".location-text")
    const highLight = document.querySelector(".location-text")
    const counter = document.getElementById("counter");
    const max = Number(document.getElementById("total").textContent);
    let count = 1;
    const reviewTrack = document.querySelector(".reviews-track")
    const leftButtonTwo = document.querySelector(".arrow-button-3");
    const rightButtonTwo = document.querySelector(".arrow-button-4");
    const counterTwo = document.getElementById("counter-2");
    const maxTwo = Number(document.getElementById("total-reviews").textContent);
    let countTwo = 1;


    const getScrollAmount = (cardClass) => {
        const card = document.querySelector(cardClass)
        if (!card) return 0;
        return card.offsetWidth + 25;
    };

    function updateDisplay() {
        counter.textContent = count;

    }

    leftButton.addEventListener("click", () => {
        track.scrollBy({
                left: -getScrollAmount('.destination-card'),
                behavior: "smooth",
            });
        if (count > 1) {
        count--;
        updateDisplay();
    }
    });

    rightButton.addEventListener("click", () => {
        track.scrollBy({
            left: getScrollAmount('.destination-card'),
            behavior: "smooth",
        });
        if (count < max) {
            count++;
            updateDisplay();
    }
    });

    plekkenOmTeDromen.addEventListener("mouseover", () => {
        plekkenOmTeDromen.classList.add("hover-actief");
    })

    plekkenOmTeDromen.addEventListener("mouseout", () => {
        plekkenOmTeDromen.classList.remove("hover-actief");
    })

    highLight.addEventListener("mouseover", () => {
        highLight.classList.add("hover-aanwezig");
    })

    highLight.addEventListener("mouseout", () => {
        highLight.classList.remove("hover-aanwezig");
    })

    function updateDisplayTwo() {
        counterTwo.textContent = countTwo;

    }

    leftButtonTwo.addEventListener("click", () => {
        reviewTrack.scrollBy({
            left: -getScrollAmount('.review-card'),
            behavior: "smooth",
        })
        if (countTwo > 1) {
            countTwo--;
            updateDisplayTwo();
        }
    })

    rightButtonTwo.addEventListener("click", () => {
        reviewTrack.scrollBy({
            left: getScrollAmount('.review-card'),
            behavior: "smooth",
        })
        if (countTwo < maxTwo) {
            countTwo++;
            updateDisplayTwo();
        }
    })
});


