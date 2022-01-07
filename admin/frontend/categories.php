<?php
// include('checkUser.php');
?>

<h1>Categories List</h1>
<?php
include("../confs/config.php");
$result = mysqli_query($conn, "SELECT * FROM categories");
?>
<ul>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <li>
            <?php echo $row['title'] ?>
        </li>
    <?php endwhile; ?>
</ul>
<a href="newCategory.php" class="new">Insert New Category</a>