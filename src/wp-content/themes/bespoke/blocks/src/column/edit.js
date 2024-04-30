import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
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
		"core/paragraph",
		"core/pullquote",
		"core/image",
		"core/heading",
		"core/list",
		"core/list-item",
		"core/separator",
		"core/buttons",
		"bespoke/accordion",
		"gravityforms/form",
	];
	const INNERBLOCKS_TEMPLATE = [["core/paragraph", {}]];

	const { children, innerBlocksProps } = useInnerBlocksProps(
		{},
		{
			allowedBlocks: INNERBLOCKS_ALLOWED,
			template: INNERBLOCKS_TEMPLATE,
		}
	);
	return (
		<div {...useBlockProps()}>
			<div {...innerBlocksProps}>{children}</div>
		</div>
	);
}
