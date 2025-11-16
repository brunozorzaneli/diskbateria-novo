
// Guard to avoid layout reflow: if header already has final classes, skip mutations
// app.bundle.js
// Fase 4: Conteúdo migrado automaticamente dos <script> in-line do footer.php
// Ordem preservada para evitar regressões.

// ---- Início bloco 1 (migrado do footer.php) ----
(function(){
  var ticking=false, root=document.documentElement, body=document.body;
  function onScroll(){
    if(ticking) return;
    ticking=true;
    requestAnimationFrame(function(){
      var y = window.scrollY||window.pageYOffset;
      if(y>10){ body.classList.add('scrolled-10'); } else { body.classList.remove('scrolled-10'); }
      ticking=false;
    });
  }
  window.addEventListener('scroll', onScroll, {passive:true});
  onScroll();
})();
// ---- Fim bloco 1 ----

// ---- Início bloco 4 (migrado do footer.php) ----
// Loader de avaliações (Google) — com proteção anti-duplicação e render idempotente.
// Mantém o comportamento original (IO + fallback), sem entrar na cadeia crítica.
(function(){
  // Skeleton de reviews para evitar CLS (3 cards no mobile, 1 linha no desktop)
  function showSkeleton(){
    var list = document.getElementById('gbp-reviews-list');
    if(!list || list.dataset.rendered === '1' || list.dataset.skeletonOn === '1') return;
    // Reserva de espaço e marca como skeleton
    list.classList.add('skeleton');
    list.dataset.skeletonOn = '1';
    // Esqueleto simples de 3 cards
    if ('replaceChildren' in list) { list.replaceChildren(); } else { list.innerHTML = ''; }
    for (var i = 0; i < 3; i++){
      var card = document.createElement('div');
      card.className = 'area-card review-skeleton';
      var ic = document.createElement('div');
      ic.className = 'ic';
      var txt = document.createElement('div');
      txt.className = 'txt';
      // barras falsas
      var b1 = document.createElement('div'); b1.className = 'bar';
      var b2 = document.createElement('div'); b2.className = 'bar';
      var b3 = document.createElement('div'); b3.className = 'bar short';
      txt.appendChild(b1); txt.appendChild(b2); txt.appendChild(b3);
      card.appendChild(ic); card.appendChild(txt);
      list.appendChild(card);
    }
  }

  if (window.__gbpReviewsLoaderInstalled) return;
  window.__gbpReviewsLoaderInstalled = true;

  function get(u){ return fetch(u, {credentials:'same-origin'})
    .then(function(r){ if(!r.ok) throw new Error('HTTP '+r.status); return r.json(); }); }

  function initial(name){
    if(!name) return 'C';
    var m = String(name).trim().match(/^[A-Za-zÀ-ÿ]/);
    return m ? m[0].toUpperCase() : 'C';
  }

  function render(res){
    var data = (res && res.data) ? res.data : null;
    var list = document.getElementById('gbp-reviews-list');
    if (!list || !data || !data.reviews) return;

    // Evita duplicação: se já renderizou, sai.
    if (list.dataset.rendered === '1') return;
    // Deixa idempotente — limpa qualquer conteúdo anterior.
    if ('replaceChildren' in list) { list.replaceChildren(); } else { list.innerHTML = ''; }
    list.dataset.rendered = '1'; list.classList.remove('skeleton'); list.dataset.skeletonOn = '0';

    var items = (data.reviews || []).filter(function(rv){ return Number(rv.rating) === 5; }).slice(0,3);
    items.forEach(function(rv){
      var card = document.createElement('div');
      card.className = 'area-card review-card';
      card.setAttribute('role', 'article');

      var ic = document.createElement('div');
      ic.className = 'ic';

      function getPhoto(rv){
        return rv.profile_photo_url || rv.profilePhotoUrl || rv.photoUrl || rv.photo ||
               (rv.author && (rv.author.photo || rv.author.photoUrl || rv.author.profilePhotoUrl)) || null;
      }
      var photo = getPhoto(rv);
      if (photo){
        var img = document.createElement('img');
        img.className = 'pfp';
        img.loading = 'lazy';
        img.decoding = 'async';
        img.alt = 'Foto de ' + (rv.author || 'cliente');
        img.src = photo;
        ic.appendChild(img);
      } else {
        ic.textContent = initial(rv.author);
      }

      var txt = document.createElement('div');
      txt.className = 'txt';

      var name = rv.author || 'Cliente';
      var when = rv.publishTime ? new Date(rv.publishTime).toLocaleDateString('pt-BR') : '';
      var text = (rv.text||'').trim();
      var limit = 220;
      var short = text.length > limit ? text.substring(0, limit) + '…' : text;

      var city = document.createElement('span');
      city.className = 'city';
      city.textContent = name;

      var line = document.createElement('span');
      line.className = 'line';

      var starsWrap = document.createElement('span');
      starsWrap.className = 'stars';
      starsWrap.setAttribute('aria-label','5 de 5');
      starsWrap.setAttribute('role','img');
      var starSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.25l2.956 5.987 6.613.961-4.784 4.66 1.129 6.585L12 17.77 6.086 20.444l1.129-6.585L2.43 9.198l6.613-.961L12 2.25z"/></svg>';
      starsWrap.innerHTML = starSvg + starSvg + starSvg + starSvg + starSvg;

      line.appendChild(starsWrap);
      if (when){
        var whenSpan = document.createElement('span');
        whenSpan.className = 'when';
        whenSpan.textContent = ' • ' + when;
        line.appendChild(whenSpan);
      }
      line.appendChild(document.createElement('br'));
      line.appendChild(document.createTextNode(short));

      txt.appendChild(city);
      txt.appendChild(line);

      card.appendChild(ic);
      card.appendChild(txt);
      list.appendChild(card);
    });
  }

  var started = false;
  function loadReviews(){ if(started) return; started = true; showSkeleton();
    get('/api/gbp-reviews.php?lang=pt-BR').then(render).catch(function(){
      var list = document.getElementById('gbp-reviews-list');
      if(list && list.dataset.rendered !== '1') {
        list.innerHTML = '<small style="opacity:.8">Erro ao carregar reviews.</small>';
      }
    });
  }

  function init(){
    var target = document.getElementById('gbp-reviews-widget');
    if (!target) return;
    if ('IntersectionObserver' in window){
      var io = new IntersectionObserver(function(entries){
        for (var i=0;i<entries.length;i++){
          var e = entries[i];
          if (e.isIntersecting && e.intersectionRatio >= 0.10){
            io.disconnect();
            loadReviews();
            break;
          }
        }
      }, { rootMargin:'200px 0px', threshold:[0.10] });
      io.observe(target);
    }
    ['scroll','touchstart','mousemove','keydown','pointerdown'].forEach(function(ev){
      window.addEventListener(ev, loadReviews, { once:true, passive:true });
    });
    setTimeout(loadReviews, 6000);
  }

  if (document.readyState === 'complete'){
    requestAnimationFrame(init);
  } else {
    window.addEventListener('load', function(){
 requestAnimationFrame(init); }, { once:true });
  }
})();
// ---- Fim bloco 4 ----

// ---- Bloco 5 removido (deeplink legacy) ----

