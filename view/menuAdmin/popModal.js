const btnOpenModal = document.querySelector(".btnOpen");
const btnCloseModal = document.querySelector(".btnClose");
const modal = document.querySelector(".dialog");

btnOpenModal.addEventListener("click", () => {
  modal.showModal();
});

btnCloseModal.addEventListener("click", () => {
  modal.close();
});