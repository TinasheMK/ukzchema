(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[11],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/DonateButton.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/member/DonateButton.vue?vue&type=script&lang=js& ***!
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
__webpack_require__(/*! ../../libs/bootstrap-notify */ "./resources/js/libs/bootstrap-notify.js");

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ["obituary", "min", "route", "client_id"],
  data: function data() {
    return {
      donate: false,
      amount: this.min,
      loaded: false,
      obituary_id: this.obituary.id,
      amount_err: false,
      orderID: null,
      error: false,
      btn_text: "Donate"
    };
  },
  mounted: function mounted() {
    console.log(this.obituary, this.min);
  },
  methods: {
    loadError: function loadError() {
      this.error = true;
    },
    loadPayPal: function loadPayPal() {
      if (this.amount == 0) {
        alert('Oops! Invalid Amount');
        return;
      }

      this.donate = true;
      this.btn_text = "Do not Close";
      var scr = document.createElement("script");
      scr.src = "https://www.paypal.com/sdk/js?client-id=".concat(this.client_id, "&currency=GBP");
      scr.addEventListener("load", this.showModal);
      scr.addEventListener("error", this.loadError);
      document.body.append(scr);
    },
    showModal: function showModal(e) {
      var _this = this;

      this.loaded = true;

      if (typeof paypal === "undefined") {
        console.log("Error loading");
        return;
      }

      paypal.Buttons({
        createOrder: function createOrder(data, action) {
          return action.order.create({
            application_context: {
              brand_name: "UKZ Chema Association",
              user_action: "PAY_NOW",
              shipping_preference: "NO_SHIPPING"
            },
            purchase_units: [{
              description: "Chema payment for ".concat(_this.obituary.full_name),
              amount: {
                currency_code: "GBP",
                value: _this.amount
              }
            }]
          });
        },
        onApprove: function onApprove(data, actions) {
          return actions.order.capture().then(function (details) {
            if (details.status == "COMPLETED") {
              console.log(data);
              _this.orderID = data.orderID;
              _this.loaded = false;

              _this.finalise(data.orderID);
            } else {
              _this.alertError("Error saving your payment, contact support with ID: " + data.orderID, true);
            }
          });
        }
      }).render(this.$refs.paypal);
    },
    finalise: function finalise(orderID) {
      var _this2 = this;

      $.notify({
        icon: "nc-icon nc-check-2",
        message: "Payment received. Redirecting..."
      }, {
        type: "primary",
        timer: 5000,
        placement: {
          from: "top",
          align: "right"
        }
      });
      this.orderID = orderID;
      setTimeout(function () {
        return _this2.$refs.form.submit();
      }, 80);
    },
    alertError: function alertError(message) {
      var e = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      if (!e) this.amount_err = true;
      $.notify({
        icon: "nc-icon nc-simple-remove",
        message: message
      }, {
        type: "danger",
        timer: e ? 8000 : 3000,
        placement: {
          from: "top",
          align: "right"
        }
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/DonateButton.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/member/DonateButton.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.currency-err {\n  border-color: var(--danger) !important;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/DonateButton.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/member/DonateButton.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./DonateButton.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/DonateButton.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/DonateButton.vue?vue&type=template&id=3ea2a20a&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/member/DonateButton.vue?vue&type=template&id=3ea2a20a& ***!
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
  return _c("div", { staticClass: "button-container" }, [
    _c("div", { staticClass: "row" }, [
      !_vm.loaded
        ? _c("div", { staticClass: "col-12 text-center" }, [
            _c("div", { staticClass: "update ml-auto mr-auto" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-primary btn-block",
                  on: {
                    click: function($event) {
                      return _vm.loadPayPal()
                    }
                  }
                },
                [
                  _vm.donate && !_vm.error
                    ? _c("span", { staticClass: "mr-1" }, [
                        _c("i", { staticClass: "fa fa-circle-o-notch fa-spin" })
                      ])
                    : _vm._e(),
                  _vm._v(" "),
                  _c("span", [_vm._v("Pay £" + _vm._s(_vm.min))])
                ]
              )
            ])
          ])
        : _vm._e()
    ]),
    _vm._v(" "),
    _vm.error
      ? _c("p", { staticClass: "text-danger text-center mt-2" }, [
          _c("i", { staticClass: "fa fa-frown-o" }),
          _vm._v("\n    Error loading PayPal. Refresh this page.\n  ")
        ])
      : _vm._e(),
    _vm._v(" "),
    _vm.loaded && !_vm.error
      ? _c("h5", { staticClass: "h6" }, [_vm._v("Payment method:")])
      : _vm._e(),
    _vm._v(" "),
    _vm.donate
      ? _c("div", { ref: "paypal", staticClass: "mx-2 mt-3" })
      : _vm._e(),
    _vm._v(" "),
    _c(
      "form",
      {
        ref: "form",
        attrs: { action: _vm.route, method: "POST", id: "submit_donation" }
      },
      [
        _vm._t("default"),
        _vm._v(" "),
        _c("input", {
          directives: [
            {
              name: "model",
              rawName: "v-model",
              value: _vm.orderID,
              expression: "orderID"
            }
          ],
          attrs: { type: "hidden", name: "orderID" },
          domProps: { value: _vm.orderID },
          on: {
            input: function($event) {
              if ($event.target.composing) {
                return
              }
              _vm.orderID = $event.target.value
            }
          }
        }),
        _vm._v(" "),
        _c("input", {
          attrs: { type: "hidden", name: "obituary_id" },
          domProps: { value: _vm.obituary_id }
        })
      ],
      2
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/member/DonateButton.vue":
/*!*********************************************************!*\
  !*** ./resources/js/components/member/DonateButton.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DonateButton_vue_vue_type_template_id_3ea2a20a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DonateButton.vue?vue&type=template&id=3ea2a20a& */ "./resources/js/components/member/DonateButton.vue?vue&type=template&id=3ea2a20a&");
/* harmony import */ var _DonateButton_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DonateButton.vue?vue&type=script&lang=js& */ "./resources/js/components/member/DonateButton.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _DonateButton_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./DonateButton.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/member/DonateButton.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _DonateButton_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DonateButton_vue_vue_type_template_id_3ea2a20a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _DonateButton_vue_vue_type_template_id_3ea2a20a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/member/DonateButton.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/member/DonateButton.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/member/DonateButton.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DonateButton_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./DonateButton.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/DonateButton.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DonateButton_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/member/DonateButton.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/member/DonateButton.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DonateButton_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./DonateButton.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/DonateButton.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DonateButton_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DonateButton_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DonateButton_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DonateButton_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DonateButton_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/member/DonateButton.vue?vue&type=template&id=3ea2a20a&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/member/DonateButton.vue?vue&type=template&id=3ea2a20a& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DonateButton_vue_vue_type_template_id_3ea2a20a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./DonateButton.vue?vue&type=template&id=3ea2a20a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/member/DonateButton.vue?vue&type=template&id=3ea2a20a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DonateButton_vue_vue_type_template_id_3ea2a20a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DonateButton_vue_vue_type_template_id_3ea2a20a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);