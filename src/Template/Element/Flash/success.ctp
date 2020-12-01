<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script>
    toastr.options = {
        positionClass: "toast-top-center",
        toast: true,
        showConfirmButton: false,
        timer: 5000,
    }

    toastr.success('<?= $message ?>');
</script>