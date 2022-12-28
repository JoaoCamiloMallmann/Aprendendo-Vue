class Datahelper {
  dataParaTexto(datas) {
    console.log(datas);
    return (
      datas.data.getDate() +
      "/" +
      (datas.data.getMonth() + 1) +
      "/" +
      datas.data.getFullYear()
    );
  }

  textoParaData(texto) {
    console.log(texto);
    return new Date(
      ...texto.split("-").map((item, indice) => item - (indice % 2))
    );
  }
}
