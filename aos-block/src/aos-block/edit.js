import { __ } from '@wordpress/i18n';
// 1. add InspectorControls and SelectControl
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import './editor.scss';

// 2. We pass in attributes (the data) and setAttributes (the function to change data)
export default function Edit( { attributes, setAttributes } ) {
    const { animationType } = attributes;

    return (
        <div { ...useBlockProps() }>
            {/* 3. This block of code puts the settings in the WordPress Sidebar */}
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

            {/* 4. This is what you see in the editor while building */}
            <div className="aos-placeholder-box" style={{ padding: '20px', border: '2px dashed #ccc' }}>
                <p><strong>AOS Animation Container</strong></p>
                <p>Current Effect: <code>{ animationType }</code></p>
                <p style={{ fontSize: '12px' }}>Use the sidebar to change animation.</p>
            </div>
        </div>
    );
}
