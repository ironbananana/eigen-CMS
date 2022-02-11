function passwordFunction() {
  //function for password show/hide icon
  var x = document.getElementsByClassName("myInput");
  for (let index = 0; index < x.length; index++) {
    const element = x[index];
    if (element.type === "password") {
      element.type = "text";
     document.getElementById("show").className = "fas fa-eye-slash";
    } else {
      element.type = "password";
      document.getElementById("show").className = "fas fa-eye";
    }
  }
}

function hamburgerFunction() {
  // function for the hamburger menu
  var x = document.getElementById("navbar_links");
  var y = document.getElementsByClassName("topnav")[0];
  if (x.style.display === "block") {
    x.style.display = "none";
    y.style.height = "60%";
  } else {
    x.style.display = "block";
    y.style.height = "100%";
  }
}

function toggleAlert() {
  $('.autoClose').hide('slow');
}

setTimeout(toggleAlert, 8000);