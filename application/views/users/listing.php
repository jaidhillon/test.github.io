<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#call").fadeOut(2000);
            $("#cad").fadeOut(2000);
        });
    </script>
    <style>
        .button {
            /* background-image: url ('uploads\zYwoKGokumangaToriyama.png"') no-repeat; */
            background-image: url('http://localhost/ci/uploads/images1.jpg');
            background-repeat: no-repeat;
            background-position: center;

        }
    </style>
</head>

<body class="bg-dark">

    <span id="call" style="color:red;"><b><?php echo $this->session->flashdata('update'); ?></b></span>
    <span id="cad" style="color:red;"><b><?php echo $this->session->flashdata('insert'); ?></b></span>
    <div class="container col-8 mt-5 ">
        <div class="table-responsive">
            <td> <a href="<?php echo base_url() . 'users/add'; ?>"><button class="btn btn-success float-end button">add</button></a></td>
            <table class="table table-striped table-primary table-hover rounded">
                <tr class="">

                    <th>S.no.</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th>image</th>
                    <th>View</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>
                <?php
                if (!empty($result))
                    foreach ($result as $key => $rows) {

                        $images = explode(',', $rows->image);
                        // print_r($images);die;
                ?>
                    <tr class="align-middle">
                        <td> <?php echo $key + 1; ?></td>
                        <td> <?php echo $rows->name ?></td>
                        <td> <?php echo  $rows->pass ?></td>

                        <td>
                            <?php foreach ($images as $key => $row) {
                                //  print_r($row);die;

                            ?><img style="height:100px; width:100px;" class="rounded" title="<?php echo  $row ?>" src="<?php echo 'http://localhost/ci/uploads/' . $row; ?>">
                            <?php } ?>
                        </td>

                        <td> <a href="<?php echo base_url() . 'users/view_con?id=' . $rows->id; ?>"><button class="btn btn-secondary">View</button></a></td>
                        <td> <a href="<?php echo base_url() . 'users/update_con/' . $rows->id; ?>"><button class="btn btn-warning">update</button></a></td>
                        <td> <a href="<?php echo base_url() . 'users/delete_con/' . $rows->id; ?>"><button class="btn btn-danger delete">delete</button></a></td>
                    </tr>
                <?php
                    }
                ?>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>