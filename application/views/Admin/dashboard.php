<?php
include "header.php";
?>
 <?php
    if ($del_msg = $this->session->flashdata('delete_success')) {
        echo '<div class="alert alert-success">' . $del_msg . '</div>';
    } else if ($del_error = $this->session->flashdata('delete_failed')) {
        echo '<div class="alert alert-danger>' . $del_error . '</div>';
    }
    ?>
    
<div class="container mt-5">

    <a href="<?php echo base_url("Admin/addArticle");?>">
        <div class="btn  btn-primary mb-3">Add Article</div>
    </a>
    <a href="<?php echo base_url("Admin/checkDetails");?>">
        <div class="btn  btn-primary mb-3">Check Details</div>
    </a>

    <!-- <h1 class="mt-3"><span class="text-success">Login successful!</span> Welcome to Admin Panel</h1> -->
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Article Image</th>
                <th>Article Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody id="myTable">

            <?php
        // print_r($articles);
            if (count($articles)) {
                $count = $this->uri->segment(3)+1;
                // print_r($count);
                foreach ($articles as $art) {
                    echo ' <tr><td>'.$count++.'</td>
                    <td><img src="'. $art->image_path . '" height="100px" width="150px"></td>
                    <td>' . $art->article_title . '</td>
                    <td>' . $art->description . '</td>
                    <td>' . date('d M y h:i:s',strtotime($art->created_at)). '</td>
                    <td>
                    <form action=' . base_url("Admin/editArticle") . ' method="post">
                    <input type="hidden" name="id" value="' . $art->id . '">
                  
                    <input type="submit" class="btn btn-primary" value="Edit">
                    </td>
                    </form>
                    <td>';

                    echo'
                    <form action=' . base_url("Admin/delArticle") . ' method="post">
                    <input type="hidden" name="id" value="' . $art->id . '">
                  
                    <input type="submit" class="btn btn-danger" value="Delete">
                    
                    </form>';
                    // echo form_open('Admin/delArticle');
                    // echo  form_hidden('id', $art->id);
                    // echo form_submit(['name' => 'submit', 'value' => 'delete', 'class' => 'btn btn-danger']);
                    // form_close();

                    echo '</td>';
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