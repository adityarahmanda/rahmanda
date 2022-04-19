const { registerBlockType } = wp.blocks;
const { createElement } = wp.element;
const { useBlockProps } = wp.blockEditor;

// const { RichText } = wp.blockEditor;

const { TextControl } = wp.components;

// const { serverSideRender: ServerSideRender } = wp;

const { __ } = wp.i18n

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
            default: 4, 
        }
    },

    // custom functions
    edit: (props) => { 
        const { attributes, setAttributes } = props;

        function onChangeInput(event) {
            setAttributes({ numOfPosts: event.target.value });
        }

        return (   
			<TextControl 
                label="Jumlah Postingan"
                type="number" 
                value={ attributes.numOfPosts } 
                onChange={ onChangeInput } 
            />
        )
	},

    save: (props) => { 
		return (
            <div {...useBlockProps.save()}>
               { __('Memuat Postingan Populer...', 'rahmanda') }
            </div>
        )
    }
});