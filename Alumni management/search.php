<?php
$servername='localhost';
$username="root";
$password="";
 
try
{
    $con=new PDO("mysql:host=$servername;dbname=alumni_project",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo 'connected';
}
catch(PDOException $e)
{
    echo '<br>'.$e->getMessage();
}
$searchErr = '';
$alumni_details='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from alumni where registration like '%$search%' or fname like '%$search%'");
        $stmt->execute();
        $alumni_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($employee_details);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
 
?>
<html>
<head>
<title>Alumni Search</title>
<link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-theme.css" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.00/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.4.0/css/rowGroup.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="admin.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- <script src="./filter.js"></script> -->
<?php

    include 'admin_css.php';
    ?>
<style>
.container{
    /* width:70%;
    height:30%;
    padding:20px; */
    text-align: center;
    margin-left: 14%;
    margin-top: 5%;
}
.table_th{
        padding: 11px;
        font-size: 11px;
        text-align:center;
        
    }
    .table_td{
        padding:3px;
        background-color:skyblue;
        font-size:12px;
        text-align:center;
        
    }
    .table-responsive{
        padding-left:25px;
    }
</style>
</head>
 
<body>
<?php
    
    include 'admin_sidebar.php';

   ?>
    <div class="container">
    <h3><u>Alumni Data Search</u></h3>
    <br/><br/>
    <form class="form-horizontal" action="#" method="post">
    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-4" for="email"><b>Search Alumni Information:</b>:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="search" placeholder="search here">
            </div>
            <div class="col-sm-2">
              <button type="submit" name="save" class="btn btn-success btn-sm">Submit</button>
            </div>
        </div>
        <div class="form-group">
            <span class="error" style="color:red;">* <?php echo $searchErr;?></span>
        </div>
         
    </div>
    </form method="post" action="">
    <!-- <br/><br/> -->
    <table>
    <tr>
    <td style="border:hidden; padding-left: 65px;"><a href="add_alumni.php"><button type="button" class="btn btn-primary">Add New</button></a></td>
    <td style="border:hidden; padding-left: 360px;"><h3><u>Search Result</u></h3></td>
    <form action="to_student.php" method="post">
    <td class="tab tab-btn" style="border:hidden; padding-left: 300px;"><p><input type="submit" value=">>>>> Send to Student" class="btn btn-success" name="transfer"></p>
    </form>
    </tr>
    </table>
    <div class="table-responsive"> 
    <center>         
      <table class="table" border="1px" id="alm-table">
        <thead>
          <tr>
            <th class="table_th"><input type="checkbox" onclick="toggle(this);" id="checkAll">Select All</th>
            <th class="table_th">First Name</th>
            <th class="table_th">Mid Name</th>
            <th class="table_th">Last Name</th>
            <th class="table_th">Registration Number</th>
            <th class="table_th">Course
                <!-- <select class="table-filter">
                    <option value="all"></option>
                </select> -->
            </th>
            <th class="table_th">Session
                <!-- <select class="table-filter">
                    <option value="all"></option>
                </select> -->
            </th>
            <th class="table_th">Gender
                <!-- <select class="table-filter">
                    <option value="all"></option>
                </select> -->
            </th>
            <th class="table_th">Email</th>
            <th class="table_th">Phone</th>
            <th class="table_th">Company</th>
            <th class="table_th">Address</th>
            <th class="table_th">Password</th>
            <th class="table_th">Action</th>
          </tr>
        </thead>
        <tbody>
                <?php
                 if(!$alumni_details)
                 {
                    // echo '<tr>No data found</tr>';
                    echo '<h4 class=text-danger>No data found <br></h4>';
                 }
                 else{
                    foreach($alumni_details as $value)
                    {
                ?>
                    <tr>
                        <td class="table_td"><input type="checkbox" name='check[]' value="<?php echo $value['id'] ?>"></td>
                        <td class="table_td"><?php echo $value['fname'];?></td>
                        <td class="table_td"><?php echo $value['mname'];?></td>
                        <td class="table_td"><?php echo $value['lname'];?></td>
                        <td class="table_td"><?php echo $value['registration'];?></td>
                        <td class="table_td"><?php echo $value['batch'];?></td>
                        <td class="table_td"><?php echo $value['a_session'];?></td>
                        <td class="table_td"><?php echo $value['gender'];?></td>
                        <td class="table_td"><?php echo $value['email'];?></td>
                        <td class="table_td"><?php echo $value['phone'];?></td>
                        <td class="table_td"><?php echo $value['company'];?></td>
                        <td class="table_td"><?php echo $value['a_address'];?></td>
                        <td class="table_td"><?php echo $value['a_password'];?></td>
                        <td class="table_td">
                            <?php
                                echo "<a onClick=\"javascript:return confirm('Are you sure to Delete this')\" class='btn btn-danger' href='delete.php?student_id={$value['id']}'>Delete</a>";
                                echo "<a class='btn btn-primary' href='update_alumni.php?student_id={$value['id']}'>Update</a>";
                            ?>
                    
                        </td>   
                    </tr>
                         
                <?php
                    }
                     
                 }
                ?>
             
         </tbody>
      </table>
      <!-- <script>
        window.onload=(){
            console.log(document.querySelector("#alm-table > tr:nth-child(1) . td:nth-child(2)").innerHTML);
        };

        getUniqueValuesFromColumn()
      </script> -->
    </center>
    </div>
</div>
<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script type="text/javascript">  
    function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}


// function loadDatatableAjax(){
//     $(document).ready(function () {
//         // $('#alm-table thead tr')
//         // .clone(true)
//         // .addClass('filters')
//         // .appendTo('#alm-table thead'); 
//     $('#alm-table').DataTable({
//         // orderCellsTop: true,
//         // fixedHeader: true,
//         initComplete : function(){
//             // var api = this.api();
//             var notApplyFilterOnColumn = [0,1,2,3,4,8,9,12,13];
//             var inputFilterOnColumn = [10,11];
//             var showFilterBox = 'afterHeading';
//             $('.gtp-dt-filter-row').remove();
//             var theadSecondRow = '<tr class = "gtp-dt-filter-row">';
//             $(this).find('thead tr th').each(function(index){
//                 theadSecondRow += '<td class="gtp-dt-select-filter-' +index+ '"></td>';
//             });
//             theadSecondRow +='</tr>';

//             if(showFilterBox === 'beforeHeading'){
//                 $(this).find('thead').prepend(theadSecondRow);
//             }else if(showFilterBox === 'afterHeading'){
//                 $(theadSecondRow).insertAfter($(this).find('thead tr'));
//             }
//             this.api().columns().every(function(index){
//                 var column= this;
//                 if(inputFilterOnColumn.indexOf(index) >= 0 && notApplyFilterOnColumn.indexOf(index) < 0){
//                     $('td.gtp-dt-select-filter-' +index).html('<input type="text" class="gtp-dt-input-filter"/>');
//                     $( 'td input.gtp-dt-input-filter').on('keyup change clear', function(){
//                         if(column.search() !== this.value){
//                             column
//                             .search(this.value)
//                             .draw();
//                         }
//                     });
//                 }else if(notApplyFilterOnColumn.indexOf(index)<0){
//                     var select=$('<select><option value="">Select</option></select>')
//                     .on('change',function(){
//                         var val = $.fn.dataTable.util.escapeRegex(
//                             $(this).val()
//                         );
//                         column
//                         .search( val ? '^'+val+'$' : '', true, false)
//                         .draw();
//                     });
//                     $('td.gtp-dt-select-filter-' + index).html(select);
//                     column.data().unique().sort().each(function( d,j ){
//                         select.append( '<option value="'+d+'">'+d+'</option>')
//                     });
//                 }
//             });
//         }
//     });
// });


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