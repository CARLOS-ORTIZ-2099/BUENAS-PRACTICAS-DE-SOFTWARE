# CLEAN CODE

## ¿Qué significa escribir "código limpio" y por qué debería importarme?

Código limpio es un término usado para describir código de computadoras que
es fácil de leer, entender y mantener. Código limpio se escribe de una manera
que lo hace simple, conciso y expresivo.

## ¿Cómo puedo evaluar si una base de código está limpia o no?

Podemos evaluar el código limpio en una variedad de maneras. Buena documentación, formato consistente y una base de código bien organizada, son indicadores de código limpio.

Sin embargo, existen algunas convenciones generales que podemos seguir para lograr código más limpio, así que vamos a eso ahora.

## consejos y convenciones para escribir código limpio

### Eficacia, Eficiencia y Simplicidad

Por lo genral cuando se seba implementar una nueva caracteristica al código, o cómo abordar una solución a un problema siempre se deben priorizar estas 3 cosas .

## Eficacia

- Primero, nuestro código tiene que ser eficaz, lo que significa que debería resolver el problema que se supone que debe resolver. Por supuesto que esta es la expectativa más básica que podemos tener para nuestro código, pero si nuestra implementación en realidad no funciona, es inútil pensar en otra cosa.
  En pocas palabras tiene que FUNCIONAR

## Eficiencia

- Segundo, una vez que sabemos que nuestro código resuelve el problema, deberíamos verificar si lo hace eficientemente. ¿El programa corre utilizando una cantidad razonable de recursos en términos de tiempo y espacio? ¿Puede correr más rápido con menos espacio?.
  En pocas palabras ¿ el código funciona de la mejor manera o de una manera mediocre ?

- 2 funciones que hacen lo mismo, pero con una implementación algo distinta.

  ```javascript
  // Ejemplo ineficiente
  function sumArrayInefficient(array) {
    let sum = 0;
    for (let i = 0; i < array.length; i++) {
      sum += array[i];
    }
    return sum;
  }
  ```

  ```javascript
  // Ejemplo eficiente
  function sumArrayEfficient(array) {
    return array.reduce((a, b) => a + b, 0);
  }
  ```

  Aunque ambas hace los mismo la segunda opción suele ser mejor en terminos de simplicidad, ya que usamos abstracciones que ya nos ofrece el lenhauge de programacionen cuestión

## Simplicidad

Esto es lo más difícil de evaluar porque es subjetivo, depende de la persona que lea el código. Pero algunas pautas que podemos seguir son:

1. ¿Puedes entender fácilmente lo que hace el programa en cada línea?

1. ¿Las funciones y variables tienen nombres que representan claramente sus responsabilidades?

1. ¿El código tiene sangrado y espaciado correcto con el mismo formato a lo largo de la base de código?

1. ¿Hay documentación disponible para el código? Se usan comentarios para explicar partes complejas del programa?

1. ¿Qué tan rápido puedes identificar en qué parte de la base de código están ciertas características del programa?

1. ¿Puedes eliminar/agregar nuevas características sin la necesidad de modificar varias otras partes del código?

1. ¿El código sigue un enfoque modular, con diferentes características separadas en componentes?

1. ¿Se reutiliza el código cuando es posible?

1. ¿Se siguen las mismas decisiones de arquitectura, diseño e implementación, por igual a lo largo de la base de código?

> Al seguir y priorizar estos tres conceptos de eficacia, eficiencia y simplicidad, siempre vamos a tener pautas para seguir cuando estemos pensando sobre cómo implementar una solución
