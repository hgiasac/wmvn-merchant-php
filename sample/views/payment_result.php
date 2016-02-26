<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php if (!empty($result['error_message'])) : ?>
                <h2>Có lỗi xảy ra</h2>
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <?php echo $result['error_message']; ?>
                </div>
            <?php else:
            switch ($result['type']) {
                case 'success':
            ?>
                <h2>Thanh toán thành công</h2>
                <div class="alert alert-success" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <?php echo $result['transaction_id']; ?>
                </div>

            <?php
                    break;
                case 'cancel':
            ?>
                <h2>Giao dịch bị hủy</h2>
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <?php echo $result['transaction_id']; ?>
                </div>
            <?php
                    break;
                case 'failed':
            ?>
                <h2>Giao dịch thất bại</h2>
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <?php echo $result['transaction_id']; ?>
                </div>
            <?php
                    break;
            }
            endif;
            include '_order_response.php';
            ?>

        </div>
    </div>
</div>
