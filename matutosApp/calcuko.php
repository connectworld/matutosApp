<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    Valor Unitario: <input type="text" name="valor_total" id="valor_unitario" />
    Valor Recebido <input type="text" name="valor_recebido" id="qnt" value="" />
    Total: <input type="text" name="total" id="total" readonly="readonly" />
  </form>

<script type="text/javascript">
function id(el) {
  return document.getElementById( el );
}
function total( un, qnt ) {
  return parseFloat(un.replace(',', '.'), 10) - parseFloat(qnt.replace(',', '.'), 10);
}
window.onload = function() {
  id('valor_unitario').addEventListener('keyup', function() {
    var result = total( this.value , id('qnt').value );
    id('total').value = String(result.toFixed(2)).formatMoney();
  });

  id('qnt').addEventListener('keyup', function(){
    var result = total( id('valor_unitario').value , this.value );
    id('total').value = String(result.toFixed(2)).formatMoney();
  });
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

