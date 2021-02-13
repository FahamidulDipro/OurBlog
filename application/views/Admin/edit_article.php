<?php
include "header.php";
?>
<div class="container mt-3">
    <h1 style="margin-top:20px;">Edit Article</h1>
    <hr>
    <?php


    echo form_open('Admin/updateArticle');
    ?>
    <?php
    if ($msg = $this->session->flashdata('insert_success')) {
        echo '<div class="alert alert-success">' . $msg . '</div>';
    } else if ($error = $this->session->flashdata('insert_failed')) {
        echo '<div class="alert alert-danger>' . $error . '</div>';
    }
    ?>
    <?php
    if ($del_msg = $this->session->flashdata('delete_success')) {
        echo '<div class="alert alert-success">' . $del_msg . '</div>';
    } else if ($del_error = $this->session->flashdata('delete_failed')) {
        echo '<div class="alert alert-danger>' . $del_error . '</div>';
    }
    ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Article Title</label>
                <?php
                echo form_input(['class' => 'form-control', 'placeholder' => 'Article Title', 'type' => 'text', 'name' => 'article_title', 'value' => set_value('article_title',$article->article_title)]);
                ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Article Description</label>
                <?php
                echo form_textarea(['class' => 'form-control', 'placeholder' => 'Description', 'type' => 'text', 'name' => 'description', 'value' => set_value('description',$article->description)]);
                ?>
            </div>
            <?php
            $id = $this->session->userdata("id");
            echo form_hidden('user_id', $id);
            ?>
            <?php echo form_submit(['class' => 'btn btn-info', 'type' => 'submit', 'value' => 'Submit']); ?>
            <?php echo form_reset(['class' => 'btn btn-secondary', 'type' => 'reset', 'value' => 'Reset']); ?>
        </div>
        <div class="col-lg-6 text-danger mt-4">
            <?php
            echo form_error('article_title');
            echo "<br><br><br>";
            ?>
            <?php
            echo form_error('description');
            echo "<br>";
            ?>
        </div>
    </div>


</div>

<?php
include "footer.php";
?>