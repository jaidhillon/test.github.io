<!DOCTYPE html>
<html>
<head>
    <title>Pixabay API Results</title>
</head>
<body>
    <?php foreach ($results as $result): ?>
        <img src="<?php echo $result->webformatURL; ?>" alt="<?php echo $result->tags; ?>">
    <?php endforeach; ?>
</body>
</html>
