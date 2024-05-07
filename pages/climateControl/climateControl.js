document.addEventListener("DOMContentLoaded", function () {
    const speedSlider = document.getElementById("speedSlider");
    const speedValue = document.getElementById("speedValue");
    const resetButton = document.getElementById("resetButton");

    speedValue.textContent = speedSlider.value;

    speedSlider.addEventListener("input", function () {
        speedValue.innerHTML = this.value;
    });

    speedSlider.addEventListener("change", function () {
        updateSpeed(this.value);
    });

    resetButton.addEventListener("click", function() {
        speedSlider.value = 50;
        speedValue.textContent = speedSlider.value
        updateSpeed(50); // Compute something when reset button is clicked
    });

    function updateSpeed(speed) {
        console.log(speed);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "updateSpeed.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("Slider value saved successfully");
            }
        };
        xhr.send("sliderValue=" + encodeURIComponent(speed));
    }
});