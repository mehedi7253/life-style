<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 6/29/2020
 * Time: 3:18 PM
 */
?>

<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/index.js"></script>
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>



<script src="assets/bundles/datatables/datatables.min.js"></script>
<script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
<script src="assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
<script src="assets/bundles/datatables/export-tables/jszip.min.js"></script>
<script src="assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
<script src="assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
<script src="assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
<script src="assets/js/page/datatables.js"></script>
<script src="assets/bundles/summernote/summernote-bs4.js"></script>


<script src="assets/bundles/ckeditor/ckeditor.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/ckeditor.js"></script>


<script>
    $(document).ready(function(){
        DisplayData();

        $('#search').on('click', function(){
            if($('#search_data').val() == ""){
                alert("Please enter something first!");
            }else{
                var search = $('#search_data').val();
                var loader = $('<tr ><td colspan = "12"><center>Searching....</center></td></tr>');
                $('#data').empty();
                loader.appendTo('#data');

                setTimeout(function(){
                    loader.remove();
                    $.ajax({
                        url: 'search.php',
                        type: 'POST',
                        data: {
                            search: search
                        },
                        success: function(data){
                            $('#data').html(data);
                        }
                    });

                }, 3000);
            }
        });

        $('#refresh').on('click', function(){
            DisplayData();
        });


        function DisplayData(){
            $.ajax({
                url: 'data.php',
                type: 'POST',
                data: {
                    res: 1
                },
                success: function(data){
                    $('#data').html(data);
                }
            });
        }
    });
</script>

</body>

</html>
