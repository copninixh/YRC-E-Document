<?php
    include("connect/connect.php");
    if(isset($_GET['d_id'])){
        $d_id = filter_input(INPUT_GET , 'd_id' , FILTER_SANITIZE_NUMBER_INT);
        $sql = "SELECT * FROM document WHERE d_id = '$d_id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>:: YRC E-Document ระบบสารบรรณคำสั่งอิเล็กทรอนิกส์อัจฉริยะ ::</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
        <link
        href="https://fonts.googleapis.com/css?family=Kanit|Niramit|Pattaya|Pridi|Sarabun|Athiti|Chakra+Petch|K2D|Krub|Mitr:wght@500|Mitr|Pridi|Athiti&display=swap"
        rel="stylesheet">
    </head>
    <style>
        body {
            font-family: "Kanit", sans-seirf;
        }
    </style>
    <body>
        <br />
        <br />
        <div class="container"><h1>เพิ่มรายชื่อครูผู้สอน</h1>
            <hr>
           
            <div class="row">
               
                <div class="col-md-12">
                <div class="form-group">
                    <form action="process/add_teacher_another.php" method="post" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="true" name="teacher-form">
                        <label>ใส่ชื่อครูผู้สอน</label>
                            <input type="text" id="search_data" name="search_data" placeholder="" autocomplete="off" class="" />
                            <div style="margin-top: 10px; margin-bottom: 10px;">
                   
                              
                           
                            </div>

                            <input type="text" value="<?php echo $row[0]; ?>" name="d_id" style="display: none;">
                            <br>

                            <button name="add_teacher" type="submit" class="btn btn-primary" id="search">เพิ่มรายชื่อครู</button>
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
    </body>
</html>
<script>
  $(document).ready(function(){
      
    $('#search_data').tokenfield({
        autocomplete :{
            source: function(request, response)
            {
                jQuery.get('fetch-teachers.php', {
                    query : request.term
                }, function(data){
                    data = JSON.parse(data);
                    response(data);
                });
            },
            delay: 100
        }
    });

    $('#search').click(function(){
        $('#country_name').text($('#search_data').val());
    });

  });
</script>