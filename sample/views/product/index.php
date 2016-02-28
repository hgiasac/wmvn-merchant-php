<div class="container">
    <?php foreach ($result['products'] as $prod) : ?>
    <div class="row">
        <div class="col-md-3">
            <img src="static/images/<?= $prod->image_name ?>">
        </div>
        <div class="col-md-9">
            <p class="text-primary"><b><?= $prod->product_name ?></b></p>
            <p class="text-danger">
                <span><b>Giá:</b> </span>
                <?= $prod->total_amount ?>
            </p>
            <p>
                <?= $prod->description ?>
            </p>
            <p>
                <form action="purchase.php" method="GET">
                    <input type="hidden" name="product_code" value="<?= $prod->product_code ?>">
                    <button class="btn btn-primary" type="submit">
                        Mua Ngay
                    </button>
                </form>
            </p>
        </div>
    </div>
    <hr>
    <?php endforeach; ?>
</div>
