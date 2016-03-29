<?php
header('Content-Type: application/json');
echo json_encode($data);
Yii::$app->end();
?>