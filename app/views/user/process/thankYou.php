<!-- <?php
        if (isset($message)) {
        ?>
<span><?= $message ?></span>
<div>
    Bạn xem  <a href="<?= BASE_URL ?>/cart/history"> lịch sử đơn hàng </a>tại đây nhé
</div>

<?php
        } else {
?>
<span>Thanh toán thất bại. Vui lòng kiểm tra lại!!</span>
<?php
        }
?> -->
<?php
if (!empty($_GET['msg'])) {
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value) {
        echo '<span style="color:blue; font-weight:bold;" >' . $value . '</span>';
    }
}
?>