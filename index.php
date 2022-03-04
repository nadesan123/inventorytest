<html>

<head>

<title>LEDSone Inventory Checker</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<style>

body
  {
   margin:0;
   padding:0;
  }
  .card
  {
   padding:20px;
   border:1px solid #ccc;
   border-radius:5px;
   margin-top:25px;
   box-sizing:border-box;
  }

  .editupdatecell
  {
    background-color: #e9eff7;
    text-align: center;
  }

  table.dataTable td, th {
  font-size: 2em;
}

span {
    border: 1px solid #CCC;
    width: 200px;
    display: inline-block;
    white-space: nowrap;
    overflow: hidden;
}

  </style>
  
 </head>

 <body>
 
 <div class="content-wrapper">

 <section class="content">

 <div class="card">

<div class="card-header">
<h4>

    Inventory Checker
    
</h4>
</div>

<div class="card-body">

<table id="inv_data" class="table table-bordered" style="width:100%">

    <thead>

    <tr>

        <th>SKU tyyyeye</th>

        <th>Unit 2 test 123</th>

        <th>Location</th>

    </tr>

    </thead>

</table>

</div>

</div>

</section>

</div>

</body>

</html>

<script type="text/javascript" language="javascript" >

 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()

  { 

   var val = "<?php echo $id; ?>";

   var dataTable = $('#inv_data').DataTable({

    dom: 'Bfrtip',

    "language": {

            "infoFiltered": "(Total Inv List _MAX_ )"
        },
        columnDefs: [
    { className: 'text-center', targets: [0, 1, 2] }],
        lengthMenu: [
            [10, 25, 50, 100, -1],
            ['10 rows', '25 rows', '50 rows', '100 rows', 'Show all']
          ],
    "iDisplayLength": -1,
    "responsive" :true,
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch.php",
     type:"POST",
     data: { id : val },
    }
   });
  }
  
  
 });
</script>

