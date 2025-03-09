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

document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM completamente cargado");

    const searchInput = document.getElementById("searchInput");
    const searchInputAsegurado = document.getElementById("searchInputAsegurado");
    const filterSelect = document.getElementById("filterSelect");
    const filterSelectAsegurado = document.getElementById("filterSelectAsegurado");
    const cards = document.querySelectorAll(".card");
    const cardAsegurado = document.querySelectorAll(".cardAsegurado");

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

    const modal = document.getElementById("modal");
    const closeBtn = document.getElementById("closeBtn");

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
            console.log("Intentando mostrar modal");
            modal.style.display = "flex";
        });
    });

    document.querySelectorAll(".cardAsegurado").forEach(card => {
        card.addEventListener("click", function () {
            const fields = card.children;
            document.getElementById("modalId").value = card.getAttribute("data-id");
            document.getElementById("deleteId").value = card.getAttribute("data-id");
            console.log("click en formulario de asegurado");
            document.getElementById("modalNombre").value = fields[0].textContent;
            document.getElementById("modalDireccion").value = fields[1].textContent;
            document.getElementById("modalTelefono").value = fields[2].textContent;
            document.getElementById("modalDomicilio_reparacion").value = fields[3].textContent;
            modal.style.display = "flex";
        });
    });

    if (closeBtn) {
        closeBtn.addEventListener("click", function () {
            modal.style.display = "none";
        });
    }
});