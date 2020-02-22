<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist CRUD Codeigniter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        .mt40{
            margin-top: 40px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row mt40">
            <div class="col-md-10">
                <h2>Codeigniter Todolist CRUD</h2>
            </div>
            <div class="col-md-2">
                <a href="<?php echo base_url('add') ?>" class="btn btn-danger">Add Todolist</a>
            </div>
            <br><br>
        
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($todolists): ?>
                    <?php foreach($todolists as $todolist): ?>
                    <tr>
                        <td><?php echo $todolist->id; ?></td>
                        <td><?php echo $todolist->title; ?></td>
                        <td><?php echo $todolist->details; ?></td>
                        <td>
                            <?php echo $todolist->create_date; ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url('edit/'.$todolist->id) ?>" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="<?php echo base_url('delete/'.$todolist->id) ?>" method="post">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            
        </div>
    
    </div>
     
</body>
</html>