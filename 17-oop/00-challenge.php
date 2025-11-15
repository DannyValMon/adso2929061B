<?php
    $tittle = '00- challengue';
    $description = 'Lorem';

    include 'template/header.php';

    echo " <section>";

class Product {
    private $name;
    private $price;

    public function __construct(string $name, float $price) {
        $this->name  = $name;
        $this->price = $price;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }
}

class DiscountService {
    public function apply(float $amount, float $discountPercent): float {
        return $amount - ($amount * ($discountPercent / 100));
    }
}

$product = new Product("Camiseta", 20.000);
$discount = new DiscountService();

$finalPrice = $discount->apply($product->getPrice(), 10);

?>

<div class="card" style="
    width: 350px;
    margin: 30px auto;
    padding: 20px;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(6px);
    border-radius: 12px;
    color: #fff;
">
  <h3 style="margin-top:0;">Producto</h3>
    <p><strong>Nombre:</strong> <?= $product->getName() ?></p>
    <p><strong>Precio original:</strong> $<?= $product->getPrice() ?></p>
    <p><strong>Descuento aplicado:</strong> 10%</p>
    
    <h2 style="color:#00ffaa; margin-top:10px;">
        Precio final: $<?= $finalPrice ?>
    </h2>
</div>

<?php 
    include 'template/footer.php';
?>