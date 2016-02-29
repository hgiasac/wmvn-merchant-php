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
                <?php
                    $attributes = $result['response']->object->getAttributes();
                    $labels = $result['response']->object->attributeLabels();
                    foreach ($attributes as $key => $value):
                ?>
                    <tr>
                        <td><b><?= $labels[$key]; ?></b></td>
                        <td><?= $value ?></td>
                    </tr>
                    <?php endforeach;?>
                <?php endif;?>

                </table>
            </div>
        </div>
    <?php endif;?>
