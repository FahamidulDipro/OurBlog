<?php
include "header.php";
?>
<div class="container mt-3">
<table class="table table-bordered">
<tr>
    <td><b>Browser</b></td>
    <td><?php echo $browser;?></td>
</tr>
<tr>
    <td><b>Browser Version</b></td>
    <td><?php echo $browser_version;?></td>
</tr>
<tr>
    <td><b>Operating System</b></td>
    <td><?php echo $os;?></td>
</tr>
<tr>
    <td><b>IP Address</b></td>
    <td><?php echo $ip_address;?></td>
</tr>

</table>

</div>


<?php
include "footer.php";
?>