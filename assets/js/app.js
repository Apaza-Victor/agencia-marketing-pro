// assets/js/app.js

// 1. FUNCIÓN PARA PROCESAR EL PAGO (Conectada a comprar.php)
async function procesarPago(productoId, nombreProducto) {
    const email = prompt(`Para adquirir "${nombreProducto}", ingresa tu correo electrónico:`);
    
    if (!email) return; 

    try {
        const respuesta = await fetch('comprar.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: productoId,
                nombre: "Cliente Web", 
                email: email
            })
        });

        // Verificamos si la respuesta es válida antes de convertir a JSON
        if (!respuesta.ok) throw new Error('Error en el servidor');
        
        const resultado = await respuesta.json();

        if (resultado.success) {
            alert("✨ " + resultado.message);
        } else {
            alert("Error: " + resultado.message);
        }

    } catch (error) {
        console.error("Error en la petición:", error);
        alert("Hubo un problema con la conexión al servidor. Asegúrate de que Apache esté encendido.");
    }
}

// 2. ANIMACIONES DE SCROLL (Intersection Observer)
// Solo declaramos el observer UNA VEZ
const observerOptions = {
    threshold: 0.1
};

const myObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
        }
    });
}, observerOptions);

// Aplicamos el observer a todos los elementos con clase .reveal
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.reveal').forEach(el => myObserver.observe(el));
});