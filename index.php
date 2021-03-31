<?php
include 'database.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url('images/background.jfif');
        }
    </style>
</head>
<body>
    <h1>Welcome to my Blog!</h1><br>

    <?php
        $posts = mysqli_query($db, "SELECT * from posts");
        $comments = mysqli_query($db, "SELECT * from comments");
        $replies = mysqli_query($db, "SELECT * from replies");

        foreach ($posts as $post){
            $post_data = mysqli_fetch_array($posts);
            
            foreach ($comments as $comment){
                $comment_data = mysqli_fetch_array($comments);

                foreach ($replies as $reply){
                    $reply_data = mysqli_fetch_array($replies);
?>
    <form method="post" class="post">
        <span>Title: <?php echo $post_data['title'] ?></span>
        <span>By: <?php echo $post_data['author_name'] ?></span><br>
        <span>Content: <?php echo $post_data['content'] ?></span><br>
    </form><br>
        <form method="GET" class="post">
            <span>Name: <?php echo $comment_data['commenter_name'] ?></span><br>
            <span>Comment : <?php echo $comment_data['content'] ?></span><br>
            Name: <input type="text" name="commenter_name" id="commenter_name"><br>
            Comment: <textarea name="comment" id="comment" cols="30" rows="1"></textarea><br>
            <input type="submit" name="comment_button" value="Comment"><br><br><br>
        </form><br>
        <form method="GET" class="post">
            <span>Name: <?php echo $reply_data['replier_name'] ?></span><br>
            <span>Comment : <?php echo $reply_data['content'] ?></span><br>
            Name: <input type="text" name="commenter_name" id="commenter_name"><br>
            Comment: <textarea name="comment" id="comment" cols="30" rows="1"></textarea>
            <input type="submit" name="comment_button" value="Comment">
        </form><br>
        Name: <input type="text" name="commenter_name" id="commenter_name"><br>
        Comment: <textarea name="comment" id="comment" cols="30" rows="1"></textarea>
        <input type="submit" name="comment_button" value="Comment"><br><br><br><br>

    <?php
        if(isset($_POST['comment_button'])) {
            $comment = $_POST['comment'];
            $commenter = $_POST['commenter_name'];

            $sql = "INSERT INTO comments (content, commenter_name) VALUES (?, ?)";
    }
}
}
}
    ?>
</body>
</html>