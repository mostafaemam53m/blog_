<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-4">All Posts</h1>
        <a href="index.php?page=add-blog&action=store" class="btn btn-primary mb-3">Add New Blog</a>
    </div>

    <!-- Sample table content shown since PHP has been removed -->
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><img width="25" src="path/to/image1.jpg" alt="Blog Image"></td>
                <td>Sample Blog Title</td>
                <td>Sample content preview...</td>
                <td>
                    <a href="index.php?page=show-blog&action=show&id=1" class="btn btn-sm btn-info">View</a>
                    <a href="index.php?page=edit-blog&action=edit&id=1" class="btn btn-sm btn-warning">Edit</a>
                    <form action="index.php?page=delete-blog&action=delete" method="POST" style="display:inline-block;">
                        <input type="hidden" name="id" value="1">
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <!-- Additional static rows can be added similarly -->
        </tbody>
    </table>

    <!-- Uncomment below if you prefer to show "No Posts Found" instead -->
    <!-- <div class="alert alert-info">No Posts Found</div> -->
</div>
