# PRINCIPIO DE INVERSIÓN DE DEPENDENCIAS (DIP)

Módulos de alto nivel => aquellos contiene la lógica central de la aplicación
Módulos de bajo nivel => aquellos que contiene implementaciones(funcionalidades especificas).

Aquí sabemos qué los módulos de alto nivel no deben depender de módulos de bajo nivel ambos deben depender de clases abstractas o interfaces.

Básicamente lo que nos dice es que nuestras clase no deben depender directamente de otras clase concretas ya que al cambiarlas podríamos romper el código, en su lugar deberíamos de depender de abstracciones.

> en lugar de tener componentes altamente acoplados que dependen directamente de otras dependencias, se utilizan interfaces o contratos para establecer las dependencias.

---

## Preguntas que debemos hacernos para saber si estamos violando este principio

- ¿El código crea instancias de clases concretas directamente en lugar de recibirlas como dependencias?

---

![IDP](https://miro.medium.com/v2/resize:fit:720/format:webp/1*QmTV9ar7I8sOTjyo-hJQGQ.png)
