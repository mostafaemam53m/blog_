<?php
$blogs = getBlogs();
?>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-4">All Posts</h1>
        <a href="index.php?page=add-blog&action=store" class="btn btn-primary mb-3">Add New Blog</a>
    </div>
    <?php if(!empty($blogs)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($blogs as $blog): ?>
            <tr>
                <td><?= $blog['id'] ?></td>
                <td><img width="25" src="<?= "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']) . $blog['image'] ?>"></td>
                <td><?= $blog['title'] ?></td>
                <td><?= $blog['content'] ?></td>
                <td>
                    <a href="index.php?page=show-blog&action=show&id=<?= $blog['id'] ?>" class="btn btn-sm btn-info">View</a>
                    <a href="index.php?page=edit-blog&action=edit&id=<?= $blog['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form action="index.php?page=delete-blog&action=delete" method="POST" style="display:inline-block;">
                        <input type="hidden" name="id" value="<?= $blog['id'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="alert alert-info">No Posts Found</div>
    <?php endif; ?>
</div>