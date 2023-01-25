(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[14],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ApplicationForm.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/ApplicationForm.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['max_nominees'],
  components: {
    PersonalForm: function PersonalForm() {
      return Promise.all(/*! import() */[__webpack_require__.e(1), __webpack_require__.e(2), __webpack_require__.e(5), __webpack_require__.e(32)]).then(__webpack_require__.bind(null, /*! ./applicant/PersonalForm */ "./resources/js/components/applicant/PersonalForm.vue"));
    },
    NextofKin: function NextofKin() {
      return Promise.all(/*! import() */[__webpack_require__.e(1), __webpack_require__.e(2), __webpack_require__.e(30)]).then(__webpack_require__.bind(null, /*! ./applicant/NextofKin */ "./resources/js/components/applicant/NextofKin.vue"));
    },
    NomineeContainer: function NomineeContainer() {
      return __webpack_require__.e(/*! import() */ 9).then(__webpack_require__.bind(null, /*! ./applicant/NomineeContainer */ "./resources/js/components/applicant/NomineeContainer.vue"));
    },
    TermsForm: function TermsForm() {
      return Promise.all(/*! import() */[__webpack_require__.e(1), __webpack_require__.e(5), __webpack_require__.e(10)]).then(__webpack_require__.bind(null, /*! ./applicant/TermsForm */ "./resources/js/components/applicant/TermsForm.vue"));
    }
  },
  data: function data() {
    return {
      step: 1,
      forms: {},
      completed: [],
      links: [{
        title: "Personal",
        step: 1,
        icon: "lni-user"
      }, {
        title: "Next of Kin",
        step: 2,
        icon: "lni-users"
      }, {
        title: "Nominee",
        step: 3,
        icon: "lni-customer"
      }, {
        title: "Terms of Use",
        step: 4,
        icon: "lni-radio-button"
      }]
    };
  },
  methods: {
    viewForm: function viewForm(step) {
      if (!this.completed[step]) return;
      this.step = step;
    },
    isActive: function isActive(step) {
      if (step === this.step) return "active-step";
      return "";
    },
    formCompleted: function formCompleted(event, step) {
      this.completed[step] = true;
      this.forms = _objectSpread(_objectSpread({}, this.forms), event);
      console.log("Previous Form\n", this.forms);
      if (step < this.links.length + 1) {
        this.step += 1;
      }
    }
  },
  watch: {
    step: function step(_step) {
      if (typeof $ !== "undefined") {
        $('html, body').animate({
          scrollTop: $("#step-".concat(_step)).offset().top + 24 + "px"
        }, "slow");
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ApplicationForm.vue?vue&type=template&id=18879ece&":
/*!************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/ApplicationForm.vue?vue&type=template&id=18879ece& ***!
  \************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "radix--blog--area my-5"
  }, [_c("div", {
    staticClass: "container"
  }, [_c("div", {
    staticClass: "row"
  }, [_c("div", {
    staticClass: "col-12 col-md-4 mb-2 mb-md-0"
  }, [_c("div", {
    staticClass: "account-side-area"
  }, [_c("div", {
    staticClass: "single-widget-area mb-3 apply-form-nav"
  }, [_c("ul", {
    staticClass: "catagories-list"
  }, _vm._l(_vm.links, function (link) {
    return _c("li", {
      key: link.link,
      staticClass: "pl-3",
      style: _vm.completed[link.step] ? "" : "cursor: not-allowed;",
      on: {
        click: function click($event) {
          return _vm.viewForm(link.step);
        }
      }
    }, [_c("a", {
      "class": _vm.isActive(link.step),
      style: _vm.completed[link.step] ? "" : "cursor: not-allowed;",
      attrs: {
        href: "javascript:;"
      }
    }, [_c("i", {
      "class": "lni " + link.icon
    }), _vm._v("\n                  " + _vm._s(link.title) + "\n                ")])]);
  }), 0)])])]), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-md-8"
  }, [_c("div", {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: _vm.step === 1,
      expression: "step === 1"
    }]
  }, [_vm._m(0), _vm._v(" "), _c("personal-form", {
    on: {
      done: function done($event) {
        return _vm.formCompleted($event, 1);
      }
    }
  })], 1), _vm._v(" "), _c("div", {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: _vm.step === 2,
      expression: "step === 2"
    }]
  }, [_vm._m(1), _vm._v(" "), _c("nextof-kin", {
    on: {
      done: function done($event) {
        return _vm.formCompleted($event, 2);
      }
    }
  })], 1), _vm._v(" "), _c("div", {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: _vm.step === 3,
      expression: "step === 3"
    }]
  }, [_vm._m(2), _vm._v(" "), _c("nominee-container", {
    attrs: {
      max_nominees: _vm.max_nominees
    },
    on: {
      done: function done($event) {
        return _vm.formCompleted($event, 3);
      }
    }
  })], 1), _vm._v(" "), _c("div", {
    directives: [{
      name: "show",
      rawName: "v-show",
      value: _vm.step === 4,
      expression: "step === 4"
    }]
  }, [_vm._m(3), _vm._v(" "), _c("terms-form", {
    attrs: {
      forms: _vm.forms
    },
    on: {
      done: function done($event) {
        return _vm.formCompleted($event, 4);
      }
    }
  })], 1)])])])]);
};
var staticRenderFns = [function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    attrs: {
      id: "step-1"
    }
  }, [_c("h5", {
    staticClass: "mb-1"
  }, [_vm._v("Become a Member")]), _vm._v(" "), _c("p", [_vm._v("Please note that all applications require the approval of the UKZ Chema Association.")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    attrs: {
      id: "step-2"
    }
  }, [_c("h5", {
    staticClass: "mb-1"
  }, [_vm._v("Next of kin details")]), _vm._v(" "), _c("p", [_vm._v("The person we can contact in case of emergency and to whom funds are released in the event of your passing on.\n              "), _c("strong", [_vm._v(" (next of kin is not a nominee) ")])])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    attrs: {
      id: "step-3"
    }
  }, [_c("h5", {
    staticClass: "mb-1"
  }, [_vm._v("Nominees details")]), _vm._v(" "), _c("p", [_vm._v("You can add up to 4 nominees")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    attrs: {
      id: "step-4"
    }
  }, [_c("h5", {
    staticClass: "mb-1"
  }, [_vm._v("Agree to terms")])]);
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

/***/ "./resources/js/components/ApplicationForm.vue":
/*!*****************************************************!*\
  !*** ./resources/js/components/ApplicationForm.vue ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ApplicationForm_vue_vue_type_template_id_18879ece___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ApplicationForm.vue?vue&type=template&id=18879ece& */ "./resources/js/components/ApplicationForm.vue?vue&type=template&id=18879ece&");
/* harmony import */ var _ApplicationForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ApplicationForm.vue?vue&type=script&lang=js& */ "./resources/js/components/ApplicationForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ApplicationForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ApplicationForm_vue_vue_type_template_id_18879ece___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ApplicationForm_vue_vue_type_template_id_18879ece___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/ApplicationForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/ApplicationForm.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/components/ApplicationForm.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ApplicationForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./ApplicationForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ApplicationForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ApplicationForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/ApplicationForm.vue?vue&type=template&id=18879ece&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/ApplicationForm.vue?vue&type=template&id=18879ece& ***!
  \************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_ApplicationForm_vue_vue_type_template_id_18879ece___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!../../../node_modules/vue-loader/lib??vue-loader-options!./ApplicationForm.vue?vue&type=template&id=18879ece& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ApplicationForm.vue?vue&type=template&id=18879ece&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_ApplicationForm_vue_vue_type_template_id_18879ece___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_ApplicationForm_vue_vue_type_template_id_18879ece___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);