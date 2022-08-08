//var alert = <?php echo $_GET["alert"] ?>;
var url_str = document.URL;
let url = new URL(url_str);
let id = url.search;
let alert = id.replace(/\D/g, "");

var element = document.querySelector(".alert");
var texto = element.querySelector(".texto");

if (alert == 1) {
  element.classList.add("alert-success");
} else if (alert == 2) {
  element.classList.add("alert-warning");
  texto.textContent = " Dados Atualizado";
} else if (alert == 3) {
  element.classList.add("alert-danger");
  texto.textContent = "Removido";
} else {
  element.classList.add("visible");
}
setTimeout(() => {
  element.classList.add("visible");
}, 1500);
