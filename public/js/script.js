function deleteAseguradora(event) {
    event.preventDefault();
    const id = document.getElementById('deleteId').value;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php?controller=aseguradora&action=delete', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('id=' + id);
    xhr.onload = function () {
        if (xhr.status == 200) {
            const card = document.querySelector(`.card[data-id='${id}']`);
            if (card) card.remove();
            alert('Aseguradora eliminada');
            document.getElementById('modal').style.display = "none"; // Corrección
        } else {
            alert('Error al eliminar la aseguradora');
        }
    };
}

function deleteAsegurado(event) {
    event.preventDefault();
    const id = document.getElementById('deleteId').value;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php?controller=asegurado&action=delete', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('id=' + id);
    xhr.onload = function () {
        if (xhr.status == 200) {
            const card = document.querySelector(`.cardAsegurado[data-id='${id}']`);
            if (card) card.remove();
            alert('Asegurado eliminada');
            document.getElementById('modal').style.display = "none"; // Corrección
        } else {
            alert('Error al eliminar la aseguradora');
        }
    };
}

function deleteReparacion(event) {
    event.preventDefault();
    const id = document.getElementById('deleteId').value;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php?controller=reparacion&action=delete', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('id=' + id);
    xhr.onload = function () {
        if (xhr.status == 200) {
            const card = document.querySelector(`.cardReparacion[data-id='${id}']`);
            if (card) card.remove();
            alert('Reparación eliminada');
            document.getElementById('modal').style.display = "none"; // Corrección
        } else {
            alert('Error al eliminar la reparación');
        }
    };
}

document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM completamente cargado");

    const modal = document.getElementById("modal");
    const closeBtn = document.getElementById("closeBtn");

    const searchInput = document.getElementById("searchInput");
    const searchInputAsegurado = document.getElementById("searchInputAsegurado");
    const searchInputReparacion = document.getElementById("searchInputReparacion");
    const filterSelectReparacion = document.getElementById("filterSelectReparacion");
    const filterSelect = document.getElementById("filterSelect");
    const filterSelectAsegurado = document.getElementById("filterSelectAsegurado");
    const cards = document.querySelectorAll(".card");
    const cardAsegurado = document.querySelectorAll(".cardAsegurado");
    const cardReparacion = document.querySelectorAll(".cardReparacion");
    //filtramos aseguradoras
    if (searchInput && filterSelect) {
        searchInput.addEventListener("keyup", function () {
            const searchText = searchInput.value.toLowerCase();
            const filterIndex = filterSelect.value;
            cards.forEach(card => {
                const fieldValue = card.children[filterIndex].textContent.toLowerCase();
                card.style.display = fieldValue.includes(searchText) ? "flex" : "none";
            });
        });
    }
    //filtramos asegurados
    if (searchInputAsegurado && filterSelectAsegurado) {
        searchInputAsegurado.addEventListener("keyup", function () {
            const searchText = searchInputAsegurado.value.toLowerCase();
            const filterIndex = filterSelectAsegurado.value;
            cardAsegurado.forEach(card => {
                const fieldValue = card.children[filterIndex].textContent.toLowerCase();
                card.style.display = fieldValue.includes(searchText) ? "flex" : "none"; // Corrección
            });
        });
    }
    //filtramos reparaciones
    if (searchInputReparacion && filterSelectReparacion) {
        searchInputReparacion.addEventListener("keyup", function () {
            const searchText = searchInputReparacion.value.toLowerCase();
            const filterIndex = filterSelectReparacion.value;
            cardReparacion.forEach(card => {
                const fieldValue = card.children[filterIndex].textContent.toLowerCase();
                card.style.display = fieldValue.includes(searchText) ? "flex" : "none"; // Corrección
            });
        });
    }



    document.querySelectorAll(".card").forEach(card => {
        card.addEventListener("click", function () {
            console.log("Se hizo clic en una aseguradora");
            const fields = card.children;
            document.getElementById("modalId").value = card.getAttribute("data-id");
            document.getElementById("deleteId").value = card.getAttribute("data-id");
            document.getElementById("modalNombre").value = fields[0].textContent;
            document.getElementById("modalDomicilio").value = fields[1].textContent;
            document.getElementById("modalCIF").value = fields[2].textContent;
            document.getElementById("modalTelefono").value = fields[3].textContent;
            document.getElementById("modalEmail").value = fields[4].textContent;
            document.getElementById("modalContacto").value = fields[5].textContent;
            modal.style.display = "flex";
        });
    });

    document.querySelectorAll(".cardAsegurado").forEach(card => {
        card.addEventListener("click", function () {
            console.log("click en formulario de asegurado");
            const fields = card.children;
            document.getElementById("modalId").value = card.getAttribute("data-id");
            document.getElementById("deleteId").value = card.getAttribute("data-id");
            document.getElementById("modalNombre").value = fields[0].textContent;
            document.getElementById("modalDireccion").value = fields[1].textContent;
            document.getElementById("modalTelefono").value = fields[2].textContent;
            document.getElementById("modalDomicilio_reparacion").value = fields[3].textContent;
            modal.style.display = "flex";
        });
    });

    document.querySelectorAll(".cardReparacion").forEach(card => {
        card.addEventListener("click", function () {
            console.log("click en formulario de reparacion");
            const fields = card.children;
    
            const id = card.getAttribute("data-id");
            document.getElementById("modalId").value = id;
            document.getElementById("deleteId").value = id;
    
            const idAseguradora = card.getAttribute("data-id-aseguradora");
            const idAsegurado = card.getAttribute("data-id-asegurado");
            const idEstado = card.getAttribute("data-id-estado");
    
            const selectAseguradora = document.getElementById("id_aseguradora");
            const selectAsegurado = document.getElementById("id_asegurado");
            const selectEstado = document.getElementById("id_estado");
    
            // Depuración de valores extraídos
            console.log("ID Aseguradora:", idAseguradora);
            console.log("ID Asegurado:", idAsegurado);
            console.log("ID Estado:", idEstado);
    
            // Depuración de opciones disponibles
            console.log("Opciones de Aseguradora:", Array.from(selectAseguradora.options).map(opt => opt.value));
            console.log("Opciones de Asegurado:", Array.from(selectAsegurado.options).map(opt => opt.value));
            console.log("Opciones de Estado:", Array.from(selectEstado.options).map(opt => opt.value));
    
            // Asignar valores a los <select> y validar
            if (idAseguradora && selectAseguradora.querySelector(`option[value="${idAseguradora}"]`)) {
                selectAseguradora.value = idAseguradora;
            } else {
                console.warn("Aseguradora ID no encontrado en las opciones:", idAseguradora);
                selectAseguradora.value = "";
            }
    
            if (idAsegurado && selectAsegurado.querySelector(`option[value="${idAsegurado}"]`)) {
                selectAsegurado.value = idAsegurado;
            } else {
                console.warn("Asegurado ID no encontrado en las opciones:", idAsegurado);
                selectAsegurado.value = "";
            }
    
            if (idEstado && selectEstado.querySelector(`option[value="${idEstado}"]`)) {
                selectEstado.value = idEstado;
            } else {
                console.warn("Estado ID no encontrado en las opciones:", idEstado);
                selectEstado.value = "";
            }
    
            document.getElementById("modalFecha").value = fields[2].textContent.trim();
            document.getElementById("modalDescripcion").value = fields[4].textContent.trim();
    
            const imgSpan = fields[5];
            const currentImage = document.getElementById("currentImage");
            if (imgSpan && imgSpan.querySelector("img")) {
                const imgSrc = imgSpan.querySelector("img").src;
                currentImage.src = imgSrc;
                currentImage.style.display = "block";
            } else {
                currentImage.src = "";
                currentImage.style.display = "none";
            }
    
            modal.style.display = "flex";
        });
    });

    if (closeBtn) {
        closeBtn.addEventListener("click", function () {
            modal.style.display = "none";
        });
    }
});