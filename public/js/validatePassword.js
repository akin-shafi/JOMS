// pass validate start
$("#confirmpsw").append("<span id='signal'></span>");
// $("#psw").before("");
var myInput = document.getElementById("psw") || "";
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var symbol = document.getElementById("symbol");
var length = document.getElementById("length");
var indicator = document.getElementById('indicator')

function strong() {
    indicator.style.backgroundColor = "yellowgreen";
    indicator.style.color = "white";
    indicator.innerHTML = "strong";
  }

function vstrong() {
  indicator.style.backgroundColor = "green";
  indicator.style.color = "white";
  indicator.innerHTML = "Very strong";
}
function fair() {
  indicator.style.backgroundColor = "yellow";
  indicator.innerHTML = "fair";
  indicator.style.color = "black";
}
function weak() {
  indicator.style.backgroundColor = "red";
  indicator.innerHTML = "weak";
}

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
  // console.log(this)
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  indicator.style.display = "block";
  if(myInput.value == ""){
    indicator.style.display = "none";
  }

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
    
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");

  }

  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
    weak()
    
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");

  }
  
   // Validate symbol
  var symboltype = /[^A-Za-z0-9\s]/g;
  if(myInput.value.match(symboltype)) {  
    symbol.classList.remove("invalid");
    symbol.classList.add("valid");
    fair();
  } else {
    symbol.classList.remove("valid");
    symbol.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
    
    strong()
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
    // document.getElementById("message").style.display = "none";
    vstrong()
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");

  }

  // var password = document.getElementById("password")
  var confirm_password = document.getElementById("confirmpsw");
  var signal = document.getElementById("signal");

  confirm_password.onkeyup = function() {
    validateconfirmPassword()
  }


  function validateconfirmPassword(){
    if(myInput.value != confirm_password.value) {
    //   confirm_password.setCustomValidity("Passwords Don't Match");
      signal.innerHTML = "Password Does Not Match";
      signal.style.color = "#ff0000"
    } else {
    // confirm_password.setCustomValidity('');
    signal.innerHTML = "Password Match";
    signal.style.color = "green"
  }

  if(confirm_password.value == ""){
      signal.innerHTML = "";
    }

  }
 
}

// Password validate end

$("[data-toggle=popover]").popover({
  html : true,
  // trigger: 'focus',
   content: function() {
        var content = $(this).attr("data-popover-content");
        return $(content).children(".popover-body").html();
    }
});
