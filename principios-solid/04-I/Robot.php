<?php


/* El problema con esto es que la clase robot al implementar una interface esta obligada
   a incluir los metodos de la interfcae incluso los que no necesita
*/

/* 
  interface Trabajador
  {
    public function trabajar();
    public function comer();
  }


  class Robot implements Trabajador
  {
    public function trabajar()
    {
      debuguear("el robot esta trabajando");
    }
    public function comer()
    {
      debuguear("el robot no come? ERROR");
    }
  }

*/

// El código corregido se vería así 👇



interface FuncionalidadesRobot
{
  public function trabajar();
  public function reparar();
  public function programarFuncionalidades();
}


interface FuncionalidadesHumano
{
  public function comer();
  public function dormir();
}

class Robot implements FuncionalidadesRobot
{
  public function trabajar()
  {
    debuguear("el robot esta trabajando");
  }
  public function reparar()
  {
    debuguear("reparando robot");
  }
  public function programarFuncionalidades()
  {
    debuguear("programando robot");
  }
}


class Humano implements FuncionalidadesHumano
{
  public function comer()
  {
    debuguear("el humano necesita comer");
  }
  public function dormir()
  {
    debuguear("el humano necesita dormir");
  }
}
