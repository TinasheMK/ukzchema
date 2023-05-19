(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[19],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/GuestNav.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/GuestNav.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['about_us', 'contact_us', 'constitution', 'login'],
  mounted: function mounted() {
    console.log("Test");
    var parts = this.$route.path.split('/');
    this.page = parts[parts.length - 1];
    if (this.page === "login") {
      this.auth_link = "/join-now";
      this.auth_text = "Join Now";
    } else if (this.page === "register") {
      this.auth_link = "/login";
      this.auth_text = "Sign In";
    } else {
      this.auth_link = "/join-now";
      this.auth_text = "Join Now";
    }
  },
  data: function data() {
    return {
      page: "",
      auth_link: null,
      auth_text: null
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/GuestNav.vue?vue&type=template&id=17411c16&":
/*!*****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/GuestNav.vue?vue&type=template&id=17411c16& ***!
  \*****************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", [_c("header", {
    staticClass: "header-area header2"
  }, [_c("div", {
    staticClass: "container"
  }, [_c("div", {
    staticClass: "classy-nav-container breakpoint-off"
  }, [_c("nav", {
    staticClass: "classy-navbar navbar2 justify-content-between",
    attrs: {
      id: "radixNav"
    }
  }, [_vm._m(0), _vm._v(" "), _vm._m(1), _vm._v(" "), _c("div", {
    staticClass: "classy-menu"
  }, [_vm._m(2), _vm._v(" "), _c("div", {
    staticClass: "classynav"
  }, [_c("ul", {
    attrs: {
      id: "corenav"
    }
  }, [_vm._m(3), _vm._v(" "), _c("li", [_c("a", {
    attrs: {
      href: _vm.about_us
    }
  }, [_vm._v("About Us")])]), _vm._v(" "), _c("li", [_c("a", {
    attrs: {
      href: _vm.contact_us
    }
  }, [_vm._v("Contact Us")])]), _vm._v(" "), _c("li", [_c("a", {
    attrs: {
      href: _vm.constitution
    }
  }, [_vm._v("Constitution")])])]), _vm._v(" "), _vm.auth_link && _vm.auth_text ? _c("div", {
    staticClass: "login-btn-area ml-5 mt-5 mt-lg-0"
  }, [_vm.page !== "login" ? _c("a", {
    staticClass: "btn radix-btn btn-sm",
    attrs: {
      href: _vm.login
    }
  }, [_vm._v("Login")]) : _vm._e(), _vm._v(" "), _c("a", {
    staticClass: "btn radix-btn white-btn btn-sm",
    attrs: {
      href: _vm.auth_link
    }
  }, [_vm._v(_vm._s(_vm.auth_text))])]) : _vm._e()])])])])])])]);
};
var staticRenderFns = [function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("a", {
    staticClass: "nav-brand mr-5",
    attrs: {
      href: "/"
    }
  }, [_c("img", {
    attrs: {
      src: "storage/img/logo.png",
      alt: ""
    }
  })]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "classy-navbar-toggler"
  }, [_c("span", {
    staticClass: "navbarToggler"
  }, [_c("span"), _vm._v(" "), _c("span"), _vm._v(" "), _c("span"), _vm._v(" "), _c("span")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "classycloseIcon"
  }, [_c("div", {
    staticClass: "cross-wrap"
  }, [_c("span", {
    staticClass: "top"
  }), _vm._v(" "), _c("span", {
    staticClass: "bottom"
  })])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("li", [_c("a", {
    attrs: {
      href: "/"
    }
  }, [_vm._v("Home")])]);
}];
render._withStripped = true;


/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent(
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier /* server only */,
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options =
    typeof scriptExports === 'function' ? scriptExports.options : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) {
    // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
          injectStyles.call(
            this,
            (options.functional ? this.parent : this).$root.$options.shadowRoot
          )
        }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection(h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing ? [].concat(existing, hook) : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/components/GuestNav.vue":
/*!**********************************************!*\
  !*** ./resources/js/components/GuestNav.vue ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _GuestNav_vue_vue_type_template_id_17411c16___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./GuestNav.vue?vue&type=template&id=17411c16& */ "./resources/js/components/GuestNav.vue?vue&type=template&id=17411c16&");
/* harmony import */ var _GuestNav_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./GuestNav.vue?vue&type=script&lang=js& */ "./resources/js/components/GuestNav.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _GuestNav_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _GuestNav_vue_vue_type_template_id_17411c16___WEBPACK_IMPORTED_MODULE_0__["render"],
  _GuestNav_vue_vue_type_template_id_17411c16___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/GuestNav.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/GuestNav.vue?vue&type=script&lang=js&":
/*!***********************************************************************!*\
  !*** ./resources/js/components/GuestNav.vue?vue&type=script&lang=js& ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_GuestNav_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./GuestNav.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/GuestNav.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_GuestNav_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/GuestNav.vue?vue&type=template&id=17411c16&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/GuestNav.vue?vue&type=template&id=17411c16& ***!
  \*****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_GuestNav_vue_vue_type_template_id_17411c16___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!../../../node_modules/vue-loader/lib??vue-loader-options!./GuestNav.vue?vue&type=template&id=17411c16& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/GuestNav.vue?vue&type=template&id=17411c16&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_GuestNav_vue_vue_type_template_id_17411c16___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_GuestNav_vue_vue_type_template_id_17411c16___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);