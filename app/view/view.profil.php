<?php require "static/head.php" ?>
<body>
    <div class="container-fluid">
    	<div class="container">
    		<div class="row">
                <h1>Profil View</h1>
    			<div class="col-12 mt-5">
                <?php if(isset($data) && !empty($data)): ?>
                <?php foreach($data as $row): ?>
                    <h1><?= $row["username"] ?></h1>
                    <h2><?= md5($row["password"]) ?></h2>
                    <h3><?= $row["createdAt"] ?></h3>
                <?php endforeach; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
	<?php require "static/script-manager.php" ?>
</body>
</html>