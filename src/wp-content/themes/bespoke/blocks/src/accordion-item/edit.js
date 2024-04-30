import { useBlockProps, RichText, InnerBlocks } from "@wordpress/block-editor";

import "./editor.scss";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	return (
		<div {...useBlockProps()}>
			<RichText
				className="accordion-toggle"
				allowedFormats={["core/bold"]}
				value={attributes.title}
				onChange={(title) => setAttributes({ title })}
				placeholder="Title..."
			/>
			<div className="accordion-body">
				<InnerBlocks />
			</div>
		</div>
	);
}
