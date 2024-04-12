<!-- View Alumni Page in the All User Dashboard -->

<?php

// session_start();

// if(!isset($_SESSION['username']))
// {
//     header("location:login.php");
// }
// elseif($_SESSION['usertype']=='admin')
// {
//     header("location:login.php");
// }

$host="localhost";
$user="root";
$password="";
$db="alumni_project";

$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM alumni order by fname asc limit 25";

$result=mysqli_query($data,$sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.4.0/css/rowGroup.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="student.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <?php

    include 'admin_css.php';
    ?>
    <style type="text/css">
        
    main.table{
        width: 100%;
    height: 70vw;
    box-shadow: 0 0.4rem 0.8rem;
    border-radius: 0.8rem;
    overflow: hidden;
    padding-left: 17%;
        
    }
    .table_header{
        width: 100%;
    height: 5%;
    margin-top: 4%;
    padding: 0.8rem 1rem;
    background-color:#fff4;
    display:flex;
    /* justify-content:space-between; */
    justify-content:center;
    align-items:center;
    }
    
    .dataTables_wrapper .dataTables_filter input {
    border: 1px solid #aaa;
    border-radius: 2rem;
    padding: 3px 0.8rem;
    background-color: #fff5;
    margin-left: 3px;
    transition: 0.2s;
    }
    .dataTables_wrapper .dataTables_filter input:hover{
        width:20vw;
        background-color:#fff8;
        box-shadow:0 0.1rem 0.4rem #0002;
    }
    
    .table_body{
        width: 100%;
    max-height: calc(89% - 1.6rem);
    background-color:#fffb;
    margin: 0rem auto;
    border-radius: 0.6rem;
    overflow:auto;
    overflow:overlay;
    }
    .table_body::-webkit-scrollbar{
        width: 0.5rem;
        height: 1.5rem;
    }
    .table_body::-webkit-scrollbar-thumb{
        border-radius:0.5rem;
        visibility: hidden;
    }
    .table_body:hover::-webkit-scrollbar-thumb{
        visibility:visible;
    }
    table{
        width:100%;
    }
    table,th,td{
        /* padding: 2px;
    font-size: 11.5px;
    text-align: center; */
    border-collapse:collapse;
    padding:1rem;
    text-align:left;
    }
    /* td{
        padding:2px;
        background-color:skyblue;
        font-size:12px;
        text-align:center; 
    } */
    thead th{
        position: sticky;
        top: 0;
        left: 0;
        background-color: #d5d1defe;
    }
    tbody tr:nth-child(even){
        background-color:#0000000b;
    }
    tbody tr{
        --delay:0.1s;
        transition:0.5s ease-in-out var(--delay), background-color 0s;
        background-color:#b3dee5 !important;
    }
    tbody tr.hide{
        opacity:0;
        transform:translateX(100%);
    }
    tbody tr:hover{
        background-color:#fff6 !important;
    }
    tbody tr td{
        transition:0.2s ease-in-out;
    }
    tbody tr.hide td{
        padding:0;
        font:0/0 sans-serif;
        transition:0.2s ease-in-out 0.5s;
    }
    
    @media(max-width:1000px){
        td:not(:first-of-type){
            min-width: 12.1rem;

        }
    }
    .dataTables_wrapper {
    position: relative;
    clear: both;
    overflow-x: auto;
    display: block;
}
    
</style>
  
<body>
    
   <?php
    
    include 'student_sidebar.php';

   ?>

<main class="table">
<section class="table_header">
        <h1>Alumni Data</h1>
        <!-- <form action="search_1.php" method="post">
        <input type="submit" class="btn btn-info btn-sm" name="search" value="Search Alumni Data Here">
        
    </form><br> -->
    </section>
    <section class="table_body"> 

        <table id="alm-table">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Mid Name</th>
                <th>Last Name</th>
                <th>Registration Number</th>
                <th>Course</th>
                <th>Session</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
                <th>Address</th>
                <th>Action</th>
                
            </tr>
            </thead>
            <tbody>
            <?php

            while($info=$result -> Fetch_assoc())
            {

            ?>

            <tr>
                <td>
                    <?php
                    echo "{$info['fname']}";
                    ?>
                </td>
                <td>
                    <?php
                    echo "{$info['mname']}";
                    ?>
                </td>
                <td>
                    <?php
                    echo "{$info['lname']}";
                    ?>
                </td>
                <td>
                <?php
                    echo "{$info['registration']}";
                    ?>
                </td>
                <td>
                <?php
                    echo "{$info['batch']}";
                    ?>
                </td>
                <td>
                <?php
                    echo "{$info['a_session']}";
                    ?>
                </td>
                <td>
                <?php
                    echo "{$info['gender']}";
                    ?>
                </td>
                <td>
                <?php
                    echo "{$info['email']}";
                    ?>
                </td>
                <td>
                <?php
                    echo "{$info['phone']}";
                    ?>
                </td>
                <td>
                <?php
                    echo "{$info['company']}";
                    ?>
                </td>
                <td>
                <?php
                    echo "{$info['a_address']}";
                    ?>
                </td>
                <td>
                <?php
                    
                    echo "<a class='btn btn-primary' href='profile_login.php'>Update</a>";
                    ?>
                    
                </td>

            </tr>

            <?php

            }

            ?>
            </tbody>
        </table>
        
        </section>
    </main>

<script src="bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#alm-table thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#alm-table thead');
 
    var table = $('#alm-table').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();
 
                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    });
});
</script>

</body>
</html>