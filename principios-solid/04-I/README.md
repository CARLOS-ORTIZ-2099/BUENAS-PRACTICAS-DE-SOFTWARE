# PRINCIPIO DE SEGREGACIÓN(SEPARACIÓN) DE INTERFACES (ISP)

Este principio nos habla acerca de que las interfaces que se implementaran en clases sólo deberían contener métodos necesarios y que tengan relación y/o coherencia entre si.

> Entonces sería mejor tener varias interfaces pequeñas con métodos específicos que eventualmente puedan usarse las clases que lo necesite que una sola interface que este sobrecargada de métodos innecesarios que al final las clases no vayan a usar.

---

## Preguntas que debemos hacernos para saber si estamos violando este principio

- ¿La interfaz contiene demasiados métodos que no son usados por todas las clases?
- ¿Alguna clase tiene métodos implementados sin funcionalidad porque no los necesita?
- Los métodos de una interface no están relacionados entre si ?
- Al crear más métodos para la interface obliga a modificar las clases que la implementan, incluso aquellos que no lo necesitan ?

---

![ISP](https://miro.medium.com/v2/resize:fit:1100/format:webp/1*9wbwzhyTB8qqCCMUrZBQww.png)
