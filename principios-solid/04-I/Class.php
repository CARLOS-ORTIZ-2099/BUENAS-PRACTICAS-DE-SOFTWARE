<?php


/* El problema con esto es que la clase robot al implementar una interface 
   esta obligada a incluir los métodos de la interface, incluso los que no necesita
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



interface RobotFuncionalities
{
  public function work(): void;
  public function fix(): void;
  public function programFeatures(): void;
}


interface HumanFuncionalities
{
  public function eat(): void;
  public function sleep(): void;
}

class Robot implements RobotFuncionalities
{
  public function work(): void
  {
    debuguear("el robot esta trabajando");
  }
  public function fix(): void
  {
    debuguear("reparando robot");
  }
  public function programFeatures(): void
  {
    debuguear("programando robot");
  }
}


class Humano implements HumanFuncionalities
{
  public function eat(): void
  {
    debuguear("el humano necesita comer");
  }
  public function sleep(): void
  {
    debuguear("el humano necesita dormir");
  }
}
