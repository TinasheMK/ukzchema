(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[26],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/DepositModal.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/member/DepositModal.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['route', 'user', 'client_id'],
  mounted: function mounted() {
    var _this = this;

    console.log(this.user, this.client_id);
    $("#depositModal").on("show.bs.modal", function (e) {
      if (!_this.open) {
        var scr = document.createElement("script");
        scr.src = "https://www.paypal.com/sdk/js?client-id=".concat(_this.client_id, "&currency=GBP");
        scr.addEventListener("load", _this.loadPayPal);
        scr.addEventListener("error", _this.loadError);
        document.body.append(scr);
        _this.script = scr;
      }
    });
    $('#depositModal').on('hidden.bs.modal', function (e) {
      if (_this.error) {
        _this.error = false;
        $(_this.script).remove();
        _this.load = false;
      }
    });
  },
  data: function data() {
    return {
      open: false,
      error: false,
      amount: null,
      payment_ref: null,
      script: null
    };
  },
  methods: {
    finalise: function finalise(payment_ref) {
      var _this2 = this;

      console.log(payment_ref);
      $.notify({
        icon: "nc-icon nc-check-2",
        message: "Deposited Successfully. Please wait.."
      }, {
        type: "primary",
        timer: 5000,
        placement: {
          from: "top",
          align: "right"
        }
      });
      this.payment_ref = payment_ref;
      setTimeout(function () {
        return _this2.$refs.form.submit();
      }, 80);
    },
    loadError: function loadError() {
      this.error = true;
    },
    loadPayPal: function loadPayPal(e) {
      var _this3 = this;

      this.open = true;
      console.log(e, "Loaded Successfully");

      if (typeof paypal === "undefined") {
        this.error = true;
        return;
      }

      paypal.Buttons({
        createOrder: function createOrder(data, action) {
          _this3.amount = parseFloat(_this3.amount);
          _this3.amount = _this3.amount;
          _this3.amount = _this3.amount.toFixed(2);
          _this3.amount1 = _this3.amount / 0.9871 + 0.30 - _this3.amount;
          _this3.amount1 = _this3.amount1.toFixed(2);
          console.log("Paypal payment of: ", _this3.amount);
          return action.order.create({
            application_context: {
              brand_name: "UKZ Chema Association",
              user_action: "PAY_NOW",
              shipping_preference: "NO_SHIPPING"
            },
            purchase_units: [{
              reference_id: "d9f80740-38f0-11e8-b467-0ed5f89f7165",
              description: "Funds Deposit for user: ".concat(_this3.user.id, " (").concat(_this3.user.name, ")"),
              amount: {
                currency_code: "GBP",
                value: _this3.amount
              }
            }, {
              reference_id: "d9f80740-38f0-11e8-b467-0ed5f89f718b",
              description: "Charges",
              amount: {
                currency_code: "GBP",
                value: _this3.amount1
              }
            }]
          });
        },
        onApprove: function onApprove(data, actions) {
          return actions.order.capture().then(function (details) {
            if (details.status == "COMPLETED") {
              _this3.orderID = data.orderID;

              _this3.finalise(data.orderID);
            } else {
              $.notify({
                icon: "nc-icon nc-simple-remove",
                message: "Error saving your payment, contact support with ID: ".concat(data.orderID)
              }, {
                type: "danger",
                timer: 8000,
                placement: {
                  from: "top",
                  align: "right"
                }
              });
            }
          });
        }
      }).render(this.$refs.paypal);
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/DepositModal.vue?vue&type=template&id=d27e7fae&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/member/DepositModal.vue?vue&type=template&id=d27e7fae& ***!
  \**********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "modal fade",
      attrs: {
        id: "depositModal",
        tabindex: "-1",
        role: "dialog",
        "aria-labelledby": "depositModalTitle",
        "aria-hidden": "true"
      }
    },
    [
      _c("div", { staticClass: "modal-dialog", attrs: { role: "document" } }, [
        _c("div", { staticClass: "modal-content" }, [
          _vm._m(0),
          _vm._v(" "),
          _c("div", { staticClass: "modal-body" }, [
            _c("div", { staticClass: "col-12 mb-2" }, [
              _c("label", { attrs: { for: "_amount" } }, [_vm._v("Amount")]),
              _vm._v(" "),
              _c("p", [
                _vm._v(
                  "Please note payment will include additional transaction charges that are not part of the deposit."
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "input-group mb-3" }, [
                _vm._m(1),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model.number",
                      value: _vm.amount,
                      expression: "amount",
                      modifiers: { number: true }
                    }
                  ],
                  staticClass: "form-control",
                  attrs: {
                    id: "_amount",
                    type: "number",
                    placeholder: "Amount",
                    "aria-label": "Amount",
                    "aria-describedby": "amount"
                  },
                  domProps: { value: _vm.amount },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.amount = _vm._n($event.target.value)
                    },
                    blur: function($event) {
                      return _vm.$forceUpdate()
                    }
                  }
                })
              ])
            ]),
            _vm._v(" "),
            !_vm.open && !_vm.error
              ? _c("p", { staticClass: "text-center" }, [
                  _c("i", { staticClass: "fa fa-circle-o-notch fa-spin" }),
                  _vm._v(" Loading PayPal\n        ")
                ])
              : _vm._e(),
            _vm._v(" "),
            _vm.error
              ? _c("p", { staticClass: "text-danger text-center" }, [
                  _c("i", { staticClass: "fa fa-frown-o" }),
                  _vm._v(
                    "\n          Error loading PayPal. Refresh this page.\n        "
                  )
                ])
              : _vm._e(),
            _vm._v(" "),
            _vm.open
              ? _c("h5", { staticClass: "h6" }, [_vm._v("Deposit method:")])
              : _vm._e(),
            _vm._v(" "),
            _c("div", { ref: "paypal", staticClass: "mx-2 mt-3" }),
            _vm._v(" "),
            _c(
              "form",
              { ref: "form", attrs: { action: _vm.route, method: "POST" } },
              [
                _vm._t("default"),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.payment_ref,
                      expression: "payment_ref"
                    }
                  ],
                  attrs: { type: "hidden", name: "payment_ref" },
                  domProps: { value: _vm.payment_ref },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.payment_ref = $event.target.value
                    }
                  }
                })
              ],
              2
            )
          ])
        ])
      ])
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-header" }, [
      _c(
        "h5",
        { staticClass: "modal-title", attrs: { id: "depositModalTitle" } },
        [_vm._v("Deposit Funds")]
      ),
      _vm._v(" "),
      _c(
        "button",
        {
          staticClass: "close",
          attrs: {
            type: "button",
            "data-dismiss": "modal",
            "aria-label": "Close"
          }
        },
        [_c("span", { attrs: { "aria-hidden": "true" } }, [_vm._v("×")])]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group-prepend" }, [
      _c("span", { staticClass: "input-group-text", attrs: { id: "amount" } }, [
        _vm._v("£")
      ])
    ])
  }
]
render._withStripped = true



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

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

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
  if (moduleIdentifier) { // server build
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
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/components/member/DepositModal.vue":
/*!*********************************************************!*\
  !*** ./resources/js/components/member/DepositModal.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DepositModal_vue_vue_type_template_id_d27e7fae___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DepositModal.vue?vue&type=template&id=d27e7fae& */ "./resources/js/components/member/DepositModal.vue?vue&type=template&id=d27e7fae&");
/* harmony import */ var _DepositModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DepositModal.vue?vue&type=script&lang=js& */ "./resources/js/components/member/DepositModal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _DepositModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DepositModal_vue_vue_type_template_id_d27e7fae___WEBPACK_IMPORTED_MODULE_0__["render"],
  _DepositModal_vue_vue_type_template_id_d27e7fae___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/member/DepositModal.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/member/DepositModal.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/member/DepositModal.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DepositModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./DepositModal.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/DepositModal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DepositModal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/member/DepositModal.vue?vue&type=template&id=d27e7fae&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/member/DepositModal.vue?vue&type=template&id=d27e7fae& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DepositModal_vue_vue_type_template_id_d27e7fae___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./DepositModal.vue?vue&type=template&id=d27e7fae& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/DepositModal.vue?vue&type=template&id=d27e7fae&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DepositModal_vue_vue_type_template_id_d27e7fae___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DepositModal_vue_vue_type_template_id_d27e7fae___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);