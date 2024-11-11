<div class="col mb-4">
    <div class="card curso h-100 m-auto" onclick="toClass()">
        <img src="images/pexels-anthonyshkraba-production-8902007.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p><?= htmlspecialchars($students) ?> estudiantes</p>
                </div>
                <div class="col d-flex justify-content-end">
                    <p><?php echo htmlspecialchars($rating); ?></p>
                    <img class="estrella" src="images/estrella.png">
                </div>
            </div>
            <h6><?php echo htmlspecialchars($name); ?></h6>
            <div class="row align-items-center">
                <div class="col-auto">
                    <p>Por <?php echo htmlspecialchars($author); ?></p>
                </div>
                <div class="col precio justify-content-end">
                    $<?php echo htmlspecialchars($price); ?>
                </div>
            </div>
        </div>
    </div>
</div>