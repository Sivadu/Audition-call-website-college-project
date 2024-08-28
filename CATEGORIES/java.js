console.log("JavaScript code is running.");
// JavaScript to handle the modal dialog
var modal = document.getElementById('requestModal');
var closeModal = document.getElementById('closeModal');
var requestButton = document.getElementById('requestButton'); // Get the REQUEST button by ID

requestButton.onclick = function () {
  modal.style.display = 'block';
}

closeModal.onclick = function () {
  modal.style.display = 'none';
}

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
}

