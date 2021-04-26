<?php 
    require_once 'layouts/header.php';
    require 'extra/checker.php';
    require_once 'layouts/nav.php';
    require_once 'config.php';
?>
    <div class="container">
        <h2 class="text-center alert alert-light">Welcome <?= $session_user ?> to your dashboard</h2>
        <div style="margin-bottom: 40px;"></div>
        <div class="row justify-content-center">
        <form action="course.php" method="post">
        <?php require_once 'extra/messages.php' ?>
        <?php if(isset($_GET['add_course'])) : ?>
        <h5>Add Course</h5>
            
            <!-- session id -->
            <input type="hidden" name="user_id" value="<?= $session_id ?>">

            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Code</label>
                <input type="text" name="code" class="form-control">
            </div>
            <?php if(isset($_GET['edit'])) : ?>
            <div class="form-group">
                <input type="submit" name="update" class="btn btn-success" value="Edit Course">
                <input type="hidden" name="id" value=<?= $_GET['edit'] ?>>
            </div>
            <?php else: ?>
            <div class="form-group">
                <input type="submit" name="add" class="btn btn-primary" value="Add Course">
            </div>
            <?php endif; ?>
        </form>
        </div>

            <!-- result table -->
        <?php else: ?>
        <div class="table-responsive">
                
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Course Code</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <?php
                        $stmt = $conn->prepare("SELECT * FROM courses WHERE id=?");
                        $stmt->bind_param('i', $session_id);
                        if($stmt->execute()):
                            $data = $stmt->get_result();
                            while($row = $data->fetch_array()):
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['code']; ?></td>
                        <td>
                            <form>
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="process.php">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <?php 
                        endwhile; 
                        endif;
                     ?>
                </table>

        </div>
        <?php endif ?>

    </div>