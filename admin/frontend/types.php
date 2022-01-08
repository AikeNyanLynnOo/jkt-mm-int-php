<?php
// include('checkUser.php');
?>

<h1>Types List</h1>
<?php
include("../confs/config.php");
$result = mysqli_query($conn, "SELECT * FROM types");
?>
<ul>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <li>
            <?php echo $row['title'] ?>
        </li>
    <?php endwhile; ?>
</ul>
<a href="newType.php" class="new">Insert New Type</a>