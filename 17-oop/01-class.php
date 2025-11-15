<?php
    $tittle = '01-CLASS';
    $description = 'Lorem';

    include 'template/header.php';

    echo " <section>";
    
    class Vehicle {
        # Attributes
        public $brand;
        public $refer;
        public $color;
        public $model;

        # Methods
        public function  setAttributes($b, $r, $c, $m) {
            $this->brand = $b;
            $this->refer = $r;
            $this->color = $c;
            $this->model = $m;
        }

        public function getAttributes(){
            return "<ul> 
                        <li> Brand: $this->brand </li>
                        <li> Refer: $this->refer </li>
                        <li> Color: $this->color </li>
                        <li> Model: $this->model </li>
                    </ul>";
        }

    }

    $vh1 = new Vehicle();
    $vh1->setAttributes('Volkswagen', 'Golf', 'Black', 2019);
    echo $vh1->getAttributes();

    $vh2 = new Vehicle();
    $vh2->setAttributes('Nissan', 'Murano', 'Gray', 2019);
    $vh2->refer = 'Kiks'; // cambiar el valor de un atributo
    echo $vh2->getAttributes();

    $vh3 = new Vehicle();
    $vh3->brand = 'Toyota';
    $vh3->refer = 'Foreruner';
    $vh3->color = 'Orange';
    $vh3->model = '2025';
    echo $vh2->getAttributes();

    include 'template/footer.php';
?>