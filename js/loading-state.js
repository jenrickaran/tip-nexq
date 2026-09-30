document
  .getElementById("email-submit")
  .addEventListener("submit", function (e) {
    const btn = document.getElementById("submit-btn");
    const text = document.getElementById("submit-text");
    const icon = document.getElementById("submit-icon");
    const spinner = document.getElementById("submit-spinner");

    // 1. Disable the button
    btn.disabled = true;

    // 2. Change text
    text.textContent = "Submitting...";

    // 3. Swap paper plane icon for loading spinner
    icon.classList.add("hidden");
    spinner.classList.remove("hidden");
  });
