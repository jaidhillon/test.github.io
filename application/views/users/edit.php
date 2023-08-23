<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <?php
  //   $i=1;
  foreach ($result as $key => $rows) {
    $images = explode(',', $rows->image);

  ?>
    <div class="container mt-5 col-6">

      <form action="" method="POST" enctype="multipart/form-data">
        <!-- <h1>Register</h1> -->
        <!-- <p>Please fill in this form to create an account.</p> -->
        <div class="form-floating ">

          <input type="text" name="id" id="id" class="form-control" placeholder="id" value="<?php echo $rows->id; ?>" readonly>
          <label for="id">id</label>

        </div>

        <div class="form-floating ">
          <input type="text" name="name" id="name" class="form-control" placeholder="name" value="<?php if (isset($_POST['name'])) {
                                                                                                    echo $_POST['name'];
                                                                                                  } else {
                                                                                                    echo $rows->name;
                                                                                                  }  ?>">
          <label for="name">name</label>
          <span style="color:red;"><?php echo form_error('name'); ?></span>

        </div>

        <div class="form-floating">
          <input type="text" name="pass" id="pass" class="form-control" placeholder="pass" value="<?php if (isset($_POST['pass'])) {
                                                                                                    echo $_POST['pass'];
                                                                                                  } else {
                                                                                                    echo $rows->pass;
                                                                                                  } ?>">
          <label for="pass">pass</label>
          <span style="color:red;"><?php echo form_error('pass'); ?></span>

        </div>

        <td>
          <?php foreach ($images as $key => $row) {
            //  print_r($row);die;

          ?><img style="height:100px; width:100px;" title="<?php echo  $row ?>" src="<?php echo 'http://localhost/ci/uploads/' . $row; ?>">
          <?php } ?>
        </td>

        <input type="hidden" name="oldimg" value="<?php echo $rows->image; ?>"><br>
        <input type="file" name="image"><br>
        <input type="submit" class="btn btn-success" value="update">

      </form>
      <a href="<?php echo base_url() . 'users'; ?>"><button class="btn btn-success float-end">back</button></a>
    </div>

  <?php
  }
  ?>
</body>

</html>