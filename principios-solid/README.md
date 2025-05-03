# PROYECTOS PRACTICOS APLICANDO PRINCIPIOS SOLID

## 🧾 1. Gestor de Tareas (To-Do List)

Descripción: Una aplicación que permite crear, editar, completar y eliminar tareas.

Principios SOLID aplicados:

- SRP (Responsabilidad Única): Separar las clases de gestión de tareas, interfaz de usuario y almacenamiento.

- OCP (Abierto/Cerrado): Permitir la extensión de funcionalidades sin modificar las clases existentes.

## 📦 2. Sistema de Inventario Básico

Descripción: Una aplicación para gestionar productos, incluyendo su adición, eliminación y actualización.

Principios SOLID aplicados:

- SRP: Clases separadas para la lógica de productos y la interfaz de usuario.

- LSP (Sustitución de Liskov): Utilizar herencia para diferentes tipos de productos que puedan sustituirse sin alterar el comportamiento del programa.

## 📧 3. Notificador de Mensajes

Descripción: Una aplicación que envía notificaciones por correo electrónico y SMS.

Principios SOLID aplicados:

- ISP (Segregación de Interfaces): Crear interfaces específicas para cada tipo de notificación.

- DIP (Inversión de Dependencias): Las clases de alto nivel dependen de abstracciones, no de implementaciones concretas.

## 🛒 4. Carrito de Compras Simplificado

Descripción: Una aplicación que permite agregar y eliminar productos de un carrito, y calcular el total.

Principios SOLID aplicados:

- SRP: Clases separadas para la gestión del carrito y el cálculo de precios.

- OCP: Facilitar la adición de nuevos métodos de cálculo de precios sin modificar las clases existentes.

## 📚 5. Gestor de Biblioteca

Descripción: Una aplicación para gestionar libros, incluyendo su préstamo y devolución.

Principios SOLID aplicados:

- SRP: Clases separadas para la gestión de libros y usuarios.

- LSP: Permitir que diferentes tipos de usuarios (estudiantes, profesores) interactúen con el sistema sin alterar su comportamiento.

# interface

- solo puede tener constantes NO propiedades
- los metodos puedes ser de instancia o estaticos y públicos
- se puede heredar de multiples interfaces

# clase abstracta

- puede tener propiedade publicas, protegidas , privadas
- los métodos abstractos pueden ser públicos y protegidos(esto es así ya que estos métodos se tiene que implementar en las clases que los heredan si o si ) su definición se realiza en la clase que los implementa
- los métodos NO abstractos pueden ser públicos, protegidos, privados (ya que estos no necesariamente se van a implementar en otras clase)
- las clases abstractas pueden heredar de otras clases abstractas o no
