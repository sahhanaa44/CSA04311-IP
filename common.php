<?php
$conn=new mysqli('localhost','root','','ip_lab');
if($conn->connect_error) die('Database connection failed. Import database.sql and start MySQL.');
$conn->set_charset('utf8mb4');
function e($x){return htmlspecialchars((string)$x,ENT_QUOTES,'UTF-8');}
function startpage($title){echo '<!doctype html><html><head><meta name="viewport" content="width=device-width,initial-scale=1"><title>'.e($title).'</title><style>body{font-family:Arial;max-width:1000px;margin:25px auto;padding:0 15px;background:#f4f7fb;color:#17283b}nav,form,.box{background:white;padding:14px;margin:12px 0;border-radius:8px}nav a{margin-right:14px}input,select,button{padding:8px;margin:5px}button{background:#175d91;color:white;border:0;border-radius:4px}table{width:100%;border-collapse:collapse;background:white}td,th{padding:8px;border:1px solid #ccd5df;text-align:left}th{background:#e1edf8}.msg{background:#e0f5e5;padding:10px}</style></head><body><h1>'.e($title).'</h1>';}
function nav($s){echo '<nav>'.$s.'</nav>';}
function endpage(){echo '</body></html>';}
?>