import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save({ attributes }) {
    const blockProps = useBlockProps.save({
        'data-aos': attributes.animationType,
        'className': 'aos-wrapper'
    });

    return (
        <div { ...blockProps }>
            <InnerBlocks.Content />
        </div>
    );
}