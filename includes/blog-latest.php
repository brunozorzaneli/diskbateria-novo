<?php
/* DB BLOG LIST v17 (moved inside PHP) */

// --- CFG: Blog cache behavior ---
if (!defined('BLOG_CACHE_MAX_AGE')) {
    // seconds; keep existing default if there is one in the file; this is just a fallback.
    define('BLOG_CACHE_MAX_AGE', 900);
}
// --- /CFG ---

/**
 * Últimos posts do Blog — Disk Bateria (v14: decodifica entidades HTML no excerpt)
 * - Corrige aparição de códigos como &#8220; ao decodificar entidades antes de escapar.
 * - Mantém limpeza do título duplicado e demais estilos/comportamentos (v13).
 */

if (!function_exists('db_html_escape')) { function db_html_escape($s){ return htmlspecialchars($s ?? '', ENT_QUOTES|ENT_SUBSTITUTE,'UTF-8'); } }
if (!function_exists('db_safe_json_decode')) { function db_safe_json_decode($j){ $d=json_decode($j,true); return is_array($d)?$d:null; } }
if (!function_exists('db_http_get')) {
  function db_http_get($urlOrPath,$timeout=2){
    if(preg_match('~^https?://~i',$urlOrPath)){$url=$urlOrPath;}
    else{$scheme=(!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off')?'https':'http'; $host=$_SERVER['HTTP_HOST']??$_SERVER['SERVER_NAME']??'localhost'; $url=$scheme.'://'.$host.$urlOrPath;}
    if(function_exists('curl_init')){$ch=curl_init(); curl_setopt_array($ch,[CURLOPT_URL=>$url,CURLOPT_RETURNTRANSFER=>true,CURLOPT_CONNECTTIMEOUT=>$timeout,CURLOPT_TIMEOUT=>$timeout,CURLOPT_USERAGENT=>'DiskBateria/BlogLatest']); $resp=curl_exec($ch); $code=curl_getinfo($ch,CURLINFO_HTTP_CODE); curl_close($ch); if($code>=200&&$code<300) return $resp; return null;}
    $ctx=stream_context_create(['http'=>['method'=>'GET','timeout'=>$timeout,'header'=>"User-Agent: DiskBateria/BlogLatest\r\n"]]); $resp=@file_get_contents($url,false,$ctx); return $resp!==false?$resp:null;
  }
}
if (!function_exists('db_fetch_latest_posts')) {
  function db_fetch_latest_posts($per_page=3){
    $scheme=(!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off')?'https':'http'; $host=$_SERVER['HTTP_HOST']??$_SERVER['SERVER_NAME']??'localhost';
    $bases=[$scheme . '://' . $host]; if(defined('DB_WP_REMOTE_BASE')&&DB_WP_REMOTE_BASE)$bases[]=rtrim(DB_WP_REMOTE_BASE,'/'); $bases[]='https://diskbateria.com.br';
    $paths=["/conteudo/wp-json/wp/v2/posts?per_page={$per_page}&_embed=1&orderby=date&status=publish","/cms/wp-json/wp/v2/posts?per_page={$per_page}&_embed=1&orderby=date&status=publish"];
    foreach($bases as $b) foreach ($paths as $p){ $raw=db_http_get($b.$p,2); if($raw){ $data=db_safe_json_decode($raw); if(is_array($data)) return $data; } }
    return null;
  }
}
if (!function_exists('db_cache_path')) { function db_cache_path(){ $root=__DIR__.'/../cache'; if(!is_dir($root))@mkdir($root,0755,true); return $root.'/blog_latest.json'; } }
if (!function_exists('db_read_cache')) { function db_read_cache($max_age=900){ $file=db_cache_path(); if(is_file($file)){ $age=time()-filemtime($file); if($age<=$max_age){ $raw=@file_get_contents($file); $d=db_safe_json_decode($raw); if(is_array($d)) return $d; } } return null; } }
if (!function_exists('db_write_cache')) { function db_write_cache($data){ @file_put_contents(db_cache_path(),json_encode($data)); }
if (!function_exists('db_read_cache_stale')) { function db_read_cache_stale(){ $file=db_cache_path(); if(is_file($file)){ $raw=@file_get_contents($file); $d=@json_decode($raw,true); if(is_array($d)) return $d; } return null; } }
 }

if (!function_exists('db_decode_entities')) {
  function db_decode_entities($text) {
    if ($text === null || $text === '') return '';
    // Decodifica entidades nomeadas e numéricas para UTF-8
    $decoded = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    // Remove tags e normaliza espaços
    $decoded = trim(strip_tags($decoded));
    $decoded = preg_replace('/\s+/', ' ', $decoded);
    return $decoded;
  }
}

if (!function_exists('db_clean_excerpt')) {
  function db_clean_excerpt($title, $html, $limit = 140) {
    $text = db_decode_entities($html);
    $t = db_decode_entities($title);
    if ($t !== '') {
      // Se o excerpt começar com o título completo, remove
      if (mb_stripos($text, $t) === 0) {
        $text = trim(mb_substr($text, mb_strlen($t)));
      } else {
        // Se começar com o prefixo do título (até 60 chars), remove
        $prefix = mb_substr($t, 0, 60);
        if ($prefix !== '' && mb_stripos($text, $prefix) === 0) {
          $text = trim(mb_substr($text, mb_strlen($prefix)));
        }
      }
      // Remove pontuação/resíduos iniciais
      $text = preg_replace('/^[\s\-\—–:|.,;!?]+/u', '', $text);
      // Evita duplicação de frase inicial
      if (preg_match('/^(.{20,120}?)[\.\!\?]\s+\1/um', $text, $m)) { $text = $m[1]; }
    }
    if (mb_strlen($text) > $limit) $text = mb_substr($text, 0, $limit - 1) . '…';
    return $text;
  }
}

$preview = isset($_GET['blog_preview']) && $_GET['blog_preview']=='1';

$posts = db_read_cache(BLOG_CACHE_MAX_AGE);
$_needs_refresh = false;
if(!$posts){
  // Try stale cache to avoid network during render
  $stale = db_read_cache_stale();
  if($stale){ $posts = $stale; $_needs_refresh = true; }
  else {
    // First-run warmup: do a single synchronous fetch to prime cache
    $posts = db_fetch_latest_posts(3);
    if($posts) db_write_cache($posts);
  }
}
// If we served stale cache, refresh in background after response finishes
if(!empty($_needs_refresh)){
  register_shutdown_function(function(){
    if(function_exists('fastcgi_finish_request')){ @fastcgi_finish_request(); }
    @ignore_user_abort(true);
    $data = db_fetch_latest_posts(3);
    if($data) db_write_cache($data);
  });
}

if((!$posts || !is_array($posts) || count($posts)===0) && !$preview){ return; }
?>


<section id="blog" class="section-blog">
  
  <div class="container">
    <h2>Dicas do Blog Disk Bateria</h2>
    <div class="blog-list">
      <?php if ($posts && is_array($posts) && count($posts)>0): ?>
        <?php foreach ($posts as $p):
          $title = $p['title']['rendered'] ?? '';
          $url   = $p['link'] ?? '#';
          $date  = isset($p['date']) ? date('d/m/Y', strtotime($p['date'])) : '';
          $excerpt = db_clean_excerpt($title, $p['excerpt']['rendered'] ?? '');
        ?>
        <a class="blog-card" href="<?php echo db_html_escape($url); ?>">
          <span class="title"><?php echo $title; ?></span>
          <?php if ($date): ?><span class="meta"><?php echo db_html_escape($date); ?></span><?php endif; ?>
          <span class="line"><?php echo db_html_escape($excerpt); ?></span>
          <span class="cta cta-ghost cta-sm" style="margin-top:.25rem">Ler mais</span>
        </a>
        <?php endforeach; ?>
      <?php else: ?>
        <a class="blog-card" href="https://diskbateria.com.br/conteudo/blog-disk-bateria/">
          <span class="title">Dicas sobre baterias automotivas</span>
          <span class="line">Confira nossos conteúdos sobre manutenção, troca e testes.</span>
          <span class="cta cta-ghost cta-sm" style="margin-top:.25rem">Ver dicas</span>
        </a>
      <?php endif; ?>
    </div>
    <a class="blog-card blog-cta" href="https://diskbateria.com.br/conteudo/blog-disk-bateria/" aria-label="Ver todas as dicas de bateria do Blog Disk Bateria">
  <span class="title">Ver todas as dicas de bateria</span>
</a>
    <?php if ($posts && is_array($posts) && count($posts)>0):
      $listItems=[]; $idx=1;
      foreach ($posts as $p){
        $title = strip_tags($p['title']['rendered'] ?? '');
        $url   = $p['link'] ?? '#';

        // Dates: prefer GMT (Z), fallback to local with -03:00
        $dateLocal = $p['date'] ?? '';
        $dateGmt   = $p['date_gmt'] ?? '';
        $modLocal  = $p['modified'] ?? '';
        $modGmt    = $p['modified_gmt'] ?? '';
        $dateIso = $dateGmt ? preg_replace('~\s+~','T',$dateGmt).'Z' : ($dateLocal ? preg_replace('~\s+~','T',$dateLocal).'-03:00' : null);
        $modIso  = $modGmt ? preg_replace('~\s+~','T',$modGmt).'Z'  : ($modLocal  ? preg_replace('~\s+~','T',$modLocal).'-03:00'  : null);

        $desc  = db_clean_excerpt($title, $p['excerpt']['rendered'] ?? '', 160);
        $img = isset($p['_embedded']['wp:featuredmedia'][0]['source_url']) ? $p['_embedded']['wp:featuredmedia'][0]['source_url'] : null;
        $authorName = 'Bruno Zorzaneli';

        // Author with LinkedIn URL (fallback archive kept in sameAs for identity)
        $author = [
          '@type' => 'Person',
          'name'  => $authorName,
          'url'   => 'http://www.linkedin.com/in/brunozorzaneli',
          'alternateName' => 'Bruno Zorzaneli',
          'sameAs' => ['http://www.linkedin.com/in/brunozorzaneli','https://diskbateria.com.br/conteudo/author/bruno/']
        ];

        $item = [
          '@type' => 'BlogPosting',
          'headline' => $title,
          'url' => $url,
          'mainEntityOfPage' => $url,
          'datePublished' => $dateIso,
          'dateModified'  => $modIso,
          'author' => $author,
          'inLanguage' => 'pt-BR',
          'isAccessibleForFree' => true,
          'description' => $desc,
          'publisher' => ['@type' => 'Organization', '@id' => 'https://diskbateria.com.br/#business']
        ];
        if ($img) { $item['image'] = $img; }

        $listItems[] = [
          '@type' => 'ListItem',
          'position' => $idx++,
          'item' => $item
        ];
      }?>
      <script type="application/ld+json">
      <?php echo json_encode(['@context'=>'https://schema.org','@type'=>'ItemList','itemListElement'=>$listItems], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE); ?>
      </script>
    <?php endif; ?>
  </div>
</section>
