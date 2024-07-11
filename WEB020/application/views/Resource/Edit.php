<?php $this->load->view('Home/Header', array('title' => 'Edit Resource', 'active_menu' => 'Home')); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resource</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cosmo/bootstrap.min.css"> -->
    <link href="<?= base_url('assets/bootswatch/dist/litera/bootstrap.min.css') ?>" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h2>Edit Resource</h2>
        <!-- Form untuk mengedit resource -->
        <form method="post" action="<?= site_url('resource/update/' . $resource['id']) ?>">
            <div class="form-group">
                <label for="resource_name">Resource Name</label>
                <input type="text" class="form-control" id="resource_name" name="resource_name" value="<?= $resource['resource_name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $resource['quantity'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" onclick="goBack()">Cancel</button>
        </form>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>
</html>

<?php $this->load->view('Home/Footer'); ?>
