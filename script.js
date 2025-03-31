document.addEventListener("DOMContentLoaded", function() {
    const carsContainer = document.getElementById("cars-container");
    carsContainer.addEventListener("click", function(event) {
        if (event.target.tagName === "A" && event.target.innerText === "Book Now") {
            alert("Car booked successfully!");
        }
    });
});