(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[31],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/NomineeForm.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/applicant/NomineeForm.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuelidate/lib/validators */ "./node_modules/vuelidate/lib/validators/index.js");
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var libphonenumber_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! libphonenumber-js */ "./node_modules/libphonenumber-js/index.es6.js");
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
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Datepicker: function Datepicker() {
      return __webpack_require__.e(/*! import() */ 0).then(__webpack_require__.bind(null, /*! vuejs-datepicker */ "./node_modules/vuejs-datepicker/dist/vuejs-datepicker.esm.js"));
    }
  },
  mounted: function mounted() {
    var _this = this;

    this.$eventBus.$on("validate:nominee", function (skip) {
      if (skip) {
        return _this.$emit("nomineeValid", _this.form);
      }

      _this.submitted = true;

      _this.$v.$touch();

      if (_this.$v.$invalid) {
        _this.scrollErrorToView();

        return;
      }

      _this.$emit("nomineeValid", _this.form);
    });
  },
  data: function data() {
    return {
      submitted: false,
      form: {}
    };
  },
  validations: {
    form: {
      full_name: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      },
      dob: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      },
      email: {
        email: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["email"]
      },
      zimbabwean_by: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      }
    }
  },
  methods: {
    scrollErrorToView: function scrollErrorToView() {
      setTimeout(function () {
        var elem = $(".is-invalid").first();
        $(elem).focus();
      }, 100);
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/NomineeForm.vue?vue&type=template&id=69c1f666&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/applicant/NomineeForm.vue?vue&type=template&id=69c1f666& ***!
  \************************************************************************************************************************************************************************************************************************/
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
    _c("h6", [_vm._v("Enter Fullname & D.O.B as it appears on their IDs")]),
    _vm._v(" "),
    _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-12" }),
      _vm._v(" "),
      _c("div", { staticClass: "col-12 col-lg-6" }, [
        _c("label", { attrs: { for: "full_name" } }, [_vm._v("Full Name:")]),
        _vm._v(" "),
        _c("input", {
          directives: [
            {
              name: "model",
              rawName: "v-model",
              value: _vm.form.full_name,
              expression: "form.full_name"
            }
          ],
          staticClass: "form-control mb-30 bg-gray",
          class: {
            "is-invalid": _vm.submitted && _vm.$v.form.full_name.$error
          },
          attrs: {
            type: "text",
            name: "full_name",
            id: "full_name",
            placeholder: "Full Name"
          },
          domProps: { value: _vm.form.full_name },
          on: {
            keyup: function($event) {
              return _vm.$emit("fullName", _vm.form.full_name)
            },
            input: function($event) {
              if ($event.target.composing) {
                return
              }
              _vm.$set(_vm.form, "full_name", $event.target.value)
            }
          }
        })
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "col-12 col-lg-6" }, [
        _c("label", { attrs: { for: "nominee_email" } }, [_vm._v("Email:")]),
        _vm._v(" "),
        _c("input", {
          directives: [
            {
              name: "model",
              rawName: "v-model",
              value: _vm.form.email,
              expression: "form.email"
            }
          ],
          staticClass: "form-control mb-30 bg-gray",
          class: { "is-invalid": _vm.submitted && _vm.$v.form.email.$error },
          attrs: {
            id: "nominee_email",
            type: "email",
            placeholder: "Email Address"
          },
          domProps: { value: _vm.form.email },
          on: {
            input: function($event) {
              if ($event.target.composing) {
                return
              }
              _vm.$set(_vm.form, "email", $event.target.value)
            }
          }
        })
      ]),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "col-12" },
        [
          _c("datepicker", {
            attrs: {
              format: "dd MMMM yyyy",
              initialView: "year",
              name: "dob",
              placeholder: "Date of Birth",
              "input-class":
                _vm.submitted && _vm.$v.form.dob.$error
                  ? "form-control mb-30 is-invalid"
                  : "form-control mb-30"
            },
            model: {
              value: _vm.form.dob,
              callback: function($$v) {
                _vm.$set(_vm.form, "dob", $$v)
              },
              expression: "form.dob"
            }
          })
        ],
        1
      )
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-12" }, [
        _c("label", { attrs: { for: "zimbabwean_by" } }, [
          _vm._v("Zimbabwean resident by:")
        ]),
        _vm._v(" "),
        _c(
          "select",
          {
            directives: [
              {
                name: "model",
                rawName: "v-model",
                value: _vm.form.zimbabwean_by,
                expression: "form.zimbabwean_by"
              }
            ],
            staticClass: "custom-select form-control mb-30 bg-gray",
            class: {
              "is-invalid": _vm.submitted && _vm.$v.form.zimbabwean_by.$error
            },
            attrs: { id: "zimbabwean_by" },
            on: {
              change: function($event) {
                var $$selectedVal = Array.prototype.filter
                  .call($event.target.options, function(o) {
                    return o.selected
                  })
                  .map(function(o) {
                    var val = "_value" in o ? o._value : o.value
                    return val
                  })
                _vm.$set(
                  _vm.form,
                  "zimbabwean_by",
                  $event.target.multiple ? $$selectedVal : $$selectedVal[0]
                )
              }
            }
          },
          [
            _c(
              "option",
              { attrs: { value: "undefined", disabled: "", selected: "" } },
              [_vm._v("Select")]
            ),
            _vm._v(" "),
            _c("option", { attrs: { value: "birth" } }, [_vm._v("Birth")]),
            _vm._v(" "),
            _c("option", { attrs: { value: "descent" } }, [_vm._v("Descent")]),
            _vm._v(" "),
            _c("option", { attrs: { value: "spouse" } }, [_vm._v("Spouse")])
          ]
        )
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/applicant/NomineeForm.vue":
/*!***********************************************************!*\
  !*** ./resources/js/components/applicant/NomineeForm.vue ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _NomineeForm_vue_vue_type_template_id_69c1f666___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./NomineeForm.vue?vue&type=template&id=69c1f666& */ "./resources/js/components/applicant/NomineeForm.vue?vue&type=template&id=69c1f666&");
/* harmony import */ var _NomineeForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./NomineeForm.vue?vue&type=script&lang=js& */ "./resources/js/components/applicant/NomineeForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _NomineeForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _NomineeForm_vue_vue_type_template_id_69c1f666___WEBPACK_IMPORTED_MODULE_0__["render"],
  _NomineeForm_vue_vue_type_template_id_69c1f666___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/applicant/NomineeForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/applicant/NomineeForm.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/applicant/NomineeForm.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineeForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./NomineeForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/NomineeForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineeForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/applicant/NomineeForm.vue?vue&type=template&id=69c1f666&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/applicant/NomineeForm.vue?vue&type=template&id=69c1f666& ***!
  \******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineeForm_vue_vue_type_template_id_69c1f666___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./NomineeForm.vue?vue&type=template&id=69c1f666& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/NomineeForm.vue?vue&type=template&id=69c1f666&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineeForm_vue_vue_type_template_id_69c1f666___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NomineeForm_vue_vue_type_template_id_69c1f666___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);