<?php $page_title = 'Add your idea'; ?>
<?php $page_heading = 'Share your idea with us'; ?>
<?php require_once("../code-start/db/dbOperation/sqlCrud.php") ?>
<?php require_once("../code-start/config.php");
$sqlCrud = new SqlCrud();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title><?php echo $page_title; ?></title>
    <style>
    table,
    th,
    td {
        border: 1px solid;
        border-collapse: collapse;
    }
    </style>
</head>

<body>
    <h1> <?php echo $page_heading; ?> </h1>

    <?php if (isset($_POST['submit'])) : ?>

    <?php if (isset($_POST['title'])) : ?>
    <?php $idea_title = $_POST['title']; ?>
    <?php endif; ?>

    <?php if (isset($_POST['text'])) : ?>
    <?php $idea_text = $_POST['text']; ?>
    <?php endif; ?>

    <?php $sqlCrud->insert($conn, "himohammad",  $arrayName = array('title' => $_POST['title'], "text" => $_POST['text'])) ?>
    <div style="background:green;color:white; padding:10px;">
        <h3> Your idea was added succesfully:</h3>
        <p>Your idea title: <?php $idea_title ?></p>
        <p>Your idea text:<?php $idea_text ?> </p>
    </div>
    <hr>
    <hr>
    <br>

    <?php endif; ?>

    <form action="" method="POST">
        <label for="title">Idea Title</label>
        <input type="text" name="title" value="<?php if (isset($_POST['title'])) {
                                                    echo $_POST['title'];
                                                } ?>">
        <br><br>
        <label for="text"> Idea Text</label>
        <textarea name="text" rows="8" cols="80"><?php if (isset($_POST['text'])) {
                                                        echo $_POST['text'];
                                                    } ?></textarea>
        <br><br>
        <input type="submit" name="submit" value="Save your idea">
    </form>

    <hr>
    <hr><br>


    <table style="width:100%;background:#eee;text-align:center">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Text</th>
            <th>Delete</th>
        </tr>

        <?php
        $data = $sqlCrud->selectAll($conn, "himohammad");
        foreach ($data as $row) {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['TEXT']; ?></td>
            <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
            <td><a href="delete.php?id=<?php echo $row['id']; ?>" style="color:#ff0000;">X</a></td>
        </tr>
        <?php } ?>



    </table>

</body>

</html>