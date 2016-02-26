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
                        <td><b>Invoice ID:</b></td>
                        <td><?php echo $result['response']->object->invoiceID; ?></td>
                    </tr>
                    <tr>
                        <td><b>Description:</b></td>
                        <td><?php echo $result['response']->object->description; ?></td>
                    </tr>
                    <tr>
                        <td><b>Total Amount:</b></td>
                        <td><?php echo $result['response']->object->totalAmount; ?></td>
                    </tr>
                    <tr>
                        <td><b>Status:</b></td>
                        <td><?php echo $result['response']->object->status; ?></td>
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
