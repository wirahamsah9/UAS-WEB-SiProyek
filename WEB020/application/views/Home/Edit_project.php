<?php $this->load->view('Home/Header', array('title' => 'Home', 'active_menu' => 'Home')); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cosmo/bootstrap.min.css"> -->
    <link href="<?= base_url('assets/bootswatch/dist/litera/bootstrap.min.css') ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <h2>Edit Project</h2>
        <?php echo validation_errors(); ?>
        <?php echo form_open('Home/Edit_project/'.$project['id']); ?>
            <div class="form-group">
                <label for="project_name">Project Name</label>
                <input type="text" class="form-control" name="project_name" id="project_name" value="<?php echo $project['project_name']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description"><?php echo $project['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" name="start_date" id="start_date" value="<?php echo $project['start_date']; ?>">
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" class="form-control" name="end_date" id="end_date" value="<?php echo $project['end_date']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" onclick="goBack()">Cancel</button>
        <?php echo form_close(); ?>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>
</html>

<?php $this->load->view('Home/Footer'); ?>
