<?php
// include('checkUser.php');
?>

<h1>Enrollments List</h1>
<?php
include("../confs/config.php");
$result = mysqli_query($conn, "SELECT * FROM enrollments");
?>
<ul>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <li>
            <?php echo $row['uname'] ?>
        </li>
    <?php endwhile; ?>
</ul>
<a href="newEnroll.php" class="new">Insert New enrollment</a>