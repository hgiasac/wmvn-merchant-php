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
