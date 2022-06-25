function ongkir() {
   var inputPrice = parseInt(document.getElementById('jml_beli').value);
   var inputOngkir = parseInt(document.getElementById('jml_ongkir').value);
   var total = inputPrice + inputOngkir;
   document.getElementById('total').value = `Rp${total}`;
}