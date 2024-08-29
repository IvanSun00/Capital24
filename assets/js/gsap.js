function animateFrom(elem, direction) {
  direction = direction || 1;
  var x = 0,
    y = direction * 100;
  if (elem.classList.contains("gs_reveal_fromLeft")) {
    x = -200;
    y = 0;
  } else if (elem.classList.contains("gs_reveal_fromRight")) {
    x = 200;
    y = 0;
  } else if (elem.classList.contains("gs_reveal_fromBottom")) {
    x = 0;
    y = 50;
  } else if (elem.classList.contains("gs_reveal_fromTop")) {
    x = 0;
    y = -100;
  } else if (elem.classList.contains("gs_reveal_fromBottomFar")) {
    x = 0;
    y = 200;
  }

  elem.style.transform = "translate(" + x + "px, " + y + "px)";
  elem.style.opacity = "50";
  gsap.fromTo(
    elem,
    {
      x: x,
      y: y,
      autoAlpha: 0,
    },
    {
      duration: 3.0,
      x: 0,
      y: 0,
      autoAlpha: 1,
      ease: "expo",
      overwrite: "auto",
    }
  );
}

function hide(elem) {
  gsap.set(elem, {
    autoAlpha: 0,
  });
}

document.addEventListener("DOMContentLoaded", function () {
  gsap.registerPlugin(ScrollTrigger);

  var timeline = gsap.timeline({ delay: 3 });

  timeline.from("#judul-capital", {
    opacity: 0,
    y: -200,
    duration: 1.5,
    ease: "expo",
  });

  timeline.from(
    "#judul-2024",
    {
      opacity: 0,
      y: 200,
      duration: 1.5,
      ease: "expo",
    },
    0
  );

  gsap.utils.toArray(".gs_reveal").forEach(function (elem) {
    hide(elem);

    ScrollTrigger.create({
      trigger: elem,
      onEnter: function () {
        animateFrom(elem);
      },
      onEnterBack: function () {
        animateFrom(elem, -1);
      },
      onLeave: function () {
        hide(elem);
      },
    });
  });
});

// Update animation kalau beda device
function handleResize() {
  var element1 = document.getElementById("judul-capital");
  var element2 = document.getElementById("judul-2024");
  var element3 = document.getElementById("timeline-container");
  var element4 = document.getElementById("judul-modul");
  var element5 = document.getElementById("judul-prize");
  var element6 = document.getElementById("judul-timeline");
  var screenWidth = window.innerWidth;

  if (screenWidth < 1024) {
    element1.classList.remove("gs_reveal_fromRight");
    element1.classList.add("gs_reveal_fromTop");
    element2.classList.remove("gs_reveal_fromLeft");
    element2.classList.add("gs_reveal_fromTop");
    element3.classList.remove("gs_reveal_fromLeft");
    element3.classList.add("gs_reveal_fromTop");
    element4.classList.remove("gs_reveal_fromRight");
    element4.classList.add("gs_reveal_fromBottomFar");
    element5.classList.remove("gs_reveal_fromLeft");
    element5.classList.add("gs_reveal_fromBottom");
    element6.classList.remove("gs_reveal_fromRight");
    element6.classList.add("gs_reveal_fromTop");
  } else {
    element1.classList.remove("gs_reveal_fromTop");
    element1.classList.add("gs_reveal_fromRight");
    element2.classList.remove("gs_reveal_fromTop");
    element2.classList.add("gs_reveal_fromLeft");
    element3.classList.remove("gs_reveal_fromTop");
    element3.classList.add("gs_reveal_fromLeft");
    element4.classList.remove("gs_reveal_fromBottomFar");
    element4.classList.add("gs_reveal_fromRight");
    element5.classList.remove("gs_reveal_fromBottom");
    element5.classList.add("gs_reveal_fromLeft");
    element6.classList.remove("gs_reveal_fromTop");
    element6.classList.add("gs_reveal_fromRight");
  }
}

handleResize();

window.addEventListener("resize", handleResize);
