<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .mt-5 {
            margin-top: 12rem !important;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container col-8 mt-5">

        <table class="table table-striped table-primary table-hover">

            <tr>
                <!-- <th>ID</th> -->
                <th>S.no.</th>
                <th>Name</th>
                <th>Password</th>
                <th>image</th>
                <th>update</th>
                <th>delete</th>

            </tr>

            <?php
            foreach ($result as $key => $rows) {
                $images = explode(',', $rows->image);

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
                    <td> <a href="<?php echo base_url() . 'users/update_con/' . $rows->id; ?>"><button class="btn btn-warning">update</button></a></td>
                    <td> <a href="<?php echo base_url() . 'users/delete_con/' . $rows->id; ?>"><button class="btn btn-danger">delete</button></a></td>
                </tr>
            <?php
            }
            ?>
            </tr>
        </table>
        <!-- <td> <a href="<?php //echo base_url() . 'users/add'; 
                            ?>"><button class="btn btn-success float-start">add</button></a></td> -->
        <td> <a href="<?php echo base_url() . 'users'; ?>"><button class="btn btn-success float-end">back</button></a></td>
    </div>
</body>

</html>