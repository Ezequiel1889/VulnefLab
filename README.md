# VulnefLab - Entorno de Práctica de Pentesting Web

Este laboratorio fue desarrollado como proyecto técnico para la carrera de Ciberseguridad. Es un entorno controlado basado en Docker que simula una aplicación web con múltiples vulnerabilidades para entrenamiento en Seguridad Ofensiva.

## 🚩 El Desafío
El objetivo principal es comprometer el servidor y obtener control total (RCE). Además, existen **3 Flags ocultas** distribuidas en el entorno. ¿Podrás encontrarlas todas?

* 🏆 **Flag #1:** Reconocimiento.
* 🏆 **Flag #2:** Acceso al sistema de archivos.
* 🏆 **Flag #3:** Control total del servidor.

## 🚀 Vulnerabilidades Incluidas
El entorno presenta fallos de seguridad comunes en aplicaciones web, incluyendo:
* Inyección de código en el panel de acceso.
* Exposición de archivos sensibles del sistema.
* Debilidades en el sistema y carga de archivos.

## 🛠️ Instalación y Despliegue
Para desplegar este laboratorio en tu máquina local:

1. **Clonar el repositorio:**

   git clone https://github.com/Ezequiel1889/VulnefLab.git

 2. Levantar el entorno:
   
    cd VulnefLab && docker-compose up -d

    ⚠️ Aviso de Responsabilidad (Disclaimer)
Este entorno ha sido creado con fines estrictamente educativos y de aprendizaje en ciberseguridad ética. El autor no se hace responsable del uso indebido de las técnicas aquí expuestas en sistemas ajenos. Queda terminantemente prohibido utilizar este laboratorio o su código para actividades ilícitas. Se trabaja bajo un entorno controlado y aislado (Docker) para garantizar la seguridad del sistema anfitrión.

                        Acceso: http://localhost:8080

Desarrollado por Ezequiel Flammini - Estudiante de Ciberseguridad
