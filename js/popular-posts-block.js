/*!
  * Understrap v1.0.0 (https://github.com/adityarahmanda/rahmanda)
  * Copyright 2013-2022 Aditya Rahmanda (https://github.com/adityarahmanda)
  * Licensed under GPL (http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)
  */
(function (factory) {
    typeof define === 'function' && define.amd ? define(factory) :
    factory();
})((function () { 'use strict';

    var registerBlockType = wp.blocks.registerBlockType;
    wp.element.createElement;
    var useBlockProps = wp.blockEditor.useBlockProps; // const { RichText } = wp.blockEditor;

    var TextControl = wp.components.TextControl; // const { serverSideRender: ServerSideRender } = wp;

    var __ = wp.i18n.__;
    registerBlockType('rahmanda/popular-posts', {
      apiVersion: 2,
      title: __('Postingan Populer', 'rahmanda'),
      description: __('Widget untuk menampilkan daftar postingan populer', 'rahmanda'),
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
      edit: function edit(props) {
        var attributes = props.attributes,
            setAttributes = props.setAttributes;

        function onChangeInput(event) {
          setAttributes({
            numOfPosts: event.target.value
          });
        }

        return /*#__PURE__*/React.createElement(TextControl, {
          label: "Jumlah Postingan",
          type: "number",
          value: attributes.numOfPosts,
          onChange: onChangeInput
        });
      },
      save: function save(props) {
        return /*#__PURE__*/React.createElement("div", useBlockProps.save(), __('Memuat Postingan Populer...', 'rahmanda'));
      }
    });

}));
//# sourceMappingURL=popular-posts-block.js.map
