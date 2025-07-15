document.addEventListener('DOMContentLoaded', () => {
    const tecnicaSelect = document.getElementById('tecnica_id');
    const coleccionSelect = document.getElementById('coleccion_id');
    const rangoPrecioSelect = document.getElementById('precio_rango');
    const cards = document.querySelectorAll('[data-tecnica]');

    function filtrarGaleria() {
        const tecnicaSelecionada = tecnicaSelect.value;
        const coleccionSelecionada = coleccionSelect.value;
        const rangoPrecio = rangoPrecioSelect.value;

        let obrasArray = Array.from(cards);

        obrasArray.forEach(card => {
            const tecnicasObra = card.dataset.tecnica.split(',');
            const coleccionObra = card.dataset.coleccion;
            const precioObra = parseFloat(card.dataset.precio);

            let mostrar = true;

            if (tecnicaSelecionada && !tecnicasObra.includes(tecnicaSelecionada)) {
                mostrar = false;
            }

            if (coleccionSelecionada && coleccionSelecionada !== coleccionObra) {
                mostrar = false;
            }

            if (rangoPrecio) {
                const [min, max] = rangoPrecio.split('-').map(Number);
                if (precioObra < min || precioObra > max) {
                    mostrar = false;
                }
            }

            card.style.display = mostrar ? '' : 'none';
        });
    }

    // Agregar eventos a los select para filtrar la galería
    [tecnicaSelect, coleccionSelect, rangoPrecioSelect].forEach(select => {
        select.addEventListener('change', filtrarGaleria);
    });
    
    // Inicializar la galería al cargar la página
    filtrarGaleria();
});
