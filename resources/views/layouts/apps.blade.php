<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>ACADEMICS MANAGEMENT</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
            <script>
function getStudent(val) {
    $.ajax({
    type: "POST",
    url: "get_student.php",
    data:'classid='+val,
    success: function(data){
        $("#studentid").html(data);
        
    }
    });
$.ajax({
        type: "POST",
        url: "get_student.php",
        data:'classid1='+val,
        success: function(data){
            $("#subject").html(data);
            
        }
        });
}
    </script>
<script>

function getresult(val,clid) 
{   
    
var clid=$(".clid").val();
var val=$(".stid").val();;
var abh=clid+'$'+val;
//alert(abh);
    $.ajax({
        type: "POST",
        url: "get_student.php",
        data:'studclass='+abh,
        success: function(data){
            $("#reslt").html(data);
            
        }
        });
}
</script>
  </head>
  <body>
  

  <nav  class="navbar fixed-top bg-info">
   
    <a class="navbar-brand" class="pull-center" href="/students">ACADEMICS MANAGEMENT SYSTEM</a>

    
    @yield('nav')
  </nav>




  @yield('content')




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
{{-- ajax Form Add Post--}}
  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Course');
  });
  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addItem',
      data: {
        '_token': $('input[name=_token]').val(),
        'name': $('input[name=name]').val(),
        'code': $('input[name=code]').val(),
        'school': $('input[name=school]').val(),
        'department': $('input[name=department]').val()
      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.name);
          $('.error').text(data.errors.code);
          $('.error').text(data.errors.school);
          $('.error').text(data.errors.department);
        } else {
          $('.error').remove();
          $('#table').append("<tr class='post" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.name + "</td>"+
          "<td>" + data.code + "</td>"+
          "<td>" + data.school + "</td>"+
           "<td>" + data.department + "</td>"+
          "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-code='" + data.code  + "' data-school='" + data.school  + "' data-department='" + data.department + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-code='" + data.code  + "' data-school='" + data.school  + "' data-department='" + data.department + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-code='" + data.code  + "' data-school='" + data.school  + "' data-department='" + data.department + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
        }
      },
    });
    $('#name').val('');
    $('#code').val('');
    $('#school').val('');
    $('#department').val('');
  });

// function Edit POST
$(document).on('click', '.edit-modal', function() {
$('#footer_action_button').text(" Update Post");
$('#footer_action_button').addClass('glyphicon-check');
$('#footer_action_button').removeClass('glyphicon-trash');
$('.actionBtn').addClass('btn-success');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit');
$('.modal-title').text('Course Edit');
$('.deleteContent').hide();
$('.form-horizontal').show();
$('#fid').val($(this).data('id'));
$('#na').val($(this).data('name'));
$('#co').val($(this).data('code'));
$('#sc').val($(this).data('school'));
$('#de').val($(this).data('department'));
$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    type: 'POST',
    url: 'editItem',
    data: {
'_token': $('input[name=_token]').val(),
'id': $("#fid").val(),
'name': $('#na').val(),
'code': $('#co').val(),
'school': $('#sc').val(),
'department': $('#de').val()
},
success: function(data) {
      $('.post' + data.id).replaceWith(" "+
      "<tr class='post" + data.id + "'>"+
      "<td>" + data.id + "</td>"+
      "<td>" + data.name + "</td>"+
      "<td>" + data.code + "</td>"+
      "<td>" + data.school + "</td>"+
      "<td>" + data.department + "</td>"+
 "<td><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-code='" + data.code  + "' data-school='" + data.school  + "' data-department='" + data.department + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-code='" + data.code  + "' data-school='" + data.school  + "' data-department='" + data.department + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-code='" + data.code  + "' data-school='" + data.school  + "' data-department='" + data.department + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
          "</tr>");
    }
  });
});


// form Delete function
$(document).on('click', '.delete-modal', function() {
$('#footer_action_button').text(" Delete");
$('#footer_action_button').removeClass('glyphicon-check');
$('#footer_action_button').addClass('glyphicon-trash');
$('.actionBtn').removeClass('btn-success');
$('.actionBtn').addClass('btn-danger');
$('.actionBtn').addClass('delete');
$('.modal-title').text('Delete Course');
$('.id').text($(this).data('id'));
$('.deleteContent').show();
$('.form-horizontal').hide();
$('.name').html($(this).data('name'));
$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    type: 'POST',
    url: 'deleteItem',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.id').text()
    },
    success: function(data){
       $('.post' + $('.id').text()).remove();
    }
  });
});

  // Show function
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('#i').text($(this).data('id'));
  $('#n').text($(this).data('name'));
  $('#c').text($(this).data('code'));
  $('#s').text($(this).data('school'));
  $('#d').text($(this).data('department'));
  $('.modal-title').text('Show Course');
  });
</script>
  </body>
</html>
