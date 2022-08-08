$(function criarTabela() {
  $.ajax({
    url: "listar.php",
    success: function (result) {
      $(".result").html(result);
    },
    error: function () {
      $(".result").html("erro");
    },
  });
});

