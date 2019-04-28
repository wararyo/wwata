var ua = navigator.userAgent;
//携帯かどうか
var isPhone = function () {
  // iPhone
  if(ua.indexOf('iPhone') > -1) return true;
  // Android
  if(ua.indexOf('Android') > -1) return true;
  // Other
  if(ua.indexOf('Mobile') > -1 && ua.indexOf('iPad') === -1) return true;

  return false;
}
//モバイル端末かどうか タブレット端末含む
var isMobile = function () {
  // iPad
  if(ua.indexOf('iPad') > -1) return true;

  return isPhone();
};

var sweetScroll = new SweetScroll({
    trigger: "a[href^='#']",
    offset: isPhone() ? -360 : -80,
    duration: 500
});

//TOC開閉
var toc = document.getElementById("toc_container")
if(toc != void 0) {
  toc.setAttribute(":class", "{'is-open':isOpen}")
  toc.setAttribute("v-on:click","isOpen = !isOpen");
  toc.getElementsByTagName('ul')[0].setAttribute("v-if","isOpen");
  var v_toc = new Vue({
      el: '#toc_container',
      data: {
        isOpen: false
      }
  });
}

var v_goToTop = new Vue({
  el: '#go-to-top',
  data: {
    isShown: true
  },
  mounted: function() {
    window.addEventListener('scroll',this.onScroll);
  },
  beforeDestroy: function() {
    window.removeEventListener('scroll',this.onScroll);
  },
  methods: {
    onScroll: function() {
      this.isShown = (window.pageYOffset > window.innerHeight);
    }
  }
});

var v_stickyHeader = new Vue({
  el: '#sticky-header',
  data: {
    isShown: false
  },
  mounted: function() {
    window.addEventListener('scroll',this.onScroll);
  },
  beforeDestroy: function() {
    window.removeEventListener('scroll',this.onScroll);
  },
  methods: {
    onScroll: function() {
      this.isShown = (window.pageYOffset > window.innerHeight);
    }
  }
});