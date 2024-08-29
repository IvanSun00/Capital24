$("body").css({
  "overflow-y": "hidden",
});
setTimeout(function () {
  $(".loader-container").fadeOut("slow", function () {
    $("body").css({
      "overflow-y": "auto",
    });
  });
}, 3000);
