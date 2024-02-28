function validarFormulario() {
    var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirmarPassword = document.getElementById('confirmarPassword').value;
  
    // Validar nombre y apellido
    if (nombre.length < 2 || apellido.length < 2) {
      alert('El nombre y el apellido deben tener al menos 2 caracteres.');
      return false;
    }
  
    // Validar formato de correo electrónico
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert('El correo electrónico debe tener un formato válido.');
      return false;
    }
  
    // Validar longitud de la contraseña
    if (password.length < 6) {
      alert('La contraseña debe tener al menos 6 caracteres.');
      return false;
    }
  
    // Validar coincidencia de contraseñas
    if (password !== confirmarPassword) {
      alert('La confirmación de contraseña debe coincidir con la contraseña ingresada.');
      return false;
    }
  
    // Si todos los campos son válidos, enviar el formulario mediante fetch
    enviarFormulario(nombre, apellido, email, password);
  
  }

  function enviarFormulario(nombre, apellido, email, password) {
    var url = 'http://localhost/m06/procesar.php';
  
    var datos = {
      nombre: nombre,
      apellido: apellido,
      email: email,
      sexo: sexo,
      password: password
    };
  
    var configuracionFetch = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(datos)
    };
  
    console.log('Enviando solicitud fetch al servidor...');
  
    fetch(url, configuracionFetch)
      .then(response => {
        console.log('Respuesta del servidor recibida.');
        if (!response.ok) {
          throw new Error('Error en la solicitud fetch');
        }
        return response.json();
      })
      .then(data => {
        console.log('Datos recibidos del servidor:', data);
  
        if (data.exito) {
          console.log('Registro exitoso. Redirigiendo a registro_exitoso.php...');
          window.location.href = 'http://registro_exitoso.php'; 
        } else {
          console.log('Error en el registro. Mostrando alerta...');
          alert('Error en el registro. Por favor, inténtalo de nuevo.');
        }
      })
      .catch(function(error) {
        console.error('Error al enviar el formulario:', error);
      });
  }