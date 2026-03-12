import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls, InnerBlocks } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
const { animationType } = attributes;

return (

<div { ...useBlockProps() }>
<InspectorControls>
<PanelBody title={ __( 'Animation Settings', 'aos-block' ) }>
<SelectControl
label={ __( 'Select Animation Type', 'aos-block' ) }
value={ animationType }
options={ [
{ label: 'Fade Up', value: 'fade-up' },
{ label: 'Fade Down', value: 'fade-down' },
{ label: 'Zoom In', value: 'zoom-in' },
{ label: 'Flip Left', value: 'flip-left' },
] }
onChange={ ( value ) => setAttributes( { animationType: value } ) }
/>
</PanelBody>
</InspectorControls>

<div className="aos-placeholder-box" style={{ padding: '20px', border: '2px dashed #ccc', minHeight: '100px' }}>
<p><strong>AOS Animation Container</strong></p>
<p>Current Effect: <code>{ animationType || 'none' }</code></p>
<InnerBlocks />
</div>
</div>
);
}