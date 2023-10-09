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

  let pedidoInfo = {                      // guardo la info seleccionada para pasarla a pedidos
        item: selectItem.options[selectItem.selectedIndex].text,
        mesa: selectMesa.options[selectMesa.selectedIndex].text,
        descripcion: inputDescripcion.value || "Ninguna"
    };

    localStorage.setItem("pedidoInfo", JSON.stringify(pedidoInfo)); // convierto el pedidos info en una cadena
    // window.location.href = "pedidosrealizados.html"; // redirijo al usuario a pedidos
});

// form.addEventListener("submit", () => {
//     selectItem.value = "0";
//     selectMesa.selectedIndex = "0";
//     inputDescripcion.value = "";
// });
