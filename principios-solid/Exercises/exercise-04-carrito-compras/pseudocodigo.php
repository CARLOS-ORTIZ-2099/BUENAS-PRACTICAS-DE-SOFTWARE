<?php
/* APP de carrito de comapras simplificado
  debemos aplicar el principio de :

  SRP  => mantener separadas las clases para la gestion de carrito y el 
  calculo de precios

  OCP => extender las funcionalidades para los distintos métodos de calculo
  de precio sin modificar las clases existentes

 */


// pseudocódigo

/* 😀
  - crear una clase para la la gestion del carrito que incluya métodos cómo :
   
    - agregar un producto al carrito

    - disminuir una unidad de un producto del carrito

    - eliminar un producto del carrito

    - eliminar todos los productos del carrito

    - ver todos los productos del carrito

    - obtener cantidad de productos

*/


/* 
 - crear una clase para los calculos de precios del carrito que incluya 
  métodos cómo :
   - hacer sumatoria del total de cada producto del carrito
   
   - hacer sumatoria del total de todos los productos del carrito

   - calcular descuento, según condiciones o criterios como : 

    -  si la cantidad de items en el carrito superan las 5 unidades se le aplica el descuento. 
   
    - si en el carrito del usuario hay items de una determinada categoria 
   (por lo menos 1 de esa categoria) si se le aplica el descuento sin
   importar la cantidad.

   - en caso de que la cantidad de items del carrito del usuario sea superior
   a 5 unidades y tenga un producto de la categoria que cumple con el 
   descuento, se le aplica doble descuento

*/
