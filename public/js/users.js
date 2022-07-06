const codeInput = document.querySelector(".code");
const closeModal = document.querySelector(".closeModal");
const modal = document.querySelector(".userModal");
const openModal = document.querySelectorAll(".openModal");
const form = document.querySelector(".form");
const token = document.getElementsByName("_token")[0].value;
const modalBtn = document.getElementById("send_btn");

openModal.forEach((opmodal) => {
    opmodal.addEventListener("click", (e) => {
        let id = e.target.getAttribute("data-id");
        let isActive = e.target.getAttribute("data-isActive");
        modalBtn.textContent = isActive == 1 ? "logout" : "login";
        modal.style.visibility = "visible";
        modalBtn.addEventListener("click", (e) => {
            fetch(`/user-attendance/${id}`, {
                method: "POST",
                body: JSON.stringify({
                    code: codeInput.value,
                    _token: token,
                }),
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                },
            }).then(() => (modal.style.visibility = "hidden"));
        });
        closeModal.addEventListener(
            "click",
            () => (modal.style.visibility = "hidden")
        );
    });
});
