
var url_str = document.URL;

let url = new URL(url_str);

let id = url.search;

const idFinal = id.replace(/\D/g, "");

if (idFinal > 0) {
  const texto = document.getElementById("tituloMain");

  tituloMain.textContent = "Atualizar Cadastro";
  texto.style.color = 'lightblue';
}
