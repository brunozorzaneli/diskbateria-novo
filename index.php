<?php
// Assemble page from partials

// Cache policy (home): allow edge caching (CF) + short browser TTL with SWR
header('Content-Type: text/html; charset=UTF-8');
header('Cache-Control: public, max-age=300, s-maxage=604800, stale-while-revalidate=30, stale-if-error=86400');
header('Vary: Accept-Encoding');

require __DIR__ . '/header.php';

echo "<!-- build: 2025-11-04 03:26:01 UTC -->\n";

echo "<main>";
require __DIR__ . '/home-content.php';
echo "</main>";

require __DIR__ . '/footer.php';
