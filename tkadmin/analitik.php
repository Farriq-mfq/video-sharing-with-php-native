<?php $query = $konek->query("SELECT * FROM video ") ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Likes</th>
                        <th scope="col">Viewer</th>
                        <th scope="col">Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $videos) : ?>
                        <tr>
                            <td><?= $videos['judul'] ?></td>
                            <td><?= number_format_short($videos['likes']) ?></td>
                            <td><?= number_format_short($videos['viewer']) ?></td>
                            <td><?= number_format_short($videos['download']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>