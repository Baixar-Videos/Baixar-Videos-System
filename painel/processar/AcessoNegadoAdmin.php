<?php
if ($USER['usuario'] != "admin"){
echo '
<script>
CarregarPG("403", "");
</script>
';
return;
}
?>