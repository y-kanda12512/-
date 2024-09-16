const drawerIcon1 = $("#js-drawer-icon-1");
const drawerIcon2 = $("#js-drawer-icon-2");
const drawerIconClose = $("#js-drawer-icon-close");
const drawerContent = $("#js-drawer-content");
const headerHeight = 140;
const jsHeaderLogoScrollBefore = $("#js-header-logo-scroll-before");
const jsHeaderLogoScrollAfter = $("#js-header-logo-scroll-after");
const jsHeaderBtnAreaScrollBefore = $("#js-header__btn-area-scroll-before");
const jsHeaderBtnAreaScrollAfter = $("#js-header__btn-area-scroll-after");
const header = $("#header");

drawerIcon1.on("click", function () {
  $(this).addClass("is-checked");
  drawerContent.addClass("is-show");
});

drawerIcon2.on("click", function () {
  $(this).addClass("is-checked");
  drawerContent.addClass("is-show");
});

drawerIconClose.on("click", function () {
  if (drawerIcon1.hasClass("is-checked")) {
    drawerIcon1.removeClass("is-checked");
    drawerContent.removeClass("is-show");
  } else if (drawerIcon2.hasClass("is-checked")) {
    drawerIcon2.removeClass("is-checked");
    drawerContent.removeClass("is-show");
  }
});

// スクロールした距離でヘッダーの表示を切り替える
window.addEventListener("scroll", function () {
  if (window.scrollY >= 140) {
    jsHeaderLogoScrollBefore.addClass("u-header__logo-scroll-hidden");
    jsHeaderLogoScrollAfter.addClass("u-header__logo-scroll-visible");
    jsHeaderBtnAreaScrollBefore.addClass("u-header__btn-area-hidden");
    jsHeaderBtnAreaScrollAfter.removeClass("u-header__btn-area-hidden");
    header.addClass("u-header-scrolled");
    console.log("140px以上スクロールされました");
  } else {
    jsHeaderLogoScrollBefore.removeClass("u-header__logo-scroll-hidden");
    jsHeaderLogoScrollAfter.removeClass("u-header__logo-scroll-visible");
    jsHeaderBtnAreaScrollBefore.removeClass("u-header__btn-area-hidden");
    jsHeaderBtnAreaScrollAfter.addClass("u-header__btn-area-hidden");
    header.removeClass("u-header-scrolled");
    console.log("140px以下スクロールされました");
  }
});

// TOPスワイパー
const swiperPickupArticles = new Swiper(".p-pickup-articles__swiper", {
  direction: "horizontal",
  loop: true,
  centeredSlides: true,
  slidesPerView: 1.28,
  spaceBetween: 16,

  navigation: {
    nextEl: ".p-pickup-articles__swiper-button-prev",
    prevEl: ".p-pickup-articles__swiper-button-next",
  },

  breakpoints: {
    480: {
      slidesPerView: 1.6,
      spaceBetween: 20,
    },
    600: {
      slidesPerView: 1.8,
      spaceBetween: 30,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    1200: {
      slidesPerView: 2.278,
      spaceBetween: 64,
    },
    1600: {
      slidesPerView: 2.8,
      spaceBetween: 72,
    },
  },
});

const swiperRecommendation = new Swiper(".p-recommendation__swiper", {
  // Optional parameters
  direction: "horizontal",
  slidesPerView: 1.211,
  spaceBetween: 24,

  // Navigation arrows
  navigation: {
    nextEl: ".p-recommendation__swiper-button-next",
    prevEl: ".p-recommendation__swiper-button-prev",
  },

  // And if we need scrollbar
  scrollbar: {
    el: ".p-recommendation__swiper-scrollbar",
    draggable: true,
  },

  breakpoints: {
    480: {
      slidesPerView: 1.6,
      spaceBetween: 20,
    },
    600: {
      slidesPerView: 2.2,
      spaceBetween: 22,
    },
    768: {
      slidesPerView: 2.5,
      spaceBetween: 24,
    },
    900: {
      slidesPerView: 3.0,
      spaceBetween: 28,
    },
    1200: {
      slidesPerView: 3.8,
      spaceBetween: 36,
    },
    1600: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
  },
});

// ---------------------------
// ▼A: 対象要素を得る
// ---------------------------
const mediaQueryPcSize = window.matchMedia("(min-width:900px)");

if (mediaQueryPcSize.matches) {
  var tabs = document.getElementById("p-all-article__change-tabs-row").getElementsByTagName("a");
} else {
  var tabs = document.getElementById("p-all-article__change-tabs-vertical").getElementsByTagName("a");
}

var pages = document.querySelectorAll("#p-all-article__tab-body > .p-all-article__article-lists");
console.log(pages);

// ---------------------------
// ▼B: タブの切り替え処理
// ---------------------------
function changeTab() {
  // ▼B-1: href属性値から対象のid名を抜き出す
  var targetid = this.getAttribute("href").substring(1);

  // ▼B-2: 指定のタブページだけを表示する
  for (var i = 0; i < pages.length; i++) {
    pages[i].style.display = pages[i].id == targetid ? "block" : "none";
  }

  // ▼B-3: クリックされたタブを前面に表示し、is-checkedクラスを付与
  for (var i = 0; i < tabs.length; i++) {
    tabs[i].style.zIndex = "0";
    tabs[i].classList.remove("is-checked");
  }
  this.style.zIndex = "10";
  this.classList.add("is-checked");

  // ▼B-4: ページ遷移しないようにfalseを返す
  return false;
}

// ---------------------------
// ▼C: すべてのタブに対して、クリック時にchangeTab関数が実行されるよう指定する
// ---------------------------
for (var i = 0; i < tabs.length; i++) {
  tabs[i].onclick = changeTab;
}

// ---------------------------
// ▼D: 最初は先頭のタブを選択しておく
// ---------------------------
tabs[0].classList.add("is-checked");
tabs[0].onclick();
