const { registerBlockType } = wp.blocks;
const { createElement } = wp.element;
const { useBlockProps } = wp.blockEditor;

// const { RichText } = wp.blockEditor;

const { TextControl } = wp.components;

// const { serverSideRender: ServerSideRender } = wp;

const { __ } = wp.i18n

registerBlockType('understrap/popular-posts', {
    title: __('Popular Posts', 'understrap'),
    description: __('A widget to show the most popular post on the site', 'understrap'),
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
                label="Number of Posts"
                type="number" 
                value={ attributes.numOfPosts } 
                onChange={ onChangeInput } />
        )
	},

    save: (props) => { 
		return (
            <div {...useBlockProps.save()}>
                Popular Post Block Content
            </div>
        )
    }
});