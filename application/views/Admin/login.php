<?php
include "header.php";
?>
<div class="container mt-3">
    <h1 style="margin-top:20px;">Admin Form</h1>
    <hr>
    <?php
    echo form_open('Admin/login');
    ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <?php
                echo form_input(['class' => 'form-control', 'placeholder' => 'Username', 'type' => 'text', 'name' => 'username','value'=>set_value('username')]);
                ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <?php
                echo form_input(['class' => 'form-control', 'placeholder' => 'Password', 'type' => 'password', 'name' => 'password', 'value'=>set_value('password')]);
                ?>
            </div>
            <?php echo form_submit(['class' => 'btn btn-info', 'type' => 'submit', 'value' => 'Submit']); ?>
            <?php echo form_reset(['class' => 'btn btn-secondary', 'type' => 'reset', 'value' => 'Reset']); ?>
            <a href="register">Signup</a>
        </div>
        <div class="col-lg-6 text-danger mt-4">
            <?php
                echo form_error('username');
                echo "<br><br><br>";
            ?>
            <?php
                echo form_error('password');
                echo "<br>";
            ?>
        </div>
    </div>


</div>

<?php
include "footer.php";
?>