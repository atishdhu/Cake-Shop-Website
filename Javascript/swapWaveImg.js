let waveImg = document.getElementsByClassName("wavy");

function myFunction(x) {
    if (x.matches) { // If media query matches
        waveImg.src = "Assets/images/1.index/NavBar_WavePink1000.png";
    } else {
        waveImg.src = "Assets/images/1.index/NavBar_WavePink.png";
    }
  }
  
  var x = window.matchMedia("(min-width: 1200px)")
  myFunction(x) // Call listener function at run time
  x.addEventListener(myFunction) // Attach listener function on state changes