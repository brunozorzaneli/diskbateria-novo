<?php
header('Content-Type: application/json; charset=utf-8');
$env = [
  'SERVER_ADDR' => $_SERVER['SERVER_ADDR'] ?? null,
  'REMOTE_ADDR' => $_SERVER['REMOTE_ADDR'] ?? null,
  'HTTP_X_FORWARDED_FOR' => $_SERVER['HTTP_X_FORWARDED_FOR'] ?? null,
];

function fetch_ip($url){
  $ch = curl_init($url);
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 8,
    CURLOPT_USERAGENT => 'curl/egress-check',
  ]);
  $out = curl_exec($ch);
  curl_close($ch);
  return trim($out ?: '');
}

$out = [
  'egress_ip_ipify' => fetch_ip('https://api.ipify.org'),
  'egress_ip_ifconfig_me' => fetch_ip('https://ifconfig.me/ip'),
  'server_env' => $env,
];
echo json_encode($out, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
