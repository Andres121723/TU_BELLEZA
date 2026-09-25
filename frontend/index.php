<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glow & Style - Salón de Belleza</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #121212; color: #fff; margin: 0; padding: 20px; }
        h1 { color: #e91e63; text-align: center; }
        .container { max-width: 1000px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
        .card { background: #1e1e1e; padding: 20px; border-radius: 10px; border: 1px solid #333; }
        button, input, select { width: 100%; padding: 10px; margin-top: 10px; border-radius: 5px; border: none; box-sizing: border-box; }
        button { background-color: #e91e63; color: white; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>
    <h1>✨ Salón de Belleza "Glow & Style" ✨</h1>
    <div class="container">
        <div class="card">
            <h2>Nuestros Servicios</h2>
            <div id="servicios-list">Cargando (Java)...</div>
        </div>
        <div class="card">
            <h2>Agendar Cita</h2>
            <form id="booking-form">
                <input type="text" id="nombre" placeholder="Nombre completo" required>
                <select id="servicio-select">
                    <option value="Corte y Peinado">Corte y Peinado</option>
                    <option value="Manicura Spa">Manicura Spa</option>
                </select>
                <input type="datetime-local" id="fecha" required>
                <button type="submit">Reservar Cita</button>
            </form>
            <p id="reserva-status"></p>
        </div>
        <div class="card">
            <h2>Registro VIP</h2>
            <form id="client-form">
                <input type="email" id="email-client" placeholder="Correo electrónico" required>
                <button type="submit">Unirse al Club VIP</button>
            </form>
            <p id="client-status"></p>
        </div>
        <div class="card">
            <h2>Promoción del Día</h2>
            <div id="promo-box">Cargando (Ruby)...</div>
        </div>
    </div>

    <script>
        // REEMPLAZAR ESTAS URLS CON LAS QUE TE DÉ RENDER
        const JAVA_URL = 'https://salon-java-api.onrender.com';
        const PYTHON_URL = 'https://salon-python-api.onrender.com';
        const CSHARP_URL = 'https://salon-csharp-api.onrender.com';
        const RUBY_URL = 'https://salon-ruby-api.onrender.com';

        document.addEventListener("DOMContentLoaded", () => {
            fetch(`${JAVA_URL}/api/servicios`)
                .then(res => res.json())
                .then(data => {
                    let html = '<ul>';
                    data.forEach(s => html += `<li><strong>${s.nombre}</strong> - $${s.precio}</li>`);
                    document.getElementById('servicios-list').innerHTML = html + '</ul>';
                }).catch(() => document.getElementById('servicios-list').innerText = 'Servicio Java offline');

            fetch(`${RUBY_URL}/api/promocion`)
                .then(res => res.json())
                .then(data => {
                    document.getElementById('promo-box').innerHTML = `<p>🎉 <strong>${data.titulo}</strong>: ${data.descuento}% OFF</p>`;
                }).catch(() => document.getElementById('promo-box').innerText = 'Servicio Ruby offline');
        });

        document.getElementById('booking-form').addEventListener('submit', (e) => {
            e.preventDefault();
            fetch(`${PYTHON_URL}/api/reservar`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    cliente: document.getElementById('nombre').value,
                    servicio: document.getElementById('servicio-select').value,
                    fecha: document.getElementById('fecha').value
                })
            }).then(res => res.json()).then(res => document.getElementById('reserva-status').innerText = res.mensaje);
        });

        document.getElementById('client-form').addEventListener('submit', (e) => {
            e.preventDefault();
            fetch(`${CSHARP_URL}/api/clientes`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ email: document.getElementById('email-client').value })
            }).then(res => res.json()).then(res => document.getElementById('client-status').innerText = res.mensaje);
        });
    </script>
</body>
</html>
