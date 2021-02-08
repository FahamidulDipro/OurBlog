<?php
include "header.php";
?>
<div class="container mt-3">
<h1 style="margin-top:20px;">Admin Form</h1>
<hr>
<?php
    echo form_open('Admin/index');
?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <?php
                echo form_input(['class'=>'form-control','placeholder'=>'Username','type'=>'text']);
            ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <?php
                echo form_input(['class'=>'form-control','placeholder'=>'Password','type'=>'password']);
            ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <?php
                echo form_input(['class'=>'form-control','placeholder'=>'Confirm Password','type'=>'password']);
            ?>
        </div>
      <?php echo form_submit(['class'=>'btn btn-info','type'=>'submit','value'=>'Submit']);?>
      <?php echo form_reset(['class'=>'btn btn-secondary','type'=>'reset','value'=>'Reset']);?>
    
</div>

<?php
include "footer.php";
?>