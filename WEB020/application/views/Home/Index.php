<?php $this->load->view('Home/Header', array('title' => 'Home', 'active_menu' => 'Home')); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management</title>
    <!-- Stylesheets -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <link href="<?= base_url('assets/bootswatch/dist/litera/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- JavaScript for delete confirmation -->
    <script>
        function confirmDelete(url) {
            if (confirm("Are you sure you want to delete this project?")) {
                window.location.href = url;
            }
        }
    </script>
</head>
<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Project List</h1>
            </div>
            <div class="card-body">
                <!-- Add New Project button -->
                <a href="<?php echo base_url('Home/Create_project'); ?>" class="btn btn-primary btn-sm mb-3">Add New Project</a>
                
                <!-- Search Form -->
                <form action="<?php echo base_url('Home/Index'); ?>" method="get" class="mb-3">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by Project Name" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    <?php if (!empty($_GET['search'])): ?>
                        <a href="<?php echo base_url('Home/Reset_search'); ?>" class="btn btn-secondary btn-sm">Reset</a>
                    <?php endif; ?>
                </form>

                <!-- Table of Projects -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Project Name</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($projects)): ?>
                                <?php $no = 1; foreach ($projects as $project): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $project['project_name']; ?></td>
                                    <td><?php echo $project['description']; ?></td>
                                    <td><?php echo $project['start_date']; ?></td>
                                    <td><?php echo $project['end_date']; ?></td>
                                    <td>
                                        <!-- Manage details, Edit, Delete buttons -->
                                        <a href="<?php echo base_url('Home/View_project/'.$project['id']); ?>" class="btn btn-info btn-sm btn-square">Resources</a>
                                        <a href="<?php echo base_url('Home/Edit_project/'.$project['id']); ?>" class="btn btn-warning btn-sm btn-square">Edit</a>
                                        <a href="javascript:void(0);" onclick="confirmDelete('<?php echo base_url('Home/delete_project/'.$project['id']); ?>')" class="btn btn-danger btn-sm btn-square">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">No projects found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php $this->load->view('Home/Footer'); ?>
