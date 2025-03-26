function confirmaEliminarCuenta() {
  if (confirm("¿Está seguro de que desea eliminar esta cuenta?")) {
    document.getElementById('formEliminarCuenta').submit();
  }
  return false;
}

function confirmaEliminarUsuario() {
  if(confirm('¿Estás seguro de que quieres eliminar tu cuenta permanentemente? Esta acción no se puede deshacer.')) {
      document.getElementById('formEliminarUsuario').submit();
  }
}

function decimales() {
  return Number.parseFloat().toFixed(2);
}

function cambiarTipoMovimiento(tipo) {
  // Redirigir a la misma página con el nuevo tipo
  window.location.href = `registrar_movimiento.php?tipo=${tipo}`;
}