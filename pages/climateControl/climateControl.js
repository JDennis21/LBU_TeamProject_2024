document.addEventListener("DOMContentLoaded", function () {
    var speedSlider = document.getElementById("speedSlider");
    var speedValue = document.getElementById("speedValue");

    speedSlider.oninput = function () {
      speedValue.innerHTML = this.value;
    };

    resetButton.addEventListener("click", function() {
        speedSlider.value = 50;
        speedValue.textContent = 50;
    });
});