(window.webpackJsonp=window.webpackJsonp||[]).push([[17],{1:function(t,e,n){"use strict";function a(t,e,n,a,s,r,i,o){var c,l="function"==typeof t?t.options:t;if(e&&(l.render=e,l.staticRenderFns=n,l._compiled=!0),a&&(l.functional=!0),r&&(l._scopeId="data-v-"+r),i?(c=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),s&&s.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(i)},l._ssrRegister=c):s&&(c=o?function(){s.call(this,(l.functional?this.parent:this).$root.$options.shadowRoot)}:s),c)if(l.functional){l._injectStyles=c;var u=l.render;l.render=function(t,e){return c.call(e),u(t,e)}}else{var d=l.beforeCreate;l.beforeCreate=d?[].concat(d,c):[c]}return{exports:t,options:l}}n.d(e,"a",(function(){return a}))},228:function(t,e,n){"use strict";n.r(e);var a={props:["page","bread"],mounted:function(){console.log(this.page,this.bread)},methods:{getRoute:function(t){return t===this.page?"javascript:;":"/"}}},s=n(1),r=Object(s.a)(a,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"breadcrumb--area white-bg-breadcrumb"},[n("div",{staticClass:"container h-100"},[n("div",{staticClass:"row h-100 align-items-center"},[n("div",{staticClass:"col-12"},[n("div",{staticClass:"breadcrumb-content"},[n("h2",{staticClass:"breadcrumb-title"},[t._v(t._s(t.page))]),t._v(" "),n("nav",{attrs:{"aria-label":"breadcrumb"}},[n("ol",{staticClass:"breadcrumb justify-content-center"},t._l(t.bread,(function(e){return n("li",{key:e,staticClass:"breadcrumb-item",class:e===t.page?"active":"",attrs:{"aria-current":e===t.page?"page":null}},[n("a",{attrs:{href:t.getRoute(e)}},[t._v(t._s(e))])])})),0)])])])])])])}),[],!1,null,null,null);e.default=r.exports}}]);