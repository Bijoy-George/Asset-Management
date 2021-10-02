<script src="/assets/js/jquery.min.js">


</script>


<script src="/assets/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>






<script>
    $(document).ready(function() {


        $('#myTable').DataTable();
        $('#uTable').DataTable();
        $('#catTable').DataTable();
        $('.chosen-select').chosen();

        $(".history").click(function() {
            var id = $(this).attr("history");
            $.ajax({
                url: "a_history.php",
                data: {
                    id: id
                },
                dataType: "HTML",
                type: "POST",
                success: function(res) {
                    $("#history_form .modal-body").html(res);
                    $("#hisTable").DataTable();
                }
            });
        });


        $(".u-history").click(function() {
            var id = $(this).attr("u_history");
            $.ajax({
                url: "u_history.php",
                data: {
                    id: id
                },
                dataType: "HTML",
                type: "POST",
                success: function(res) {
                    $("#u_history_form .modal-body").html(res);
                    $("#U_Table").DataTable();
                }
            });
        });




        $(".asset-assign").click(function() {
            var id = $(this).attr("assign");

            $.ajax({

                url: "assign.php",
                data: {
                    id: id
                },
                dataType: "HTML",
                type: "POST",
                success: function(res) {
                    $("#assign_form .modal-body").html(res);
                }

            });


        });


        $(".edit-asset").click(function() {
            var id = $(this).attr("assign");

            $.ajax({

                url: "a_edit.php",
                data: {
                    id: id
                },
                dataType: "HTML",
                type: "POST",
                success: function(res) {
                    $("#assets_edit_form .modal-body").html(res);
                }

            });


        });

        $(".asset_sell").click(function() {
            var user_id = $(this).attr("assign");
            var productName = $(this).attr("product-name");
            var price = $(this).attr("price");
            var assignedNumber = $(this).attr("number-assign-product");
            var asset_id = $(this).attr("asset_id");

            $.ajax({

                url: "a_sell.php",
                data: {
                    user_id: user_id,
                    productName:productName,
                    price:price,
                    assignedNumber:assignedNumber,
                    asset_id:asset_id,
                },
                dataType: "HTML",
                type: "POST",
                success: function(res) {
                    $("#asset_sell .modal-body").html(res);
                }

            });


        });


        $(document).on('click', '.all-data', function() {

            var id = $(this).attr('my-id');

            $.ajax({

                url: "asset_detail.php",
                data: {
                    id: id
                },
                dataType: "HTML",
                type: "POST",
                success: function(modal) {
                    $('#asset_detail .modal-body').html(modal);

                }

            });




        });



    });

</script>


</body>

</html>
