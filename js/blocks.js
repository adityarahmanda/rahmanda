/*!
  * Rahmanda v1.1.0 (https://github.com/adityarahmanda/rahmanda)
  * Copyright 2022 Aditya Rahmanda (https://github.com/adityarahmanda)
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

  var registerBlockType$2 = wp.blocks.registerBlockType;
  var _wp$blockEditor$1 = wp.blockEditor,
      useBlockProps$2 = _wp$blockEditor$1.useBlockProps,
      BlockControls = _wp$blockEditor$1.BlockControls,
      BlockAlignmentToolbar = _wp$blockEditor$1.BlockAlignmentToolbar,
      InspectorControls$1 = _wp$blockEditor$1.InspectorControls;
  var _wp$components$1 = wp.components,
      PanelBody$1 = _wp$components$1.PanelBody,
      ToggleControl = _wp$components$1.ToggleControl,
      RangeControl$1 = _wp$components$1.RangeControl,
      ColorPalette = _wp$components$1.ColorPalette;
  var __$2 = wp.i18n.__;

  var ApplauseIcon = function ApplauseIcon(_ref) {
    var style = _ref.style;
    return /*#__PURE__*/React.createElement("svg", {
      xmlns: "http://www.w3.org/2000/svg",
      viewBox: "0 0 60 60",
      style: style
    }, /*#__PURE__*/React.createElement("g", {
      class: "outline"
    }, /*#__PURE__*/React.createElement("path", {
      d: "M57.1428763 6.63333333C57.6856856 6.24686869 57.8143144 5.49030303 57.4302341 4.94383838 57.0461538 4.39737374 56.2950502 4.26767677 55.7520401 4.65454545L52.7452174 6.79636364C52.202408 7.18282828 52.0737793 7.93939394 52.4578595 8.48585859 52.6924415 8.81959596 53.0642809 8.9979798 53.4415385 8.9979798 53.6819398 8.9979798 53.9247492 8.92565657 54.1360535 8.77494949L57.1428763 6.63333333zM49.1767224 5.93676768C49.3161873 5.98969697 49.4594649 6.01474747 49.6001338 6.01474747 50.0873579 6.01474747 50.5458863 5.71494949 50.727291 5.22868687L52.023612 1.75757576C52.257592 1.13111111 51.9427425.432121212 51.3202676.196565657 50.6979933-.0391919192 50.0034783.278181818 49.7694983.904646465L48.4731773 4.37575758C48.239398 5.00222222 48.5542475 5.70121212 49.1767224 5.93676768zM58.6400669 11.2345455C58.6318395 11.2345455 58.623612 11.2345455 58.6151839 11.2345455L54.932709 11.2656566C54.267893 11.2791919 53.7399331 11.7919192 53.7533779 12.4612121 53.7666221 13.1220202 54.30301 13.6587879 54.9567893 13.6587879 54.9650167 13.6587879 54.9732441 13.6587879 54.9816722 13.6587879L58.6641472 13.5955556C59.3289632 13.5818182 59.8569231 13.0436364 59.8434783 12.3743434 59.8302341 11.7135354 59.2938462 11.2345455 58.6400669 11.2345455zM51.2107023 29.7280808C50.5940468 29.2365657 49.8640134 28.9020202 49.0922408 28.7448485 49.1432107 28.6519192 49.1907692 28.5573737 49.2357191 28.4614141L49.7189298 27.9749495C51.5799331 26.1012121 51.7753846 23.1519192 50.1732441 21.1141414 49.4169231 20.1523232 48.3670234 19.5131313 47.2009365 19.2745455 47.284214 19.120202 47.3580602 18.9624242 47.4250836 18.8022222 48.6925084 16.9539394 48.6718395 14.469899 47.2681605 12.6844444 46.5116388 11.7220202 45.4613378 11.0808081 44.2946488 10.8426263 45.2578595 9.05959596 45.1348495 6.83737374 43.8481605 5.20121212 42.8753177 3.96383838 41.4182609 3.25393939 39.8502341 3.25393939 38.5946488 3.25393939 37.4101003 3.70565657 36.480602 4.53272727 36.3399331 3.72888889 36.0064214 2.95252525 35.4748495 2.27636364 34.501806 1.0389899 33.0447492.329292929 31.4767224.329090909 30.1141806.329090909 28.8351171.861414141 27.8753177 1.82767677L15.6666221 14.1185859 15.6200669 12.4781818C15.5985953 9.68424242 13.3340468 7.41777778 10.5537793 7.41777778 7.8238796 7.41777778 5.59143813 9.60262626 5.49110368 12.3264646L3.05377926 30.1660606 1.05050167 32.510303C-.150100334 33.9157576.751318148 36.4103164 1.05050167 37.002855 1.3496852 37.5953936 1.66593319 37.9666982 2.51271962 38.8651283 2.8050341 39.1752704 3.3712736 39.6680391 4.21143813 40.3434343 3.2935786 41.7335354 4.72327715 47.298456 9.51045561 52.4226263 15.4436869 58.7735254 20.1888963 59.9262626 21.1316388 59.9262626 21.9056187 59.9262626 22.6703679 59.6646465 23.2846154 59.189899L26.2031438 56.9337374C29.0107023 56.2660606 32.1060201 54.7492929 35.4086288 52.4226263 38.2924415 50.3907071 41.4210702 47.6832323 44.7070234 44.3749495L51.656388 37.3787879C52.681204 36.3470707 53.220602 34.9165657 53.1363211 33.4541414 53.0520401 31.9941414 52.350301 30.6361616 51.2107023 29.7280808zM37.9513043 6.46646465C38.4736455 5.94080808 39.1617391 5.6779798 39.8500334 5.6779798 40.6356522 5.6779798 41.4214716 6.02040404 41.9600669 6.70545455 42.8141137 7.79171717 42.6644147 9.36808081 41.6913712 10.3474747L40.4518395 11.5951515C40.2608027 11.7234343 40.0747826 11.8606061 39.900602 12.0159596 39.7599331 11.2119192 39.4262207 10.4355556 38.8946488 9.75959596 38.2410702 8.92848485 37.3687625 8.33676768 36.3913043 8.0369697L37.9513043 6.46646465zM29.5779933 3.54181818C30.1001338 3.01616162 30.7884281 2.75333333 31.4767224 2.75333333 32.2625418 2.75353535 33.0481605 3.0959596 33.5867559 3.7810101 34.4408027 4.86727273 34.2911037 6.44343434 33.3180602 7.42282828L19.0868227 21.6018182 19.0400669 19.9616162C19.0278261 18.3808081 18.297592 16.9692929 17.1626087 16.0414141L29.5779933 3.54181818zM2.60416353 35.7559886C2.47532701 35.335629 2.49130435 34.5416162 2.87618729 34.0911111L5.34060201 31.2068687C5.34140468 31.2059259 6.19304348 24.9763636 7.89551839 12.5181818 7.89551839 11.0462626 9.09170569 9.8420202 10.5537793 9.8420202 12.0158528 9.8420202 13.2122408 11.0462626 13.2122408 12.5181818L13.2814716 14.9494949C10.8758528 15.2820202 9.00280936 17.319798 8.91090301 19.8094949L6.47377926 37.6492929 5.76481605 38.4791919C4.9435476 38.1761817 4.2983601 37.8410335 3.82925357 37.4737474 3.12559377 36.9228183 2.73300005 36.1763482 2.60416353 35.7559886zM49.9535117 35.6644444L43.0043478 42.6606061C37.0691639 48.6357576 30.8650836 53.4319192 25.4151171 54.6276768 25.2495652 54.6642424 25.0938462 54.7343434 24.959398 54.8383838L21.8179264 57.2670707C21.6144482 57.4244444 21.4950582 57.6308449 20.8525759 57.6308449 20.2100936 57.6308449 14.5822005 53.9693849 12.0142129 51.5085254 9.70072096 49.2915447 5.64850979 42.4897722 6.29638796 41.5743434L8.76060201 38.690303C8.76153846 38.6892256 9.61317726 32.4596633 11.3155184 20.0016162 11.3155184 18.529697 12.5119064 17.3252525 13.9739799 17.3252525 15.4360535 17.3252525 16.6322408 18.529697 16.6322408 20.0016162L16.7578595 24.4105051C16.7787291 25.1430303 17.3773244 25.62 18.0002007 25.62 18.3040134 25.62 18.6138462 25.5062626 18.8648829 25.2537374L32.998194 11.0252525C33.5205351 10.4993939 34.2084281 10.2367677 34.8969231 10.2367677 35.6825418 10.2367677 36.4683612 10.5791919 37.0069565 11.2642424 37.8610033 12.3505051 37.7111037 13.9268687 36.7380602 14.9062626L27.0020067 24.7078788C26.4965217 25.2169697 26.4965217 26.0418182 27.0020067 26.5505051 27.2578595 26.8080808 27.5931773 26.9369697 27.928495 26.9369697 28.2638127 26.9369697 28.5993311 26.8080808 28.8549833 26.5505051L41.371505 13.949899C41.8936455 13.4240404 42.5817391 13.1614141 43.2702341 13.1614141 44.0558528 13.1616162 44.8416722 13.5040404 45.3802676 14.1890909 46.2343144 15.2751515 46.0844147 16.8515152 45.1113712 17.8309091L32.6536455 30.3725253C32.1413378 30.8884848 32.1413378 31.7244444 32.6536455 32.240404 32.906087 32.4945455 33.2367893 32.6216162 33.567893 32.6216162 33.8985953 32.6216162 34.2294983 32.4945455 34.4819398 32.240404L44.2767893 22.379798C44.7991304 21.8539394 45.4872241 21.5913131 46.1755184 21.5913131 46.9611371 21.5913131 47.7469565 21.9337374 48.2855518 22.6189899 49.1395987 23.7050505 48.989699 25.2814141 48.0166555 26.2608081L38.3145151 36.0284848C37.7903679 36.5559596 37.7903679 37.4117172 38.3145151 37.9391919 38.5723746 38.1989899 38.8898328 38.3208081 39.2070903 38.3208081 39.5245485 38.3208081 39.8420067 38.1989899 40.0840134 37.9551515L46.0988629 31.899798C46.6408696 31.3541414 47.3664883 31.0656566 48.089699 31.0656566 48.6650167 31.0656566 49.2387291 31.2482828 49.7165217 31.6290909 50.9927759 32.6460606 51.0718395 34.5387879 49.9535117 35.6644444z"
    })));
  };

  registerBlockType$2('rahmanda/applause-button', {
    apiVersion: 2,
    title: __$2('Tombol Tepuk Tangan', 'rahmanda'),
    description: __$2('Widget untuk menampilkan tombol tepuk tangan', 'rahmanda'),
    icon: ApplauseIcon,
    category: 'theme',
    attributes: {
      align: {
        type: 'string',
        default: 'center'
      },
      size: {
        type: 'int',
        default: 36
      },
      color: {
        type: 'string',
        default: '#929EC9'
      },
      multiclap: {
        type: 'boolean',
        default: true
      }
    },
    // custom functions
    edit: function edit(_ref2) {
      var attributes = _ref2.attributes,
          setAttributes = _ref2.setAttributes;
      var alignmentClass = attributes.align != null ? 'has-text-align-' + attributes.align : '';
      var sizeStyle = {
        width: attributes.size + 'px',
        height: attributes.size + 'px'
      };
      var colorStyle = {
        fill: attributes.color,
        stroke: attributes.color,
        color: attributes.color
      };
      return /*#__PURE__*/React.createElement("div", useBlockProps$2({
        className: alignmentClass
      }), /*#__PURE__*/React.createElement(InspectorControls$1, {
        key: "setting"
      }, /*#__PURE__*/React.createElement(PanelBody$1, {
        title: __$2('Ukuran Tombol', 'rahmanda'),
        initialOpen: true
      }, /*#__PURE__*/React.createElement(RangeControl$1, {
        value: attributes.size,
        onChange: function onChange(val) {
          return setAttributes({
            size: val
          });
        },
        min: 16,
        max: 256,
        initialPosition: attributes.size,
        renderTooltipContent: function renderTooltipContent(value) {
          return "".concat(value, "px");
        },
        help: __$2('Ukuran default: 58px', 'rahmanda')
      })), /*#__PURE__*/React.createElement(PanelBody$1, {
        title: __$2('Warna Tombol', 'rahmanda'),
        initialOpen: true
      }, /*#__PURE__*/React.createElement(ColorPalette, {
        value: attributes.color,
        onChange: function onChange(val) {
          return setAttributes({
            color: val === undefined ? '#929EC9' : val
          });
        }
      })), /*#__PURE__*/React.createElement(PanelBody$1, {
        title: __$2('Multiclap', 'rahmanda'),
        initialOpen: true
      }, /*#__PURE__*/React.createElement(ToggleControl, {
        label: __$2('Aktifkan Multiclap', 'rahmanda'),
        help: __$2('Dengan mengaktifkan Multiclap, pengunjung dapat memberikan tepuk tangan lebih dari satu kali', 'rahmanda'),
        checked: attributes.multiclap,
        onChange: function onChange() {
          return setAttributes({
            multiclap: !attributes.multiclap
          });
        }
      }))), /*#__PURE__*/React.createElement(BlockControls, null, /*#__PURE__*/React.createElement(BlockAlignmentToolbar, {
        value: attributes.align,
        onChange: function onChange(val) {
          return setAttributes({
            align: val === undefined ? 'none' : val
          });
        }
      })), /*#__PURE__*/React.createElement(ApplauseIcon, {
        style: _objectSpread2(_objectSpread2({}, sizeStyle), colorStyle)
      }));
    },
    save: function save() {
      return null;
    }
  });

  var registerBlockType$1 = wp.blocks.registerBlockType;
  var _wp$blockEditor = wp.blockEditor,
      useBlockProps$1 = _wp$blockEditor.useBlockProps,
      InspectorControls = _wp$blockEditor.InspectorControls;
  var _wp$components = wp.components,
      PanelBody = _wp$components.PanelBody,
      RangeControl = _wp$components.RangeControl;
  var _wp = wp,
      ServerSideRender = _wp.serverSideRender;
  var __$1 = wp.i18n.__;
  registerBlockType$1('rahmanda/popular-posts', {
    apiVersion: 2,
    title: __$1('Postingan Populer', 'rahmanda'),
    description: __$1('Widget untuk menampilkan daftar postingan populer', 'rahmanda'),
    icon: 'feedback',
    category: 'widgets',
    // custom attributes
    attributes: {
      numOfPosts: {
        type: 'int',
        default: 4
      }
    },
    // custom functions
    edit: function edit(_ref) {
      var attributes = _ref.attributes,
          setAttributes = _ref.setAttributes;
      return /*#__PURE__*/React.createElement("div", useBlockProps$1(), /*#__PURE__*/React.createElement(InspectorControls, null, /*#__PURE__*/React.createElement(PanelBody, {
        title: __$1('Jumlah Postingan', 'rahmanda'),
        initialOpen: true
      }, /*#__PURE__*/React.createElement(RangeControl, {
        value: attributes.numOfPosts,
        initialPosition: attributes.numOfPosts,
        onChange: function onChange(val) {
          return setAttributes({
            numOfPosts: val
          });
        },
        min: 2,
        max: 8
      }))), /*#__PURE__*/React.createElement(ServerSideRender, {
        block: "rahmanda/popular-posts",
        attributes: {
          numOfPosts: attributes.numOfPosts
        }
      }));
    },
    save: function save() {
      return null;
    }
  });

  var registerBlockType = wp.blocks.registerBlockType;
  var useBlockProps = wp.blockEditor.useBlockProps;
  var Dashicon = wp.components.Dashicon;
  var __ = wp.i18n.__;
  registerBlockType('rahmanda/ellipsis-separator', {
    apiVersion: 2,
    title: __('Pemisah Ellipsis', 'rahmanda'),
    description: __('Widget untuk menambahkan pemisah berbentuk ellipsis', 'rahmanda'),
    icon: 'ellipsis',
    category: 'theme',
    // custom functions
    edit: function edit() {
      return /*#__PURE__*/React.createElement("div", useBlockProps({
        className: 'has-text-align-center'
      }), /*#__PURE__*/React.createElement(Dashicon, {
        icon: "ellipsis"
      }));
    },
    save: function save() {
      return /*#__PURE__*/React.createElement("div", useBlockProps.save({
        className: 'ellipsis-separator'
      }), /*#__PURE__*/React.createElement("span", {
        className: "ellipsis-dot"
      }), /*#__PURE__*/React.createElement("span", {
        className: "ellipsis-dot"
      }), /*#__PURE__*/React.createElement("span", {
        className: "ellipsis-dot"
      }));
    }
  });

}));
//# sourceMappingURL=blocks.js.map
