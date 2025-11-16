<?php
/* ============================================================
SEÇÃO/SECTION: ENCONTRE POR MODELO
STATUS/STATE: DESATIVADA / DISABLED
Como reativar (How to enable): altere a variável $ENCONTRE_POR_MODELO_ATIVA para true (SIM/YES).
Fonte da verdade (single source of truth): $ENCONTRE_POR_MODELO_ATIVA
Motivo/Reason: Páginas de destino ainda não prontas (to avoid SEO issues until landing pages exist).
Data/Date: 2025-11-11
============================================================ */
$ENCONTRE_POR_MODELO_ATIVA = false;

// Ícone do Google reutilizado no widget de reviews.
$google_logo_svg = <<< 'SVG'
<svg aria-hidden="true" height="18" viewbox="0 0 256 262" width="18" xmlns="http://www.w3.org/2000/svg">
<path d="M255.9 133.5c0-10.7-.9-18.6-2.8-26.7H130.9v48.5h71.9c-1.5 12-9.6 30-27.5 42.1l-.3 2 40 31 2.8.3c25.6-23.6 38.1-58.4 38.1-97.2Z" fill="#4285F4"></path>
<path d="M130.9 261.1c36.5 0 67.1-12 89.5-32.7l-42.6-32.9c-11.4 7.9-26.6 13.4-46.9 13.4-35.8 0-66.2-23.6-77-56.3l-2 .2-41.7 32.4-.5 1.9C32 231.5 78.7 261.1 130.9 261.1Z" fill="#34A853"></path>
<path d="M53.9 152.6c-2.8-8.1-4.4-16.7-4.4-25.6s1.6-17.5 4.3-25.6l-.1-1.7-42.2-32.8-1.4.7C3.6 86.9 0 106.3 0 127s3.6 40.1 10.1 59.4l43.8-33.8Z" fill="#FBBC05"></path>
<path d="M130.9 49.8c25.4 0 42.6 11 52.4 20.2l38.3-37.5C197.9 12 167.4 0 130.9 0 78.7 0 32 29.6 10.2 75.6l43.9 33.8c10.7-32.7 41.1-59.6 76.8-59.6Z" fill="#EB4335"></path>
</svg>
SVG;

// Chevron padrão usado na lista de perguntas frequentes.
$faq_chevron_svg = <<< 'SVG'
<svg aria-hidden="true" class="chev" fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="18"><polyline points="6 9 12 15 18 9"></polyline></svg>
SVG;

// Chevron de traço mais fino para perguntas com variação de estilo.
$faq_chevron_svg_light = <<< 'SVG'
<svg aria-hidden="true" class="chev" fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewbox="0 0 24 24" width="18"><polyline points="6 9 12 15 18 9"></polyline></svg>
SVG;

// Seta de CTA reutilizada nas seções com chamadas "Veja mais".
$cta_arrow_svg = <<< 'SVG'
<svg aria-hidden="true" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"><path d="M9 6l6 6-6 6"></path></svg>
SVG;
?>
<section class="hero">
<div class="container wrap">
<div>
<h1>Bateria para carro com instalação no local em Vila Velha, Vitória e Cariacica</h1>
<p class="seo-intro">Chegamos em até 50 minutos, com checkup elétrico, nota fiscal e garantia. Carros • Utilitários • Caminhões • Motos.</p>
</div>
</div>
</section>
<section class="section-visual">
<div class="container">
<div aria-label="Técnico da Disk Bateria instalando bateria automotiva em um veículo" class="visual">
<picture class="visual-media">
<source media="(min-width: 1024px)" srcset="/img/moto-pc.webp"/>
<img alt="Disk Bateria — troca de bateria no local" decoding="async" fetchpriority="high" height="576" sizes="100vw" src="/img/heroi-diskbateria-1024.webp" srcset="/img/heroi-diskbateria-480.webp 480w, /img/heroi-diskbateria-640.webp 640w, /img/heroi-diskbateria-768.webp 768w, /img/heroi-diskbateria-1024.webp 1024w" width="1024"/>
</picture>
<div class="splash">Até 10x sem juros</div>
</div>
<div class="cta-row">
<a class="primary cta ovs-1" href="https://api.whatsapp.com/send?phone=5527995304120&text=Ol%C3%A1%2C%20Disk%20Bateria%21%20Preciso%20de%20atendimento%21" onclick="gtag_report_conversion();" rel="noopener" target="_blank">WhatsApp agora</a>
<a class="secondary cta" href="tel:+5527995304120" onclick="gtag_report_conversion();">Ligar Agora</a></div>
<div class="db4-grid" role="list">
<div class="db4-li" role="listitem"><a aria-label="Parceria Moura Fácil" class="db4-link" href="#parceria-moura"><div class="db4-card">
<div aria-hidden="true" class="db4-medal"><img alt="Moura" decoding="async" height="47" loading="lazy" src="/img/marcas/moura.svg" width="47"/></div><div><div class="db4-label">Parceria Moura Fácil</div><div class="db4-sub">Parceiro Oficial Moura</div></div>
</div>
</a><a aria-label="Parceria Heliar Express" class="db4-link" href="#parceria-heliar"><div class="db4-card">
<div aria-hidden="true" class="db4-medal"><img alt="Heliar" decoding="async" height="47" loading="lazy" src="/img/marcas/heliar.svg" width="47"/></div><div><div class="db4-label">Parceria Heliar Express</div><div class="db4-sub">Heliar Express autorizado</div></div>
</div>
</a><a aria-label="Instalação no local" class="db4-link" href="#instalacao"><div class="db4-card">
<div aria-hidden="true" class="db4-medal"><img alt="Localização" decoding="async" height="47" loading="lazy" src="/img/icons/icon-localizacao.webp" width="47"/></div><div><div class="db4-label">Instalação no local</div><div class="db4-sub">Chegamos e instalamos no endereço</div></div>
</div>
</a><a aria-label="Nota fiscal na hora" class="db4-link" href="#nota-fiscal"><div class="db4-card">
<div aria-hidden="true" class="db4-medal"><img alt="Nota Fiscal" class="ovs-2" decoding="async" height="40" loading="lazy" src="/img/icons/icon-nota.webp" width="40"/></div><div><div class="db4-label">Nota fiscal na hora</div><div class="db4-sub">Documento fiscal emitido no ato</div></div>
</div>
</a></div>
</div>
</div></section><section class="section-visual" id="reviews"><div class="container"><h2>Avaliações dos clientes</h2><p class="muted">Avaliações reais no Google — o que os clientes falam da Disk Bateria.</p><div class="ovs-3" id="gbp-reviews-widget">
<div class="ovs-4">
    <?= $google_logo_svg ?>
<strong class="ovs-5">Avaliações no Google</strong>
<a class="ovs-6" href="https://www.google.com/maps/place/Disk+Bateria/@-20.3537883,-40.2937762,1103m/data=!3m2!1e3!4b1!4m6!3m5!1s0xb817cae27eea33:0x463d81699ef62c06!8m2!3d-20.3537883!4d-40.2937762!16s%2Fg%2F11lh6h7hn3?entry=ttu" rel="noopener nofollow" target="_blank">Ver no Google</a>
</div>
<div class="area-list" id="gbp-reviews-list"></div>
<div class="powered-by">
<span>Powered by</span>
    <?= $google_logo_svg ?>
<span class="ovs-7">Google</span>
</div>
</div></div></section>
<section id="areas">
<div class="container">
<h2>Nossa área de atendimento</h2>
<p class="muted">Atendimento em Vila Velha, Vitória e Cariacica. Veja detalhes e tempo médio de chegada.</p>
<div class="area-list ovs-8">
<a aria-label="Vila Velha — Atendemos todos os bairros. Até 40 min." class="area-card" href="https://diskbateria.com.br/conteudo/bateria-vila-velha/">
<div aria-hidden="true" class="ic">VV</div>
<div class="txt">
<h3 class="city">Vila Velha</h3>
<span class="line">Atendemos todos os bairros. Até 40 min.</span>
</div>
<span class="cta">Veja mais <?= $cta_arrow_svg ?></span>
</a>
<a aria-label="Vitória — Atendemos todos os bairros. Até 50 minutos." class="area-card" href="https://diskbateria.com.br/conteudo/disk-bateria-vitoria/">
<div aria-hidden="true" class="ic">VT</div>
<div class="txt">
<h3 class="city">Vitória</h3>
<span class="line">Atendemos todos os bairros. Até 50 minutos.</span>
</div>
<span class="cta">Veja mais <?= $cta_arrow_svg ?></span>
</a>
<a aria-label="Cariacica — Verifique bairros atendidos. Até 50 minutos." class="area-card" href="https://diskbateria.com.br/conteudo/disk-bateria-cariacica/">
<div aria-hidden="true" class="ic">CC</div>
<div class="txt">
<h3 class="city">Cariacica</h3>
<span class="line">Verifique bairros atendidos. Até 50 minutos.</span>
</div>
<span class="cta">Veja mais <?= $cta_arrow_svg ?></span>
</a>
</div>
</div>
</section>
<section id="servicos">
<div class="container">
<h2>Nossos serviços</h2>
<p class="muted">Vendemos e instalamos baterias para carros, utilitários, caminhões e motos — no seu endereço ou na nossa loja.</p>
<div class="serv-list">
<a class="serv-card" href="/servicos/troca-de-bateria/">
<div aria-hidden="true" class="ic"><img alt="Troca de bateria no local" decoding="async" height="34" loading="lazy" src="/img/icons/icon-troca-bateria-local.webp" width="34"/></div>
<div class="txt">
<h3 class="title">Troca de bateria no local</h3>
<span class="line">Praticidade total com segurança.</span>
</div>
<span class="cta cta-ghost">Saiba Mais</span>
</a>
<a class="serv-card" href="/servicos/socorro-de-bateria/">
<div aria-hidden="true" class="ic"><img alt="Socorro de baterias" decoding="async" height="34" loading="lazy" src="/img/icons/icon-socorro-bateria.webp" width="34"/></div>
<div class="txt">
<h3 class="title">Socorro de bateria</h3>
<span class="line">Diagnóstico e partida assistida.</span>
</div>
<span class="cta cta-ghost">Saiba Mais</span>
</a>
<a class="serv-card" href="https://diskbateria.com.br/conteudo/teste-eletrico-disk-bateria/">
<div aria-hidden="true" class="ic"><img alt="Teste elétrico" decoding="async" height="34" loading="lazy" src="/img/icons/icon-teste-bateria.webp" width="34"/></div>
<div class="txt">
<h3 class="title">Teste elétrico</h3>
<span class="line">Inclui diagnóstico de alternador e análise de fuga de corrente.</span>
</div>
<span class="cta cta-ghost">Saiba Mais</span>
</a>
</div>
</div>
</section>
<section class="about" id="sobre">
<div class="container">
<h2>Sobre a Disk Bateria</h2>
<p class="meta"><span class="brand-slogan handwriting">Sua satisfação é a energia que nos move.</span></p>
<p class="about-intro">Desde 2014, a <strong>Disk Bateria</strong> é a referência em <strong>baterias automotivas</strong> com atendimento móvel em Vila Velha, Vitória e Cariacica. Somos especializados em levar a solução até você com qualidade, segurança e excelência no atendimento.</p>
<div class="mvv">
<div class="mvv-item">
<h3><span aria-hidden="true" class="ico">
<svg fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="20">
<circle cx="12" cy="12" r="9"></circle>
<circle cx="12" cy="12" r="5"></circle>
<circle cx="12" cy="12" fill="currentColor" r="1.5" stroke="none"></circle>
</svg>
</span> Missão</h3>
<p>Resolver a bateria do seu carro <strong>onde ele está</strong>, com segurança, agilidade e atendimento humano — colocando a <strong>sua satisfação</strong> em primeiro lugar.</p>
</div>
<div class="mvv-item">
<h3><span aria-hidden="true" class="ico">
<svg fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="20">
<path d="M1 12c2.8-5 7.1-8 11-8s8.2 3 11 8c-2.8 5-7.1 8-11 8s-8.2-3-11-8z"></path>
<circle cx="12" cy="12" r="3"></circle>
</svg>
</span> Visão</h3>
<p>Ser a referência em <strong>atendimento móvel de baterias</strong> na Vila Velha, Vitória e Cariacica, reconhecida por <strong>agilidade</strong>, <strong>transparência</strong> e <strong>qualidade</strong>.</p>
</div>
<div class="mvv-item">
<h3><span aria-hidden="true" class="ico">
<svg fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="20">
<circle cx="12" cy="12" r="9"></circle>
<path d="M8.5 12.5l2.5 2.5 4.5-4.5"></path>
</svg>
</span> Valores</h3>
<ul>
<li><strong>Satisfação do cliente</strong> como energia que nos move.</li><li><strong>Agilidade responsável</strong> (chegar rápido sem comprometer segurança).</li><li><strong>Transparência</strong>: NF em todas as instalações e informações claras.</li><li><strong>Segurança e qualidade</strong>: checkup elétrico e marcas líderes.</li><li><strong>Inovação prática</strong> no serviço e na experiência.</li><li><strong>Respeito e integridade</strong> em cada contato.</li></ul>
</div>
</div>
</div>
</section>
<section id="marcas-de-bateria">
<div class="container">
<h2>Marcas de bateria</h2>
<p class="section-subtitle marcas-subtitle ovs-9">Trabalhamos com baterias multimarcas, tradicionais e originais do seu veículo – Mais Partida – Mais Durabilidade.</p>
<div class="brands grid-logos">
<div>
<img alt="Moura" class="brand--boost" decoding="async" height="60" loading="lazy" src="/img/marcas/moura.svg" width="200"/>
</div>
<div>
<img alt="Heliar" class="brand--boost" decoding="async" height="60" loading="lazy" src="/img/marcas/heliar.svg" width="200"/>
</div>
<div>
<img alt="ACDelco" decoding="async" height="60" loading="lazy" src="/img/marcas/acdelco.svg" width="200"/>
</div>
<div>
<picture>
<source srcset="/img/marcas/jupiter.webp" type="image/webp"/>
<img alt="Júpiter" decoding="async" height="332" loading="lazy" sizes="(max-width: 480px) 148px, 148px" src="/img/marcas/jupiter-296.webp" srcset="/img/marcas/jupiter-148.webp 148w, /img/marcas/jupiter-296.webp 296w, /img/marcas/jupiter-444.webp 444w" width="800"/>
</picture>
</div>
<div>
<picture>
<source srcset="/img/marcas/zetta.webp" type="image/webp"/>
<img alt="Zetta" decoding="async" height="224" loading="lazy" sizes="(max-width: 480px) 148px, 148px" src="/img/marcas/zetta-296.webp" srcset="/img/marcas/zetta-148.webp 148w, /img/marcas/zetta-296.webp 296w, /img/marcas/zetta-444.webp 444w" width="800"/>
</picture>
</div>
<div><picture><source srcset="/img/marcas/master.webp" type="image/webp"/><img alt="Master Fercar" decoding="async" height="174" loading="lazy" srcset="/img/marcas/master-296.webp 296w, /img/marcas/master-444.webp 444w" width="800"/></picture></div></div>
</div>
</section>
<?php include __DIR__ . '/includes/blog-latest.php'; ?>
<section aria-labelledby="db-marcas-title" class="db-marcas" id="db-marcas-veiculos">
<div class="container">
<div class="db-marcas-head ovs-10">
<h2 id="db-marcas-title">Atendemos as principais montadoras</h2>
<p class="muted ovs-11">Instalamos a bateria correta para o seu carro, moto ou utilitário</p>
</div>
<div class="db-marcas-grid">
<article aria-label="Bateria para veículos Chevrolet (GM) — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Chevrolet" decoding="async" height="60" loading="lazy" src="/img/montadoras/chevrolet.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Volkswagen — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Volkswagen" decoding="async" height="60" loading="lazy" src="/img/montadoras/volkswagen.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Fiat — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Fiat" decoding="async" height="60" loading="lazy" src="/img/montadoras/fiat.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Jeep — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card boost">
<img alt="Jeep" decoding="async" height="60" loading="lazy" src="/img/montadoras/jeep.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Toyota — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Toyota" decoding="async" height="60" loading="lazy" src="/img/montadoras/toyota.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Hyundai — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Hyundai" decoding="async" height="60" loading="lazy" src="/img/montadoras/hyundai.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Honda (Automóveis) — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Honda Automóveis" decoding="async" height="60" loading="lazy" src="/img/montadoras/honda.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Renault — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Renault" decoding="async" height="60" loading="lazy" src="/img/montadoras/renault.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Nissan — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Nissan" decoding="async" height="60" loading="lazy" src="/img/montadoras/nissan.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Ford — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Ford" decoding="async" height="60" loading="lazy" src="/img/montadoras/ford.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Peugeot — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Peugeot" decoding="async" height="60" loading="lazy" src="/img/montadoras/peugeot.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Citroën — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Citroën" decoding="async" height="60" loading="lazy" src="/img/montadoras/citroen.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Kia — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Kia" decoding="async" height="60" loading="lazy" src="/img/montadoras/kia.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos BMW — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="BMW" decoding="async" height="60" loading="lazy" src="/img/montadoras/bmw.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Audi — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Audi" decoding="async" height="60" loading="lazy" src="/img/montadoras/audi.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Mitsubishi — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Mitsubishi" decoding="async" height="60" loading="lazy" src="/img/montadoras/mitsubishi.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Land Rover — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Land Rover" decoding="async" height="60" loading="lazy" src="/img/montadoras/land-rover.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos CAOA Chery — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="CAOA Chery" decoding="async" height="60" loading="lazy" src="/img/montadoras/caoa-chery.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Mercedes-Benz (Vans/Caminhões) — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card boost">
<img alt="Mercedes-Benz Caminhões" decoding="async" height="60" loading="lazy" src="/img/montadoras/mercedes-benz.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Volvo (Caminhões) — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Volvo Caminhões" decoding="async" height="60" loading="lazy" src="/img/montadoras/volvo-trucks.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Volkswagen Caminhões e Ônibus — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Volkswagen Caminhões" decoding="async" height="60" loading="lazy" src="/img/montadoras/vw-caminhoes.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Iveco — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Iveco" decoding="async" height="60" loading="lazy" src="/img/montadoras/iveco.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Yamaha (Motos) — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Yamaha Motos" decoding="async" height="60" loading="lazy" src="/img/montadoras/yamaha.svg" width="200"/>
</article>
<article aria-label="Bateria para veículos Honda Motos — instalação rápida em Vila Velha, Vitória e Cariacica" class="db-marcas-card">
<img alt="Honda Motos" decoding="async" height="60" loading="lazy" src="/img/montadoras/honda-motos.svg" width="200"/>
</article>
</div>
</div>
</section>
<section aria-labelledby="db-faq-title" id="db-faq">
<div class="container">
<h2 class="title" id="db-faq-title">Perguntas frequentes</h2>
<div class="list">
<details>
<summary>
<span aria-hidden="true" class="icon">🚚</span>
<span class="q">Atendem em domicílio?</span>
    <?= $faq_chevron_svg ?>
</summary>
<div class="a">Sim. Atendemos em domicílio e na empresa, com instalação no local.</div>
</details>
<details>
<summary>
<span aria-hidden="true" class="icon">🔧</span>
<span class="q">A instalação é gratuita?</span>
    <?= $faq_chevron_svg ?>
</summary>
<div class="a">Sim. Instalação e teste elétrico já estão incluídos no atendimento.</div>
</details>
<details>
<summary>
<span aria-hidden="true" class="icon">✅</span>
<span class="q">Fazem o teste antes e depois?</span>
    <?= $faq_chevron_svg ?>
</summary>
<div class="a">Sim. Realizamos teste elétrico antes e depois da troca (bateria, alternador e partida) para garantir que ficou tudo ok.</div>
</details>
<details>
<summary>
<span aria-hidden="true" class="icon">💳</span>
<span class="q">Parcelam no cartão?</span>
    <?= $faq_chevron_svg ?>
</summary>
<div class="a">Sim, parcelamos no cartão. As condições são alinhadas no atendimento.</div>
</details>
<details>
<summary>
<span aria-hidden="true" class="icon">⏱️</span>
<span class="q">Qual o prazo médio de chegada?</span>
    <?= $faq_chevron_svg ?>
</summary>
<div class="a">Normalmente até 50 min em Vila Velha, Vitória e Cariacica, variando com o trânsito e a sua localização.</div>
</details>
<details>
<summary>
<span aria-hidden="true" class="icon">🛡️</span>
<span class="q">A bateria tem garantia?</span>
    <?= $faq_chevron_svg ?>
</summary>
<div class="a">Sim. Garantia de fábrica; o prazo depende do modelo escolhido.</div>
</details>
<details>
<summary>
<span aria-hidden="true" class="icon">🧾</span>
<span class="q">Emite nota fiscal?</span>
    <?= $faq_chevron_svg ?>
</summary>
<div class="a">Sim, emitimos nota fiscal em todas as vendas.</div>
</details><details>
<summary>
<span aria-hidden="true" class="icon">🏷️</span>
<span class="q">Quais marcas de bateria vocês têm?</span>
    <?= $faq_chevron_svg ?>
</summary>
<div class="a">Trabalhamos com as marcas Moura, Heliar, Zetta, Master, Jupiter e AC-Delco.</div>
</details>
</div>
<details>
<summary>
<span aria-hidden="true" class="icon">⚡</span>
<span class="q">Fazem partida assistida (chupeta)?</span>
    <?= $faq_chevron_svg_light ?>
</summary>
<div class="a">Sim, atendemos no local com carga auxiliar e teste básico na hora.</div>
</details>
</div>
</section>
<?php /* INÍCIO da seção Encontre por modelo — para reativar, mude $ENCONTRE_POR_MODELO_ATIVA para true */ ?>
<?php if ($ENCONTRE_POR_MODELO_ATIVA): ?>
<section id="modelos">
<div class="container">
<h2>Encontre por modelo</h2>
<p class="muted">Veja exemplos de veículos e aplicações populares.</p>
<div class="area-list ovs-8">
<a aria-label="Veículos e aplicações populares — exemplos por marcas e modelos." class="area-card" href="/bateria-para-veiculos/">
<div aria-hidden="true" class="ic">AP</div>
<div class="txt">
<h3 class="city">Veículos e aplicações populares</h3>
<span class="line">Exemplos por marcas e modelos.</span>
</div>
<span class="cta">Veja mais <?= $cta_arrow_svg ?></span>
</a>
</div>
</div>
</section>
<?php endif; ?>
<?php /* FIM da seção Encontre por modelo */ ?>

<div aria-hidden="true" class="db-divider-before-footer"></div>