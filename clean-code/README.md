# CLEAN CODE

## ¿Qué significa escribir "código limpio" y por qué debería importarme?

Código limpio es un término usado para describir código de computadoras que
es fácil de leer, entender y mantener. Código limpio se escribe de una manera
que lo hace simple, conciso y expresivo.

## ¿Cómo puedo evaluar si una base de código está limpia o no?

Podemos evaluar el código limpio en una variedad de maneras. Buena documentación, formato consistente y una base de código bien organizada, son indicadores de código limpio.

Sin embargo, existen algunas convenciones generales que podemos seguir para lograr código más limpio, así que vamos a eso ahora.

## Consejos y convenciones para escribir código limpio

### Eficacia, Eficiencia y Simplicidad

Por lo general cuando se seba implementar una nueva caracteristica al código, o cómo abordar una solución a un problema siempre se deben priorizar estas 3 cosas .

## Eficacia

Primero, nuestro código tiene que ser eficaz, lo que significa que debería resolver el problema que se supone que debe resolver. Por supuesto que esta es la expectativa más básica que podemos tener para nuestro código, pero si nuestra implementación en realidad no funciona, es inútil pensar en otra cosa.

**_En pocas palabras el código tiene que FUNCIONAR_**

## Eficiencia

Segundo, una vez que sabemos que nuestro código resuelve el problema, deberíamos verificar si lo hace eficientemente. ¿El programa corre utilizando una cantidad razonable de recursos en términos de tiempo y espacio? ¿Puede correr más rápido con menos espacio?.

**_En pocas palabras ¿ el código funciona de la mejor manera o de una manera mala o mediocre ?_**

### Ejemplos

**_2 funciones que hacen lo mismo, pero con una implementación algo distinta._**

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

Aunque ambas hace los mismo la segunda opción suele ser mejor en terminos de simplicidad, ya que usamos abstracciones que ya nos ofrece el lenguaje de programacionen cuestión.

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

_Al seguir y priorizar estos tres conceptos de eficacia, eficiencia y simplicidad, siempre vamos a tener pautas para seguir cuando estemos pensando sobre cómo implementar una solución_

## Formato y Sintaxis

Cuando el código es consistente, los desarrolladores pueden identificar fácilmente patrones y entender cómo funciona el código.
La consistencia también ayuda a reducir errores, ya que asegura que todos los desarrolladores estén siguiendo las mismas normas y convenciones.

- Espaciado y sangrado

  ```javascript
  // mal espaciado y sangrado
  const myFunc = (number1, number2) => {
    const result = number1 + number2;
    return result;
  };

  // buen espaciado y sangría
  const myFunc = (number1, number2) => {
    const result = number1 + number2;
    return result;
  };
  ```

- Sintaxis consistente
  ```javascript
  // Función de flecha, sin punto y coma, sin return
  const multiplyByTwo = (number) => number * 2;
  // Función, punto y comas, return
  function multiplyByThree(number) {
    return number * 3;
  }
  ```
- Convenciones de Mayúsculas y Minúsculas consistentes

  ```javascript
  // camelCase
  const myName = "John";
  // PascalCase
  const MyName = "John";
  // snake_case
  const my_name = "John";
  ```

## Denominación

Nombrar variables y funciones de manera clara y descriptiva es un aspecto importante de escribir código limpio.

### Ejemplos

```javascript
// Ejemplo 1: Denominación pobre
function ab(a, b) {
  let x = 10;
  let y = a + b + x;
  console.log(y);
}

ab(5, 3);
```

```javascript
// Ejemplo 1: Buena denominación
function calcularTotalConImpuesto(precioBase, tasaImpuesto) {
  const IMPUESTO_BASE = 10;
  const totalConImpuesto =
    precioBase + precioBase * (tasaImpuesto / 100) + IMPUESTO_BASE;
  console.log(totalConImpuesto);
}

calcularTotalConImpuesto(50, 20);
```

## Concisión vs Claridad

Al momento de escribir código limpio es importante encontrar un balance entre concisión y claridad. Si bien es importante mantener el código conciso para mejorar la legibilidad y mantenibilidad, es igual de importante asegurar que el código sea claro y fácil de entender. Escribir código demasiado conciso puede llegar a confusión y errores, y puede hacer que el código sea difícil de trabajar para otros desarrolladores.

### Ejemplos

```javascript
// Ejemplo 1: Función concisa
const cuentaVocales = (s) => (s.match(/[aeiou]/gi) || []).length;
console.log(cuentaVocales("hola mundo"));
```

```javascript
// Ejemplo 2: Función más detallada y más clara
function contarVocales(s) {
  const vocalRegex = /[aeiou]/gi;
  const coincidencias = s.match(vowelRegex) || [];
  return coincidencias.length;
}

console.log(contarVocales("hola mundo"));
```

**Es importante encontrar un balance entre concisión y claridad al escribir código.**

## Reusabilidad

La reusabilidad del código es un concepto fundamental en la ingeniería de software que hace referencia a la capacidad del código a user usado varias veces sin modificación.

### Ejemplos

```javascript
// Ejemplo 1: Sin reusabilidad
function calcularAreaCirculo(radio) {
  const PI = 3.14;
  return PI * radio * radio;
}

function calcularAreaRectangulo(largo, ancho) {
  return largo * ancho;
}

function calcularAreaTriangulo(base, alto) {
  return (base * alto) / 2;
}

const areaCirculo = calcularAreaCirculo(5);
const areaRectangulo = calcularAreaRectangulo(4, 6);
const areaTriangulo = calcularAreaTriangulo(3, 7);

console.log(areaCirculo, areaRectangulo, areaTriangulo);
```

```javascript
// Ejemplo 2: Implementando reusabilidad
function calcularArea(forma, ...args) {
  if (forma === "circulo") {
    const [radio] = args;
    const PI = 3.14;
    return PI * radio * radio;
  } else if (forma === "rectangulo") {
    const [larho, ancho] = args;
    return larho * ancho;
  } else if (forma === "triangulo") {
    const [base, altura] = args;
    return (base * altura) / 2;
  } else {
    throw new Error(`Forma "${forma}" no soportada.`);
  }
}

const areaCirculo = calcularArea("circulo", 5);
const areaRectangulo = calcularArea("rectangulo", 4, 6);
const areaTriangulo = calcularArea("triangulo", 3, 7);

console.log(areaCirculo, areaRectangulo, areaTriangulo);
```

## Flujo Claro de Ejecución

Tener un flujo claro de ejecución es fundamental para escribir código limpio debido a que esto hace que el código sea más fácil de leer, entender y mantener.

Por otro lado, el código espagueti es un término usado para describir código que es complejo y difícil de seguir, a menudo caracterizado por bloques de código largos, enredado y desorganizado.

### Ejemplos

```javascript
// Ejemplo 1: Flujo claro de ejecución
function calcularDescuento(precio, porcentajeDescuento) {
  const montoDescuento = precio * (porcentajeDescuento / 100);
  const precioDescontado = precio - montoDescuento;
  return precioDescontado;
}

const precioOriginal = 100;
const porcentajeDescuento = 20;
const precioFinal = calcularDescuento(precioOriginal, porcentajeDescuento);

console.log(precioFinal);
```

```javascript
// Ejemplo 2: Código espagueti
const precioOriginal = 100;
const porcentajeDescuento = 20;

let precioDescontado;
let montoDescuento;
if (precioOriginal && porcentajeDescuento) {
  montoDescuento = precioOriginal * (porcentajeDescuento / 100);
  precioDescontado = precioOriginal - montoDescuento;
}

if (precioDescontado) {
  console.log(precioDescontado);
}
```

## Principio de Responsabilidad Única

es un principio en el desarrollo de software que dice que cada clase o módulo debe tener sólo una razón para cambiar, o en otras palabras, cada entidad en nuestra base de código debe tener una única responsabilidad.

Al aplicar PRU podemos crear código que es más fácil de testear, reusar y refactorizar, ya que cada módulo sólo maneja una única responsabilidad.

### Ejemplos

```javascript
// Ejemplo 1: Sin PRU
function procesarPedido(pedido) {
  // validar pedido
  if (pedido.items.length === 0) {
    console.log("Error: El Pedido no tiene elementos");
    return;
  }

  // calcular el total
  let total = 0;
  pedido.items.forEach((item) => {
    total += item.precio * item.cantidad;
  });

  // aplicar descuentos
  if (pedido.cliente === "vip") {
    total *= 0.9;
  }

  // guardar pedido
  const db = new Database();
  db.connect();
  db.guardarPedido(pedido, total);
}
```

```javascript
// Ejemplo 2: Con PRU
class ProcesadorDePedidos {
  constructor(pedido) {
    this.pedido = pedido;
  }

  validar() {
    if (this.pedido.items.length === 0) {
      console.log("Error: El Pedido no tiene elementos");
      return false;
    }
    return true;
  }

  calcularTotal() {
    let total = 0;
    this.pedido.items.forEach((item) => {
      total += item.precio * item.cantidad;
    });
    return total;
  }

  aplicarDescuentos(total) {
    if (this.pedido.cliente === "vip") {
      total *= 0.9;
    }
    return total;
  }
}

class GuardarPedido {
  constructor(pedido, total) {
    this.pedido = pedido;
    this.total = total;
  }

  guardar() {
    const db = new Database();
    db.connect();
    db.guardarPedido(this.pedido, this.total);
  }
}

const pedido = new Pedido();
const procesador = new ProcesadorDePedidos(order);

if (procesador.validar()) {
  const total = procesador.calcularTotal();
  const totalConDescuentos = procesador.aplicarDescuentos(total);
  const saver = new GuardarPedido(pedido, totalConDescuentos);
  saver.save();
}
```

## Tener una "Fuente Única de la Verdad"

Tener una "fuente única de la verdad" significa que sólo existe un lugar donde se guarda un dato o configuración en particular en la base de código, y cualquier otra referencia a él en el código se refiere a esa fuente.

### Ejemplos

```javascript
// Opción 1: Sin "fuente única de la verdad"

// archivo 1: weatherAPI.js
const apiKey = "12345abcde";

function obtenerClimaActual(ciudad) {
  return fetch(
    `https://api.weather.com/conditions/v1/${city}?apiKey=${apiKey}`
  ).then((response) => response.json());
}

// archivo 2: weatherComponent.js
const apiKey = "12345abcde";

function mostrarClimaActual(ciudad) {
  obtenerClimaActual(ciudad).then((informacionClima) => {
    // mostrar informacionClima en la UI
  });
}
```

```javascript
// Opción 2: "Fuente Única de la Verdad"

// archivo 1: weatherAPI.js
const apiKey = "12345abcde";

function obtenerClimaActual(ciudad) {
  return fetch(
    `https://api.weather.com/conditions/v1/${city}?apiKey=${apiKey}`
  ).then((response) => response.json());
}

export { obtenerClimaActual, apiKey };

// archivo 2: weatherComponent.js
import { obtenerClimaActual } from "./weatherAPI";

function mostrarClimaActual(ciudad) {
  obtenerClimaActual(ciudad).then((informacionClima) => {
    // mostrar informacionClima en la UI
  });
}
```

## Expón y Consume los Datos que Necesitas

Un principio importante de escribir código limpio es solo exponer y consumir la información que sea necesaria para una tarea en particular.

Cuando se expone o consume información que no es necesaria, puede llegar a problemas de desempeño y hacer que el código sea más difícil de entender y mantener.

### Ejemplos

```javascript
// Objeto original
const usuario = {
  id: 1,
  nombre: "Alice",
  email: "alice@example.com",
  edad: 25,
  direccion: {
    calle: "123 Main St",
    ciudad: "Anytown",
    estado: "CA",
    zip: "12345",
  },
};

// Expón y consume las propiedades nombre y email
const { nombre, email } = usuario;

console.log(nombre); // 'Alice'
console.log(email); // 'alice@example.com'
```

## Modularización

La modularización es un concepto fundamental para escribir código limpio. Se refiere a la práctica de descomponer código largo y complejo en módulos o funciones pequeñas más manejables.
Utilizar la modularización nos otorga varios beneficios tales como:

1. Re-usabilidad: Los módulos pueden ser reutilizados en distintas partes de la aplicación o en otras aplicaciones, ahorrando tiempo y esfuerzo en el desarrollo.

1. Encapsulado: Los módulo te permiten ocultar los detalles internos de una función u objeto, exponiendo únicamente la interface básica al mundo exterior.

1. Escalabilidad: Al descomponer código largo en pequeñas partes modulares puedes fácilmente agregar o quitar funcionalidades sin afectar a toda la base de código.

### Ejemplos

```javascript
// Sin modularización
function calcularPrecio(cantidad, precio, impuesto) {
  let subtotal = cantidad * precio;
  let total = subtotal + subtotal * impuesto;
  return total;
}

// Sin modularización
let cantidad = parseInt(prompt("Ingresar cantidad: "));
let precio = parseFloat(prompt("Ingresar precio: "));
let impuesto = parseFloat(prompt("Ingresar impuesto: "));

let total = calcularPrecio(cantidad, precio, impuesto);
console.log("Total: $" + total.toFixed(2));
```

```javascript
// Con modularización
function calcularSubtotal(cantidad, precio) {
  return cantidad * precio;
}

function calcularTotal(subtotal, impuesto) {
  return subtotal + subtotal * impuesto;
}

// Con modularización
let cantidad = parseInt(prompt("Ingresar cantidad: "));
let precio = parseFloat(prompt("Ingresar precio: "));
let impuesto = parseFloat(prompt("Ingresar impuesto: "));

let subtotal = calcularSubtotal(cantidad, precio);
let total = calcularTotal(subtotal, impuesto);
console.log("Total: $" + total.toFixed(2));
```

## Estructura de Carpetas

Elegir una buena estructura de carpetas es una parte fundamental de escribir código limpio. Una estructura de proyecto bien organizada ayuda a los desarrolladores encontrar y modificar código fácilmente, reduce la complejidad del código y mejora la escalabilidad y mantenibilidad del proyecto.

### Ejemplos

```shell
// Mala estructura de carpetas
my-app/
├── App.js
├── index.js
├── components/
│   ├── Button.js
│   ├── Card.js
│   └── Navbar.js
├── containers/
│   ├── Home.js
│   ├── Login.js
│   └── Profile.js
├── pages/
│   ├── Home.js
│   ├── Login.js
│   └── Profile.js
└── utilities/
    ├── api.js
    └── helpers.js
```

```shell
// Buena estructura de carpetas
my-app/
├── src/
│   ├── components/
│   │   ├── Button/
│   │   │   ├── Button.js
│   │   │   ├── Button.module.css
│   │   │   └── index.js
│   │   ├── Card/
│   │   │   ├── Card.js
│   │   │   ├── Card.module.css
│   │   │   └── index.js
│   │   └── Navbar/
│   │       ├── Navbar.js
│   │       ├── Navbar.module.css
│   │       └── index.js
│   ├── pages/
│   │   ├── Home/
│   │   │   ├── Home.js
│   │   │   ├── Home.module.css
│   │   │   └── index.js
│   │   ├── Login/
│   │   │   ├── Login.js
│   │   │   ├── Login.module.css
│   │   │   └── index.js
│   │   └── Profile/
│   │       ├── Profile.js
│   │       ├── Profile.module.css
│   │       └── index.js
│   ├── utils/
│   │   ├── api.js
│   │   └── helpers.js
│   ├── App.js
│   └── index.js
└── public/
    ├── index.html
    └── favicon.ico
```

## Documentación

Una documentación adecuada no sólo ayuda a los desarrolladores que escribieron el código a entenderlo mejor en el futuro pero también hace que sea más fácil para otros desarrolladores leer y entender la base de código.

Documentar es especialmente importante en casos donde la lógica de negocio es bastante compleja, y casos en donde la gente que no está familiarizada con la base de código tiene que interactuar con ella.

### Formas de documentar código

- Comentarios :
  Estos pueden dar contexto y explicar lo que el código está haciendo,
  pero recalcar que no se debe comentar lo ovbio
- Documentación en linea
  - Herrameintas como JSDoc
  - Swagger y Postman : pueden ser usadas para documentar APIs

Fuentes :

- [freecodecamp](https://www.freecodecamp.org/espanol/news/como-escribir-codigo-limpio-consejos-y-mejores-practicas-manual-completo/)
- [cosasdedevs](https://cosasdedevs.com/posts/clean-code-buenas-practicas-escribir-codigo-limpio-eficiente/)

---

![cleanCode](https://media.licdn.com/dms/image/v2/C4E12AQF-m5aMNBrruA/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1624667225068?e=2147483647&v=beta&t=S6zOyPFaWPbfUpreq4uXUx0x1Aa95JXzYHpEIDM6VnE)
