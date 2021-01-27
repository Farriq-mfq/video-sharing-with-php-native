<?php
$qv = $konek->query("SELECT * FROM visitor");
$qvd = $konek->query("SELECT * FROM video");
$tv = $konek->query("SELECT * FROM viewer");
$ta = $konek->query("SELECT * FROM usr WHERE role ='admin'");


?>
<div class="container">
    <?php if ($_SESSION['data']['role'] == 'dev') : ?>
        <div class="row mt-4 rowCard">
            <div class="col-md-3 col-6 mt-4">
                <div class="card crdadm shadow" style="background-color: rgb(116, 241, 137);">
                    <div class="ket">
                        <div class="title__ket">
                            <h3>
                                Visitor
                            </h3>
                            <p><?= $qv->num_rows ?></p>
                        </div>
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mt-4">
                <div class="card crdadm shadow" style="background-color: rgb(124, 241, 250);">
                    <div class="ket">
                        <div class="title__ket">
                            <h3>
                                Video
                            </h3>
                            <p><?= $qvd->num_rows ?></p>
                        </div>
                        <i class="fa fa-video"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mt-4">
                <div class="card crdadm shadow" style="background-color: rgb(234, 0, 255);">
                    <div class="ket">
                        <div class="title__ket">
                            <h3>
                                Total viewer
                            </h3>
                            <p><?= number_format_short($tv->num_rows) ?></p>
                        </div>
                        <i class="fa fa-glasses"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mt-4">
                <div class="card crdadm shadow" style="background-color: rgb(245, 119, 157);">
                    <div class="ket">
                        <div class="title__ket">
                            <h3>
                                Total Admin
                            </h3>
                            <p><?= $ta->num_rows ?></p>
                        </div>
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th scope="col">Ip</th>
                            <th scope="col">Useragent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($qv as $visitor) : ?>
                            <tr>
                                <td><?= $visitor['ip'] ?></td>
                                <td><?= $visitor['useragent'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($_SESSION['data']['role'] == 'admin') : ?>
        <h3 class="text-center mt-5" style="letter-spacing:5px">
            Hallo <?= $_SESSION['data']['nama'] ?>
        </h3>
    <?php endif; ?>
</div>