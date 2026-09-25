import os
from flask import Flask, request, jsonify
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

@app.route('/api/reservar', methods=['POST'])
def reservar():
    data = request.json or {}
    cliente = data.get('cliente', 'Cliente')
    servicio = data.get('servicio', 'Servicio')
    return jsonify({"status": "success", "mensaje": f"Cita confirmada para {cliente} - {servicio}"}), 200

if __name__ == '__main__':
    port = int(os.environ.get('PORT', 5000))
    app.run(host='0.0.0.0', port=port)
