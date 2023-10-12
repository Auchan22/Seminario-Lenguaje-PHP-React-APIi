// Selecciona los elementos de entrada y el botón
let campo1 = document.getElementById('titulo');
let campo2 = document.getElementById('tipo');
let campo3 = document.getElementById('orden');
let btn = document.getElementById('filter_btn');

// Agrega un evento de escucha a los campos de entrada
campo1.addEventListener('input', validarCampos);
campo2.addEventListener('input', validarCampos);
campo3.addEventListener('input', validarCampos);

function validarCampos() {
    console.log(campo1.value, campo2.value, campo3.value);
    if (campo1.value !== '' && campo2.value !== '' && campo3.value !== '') {
        // Habilita el botón si los tres campos están completos
        btn.disabled = false;
    } else {
        // Deshabilita el botón si al menos un campo está vacío
        btn.disabled = true;
    }
}