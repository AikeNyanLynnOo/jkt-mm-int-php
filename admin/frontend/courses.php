<?php
// include('checkUser.php');
?>

<h1>Course List</h1>
<?php
include("../confs/config.php");
$result = mysqli_query($conn, "SELECT * FROM courses");
?>
<ul>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <li>
            <?php echo $row['title'] ?>
        </li>
    <?php endwhile; ?>
</ul>
<a href="newCourse.php" class="new">Insert New enrollment</a>