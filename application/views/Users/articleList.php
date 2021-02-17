<?php
include "header.php";
?>
<!-- <div class="container mt-3">
<a href="<?php //echo base_url('Dynamic_dependent')?>"><div class="btn btn-info">View Demo</div></a>
  Hey articles here...
</div> -->

 <?php
    if ($del_msg = $this->session->flashdata('delete_success')) {
        echo '<div class="alert alert-success">' . $del_msg . '</div>';
    } else if ($del_error = $this->session->flashdata('delete_failed')) {
        echo '<div class="alert alert-danger>' . $del_error . '</div>';
    }
    ?>
<div class="container mt-5">
    <!-- <h1 class="mt-3"><span class="text-success">Login successful!</span> Welcome to Admin Panel</h1> -->
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Article Image</th>
                <th>Article Title</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>

            <?php
        // print_r($articles);
            if (count($articles)) {
                $count = $this->uri->segment(3)+1;
                // print_r($count);
                foreach ($articles as $art) {
                    echo ' <tr><td>'.$count++.'</td>
                    <td>Image</td>
                    <td>' . $art->article_title . '</td>
                    <td>' . $art->description . '</td>
                    <td>';
                  

                 
                }
            } else {
                echo '<tr><td colspan="3">No data available</td></tr>';
            }
            // print_r($articles);
            ?>

        </tbody>

    </table>
    <?php
    echo $this->pagination->create_links();
    ?>
</div>

<?php
include "footer.php";
?>
