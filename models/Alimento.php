<?php

class Alimento extends Producto {
  private $tieneCaducidad;
  private $fechaCaducidad;

  public function __construct($id, $nombreProducto, $precio, $tieneCaducidad, $fechaCaducidad) {
    parent::__construct($id, $nombreProducto, $precio);
    $this->tieneCaducidad = $tieneCaducidad;
    $this->fechaCaducidad = $fechaCaducidad;
  }

  public function dimeTipo() {
    if ($this->tieneCaducidad) {
      $caducidad = date_diff(new DateTime(), $this->fechaCaducidad);
      $dias = $caducidad->format('%a');
      return "Alimento con caducidad en $dias días";
    } else {
      return "Alimento sin caducidad";
    }
  }
}
