document.addEventListener("DOMContentLoaded", function() {
    const userField = document.getElementById("user");
    const passField = document.getElementById("pass");
    const submitBtn = document.getElementById("submitBtn");

    userField.addEventListener("input", validateForm);
    passField.addEventListener("input", validateForm);

    function validateForm() {
        if (userField.value.trim() !== "" && passField.value.trim() !== "") {
            submitBtn.removeAttribute("disabled");
        } else {
            submitBtn.setAttribute("disabled", "disabled");
        }
    }
});    
