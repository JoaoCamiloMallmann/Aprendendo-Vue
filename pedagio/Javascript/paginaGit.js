document.getElementById("voltar").onclick = function () {
  location.href = "index.php";
};

function buscar() {
  var nome = document.getElementById("nome").value;

  var url = window.location.pathname;
  url += "?nome=" + nome;
  window.location.href = url;
}
