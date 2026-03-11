import { useBlockProps } from '@wordpress/block-editor';

export default function save( { attributes } ) {
    const { animationType } = attributes;

    return (
        <div { ...useBlockProps.save({ 'data-aos': animationType }) }>
            <p>This content is now wrapped in an AOS animation!</p>
        </div>
    );
}