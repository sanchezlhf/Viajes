class PaqueteTuristico {
  constructor(id, destino, fecha, hotel, vuelo, precio, oferta) {
    this.id = id;
    this.destino = destino;
    this.fecha = fecha;
    this.hotel = hotel;
    this.vuelo = vuelo;
    this.precio = precio;
    this.oferta = oferta;
  }

  obtenerHTML() {
    return `
      <div class="resultado">
        <h3>${this.destino}</h3>
        <p>Fecha: ${this.fecha}</p>
        <p>Hotel: ${this.hotel}</p>
        <p>Vuelo: ${this.vuelo}</p>
        <p>Precio: $${this.precio}</p>
        ${this.oferta ? "<p class='oferta'>¡Oferta especial disponible!</p>" : ""}
        <form method="POST" action="carritodecompras.php">
          <input type="hidden" name="paquete_id" value="${this.id}">
          <button type="submit">Agregar al carrito</button>
        </form>
      </div>
    `;
  }

  coincideConFiltro(destinoBuscado, fechaBuscada) {
    return (
      this.destino.toLowerCase().includes(destinoBuscado.toLowerCase()) &&
      this.fecha === fechaBuscada
    );
  }
}

const destinos = [
  new PaqueteTuristico(1, "Argentina", "2025-06-20", "Hotel AR", "Vuelo 1", 150000, false),
  new PaqueteTuristico(2, "Argentina", "2025-06-20", "Hotel AR 2", "Vuelo 10", 130000, true),
  new PaqueteTuristico(3, "Estados Unidos", "2025-06-15", "Hotel EU", "Vuelo 2", 300000, false),
  new PaqueteTuristico(4, "Japón", "2025-06-22", "Hotel JP", "Vuelo 3", 450000, true),
  new PaqueteTuristico(5, "Brasil", "2025-06-21", "Hotel BR", "Vuelo 4", 100000, false)
];

function search() {
  const destinoInput = document.getElementById("destination").value.trim();
  const fechaInput = document.getElementById("travel-date").value;

  const resultados = destinos.filter(p => p.coincideConFiltro(destinoInput, fechaInput));
  mostrarResultados(resultados);
}

function mostrarResultados(resultados) {
  const container = document.getElementById("results-container");
  container.innerHTML = "";

  if (resultados.length === 0) {
    container.innerHTML = "<p>No se encuentran resultados.</p>";
    return;
  }

  resultados.forEach(p => {
    container.innerHTML += p.obtenerHTML();
  });
}

function mostrarNotificacion(mensaje) {
  let contenedor = document.getElementById('notificaciones');
  if (!contenedor) {
    contenedor = document.createElement('div');
    contenedor.id = 'notificaciones';
    document.body.appendChild(contenedor);
  }

  const notificacion = document.createElement('div');
  notificacion.className = 'notificacion';
  notificacion.textContent = mensaje;
  contenedor.appendChild(notificacion);

  // Desaparece después de 5 segundos
  setTimeout(() => {
    notificacion.remove();
  }, 5000);
}
