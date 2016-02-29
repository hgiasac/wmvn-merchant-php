<div class="container">
    <div class="row">
        <div class="col-12-xs">
            <form action="" method="post">
                    <?php
                        $attributes = $result['order']->getAttributes();
                        $labels = $result['order']->attributeLabels();
                        foreach ($attributes as $key => $value):
                        	if ($key === 'checksum') {
                        		continue;
                        	}

	                   ?>
			                <div class="form-group">
			                    <label class="col-3-xs" for="<?php echo $key; ?>"><?php echo $labels[$key]; ?></label>
			                    <input class="col-9-xs form-control" type="text" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
			                </div>
			            <?php endforeach;?>
                <div class="form-group">
                    <label class="col-3-xs" for="checksum"><?php echo $labels['checksum']; ?></label>
                    <input class="col-9-xs form-control" type="text" value="<?php echo $result['order']->checksum; ?>" readonly>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
    <?php if (!empty($result['response'])): ?>
        <div class="row">
            <div class="col-12-xs">
                <h4>Response Code</h4>
                <table class="table table-striped">
                    <tr>
                        <td><b>Error Code:</b></td>
                        <td><?php echo $result['response']->errorCode ?></td>
                    </tr>
                    <tr>
                        <td><b>Message:</b></td>
                        <td><?php echo $result['response']->message; ?></td>
                    </tr>
                    <tr>
                        <td><b>UI Message:</b></td>
                        <td><?php echo $result['response']->uiMessage; ?></td>
                    </tr>
                <?php if (!$result['response']->isError()): ?>
                    <tr>
                        <td><b>Transaction ID:</b></td>
                        <td><?php echo $result['response']->object->transactionID; ?></td>
                    </tr>
                    <tr>
                        <td><b>Redirect URL:</b></td>
                        <td><a target="_blank" href="<?= $result['response']->object->redirectURL; ?>"><?= $result['response']->object->redirectURL; ?></a></td>
                    </tr>

                <?php endif; ?>
                </table>
            </div>
        </div>
    <?php endif;?>
</div>
