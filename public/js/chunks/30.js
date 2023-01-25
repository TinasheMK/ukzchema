(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[30],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/NextofKin.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/applicant/NextofKin.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuelidate/lib/validators */ "./node_modules/vuelidate/lib/validators/index.js");
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var libphonenumber_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! libphonenumber-js */ "./node_modules/libphonenumber-js/index.js");


/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Datepicker: function Datepicker() {
      return __webpack_require__.e(/*! import() */ 0).then(__webpack_require__.bind(null, /*! vuejs-datepicker */ "./node_modules/vuejs-datepicker/dist/vuejs-datepicker.esm.js"));
    }
  },
  data: function data() {
    return {
      submitted: false,
      date_invalid: false,
      phone_error: false,
      nok_phone: "",
      form: {}
    };
  },
  validations: {
    form: {
      nok_full_name: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      },
      nok_email: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"],
        email: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["email"]
      },
      nok_phone: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      },
      nok_street: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      },
      nok_city: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      },
      nok_country: {
        required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
      }
    }
  },
  methods: {
    handelNOK: function handelNOK() {
      this.submitted = true;
      this.$v.$touch();
      if (this.$v.$invalid || this.date_invalid) {
        if (!this.validPhone(this.form.nok_phone)) this.phone_error = true;
        if (!this.form.nok_dob) this.date_invalid = true;
        this.scrollErrorToView();
        return;
      }
      if (!this.validPhone(this.form.nok_phone)) {
        this.phone_error = true;
        this.scrollErrorToView();
        return;
      }
      if (!this.form.nok_dob || this.date_invalid) {
        this.date_invalid = true;
        this.scrollErrorToView();
        return;
      }
      this.$emit("done", this.form);
    },
    checkDateValidity: function checkDateValidity(d) {
      var sixteenYearsAgo = moment().subtract(16, "years");
      var selectedDate = moment(d);
      if (selectedDate.isAfter(sixteenYearsAgo)) {
        this.date_invalid = true;
      } else {
        this.date_invalid = false;
      }
    },
    validPhone: function validPhone(phone) {
      if (!phone) return false;
      var phoneNumber = Object(libphonenumber_js__WEBPACK_IMPORTED_MODULE_1__["parsePhoneNumberFromString"])(phone);
      if (!phoneNumber) return false;
      return phoneNumber && phoneNumber.isValid();
    },
    scrollErrorToView: function scrollErrorToView() {
      setTimeout(function () {
        var elem = $(".is-invalid").first();
        $(elem).focus();
      }, 100);
    }
  },
  watch: {
    nok_phone: function nok_phone(p) {
      var _this = this;
      this.form.nok_phone = p;
      if (this.phone_locked) return;
      this.phone_locked = true;
      setTimeout(function () {
        return _this.phone_locked = false;
      }, 10);
      this.nok_phone = new libphonenumber_js__WEBPACK_IMPORTED_MODULE_1__["AsYouType"]().input(p);
      if (this.validPhone(p)) {
        this.phone_error = false;
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/NextofKin.vue?vue&type=template&id=1b665604&":
/*!****************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/applicant/NextofKin.vue?vue&type=template&id=1b665604& ***!
  \****************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function render() {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", [_c("h6", [_vm._v("Enter Full name as it appears on their national ID")]), _vm._v(" "), _c("form", {
    on: {
      submit: function submit($event) {
        $event.preventDefault();
        return _vm.handelNOK();
      }
    }
  }, [_c("div", {
    staticClass: "row"
  }, [_vm._m(0), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-6"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.nok_full_name,
      expression: "form.nok_full_name"
    }],
    staticClass: "form-control mb-30 bg-gray",
    "class": {
      "is-invalid": _vm.submitted && _vm.$v.form.nok_full_name.$error
    },
    attrs: {
      type: "text",
      name: "nok_full_name",
      id: "nok_full_name",
      placeholder: "Full Name"
    },
    domProps: {
      value: _vm.form.nok_full_name
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_vm.form, "nok_full_name", $event.target.value);
      }
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-6"
  }, [_c("datepicker", {
    attrs: {
      format: "dd MMMM yyyy",
      initialView: "year",
      name: "nok_dob",
      placeholder: "Date of Birth",
      "input-class": _vm.date_invalid ? "form-control is-invalid" : "mb-30 form-control"
    },
    on: {
      selected: function selected($event) {
        return _vm.checkDateValidity($event);
      }
    },
    model: {
      value: _vm.form.nok_dob,
      callback: function callback($$v) {
        _vm.$set(_vm.form, "nok_dob", $$v);
      },
      expression: "form.nok_dob"
    }
  }), _vm._v(" "), _vm.date_invalid && !_vm.form.nok_dob ? _c("div", {
    staticClass: "mb-30"
  }) : _vm._e(), _vm._v(" "), _vm.date_invalid && _vm.form.nok_dob ? _c("div", {
    staticClass: "mb-30 mt-2 invalid-feedback d-block"
  }, [_vm._v("Next of kin must be 16 years or older")]) : _vm._e()], 1)]), _vm._v(" "), _c("div", {
    staticClass: "row"
  }, [_vm._m(1), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-6"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.nok_email,
      expression: "form.nok_email"
    }],
    staticClass: "form-control mb-30 bg-gray",
    "class": {
      "is-invalid": _vm.submitted && _vm.$v.form.nok_email.$error
    },
    attrs: {
      id: "nok_email",
      type: "email",
      placeholder: "Email Address"
    },
    domProps: {
      value: _vm.form.nok_email
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_vm.form, "nok_email", $event.target.value);
      }
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-6"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.nok_phone,
      expression: "nok_phone"
    }],
    staticClass: "form-control bg-gray",
    "class": {
      "is-invalid": _vm.submitted && _vm.phone_error
    },
    attrs: {
      type: "tel",
      name: "nok_phone",
      placeholder: "Mobile Number"
    },
    domProps: {
      value: _vm.nok_phone
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.nok_phone = $event.target.value;
      }
    }
  }), _vm._v(" "), _vm._m(2)])]), _vm._v(" "), _c("div", {
    staticClass: "row"
  }, [_vm._m(3), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-6"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.nok_street,
      expression: "form.nok_street"
    }],
    staticClass: "form-control mb-30 bg-gray",
    "class": {
      "is-invalid": _vm.submitted && _vm.$v.form.nok_street.$error
    },
    attrs: {
      type: "text",
      id: "nok_street",
      name: "nok_street",
      placeholder: "Address Line 1"
    },
    domProps: {
      value: _vm.form.nok_street
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_vm.form, "nok_street", $event.target.value);
      }
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-6"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.nok_apartment,
      expression: "form.nok_apartment"
    }],
    staticClass: "form-control mb-30 bg-gray",
    attrs: {
      type: "text",
      id: "nok_apartment",
      name: "nok_apartment",
      placeholder: "Address Line 2"
    },
    domProps: {
      value: _vm.form.nok_apartment
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_vm.form, "nok_apartment", $event.target.value);
      }
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-4"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.nok_city,
      expression: "form.nok_city"
    }],
    staticClass: "form-control mb-30 bg-gray",
    "class": {
      "is-invalid": _vm.submitted && _vm.$v.form.nok_city.$error
    },
    attrs: {
      type: "text",
      name: "nok_city",
      placeholder: "City"
    },
    domProps: {
      value: _vm.form.nok_city
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_vm.form, "nok_city", $event.target.value);
      }
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-4"
  }, [_c("country-select", {
    staticClass: "custom-select form-control mb-30 bg-gray",
    "class": {
      "is-invalid": _vm.submitted && _vm.$v.form.nok_country.$error
    },
    attrs: {
      country: _vm.form.nok_country,
      countryName: true,
      topCountry: "ZW"
    },
    model: {
      value: _vm.form.nok_country,
      callback: function callback($$v) {
        _vm.$set(_vm.form, "nok_country", $$v);
      },
      expression: "form.nok_country"
    }
  })], 1), _vm._v(" "), _c("div", {
    staticClass: "col-12 col-lg-4"
  }, [_c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.form.nok_zip,
      expression: "form.nok_zip"
    }],
    staticClass: "form-control mb-30 bg-gray",
    attrs: {
      type: "text",
      name: "zip",
      placeholder: "ZIP/Postal code"
    },
    domProps: {
      value: _vm.form.nok_zip
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;
        _vm.$set(_vm.form, "nok_zip", $event.target.value);
      }
    }
  })])]), _vm._v(" "), _vm._m(4)])]);
};
var staticRenderFns = [function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "col-12"
  }, [_c("label", {
    staticClass: "font-weight-bold",
    attrs: {
      "for": "nok_full_name"
    }
  }, [_vm._v("Next of kin's Full name:")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "col-12"
  }, [_c("label", {
    staticClass: "font-weight-bold",
    attrs: {
      "for": "nok_full_name"
    }
  }, [_vm._v("Next of kin's Contact details:")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "mb-30 mt-1"
  }, [_vm._v("\n          With country code\n          "), _c("small", [_vm._v("e.g +44")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "col-12"
  }, [_c("label", {
    staticClass: "font-weight-bold",
    attrs: {
      "for": "street"
    }
  }, [_vm._v("Next of kin's Physical Address:")])]);
}, function () {
  var _vm = this,
    _c = _vm._self._c;
  return _c("div", {
    staticClass: "row"
  }, [_c("div", {
    staticClass: "col-12 text-right"
  }, [_c("button", {
    staticClass: "btn radix-btn",
    attrs: {
      type: "submit"
    }
  }, [_vm._v("Next Step")])])]);
}];
render._withStripped = true;


/***/ }),

/***/ "./resources/js/components/applicant/NextofKin.vue":
/*!*********************************************************!*\
  !*** ./resources/js/components/applicant/NextofKin.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _NextofKin_vue_vue_type_template_id_1b665604___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./NextofKin.vue?vue&type=template&id=1b665604& */ "./resources/js/components/applicant/NextofKin.vue?vue&type=template&id=1b665604&");
/* harmony import */ var _NextofKin_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./NextofKin.vue?vue&type=script&lang=js& */ "./resources/js/components/applicant/NextofKin.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _NextofKin_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _NextofKin_vue_vue_type_template_id_1b665604___WEBPACK_IMPORTED_MODULE_0__["render"],
  _NextofKin_vue_vue_type_template_id_1b665604___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/applicant/NextofKin.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/applicant/NextofKin.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/applicant/NextofKin.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NextofKin_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./NextofKin.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/NextofKin.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NextofKin_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/applicant/NextofKin.vue?vue&type=template&id=1b665604&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/applicant/NextofKin.vue?vue&type=template&id=1b665604& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_NextofKin_vue_vue_type_template_id_1b665604___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ref--6!../../../../node_modules/vue-loader/lib??vue-loader-options!./NextofKin.vue?vue&type=template&id=1b665604& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/applicant/NextofKin.vue?vue&type=template&id=1b665604&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_NextofKin_vue_vue_type_template_id_1b665604___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ref_6_node_modules_vue_loader_lib_index_js_vue_loader_options_NextofKin_vue_vue_type_template_id_1b665604___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);