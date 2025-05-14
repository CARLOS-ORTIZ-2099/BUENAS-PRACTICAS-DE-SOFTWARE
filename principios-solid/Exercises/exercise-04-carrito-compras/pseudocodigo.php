<?php
/* APP de carrito de comapras simplificado
  debemos aplicar el principio de :

  SRP  => mantener separadas las clases para la gestion de carrito y el 
  calculo de precios

  OCP => extender las funcionalidades para los distintos métodos de calculo
  de precio sin modificar las clases existentes

 */


// pseudocódigo

/* 
  - crear una clase para la la gestion del carrito que incluya métodos cómo :
   
    - agregar un producto al carrito 😀

    - disminuir una unidad de un producto del carrito 😀

    - eliminar un producto del carrito 😀

    - eliminar todos los productos del carrito 😀

    - ver todos los productos del carrito 😀

    - obtener cantidad de productos 😀


*/


/* 
 - crear una clase para los calculos de precios del carrito que incluya 
  métodos cómo :
   - hacer sumatoria del total a pagar de cada producto del carrito 😀
   
   - hacer sumatoria del total a pagar de todos los productos del carrito 😀

 

*/
