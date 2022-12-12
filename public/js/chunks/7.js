(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[7],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/TermsForm.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/applicant/TermsForm.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuelidate/lib/validators */ "./node_modules/vuelidate/lib/validators/index.js");
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _services_api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../services/api */ "./resources/js/services/api.js");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

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



var mustBeTrue = function mustBeTrue(value) {
  return value;
};

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['forms'],
  data: function data() {
    return {
      submitted: false,
      form: {}
    };
  },
  validations: {
    form: {
      read_constitution: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"],
        mustBeTrue: mustBeTrue
      },
      certify_details: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"],
        mustBeTrue: mustBeTrue
      },
      uk_resident: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"],
        mustBeTrue: mustBeTrue
      }
    }
  },
  methods: {
    submit: function submit() {
      var _this = this;

      this.submitted = true;
      this.$v.$touch();
      if (this.$v.$invalid) return;
      var loader = this.$loading.show({
        backgroundColor: "#000",
        color: "#5679fa",
        canCancel: false
      });

      var form_data = _objectSpread(_objectSpread({}, this.forms), this.form);

      Object(_services_api__WEBPACK_IMPORTED_MODULE_1__["submitJoiningDetails"])(form_data).then(function (_ref) {
        var route = _ref.route;
        loader.hide();

        if (!route) {
          return _this.$vToastify.error("Oops! Something went wrong. Try again or Contact support");
        }

        window.location.replace(route);
      })["catch"](function (err) {
        var msg = "Oops! Failed to submit. Try again or contact support";

        try {
          var _err$response$data = err.response.data,
              errors = _err$response$data.errors,
              message = _err$response$data.message;

          if (message) {
            msg = message;
          }

          if (errors) {
            Object.keys(errors).forEach(function (e) {
              setTimeout(function () {
                _this.$vToastify.error(errors[e][0]);
              }, 1000);
            });
          }
        } catch (error) {}

        _this.$vToastify.error(msg);

        loader.hide();
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/TermsForm.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/applicant/TermsForm.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.disable-select {\n  -webkit-user-select: none;  \n  -moz-user-select: none;    \n  -ms-user-select: none;      \n  user-select: none;\n  cursor: pointer;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/TermsForm.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/applicant/TermsForm.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./TermsForm.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/TermsForm.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/TermsForm.vue?vue&type=template&id=329aaf03&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/applicant/TermsForm.vue?vue&type=template&id=329aaf03& ***!
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
  return _c("div", [
    _c("div", { staticClass: "custom-control custom-checkbox mt-3 mr-sm-2" }, [
      _c("input", {
        directives: [
          {
            name: "model",
            rawName: "v-model",
            value: _vm.form.read_constitution,
            expression: "form.read_constitution"
          }
        ],
        staticClass: "custom-control-input",
        class: { "is-invalid": _vm.submitted && !_vm.form.read_constitution },
        attrs: { id: "const", type: "checkbox" },
        domProps: {
          checked: Array.isArray(_vm.form.read_constitution)
            ? _vm._i(_vm.form.read_constitution, null) > -1
            : _vm.form.read_constitution
        },
        on: {
          change: function($event) {
            var $$a = _vm.form.read_constitution,
              $$el = $event.target,
              $$c = $$el.checked ? true : false
            if (Array.isArray($$a)) {
              var $$v = null,
                $$i = _vm._i($$a, $$v)
              if ($$el.checked) {
                $$i < 0 &&
                  _vm.$set(_vm.form, "read_constitution", $$a.concat([$$v]))
              } else {
                $$i > -1 &&
                  _vm.$set(
                    _vm.form,
                    "read_constitution",
                    $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                  )
              }
            } else {
              _vm.$set(_vm.form, "read_constitution", $$c)
            }
          }
        }
      }),
      _vm._v(" "),
      _vm._m(0)
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "custom-control custom-checkbox mt-3 mr-sm-2" }, [
      _c("input", {
        directives: [
          {
            name: "model",
            rawName: "v-model",
            value: _vm.form.certify_details,
            expression: "form.certify_details"
          }
        ],
        staticClass: "custom-control-input",
        class: { "is-invalid": _vm.submitted && !_vm.form.certify_details },
        attrs: { id: "info", type: "checkbox" },
        domProps: {
          checked: Array.isArray(_vm.form.certify_details)
            ? _vm._i(_vm.form.certify_details, null) > -1
            : _vm.form.certify_details
        },
        on: {
          change: function($event) {
            var $$a = _vm.form.certify_details,
              $$el = $event.target,
              $$c = $$el.checked ? true : false
            if (Array.isArray($$a)) {
              var $$v = null,
                $$i = _vm._i($$a, $$v)
              if ($$el.checked) {
                $$i < 0 &&
                  _vm.$set(_vm.form, "certify_details", $$a.concat([$$v]))
              } else {
                $$i > -1 &&
                  _vm.$set(
                    _vm.form,
                    "certify_details",
                    $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                  )
              }
            } else {
              _vm.$set(_vm.form, "certify_details", $$c)
            }
          }
        }
      }),
      _vm._v(" "),
      _c(
        "label",
        {
          staticClass: "custom-control-label disable-select",
          attrs: { for: "info" }
        },
        [
          _vm._v(
            "I certify that the information provided is true and correct in all respect"
          )
        ]
      )
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "custom-control custom-checkbox mt-3 mr-sm-2" }, [
      _c("input", {
        directives: [
          {
            name: "model",
            rawName: "v-model",
            value: _vm.form.uk_resident,
            expression: "form.uk_resident"
          }
        ],
        staticClass: "custom-control-input",
        class: { "is-invalid": _vm.submitted && !_vm.form.uk_resident },
        attrs: { id: "resident", type: "checkbox" },
        domProps: {
          checked: Array.isArray(_vm.form.uk_resident)
            ? _vm._i(_vm.form.uk_resident, null) > -1
            : _vm.form.uk_resident
        },
        on: {
          change: function($event) {
            var $$a = _vm.form.uk_resident,
              $$el = $event.target,
              $$c = $$el.checked ? true : false
            if (Array.isArray($$a)) {
              var $$v = null,
                $$i = _vm._i($$a, $$v)
              if ($$el.checked) {
                $$i < 0 && _vm.$set(_vm.form, "uk_resident", $$a.concat([$$v]))
              } else {
                $$i > -1 &&
                  _vm.$set(
                    _vm.form,
                    "uk_resident",
                    $$a.slice(0, $$i).concat($$a.slice($$i + 1))
                  )
              }
            } else {
              _vm.$set(_vm.form, "uk_resident", $$c)
            }
          }
        }
      }),
      _vm._v(" "),
      _c(
        "label",
        {
          staticClass: "custom-control-label disable-select",
          attrs: { for: "resident" }
        },
        [_vm._v("I live in the United Kingdom. All nominees live in the UK")]
      )
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "row mt-3" }, [
      _c(
        "div",
        {
          staticClass: "col-12 text-center",
          on: {
            click: function($event) {
              return _vm.submit()
            }
          }
        },
        [
          _c("button", { staticClass: "btn radix-btn" }, [
            _vm._v("Submit Details")
          ])
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "label",
      {
        staticClass: "custom-control-label disable-select",
        attrs: { for: "const" }
      },
      [
        _vm._v("\n      I have read and understand the\n      "),
        _c("a", { attrs: { href: "/constitution" } }, [_vm._v("Constitution")]),
        _vm._v(" of UKZ Chema Association\n    ")
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/applicant/TermsForm.vue":
/*!*********************************************************!*\
  !*** ./resources/js/components/applicant/TermsForm.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _TermsForm_vue_vue_type_template_id_329aaf03___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./TermsForm.vue?vue&type=template&id=329aaf03& */ "./resources/js/components/applicant/TermsForm.vue?vue&type=template&id=329aaf03&");
/* harmony import */ var _TermsForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./TermsForm.vue?vue&type=script&lang=js& */ "./resources/js/components/applicant/TermsForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _TermsForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./TermsForm.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/applicant/TermsForm.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _TermsForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _TermsForm_vue_vue_type_template_id_329aaf03___WEBPACK_IMPORTED_MODULE_0__["render"],
  _TermsForm_vue_vue_type_template_id_329aaf03___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/applicant/TermsForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/applicant/TermsForm.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/applicant/TermsForm.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TermsForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./TermsForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/TermsForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TermsForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/applicant/TermsForm.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/applicant/TermsForm.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TermsForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./TermsForm.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/TermsForm.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TermsForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TermsForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TermsForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TermsForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_TermsForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/applicant/TermsForm.vue?vue&type=template&id=329aaf03&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/applicant/TermsForm.vue?vue&type=template&id=329aaf03& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TermsForm_vue_vue_type_template_id_329aaf03___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./TermsForm.vue?vue&type=template&id=329aaf03& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/TermsForm.vue?vue&type=template&id=329aaf03&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TermsForm_vue_vue_type_template_id_329aaf03___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_TermsForm_vue_vue_type_template_id_329aaf03___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/services/api.js":
/*!**************************************!*\
  !*** ./resources/js/services/api.js ***!
  \**************************************/
/*! exports provided: submitJoiningDetails, isUnique */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "submitJoiningDetails", function() { return submitJoiningDetails; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isUnique", function() { return isUnique; });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }



var submitJoiningDetails = function submitJoiningDetails(details) {
  return new Promise(function (resolve, reject) {
    axios__WEBPACK_IMPORTED_MODULE_1___default.a.post('/api/join', details).then( /*#__PURE__*/function () {
      var _ref2 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee(_ref) {
        var data;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                data = _ref.data;
                return _context.abrupt("return", resolve(data));

              case 2:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }));

      return function (_x) {
        return _ref2.apply(this, arguments);
      };
    }())["catch"](function (err) {
      console.log(Object.keys(err));
      return reject(err);
    });
  });
};

var isUnique = function isUnique(email) {
  return axios__WEBPACK_IMPORTED_MODULE_1___default.a.post('/api/unique-email', {
    email: email
  });
};



/***/ })

}]);