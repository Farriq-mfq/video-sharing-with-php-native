<div class="container">
    <div class="row mt-5">
        <div class="col-md-8 mb-3">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Upload video</h4>
                </div>
                <div class="card-body">
                    <div id="alert"></div>
                    <form method="post" enctype="multipart/form-data" id="upload" action="test.php">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" placeholder="judul video min 5" id="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="Video">Video</label>
                            <input type="file" class="form-control" id="video" name="video" required>
                        </div>
                        <div class="form-group">
                            <label for="judul">Deskripsi</label>
                            <textarea id="deskripsi" cols="10" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-info" id="btnup">
                                <i class="fa fa-upload"></i>
                                Upload
                            </button>
                        </div>
                    </form>
                    <div class="progress mt-3" style="display: none;">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Preview</h4>
                </div>
                <div class="card-body mr-auto">
                    <video id="videos" controls width="330px" height="260px">
                        <source type="video/mp4">
                        <source type="video/mkv">
                    </video>
                    <canvas id="canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>