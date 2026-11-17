# Sistema de Gestión de Soporte y Apoyo Técnico (GESAT).

## Alcaldía del Municipio Sucre, Estado Miranda.

Este proyecto tiene la finalidad de implementar un sistema de tickets que a nivel interno facilite la documentación de soportes realizados, así como optimizar el tiempo de respuesta ante las solicitudes realizadas por los **departamentos del ente público (no implican los entes autónomos)**, atendidas por la *Dirección de Tecnología de Información y Comunicación (DTIC)*.

## Estructura del Sistema

1. ### Estructura Pública:
    1. Login (Inicio de Sesión)
    2. Solicitudes (Generar Ticket)
    3. Tablón de tickets (*No implementado*).
2. ### Estructura Interna:
    1. #### Administradores:
        1. Dashboard (Asignación).
        2. **Administración de Usuarios:**
            1. Crear Usuario
            2. Modificar Usuario.
            3. Eliminar Usuario.
            4. Consultar Usuarios.
        3. **Reportes:**
            1. Bitácoras Diarias.
            2. Estadísiticas de técnicos (*No implementado*).
        4. Ticket Pendiente (Reasignación).
    2. #### Técnicos:
        1. Mis Tickets Asignados
            1. Marcar Como Resuelto.
            2. Marcar Como No Resuelto.

## Requisitos de Instalación:

1. ### PostgreSQL
         Versión 18 o superior preferiblemente.

2. ### Composer: 
        Actualizar dependencias de CodeIgniter 4 e incluir paquetes dentro del framework (composer update / composer require).
3. ### Git:
    #### Primera instalación:
        git clone https://github.com/Sebaa012/direccion_tecnologia_gesat.git
    #### Atualización:
        git pull origin main && composer update

4. ### Servidor Debian (12/13):
        #El sistema tiene un servicio de ejecución en segundo plano
        mv dtic_gesat.service /etc/systemd/system/
        sudo systemctl daemon-reload
        sudo systemctl start dtic_gesat
        sudo systemctl enable dtic_gesat
        

