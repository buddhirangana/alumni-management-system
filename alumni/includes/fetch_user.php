<?php
$sql = "SELECT * FROM member WHERE Email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usermail);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>