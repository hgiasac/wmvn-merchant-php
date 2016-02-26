<div class="container">
    <div class="row">
        <div class="col-12-xs">
            <form action="" method="post">
                    <?php
                        $attributes = $result['form']->getAttributes();
                        $labels = $result['form']->attributeLabels();
                        foreach ($attributes as $key => $value):
	                   ?>
			                <div class="form-group">
			                    <label class="col-3-xs" for="<?php echo $key; ?>"><?php echo $labels[$key]; ?></label>
			                    <input class="col-9-xs form-control" type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
			                </div>
			            <?php endforeach;?>
                <div class="form-group">
                    <label class="col-3-xs" for="checksum">Checksum</label>
                    <input class="col-9-xs form-control" type="text" value="<?php echo $result['form']->checksum; ?>" readonly>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
    <?php include '_order_response.php'; ?>
</div>
