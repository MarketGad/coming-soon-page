var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function () {
    modal.style.display = "block";
}

span.onclick = function () {
    modal.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

const submitbtn = document.getElementById("submit");
submitbtn.onclick = function() {
     const form = document.getElementById("submit-form");
     form.submit();
     form.reset();
     return false;
 }