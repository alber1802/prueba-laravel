<style>

        /* Estilos para Mensajes de Sesión */

    .message-box {
        padding: 1rem 1.5rem; /* Relleno interno */
        margin-bottom: 1.5rem; /* Margen inferior para separar de otros elementos */
        border-radius: 0.5rem; /* Bordes redondeados */
        font-size: 1rem; /* Tamaño de fuente */
        line-height: 1.5; /* Altura de línea */
        font-weight: 500; /* Grosor de fuente semi-negro */
        word-wrap: break-word; /* Rompe palabras largas para que no se desborden */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sutil sombra para un efecto de elevación */
        display: flex; /* Para alinear el texto si agregas un icono */
        align-items: center; /* Centrar verticalmente el contenido */
    }

    /* Estilo para mensajes de éxito */
    .message-box.success {
        background-color: #d1fae5; /* Fondo verde claro */
        color: #065f46; /* Texto verde oscuro */
        border: 1px solid #34d399; /* Borde verde */
    }

    /* Estilo para mensajes de error */
    .message-box.error {
        background-color: #fee2e2; /* Fondo rojo claro */
        color: #991b1b; /* Texto rojo oscuro */
        border: 1px solid #ef4444; /* Borde rojo */
    }

    /* Opcional: Estilo para iconos dentro del mensaje */
    .message-box svg {
        margin-right: 0.75rem; /* Espacio a la derecha del icono */
}
</style>


@if(session()->has('success'))
    <div class="message-box success">
        {{ session('success') }}
    </div>
@elseif(session()->has('error'))
    <div class="message-box error">
        {{ session('error') }}
    </div>
@endif