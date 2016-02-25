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
                        <td><?php echo $result['response']->error_code ?></td>
                    </tr>
                    <tr>
                        <td><b>Message:</b></td>
                        <td><?php echo $result['response']->message; ?></td>
                    </tr>
                    <tr>
                        <td><b>UI Message:</b></td>
                        <td><?php echo $result['response']->ui_message; ?></td>
                    </tr>
                    <?php if (!$result['response']->isError()): ?>
                    <tr>
                        <td><b>Transaction ID:</b></td>
                        <td><?php echo $result['response']->object->transaction_id; ?></td>
                    </tr>
                    <tr>
                        <td><b>Redirect URL:</b></td>
                        <td><?php echo $result['response']->object->redirect_url; ?></td>
                    </tr>
                    <?php elseif (!empty($result['response']->object)): ?>
                    <tr>
                        <td><b>Data:</b></td>
                        <td>
                            <pre>
                            <?php print_r($result['response']->object);?>
                            </pre>
                        </td>
                    </tr>
                    <?php endif;?>
                    <tr>
                        <td><b>Checksum:</b></td>
                        <td><?php echo $result['response']->checksum; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endif;?>
</div>
