

<form action="course.php" method="post">
        <?php require_once 'extra/messages.php' ?>
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
          
            <div class="form-group">
                <input type="submit" name="update" class="btn btn-success" value="Edit Course">
                <input type="hidden" name="id" value="<?= $_GET['edit'] ?>">
            </div>
</form>