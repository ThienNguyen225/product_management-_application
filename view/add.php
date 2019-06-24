<?php
//include "model/Products.php";
//include "model/ProductsDatabase.php";
//include "model/DatabaseConnect.php";
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Thêm mới khách hàng</h1>
        </div>
        <div class="col-12">
            <form method="post">
                <div class="form-group">
                    <label>Tên khách sản phẩm</label>
                    <input type="text" class="form-control" name="name"  placeholder="Nhập tên" required>
                </div>
                <div class="form-group">
                    <label>Nhà sản xuất</label>
                    <input type="text" class="form-control" name="producer" placeholder="Nhà sản xuất" required>
                </div>
                <div class="form-group">
                    <label>Giá bán</label>
                    <input type="number" class="form-control" name="price" placeholder="Giá bán" required>
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input type="number" class="form-control" name="quantity" placeholder="Số lượng" required>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
</div>
