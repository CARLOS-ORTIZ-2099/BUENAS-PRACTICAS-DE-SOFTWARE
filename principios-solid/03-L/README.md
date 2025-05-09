# PRINCIPIO DE SUSTITUCIÓN DE LISKOV (LSP)

Este principio establece que cuando una clase hija hereda de una clase padre esta clase hija no rompa abruptamente el programa , cómo por ejemplo restricciones, excepciones que no están establecidas en la clase padre que hagan que el programa se rompa o retorne resultados inesperados.

asi tambien El principio no prohíbe que las subclases añadan restricciones o validaciones adicionales, siempre que no violen las expectativas establecidas por la clase base. Es decir, las subclases pueden extender el comportamiento, pero no deben contradecirlo.

> una clase base tiene que poder ser sustituida por una instancia de la subclase

---

## Preguntas que debemos hacernos para saber si estamos violando este principio

- La clase hija lanza excepciones en escenarios donde la clase base no lo haría?
- ¿La clase hija introduce reglas que no están definidas en la clase base?
- El código depende completamente de la clase hija y no del padre ?

---

![LSP](https://miro.medium.com/v2/resize:fit:720/format:webp/1*D6aZsZfIyQ_Sv5j5zj_gug.png)
