/* ==========================================================================
   Avenue 18K — logique du site (catalogue, panier, rendu, UI)
   ========================================================================== */

const CART_KEY = "avenue18k_cart";
const FREE_SHIPPING_THRESHOLD = 150;

/* ---------------- Catalogue produits ---------------- */
const PRODUCTS = [
  { id: "bg-01", cat: "bagues", name: "Bague Solitaire Éclat", price: 390, oldPrice: null, badge: "bestseller",
    weight: "2,1 g", img: "https://images.unsplash.com/photo-1605100804763-247f67b3557e?auto=format&fit=crop&w=900&q=80",
    desc: "Bague en or jaune 18 carats sertie d'un oxyde de zirconium taille brillant, un classique intemporel pour twister son quotidien." },
  { id: "bg-02", cat: "bagues", name: "Alliance Douceur", price: 250, oldPrice: 290, badge: "promo",
    weight: "1,8 g", img: "https://images.unsplash.com/photo-1603561591411-07134e71a2a9?auto=format&fit=crop&w=900&q=80",
    desc: "Anneau fin et lumineux en or 18 carats, pensé pour être porté seul ou en accumulation avec vos bagues préférées." },
  { id: "bg-03", cat: "bagues", name: "Bague Trilogie", price: 490, oldPrice: null, badge: "nouveau",
    weight: "2,6 g", img: "https://images.unsplash.com/photo-1611652022419-a9419f74343d?auto=format&fit=crop&w=900&q=80",
    desc: "Trois pierres serties griffes sur un anneau en or 18 carats, symbole du passé, du présent et de l'avenir." },
  { id: "bg-04", cat: "bagues", name: "Chevalière Initiale", price: 320, oldPrice: null, badge: "",
    weight: "3,4 g", img: "https://images.unsplash.com/photo-1611591437281-460bfbe1220a?auto=format&fit=crop&w=900&q=80",
    desc: "Chevalière personnalisable en or 18 carats, gravure d'initiale offerte pour une pièce unique." },

  { id: "co-01", cat: "colliers", name: "Collier Chaîne Maille Forçat", price: 340, oldPrice: null, badge: "bestseller",
    weight: "4,2 g", img: "https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?auto=format&fit=crop&w=900&q=80",
    desc: "Chaîne maille forçat en or 18 carats, 42 cm ajustable, la base indispensable de tout bijoutier." },
  { id: "co-02", cat: "colliers", name: "Collier Pastille Gravée", price: 280, oldPrice: 320, badge: "promo",
    weight: "3,1 g", img: "https://images.unsplash.com/photo-1620656798579-1984d9e87df7?auto=format&fit=crop&w=900&q=80",
    desc: "Fine chaîne et médaille ronde en or 18 carats, personnalisable avec l'initiale de votre choix." },
  { id: "co-03", cat: "colliers", name: "Collier Coeur Filaire", price: 260, oldPrice: null, badge: "nouveau",
    weight: "2,4 g", img: "https://images.unsplash.com/photo-1587467512961-120760940315?auto=format&fit=crop&w=900&q=80",
    desc: "Pendentif coeur en fil d'or 18 carats sur chaîne vénitienne, tout en légèreté et en élégance." },
  { id: "co-04", cat: "colliers", name: "Collier Rivière Étoiles", price: 520, oldPrice: null, badge: "",
    weight: "5,0 g", img: "https://images.unsplash.com/photo-1620656798579-1984d9e87df7?auto=format&fit=crop&w=900&q=90",
    desc: "Multi-motifs étoiles sertis en or 18 carats, un collier qui capte la lumière sous tous les angles." },

  { id: "br-01", cat: "bracelets", name: "Bracelet Jonc Ouvert", price: 310, oldPrice: null, badge: "bestseller",
    weight: "3,8 g", img: "https://images.unsplash.com/photo-1611955167811-4711904bb9f8?auto=format&fit=crop&w=900&q=80",
    desc: "Jonc rigide ajustable en or 18 carats, un bracelet minimaliste et intemporel à porter en toute saison." },
  { id: "br-02", cat: "bracelets", name: "Bracelet Chaîne Gourmette", price: 275, oldPrice: 310, badge: "promo",
    weight: "3,2 g", img: "https://images.unsplash.com/photo-1611591437281-460bfbe1220a?auto=format&fit=crop&w=900&q=90",
    desc: "Gourmette maille anglaise en or 18 carats, personnalisable par gravure sur la plaque centrale." },
  { id: "br-03", cat: "bracelets", name: "Bracelet Perles d'Or", price: 230, oldPrice: null, badge: "nouveau",
    weight: "2,7 g", img: "https://images.unsplash.com/photo-1524592094714-0f0654e20314?auto=format&fit=crop&w=900&q=80",
    desc: "Enfilade de perles d'or 18 carats sur fil élastique, à empiler avec vos autres bracelets." },

  { id: "bo-01", cat: "boucles-oreilles", name: "Puces Oreilles Diamantées", price: 190, oldPrice: null, badge: "bestseller",
    weight: "1,1 g", img: "https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?auto=format&fit=crop&w=900&q=80",
    desc: "Puces d'oreilles en or 18 carats serties d'un oxyde de zirconium, pour un éclat discret au quotidien." },
  { id: "bo-02", cat: "boucles-oreilles", name: "Créoles Fines", price: 220, oldPrice: 260, badge: "promo",
    weight: "1,6 g", img: "https://images.unsplash.com/photo-1601121141461-9d6647bca1ed?auto=format&fit=crop&w=900&q=80",
    desc: "Créoles fil fin en or 18 carats, diamètre 20 mm, un modèle intemporel qui traverse les tendances." },
  { id: "bo-03", cat: "boucles-oreilles", name: "Boucles Pendantes Étoile", price: 240, oldPrice: null, badge: "nouveau",
    weight: "1,9 g", img: "https://images.unsplash.com/photo-1587836374828-4dbafa94cf0e?auto=format&fit=crop&w=900&q=80",
    desc: "Boucles pendantes motif étoile en or 18 carats, pour twister une tenue de soirée avec finesse." },

  { id: "pe-01", cat: "pendentifs", name: "Pendentif Médaille Soleil", price: 210, oldPrice: null, badge: "",
    weight: "1,7 g", img: "https://images.unsplash.com/photo-1573408301185-9146fe634ad0?auto=format&fit=crop&w=900&q=80",
    desc: "Médaille soleil ciselée en or 18 carats, livrée avec chaîne assortie de 45 cm." },
  { id: "pe-02", cat: "pendentifs", name: "Pendentif Trèfle Porte-Bonheur", price: 195, oldPrice: 225, badge: "promo",
    weight: "1,4 g", img: "https://images.unsplash.com/photo-1596944924616-7b38e7cfac36?auto=format&fit=crop&w=900&q=80",
    desc: "Petit trèfle porte-bonheur en or 18 carats, un bijou symbolique à offrir ou à s'offrir." },
  { id: "pe-03", cat: "pendentifs", name: "Pendentif Initiale Diamantée", price: 230, oldPrice: null, badge: "nouveau",
    weight: "1,5 g", img: "https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?auto=format&fit=crop&w=900&q=80",
    desc: "Initiale sertie d'un oxyde de zirconium en or 18 carats, à personnaliser avec la lettre de votre choix." },
];

const CATEGORY_LABELS = {
  bagues: "Bagues",
  colliers: "Colliers",
  bracelets: "Bracelets",
  "boucles-oreilles": "Boucles d'oreilles",
  pendentifs: "Pendentifs",
};

const BADGE_LABELS = { bestseller: "Best-seller", promo: "Promo", nouveau: "Nouveau" };

/* ---------------- Utilitaires ---------------- */
function formatPrice(n) {
  return n.toLocaleString("fr-FR") + " €";
}

function getProduct(id) {
  return PRODUCTS.find((p) => p.id === id);
}

function placeholderImg(label) {
  const safe = (label || "Avenue 18K").replace(/&/g, "et");
  const svg = `<svg xmlns='http://www.w3.org/2000/svg' width='600' height='600'>
    <defs><linearGradient id='g' x1='0' y1='0' x2='1' y2='1'>
      <stop offset='0%' stop-color='%23e9d9b0'/><stop offset='100%' stop-color='%23b8923f'/>
    </linearGradient></defs>
    <rect width='600' height='600' fill='url(%23g)'/>
    <circle cx='300' cy='250' r='70' fill='none' stroke='%23ffffff' stroke-width='6' opacity='0.85'/>
    <text x='300' y='430' font-family='Georgia, serif' font-size='30' fill='%23ffffff' text-anchor='middle' opacity='0.9'>${safe}</text>
  </svg>`;
  return "data:image/svg+xml;utf8," + svg.replace(/\s+/g, " ");
}

function withFallback(img, label) {
  img.addEventListener(
    "error",
    function onErr() {
      img.removeEventListener("error", onErr);
      img.src = placeholderImg(label);
      img.classList.add("img-fallback");
    },
    { once: true }
  );
}

/* ---------------- Panier (localStorage) ---------------- */
function getCart() {
  try {
    return JSON.parse(localStorage.getItem(CART_KEY)) || [];
  } catch (e) {
    return [];
  }
}

function saveCart(cart) {
  localStorage.setItem(CART_KEY, JSON.stringify(cart));
  renderCartBadge();
}

function addToCart(id, qty = 1) {
  const cart = getCart();
  const line = cart.find((l) => l.id === id);
  if (line) line.qty += qty;
  else cart.push({ id, qty });
  saveCart(cart);
}

function updateCartQty(id, qty) {
  let cart = getCart();
  if (qty <= 0) {
    cart = cart.filter((l) => l.id !== id);
  } else {
    const line = cart.find((l) => l.id === id);
    if (line) line.qty = qty;
  }
  saveCart(cart);
}

function removeFromCart(id) {
  updateCartQty(id, 0);
}

function cartCount() {
  return getCart().reduce((sum, l) => sum + l.qty, 0);
}

function cartTotal() {
  return getCart().reduce((sum, l) => {
    const p = getProduct(l.id);
    return p ? sum + p.price * l.qty : sum;
  }, 0);
}

function renderCartBadge() {
  document.querySelectorAll(".cart-count").forEach((el) => {
    el.textContent = cartCount();
  });
}

/* ---------------- Rendu carte produit ---------------- */
function productCardHTML(p) {
  const badge = p.badge
    ? `<span class="product-badge ${p.badge}">${BADGE_LABELS[p.badge]}</span>`
    : "";
  const priceHTML = p.oldPrice
    ? `<span class="old">${formatPrice(p.oldPrice)}</span><span class="now promo">${formatPrice(p.price)}</span>`
    : `<span class="now">${formatPrice(p.price)}</span>`;
  return `
  <article class="product-card" data-id="${p.id}" data-cat="${p.cat}" data-price="${p.price}">
    <div class="product-thumb">
      ${badge}
      <a href="produit.html?id=${p.id}"><img data-src="${p.img}" alt="${p.name}" loading="lazy"></a>
      <button class="quick-add" title="Ajouter au panier" data-add="${p.id}" aria-label="Ajouter au panier">
        <svg viewBox="0 0 24 24"><path d="M6 6h15l-1.5 9h-12z"/><path d="M6 6L4 3H2"/><circle cx="9" cy="20" r="1"/><circle cx="17" cy="20" r="1"/></svg>
      </button>
    </div>
    <div class="product-info">
      <span class="product-cat">${CATEGORY_LABELS[p.cat]}</span>
      <h3 class="product-name"><a href="produit.html?id=${p.id}">${p.name}</a></h3>
      <span class="product-meta">Or 18 carats · ${p.weight}</span>
      <div class="product-price">${priceHTML}</div>
    </div>
  </article>`;
}

function renderProductGrid(container, products) {
  if (!products.length) {
    container.innerHTML = `<p class="empty-state">Aucun bijou ne correspond à votre sélection pour le moment.</p>`;
    return;
  }
  container.innerHTML = products.map(productCardHTML).join("");
  container.querySelectorAll("img[data-src]").forEach((img) => {
    withFallback(img, img.alt);
    img.src = img.dataset.src;
  });
  container.querySelectorAll("[data-add]").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      addToCart(btn.dataset.add, 1);
      flashAdded(btn);
    });
  });
}

function flashAdded(el) {
  const original = el.innerHTML;
  el.innerHTML = "✓";
  el.style.color = "#8a6a2b";
  setTimeout(() => {
    el.innerHTML = original;
  }, 900);
}

/* ---------------- Navigation mobile ---------------- */
function initNav() {
  const burger = document.querySelector(".burger");
  const mobileNav = document.querySelector(".mobile-nav");
  if (burger && mobileNav) {
    burger.addEventListener("click", () => mobileNav.classList.toggle("open"));
  }
}

/* ---------------- Newsletter (mock front-end) ---------------- */
function initNewsletterForms() {
  document.querySelectorAll(".js-newsletter-form").forEach((form) => {
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      const msg = form.querySelector(".form-msg");
      const input = form.querySelector('input[type="email"]');
      if (msg) {
        msg.textContent = `Merci ! Votre code -10% arrive à l'instant sur ${input ? input.value : "votre email"}.`;
      }
      form.reset();
    });
  });
}

document.addEventListener("DOMContentLoaded", () => {
  renderCartBadge();
  initNav();
  initNewsletterForms();
});
