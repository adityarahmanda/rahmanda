/*!
  * Understrap v1.0.0 (https://github.com/adityarahmanda/rahmanda)
  * Copyright 2013-2022 Aditya Rahmanda (https://github.com/adityarahmanda)
  * Licensed under GPL (http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)
  */
(function (factory) {
  typeof define === 'function' && define.amd ? define(factory) :
  factory();
})((function () { 'use strict';

  function ownKeys(object, enumerableOnly) {
    var keys = Object.keys(object);

    if (Object.getOwnPropertySymbols) {
      var symbols = Object.getOwnPropertySymbols(object);

      if (enumerableOnly) {
        symbols = symbols.filter(function (sym) {
          return Object.getOwnPropertyDescriptor(object, sym).enumerable;
        });
      }

      keys.push.apply(keys, symbols);
    }

    return keys;
  }

  function _objectSpread2(target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i] != null ? arguments[i] : {};

      if (i % 2) {
        ownKeys(Object(source), true).forEach(function (key) {
          _defineProperty(target, key, source[key]);
        });
      } else if (Object.getOwnPropertyDescriptors) {
        Object.defineProperties(target, Object.getOwnPropertyDescriptors(source));
      } else {
        ownKeys(Object(source)).forEach(function (key) {
          Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));
        });
      }
    }

    return target;
  }

  function _defineProperty(obj, key, value) {
    if (key in obj) {
      Object.defineProperty(obj, key, {
        value: value,
        enumerable: true,
        configurable: true,
        writable: true
      });
    } else {
      obj[key] = value;
    }

    return obj;
  }

  function _slicedToArray(arr, i) {
    return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest();
  }

  function _toConsumableArray(arr) {
    return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread();
  }

  function _arrayWithoutHoles(arr) {
    if (Array.isArray(arr)) return _arrayLikeToArray(arr);
  }

  function _arrayWithHoles(arr) {
    if (Array.isArray(arr)) return arr;
  }

  function _iterableToArray(iter) {
    if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
  }

  function _iterableToArrayLimit(arr, i) {
    var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"];

    if (_i == null) return;
    var _arr = [];
    var _n = true;
    var _d = false;

    var _s, _e;

    try {
      for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) {
        _arr.push(_s.value);

        if (i && _arr.length === i) break;
      }
    } catch (err) {
      _d = true;
      _e = err;
    } finally {
      try {
        if (!_n && _i["return"] != null) _i["return"]();
      } finally {
        if (_d) throw _e;
      }
    }

    return _arr;
  }

  function _unsupportedIterableToArray(o, minLen) {
    if (!o) return;
    if (typeof o === "string") return _arrayLikeToArray(o, minLen);
    var n = Object.prototype.toString.call(o).slice(8, -1);
    if (n === "Object" && o.constructor) n = o.constructor.name;
    if (n === "Map" || n === "Set") return Array.from(o);
    if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);
  }

  function _arrayLikeToArray(arr, len) {
    if (len == null || len > arr.length) len = arr.length;

    for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i];

    return arr2;
  }

  function _nonIterableSpread() {
    throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
  }

  function _nonIterableRest() {
    throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
  }

  var _wp$data = wp.data,
      useSelect = _wp$data.useSelect,
      useDispatch = _wp$data.useDispatch;
  var registerPlugin = wp.plugins.registerPlugin;
  var _wp$element = wp.element,
      useState = _wp$element.useState,
      useEffect = _wp$element.useEffect;
  var _wp$components = wp.components;
      _wp$components.BaseControl;
      var Button = _wp$components.Button;
      _wp$components.Panel;
      _wp$components.PanelBody;
      var TextControl = _wp$components.TextControl,
      Spacer = _wp$components.__experimentalSpacer,
      Heading = _wp$components.__experimentalHeading;
  var PluginDocumentSettingPanel = wp.editPost.PluginDocumentSettingPanel;
  var __ = wp.i18n.__;
  /**
   * Sidebar metabox.
   */

  var UnderstrapWorkExternalLinksSettings = function UnderstrapWorkExternalLinksSettings() {
    var _useSelect = useSelect(function (select) {
      return {
        meta: select('core/editor').getEditedPostAttribute('meta') || {}
      };
    }),
        meta = _useSelect.meta,
        _external_links = _useSelect.meta._external_links;

    var _useDispatch = useDispatch('core/editor'),
        editPost = _useDispatch.editPost;

    var _useState = useState(_external_links),
        _useState2 = _slicedToArray(_useState, 2),
        externalLinks = _useState2[0],
        setExternalLinks = _useState2[1];

    var emptyExternalLinks = [{
      label: "",
      url: "",
      icon: ""
    }];

    var labelHeading = __('Tautan', 'understrap');

    var labelSeparator = ' - ';

    function onLabelChange(index, value) {
      if (index <= -1) return;
      setExternalLinks(externalLinks.map(function (externalLink, i) {
        if (index === i) {
          return _objectSpread2(_objectSpread2({}, externalLink), {}, {
            label: value
          });
        }

        return externalLink;
      }));
    }

    function onURLChange(index, value) {
      if (index <= -1) return;
      setExternalLinks(externalLinks.map(function (externalLink, i) {
        if (index === i) {
          return _objectSpread2(_objectSpread2({}, externalLink), {}, {
            url: value
          });
        }

        return externalLink;
      }));
    }

    function onIconChange(index, value) {
      if (index <= -1) return;
      setExternalLinks(externalLinks.map(function (externalLink, i) {
        if (index === i) {
          return _objectSpread2(_objectSpread2({}, externalLink), {}, {
            icon: value
          });
        }

        return externalLink;
      }));
    }

    function onAddExternalLinkButtonClick() {
      setExternalLinks([].concat(_toConsumableArray(externalLinks), emptyExternalLinks));
    }

    function onDeleteExternalLinkButtonClick(index) {
      if (index <= -1) return;
      setExternalLinks(externalLinks.filter(function (externalLink, i) {
        return index !== i;
      }));
    }

    useEffect(function () {
      editPost({
        meta: _objectSpread2(_objectSpread2({}, meta), {}, {
          _external_links: externalLinks
        })
      });
    }, [externalLinks]);
    return /*#__PURE__*/React.createElement(PluginDocumentSettingPanel, {
      name: "external-links",
      title: __('Tautan Luar', 'understrap')
    }, externalLinks.map(function (externalLink, index) {
      return /*#__PURE__*/React.createElement(Spacer, {
        marginBottom: "6"
      }, /*#__PURE__*/React.createElement(Heading, {
        level: "3"
      }, externalLink.label === "" ? labelHeading : labelHeading + labelSeparator + externalLink.label), /*#__PURE__*/React.createElement(TextControl, {
        label: __('Label', 'understrap'),
        value: externalLink.label,
        onChange: function onChange(value) {
          return onLabelChange(index, value);
        }
      }), /*#__PURE__*/React.createElement(TextControl, {
        label: __('URL', 'understrap'),
        value: externalLink.url,
        onChange: function onChange(value) {
          return onURLChange(index, value);
        }
      }), /*#__PURE__*/React.createElement(TextControl, {
        label: __('Ikon', 'understrap'),
        value: externalLink.icon,
        help: __("Ikon yang digunakan merupakan ikon-ikon dari Font Awesome, format penulisan 'fa-{nama-icon}'", 'understrap'),
        onChange: function onChange(value) {
          return onIconChange(index, value);
        }
      }), /*#__PURE__*/React.createElement(Button, {
        isDestructive: true,
        onClick: function onClick() {
          return onDeleteExternalLinkButtonClick(index);
        }
      }, __('Hapus Tautan', 'understrap')));
    }), /*#__PURE__*/React.createElement(Button, {
      variant: "secondary",
      onClick: onAddExternalLinkButtonClick
    }, __('Tambah Tautan', 'understrap')));
  };

  if (window.pagenow === 'work') {
    registerPlugin('work-external-links', {
      render: UnderstrapWorkExternalLinksSettings,
      icon: null
    });
  }

}));
//# sourceMappingURL=work-external-links.js.map
