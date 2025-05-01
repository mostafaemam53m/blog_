<div class="container mt-5">
    <div class="d-flex justify-content-center align-items-center">
        <h1 class="mb-4">Edit Post</h1>
    </div>
    <form method="post" action="index.php?page=update-store-blog&action=update" enctype="multipart/form-data">
        <input type="hidden" name="id" value="">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Images</label>
            <input type="file" class="form-control" name="image" id="image">
            <!-- Current image preview section removed -->
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" placeholder="Enter content"></textarea>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-warning">Edit</button>
        </div>
    </form>
</div>
