<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>inicio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>

    <style>
      header {
        background-color: rgba(255, 221, 0, 0.91);
        color: black;
        text-align: left;
        width: 100%;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        transition: background-color 0.3s, color 0.3s;
      }

      body {
        background-color: white;
        color: black;
        transition: background-color 0.3s, color 0.3s;
      }

      nav {
        text-align: right;
        color: black;
      }

      h3 {
        text-align: center;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      }

      .presentacion {
        background: beige;
        padding: 20px;
        box-sizing: border-box;
        transition: background-color 0.3s, color 0.3s;
      }

      .presentacion2, .presentacion3 {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
      }

      .logo {
        width: 300px;
        height: auto;
      }

      .descripcion {
        font-size: 18px;
        font-weight: bold;
        line-height: 1.3;
        flex: 1 1 auto;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        color: black;
        max-width: 800px;
        transition: color 0.3s;
      }

      button {
        background-color: rgba(255, 221, 0, 0.91);
        color: black;
        margin-bottom: 20px;
        border: none;
        border-radius: 10px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
      }

      .button2 {
        background-color: beige;
        color: black;
        border: none;
        border-radius: 30px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        margin: 50 auto;
      }

      .dark body {
        background-color: #151e31ff; 
        color: white;
      }

      .dark header {
        background-color: #1f2937; 
        color: white;
      }

      .dark .presentacion {
        background-color: #374151; 
        color: white;
      }

      .dark .descripcion {
        color: #e5e7eb;
      }

      .dark button {
        background-color: #4b5563;
        color: white;
      }

      /* Botón flotante redondo */
#chat-boton {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: rgba(255, 221, 0, 0.91);
    color: white;
    border: none;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    font-size: 28px;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    z-index: 1000;
}
/* Contenedor del chat oculto inicialmente */
#chat-container {
    position: fixed;
    bottom: 90px;
    right: 20px;
    width: 350px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    display: none;
    flex-direction: column;
    z-index: 999;
}

/* Estilos originales */
body {
    font-family: Arial, sans-serif;
}
#chat-box {
    padding: 10px;
    height: 400px;
    overflow-y: auto;
}
.message {
    margin: 5px 0;
    padding: 8px 12px;
    border-radius: 15px;
    max-width: 80%;
}
.user {
    background: rgba(255, 221, 0, 0.91);
    color: white;
    align-self: flex-end;
}
.bot {
    background: #e6e6e6;
    color: black;
    align-self: flex-start;
}
#input-area {
    display: flex;
    border-top: 1px solid #ddd;
}
#mensaje {
    flex: 1;
    border: none;
    padding: 10px;
    font-size: 14px;
}
#enviar {
    background:rgba(255, 221, 0, 0.91);
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
}

    </style>
</head>

<body>
  <header>
    <h1>GoOrder</h1>
    <h3>Un pedido, mil posibilidades</h3>
    <a href="{{ url('login') }}" class="button2">Iniciar sesión</a>
    <div class="text-center">
      <button id="toggleTheme" class="button2">
       ☾ modo oscuro
      </button>
    </div>
  </header><br><br>

  <div class="presentacion">
    <div class="presentacion2">
      <img src="{{ asset('imagen/logo.png') }}" alt="Mi Logo" class="logo">
      <h4 class="descripcion">
        GoOrder es una empresa innovadora dedicada a hacer que tus compras y pedidos sean más rápidos, seguros y accesibles.
      </h4>
    </div>
  </div><br><br>

  <div class="presentacion">
    <div class="presentacion2">
      <img src="{{ asset('imagen/camion.png') }}" alt="Mi Logo" class="logo">
      <a class="button" href="{{ route('pedidos') }}">{{ __('realizar pedido') }}</a>
      <h4 class="descripcion">
        Realiza tu pedido de manera rápida, segura y sin complicaciones. ¡Haz clic ya!
      </h4>
    </div>
  </div><br><br>

  <div class="presentacion">
    <div class="presentacion3">
      <img src="{{ asset('imagen/notas.png') }}" alt="Mi Logo" class="logo">
      <a class="button" href="{{ route('register') }}">{{ __('registrar') }}</a>
      <h4 class="descripcion">Haz parte de nuestra comunidad.</h4>
    </div>   
  </div>
  <!-- Botón flotante -->
<button id="chat-boton">💬</button>

<!-- Contenedor del chat -->
<div id="chat-container">
    <div id="chat-box"></div>
    <div id="input-area">
        <input type="text" id="mensaje" placeholder="Escribe tu mensaje...">
        <button id="enviar">Enviar</button>
    </div>
</div>

  <script>
  document.getElementById('toggleTheme').addEventListener('click', function () {
    document.documentElement.classList.toggle('dark');
  });

  document.getElementById("enviar").addEventListener("click", enviarMensaje);
document.getElementById("mensaje").addEventListener("keypress", function(e) {
    if (e.key === "Enter") enviarMensaje();
});

function enviarMensaje() {
    let mensaje = document.getElementById("mensaje").value.trim();
    if (mensaje === "") return;

    agregarMensaje(mensaje, "user");
    document.getElementById("mensaje").value = "";

    let formData = new FormData();
    formData.append("mensaje", mensaje);

    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/pedidos/${formData.get('mensaje')}/chat`, {
        method: "POST",
        headers: {
        'X-CSRF-TOKEN': token
    },
        body: formData
    })
    .then(res => res.json())
    .then(respuesta => {
      if (Array.isArray(respuesta)) {
            respuesta.forEach(pedido => {
                agregarMensaje(`Pedido #${pedido.id} - Dirección: ${pedido.direccion}`, "bot");
            });
        } else {
            // Por si el backend a veces responde con un solo objeto
            agregarMensaje(respuesta, "bot");
        }

       
    })
    .catch(err => {
        agregarMensaje("Error de conexión", "bot");
    });
}

function agregarMensaje(texto, tipo) {
    let chatBox = document.getElementById("chat-box");
    let mensajeDiv = document.createElement("div");
    mensajeDiv.classList.add("message", tipo);
    mensajeDiv.innerText = texto;
    chatBox.appendChild(mensajeDiv);
    chatBox.scrollTop = chatBox.scrollHeight;
}

// Mostrar/ocultar chat
document.getElementById("chat-boton").addEventListener("click", function() {
    let chat = document.getElementById("chat-container");
    chat.style.display = chat.style.display === "flex" ? "none" : "flex";
});

</script>

</body>
</html>
