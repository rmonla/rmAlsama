<?php
session_start();
session_destroy();
//header("Location: index.php");
?>
<script type="text/javascript">
window.onload = window.parent.location.href = "index.php";
</script>
