# PRINCIPIO DE ABIERTO CERRADO (OCP)

Este principio nos dice que una clase, modulo o funcionalidad debe estar siempre abierto para extenderse pero cerrado para modificarse, esto por que si queremos modificar una clase/modulo ya existente puede que el resultado termine afectando las otras partes del software que usan esa clase/modulo.
Por lo general este principio va de mano con abstracciones es decir interfaces y/o calses abstractas, ya que cómo sabemos estas son cómo contratos que han de cumplir las clases que los implemente, pero cada una de ellas puede variar su implementación.

---

## Preguntas que debemos hacernos para saber si estamos violando este principio

- Al querer agregar una nueva funcionalidad se tiene que modificar alguna clase/modulo ya existente ?

---

![ocp](https://miro.medium.com/v2/resize:fit:1400/1*IAVK5JUHTvW_qeQ3K5OkXg.png)
