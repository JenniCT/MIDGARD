function mostrarVistaPrevia(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('imagenPrevia').setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
