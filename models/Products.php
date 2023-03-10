<?php

require_once __DIR__ . '/Categories.php';
require_once __DIR__ . '/../traits/name.php';

class Product
{
      use name;
      public $img;
      public $price;
      public $disponibility;
      public $categories;

      public function __construct(string $_name, string $_img, float $_price, int $_disponibility, array $_categories)
      {
            if (strlen($_name) > 20) {
                  $this->name = $_name;
            } else {
                  throw new Exception('Nome prodotto non valido');
            }
            $this->img = $_img;
            $this->price = $_price;
            $this->disponibility = $_disponibility;
            $this->categories = $_categories;
      }

      public function printProduct()
      {
            echo '<div class="card mt-3 mb-3">';
            echo '<img src="' . $this->img . '" card="card-img-top">';
            echo '<div class="card-body">';

            try {
                  echo '<h5 class="card-title">' . $this->name . '</h5>';
            } catch (Exception $e) {
                  echo '<h1>ERRORE! Nome prodotto non valido!</h1>';
            }

            echo '<p class="card-text">Prezzo: ' . $this->price . '€</p>';

            if ($this->disponibility == 0) {
                  echo '<p class="card-text">Disponibilità: Non disponibile</p>';
            } else if ($this->disponibility == 1) {
                  echo '<p class="card-text">Disponibilità: Disponibile</p>';
            }

            echo '<p class="card-text">Categorie: ';
            echo '<ul>';
            foreach ($this->categories as $category) {
                  echo '<li>' . $category->getName() . $category->icon . '</li>';
            }
            echo '</ul>';
            echo '</p>';
      }
}
