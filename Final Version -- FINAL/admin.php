<?php
$connect = mysqli_connect("localhost", "root", "", "system");

$query = "
 SELECT * FROM users ORDER BY NumV
";
$output='';
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
   <table id="example" class="display" style="width:100%">
   <thead>
    <tr>
     <th>Date</th>
     <th>Number of Visitor</th>
     <th>Name Of Visitor</th>
     <th>Company</th>
     <th>Purpose Of Visit</th>
     <th>Iqama</th>
     <th>Accompainied By</th>
     <th>Time In</th>
     <th>Time Out</th>
    </tr>
    </thead>
    <tbody>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["Date"].'</td>
    <td>'.$row["NumV"].'</td>
    <td>'.$row["NameV"].'</td>
    <td>'.$row["Company"].'</td>
    <td>'.$row["Purpose"].'</td>
    <td>'.$row["Iqama"].'</td>
    <td>'.$row["Accompainied"].'</td>
    <td>'.$row["check_In"].'</td>
    <td>'.$row["check_out"].'</td>

   </tr>


  ';
 }
 $output .='
</tbody>
 ';

 echo $output;
}
else
{
 echo 'Data Not Found';
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Admin Page</title>

     <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
     <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
     <script src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
     <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     <script src=""></script>

     <style media="screen">
     .title {
        background-color: #16a085;
        text-align: center;
        color: #fff;
     }
     img{
       width: 25px;
       height: 25px;
     }

     .subtitle{
       font-weight: 600;
       text-align: right;
       background-color: #16a085;
       color: #fff;
       padding: 2px 0px;
     }
     </style>

   </head>
   <body>
     <div class="title">
    <h1>ADMIN PAGE</h1>
    <div class="subtitle">
      Logout
      <a href="logout.php"><img src="img/LL.png" alt=""> </a>
    </div>


     </div>
     <br>



         <script type="text/javascript">
         $(document).ready(function() {
  $('#example').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          {
              extend: 'print',
              text: 'Print all',
              exportOptions: {
                  modifier: {
                      selected: null
                  }
              }
          },
          {
              extend: 'print',
              text: 'Print selected'
          },
          {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'pdf'
                ]
            }
      ],
      select: true
  } );
} );
         </script>





   </body>
 </html>
