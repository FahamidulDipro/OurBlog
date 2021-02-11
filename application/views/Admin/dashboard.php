<?php
include "header.php";
?>
<div class="container mt-5">

        <a href="addArticle"><div class="btn  btn-primary mb-3">Add Article</div></a>

    <!-- <h1 class="mt-3"><span class="text-success">Login successful!</span> Welcome to Admin Panel</h1> -->
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Article Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>

            <?php
            if (count($articles)) {
                foreach ($articles as $art) {
                    echo ' <tr><td>1</td>
                    <td>' . $art->article_title . '</td>
                    <td><a href="#" class="btn btn-primary">Edit</a></td><td>';

                   echo form_open('Admin/delArticle');
                   echo  form_hidden('id',$art->id);
                   echo form_submit(['name'=>'submit','value'=>'delete','class'=>'btn btn-danger']);
                    form_close();
                    echo '</td>';
                }
            } else {
                echo '<tr><td colspan="3">No data available</td></tr>';
            }
                // print_r($articles);
            ?>

        </tbody>
    </table>
</div>

<?php
include "footer.php";
?>