<?php
include "header.php";
?>
<div class="container mt-3">
    <select class="form-select" aria-label="Default select example" id="country">
        <option selected>Select Country</option>
        <?php

        foreach ($country as $row) {
            echo '<option value="' . $row->id . '">' . $row->country_name . '</option>';
        }
        ?>

    </select>

</div>
<div class="container mt-3">
    <select class="form-select" aria-label="Default select example" id="state">
        <option selected>Select State</option>
        <?php

        foreach ($state as $row2) {
            echo '<option value="' . $row2->id . '">' . $row2->state_name . '</option>';
        }
        ?>

    </select>

</div>
<div class="container mt-3">
    <select class="form-select" aria-label="Default select example" id="city">
        <option selected>Select City</option>
        <?php

        // foreach ($city as $row3) {
        //     echo '<option value="' . $row3->id . '">' . $row3->city_name . '</option>';
        // }
        ?>

    </select>
    
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#country').change(function() {
            var country_id = $('#country').val();
            // document.getElementById("hidden").value = country_id;
            // alert(country_id);
            if(country_id != ''){
                $.ajax({
                    url:"<?php echo base_url('Dynamic_dependent/fetchState');?>",
                    method:"POST",
                    data:{country_id:country_id},

                    success:function(data){
                        $('#state').html(data);
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            }

        });
    });
</script>


<?php
include "footer.php";
?>