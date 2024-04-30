import { useBlockProps, InnerBlocks, InspectorControls } from "@wordpress/block-editor";
import { BlockAnchor } from "../../components/BlockAnchor";
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
	const INNERBLOCKS_ALLOWED = [
		"core/heading",
		"core/paragraph",
		"core/buttons",
	];
	const INNERBLOCKS_TEMPLATE = [
		["core/heading", { placeholder: "Heading..." }],
		["core/paragraph", { placeholder: "Text..." }],
		["core/buttons", { placeholder: "Link..." }],
	];

	return (
		<div {...useBlockProps()}>
			<InspectorControls>					
				<BlockAnchor
					currentValue={attributes.anchor}
					onUpdate={(newValue) => {
						setAttributes({
							anchor: newValue,
						});
					}}
				/>
			</InspectorControls>
			<div className="container">
				<InnerBlocks
					template={INNERBLOCKS_TEMPLATE}
					allowedBlocks={INNERBLOCKS_ALLOWED}
				/>
			</div>
		</div>
	);
}
