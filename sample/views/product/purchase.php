<div class="container">
    <h2>Xác nhận đơn hàng</h2>
    <p>&nbsp;</p>
    <?php $this->renderPartial('_order_response', $result) ?>
    <div class="row">
        <table class="table table-striped">
            <tr>
                <td><b>Tên sản phẩm:</b></td>
                <td><?= $result['product']->product_name ?></td>
            </tr>
            <tr>
                <td><b>Tổng tiền:</b></td>
                <td><?= $result['product']->total_amount; ?></td>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="col-12-xs">
            <form action="" method="post">
                <div class="form-group">
                    <label class="col-3-xs" for="custName">Tên khách hàng</label>
                    <input class="col-9-xs form-control" type="text" name="custName" value="<?= $result['form']->custName; ?>">
                </div>
                <div class="form-group">
                    <label class="col-3-xs" for="custAddress">Địa chỉ</label>
                    <input class="col-9-xs form-control" type="text" name="custAddress" value="<?= $result['form']->custAddress; ?>">
                </div>
                <div class="form-group">
                    <label class="col-3-xs" for="custEmail">Email</label>
                    <input class="col-9-xs form-control" type="text" name="custEmail" value="<?= $result['form']->custEmail; ?>">
                </div>
                <div class="form-group">
                    <label class="col-3-xs" for="custGender">Giới tính</label>
                    <select class="col-9-xs form-control" name="custGender">
                        <option value="M">Nam</option>
                        <option value="F">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-3-xs" for="custPhone">Số điện thoại</label>
                    <input class="col-9-xs form-control" type="text" name="custPhone" value="<?= $result['form']->custPhone; ?>">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
