var btn2 = document.querySelector(".btnclick");
btn2.onclick = function () {
  var id = document.querySelectorAll("#deletar");

  id.forEach((element) => {
    element.classList.toggle("visible");
  });
};
