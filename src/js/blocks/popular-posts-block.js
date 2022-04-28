const { registerBlockType } = wp.blocks;
const { useBlockProps, InspectorControls } = wp.blockEditor;
const { PanelBody, RangeControl } = wp.components;
const { serverSideRender: ServerSideRender } = wp;
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
    edit: ( { attributes, setAttributes } ) => { 
        return (   
            <div {...useBlockProps()}>
                <InspectorControls>
                    <PanelBody title={ __( 'Jumlah Postingan', 'rahmanda' ) } initialOpen={ true }>
                        <RangeControl 
                            value={ attributes.numOfPosts } 
                            initialPosition={ attributes.numOfPosts }
                            onChange ={ val => setAttributes( { numOfPosts: val } ) }
                            min={ 2 }
                            max={ 8 }
                        />
                    </PanelBody>
                </InspectorControls>

                <ServerSideRender 
                    block="rahmanda/popular-posts"
                    attributes={ {
                        numOfPosts: attributes.numOfPosts
                    } } 
                />
            </div>
			
        )
	},

    save: () => { return null }
});