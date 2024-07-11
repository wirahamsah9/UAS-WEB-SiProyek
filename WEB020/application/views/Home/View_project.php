<?php $this->load->view('Home/Header', array('title' => 'View Project', 'active_menu' => 'Home')); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cosmo/bootstrap.min.css"> -->
    <link href="<?= base_url('assets/bootswatch/dist/litera/bootstrap.min.css') ?>" rel="stylesheet">

    <style>
        .active {
            text-shadow: 2px 2px 4px rgba(20, 30, 117, 0.5); /* Add text shadow nav-aktif */
        }

        /* Apply font style to the card body */
        .card-body {
            font-family: 'Arial', sans-serif; /* Replace with your desired font */
            font-size: 16px; /* Adjust font size as needed */
        }
    </style>
    <script>
        function confirmDelete(url) {
            if (confirm('Are you sure you want to delete this item?')) {
                window.location.href = url;
            }
        }
    </script>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
           
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Project Details</h4>
                        <p class="card-text"><strong>Project Name:</strong> <?php echo $project['project_name']; ?></p>
                        <p class="card-text"><strong>Description:</strong> <?php echo $project['description']; ?></p>
                        <p class="card-text"><strong>Start Date:</strong> <?php echo $project['start_date']; ?></p>
                        <p class="card-text"><strong>End Date:</strong> <?php echo $project['end_date']; ?></p>
                    </div>
                </div>
          
                <h4 class="card-title mt-4">Resources</h4>
                <a href="<?= site_url('/Resource/Create/' . $project['id']) ?>" class="btn btn-warning mb-3">Add Resource</a>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Resource Name</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resources as $index => $resource): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo $resource['resource_name']; ?></td>
                                <td><?php echo $resource['quantity']; ?></td>
                                <td>
                                    <a href="<?= site_url('Resource/Edit/' . $resource['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="javascript:void(0);" onclick="confirmDelete('<?= site_url('Resource/Delete/' . $resource['id']) ?>')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $this->load->view('Home/Footer'); ?>
