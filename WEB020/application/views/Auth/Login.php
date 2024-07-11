<?php $this->load->view('Home/Header', array('title' => 'Home', 'active_menu' => 'Home')); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <link href="<?= base_url('assets/bootswatch/dist/litera/bootstrap.min.css') ?>" rel="stylesheet">

</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <?php echo form_open('Auth/Login'); ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>">
                <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        <?php echo form_close(); ?>
        <p><a href="<?php echo site_url('Auth/Register'); ?>">Register</a></p>
    </div>
</body>
</html>
<?php $this->load->view('Home/Footer'); ?>
