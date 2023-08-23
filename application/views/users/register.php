<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
  <!--end::Fonts-->
  <!--begin::Page Vendor Stylesheets(used by this page)-->
  <link href="http://localhost/zest_payments/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
  <!--end::Page Vendor Stylesheets-->
  <link href="http://localhost/zest_payments/assets/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css" />
  <!--begin::Global Stylesheets Bundle(used by all pages)-->

  <link href="http://localhost/zest_payments/assets/css/select2.css" rel="stylesheet" type="text/css" />
  <link href="http://localhost/zest_payments/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href="http://localhost/zest_payments/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
  <link href="http://localhost/zest_payments/assets/css/sumoselect.css" rel="stylesheet" type="text/css" />
  <link href="http://localhost/zest_payments/assets/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--end::Global Stylesheets Bundle-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script src="http://localhost/zest_payments//assets/js/jquery.sumoselect.min.js"></script>
  <script src="http://localhost/zest_payments//assets/js/bootstrap-datepicker.js"></script>

  <!-- ---- Bootstrap----------- -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <!-- ------------------------- -->

  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

  <script src="http://localhost/zest_payments/assets/jquery-alert-dialogs/js/jquery.alerts.js" type="text/javascript"></script>
  <link href="http://localhost/zest_payments/assets/jquery-alert-dialogs/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- <link rel="stylesheet" type="text/css" href="http://localhost/zest_payments/assets/global/plugins/select2/select2.css"/> -->
  <script src="http://tekshapers.info/deskpax_space/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>

  <script src="http://localhost/zest_payments/assets/js/jquery-migrate.min.js" type="text/javascript"></script>


</head>

<body class="bg-dark">
  <span></span>
  <div class="container mt-5 col-6">

    <form action="" method="POST" enctype="multipart/form-data" id="add_form">

      <div class="form-floating ">
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php if (isset($_POST['name'])) {
                                                                                                  echo $_POST['name'];
                                                                                                } ?>">
        <label for="name">Name</label>

        <span style="color:red;"><?php echo form_error('name'); ?></span>
      </div>

      <div class="form-floating ">
        <input type="text" class="form-control" name="pass" id="pass" placeholder="Pass" value="<?php if (isset($_POST['pass'])) {
                                                                                                  echo $_POST['pass'];
                                                                                                } ?>">
        <label for="pass">Pass</label>

        <span style="color:red;"><?php echo form_error('pass'); ?></span>
      </div>

      <div class="form-floating ">

        <input type="text" class="form-control email_c" id="email1" lang="1" placeholder="Enter value" name="add_more[]">
        
        <label for="pass">Enter value</label>

        <span class="text text-danger" id="error1"></span>
      </div>

      <input type="hidden" name="max_val" id="max_val" value="1" />

      <button type="button" class="btn btn-success add_more">Add</button><br>

      <input type="file" name="image" style="color:green;"><br>
      <span style="color:red;"><?php echo form_error('image'); ?></span>
      <!-- <input type="submit" class="btn btn-success submit submit_val" value="submit" name="submit"> -->
      <button type="submit" class="btn btn-success submit submit_val">submit</button>
      <!-- <p>Already have an account? <a href="#">Sign in</a>.</p> -->
    </form>
    <a href="<?php echo base_url() . 'users'; ?>"><button class="btn btn-info float-end">back</button></a>
  </div>





  <script>
    $('#add_form').validate({ // initialize the plugin
      rules: {
        name: {
          required: true,
        },
        pass: {
          required: true,
        },
        image: {
          required: true,
        },

      },
      messages: {
        name: {
          required: 'Name is required.',
        },
        pass: {
          required: 'pass is required.',
        },
        image: {
          required: 'image is required.',
        },

      }

    });
    $(".add_more").click(function() {
      var x = $("#max_val").val();
      x++;
      var html = ' <div class="form-group rem_div' + x + '">';
      html += ' <label class="control-label col-sm-2" for="email">Email:</label>';
      html += '  <div class="col-sm-8">';
      html += '   <input type="text" class="form-control email_c" id="email' + x + '" lang="' + x + '" placeholder="Enter email" name="email">';
      html += '  <span class="text text-danger" id="error' + x + '"></span>';
      html += '    </div>';
      html += '    <div class="col-sm-2">';
      html += '    <button type="button" class="btn btn-danger rem_more" lang="' + x + '">Rem</button>';
      html += '   </div>';
      html += '   </div>';

      $(".add_div").append(html);
      $("#max_val").val(x);
    });

    $(document).on("click", ".rem_more", function() {
      var y = $(this).attr('lang');
      $('.rem_div' + y + '').remove();

    });
    $(document).on("click", ".submit11", function() {
      var arr_new = [];
      var valu_unique = [];

      $(".email_c").each(function() {
        arr_new.push($(this).val());
        if ($(this).val() == '') {
          $('#error' + $(this).attr('lang')).text('Empty field!');

        } else {
          $('#error' + $(this).attr('lang')).text('');
          // alert($(this).val());
        }
      });
      // console.log(arr);
      var unique = arr_new.filter(function(itm, i) {
        if (i == arr_new.indexOf(itm)) {

          valu_unique[i] = itm;
          // alert(i);
        }
        // return i == arr.indexOf(itm);
      });
      // console.log(valu);
      // console.log(unique);
      valu_unique.forEach(function(val, key) {
        arr_new.forEach(function(v, k) {
          if (key != k && val == v) {
            if (v) {
              $('#error' + (k + 1)).text("duplicate " + v);
            }
          }
        });
      });
    });
    //  $(document).on("click",".submit_val",function(){
    // $("#add_form").submit(function(event) {
    // event.preventDefault(); 

    //  });
  </script>
</body>

</html>