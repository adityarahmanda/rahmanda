const { registerBlockType } = wp.blocks;
const { useBlockProps } = wp.blockEditor;
const { Dashicon } = wp.components;
const { __ } = wp.i18n;

registerBlockType('rahmanda/ellipsis-separator', {
    apiVersion: 2,
    title: __('Pemisah Ellipsis', 'rahmanda'),
    description: __('Widget untuk menambahkan pemisah berbentuk ellipsis', 'rahmanda'),
    icon: 'ellipsis',
    category: 'theme',

    // custom functions
    edit: () => {
        return (
            <div { ...useBlockProps( { className: 'has-text-align-center' }) } >
                <Dashicon icon="ellipsis" />
            </div>
        )
    },

    save: () => { return (
        <div { ...useBlockProps.save( { className: 'ellipsis-separator' }) } >
            <span className="ellipsis-dot"></span>
            <span className="ellipsis-dot"></span>
            <span className="ellipsis-dot"></span>
        </div>
    ) }
});