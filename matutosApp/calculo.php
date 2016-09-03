<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    Valor Unitário: <input type="text" name="valor_total" id="valor_total" />
    Valor Pago: <input type="text" name="valor_recebido" id="valor_recebido" />
    Desconto: <input type="text" name="desconto" value="0" id="desconto" onchange="troca(this.value)"/>
    Troco: <input type="text" name="total" id="total" readonly="readonly" />
  </form>

<script type="text/javascript">


function troca (valor){
    var valorTotal = document.getElementById("valor_total").value;
    var valorTotalConvertido = parseFloat(valorTotal);
    var valorRecebido = document.getElementById("valor_recebido").value;
    var valorRecebidoConvertido = parseFloat(valorRecebido);
    var porcentagem = document.getElementById("desconto").value;
    var descontoConvertido = parseFloat(porcentagem);
    
    var soma = (valorRecebidoConvertido * (descontoConvertido / 100));
    var somaFinal = valorTotalConvertido - soma;
    var resultado = valorRecebidoConvertido - somaFinal;
    
    document.getElementById("total").value = resultado;
    
} 

String.prototype.formatMoney = function() {
  var v = this;

  if(v.indexOf('.') === -1) {
    v = v.replace(/([\d]+)/, "$1,00");
  }

  v = v.replace(/([\d]+)\.([\d]{1})$/, "$1,$20");
  v = v.replace(/([\d]+)\.([\d]{2})$/, "$1,$2");
  v = v.replace(/([\d]+)([\d]{3}),([\d]{2})$/, "$1.$2,$3");

  return v;
};
</script>

</body>
</html>

