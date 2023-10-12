let btnSubmitPedido = document.getElementById("btn_submit_pedido");
let selectItem = document.getElementById("item");
let selectMesa = document.getElementById("nro_mesa");
let inputDescripcion = document.getElementById("descripcion");
let form = document.getElementById("form_alta");

btnSubmitPedido.addEventListener("click", (e) => {
    if (!Number(selectItem.value) || !Number(selectMesa.value)) {
        e.preventDefault();
        if (!Number(selectItem.value) && !Number(selectMesa.value)) {
            alert("Se debe seleccionar un Itém y una mesa");
            return;
        }
        if (!Number(selectItem.value) && Number(selectMesa.value)) {
            alert("Se debe seleccionar un Itém");
            return;
        }
        if (Number(selectItem.value) && !Number(selectMesa.value)) {
            alert("Se debe seleccionar una mesa");
            return;
        }
    }

});


