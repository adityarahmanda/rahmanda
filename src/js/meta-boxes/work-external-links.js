const { useSelect, useDispatch } = wp.data;
const { registerPlugin } = wp.plugins;
const { useState, useEffect } = wp.element;

const { 
	BaseControl,
	Button,
	Panel, 
	PanelBody,
	TextControl,
	__experimentalSpacer:Spacer,
	__experimentalHeading:Heading
} = wp.components;

const { PluginDocumentSettingPanel } = wp.editPost;
const { __ } = wp.i18n;

/**
 * Sidebar metabox.
 */
const RahmandaWorkExternalLinksSettings = () => {
	const {
		meta,
		meta: { _external_links },
	} = useSelect((select) => ({
		meta: select('core/editor').getEditedPostAttribute('meta') || {},
	}));

	const { editPost } = useDispatch('core/editor');

	const [externalLinks, setExternalLinks] = useState(_external_links);
	const emptyExternalLinks = [
		{
			label: "",
			url: "",
			icon: ""
		}
	];

	const labelHeading = __('Tautan', 'rahmanda');
	const labelSeparator = ' - ';

	function onLabelChange(index, value) {
		if(index <= -1) return;

		setExternalLinks(
			externalLinks.map((externalLink, i) => {
				if (index === i) {
					return {
						...externalLink,
						label: value
					};
				}

				return externalLink;
			})
		);
	}

	function onURLChange(index, value) {
		if(index <= -1) return;

		setExternalLinks(
			externalLinks.map((externalLink, i) => {
				if (index === i) {
					return {
						...externalLink,
						url: value
					};
				}

				return externalLink;
			})
		);
	}

	function onIconChange(index, value) {
		if(index <= -1) return;

		setExternalLinks(
			externalLinks.map((externalLink, i) => {
				if (index === i) {
					return {
						...externalLink,
						icon: value
					};
				}

				return externalLink;
			})
		);
	}

	function onAddExternalLinkButtonClick() {
		setExternalLinks([ ...externalLinks, ...emptyExternalLinks ]);
	}

	function onDeleteExternalLinkButtonClick(index) {
		if(index <= -1) return;

		setExternalLinks(
			externalLinks.filter((externalLink, i) => index !== i)
		);
	}

	useEffect(() => {
		editPost({
			meta: {
				...meta,
				_external_links: externalLinks,
			},
		});
	}, [externalLinks]);

	return (
		<PluginDocumentSettingPanel name="external-links" title={__('Tautan Luar', 'rahmanda')}>
			
			{
				externalLinks.map((externalLink, index) => (  
					<Spacer marginBottom="6">

						<Heading level="3">
							{ externalLink.label === "" ? labelHeading : labelHeading + labelSeparator + externalLink.label }
						</Heading>

						<TextControl label={__('Label', 'rahmanda')} value={externalLink.label} onChange={(value) => onLabelChange(index, value)} />
						<TextControl label={__('URL', 'rahmanda')} value={externalLink.url} onChange={(value) => onURLChange(index, value)} />
						<TextControl label={__('Ikon', 'rahmanda')} value={externalLink.icon} help={__("Ikon yang digunakan merupakan ikon-ikon dari Font Awesome, format penulisan 'fa{b|r|s} fa-{nama-icon}'", 'rahmanda')} onChange={(value) => onIconChange(index, value)} />
						
						<Button isDestructive={ true } onClick={() => onDeleteExternalLinkButtonClick(index)} >{__('Hapus Tautan', 'rahmanda')}</Button>

					</Spacer>
				))
			}

			<Button variant="secondary" onClick={onAddExternalLinkButtonClick} >{__('Tambah Tautan', 'rahmanda')}</Button>

		</PluginDocumentSettingPanel>
	);
};

if (window.pagenow === 'work') {
	registerPlugin('work-external-links', {
		render: RahmandaWorkExternalLinksSettings,
		icon: null
	});
}