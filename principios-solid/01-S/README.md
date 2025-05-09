# PRINCIPIO DE RESPONSABILIDAD ÚNICA (SRP)

Este nos dice que una clase, modulo sólo puede tener una responsabilidad, pero cabe señalar que esto no quiere decir que una clase o modulo sólo pueda tener un metodo, lo que quiere decir es que esta clase o modulo debería tener métodos o funcionalidades que giren entorno a un sólo propósito.

Por ejemplo : si tengo la clase Alumno los métodos para esa clase no deberían hacer cosas cómo enviar emails, mostrar vistas, etc.

> cada clase tiene que estar encapsulada de otras, tal que si hay un cambio en una clase no afecta las demas

---

## Preguntas que debemos hacernos para saber si estamos violando este principio

- Mi clase/modulo tiene un nombre muy genérico ?
- Mi clase/modulo interviene en varias capas del software (lógica de negocio, interacción con bases de datos, vistas) ?
- Mi clase/modulo se ve afectada con los cambios de código que se hagan en otras partes del software ?
- Mi clase/modulo tiene muchos métodos públicos ?
- Mi clase/modulo tiene muchas importaciones(dependencias)?
- Mi clase/modulo es muy larga ?

---

![srp](https://miro.medium.com/v2/resize:fit:1400/1*DstpZTpKEiVhMJWR5pgO8A.png)
