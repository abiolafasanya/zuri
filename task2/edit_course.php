
<?php 
    $id = $_GET['edit'];
    $sql = "SELECT * FROM courses WHERE id=?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
    if($data) :
?>
<form action="course.php" method="post">
        <?php require_once 'extra/messages.php' ?>
        <h5>Edit Course</h5>
            
            <?php foreach($data as $row) : ?>
            <input type="hidden" name="id" value="<?= $row['id'] ?>">

            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="<?= $row['title']?>">
            </div>
            <div class="form-group">
                <label for="">Code</label>
                <input type="text" name="code" class="form-control" value="<?= $row['code']?>">
            </div>
          
            <div class="form-group">
                <input type="submit" name="update" class="btn btn-success" value="Edit Course">
            </div>
</form>
<?php 
    endforeach; 
    endif;
 ?>