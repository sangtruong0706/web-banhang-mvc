<?php
if (isset($message)) {
?>
<span><?=$message?></span>
<div>
    Bạn xem  <a href="<?=BASE_URL?>/cart/history"> lịch sử đơn hàng </a>tại đây nhé
</div>

<?php
}else{
?>
<span>Thanh toán thất bại. Vui lòng kiểm tra lại!!</span>
<?php
}
?>