/* FUNZIONI DA RIVALUTARE E CORREGGERE
function togglerPasswordShowHide() {
    var x = document.getElementById("password");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (pw.type === "password") {
      pw.type = "text";
      show_eye.style.display = "none";
      hide_eye.style.display = "block";
    } else {
      pw.type = "password";
      show_eye.style.display = "block";
      hide_eye.style.display = "none";
    }
  }
*/